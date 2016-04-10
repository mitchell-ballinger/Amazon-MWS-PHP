<?php
	require 'utility.php';
?>
<?php
//#################################################################################################
//#######################             Amazon Products API                ##########################
//#################################################################################################
class  amazon_products{
   Member private variables
   private $REQUEST_TYPE;
	private $VERSION;
  
	Member public functions
	public function __construct(){ 
		$this->REQUEST_TYPE = '/Products/2011-10-01';
		$this->VERSION = "2011-10-01";
	}
	public function GetServiceStatus(){
			$parameters = array(
				"Action" => "GetServiceStatus", 
				"Request" => $this->REQUEST_TYPE,
				"Version" => $this->VERSION
			);
			return simplexml_load_string(mws_signed_request($parameters, array("Action", "Request", "Version")));
	}
	public function ListMatchingProducts($ARRAY){
			//array(
			//	"Query" => "", 
			//	"QueryContextId" => ""
			//)
			$parameters = array(
				"Action" => "ListMatchingProducts", 
				"Request" => $this->REQUEST_TYPE,
				"Version" => $this->VERSION,
				"Query" => $ARRAY["Query"],
				"QueryContextId" => $ARRAY["QueryContextId"]
			);
			return simplexml_load_string(mws_signed_request($parameters, array("Action", "Request", "Version")));
	}
	public function GetMatchingProduct($ARRAY){
		//array(
		//	"ASIN" => array()
		//)
		$parameters = array(
			"Action" => "GetMatchingProduct", 
			"Request" => $this->REQUEST_TYPE,
			"Version" => $this->VERSION
		);
		foreach ($ARRAY["ASIN"] as $key => $value) {
			$item = "ASINList.ASIN.".($key + 1);
			$parameters["$item"] = $value;
		}
		return simplexml_load_string(mws_signed_request($parameters, array("Action", "Request", "Version")));
	}
	public function GetMatchingProductForId($ARRAY){
		//array(
		//	"IdType" => "", 
		//	"Id" => array()
		//)
		$parameters = array(
			"Action" => "GetMatchingProductForId", 
			"Request" => $this->REQUEST_TYPE,
			"Version" => $this->VERSION, 
			"IdType" => $ARRAY["IdType"]
		);
		foreach ($ARRAY["Id"] as $key => $value) {
			$item = "IdList.Id.".($key + 1);
			$parameters["$item"] = $value;
		}
		return simplexml_load_string(mws_signed_request($parameters, array("Action", "Request", "Version")));
	}
	public function GetCompetitivePricingForSKU($ARRAY){
		//array(
		//	"SKU" => array()
		//)
		$parameters = array(
			"Action" => "GetCompetitivePricingForSKU", 
			"Request" => $this->REQUEST_TYPE,
			"Version" => $this->VERSION
		);
		foreach ($ARRAY["SKU"] as $key => $value) {
			$item = "SKUList.SKU.".($key + 1);
			$parameters["$item"] = $value;
		}
		return simplexml_load_string(mws_signed_request($parameters, array("Action", "Request", "Version")));
	}
	public function GetCompetitivePricingForASIN($ARRAY){
		//array(
		//	"ASIN" => array()
		//)
		$parameters = array(
			"Action" => "GetCompetitivePricingForASIN", 
			"Request" => $this->REQUEST_TYPE,
			"Version" => $this->VERSION
		);
		foreach ($ARRAY["ASIN"] as $key => $value) {
			$item = "ASINList.ASIN.".($key + 1);
			$parameters["$item"] = $value;
		}
		return simplexml_load_string(mws_signed_request($parameters, array("Action", "Request", "Version")));
	}
	public function GetLowestOfferListingsForSKU($ARRAY){
		//array(  
		//	"SKU" => array(), 
		//	"Condition" => "", 
		//	"Exclude" => "true or false"
		//)
		$parameters = array(
			"Action" => "GetLowestOfferListingsForSKU", 
			"Request" => $this->REQUEST_TYPE,
			"Version" => $this->VERSION, 
			"Condition" => $ARRAY["Condition"], 
			"Exclude" => $ARRAY["Exclude"]
		);
		foreach ($ARRAY["SKU"] as $key => $value) {
			$item = "SKUList.SKU.".($key + 1);
			$parameters["$item"] = $value;
		}
		return simplexml_load_string(mws_signed_request($parameters, array("Action", "Request", "Version")));
	}
	public function GetLowestOfferListingsForASIN($ARRAY){
		//array(  
		//	"ASIN" => array(), 
		//	"Condition" => "", 
		//	"ExcludeMe" => ""
		//)
		$parameters = array(
			"Action" => "GetLowestOfferListingsForASIN", 
			"Request" => $this->REQUEST_TYPE,
			"Version" => $this->VERSION, 
			"Condition" => $ARRAY["Condition"], 
			"ExcludeMe" => $ARRAY["ExcludeMe"]
		);
		foreach ($ARRAY["ASIN"] as $key => $value) {
			$item = "ASINList.ASIN.".($key + 1);
			$parameters["$item"] = $value;
		}
		return simplexml_load_string(mws_signed_request($parameters, array("Action", "Request", "Version")));
	}
	public function GetMyPriceForSKU($ARRAY){
		//array(  
		//	"SKU" => array(), 
		//	"Condition" => ""
		//)
		$parameters = array(
			"Action" => "GetMyPriceForSKU", 
			"Request" => $this->REQUEST_TYPE,
			"Version" => $this->VERSION, 
			"Condition" => $ARRAY["Condition"]
		);
		foreach ($ARRAY["SKU"] as $key => $value) {
			$item = "SKUList.SKU.".($key + 1);
			$parameters["$item"] = $value;
		}
		return simplexml_load_string(mws_signed_request($parameters, array("Action", "Request", "Version")));
	}
	public function GetMyPriceForASIN($ARRAY){
		//array(  
		//	"ASIN" => array(), 
		//	"Condition" => ""
		//)
		$parameters = array(
			"Action" => "GetMyPriceForASIN", 
			"Request" => $this->REQUEST_TYPE,
			"Version" => $this->VERSION,  
			"Condition" => $ARRAY["Condition"]
		);
		foreach ($ARRAY["ASIN"] as $key => $value) {
			$item = "ASINList.ASIN.".($key + 1);
			$parameters["$item"] = $value;
		}
		return simplexml_load_string(mws_signed_request($parameters, array("Action", "Request", "Version")));
	}
	public function GetProductCategoriesForSKU($ARRAY){
		//array(   
		//	"SellerSKU" => ""
		//)
		$parameters = array(
			"Action" => "GetProductCategoriesForSKU", 
			"Request" => $this->REQUEST_TYPE,
			"Version" => $this->VERSION, 
			"SellerSKU" => $ARRAY["SellerSKU"]
		);
		return simplexml_load_string(mws_signed_request($parameters, array("Action", "Request", "Version")));
	}
	public function GetProductCategoriesForASIN($ARRAY){
		//array(   
		//	"SellerASIN" => ""
		//)
		$parameters = array(
			"Action" => "GetProductCategoriesForASIN", 
			"Request" => $this->REQUEST_TYPE,
			"Version" => $this->VERSION, 
			"SellerASIN" => $ARRAY["SellerASIN"]
		);
		return simplexml_load_string(mws_signed_request($parameters, array("Action", "Request", "Version")));
	}
}
//#################################################################################################
//#######################             Amazon Orders API                  ##########################
//#################################################################################################
class  amazon_orders{
   /* Member privateiables */
   private $REQUEST_TYPE;
	private $VERSION;
  
