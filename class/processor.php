<?php
/* ////////////////////////////////////////////////////////
Description : Free Liberty Reserve API
Release Date : May 23, 2010
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

Class Processor
{
     private $operation; 
     private $request;
     private $response;

     public function __construct($operation)
     {
	  $this->operation = $operation;// transfer, history, balance, accountname
     }
     
     public function sendRequest($request)
     {
	  $this->request = $request;
	  $urlencode = urlencode($request);
	  $url = "https://api.libertyreserve.com/xml/".$this->operation.".aspx?req=".$urlencode;

	  if (!function_exists('curl_init'))
	  {
	       die ("Curl library is not installed. Please do it !");
	  }
	  
	  $handler = curl_init($url);
	  ob_start();
	  curl_exec($handler);
	  $this->response = ob_get_contents();
	  ob_end_clean();
	  curl_close($handler);
     }

     public function getResponse()
     {
	  return $this->response;
     }

     public function getRequest()
     {
	  return $this->request;
     }

     public function getOperation()
     {
	  return $this->operation;
     }

     public function setOperation($operation)
     {
	  $this->operation = $operation;
     }
}
?>
