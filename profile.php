<?php
session_start();
require_once 'common.php';
require_once 'template.php';

$cnt = "<h1>Twój profil</h1>\n";

$sql = "SELECT login, email, firstName, lastName FROM employees WHERE employeeNumber = '{$_SESSION['nr']}'";
$qry = new dbQuery($sql);
$emp = $qry->next();

$lnk1 = "<a href='profile.php'>Podsumowanie</a>";
$lnk2 = "<a href='zamianahasla.php'>Zmiana hasła</a>";

$cnt .= "<form>"
        . "<h4 class='menu'>&bull; $lnk1 &bull; $lnk2</h4>"
        . "<fieldset><legend><h4>Podsumowanie</h4></legend>"
        . "<table cellspacing=\"5\">"
        . "<tr> <td>Login:  <td>{$emp['login']}"
        . "<tr> <td>Adres Email:    <td>{$emp['email']}"
        . "<tr> <td>Imię i nazwisko:    <td>{$emp['firstName']} {$emp['lastName']}"
        . "</fieldset>"
        . "</form>";


echo getPage(getMenu(), $cnt);
?>