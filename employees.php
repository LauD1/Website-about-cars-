<?php

session_start();
require_once 'common.php';
require_once 'template.php';

$cnt = "<h1>Pracownicy</h1>\n";

$sql = "SELECT * FROM employees ORDER BY lastName";
$qry = new dbQuery($sql);
$cnt .= "<div class='post'>\n";
while (($emp = $qry->next()) != NULL) {
  $link = "<a href='./employee.php?number={$emp["employeeNumber"]}'>{$emp["lastName"]}, {$emp["firstName"]}</a>";
  $cnt .= "<div class='text'>"
      . "<h4>$link -- {$emp["jobTitle"]}</h4>"
      . "</div>\n";
}
$cnt .= "</div>\n";


echo getPage(getMenu(), $cnt);
?>