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

Class TransferRequest
{
     private $id; 
     private $apiName;
     private $token;
     private $operationList;

     public function __construct($id, $apiName, $token, &$operation)
     {
	  $this->id = $id;
	  $this->apiName = $apiName;
	  $this->token = $token;
	  $this->operationList = array();
	  $this->operationList[]=$operation;
     }
     
     private function createDomDocument()
     {
	  $doc = new DomDocument();
	  $transferRequest = $doc->createElement("TransferRequest");
	  $transferRequest->setAttribute("id",$this->id);
	  $transferRequestNode = $doc->appendChild($transferRequest);
	  
	  $auth = new DOMElement("Auth");
	  $authNode = $transferRequestNode->appendChild($auth);
	  $api = new DOMElement("ApiName",$this->apiName);
	  $authNode->appendChild($api);
	  $token = new DOMElement("Token",$this->token);
	  $authNode->appendChild($token);
	  
	  foreach ($this->operationList as $operation)
	  {
	       $transfer = new DOMElement("Transfer");
	       $transferNode = $transferRequestNode->appendChild($transfer);
	       $ref = $operation->getMerchantRef();
	       if (!empty($ref)) //optionnal
	       {
		    $transferId = new DOMElement("TransferId",$ref);
		    $transferNode->appendChild($transferId);
	       }
	       $transferType = new DOMElement("TransferType",$operation->getType());
	       $transferNode->appendChild($transferType);
	       $payer = new DOMElement("Payer",$operation->getPayerAccountNumber());
	       $transferNode->appendChild($payer);
	       $payee = new DOMElement("Payee",$operation->getPayeeAccountNumber());
	       $transferNode->appendChild($payee);
	       $currency = new DOMElement("CurrencyId",$operation->getCurrency());
	       $transferNode->appendChild($currency);
	       $amount = new DOMElement("Amount",$operation->getAmount());
	       $transferNode->appendChild($amount);
	       $mem = $operation->getMemo();
	       if (!empty($mem)) //optionnal
	       {
		    $memo = new DOMElement("Memo",$mem);
		    $transferNode->appendChild($memo);
	       }
	       $anonymous = new DOMElement("Anonymous",$operation->getAnonymous());
	       $transferNode->appendChild($anonymous);
	  }

	  return $doc;
     }

     public function createString()
     {
	  return $this->createDomDocument()->saveXML();
     }

     public function addOperation(&$operation)
     {
	  $this->operationList[]=$operation;
     }
}
?>
