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

Class Receipt
{
     private $transactionId;
     private $transactionDate;
     private $payerAccountName;
     private $payeeAccountName;
     private $amountResponse;
     private $fee;
     private $accountBalance;

     private $merchantRef; //merchant reference (20 char max) (optionnal)
     private $type; // Always “transfer”
     private $payerAccountNumber;
     private $payeeAccountNumber;
     private $currency; //LRUSD or LREUR
     private $amountRequest; //4 decimal max 
     private $memo; //comment 100 char max (optionnal)
     private $anonymous; //true or false
     private $source; //API

     public function __construct($transactionId, $transactionDate, $payerAccountName, $payeeAccountName, $amountResponse, $fee, $accountBalance, $payerAccountNumber, $payeeAccountNumber, $currency, $amountRequest, $anonymous, $merchantRef, $type, $memo, $source)
     {
	  $this->transactionId = $transactionId;
	  $this->transactionDate = $transactionDate;
	  $this->payerAccountName = $payerAccountName;
	  $this->payeeAccountName = $payeeAccountName;
	  $this->amountResponse = $amountResponse;
	  $this->fee = $fee;
	  $this->accountBalance = $accountBalance;
	  
	  $this->merchantRef = $merchantRef;
	  $this->type = $type;
	  $this->payerAccountNumber = $payerAccountNumber;
	  $this->payeeAccountNumber = $payeeAccountNumber;
	  $this->currency = $currency;
	  $this->amountRequest = $amountRequest;
	  $this->memo = $memo;
	  $this->anonymous = $anonymous;
	  $this->source = $source;
     }

     public function getTransactionId()
     {
	  return $this->transactionId;
     }
     
     public function getTransactionDate()
     {
	  return $this->transactionDate;
     }

     public function getPayerAccountName()
     {
	  return $this->payerAccountName;
     }

     public function getPayeeAccountName()
     {
	  return $this->payeeAccountName;
     }

     public function getAmountResponse()
     {
	  return $this->amountResponse;
     }

     public function getFee()
     {
	  return $this->fee;
     }

     public function getAccountBalance()
     {
	  return $this->accountBalance;
     }

     public function getMerchantRef()
     {
	  return $this->merchantRef;
     }
     
     public function getType()
     {
	  return $this->type;
     }

     public function getPayerAccountNumber()
     {
	  return $this->payerAccountNumber;
     }

     public function getPayeeAccountNumber()
     {
	  return $this->payeeAccountNumber;
     }

     public function getCurrency()
     {
	  return $this->currency;
     }

     public function getAmountRequest()
     {
	  return $this->amountRequest;
     }

     public function getMemo()
     {
	  return $this->memo;
     }

     public function getAnonymous()
     {
	  return $this->anonymous;
     }

     public function getSource()
     {
	  return $this->source;
     }

     public function setTransactionId($transactionId)
     {
	  $this->transactionId = $transactionId;
     }
     
     public function setTransactionDate($transactionDate)
     {
	  $this->transactionDate = $transactionDate;
     }

     public function setPayerAccountName($name)
     {
	  $this->payerAccountName = $name;
     }

     public function setPayeeAccountName($name)
     {
	  $this->payeeAccountName = $name;
     }

     public function setAmountResponse($amount)
     {
	  $this->amountResponse = $amount;
     }

     public function setFee($fee)
     {
	  $this->fee = $fee;
     }

     public function setAccountBalance($balance)
     {
	  $this->accountBalance = $balance;
     }

     public function setMerchantRef($ref)
     {
	  $this->merchantRef = $ref;
     }
     
     public function setType($type)
     {
	  $this->type = $type;
     }
     
     public function setPayerAccountNumber($account)
     {
	  $this->payerAccountNumber = $account;
     }
     
     public function setPayeeAccountNumber($account)
     {
	  $this->payeeAccountNumber = $account;
     }
     
     public function setCurrency($currency)
     {
	  $this->currency = $currency;
     }
     
     public function setAmountRequest($amount)
     {
	  $this->amountRequest = $amount;
     }
	  
     public function setMemo($memo)
     {
	  $this->memo = $memo;
     }
     
     public function setAnonymous($anonymous)
     {
	  $this->anonymous = $anonymous;
     }

     public function setSource($source)
     {
	  $this->source = $source;
     }
}
?>
