<html >
<head>
    <title class="title"><?php
        echo htmlspecialchars($_GET['name']);
        ?> -NoteX_mini</title>

    <!--  IMPORTING SCRIPTS FROM CDN  -->
    <script type="text/javascript" src="tinymce/tinymce.min.js"></script>
    <link rel="stylesheet" href="css/highlight.css">
    <script src="js/highlight.min.js"></script>
    <link rel="stylesheet" href="css/materialize.min.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>

    <script>hljs.initHighlightingOnLoad();</script>
    <link rel="shortcut icon" type="image/png" href="icon.png"/>
<link rel="stylesheet" type="text/css" href="content.css">
<script src="script.js"></script>

    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
</head>

<div class="navbar-fixed center">
    <nav>
        <a href="index.php" class="brand-logo"><h1 >NoteX<br></h1></a>

    </nav>
</div>
    <div class="row-offcanvas row-offcanvas-left">
        <div id="sidebar" class="sidebar-offcanvas">
            <div class="col-md-12">
                <h3>&nbsp;&nbsp;Subject&nbsp;&nbsp;&nbsp; <a onclick="addCollection()" class="btn-floating  waves-effect waves-light red"><i class="mdi-content-add"></i></a>
                </h3>
                <ul class="nav nav-pills nav-stacked" id="subjectList">
            <?php $GLOBALS["MongoHost"]="localhost";
            ;//"mongodb://rrfunde:Jhearts128@ds063870.mongolab.com:63870/notex_mini";
        $m = new MongoClient($GLOBALS["MongoHost"]);
        $db = $m->NoteX_mini; // select a database

        //   $db=$m->selectDB("notex_mini");
        $collections = $db->listCollections();
        $count=0;
      //  sort($collections);
            $collections=array_reverse($collections);
        $isGet=false;
            $getSub="";
            if(isset($_GET['name']))
            {
                $isGet=true;
                $getSub=$_GET['name'];
            }
        foreach ($collections as $collection) {

            $collection=substr($collection,11);
        echo " <li><a class='collection-item' href='index.php?name=$collection' id=$collection>$collection</a></li> ";
        }
        ?>
</ul></div></div></div></div>


    <body>
  <div class="wrapper">


<!--   **********************************PHP SCRIPT******************************************* -->
<?php

function show()
{

    $m = new MongoClient($GLOBALS["MongoHost"]); // connect

    $db =$m->selectDB("NoteX_mini"); // select a database

    $collection = $db->$_GET['name']; // select a collection

    $cursor = $collection->find(); // find everything in the collection
$idNo=0;

        foreach ($cursor as $document) {


            $link1 = make_links_clickable($document["link"]);

            $solution=$document["solution"];
            $problem=$document["problem"];
          //  $s=str_replace("<br />","</li><br /><li>",$s);
            $sol1 = nl2br($solution);
         //   $sol1 = str_replace(array('<p>', '</p>', '<br>', '<br />'), '', $s);


            echo "<section ><h4><b>$problem</b></h4><div id=".$idNo."><p>".$sol1."</p></div>".$link1." <h4 class='right-align'><a style='' class='waves-effect waves-light btn ' id=" . $document["_id"] . " name=" . $idNo . " onClick=clickEvent(this.id,this.name) >Edit
            </a></h5></section>";
$idNo++;
        }
    }

if (isset($_GET['name'])) {
    show();
}

function make_links_clickable($text)
{
    return preg_replace('!(((f|ht|fi)(tp|le)(s)?:(//|///))[--a-zAZа-яА-Я()0-9@:%_+.~#?&;//=]+)!i', '<a target="_blank" href="$1">Read more</a>', $text);
}

?>
</div>
</body>
</html>