	/* Member public functions */
	public function __construct(){ 
		$this->REQUEST_TYPE = "/Orders/2011-01-01";
		$this->VERSION = "2011-01-01";
	}
	public function GetServiceStatus(){
		$parameters = array(
			"Action" => "GetServiceStatus", 
			"Request" => $this->REQUEST_TYPE,
			"Version" => $this->VERSION
		);
		return simplexml_load_string(mws_signed_request($parameters, array("Action", "Request", "Version")));
	}
	public function ListOrders($ARRAY){
		//array(
		//	"MarketplaceId" => array(),
		//	"CreatedAfter" => "[YYYY]-[MM]-[DD]T[hh]:[mm]:[ss]",
		//	"CreatedBefore" => "[YYYY]-[MM]-[DD]T[hh]:[mm]:[ss]",
		//	"LastUpdatedAfter" => "[YYYY]-[MM]-[DD]T[hh]:[mm]:[ss]",
		//	"LastUpdatedBefore" => "[YYYY]-[MM]-[DD]T[hh]:[mm]:[ss]",
		//	"OrderStatus" => array(),
		//	"FulfillmentChannel" => array(),
		//	"SellerOrderId" => "Seller Order Scheme not Amazon Order Id",
		//	"BuyerEmail" => "",
		//	"PaymentMethod" => array(),
		//	"TFMShipmentStatus" => array(),
		//	"MaxResultsPerPage" => "1 to 100, Defualt is 100"
		//)
		$parameters = array(
			"Action" => "ListOrders", 
			"Request" => $this->REQUEST_TYPE,
			"Version" => $this->VERSION,
			"MarketplaceId.Id.1" => $ARRAY["MarketplaceId"][0]
		);
		if ($ARRAY["SellerOrderId"]) {
			$parameters["SellerOrderId"] = $ARRAY["SellerOrderId"];
		}
		if ($ARRAY["BuyerEmail"]) {
			$parameters["BuyerEmail"] = $ARRAY["BuyerEmail"];
		}
		if ($ARRAY["MaxResultsPerPage"]) {
			$parameters["MaxResultsPerPage"] = $ARRAY["MaxResultsPerPage"];
		}
		if ($ARRAY["CreatedAfter"]) {
			$parameters["CreatedAfter"] = $ARRAY["CreatedAfter"];
		}
		if ($ARRAY["CreatedBefore"]) {
			$parameters["CreatedBefore"] = $ARRAY["CreatedBefore"];
		}
		if ($ARRAY["LastUpdatedAfter"]) {
			$parameters["LastUpdatedAfter"] = $ARRAY["LastUpdatedAfter"];
		}
		if ($ARRAY["LastUpdatedBefore"]) {
			$parameters["LastUpdatedBefore"] = $ARRAY["LastUpdatedBefore"];
		}
		if ($ARRAY["OrderStatus"]) {
			$key = 1;
			foreach ($ARRAY["OrderStatus"] as $value) {
				$item = "OrderStatus.Status.".($key++);
				$parameters["$item"] = $value;
			}
		}
		if ($ARRAY["FulfillmentChannel"]) {
			$key = 1;
			foreach ($ARRAY["FulfillmentChannel"] as $value) {
				$item = "FulfillmentChannel.Channel.".($key++);
				$parameters["$item"] = $value;
			}
		}
		if ($ARRAY["PaymentMethod"]) {
			$key = 1;
			foreach ($ARRAY["PaymentMethod"] as $value) {
				$item = "PaymentMethod.Method.".($key++);
				$parameters["$item"] = $value;
			}
		}
		if ($ARRAY["TFMShipmentStatus"]) {
			$key = 1;
			foreach ($ARRAY["TFMShipmentStatus"] as $value) {
				$item = "TFMShipmentStatus.Status.".($key++);
				$parameters["$item"] = $value;
			}
		}
		//print_r($parameters);
		return simplexml_load_string(mws_signed_request($parameters, array("Action", "Request", "Version")));
	}
	public function ListOrdersByNextToken($ARRAY){
		//array(
		//	"NextToken" => ""
		//)
		$parameters = array(
			"Action" => "ListOrdersByNextToken", 
			"Request" => $this->REQUEST_TYPE,
			"Version" => $this->VERSION,
			"NextToken" => $ARRAY["NextToken"]
		);
		return simplexml_load_string(mws_signed_request($parameters, array("Action", "Request", "Version")));
	}
	public function GetOrder($ARRAY){
		//array(
		//	"AmazonOrderId" => array()   <- Max 50
		//)
		$parameters = array(
			"Action" => "GetOrder", 
			"Request" => $this->REQUEST_TYPE,
			"Version" => $this->VERSION
		);
		$key = 1;
		foreach ($ARRAY["AmazonOrderId"] as $value) {
			$item = "AmazonOrderId.Id.".($key++);
			$parameters["$item"] = $value;
		}
		return simplexml_load_string(mws_signed_request($parameters, array("Action", "Request", "Version")));
	}
	public function ListOrderItems($ARRAY){
		//array(
		//	"AmazonOrderId" => ""
		//)
		$parameters = array(
			"Action" => "ListOrderItems", 
			"Request" => $this->REQUEST_TYPE,
			"Version" => $this->VERSION,
			"AmazonOrderId" => $ARRAY["AmazonOrderId"]
		);
		return simplexml_load_string(mws_signed_request($parameters, array("Action", "Request", "Version")));
	}
	public function ListOrderItemsByNextToken($ARRAY){
		//array(
		//	"NextToken" => ""
		//)
		$parameters = array(
			"Action" => "ListOrderItemsByNextToken", 
			"Request" => $this->REQUEST_TYPE,
			"Version" => $this->VERSION,
			"NextToken" => $ARRAY["NextToken"]
		);
		return simplexml_load_string(mws_signed_request($parameters, array("Action", "Request", "Version")));
	}
}
//#################################################################################################
//#######################             Amazon Feeds API                   ##########################
//#################################################################################################
class  amazon_feeds{
   /* Member privateiables */
   private $REQUEST_TYPE;
	private $VERSION;
  
