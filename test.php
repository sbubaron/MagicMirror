<html>
<head>
	<title>Magic Mirror</title>
  
	<meta name="google" value="notranslate" />
	<meta http-equiv="Content-type" content="text/html; charset=utf-8" />

</head>
<body>

hello

<?php
        phpinfo();
      ?>


      <?php
        $mongoDB = new Mongo();
        $database = $mongoDB->selectDB("example");
        $collection = $database->createCollection('TestCollection');
        $collection->insert(array('test' => 'Test OK'));

        $retrieved = $collection->find();
        foreach ($retrieved as $obj) {
          echo($obj['test']);
        }
      ?>

      adsfds

<?php

$m = new Mongo();

echo "test";

$db = $m->comedy;

echo "test";

$collection = $db->cartoons;

echo "test";

$obj = array ("title"=>"Calvin and hobbes");
$collection->insert($obj);

echo "test";

$cursor = $collection->find();

foreach($cursor as $obj) {
  echo $obj["title"];
}

?>

good bye

</body>
</html>
