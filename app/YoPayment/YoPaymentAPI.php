<?php 
/*
 * Yopayments - A platform that enables business receive or make payments from their mobile money accounts.
 *
 *
 * Copyright (C) 2006-2016 Yo! Uganda Limited, www.yo.co.ug,
 * All Rights Reserved
 *
 * Unauthorized redistribution of this software in any form or on any
 * medium is strictly prohibited. This software is released under a
 * license agreement and may be used or copied only in accordance with
 * the terms thereof. It is against the law to copy the software on
 * any other medium, except as specifically provided in the license
 * agreement.  No part of this publication may be reproduced, stored
 * in a retrieval system, or transmitted in any form or by any means,
 * electronic, mechanical, photocopied, recorded or otherwise, without
 * the prior written permission of Yo! Uganda Limited.
 */

namespace App\YoPayment; //Specifies a custom namespace for the class
 
use DOMDocument;
use SimpleXMLElement;

class YoPaymentAPI {

	var $sent_xml = "";//This is to store xml data sent.
	var $returned_xml = '';//To store returned xml data.
	var $error = "";//THis is to store any errors reported.
	
	var $url = "https://pay1.yo.co.ug/ybs/task.php";
	var $api_username = "";
	var $api_password = "";
	
	//var $sandbox_url = "http://41.220.12.206/services/yopaymentsdev/task.php";
	//var $sandbox_api_username = "";
	//var $sandbox_api_password = "";
	
	var $mode = "live";
	/*
	* Constructor YoPaymentAPI initialized details on Object creation.
	* sets URLs and the API system to use.
	* 
	* @Param $credentials 	-Assoc array with:
	*							api_username, api_password,
	*							sandbox_api_username and sandbox_api_password.
	* 
	* @Param $mode			- String which can be set to 'live' or 'test' to indicate
	*							whether to submit request to Sandbox or Product system.
	* 
	* Returns Void.
	*/
	function __construct($credentials, $mode="live", $use_pay1=false)
	{
		$this->mode = $mode;
		if ($use_pay1) {
			$this->url = "https://pay1.yo.co.ug/ybs/task.php";
		}
		
		$this->api_username = $credentials['api_username'];
		$this->api_password = $credentials['api_password'];
		//$this->sandbox_api_username = $credentials['sandbox_api_username'];
		//$this->sandbox_api_password = $credentials['sandbox_api_password'];
		if (strcmp(strtolower($this->mode), "test")==0) {
			$this->api_username = $this->sandbox_api_username; 
			$this->api_password = $this->sandbox_api_password;
			$this->url = $this->sandbox_url;
		} else {
			$this->api_username = $this->api_username; 
			$this->api_password = $this->api_password;
			$this->url = $this->url;
		}
	}
	
	
	/*
	 * The function followUpTransaction below enables you to check up on the transaction that was earlier initiated. 
	 * In the response from the request that was made, there was transaction Reference id that uniquely identifies a particular transaction
	 * 
	 * @Parma $transaction_reference	-String the transaction reference returned earlier when you submitted transaction request.
	 * 
	 * Returns	- Integer 0 if any error occurs.
				- An associative array with response fields as described in the API document.
	*/
	
	public function followUpTransaction($data)
	{
		$xml_format = '<?xml version="1.0" encoding="UTF-8"?>
					<AutoCreate> 
						<Request>
							<APIUsername>'.$this->api_username.'</APIUsername>
							<APIPassword>'.$this->api_password.'</APIPassword>
							<Method>actransactioncheckstatus</Method>';
		foreach ($data as $field=>$value) {
			if (strlen($value)>0)
				$xml_format .= "<$field>".htmlspecialchars($value)."</$field>";
		}
		$xml_format .= '</Request> 
					</AutoCreate>';
		$this->sent_xml = $this->formatXml($xml_format);		
		try { 
			$content = $this->request($this->url, $xml_format);	
			@$return_array = new SimpleXMLElement( $content );
			$this->returned_xml = $this->formatXml($content);
		} catch (Exception $ex) {
			return 0;
		}
	
		if ($content !== "Error"  ) {
			//Extracting the fields of returned XML string in to an object array. 
			$return = array();
			$return["Status"] = (isset($return_array->Response[0]->Status) ? $return_array->Response[0]->Status : '');
			$return["StatusCode"] = (isset($return_array->Response[0]->StatusCode) ? $return_array->Response[0]->StatusCode: '');
			$return["StatusMessage"] = (isset($return_array->Response[0]->StatusMessage) ? $return_array->Response[0]->StatusMessage : '');
			$return["ErrorMessage"] = (isset($return_array->Response[0]->ErrorMessage) ? $return_array->Response[0]->ErrorMessage : '');
			$return["TransactionStatus"] = (isset($return_array->Response[0]->TransactionStatus) ? 
			$return_array->Response[0]->TransactionStatus : '');
			$return["TransactionReference"] = (isset($return_array->Response[0]->TransactionReference) ? 
			$return_array->Response[0]->TransactionReference : '');
			return $return;
		} else {
			return 0;
		}
		
	}
	
	
	