	/* Member public functions */
	public function __construct(){ 
		$this->REQUEST_TYPE = "/";
		$this->VERSION = "2009-01-01";
	}
	public function CancelFeedSubmissions($ARRAY){
		//array(
		//	"FeedSubmissionIdList" => array(),
		//	"FeedTypeList" => array(),
		//	"SubmittedFromDate" => "[YYYY]-[MM]-[DD]T[hh]:[mm]:[ss]",
		//	"SubmittedToDate" => "[YYYY]-[MM]-[DD]T[hh]:[mm]:[ss]"
		//)
		$parameters = array(
			"Action" => "CancelFeedSubmissions", 
			"Request" => $this->REQUEST_TYPE,
			"Version" => $this->VERSION
		);
		if ($ARRAY["SubmittedFromDate"]) {
			$parameters["SubmittedFromDate"] = $ARRAY["SubmittedFromDate"];
		}
		if ($ARRAY["SubmittedToDate"]) {
			$parameters["SubmittedToDate"] = $ARRAY["SubmittedToDate"];
		}
		if ($ARRAY["FeedSubmissionIdList"]) {
			$key = 1;
			foreach ($ARRAY["FeedSubmissionIdList"] as $value) {
				$item = "FeedSubmissionIdList.Id.".($key++);
				$parameters["$item"] = $value;
			}
		}
		if ($ARRAY["FeedTypeList"]) {
			$key = 1;
			foreach ($ARRAY["FeedTypeList"] as $value) {
				$item = "FeedTypeList.Type.".($key++);
				$parameters["$item"] = $value;
			}
		}
		return simplexml_load_string(mws_signed_request($parameters, array("Action", "Request", "Version")));
	}
	public function GetFeedSubmissionList($ARRAY){
		//array(
		//	"FeedSubmissionIdList" => array(),
		//	"FeedTypeList" => array(),
		//	"SubmittedFromDate" => "[YYYY]-[MM]-[DD]T[hh]:[mm]:[ss]",
		//	"SubmittedToDate" => "[YYYY]-[MM]-[DD]T[hh]:[mm]:[ss]",
		//	"MaxCount" => "1 to 100, defualt 10",
		//	"FeedProcessingStatusList" => array()
		//)
		$parameters = array(
			"Action" => "GetFeedSubmissionList", 
			"Request" => $this->REQUEST_TYPE,
			"Version" => $this->VERSION
		);
		if ($ARRAY["MaxCount"]) {
			$parameters["MaxCount"] = $ARRAY["MaxCount"];
		}
		if ($ARRAY["SubmittedFromDate"]) {
			$parameters["SubmittedFromDate"] = $ARRAY["SubmittedFromDate"];
		}
		if ($ARRAY["SubmittedToDate"]) {
			$parameters["SubmittedToDate"] = $ARRAY["SubmittedToDate"];
		}
		if ($ARRAY["FeedSubmissionIdList"]) {
			$key = 1;
			foreach ($ARRAY["FeedSubmissionIdList"] as $value) {
				$item = "FeedSubmissionIdList.Id.".($key++);
				$parameters["$item"] = $value;
			}
		}
		if ($ARRAY["FeedTypeList"]) {
			$key = 1;
			foreach ($ARRAY["FeedTypeList"] as $value) {
				$item = "FeedTypeList.Type.".($key++);
				$parameters["$item"] = $value;
			}
		}
		if ($ARRAY["FeedProcessingStatusList"]) {
			$key = 1;
			foreach ($ARRAY["FeedProcessingStatusList"] as $value) {
				$item = "FeedProcessingStatusList.Status.".($key++);
				$parameters["$item"] = $value;
			}
		}
		return simplexml_load_string(mws_signed_request($parameters, array("Action", "Request", "Version")));
	}
	public function GetFeedSubmissionListByNextToken($ARRAY){
		//array(
		//	"NextToken" => ""
		//)
		$parameters = array(
			"Action" => "GetFeedSubmissionListByNextToken", 
			"Request" => $this->REQUEST_TYPE,
			"Version" => $this->VERSION,
			"NextToken" => $ARRAY["NextToken"]
		);
		return simplexml_load_string(mws_signed_request($parameters, array("Action", "Request", "Version")));
	}
	public function GetFeedSubmissionCount($ARRAY){
		//array(
		//	"FeedTypeList" => array(),
		//	"SubmittedFromDate" => "[YYYY]-[MM]-[DD]T[hh]:[mm]:[ss]",
		//	"SubmittedToDate" => "[YYYY]-[MM]-[DD]T[hh]:[mm]:[ss]",
		//	"FeedProcessingStatusList" => array()
		//)
		$parameters = array(
			"Action" => "GetFeedSubmissionCount", 
			"Request" => $this->REQUEST_TYPE,
			"Version" => $this->VERSION,
			"FeedTypeList" => $ARRAY["FeedTypeList"],
			"SubmittedFromDate" => $ARRAY["SubmittedFromDate"],
			"SubmittedToDate" => $ARRAY["SubmittedToDate"],
			"FeedProcessingStatusList" => $ARRAY["FeedProcessingStatusList"]
		);
		if ($ARRAY["SubmittedFromDate"]) {
			$parameters["SubmittedFromDate"] = $ARRAY["SubmittedFromDate"];
		}
		if ($ARRAY["SubmittedToDate"]) {
			$parameters["SubmittedToDate"] = $ARRAY["SubmittedToDate"];
		}
		if ($ARRAY["FeedTypeList"]) {
			$key = 1;
			foreach ($ARRAY["FeedTypeList"] as $value) {
				$item = "FeedTypeList.Type.".($key++);
				$parameters["$item"] = $value;
			}
		}
		if ($ARRAY["FeedProcessingStatusList"]) {
			$key = 1;
			foreach ($ARRAY["FeedProcessingStatusList"] as $value) {
				$item = "FeedProcessingStatusList.Status.".($key++);
				$parameters["$item"] = $value;
			}
		}
		return simplexml_load_string(mws_signed_request($parameters, array("Action", "Request", "Version")));
	}
	public function GetFeedSubmissionResult($ARRAY){
		//array(
		//	"FeedSubmissionId" => ""
		//)
		$parameters = array(
			"Action" => "GetFeedSubmissionResult", 
			"Request" => $this->REQUEST_TYPE,
			"Version" => $this->VERSION,
			"FeedSubmissionId" => $ARRAY["FeedSubmissionId"]
		);
		return simplexml_load_string(mws_signed_request($parameters, array("Action", "Request", "Version")));
	}
	public function SubmitFeed($ARRAY){
		//array(
		//	"FeedType" => "",
		//	"MarketplaceIdList" => array(),
		//	"PurgeAndReplace" => "true or false"
		//)
		$parameters = array(
			"Action" => "SubmitFeed", 
			"Request" => $this->REQUEST_TYPE,
			"Version" => $this->VERSION,
			"FeedType" => $ARRAY["FeedType"]
		);
		if ($ARRAY["PurgeAndReplace"]) {
			$parameters["PurgeAndReplace"] = $ARRAY["PurgeAndReplace"];
		}
		if ($ARRAY["MarketplaceIdList"]) {
			$key = 1;
			foreach ($ARRAY["MarketplaceIdList"] as $value) {
				$item = "MarketplaceIdList.Id.".($key++);
				$parameters["$item"] = $value;
			}
		}
		return simplexml_load_string(mws_signed_request($parameters, array("Action", "Request", "Version")));
	}
}
//#################################################################################################
//#######################             Amazon Reports API                 ##########################
//#################################################################################################
class  amazon_reports{
   /* Member private variables */
   private $REQUEST_TYPE;
	private $VERSION;
  
