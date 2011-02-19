<?php
/* ////////////////////////////////////////////////////////
Description : Free Liberty Reserve API
Release Date : May 27, 2010
Release Version : 1.0
Developper : Dirac

Copyright (c) <2010> <Dirac>

This file is part of Free Liberty Reserve API.

Free Liberty Reserve API is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 3 of the License, or
(at your option) any later version.

Free Liberty Reserve API is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with Foobar.  If not, see <http://www.gnu.org/licenses/>.
////////////////////////////////////////////////////////////////*/
require_once("receipt.php");
require_once("error.php");
require_once("pager.php");

Class HistoryResponse
{
     private $response;

     public function __construct(&$response)
     {
	  $this->response = $response;
     }
     
     public function checkId($requestId)
     {
	  $doc = $this->createDomDocument();
	  $rootElement = $doc->documentElement;
	  $responseId = $rootElement->getAttribute("id");
	  if ($responseId == $requestId)
	  {
	       return true;
	  }
	  else
	  {
	       return false;
	  }
     }

     public function createDomDocument()
     {
	  $doc = new DOMDocument();
	  $doc->loadXML($this->response);

	  return $doc;
     }

     private function createReceiptClass(&$receipt)
     {
	  $transactionId = $receipt->getElementsByTagName("ReceiptId")->item(0)->nodeValue;
	  $transactionDate = $receipt->getElementsByTagName("Date")->item(0)->nodeValue;
	  $payerAccountName = $receipt->getElementsByTagName("PayerName")->item(0)->nodeValue;
	  $payeeAccountName = $receipt->getElementsByTagName("PayeeName")->item(0)->nodeValue;
	  $amountResponse = $receipt->getElementsByTagName("Amount")->item(0)->nodeValue;
	  $fee = $receipt->getElementsByTagName("Fee")->item(0)->nodeValue;
	  $accountBalance = $receipt->getElementsByTagName("ClosingBalance")->item(0)->nodeValue;
	  $merchantRef = $receipt->getElementsByTagName("TransferId")->item(0)->nodeValue; 
	  $type = $receipt->getElementsByTagName("TransferType")->item(0)->nodeValue; 
	  $payerAccountNumber = $receipt->getElementsByTagName("Payer")->item(0)->nodeValue;
	  $payeeAccountNumber = $receipt->getElementsByTagName("Payee")->item(0)->nodeValue;
	  $currency = $receipt->getElementsByTagName("CurrencyId")->item(0)->nodeValue; 
	  $amountRequest = $receipt->getElementsByTagName("Transfer")->item(0)->getElementsByTagName("Amount")->item(0)->nodeValue;
	  $memo = $receipt->getElementsByTagName("Memo")->item(0)->nodeValue;
	  $anonymous = $receipt->getElementsByTagName("Anonymous")->item(0)->nodeValue;
	  $source = $receipt->getElementsByTagName("Source")->item(0)->nodeValue;

	  return new Receipt($transactionId, $transactionDate, $payerAccountName, $payeeAccountName, $amountResponse, $fee, $accountBalance, $payerAccountNumber, $payeeAccountNumber, $currency, $amountRequest, $anonymous, $merchantRef, $type, $memo, $source);
     }

     private function createErrorClass(&$error)
     {
	  $code = $error->getElementsByTagName("Code")->item(0)->nodeValue;
	  $text = $error->getElementsByTagName("Text")->item(0)->nodeValue;
	  $description = $error->getElementsByTagName("Description")->item(0)->nodeValue;

	  return new Error($code, $text, $description);
     }

     private function createPagerClass(&$pager)
     {
	  $size = $pager->getElementsByTagName("PageSize")->item(0)->nodeValue;
	  $count = $pager->getElementsByTagName("PageCount")->item(0)->nodeValue;
	  $number = $pager->getElementsByTagName("PageNumber")->item(0)->nodeValue;
	  $total = $pager->getElementsByTagName("TotalCount")->item(0)->nodeValue;

	  return new Pager($size, $count, $number, $total);
     }

     public function getResponse()
     {
	  return $this->response;
     }

     public function createResponseClassList()
     {
	  $responseList = array();
	  
	  $doc = $this->createDomDocument();
	  $rootElement = $doc->documentElement;
	  $list = $doc->getElementsByTagName("*");
	  foreach($list as $response)
	  {
	       if ($response->tagName =="Pager")
	       {
		    $pager = $this->createReceiptClass($response);
		    $responseList[] = $pager;
	       }
	       else if ($response->tagName =="Receipt")
	       {
		    $receipt = $this->createErrorClass($response);
		    $responseList[] = $receipt;
	       }
	       else if ($response->tagName =="Error")
	       {
		    $error = $this->createErrorClass($response);
		    $responseList[] = $error;
	       }
	  }

	  return $responseList;
     }

     public function createReceiptClassList()
     {
	  $receiptList = array();
	  
	  $doc = $this->createDomDocument();
	  $rootElement = $doc->documentElement;
	  $list = $doc->getElementsByTagName("Receipt");
	  foreach($list as $response)
	  {
	       $receipt = $this->createReceiptClass($response);
	       $receiptList[] = $receipt;
	  }

	  return $receiptList;
     } 

     public function createErrorClassList()
     {
	  $errorList = array();
	  
	  $doc = $this->createDomDocument();
	  $rootElement = $doc->documentElement;
	  $responseList = $doc->getElementsByTagName("Error");
	  foreach($responseList as $response)
	  {
	       $error = $this->createErrorClass($response);
	       $errorList[] = $error;
	  }

	  return $errorList;
     }

     public function createPagerClassList()
     {
	  $pagerList = array();

	  $doc = $this->createDomDocument();
	  $rootElement = $doc->documentElement;
	  $responseList = $doc->getElementsByTagName("Pager");
	  foreach($responseList as $response)
	  {
	       $pager = $this->createPagerClass($response);
	       $pagerList[] = $pager;
	  }

	  return $pagerList;
     }
}
?>
