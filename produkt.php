<?php

session_start();
require_once 'common.php';
require_once 'template.php';

$cnt = "<h1>Produkt</h1>";

$prod = $_GET["productCode"];
$sql = "SELECT * FROM products WHERE productCode='{$prod}'";
$qry = new dbQuery($sql);
$pro = $qry->next();
if ($pro == NULL) {
  header("Location: ./alf.php");
  die();
}
else
{
     
$Lnk1= "<a href='kategoriee.php?productLine={$pro["productLine"]}'>{$pro["productLine"]}</a>";

$Lnk5="<a href='producenci2.php?productVendor={$pro["productVendor"]}'>{$pro["productVendor"]}</a>";
    
    
$cnt .= "<div class='post'>" 
    . "<h3>{$pro["productName"]}</h3>" 
    . "<div class='text'>" 
    . "<h4>{$pro["productDescription"]}</h4>" 
    . "<p>Skala: {$pro["productScale"]}" 
    . "<p>Cena: {$pro["MSRP"]}$" 
    . "</div>"
    . "<div class='text'>" 
    . "<p>Kategoria: $Lnk1"
    . "</div>"
    . "<div class='text'>"
    . "<p>Producent: $Lnk5"
    . "</div>"
    . "</div>";

}
echo getPage(getMenu(), $cnt);
?>