	/* Member public functions */
	public function __construct(){ 
		$this->REQUEST_TYPE = "/";
		$this->VERSION = "2009-01-01";
	}
	public function RequestReport($ARRAY){
		//array(
		//	"ReportType" => "",
		//	"MarketplaceIdList" => array(),
		//	"StartDate" => "[YYYY]-[MM]-[DD]T[hh]:[mm]:[ss]",
		//	"EndDate" => "[YYYY]-[MM]-[DD]T[hh]:[mm]:[ss]",
		//	"ReportOptions" => "ShowSalesChannel=true or ommitted"
		//)
		$parameters = array(
			"Action" => "RequestReport", 
			"Request" => $this->REQUEST_TYPE,
			"Version" => $this->VERSION,
			"ReportType" => $ARRAY["ReportType"]
		);
		if ($ARRAY["StartDate"]) {
			$parameters["StartDate"] = $ARRAY["StartDate"];
		}
		if ($ARRAY["EndDate"]) {
			$parameters["EndDate"] = $ARRAY["EndDate"];
		}
		if ($ARRAY["ReportOptions"]) {
			$parameters["ReportOptions"] = $ARRAY["ReportOptions"];
		}
		if ($ARRAY["MarketplaceIdList"]) {
			$key = 1;
			foreach ($ARRAY["MarketplaceIdList"] as $value) {
				$item = "MarketplaceIdList.Id.".($key++);
				$parameters["$item"] = $value;
			}
		}
		return simplexml_load_string(mws_signed_request($parameters, array("Action", "Request", "Version")));
	}
	public function GetReport($ARRAY){
		//array(
		//	"ReportId" => ""
		//)
		$parameters = array(
			"Action" => "GetReport", 
			"Request" => $this->REQUEST_TYPE,
			"Version" => $this->VERSION,
			"ReportId" => $ARRAY["ReportId"]
		);
		return mws_signed_request($parameters, array("Action", "Request", "Version"));
	}
	public function GetReportCount($ARRAY){
		//array(
		//	"ReportTypeList" => array(),
		//	"Acknowledged" => "true or false",
		//	"AvailableFromDate" => "[YYYY]-[MM]-[DD]T[hh]:[mm]:[ss]",
		//	"AvailableToDate" => "[YYYY]-[MM]-[DD]T[hh]:[mm]:[ss]"
		//)
		$parameters = array(
			"Action" => "GetReportCount", 
			"Request" => $this->REQUEST_TYPE,
			"Version" => $this->VERSION
		);
		if ($ARRAY["Acknowledged"]) {
			$parameters["Acknowledged"] = $ARRAY["Acknowledged"];
		}
		if ($ARRAY["AvailableFromDate"]) {
			$parameters["AvailableFromDate"] = $ARRAY["AvailableFromDate"];
		}
		if ($ARRAY["AvailableToDate"]) {
			$parameters["AvailableToDate"] = $ARRAY["AvailableToDate"];
		}
		if ($ARRAY["ReportTypeList"]) {
			$key = 1;
			foreach ($ARRAY["ReportTypeList"] as $value) {
				$item = "ReportTypeList.Type.".($key++);
				$parameters["$item"] = $value;
			}
		}
		return simplexml_load_string(mws_signed_request($parameters, array("Action", "Request", "Version")));
	}
	public function GetReportList($ARRAY){
		//array(
		//	"ReportTypeList" => array(),
		//	"ReportRequestIdList" => array(),
		//	"Acknowledged" => "true or false",
		//	"AvailableFromDate" => "[YYYY]-[MM]-[DD]T[hh]:[mm]:[ss]",
		//	"AvailableToDate" => "[YYYY]-[MM]-[DD]T[hh]:[mm]:[ss]",
		//	"MaxCount" => "1 to 100, default 10"
		//)
		$parameters = array(
			"Action" => "GetReportList", 
			"Request" => $this->REQUEST_TYPE,
			"Version" => $this->VERSION
		);
		if ($ARRAY["MaxCount"]) {
			$parameters["MaxCount"] = $ARRAY["MaxCount"];
		}
		if ($ARRAY["Acknowledged"]) {
			$parameters["Acknowledged"] = $ARRAY["Acknowledged"];
		}
		if ($ARRAY["AvailableFromDate"]) {
			$parameters["AvailableFromDate"] = $ARRAY["AvailableFromDate"];
		}
		if ($ARRAY["AvailableToDate"]) {
			$parameters["AvailableToDate"] = $ARRAY["AvailableToDate"];
		}
		if ($ARRAY["ReportTypeList"]) {
			$key = 1;
			foreach ($ARRAY["ReportTypeList"] as $value) {
				$item = "ReportTypeList.Type.".($key++);
				$parameters["$item"] = $value;
			}
		}
		if ($ARRAY["ReportRequestIdList"]) {
			$key = 1;
			foreach ($ARRAY["ReportRequestIdList"] as $value) {
				$item = "ReportRequestIdList.Id.".($key++);
				$parameters["$item"] = $value;
			}
		}
		return simplexml_load_string(mws_signed_request($parameters, array("Action", "Request", "Version")));
	}
	public function GetReportListByNextToken($ARRAY){
		//array(
		//	"NextToken" => ""
		//)
		$parameters = array(
			"Action" => "GetReportListByNextToken", 
			"Request" => $this->REQUEST_TYPE,
			"Version" => $this->VERSION,
			"NextToken" => $ARRAY["NextToken"]
		);
		return simplexml_load_string(mws_signed_request($parameters, array("Action", "Request", "Version")));
	}
	public function GetReportRequestCount($ARRAY){
		//array(
		//	"ReportTypeList" => array(),
		//	"ReportProcessingStatusList" => array(),
		//	"RequestedFromDate" => "[YYYY]-[MM]-[DD]T[hh]:[mm]:[ss]",
		//	"RequestedToDate" => "[YYYY]-[MM]-[DD]T[hh]:[mm]:[ss]"
		//)
		$parameters = array(
			"Action" => "GetReportRequestCount", 
			"Request" => $this->REQUEST_TYPE,
			"Version" => $this->VERSION
		);
		if ($ARRAY["RequestedFromDate"]) {
			$parameters["RequestedFromDate"] = $ARRAY["RequestedFromDate"];
		}
		if ($ARRAY["RequestedToDate"]) {
			$parameters["RequestedToDate"] = $ARRAY["RequestedToDate"];
		}
		if ($ARRAY["ReportTypeList"]) {
			$key = 1;
			foreach ($ARRAY["ReportTypeList"] as $value) {
				$item = "ReportTypeList.Type.".($key++);
				$parameters["$item"] = $value;
			}
		}
		if ($ARRAY["ReportProcessingStatusList"]) {
			$key = 1;
			foreach ($ARRAY["ReportProcessingStatusList"] as $value) {
				$item = "ReportProcessingStatusList.Status.".($key++);
				$parameters["$item"] = $value;
			}
		}
		return simplexml_load_string(mws_signed_request($parameters, array("Action", "Request", "Version")));
	}
	public function GetReportRequestList($ARRAY){
		//array(
		//	"ReportTypeList" => array(),
		//	"ReportProcessingStatusList" => array(),
		//	"ReportRequestIdList" => array(),
		//	"RequestedFromDate" => "[YYYY]-[MM]-[DD]T[hh]:[mm]:[ss]",
		//	"RequestedToDate" => "[YYYY]-[MM]-[DD]T[hh]:[mm]:[ss]",
		//	"MaxCount" => "1 to 100, default 10"
		//)
		$parameters = array(
			"Action" => "GetReportRequestList", 
			"Request" => $this->REQUEST_TYPE,
			"Version" => $this->VERSION
		);
		if ($ARRAY["MaxCount"]) {
			$parameters["MaxCount"] = $ARRAY["MaxCount"];
		}
		if ($ARRAY["RequestedFromDate"]) {
			$parameters["RequestedFromDate"] = $ARRAY["RequestedFromDate"];
		}
		if ($ARRAY["RequestedToDate"]) {
			$parameters["RequestedToDate"] = $ARRAY["RequestedToDate"];
		}
		if ($ARRAY["ReportTypeList"]) {
			$key = 1;
			foreach ($ARRAY["ReportTypeList"] as $value) {
				$item = "ReportTypeList.Type.".($key++);
				$parameters["$item"] = $value;
			}
		}
		if ($ARRAY["ReportProcessingStatusList"]) {
			$key = 1;
			foreach ($ARRAY["ReportProcessingStatusList"] as $value) {
				$item = "ReportProcessingStatusList.Status.".($key++);
				$parameters["$item"] = $value;
			}
		}
		if ($ARRAY["ReportRequestIdList"]) {
			$key = 1;
			foreach ($ARRAY["ReportRequestIdList"] as $value) {
				$item = "ReportRequestIdList.Id.".($key++);
				$parameters["$item"] = $value;
			}
		}
		return simplexml_load_string(mws_signed_request($parameters, array("Action", "Request", "Version")));
	}
	public function GetReportRequestListByNextToken($ARRAY){
		//array(
		//	"NextToken" => "",
		//)
		$parameters = array(
			"Action" => "GetReportRequestListByNextToken", 
			"Request" => $this->REQUEST_TYPE,
			"Version" => $this->VERSION,
			"NextToken" => $ARRAY["NextToken"]
		);
		return simplexml_load_string(mws_signed_request($parameters, array("Action", "Request", "Version")));
	}
	public function CancelReportRequests($ARRAY){
		//array(
		//	"ReportTypeList" => array(),
		//	"ReportProcessingStatusList" => array(),
		//	"ReportRequestIdList" => array(),
		//	"RequestedFromDate" => "[YYYY]-[MM]-[DD]T[hh]:[mm]:[ss]",
		//	"RequestedToDate" => "[YYYY]-[MM]-[DD]T[hh]:[mm]:[ss]"
		//)
		$parameters = array(
			"Action" => "CancelReportRequests", 
			"Request" => $this->REQUEST_TYPE,
			"Version" => $this->VERSION
		);
		if ($ARRAY["RequestedFromDate"]) {
			$parameters["RequestedFromDate"] = $ARRAY["RequestedFromDate"];
		}
		if ($ARRAY["RequestedToDate"]) {
			$parameters["RequestedToDate"] = $ARRAY["RequestedToDate"];
		}
		if ($ARRAY["ReportTypeList"]) {
			$key = 1;
			foreach ($ARRAY["ReportTypeList"] as $value) {
				$item = "ReportTypeList.Type.".($key++);
				$parameters["$item"] = $value;
			}
		}
		if ($ARRAY["ReportProcessingStatusList"]) {
			$key = 1;
			foreach ($ARRAY["ReportProcessingStatusList"] as $value) {
				$item = "ReportProcessingStatusList.Status.".($key++);
				$parameters["$item"] = $value;
			}
		}
		if ($ARRAY["ReportRequestIdList"]) {
			$key = 1;
			foreach ($ARRAY["ReportRequestIdList"] as $value) {
				$item = "ReportRequestIdList.Id.".($key++);
				$parameters["$item"] = $value;
			}
		}
		return simplexml_load_string(mws_signed_request($parameters, array("Action", "Request", "Version")));
	}
	public function ManageReportSchedule($ARRAY){
		//array(
		//	"ReportType" => "",
		//	"Schedule" => "",
		//	"ScheduleDate" => "[YYYY]-[MM]-[DD]T[hh]:[mm]:[ss]"
		//)
		$parameters = array(
			"Action" => "ManageReportSchedule", 
			"Request" => $this->REQUEST_TYPE,
			"Version" => $this->VERSION,
			"ReportType" => $ARRAY["ReportType"],
			"Schedule" => $ARRAY["Schedule"]
		);
		if ($ARRAY["ScheduleDate"]) {
			$parameters["ScheduleDate"] = $ARRAY["ScheduleDate"];
		}
		return simplexml_load_string(mws_signed_request($parameters, array("Action", "Request", "Version")));
	}
	public function GetReportScheduleList($ARRAY){
		//array(
		//	"ReportTypeList" => array()
		//)
		$parameters = array(
			"Action" => "GetReportScheduleList", 
			"Request" => $this->REQUEST_TYPE,
			"Version" => $this->VERSION
		);
		if ($ARRAY["ReportTypeList"]) {
			$key = 1;
			foreach ($ARRAY["ReportTypeList"] as $value) {
				$item = "ReportTypeList.Type.".($key++);
				$parameters["$item"] = $value;
			}
		}
		return simplexml_load_string(mws_signed_request($parameters, array("Action", "Request", "Version")));
	}
	public function GetReportScheduleListByNextToken($ARRAY){
		//array(
		//	"NextToken.-" => ""
		//)
		$parameters = array(
			"Action" => "GetReportScheduleListByNextToken", 
			"Request" => $this->REQUEST_TYPE,
			"Version" => $this->VERSION,
			"NextToken.-" => $ARRAY["NextToken.-"]
		);
		return simplexml_load_string(mws_signed_request($parameters, array("Action", "Request", "Version")));
	}
	public function GetReportScheduleCount($ARRAY){
		//array(
		//	"ReportTypeList" => array()
		//)
		$parameters = array(
			"Action" => "GetReportScheduleCount", 
			"Request" => $this->REQUEST_TYPE,
			"Version" => $this->VERSION
		);
		if ($ARRAY["ReportTypeList"]) {
			$key = 1;
			foreach ($ARRAY["ReportTypeList"] as $value) {
				$item = "ReportTypeList.Type.".($key++);
				$parameters["$item"] = $value;
			}
		}
		return simplexml_load_string(mws_signed_request($parameters, array("Action", "Request", "Version")));
	}
	public function UpdateReportAcknowledgements($ARRAY){
		//array(
		//	"ReportIdList" => array()
		//	"Acknowledged" => "true or false",
		//)
		$parameters = array(
			"Action" => "UpdateReportAcknowledgements", 
			"Request" => $this->REQUEST_TYPE,
			"Version" => $this->VERSION
		);
		if ($ARRAY["Acknowledged"]) {
			$parameters["Acknowledged"] = $ARRAY["Acknowledged"];
		}
		foreach ($ARRAY["ReportIdList"] as $value) {
			$item = "ReportIdList.Id.".($key++);
			$parameters["$item"] = $value;
		}
		return simplexml_load_string(mws_signed_request($parameters, array("Action", "Request", "Version")));
	}
}
//#################################################################################################
//#######################             Amazon Fulfillment Inbound API             ##################
//#################################################################################################

