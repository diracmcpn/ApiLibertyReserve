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

Class Balance
{
     private $currency;
     private $accountNumber;
     private $date;
     private $amount;

     public function __construct($accountNumber, $currency, $date, $amount)
     {
	  $this->accountNumber = $accountNumber;
	  $this->currency = $currency;
	  $this->date= $date;
	  $this->amount = $amount;
     }

     public function getAccountNumber()
     {
	  return $this->accountNumber;
     }
     
     public function getCurrency()
     {
	  return $this->currency;
     }
     
     public function getDate()
     {
	  return $this->date;
     }

     public function getAmount()
     {
	  return $this->amount;
     }

     public function setAccountNumber($account)
     {
	  $this->accountNumber = $account;
     }
     
     public function setCurrency($currency)
     {
	  $this->currency = $currency;
     }

     public function setDate($date)
     {
	  $this->date = $date;
     }

     public function setAmount($amount)
     {
	  $this->amount = $amount;
     }
}
?>
