<?php

session_start();
require_once 'common.php';
require_once 'template.php';

$cnt = "<h1>Biura</h1>\n";

$sql = "SELECT * FROM offices ORDER BY city";
$qry = new dbQuery($sql);
$cnt .= "<div class='post'>\n";
while (($off = $qry->next()) != NULL) {
  $lnk = "<a href='office.php?office={$off["officeCode"]}'>{$off["city"]}</a>";
  $cnt .= "<div class='text'>" 
      . "<h3>$lnk ({$off["country"]}) - {$off["territory"]}</h3>" 
      . "<p>{$off["addressLine1"]} {$off["addressLine2"]}, {$off["country"]}" 
      . "<br>tel.: {$off["phone"]}" 
      . "</div>\n";
}
$cnt .= "</div>\n";


echo getPage(getMenu(), $cnt);
?>