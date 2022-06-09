<?php

session_start();
require_once 'common.php';
require_once 'template.php';

$cnt = "<h1>Kategorie:</h1>";

$product = (int) $_GET["product"];
$sql = "SELECT * FROM productlines";
$qry = new dbQuery($sql);
$proo = $qry->next();
//$cnt .= "<div class='post'>\n";
while (($proo = $qry->next()) != NULL) {
$cnt .= "<div class='post'>" 
      .$lnk = "<a href='./kategoriee.php?productLine={$proo["productLine"]}'><h2>{$proo["productLine"]}</h2></a>"
      //. "<h3>{$prod["productLine"]}</h3>" 
      
      . "<p>{$proo["textDescription"]}</p>";
      
    $cnt .= "</div>\n";
      
}


echo getPage(getMenu(), $cnt);
?>