	/*
	* The function checkAccBalance below enables you to check for you account balance with Yo Payments acocunt.
	* 
	* @Param - None.
	* Returns	- Integer 0 if any error occurs.
				- An associative array with response fields as described in the API document.
	*/
	
	public function checkAccBalance()
	{
		$xml_format = '<?xml version="1.0" encoding="UTF-8"?>
					<AutoCreate> 
						<Request>
							<APIUsername>'.$this->api_username.'</APIUsername>
							<APIPassword>'.$this->api_password.'</APIPassword>
							<Method>acacctbalance</Method> 
						</Request> 
					</AutoCreate>';
		
			//Extracting the fields of returned XML string in to an object array. 
		$this->sent_xml = $this->formatXml($xml_format);		
		try { 
			$content = $this->request($this->url, $xml_format);	
			@$return_array = new SimpleXMLElement( $content );
			$this->returned_xml = $this->formatXml($content);
		} catch (Exception $ex) {
			return 0;
		}

		if ($return_array) {
			$return = array();
			$return["Status"] = (isset($return_array->Response[0]->Status) ? 
			$return_array->Response[0]->Status : '');
			$return["StatusCode"] = (isset($return_array->Response[0]->StatusCode) ? 
			$return_array->Response[0]->StatusCode: '');
			$return["balance"] = (isset($return_array->Response[0]->Balance) ? 
			$return_array->Response[0]->Balance : array());
			$return["StatusMessage"] = (isset($return_array->Response[0]->StatusMessage) ? 
			$return_array->Response[0]->StatusMessage : '');
			$return["ErrorMessage"] = (isset($return_array->Response[0]->ErrorMessage) ? 
			$return_array->Response[0]->ErrorMessage : '');
			
			return $return;
		} else {
			return 0;
		}
	}
	
	/*
	#This funciton below will handle the Depositing of funds from a mobile money 
	* account to your Yo! Payments account.
	*
	* @Param $data	-Assoc array of fields required as described in the API. See the example file.
	* 
	* Returns	- Integer 0 if any error occurs.
				- An associative array with response fields as described in the API document.
	*/
	public function depositFunds($data)
	{
		$arg = func_get_args();
		$xml_format = '<?xml version="1.0" encoding="UTF-8"?><AutoCreate><Request>
						<APIUsername>'.$this->api_username.'</APIUsername>
						<APIPassword>'.$this->api_password.'</APIPassword>';
		$xml_format .='<Method>acdepositfunds</Method>';
		foreach ($data as $field=>$value)
			$xml_format .= "<$field>".htmlspecialchars($value)."</$field>";
		$xml_format.='</Request></AutoCreate>';

		$this->sent_xml = $this->formatXml($xml_format);		
		try { 
			$content = $this->request($this->url, $xml_format);	
			@$return_array = new SimpleXMLElement( $content );
			$this->returned_xml = $this->formatXml($content);
		} catch (Exception $ex) {
			return 0;
		}
		if ($content !== "Error"  ) {
			//Extracting the fields of returned XML string in to an object array. 
			$return = array();
			$return["Status"] = (isset($return_array->Response[0]->Status) ? $return_array->Response[0]->Status : '');
			$return["StatusCode"] = (isset($return_array->Response[0]->StatusCode) ? $return_array->Response[0]->StatusCode: '');
			$return["StatusMessage"] = (isset($return_array->Response[0]->StatusMessage) ? $return_array->Response[0]->StatusMessage : '');
			$return["ErrorMessage"] = (isset($return_array->Response[0]->ErrorMessage) ? $return_array->Response[0]->ErrorMessage : '');
			$return["TransactionStatus"] = (isset($return_array->Response[0]->TransactionStatus) ? 
			$return_array->Response[0]->TransactionStatus : '');
			$return["TransactionReference"] = (isset($return_array->Response[0]->TransactionReference) ? 
			$return_array->Response[0]->TransactionReference : '');
			return $return;
		} else {
			return 0;
		}
		
	}
	/*
	* formatXml formats the xml data so 
	* that it can look funcy for display.
	* 
	* Returns the funcy XML data.
	*/
	private function formatXml($xml)
	{
		$dom = new DOMDocument();
		$dom->preserveWhiteSpace = false;
		$dom->formatOutput = true;
		$dom->loadXML($xml);
		return $dom->saveXML();
	}
	
