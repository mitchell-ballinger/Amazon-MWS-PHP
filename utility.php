<?php
	
//#################################################################################################
//#######################             ASIN Based MWS Requst              ##########################
//#################################################################################################
function mws_signed_request($ARRAY, $LIST){
	$MWS_ACCESS_KEY = '';
	$MWS_SECRET_KEY = '';
	$MERCHANT_ID =    '';
	$MARKETPLACE_ID = '';
	
    // Basic Parameters
    $method = "POST";
    $host = "mws.amazonservices.com";
    $uri = $ARRAY["Request"];
    
    // Optional Parameters
	if ($LIST) {
		$params = add_parameters($ARRAY, $LIST);
	}

	// Required Parameters
    $params["AWSAccessKeyId"] = $MWS_ACCESS_KEY;
	$params["Action"] = $ARRAY["Action"];
	if (!$ARRAY["MarketplaceId.Id.1"]) {
		$params["MarketplaceId"] = $MARKETPLACE_ID;
	}
	$params["SellerId"] = $MERCHANT_ID;
	$params["SignatureMethod"] = "HmacSHA256";
	$params["SignatureVersion"] = "2";
    $params["Timestamp"] = gmdate("Y-m-d\TH:i:s\Z");
    $params["Version"] = $ARRAY["Version"];
    
    // sort the parameters
    ksort($params);
    
    // create the canonicalized query
    $canonicalized_query = array();
    foreach ($params as $param => $value){
        $param = str_replace("%7E", "~", rawurlencode($param));
        $value = str_replace("%7E", "~", rawurlencode($value));
        $canonicalized_query[] = $param."=".$value;
    }
    $canonicalized_query = implode("&", $canonicalized_query);
    
    // create the string to sign
    $string_to_sign = $method."\n".$host."\n".$uri."\n".$canonicalized_query;
    
    // calculate HMAC with SHA256 and base64-encoding
    $signature = base64_encode(hash_hmac("sha256", $string_to_sign, $MWS_SECRET_KEY, true));
    
    // encode the signature for the request
    $signature = str_replace("%7E", "~", rawurlencode($signature));
    
    // create request
    $request_url = "https://".$host.$uri;
	$post_data = $canonicalized_query."&Signature=".$signature;

	//##################################################
	//# Minimum REQ for a CURL Request / Response COMM #
	//################################################## 
	$ch = curl_init();                               
	curl_setopt($ch,CURLOPT_URL, $request_url);  
	curl_setopt($ch,CURLOPT_POSTFIELDS,$post_data);             
	curl_setopt($ch,CURLOPT_RETURNTRANSFER, true);                   
	$sent = curl_exec($ch);    
	curl_close($ch);                                     
	return $sent;
}
//##################################################
//############      ADD Parameters      ############
//##################################################
function add_parameters($ARRAY, $LIST){
	foreach ($ARRAY as $key => $value) {
		if ($LIST["$key"]) {
			continue;
		}
		$parameters["$key"] = $value;
	}
	//print_r($parameters);
	return $parameters;
}