$temp = new amazon_fulfillment_inbound();
//$xml = $temp->GetReportRequestList(array("ReportType" => "_GET_FLAT_FILE_OPEN_LISTINGS_DATA_"));

print_r($xml);

class  amazon_fulfillment_inbound{
    /* Member privateiables */
    private $REQUEST_TYPE;
	private $VERSION;
   
	/* Member public functions */
	public function __construct(){ 
		$this->REQUEST_TYPE = "/FulfillmentInboundShipment/2010-10-01";
		$this->VERSION = "2010-10-01";
	}
	public function GetServiceStatus(){
			$parameters = array(
				"Action" => "GetServiceStatus", 
				"Request" => $this->REQUEST_TYPE,
				"Version" => $this->VERSION
			);
			return simplexml_load_string(mws_signed_request($parameters, array("Action", "Request", "Version")));
	}
	public function CreateInboundShipmentPlan($ARRAY){
		//array(
		//	"LabelPrepPreference" => "default SELLER_LABEL",
		//	"ShipFromAddress.Name" => "",  <- URL Encode Shipping Items
		//	"ShipFromAddress.AddressLine1" => "",
		//	"ShipFromAddress.AddressLine2" => "",
		//	"ShipFromAddress.City" => "",
		//	"ShipFromAddress.StateOrProvinceCode" => "",
		//	"ShipFromAddress.DistrictOrCounty" => "",
		//	"ShipFromAddress.PostalCode" => "",
		//	"ShipFromAddress.CountryCode" => "",
		//	"InboundShipmentPlanRequestItems.member" => array(array(SellerSKU, ASIN, Quantity, Condition)), ...)
		//)
		$parameters = array(
			"Action" => "CreateInboundShipmentPlan", 
			"Request" => $this->REQUEST_TYPE,
			"Version" => $this->VERSION,
			"LabelPrepPreference" => $ARRAY["LabelPrepPreference"],
			"ShipFromAddress.Name" => $ARRAY["ShipFromAddress.Name"],
			"ShipFromAddress.AddressLine1" => $ARRAY["ShipFromAddress.AddressLine1"],
			"ShipFromAddress.AddressLine2" => $ARRAY["ShipFromAddress.AddressLine2"],
			"ShipFromAddress.City" => $ARRAY["ShipFromAddress.City"],
			"ShipFromAddress.StateOrProvinceCode" => $ARRAY["ShipFromAddress.StateOrProvinceCode"],
			"ShipFromAddress.DistrictOrCounty" => $ARRAY["ShipFromAddress.DistrictOrCounty"],
			"ShipFromAddress.PostalCode" => $ARRAY["ShipFromAddress.PostalCode"],
			"ShipFromAddress.CountryCode" => $ARRAY["ShipFromAddress.CountryCode"],
			"InboundShipmentPlanRequestItems.member" => $ARRAY["InboundShipmentPlanRequestItems.member"]
		);
		return simplexml_load_string(mws_signed_request($parameters, array("Action", "Request", "Version")));
	}
	public function CreateInboundShipment($ARRAY){
		//array(
		//	"ShipmentId" => "",
		//	"InboundShipmentHeader.LabelPrepPreference" => "default SELLER_LABEL",
		//	"InboundShipmentHeader.ShipFromAddress.Name" => "",  <- URL Encode Shipping Items
		//	"InboundShipmentHeader.ShipFromAddress.AddressLine1" => "",
		//	"InboundShipmentHeader.ShipFromAddress.AddressLine2" => "",
		//	"InboundShipmentHeader.ShipFromAddress.City" => "",
		//	"InboundShipmentHeader.ShipFromAddress.StateOrProvinceCode" => "",
		//	"InboundShipmentHeader.ShipFromAddress.DistrictOrCounty" => "",
		//	"InboundShipmentHeader.ShipFromAddress.PostalCode" => "",
		//	"InboundShipmentHeader.ShipFromAddress.CountryCode" => "",
		//	"InboundShipmentHeader.DestinationFulfillmentCenterId" => "",
		//	"InboundShipmentHeader.ShipmentStatus" => "",
		//	"InboundShipmentItems.member" => array(array(SellerSKU, ASIN, QuantityShipped, Condition)), ...)
		//)
		$parameters = array(
			"Action" => "CreateInboundShipment", 
			"Request" => $this->REQUEST_TYPE,
			"Version" => $this->VERSION,
			"ShipmentId" => $ARRAY["ShipmentId"],
			"InboundShipmentHeader.LabelPrepPreference" => $ARRAY["InboundShipmentHeader.LabelPrepPreference"],
			"InboundShipmentHeader.ShipFromAddress.Name" => $ARRAY["InboundShipmentHeader.ShipFromAddress.Name"],
			"InboundShipmentHeader.ShipFromAddress.AddressLine1" => $ARRAY["InboundShipmentHeader.ShipFromAddress.AddressLine1"],
			"InboundShipmentHeader.ShipFromAddress.AddressLine2" => $ARRAY["InboundShipmentHeader.ShipFromAddress.AddressLine2"],
			"InboundShipmentHeader.ShipFromAddress.City" => $ARRAY["InboundShipmentHeader.ShipFromAddress.City"],
			"InboundShipmentHeader.ShipFromAddress.StateOrProvinceCode" => $ARRAY["InboundShipmentHeader.ShipFromAddress.StateOrProvinceCode"],
			"InboundShipmentHeader.ShipFromAddress.DistrictOrCounty" => $ARRAY["InboundShipmentHeader.ShipFromAddress.DistrictOrCounty"],
			"InboundShipmentHeader.ShipFromAddress.PostalCode" => $ARRAY["InboundShipmentHeader.ShipFromAddress.PostalCode"],
			"InboundShipmentHeader.ShipFromAddress.CountryCode" => $ARRAY["InboundShipmentHeader.ShipFromAddress.CountryCode"],
			"InboundShipmentHeader.DestinationFulfillmentCenterId" => $ARRAY["InboundShipmentHeader.DestinationFulfillmentCenterId"],
			"InboundShipmentHeader.ShipmentStatus" => $ARRAY["InboundShipmentHeader.ShipmentStatus"],
			"InboundShipmentItems.member" => $ARRAY["InboundShipmentItems.member"]
		);
		return simplexml_load_string(mws_signed_request($parameters, array("Action", "Request", "Version")));
	}
	public function ListInboundShipmentItems($ARRAY){
		//array(
		//	"ShipmentId" => "",
		//	"LastUpdatedAfter" => "[YYYY]-[MM]-[DD]T[hh]:[mm]:[ss]",
		//	"LastUpdatedBefore" => "[YYYY]-[MM]-[DD]T[hh]:[mm]:[ss]"
		//)
		$parameters = array(
			"Action" => "ListInboundShipmentItems", 
			"Request" => $this->REQUEST_TYPE,
			"Version" => $this->VERSION,
			"ShipmentId" => $ARRAY["ShipmentId"],
			"LastUpdatedAfter" => $ARRAY["LastUpdatedAfter"],
			"LastUpdatedBefore" => $ARRAY["LastUpdatedBefore"]
		);
		return simplexml_load_string(mws_signed_request($parameters, array("Action", "Request", "Version")));
	}
	public function ListInboundShipmentItemsByNextToken($ARRAY){
		//array(
		//	"NextToken" => ""
		//)
		$parameters = array(
			"Action" => "ListInboundShipmentItemsByNextToken", 
			"Request" => $this->REQUEST_TYPE,
			"Version" => $this->VERSION,
			"NextToken" => $ARRAY["NextToken"]
		);
		return simplexml_load_string(mws_signed_request($parameters, array("Action", "Request", "Version")));
	}
	public function ListInboundShipments($ARRAY){
		//array(
		//	"LastUpdatedAfter" => "[YYYY]-[MM]-[DD]T[hh]:[mm]:[ss]",
		//	"LastUpdatedBefore" => "[YYYY]-[MM]-[DD]T[hh]:[mm]:[ss]",
		//	"ShipmentStatusList.member" => array(),
		//	"ShipmentIdList.member" => array()
		//)
		$parameters = array(
			"Action" => "ListInboundShipments", 
			"Request" => $this->REQUEST_TYPE,
			"Version" => $this->VERSION,
			"LastUpdatedAfter" => $ARRAY["LastUpdatedAfter"],
			"LastUpdatedBefore" => $ARRAY["LastUpdatedBefore"],
			"ShipmentStatusList.member" => $ARRAY["ShipmentStatusList.member"],
			"ShipmentIdList.member" => $ARRAY["ShipmentIdList.member"]
		);
		return simplexml_load_string(mws_signed_request($parameters, array("Action", "Request", "Version")));
	}
	public function ListInboundShipmentsByNextToken($ARRAY){
		//array(
		//	"NextToken" => ""
		//)
		$parameters = array(
			"Action" => "ListInboundShipmentsByNextToken", 
			"Request" => $this->REQUEST_TYPE,
			"Version" => $this->VERSION,
			"NextToken" => $ARRAY["NextToken"]
		);
		return simplexml_load_string(mws_signed_request($parameters, array("Action", "Request", "Version")));
	}
	public function UpdateInboundShipment($ARRAY){
		//array(
		//	"ShipmentId" => "",
		//	"InboundShipmentHeader.LabelPrepPreference" => "default SELLER_LABEL",
		//	"InboundShipmentHeader.ShipFromAddress.Name" => "",  <- URL Encode Shipping Items
		//	"InboundShipmentHeader.ShipFromAddress.AddressLine1" => "",
		//	"InboundShipmentHeader.ShipFromAddress.AddressLine2" => "",
		//	"InboundShipmentHeader.ShipFromAddress.City" => "",
		//	"InboundShipmentHeader.ShipFromAddress.StateOrProvinceCode" => "",
		//	"InboundShipmentHeader.ShipFromAddress.DistrictOrCounty" => "",
		//	"InboundShipmentHeader.ShipFromAddress.PostalCode" => "",
		//	"InboundShipmentHeader.ShipFromAddress.CountryCode" => "",
		//	"InboundShipmentHeader.DestinationFulfillmentCenterId" => "",
		//	"InboundShipmentHeader.ShipmentStatus" => "",
		//	"InboundShipmentItems.member" => array(array(SellerSKU, ASIN, QuantityShipped, Condition)), ...)
		//)
		$parameters = array(
			"Action" => "UpdateInboundShipment", 
			"Request" => $this->REQUEST_TYPE,
			"Version" => $this->VERSION,
			"ShipmentId" => $ARRAY["ShipmentId"],
			"InboundShipmentHeader.LabelPrepPreference" => $ARRAY["InboundShipmentHeader.LabelPrepPreference"],
			"InboundShipmentHeader.ShipFromAddress.Name" => $ARRAY["InboundShipmentHeader.ShipFromAddress.Name"],
			"InboundShipmentHeader.ShipFromAddress.AddressLine1" => $ARRAY["InboundShipmentHeader.ShipFromAddress.AddressLine1"],
			"InboundShipmentHeader.ShipFromAddress.AddressLine2" => $ARRAY["InboundShipmentHeader.ShipFromAddress.AddressLine2"],
			"InboundShipmentHeader.ShipFromAddress.City" => $ARRAY["InboundShipmentHeader.ShipFromAddress.City"],
			"InboundShipmentHeader.ShipFromAddress.StateOrProvinceCode" => $ARRAY["InboundShipmentHeader.ShipFromAddress.StateOrProvinceCode"],
			"InboundShipmentHeader.ShipFromAddress.DistrictOrCounty" => $ARRAY["InboundShipmentHeader.ShipFromAddress.DistrictOrCounty"],
			"InboundShipmentHeader.ShipFromAddress.PostalCode" => $ARRAY["InboundShipmentHeader.ShipFromAddress.PostalCode"],
			"InboundShipmentHeader.ShipFromAddress.CountryCode" => $ARRAY["InboundShipmentHeader.ShipFromAddress.CountryCode"],
			"InboundShipmentHeader.DestinationFulfillmentCenterId" => $ARRAY["InboundShipmentHeader.DestinationFulfillmentCenterId"],
			"InboundShipmentHeader.ShipmentStatus" => $ARRAY["InboundShipmentHeader.ShipmentStatus"],
			"InboundShipmentItems.member" => $ARRAY["InboundShipmentItems.member"]
		);
		return simplexml_load_string(mws_signed_request($parameters, array("Action", "Request", "Version")));
	}
}

