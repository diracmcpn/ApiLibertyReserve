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

Class AccountNameRequest
{
     private $id; 
     private $apiName;
     private $token;
     private $accountNameList;

     public function __construct($id, $apiName, $token, &$accountName)
     {
	  $this->id = $id;
	  $this->apiName = $apiName;
	  $this->token = $token;
	  $this->accountNameList = array();
	  $this->accountNameList[] = $accountName;
     }
     
     private function createDomDocument()
     {
	  $doc = new DomDocument();
	  $accountRequest = $doc->createElement("AccountNameRequest");
	  $accountRequest->setAttribute("id",$this->id);
	  $accountRequestNode = $doc->appendChild($accountRequest);

	  $auth = new DOMElement("Auth");
	  $authNode = $accountRequestNode->appendChild($auth);
	  $api = new DOMElement("ApiName",$this->apiName);
	  $authNode->appendChild($api);
	  $token = new DOMElement("Token",$this->token);
	  $authNode->appendChild($token);

	  foreach ($this->accountNameList as $accountName)
	  {
	       $account = new DOMElement("AccountName");
	       $accountNode = $accountRequestNode->appendChild($account);
	       $accountId = new DOMElement("AccountId",$accountName->getAccountNumber());
	       $accountNode->appendChild($accountId);
	       $accountToRetrieve = new DOMElement("AccountToRetrieve",$accountName->getAccountToRetrieve());
	       $accountNode->appendChild($accountToRetrieve);
	  }

	  return $doc;
     }

     public function createString()
     {
	  return $this->createDomDocument()->saveXML();
     }

     public function addOperation(&$account)
     {
	  $this->accountList[]=$account;
     }

}
?>
