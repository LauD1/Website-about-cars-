<?php

session_start();
require_once 'common.php';
require_once 'template.php';

$cnt = "<h1>Dane pracownika</h1>";

$number = $_GET["number"];
$sql = "SELECT * FROM employees, offices "
    . "WHERE employees.officeCode=offices.officeCode AND employeeNumber={$number}";
$qry = new dbQuery($sql);
$emp = $qry->next();
if ($emp == NULL) {
  header("Location: ./employees.php");
  die();
}

$oLink = "<a href='office.php?office={$emp["officeCode"]}'>{$emp["city"]}</a>";
$aLink = "<a href='areas.php'>{$emp["territory"]}</a>";

$cnt .= "<div class='post'>" 
    . "<h3>{$emp["lastName"]}, {$emp["firstName"]}</h3>" 
    . "<div class='text'>" 
    . "<h4>Stanowisko: {$emp["jobTitle"]}</h4>" 
    . "<p>Numer ID: {$emp["employeeNumber"]}" 
    . "<p>Email: {$emp["email"]}" 
    . "</div>" 
    . "<div class='text'>" 
    . "<p>Biuro: $oLink" 
    . "<p>Obszar: $aLink" 
    . "</div>" 
    . "</div>";


echo getPage(getMenu(), $cnt);
?>