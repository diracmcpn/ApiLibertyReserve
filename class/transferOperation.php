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

Class TransferOperation
{
     private $merchantRef; //merchant reference (20 char max) (optionnal)
     private $type; // Always “transfer”
     private $payerAccountNumber;
     private $payeeAccountNumber;
     private $currency; //LRUSD or LREUR (LRUSD by default)
     private $amount; //4 decimal max 
     private $memo; //comment 100 char max (optionnal)
     private $anonymous; //true or false (false by default)

     public function __construct($payerAccountNumber, $payeeAccountNumber, $amount, $currency="LRUSD",$anonymous="false", $merchantRef="", $type="transfer", $memo="")
     {
	  $this->merchantRef = $merchantRef;
	  $this->type = $type;
	  $this->payerAccountNumber = $payerAccountNumber;
	  $this->payeeAccountNumber = $payeeAccountNumber;
	  $this->currency = $currency;
	  $this->amount = $amount;
	  $this->memo = $memo;
	  $this->anonymous = $anonymous;
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

     public function getAmount()
     {
	  return $this->amount;
     }

     public function getMemo()
     {
	  return $this->memo;
     }

     public function getAnonymous()
     {
	  return $this->anonymous;
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
     
     public function setAmount($amount)
     {
	  $this->amount = $amount;
     }
	  
     public function setMemo($memo)
     {
	  $this->memo = $memo;
     }
     
     public function setAnonymous($anonymous)
     {
	  $this->anonymous = $anonymous;
     }
}
?>
