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
require_once("class/historyOperation.php");

Class HistoryRequest
{
     private $id; 
     private $apiName;
     private $token;
     private $history;

     public function __construct($id, $apiName, $token, &$history)
     {
	  $this->id = $id;
	  $this->apiName = $apiName;
	  $this->token = $token;
	  $this->history = $history;
     }
     
     private function createDomDocument()
     {
	  $doc = new DomDocument();
	  $historyRequest = $doc->createElement("HistoryRequest");
	  $historyRequest->setAttribute("id",$this->id);
	  $historyRequestNode = $doc->appendChild($historyRequest);

	  $auth = new DOMElement("Auth");
	  $authNode = $historyRequestNode->appendChild($auth);
	  $api = new DOMElement("ApiName",$this->apiName);
	  $authNode->appendChild($api);
	  $token = new DOMElement("Token",$this->token);
	  $authNode->appendChild($token);

	  $history = new DOMElement("History");
	  $historyNode = $historyRequestNode->appendChild($history);
	  $currency = $this->history->getCurrency();
	  if (!empty($currency)) //optionnal
	  {
	       $currencyId = new DOMElement("CurrencyId",$currency);
	       $historyNode->appendChild($currencyId);
	  }
	  $accountId = new DOMElement("AccountId",$this->history->getAccountNumber());
	  $historyNode->appendChild($accountId);
	  $date = $this->history->getStartDate();
	  if (!empty($date)) //optionnal
	  {
	       $from = new DOMElement("From",$date);
	       $historyNode->appendChild($from);
	  }
	  $date = $this->history->getEndDate();
	  if (!empty($date)) //optionnal
	  {
	       $till = new DOMElement("Till",$date);
	       $historyNode->appendChild($till);
	  }
	  $number = $this->history->getCorrespondingAccountNumber();
	  if (!empty($number)) //optionnal
	  {
	       $correspondingAccountId = new DOMElement("CorrespondingAccountId",$number);
	       $historyNode->appendChild($correspondingAccountId);
	  }
	  $direc = $this->history->getDirection();
	  if (!empty($direc)) //optionnal
	  {
	       $direction = new DOMElement("Direction",$direc);
	       $historyNode->appendChild($direction);
	  }
	  $ref = $this->history->getMerchantRef();
	  if (!empty($ref)) //optionnal
	  {
	       $transferId = new DOMElement("TransferId",$ref);
	       $historyNode->appendChild($transferId);
	  }
	  $trans = $this->history->getTransactionId();
	  if (!empty($trans)) //optionnal
	  {
	       $receiptId = new DOMElement("ReceiptId",$trans);
	       $historyNode->appendChild($receiptId);
	  }
	  $type = $this->history->getType();
	  if (!empty($type)) //optionnal
	  {
	       $transferType = new DOMElement("TransferType",$type);
	       $historyNode->appendChild($transferType);
	  }
	  $src = $this->history->getSource();
	  if (!empty($src)) //optionnal
	  {
	       $source = new DOMElement("Source",$src);
	       $historyNode->appendChild($source);
	  }
	  $anonym = $this->history->getAnonymity();
	  if (!empty($anonym)) //optionnal
	  {
	       $anonymous = new DOMElement("Anonymous",$anonym);
	       $historyNode->appendChild($anonymous);
	  }
	  $amount = $this->history->getMinAmount();
	  if (!empty($amount)) //optionnal
	  {
	       $amountFrom = new DOMElement("AmountFrom",$amount);
	       $historyNode->appendChild($amountFrom);
	  }
	  $amount = $this->history->getMaxAmount();
	  if (!empty($amount)) //optionnal
	  {
	       $amountTo = new DOMElement("AmountTo",$amount);
	       $historyNode->appendChild($amountTo);
	  }
	  $size = $this->history->getPageSize();
	  $number = $this->history->getPageNumber();
	  if (!empty($size) AND !empty($number)) //optionnal
	  {
	       $pager = new DOMElement("Pager");
	       $pagerNode = $historyNode->appendChild($pager);
	       $pageSize = new DOMElement("PageSize",$size);
	       $pagerNode->appendChild($pageSize);
	       $pageNumber = new DOMElement("PageNumber",$number);
	       $pagerNode->appendChild($pageNumber);
	  }
	  
	  return $doc;
     }

     public function createString()
     {
	  return $this->createDomDocument()->saveXML();
     }
}
?>
