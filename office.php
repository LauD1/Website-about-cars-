<?php

session_start();
require_once 'common.php';
require_once 'template.php';

$office = (int) $_GET["office"];
$sql = "SELECT * FROM offices WHERE officeCode={$office}";
$qry = new dbQuery($sql);
$off = $qry->next();
if ($off == NULL) {
  header("Location: ./offices.php");
  die();
}

$cnt = "<h1>Dane biura</h1>\n";
$cnt .= "<div class='post'>\n" 
    . "<h3>{$off["city"]}</h3>\n" 
    . "<div class='text'>\n" 
    . "<h4>Kraj: {$off["country"]}</h4>\n" 
    . "<h4>Obszar: <a href='areas.php'>{$off["territory"]}</a></h4>\n" 
    . "<p>Adres: {$off["addressLine1"]} {$off["addressLine2"]}\n" 
    . "<p>Telefon {$off["phone"]}\n" 
    . "</div>\n" 
    . "</div>\n";

$sql = "SELECT * FROM employees, offices " .
    "WHERE employees.officeCode=offices.officeCode AND employees.officeCode={$office} " .
    "ORDER BY lastName";
$qry = new dbQuery($sql);
$cnt .= "<div class='post'>\n" .
    "<h3>Pracownicy</h3>\n";
while (($emp = $qry->next()) != NULL) {
  $link = "<a href='./employee.php?number={$emp["employeeNumber"]}'>{$emp["lastName"]}, {$emp["firstName"]}</a>";
  $cnt .= "<div class='text'>"
      . "<h4>$link -- {$emp["jobTitle"]}</h4>"
      . "</div>\n";
}
$cnt .= "</div>\n";


echo getPage(getMenu(), $cnt);
?>