//##################################################
//####     Update Sales Rank and Timestamp     #####  
//##################################################
function update_rank($xml,$STORED_TIME,$CURRENT_TIME){
	$HOST = "localhost";
	$USER = "root";
	$PWD = "root";
	$connection = mysql_connect($HOST, $USER, $PWD);

	foreach ($xml->GetMatchingProductResult as $key) {
		$ASIN = $key->Product->Identifiers->MarketplaceASIN->ASIN;
		$RANK = $key->Product->SalesRankings->SalesRank[0]->Rank;
	
		if (isset($RANK)) {$sql = "UPDATE products SET rank_value = $RANK, rank_timestamp = $CURRENT_TIME WHERE asin = '$ASIN'";}
		else {$sql = "UPDATE products SET rank_value = 0, rank_timestamp = $CURRENT_TIME WHERE asin = '$ASIN'";}
		
		$returnvalue = mysql_query($sql, $connection);
	}
}
//##################################################
//#########     Check Rank Timestamp     ###########
//##################################################
function update_rank_check($rank, $stored_time, $current_time){
	if (($current_time-$stored_time) > intval((900*pow(2, log10(intval($rank)))))) {
		return true;
	}
	return false;
}
//##################################################
//#########     Create Product Database     ########
//##################################################
function create_mysql_db_product($host, $user, $pwd){
	$connection = mysql_connect($host, $user, $pwd);
	$sql = 'CREATE DATABASE products_db';
	$returnvalue = mysql_query($sql, $connection);
	mysql_close($connection);
}
//##################################################
//######     Create Products Data Table     ########
//##################################################
function create_products_db_table($host, $user, $pwd){
	$connection = mysql_connect($host, $user, $pwd);
	$sql = 'CREATE TABLE products(asin VARCHAR(10) NOT NULL, title TEXT NOT NULL, list_price FLOAT(6,2) NOT NULL, height FLOAT(4,2) NOT NULL, length FLOAT(4,2) NOT NULL, width FLOAT(4,2) NOT NULL, weight FLOAT(4,2) NOT NULL, publisher TINYTEXT NOT NULL, release_date VARCHAR(10) NOT NULL, rank_value INT NOT NULL, rank_timestamp INT NOT NULL, image_url TEXT NOT NULL)';
	mysql_select_db('products_db');
	$returnvalue = mysql_query($sql, $connection);
	mysql_close($connection);
}
//############################################
//#####     Compare 2 Values DET MAX     #####
//############################################
function select_maximum($array){
	if ($array[0]) {
		if ($array[1]) {
			if (floatval($array[0]) > floatval($array[1])) {return $array[0];}
			else {return $array[1];}
		}
		else {return $array[0];}
	}
	else {return $array[1];}
}

function select_dimensions($array){
	$iExist = $array["iHeight"] * $array["iLength"] * $array["iWidth"];
	$pExist = $array["pHeight"] * $array["pLength"] * $array["pWidth"];
	echo $iExist." | ".$pExist;
	if ($iExist < $pExist) {
		return array($array["pHeight"], $array["pLength"], $array["pWidth"]);
	}
	else{
		return array($array["iHeight"], $array["iLength"], $array["iWidth"]);
	}
}
//##################################################
//###############     LOAD XML     #################
//##################################################
function load_xml($filename){
	$FILE = fopen($filename, "r");
	$xml = simplexml_load_string(fread($FILE, filesize($filename)));
	fclose($FILE);
	
	return $xml;
}
//##################################################
//##############     PRINT XML     #################
//##################################################
function pretty_print($filename){
	include "SimpleDOM.php";
	
	$FILE = fopen($filename, "r");
	$dom = simpledom_load_string(fread($FILE, filesize($filename)));
	fclose($FILE);

	return $dom->asPrettyXML();
}
//##################################################
//######     PRINT Formatted Entries     ###########
//##################################################
function print_listings($ARRAY){
	foreach ($ARRAY as $key => $value) {
		echo $key, "\n";
		foreach ($value as $key => $value) {
			echo "\t", $key, "\n";
			foreach ($value as $key => $value) {
				echo "\t\t", $key, "\n"; 
				foreach ($value as $key => $value) {
					echo "\t\t\t", "$key", "\n";
					foreach ($value as $key => $value) {
						foreach ($value as $key => $value) {
							echo "\t\t\t\t", "$key: $value"; 
						}
						echo "\n"; 
					} 
				}
			} 
		}
	}
}

//##################################################
//############     Print 2D Array     ##############
//##################################################
function print_array($array){
	for ($i = 0; $i < sizeof($array); $i++) {
		for ($j = 0; $j < sizeof($array[$i]); $j++) {
			echo sprintf("%11s",$array[$i][$j]);
		}
		echo "\n";
	}
}

//##################################################
//###############     Work Area     ################
//##################################################
//create_mysql_db($HOST, $USER, $PWD);
//create_products_db_table($HOST, $USER, $PWD);
//$xml = load_xml($RESPONSE_FILE);
//store_product_data($xml);

//##################################################
//###############     Profiling     ################
//##################################################
//$START = microtime(true);
//	INSERT CODE TO PROFILE HERE
//echo "Completed in: ", microtime(true) - $START, " seconds";
?>