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
require_once("accountName.php");
require_once("error.php");

Class AccountNameResponse
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

     private function createAccountNameClass(&$account)
     {
	  $AccountToRetrieve = $account->getElementsByTagName("AccountToRetrieve")->item(0)->nodeValue;
	  $date = $account->getElementsByTagName("Date")->item(0)->nodeValue;
	  $name = $account->getElementsByTagName("Name")->item(0)->nodeValue;

	  return new AccountName($accountToRetrieve, $name, $date);
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
	       if ($response->tagName =="AccountName")
	       {
		    $account = $this->createAccountNameClass($response);
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

     public function createAccountNameClassList()
     {
	  $accountNameList = array();
	  
	  $doc = $this->createDomDocument();
	  $rootElement = $doc->documentElement;
	  $list = $doc->getElementsByTagName("AccountName");
	  foreach($list as $response)
	  {
	       $account= $this->createBalanceClass($response);
	       $accountNameList[] = $account;
	  }

	  return $accountNameList;
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
}
?>