//#################################################################################################
//#######################             Amazon Fulfillment Inventory API             ################
//#################################################################################################
class  amazon_fulfillment_inventory{
    /* Member privateiables */
    private $REQUEST_TYPE;
	private $VERSION;
   
	/* Member public functions */
	public function __construct(){ 
		$this->REQUEST_TYPE = "/FulfillmentInventory/2010-10-01";
		$this->VERSION = "2010-10-01";
	}
	public function GetServiceStatus(){
		$parameters = array(
			"Action" => "GetServiceStatus", 
			"Request" => $this->REQUEST_TYPE,
			"Version" => $this->VERSION
		);
		return simplexml_load_string(mws_signed_request($parameters, array("Action", "Request", "Version")));
	}
	public function ListInventorySupply($ARRAY){
		//array(
		//	"SellerSkus.member" => array(),
		//	"QueryStartDateTime" => "[YYYY]-[MM]-[DD]T[hh]:[mm]:[ss]",
		//	"ResponseGroup" => "Basic or Detailed"
		//)
		$parameters = array(
			"Action" => "ListInventorySupply", 
			"Request" => $this->REQUEST_TYPE,
			"Version" => $this->VERSION,
			"SellerSkus.member" => $ARRAY["SellerSkus.member"],
			"QueryStartDateTime" => $ARRAY["QueryStartDateTime"],
			"ResponseGroup" => $ARRAY["ResponseGroup"]
		);
		return simplexml_load_string(mws_signed_request($parameters, array("Action", "Request", "Version")));
	}
	public function ListInventorySupplyByNextToken($ARRAY){
		//array(
		//	"NextToken" => ""
		//)
		$parameters = array(
			"Action" => "ListInventorySupplyByNextToken", 
			"Request" => $this->REQUEST_TYPE,
			"Version" => $this->VERSION,
			"NextToken" => $ARRAY["NextToken"]
		);
		return simplexml_load_string(mws_signed_request($parameters, array("Action", "Request", "Version")));
	}
}

