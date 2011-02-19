<?php
require_once("class/account.php");
require_once("class/accountName.php");
require_once("class/accountNameOperation.php");
require_once("class/accountNameRequest.php");
require_once("class/accountNameResponse.php");
require_once("class/balance.php");
require_once("class/balanceOperation.php");
require_once("class/balanceRequest.php");
require_once("class/balanceResponse.php");
require_once("class/error.php");
require_once("class/historyOperation.php");
require_once("class/historyRequest.php");
require_once("class/historyResponse.php");
require_once("class/id.php");
require_once("class/merchantRef.php");
require_once("class/pager.php");
require_once("class/processor.php");
require_once("class/receipt.php");
require_once("class/transferOperation.php");
require_once("class/transferRequest.php");
require_once("class/transferResponse.php");

$id = new Id("test");
$id->yield();
echo "ID : ".$id->getValue()."<br/><br/>";

$ref = new merchantRef("");
$ref->setValue("test");
$ref->yield();
echo "REF : ".$ref->getValue()."<br/><br/>";

$account = new Account("apiname", "secword");
$key = $account->createToken();
echo "KEY : ".$key."<br/><br/>";

/*//Transfer//
$operation1 = new TransferOperation("U12345","X567","10.25");
$operation2 = new TransferOperation("U12345","X568","11.25");
$request = new TransferRequest($id->getValue(), "apiname", $key, $operation1);
echo "request1 : ".htmlspecialchars($request->createString())."<br/><br/>";
$request->addOperation($operation2);
$operation2->setMerchantRef($ref->getValue());
$operation2->setMemo("Enjoy it");
$operation2->setAnonymous("true");
echo "request2 : ".htmlspecialchars($request->createString())."<br/><br/>";

$processor = new Processor("transfer");
$processor->sendRequest($request->createString());
echo "Response : ".htmlspecialchars($processor->getResponse())."<br/><br/>";

$response = new TransferResponse($processor->getResponse());
if ($response->checkId($id->getValue()))
     echo "The Ids match correctly.<br/><br/>";
else
     echo "The Ids don't match correctly.<br/><br/>";
print_r($response->createResponseClassList());
print_r($response->createReceiptClassList());
print_r($response->createErrorClassList());
$response->getResponse();
$response->createDomDocument();
*/

/*//History//
$operation = new HistoryOperation("U12345");
$request = new HistoryRequest($id->getValue(), "apiname", $key, $operation);
echo "request1 : ".htmlspecialchars($request->createString())."<br/><br/>";

$processor = new Processor("history");
$processor->sendRequest($request->createString());
echo "Response : ".htmlspecialchars($processor->getResponse())."<br/><br/>";

$response = new HistoryResponse($processor->getResponse());
if ($response->checkId($id->getValue()))
     echo "The Ids match correctly.<br/><br/>";
else
     echo "The Ids don't match correctly.<br/><br/>";
print_r($response->createResponseClassList());
print_r($response->createPagerClassList());
print_r($response->createReceiptClassList());
print_r($response->createErrorClassList());
$response->getResponse();
$response->createDomDocument();
*/

/*//Balance//
$operation1 = new BalanceOperation("U12345","LRUSD");
$operation2 = new BalanceOperation("U12345","LREUR");
$request = new BalanceRequest($id->getValue(), "apiname", $key, $operation1);
echo "request1 : ".htmlspecialchars($request->createString())."<br/><br/>";
$request->addOperation($operation2);
echo "request2 : ".htmlspecialchars($request->createString())."<br/><br/>";

$processor = new Processor("balance");
$processor->sendRequest($request->createString());
echo "Response : ".htmlspecialchars($processor->getResponse())."<br/><br/>";

$response = new BalanceResponse($processor->getResponse());
if ($response->checkId($id->getValue()))
     echo "The Ids match correctly.<br/><br/>";
else
     echo "The Ids don't match correctly.<br/><br/>";
print_r($response->createResponseClassList());
print_r($response->createBalanceClassList());
print_r($response->createErrorClassList());
$response->getResponse();
$response->createDomDocument();
*/

/*//AccountName//
$operation1 = new AccountNameOperation("U12345","U12346");
$operation2 = new AccountNameOperation("U12345","U12347");
$request = new AccountNameRequest($id->getValue(), "apiname", $key, $operation1);
echo "request1 : ".htmlspecialchars($request->createString())."<br/><br/>";
$request->addOperation($operation2);
echo "request2 : ".htmlspecialchars($request->createString())."<br/><br/>";

$processor = new Processor("accountname");
$processor->sendRequest($request->createString());
echo "Response : ".htmlspecialchars($processor->getResponse())."<br/><br/>";

$response = new AccountNameResponse($processor->getResponse());
if ($response->checkId($id->getValue()))
     echo "The Ids match correctly.<br/><br/>";
else
     echo "The Ids don't match correctly.<br/><br/>";
print_r($response->createResponseClassList());
print_r($response->createAccountNameClassList());
print_r($response->createErrorClassList());
$response->getResponse();
$response->createDomDocument();
*/
?>
