<?php 


//{
//    "state": false
//}
//$jsonObj = new Object();

$jsonObj->state = true;
$jsonObj->date = date('Y-m-d H:i:s');

file_put_contents('../json-tests/test.json', json_encode($jsonObj));


?>