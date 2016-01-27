<?php
//$m = new MongoClient("mongodb://rrfunde:Jhearts128@ds063870.mongolab.com:63870/notex_mini");
// $db = $m->notex_mini; // select a database
$m=new MongoClient("localhost");

$db=$m->selectDB("NoteX_mini");
$subject=$_POST['subject'];
$id=$_POST['id'];
$solution="&nbsp;&nbsp;&nbsp;&nbsp;".$_POST['solution'];

$collection = $db->$subject;


$item = $collection->find(array(
    '_id' => new MongoId($id)));
$u=array('$set'=>array("solution"=>$solution));

$collection->update(array(
    '_id' => new MongoId($id)),$u);
?>