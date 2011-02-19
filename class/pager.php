<?php
/* ////////////////////////////////////////////////////////
Description : Free Liberty Reserve API
Release Date : May 24, 2010
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

Class Pager
{
     private $pageSize; //number of transactions per page
     private $pageCount; //total number of pages
     private $pageNumber; // number of the current page
     private $totalCount; //total number of transactions

     public function __construct($pageSize, $pageCount, $pageNumber, $totalCount)
     {
	  $this->pageSize = $pageSize; 
	  $this->pageCount = $pageCount;
	  $this->pageNumber = $pageNumber; 
	  $this->totalCount = $totalCount;
     }

     public function getPageSize()
     {
	  return $this->pageSize;
     }

     public function getPageCount()
     {
	  return $this->pageCount;
     }

     public function getPageNumber()
     {
	  return $this->pageNumber;
     }

     public function getTotalCount()
     {
	  return $this->totalCount;
     }

     public function setPageSize($size)
     {
	  $this->pageSize = $size;
     }

     public function setPageCount($count)
     {
	  $this->pageCount = $count;
     }

     public function setPageNumber($number)
     {
	  $this->pageNumber = $number;
     }

     public function setTotalCount($count)
     {
	  $this->totalCount = $count;
     }
}
?>
