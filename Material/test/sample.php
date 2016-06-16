<?php

$m = new MongoClient("mongodb://rrfunde:Jhearts128@ds063870.mongolab.com:63870/notex_mini"); // connect


$db=$m->selectDB("notex_mini");

$collections = $db->listCollections();

//echo $collections;
foreach($collections as $col)
{
    echo $col;
}