	/*
	* The method withdrawFunds below handles withdraw of funds 
	* from Yo! Payments account to a mobile money account.
	*
	* @Param $data	-Assoc array of fields required as described in the API. See the example file.
	* 
	* Returns	- Integer 0 if any error occurs.
				- An associative array with response fields as described in the API document.
	*/
	public function withdrawFunds($data)
	{
		$arg = func_get_args();
		$xml_format = '<?xml version="1.0" encoding="UTF-8"?><AutoCreate><Request>
						<APIUsername>'.$this->api_username.'</APIUsername>
						<APIPassword>'.$this->api_password.'</APIPassword>';
		$xml_format .='<Method>acwithdrawfunds</Method>';
		foreach ($data as $field=>$value)
			$xml_format .= "<$field>".htmlspecialchars($value)."</$field>";
		$xml_format.='</Request></AutoCreate>';
		
		$this->sent_xml = $this->formatXml($xml_format);		
		try { 
			$content = $this->request($this->url, $xml_format);	
			@$return_array = new SimpleXMLElement( $content );
			$this->returned_xml = $this->formatXml($content);
		} catch (Exception $ex) {
			return 0;
		}
		
		if ($content !== "Error" ) {
		//Extracting the fields of returned XML string in to an object array. 
			$return_array = new SimpleXMLElement( $content );
			$return = array();
			$return["Status"] = (string)(isset($return_array->Response[0]->Status) ? $return_array->Response[0]->Status : '');
			$return["StatusCode"] = (string)(isset($return_array->Response[0]->StatusCode) ? $return_array->Response[0]->StatusCode: '');
			$return["StatusMessage"] = (string)(isset($return_array->Response[0]->StatusMessage) ? $return_array->Response[0]->StatusMessage : '');
			$return["ErrorMessage"] = (string)(isset($return_array->Response[0]->ErrorMessage) ? $return_array->Response[0]->ErrorMessage : '');
			$return["TransactionStatus"] = (string)(isset($return_array->Response[0]->TransactionStatus) ? 
			$return_array->Response[0]->TransactionStatus : '');
			$return["TransactionReference"] = (string)(isset($return_array->Response[0]->TransactionReference) ? 
			$return_array->Response[0]->TransactionReference : '');
			return $return;
		} else {
			// Return status 0 if the request was unsuccessful.
			return 0;
		}
	}
	/*
	* This funciton below submits a request to send Airtime to a specified mobile number.
	*
	* @Param $data	-Assoc array of fields required as described in the API. See the example file.
	* Returns	- Integer 0 if any error occurs.
				- An associative array with response fields as described in the API document.
	*/
	public function sendAirtime($data)
	{
		$arg = func_get_args();
		$xml_format = '<?xml version="1.0" encoding="UTF-8"?><AutoCreate><Request>
						<APIUsername>'.$this->api_username.'</APIUsername>
						<APIPassword>'.$this->api_password.'</APIPassword>';
		$xml_format .='<Method>acsendairtimemobile</Method>';
		foreach ($data as $field=>$value)
			$xml_format .= "<$field>".htmlspecialchars($value)."</$field>";
		$xml_format.='</Request></AutoCreate>';
		
		//Extracting the fields of returned XML string in to an object array. 
		$this->sent_xml = $this->formatXml($xml_format);		
		try { 
			$content = $this->request($this->url, $xml_format);	
			@$return_array = new SimpleXMLElement( $content );
			$this->returned_xml = $this->formatXml($content);
		} catch (Exception $ex) {
			return 0;
		}
		
		if ($content !== "Error" ) {
		//Extracting the fields of returned XML string in to an object array. 
			//$return_array = new SimpleXMLElement( $content );
			$return = array();
			$return["Status"] = (isset($return_array->Response[0]->Status) ? $return_array->Response[0]->Status : '');
			$return["StatusCode"] = (isset($return_array->Response[0]->StatusCode) ? $return_array->Response[0]->StatusCode: '');
			$return["StatusMessage"] = (isset($return_array->Response[0]->StatusMessage) ? $return_array->Response[0]->StatusMessage : '');
			$return["ErrorMessage"] = (isset($return_array->Response[0]->ErrorMessage) ? $return_array->Response[0]->ErrorMessage : '');
			$return["TransactionStatus"] = (isset($return_array->Response[0]->TransactionStatus) ? 
			$return_array->Response[0]->TransactionStatus : '');
			$return["TransactionReference"] = (isset($return_array->Response[0]->TransactionReference) ? 
			$return_array->Response[0]->TransactionReference : '');
			return $return;
		} else {
			// Return status "error" if the request was unsuccessful.
			return $content;
		}
	}	
	/*
	* This funciton below will handle the Internal transfer of funds from 
	* one Yopayment business account to another.
	*
	* @Param $data	-Assoc array of fields required as described in the API. See the example file.
	*
	* Returns	- Integer 0 if any error occurs.
				- An associative array with response fields as described in the API document.
	*/
	public function internalTransfer($data)
	{
		//Extract all arguments passed in to an array.
		$arg = func_get_args();
		// Create an XML string for internale transfer.
		$xml_format = '<?xml version="1.0" encoding="UTF-8"?><AutoCreate><Request>
						<APIUsername>'.$this->api_username.'</APIUsername>
						<APIPassword>'.$this->api_password.'</APIPassword>';
		$xml_format .='<Method>acinternaltransfer</Method>';
		foreach ($data as $field=>$value)
			$xml_format .= "<$field>".htmlspecialchars($value)."</$field>";
		$xml_format.='</Request></AutoCreate>';
		
		$this->sent_xml = $this->formatXml($xml_format);		
		try { 
			$content = $this->request($this->url, $xml_format);	
			@$return_array = new SimpleXMLElement( trim($content) );
			$this->returned_xml = $this->formatXml($content);
		} catch (Exception $ex) {
			return 0;
		}

		if ($content !== "Error") {
			//Extracting the fields of returned XML string in to an object array. 
			$return_array = new SimpleXMLElement( $content );
			$return = array();
			$return["Status"] = (isset($return_array->Response[0]->Status) ? $return_array->Response[0]->Status : '');
			$return["StatusCode"] = (isset($return_array->Response[0]->StatusCode) ? $return_array->Response[0]->StatusCode: '');
			$return["StatusMessage"] = (isset($return_array->Response[0]->StatusMessage) ? $return_array->Response[0]->StatusMessage : '');
			$return["ErrorMessage"] = (isset($return_array->Response[0]->ErrorMessage) ? $return_array->Response[0]->ErrorMessage : '');
			$return["TransactionStatus"] = (isset($return_array->Response[0]->TransactionStatus) ? 
			$return_array->Response[0]->TransactionStatus : '');
			$return["TransactionReference"] = (isset($return_array->Response[0]->TransactionReference) ? 
			$return_array->Response[0]->TransactionReference : '');
			
			return $return;
		} else {
			// Return status 0 if the request was unsuccessful.
			return 0;
		}
	}
	
