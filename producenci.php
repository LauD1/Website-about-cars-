<?php

session_start();
require_once 'common.php';
require_once 'template.php';

$cnt = "<h1>Producenci</h1>";

$product = (int) $_GET["product"];
$sql = "SELECT * FROM products group by productVendor";
$qry = new dbQuery($sql);
$prodd = $qry->next();
//$cnt .= "<div class='post'>\n";
while (($prodd = $qry->next()) != NULL) {
$cnt .= "<div class='post'>" 
      
      .$lnk = "<a href='./producenci2.php?productVendor={$prodd["productVendor"]}'><h3>{$prodd["productVendor"]}</h3></a>";
    
      //. "<h3>{$prod["productVendor"]}</h3>" 
    $cnt .= "</div>\n";
      
}
//$cnt .= "</div>\n";

echo getPage(getMenu(), $cnt);
?>