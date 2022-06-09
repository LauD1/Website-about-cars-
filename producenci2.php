<?php

session_start();
require_once 'common.php';
require_once 'template.php';

$cnt = "<h1>Produkty Producentów:</h1>";



$prodd = $_GET["productVendor"];
$sql = "SELECT productCode, productVendor, productName FROM products WHERE productVendor = '{$prodd}'";
$qry = new dbQuery($sql);
$prodd = $qry->next();
$cnt .= "<div class='post'>\n"
     . "<h2>{$prodd["productVendor"]}</h2>";
     


while (($prod = $qry->next()) != NULL) {
  $cnt .= "<div class='text'><p>";
  $lnk2 = "<a href='./produkt.php?productCode={$prod["productCode"]}'>{$prod["productName"]}</a>";
  $cnt .= "$lnk2</div>";
}


$cnt .= "</div>";

echo getPage(getMenu(), $cnt);

?>