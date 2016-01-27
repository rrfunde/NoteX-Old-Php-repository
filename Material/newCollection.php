<?php

$collection=$_POST["Collection"];
//$m = new MongoClient("mongodb://rrfunde:Jhearts128@ds063870.mongolab.com:63870/notex_mini");
// $db = $m->notex_mini; // select a database
$m=new MongoClient("localhost");

$db=$m->selectDB("NoteX_mini");			// select a database
$db->createCollection($collection);
echo "1";