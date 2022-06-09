<?php

session_start();
require_once 'common.php';
require_once 'template.php';

$cnt = "<h1>Wyszukaj</h1>\n";



$cnt .= "<form action='./wyszukiwarka.php' method='get'>"
        . "<fieldset><legend><h4>Szukanie</h4></legend>"
        . "<table><tr><td><label for='tekst'>Wyszukaj:</label><td>"
        . "<input type='text' id='wyszukiwanie' name='wyszukiwanie'><tr>"
        . "<td><td><input type='submit' value='Wyślij'></table>"
        . "</fieldset>";
if (isset($_GET['wyszukiwanie'])) {
    $cnt .= "<div class='post'><h2>Szukana fraza: \"{$_GET['wyszukiwanie']}\"</h2>";
    $sql = "SELECT productCode, productName, productScale, productLine, productVendor FROM products WHERE productName LIKE '%{$_GET['wyszukiwanie']}%'";
    $qry = new dbQuery($sql);
   
    
    while (($pro = $qry->next()) != NULL) {
        $cnt .= "<div class='text'>";
        $lnk1 = "<a href='produkt.php?productCode={$pro["productCode"]}'>{$pro["productName"]}</a>";
        $lnk2 = "<a href='kategoriee.php?productLine={$pro["productLine"]}'>{$pro["productLine"]}</a>";
        $lnk3 = "<a href='producenci2.php?productVendor={$pro["productVendor"]}'>{$pro["productVendor"]}</a>";
        $cnt .= "<h4>$lnk1 ({$pro['productScale']})</h4>"
        . "<h4>$lnk2, $lnk3</h4></div>";
    }
    
    
    $cnt .= "</div>";
}

echo getPage(getMenu(), $cnt);

?>
