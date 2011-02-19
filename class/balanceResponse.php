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
along with Free Liberty Reserve API.  If not, see <http://www.gnu.org/licenses/>.
////////////////////////////////////////////////////////////////*/
require_once("balance.php");
require_once("error.php");

Class BalanceResponse
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

     private function createBalanceClass(&$balance)
     {
	  $AccountNumber = $balance->getElementsByTagName("AccountId")->item(0)->nodeValue;
	  $currency = $balance->getElementsByTagName("CurrencyId")->item(0)->nodeValue; 
	  $date = $balance->getElementsByTagName("Date")->item(0)->nodeValue;
	  $amount = $balance->getElementsByTagName("Value")->item(0)->nodeValue;

	  return new Balance($accountNumber, $currency, $date, $amount);
     }

     private function createErrorClass(&$error)
     {
	  $code = $error->getElementsByTagName("Code")->item(0)->nodeValue;
	  $text = $error->getElementsByTagName("Text")->item(0)->nodeValue;
	  $description = $error->getElementsByTagName("Description")->item(0)->nodeValue;

	  return new Error($code, $text, $description);
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
	       if ($response->tagName =="Balance")
	       {
		    $balance = $this->createBalanceClass($response);
		    $responseList[] = $balance;
	       }
	       else if ($response->tagName =="Error")
	       {
		    $error = $this->createErrorClass($response);
		    $responseList[] = $error;
	       }
	  }
	  
	  return $responseList;
     }

     public function createBalanceClassList()
     {
	  $balanceList = array();
	  
	  $doc = $this->createDomDocument();
	  $rootElement = $doc->documentElement;
	  $list = $doc->getElementsByTagName("Balance");
	  foreach($list as $response)
	  {
	       $balance= $this->createBalanceClass($response);
	       $balanceList[] = $balance;
	  }

	  return $balanceList;
     } 

     public function createErrorClassList()
     {
	  $errorList = array();
	  
	  $rootElement = $this->domDocument->documentElement;
	  $responseList = $this->domDocument->getElementsByTagName("Error");
	  foreach($responseList as $response)
	  {
	       $error = $this->createErrorClass($response);
	       $errorList[] = $error;
	  }

	  return $errorList;
     }
}
?>
