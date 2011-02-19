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

Class HistoryOperation
{
     private $currency; //LRUSD or LREUR (optionnal) (omitted = any)
     private $accountNumber;
     private $startDate; // format UTC : "YYYY-DD-MM HH:MM:SS" (optionnal) (omitted = any)
     private $endDate; // format UTC : "YYYY-DD-MM HH:MM:SS" (optionnal) (omitted = any)
     private $correspondingAccountNumber; // (optionnal) (omitted = any)
     private $direction; //incoming, outgoing, any (optionnal) (omitted = any)
     private $merchantRef; //merchant reference (optionnal) (omitted = any)
     private $transactionId; //receipt Id (optionnal) (omitted = any)
     private $type; // Always “transfer” (optionnal) (omitted = any)
     private $source; //API, Site, Wallet, SCI (optionnal) (omitted = any)
     private $anonymity; //yes, no, any (optionnal) (omitted = any)
     private $minAmount; //(optionnal) (omitted = any)
     private $maxAmount; //(optionnal) (omitted = any)

     private $pageSize; //number of transactions per page (optionnal) (omitted = 50 max)
     private $pageNumber; // number of the page (optionnal) (omitted = 1)

     public function __construct($accountNumber, $transactionId="", $minAmount="", $maxAmount="",$correspondingAccountNumber="", $currency="", $startDate="", $endDate="",$anonymity="", $merchantRef="", $type="", $direction="", $source="", $pageSize="", $pageNumber="")
     {
	  $this->currency = $currency;
	  $this->accountNumber = $accountNumber;
	  $this->startDate = $startDate;
	  $this->endDate = $endDate;
	  $this->correspondingAccountNumber = $correspondingAccountNumber;
	  $this->direction = $direction;
	  $this->merchantRef = $merchantRef;
	  $this->transactionId = $transactionId;
	  $this->type = $type;
	  $this->source = $source;
	  $this->anonymity = $anonymity;
	  $this->minAmount = $minAmount;
	  $this->maxAmount = $maxAmount;

	  $this->pageSize = $pageSize;
	  $this->pageNumber = $pageNumber;
     }

     public function getCurrency()
     {
	  return $this->currency;
     }

     public function getAccountNumber()
     {
	  return $this->accountNumber;
     }
     
     public function getStartDate()
     {
	  return $this->startDate;
     }

     public function getEndDate()
     {
	  return $this->endDate;
     }

     public function getCorrespondingAccountNumber()
     {
	  return $this->correspondingAccountNumber;
     }

     public function getDirection()
     {
	  return $this->direction;
     }

    public function getMerchantRef()
     {
	  return $this->merchantRef;
     }

     public function getTransactionId()
     {
	  return $this->transactionId;
     }

     public function getType()
     {
	  return $this->type;
     }
     
     public function getSource()
     {
	  return $this->source;
     }

     public function getAnonymity()
     {
	  return $this->anonymous;
     }

     public function getMinAmount()
     {
	  return $this->minAmount;
     }

     public function getMaxAmount()
     {
	  return $this->maxAmount;
     }

     public function getPageSize()
     {
	  return $this->pageSize;
     }

     public function getPageNumber()
     {
	  return $this->pageNumber;
     }

     public function setCurrency($currency)
     {
	  $this->currency = $currency;
     }

     public function setAccountNumber($account)
     {
	  $this->accountNumber = $account;
     }
     
     public function setStartDate($date)
     {
	  $this->startDate = $date;
     }

     public function setEndDate($date)
     {
	  $this->endDate = $date;
     }

     public function setCorrespondingAccountNumber($account)
     {
	  $this->correspondingAccountNumber = $account;
     }

     public function setDirection($direction)
     {
	  $this->direction = $direction;
     }

    public function setMerchantRef($ref)
     {
	  $this->merchantRef = $ref;
     }

     public function setTransactionId($id)
     {
	  $this->transactionId = $id;
     }

     public function setType($type)
     {
	  $this->type = $type;
     }
     
     public function setSource($source)
     {
	  $this->source = $source;
     }

     public function setAnonymity($anonymity)
     {
	  $this->anonymity = $anonymity;
     }

     public function setMinAmount($amount)
     {
	  $this->minAmount = $amount;
     }

     public function setMaxAmount($amount)
     {
	  $this->maxAmount = $amount;
     }

     public function setPageSize($size)
     {
	  $this->pageSize = $size;
     }

     public function setPageNumber($number)
     {
	  $this->pageNumber = $number;
     }
}
?>