//#################################################################################################
//#######################             Amazon Fulfillment Outbound API             #################
//#################################################################################################
class  amazon_fulfillment_outbound{
    /* Member privateiables */
    private $REQUEST_TYPE;
	private $VERSION;
   
	/* Member public functions */
	public function __construct(){ 
		$this->REQUEST_TYPE = "/FulfillmentOutboundShipment/2010-10-01";
		$this->VERSION = "2010-10-01";
	}
	public function GetServiceStatus(){
		$parameters = array(
			"Action" => "GetServiceStatus", 
			"Request" => $this->REQUEST_TYPE,
			"Version" => $this->VERSION
		);
		return simplexml_load_string(mws_signed_request($parameters, array("Action", "Request", "Version")));
	}
	public function CancelFulfillmentOrder($ARRAY){
		//array(
		//	"SellerFulfillmentOrderId" => ""
		//)
		$parameters = array(
			"Action" => "CancelFulfillmentOrder", 
			"Request" => $this->REQUEST_TYPE,
			"Version" => $this->VERSION,
			"SellerFulfillmentOrderId" => $ARRAY["SellerFulfillmentOrderId"]
		);
		return simplexml_load_string(mws_signed_request($parameters, array("Action", "Request", "Version")));
	}
	public function CreateFulfillmentOrder($ARRAY){
		//array(
		//	"SellerFulfillmentOrderId" => "",
		//	"ShippingSpeedCategory" => "Standard, Expedited or Priority",
		//	"DestinationAddress.Name" => "", <- URL Encode Shipping Items
		//	"DestinationAddress.Line1" => "", 
		//	"DestinationAddress.Line2" => "",
		//	"DestinationAddress.City" => "",
		//	"DestinationAddress.CountryCode" => "",
		//	"DestinationAddress.StateOrProvinceCode" => "", 
		//	"DestinationAddress.PostalCode" => "",
		//	"DisplayableOrderId" => "",
		//	"DisplayableOrderComment" => "Seller Comment Here",
		//	"DisplayableOrderDateTime" => "[YYYY]-[MM]-[DD]T[hh]:[mm]:[ss]",
		//	"Items.member" => array(
		//		array(DisplayableComment, GiftMessage, PerUnitDeclaredValue.CurrencyCode, PerUnitDeclaredValue.Value, Quantity, SellerFulfillmentOrderItemId, SellerSKU), ...),
		//	"NotificationEmailList.member" => array()
		//)
		$parameters = array(
			"Action" => "CreateFulfillmentOrder", 
			"Request" => $this->REQUEST_TYPE,
			"Version" => $this->VERSION,
			"SellerFulfillmentOrderId" => $ARRAY["SellerFulfillmentOrderId"],
			"ShippingSpeedCategory" => $ARRAY["ShippingSpeedCategory"],
			"DestinationAddress.Name" => $ARRAY["DestinationAddress.Name"],
			"DestinationAddress.Line1" => $ARRAY["DestinationAddress.Line1"],
			"DestinationAddress.Line2" => $ARRAY["DestinationAddress.Line2"],
			"DestinationAddress.City" => $ARRAY["DestinationAddress.City"],
			"DestinationAddress.CountryCode" => $ARRAY["DestinationAddress.CountryCode"],
			"DestinationAddress.StateOrProvinceCode" => $ARRAY["DestinationAddress.StateOrProvinceCode"],
			"DestinationAddress.PostalCode" => $ARRAY["DestinationAddress.PostalCode"],
			"DisplayableOrderId" => $ARRAY["DisplayableOrderId"],
			"DisplayableOrderComment" => $ARRAY["DisplayableOrderComment"],
			"DisplayableOrderDateTime" => $ARRAY["DisplayableOrderDateTime"],
			"Items.member" => $ARRAY["Items.member"],
			"NotificationEmailList.member" => $ARRAY["NotificationEmailList.member"]
		);
		return simplexml_load_string(mws_signed_request($parameters, array("Action", "Request", "Version")));
	}
	public function GetFulfillmentOrder($ARRAY){
		//array(
		//	"SellerFulfillmentOrderId" => ""
		//)
		$parameters = array(
			"Action" => "GetFulfillmentOrder", 
			"Request" => $this->REQUEST_TYPE,
			"Version" => $this->VERSION,
			"SellerFulfillmentOrderId" => $ARRAY["SellerFulfillmentOrderId"]
		);
		return simplexml_load_string(mws_signed_request($parameters, array("Action", "Request", "Version")));
	}
	public function GetFulfillmentPreview($ARRAY){
		//array(
		//	"SellerFulfillmentOrderId" => "",
		//	"ShippingSpeedCategories" => array(Standard, Expedited or Priority),
		//	"Address.Name" => "", <- URL Encode Shipping Items
		//	"Address.Line1" => "", 
		//	"Address.Line2" => "",
		//	"Address.Line3" => "",
		//	"Address.City" => "",
		//	"Address.CountryCode" => "",
		//	"Address.StateOrProvinceCode" => "", 
		//	"Address.PostalCode" => "",
		//	"Address.DistrictOrCounty" => "",
		//	"Address.PhoneNumber" => "",
		//	"Items.member" => array(array(Quantity, SellerFulfillmentOrderItemId, SellerSKU, EstimatedShippingWeight, ShippingWeightCalculationMethod), ...)
		//)
		$parameters = array(
			"Action" => "GetFulfillmentPreview", 
			"Request" => $this->REQUEST_TYPE,
			"Version" => $this->VERSION,
			"SellerFulfillmentOrderId" => $ARRAY["SellerFulfillmentOrderId"],
			"ShippingSpeedCategories" => $ARRAY["ShippingSpeedCategories"],
			"Address.Name" => $ARRAY["Address.Name"],
			"Address.Line1" => $ARRAY["Address.Line1"],
			"Address.Line2" => $ARRAY["Address.Line2"],
			"Address.Line3" => $ARRAY["Address.Line3"],
			"Address.City" => $ARRAY["Address.City"],
			"Address.CountryCode" => $ARRAY["Address.CountryCode"],
			"Address.StateOrProvinceCode" => $ARRAY["Address.StateOrProvinceCode"],
			"Address.PostalCode" => $ARRAY["Address.PostalCode"],
			"Address.DistrictOrCounty" => $ARRAY["Address.DistrictOrCounty"],
			"Address.PhoneNumber" => $ARRAY["Address.PhoneNumber"],
			"Items.member" => $ARRAY["Items.member"]
		);
		return simplexml_load_string(mws_signed_request($parameters, array("Action", "Request", "Version")));
	}
	public function GetPackageTrackingDetails($ARRAY){
		//array(
		//	"PackageNumber" => ""
		//)
		$parameters = array(
			"Action" => "GetPackageTrackingDetails", 
			"Request" => $this->REQUEST_TYPE,
			"Version" => $this->VERSION,
			"PackageNumber" => $ARRAY["PackageNumber"]
		);
		return simplexml_load_string(mws_signed_request($parameters, array("Action", "Request", "Version")));
	}
	public function ListAllFulfillmentOrders($ARRAY){
		//array(
		//	"QueryStartDateTime" => "[YYYY]-[MM]-[DD]T[hh]:[mm]:[ss]",
		//	"FulfillmentMethod.member" => array()
		//)
		$parameters = array(
			"Action" => "ListAllFulfillmentOrders", 
			"Request" => $this->REQUEST_TYPE,
			"Version" => $this->VERSION,
			"QueryStartDateTime" => $ARRAY["QueryStartDateTime"],
			"FulfillmentMethod.member" => $ARRAY["FulfillmentMethod.member"]
		);
		return simplexml_load_string(mws_signed_request($parameters, array("Action", "Request", "Version")));
	}
	public function ListAllFulfillmentOrdersByNextToken($ARRAY){
		//array(
		//	"NextToken" => ""
		//)
		$parameters = array(
			"Action" => "ListAllFulfillmentOrdersByNextToken", 
			"Request" => $this->REQUEST_TYPE,
			"Version" => $this->VERSION,
			"NextToken" => $ARRAY["NextToken"]
		);
		return simplexml_load_string(mws_signed_request($parameters, array("Action", "Request", "Version")));
	}
}
?>