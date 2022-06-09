<?php

session_start();
require_once 'common.php';
require_once 'template.php';

$cnt = "<h1>Obszary</h1>\n";

$sql = "SELECT territory, COUNT(*) as num FROM offices "
    . "GROUP BY territory ORDER BY num DESC";
$qry = new dbQuery($sql);

while (($ter = $qry->next()) != NULL) {
  $cnt .= "<div class='post'>\n"
      . "<h3>{$ter["territory"]}</h3>\n";

  $sql = "SELECT * FROM offices WHERE territory='{$ter["territory"]}' ORDER BY city";
  $qr2 = new dbQuery($sql);
  while (($off = $qr2->next()) != NULL) {
    $lnk = "<a href='office.php?office={$off["officeCode"]}'>{$off["city"]}</a>";
    $cnt .= "<div class='text'>"
        . "<h4>$lnk ({$off["country"]})</h4>"
        . "</div>\n";
  }

  $cnt .= "</div>\n";
}
$cnt .= "</div>\n";


echo getPage(getMenu(), $cnt);
?>