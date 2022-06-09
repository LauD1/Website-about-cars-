<?php

session_start();
require_once 'common.php';
require_once 'template.php';

$cnt = "<h1>Produkty z Kategorii:</h1>";


$proo = $_GET["productLine"];
$prod = $_GET["productCode"];
$sql = "SELECT productLine,productCode, productName, textDescription FROM products NATURAL JOIN productlines WHERE productLine = '{$proo}'";
$qry = new dbQuery($sql);
$proo = $qry->next();
$cnt .= "<div class='post'>\n"
     . "<h2>{$proo["productLine"]}</h2>"
     . "<p>{$proo['textDescription']}</p>";


while (($prod = $qry->next()) != NULL) {
  $cnt .= "<div class='text'><p>";
  $lnk2 = "<a href='./produkt.php?productCode={$prod["productCode"]}'>{$prod["productName"]}</a>";
  $cnt .= "$lnk2</div>";
}


$cnt .= "</div>";

echo getPage(getMenu(), $cnt);

?>