	/*
	###################################################################################################################################
	#This function makes internal HTTP request to the server. 
	# It takes two main arguments: 
	#1) Url - This the url where the Request is made. 
	#2) Data - The real content of data you are sending to the server. 
	# It returns the content from the server when the request is successfuly and and string "Error" when the request has failed.
	#Note: please make sure the cURL extenstion is enabled in your server otherwise the requests will fail.
	###################################################################################################################################
	*/
	
	private function request($url,$data)
	{
		set_time_limit(180);
		$headers = array(
			'Content-type: text/xml', 
			'Content-length: '.strlen($data), 
			'Content-transfer-encoding: text'
		);
		try {
			$ch = curl_init();
			curl_setopt($ch, CURLOPT_URL, $url);
			//if (strcmp(strtolower($this->mode), "test")==0) {
				curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
				curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);
			/*} else {
				curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, TRUE);//Change this to TRUE in production
				curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, TRUE);//Change this to TRUE in production
			}*/
			curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1 );
			curl_setopt($ch, CURLOPT_POST,           1 );
			curl_setopt($ch, CURLOPT_POSTFIELDS,     $data ); 
			curl_setopt($ch, CURLOPT_HTTPHEADER,     $headers ); 
			$response = curl_exec($ch);
			$error =curl_error($ch);
			if (strlen($error) > 0)
				$this->error = $error;	
			return trim($response);
		} catch (Exception $ex) {
			$this->error = $ex->getMessage();
			return "Error";
		}
	}
	
}

?>
