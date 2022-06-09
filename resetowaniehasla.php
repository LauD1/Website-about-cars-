<?php

session_start();
require_once 'common.php';
require_once 'template.php';

$cnt = "<h1>Logowanie</h1>";
        
$cnt .= "<fieldset>"
        . "<legend><h4>Reset hasła</h4></legend>"
        . "<form action='resetowaniehasla.php' method='post'>"
        . "<table><tr>"
        . "<td><label for='email'>Email: </label>"
        . "<td><input type='text' name='email' id='email'>"
        . "<tr><td><input type='submit' value='Wyślij'>"
        . "</table>"
        . "</form>"
        . "</fieldset>"
        . "<h4>Podaj swój adres email\"Wyślij\"";

if (isset($_POST['email'])){
    $sql = "UPDATE employees SET pass = 'kernel21' WHERE email = '{$_POST['email']}'";
    $qry = new dbQuery($sql);
    $_SESSION['resethasla'] = true;
    header("Location: login.php");
}

echo getPage(getMenu(), $cnt);
?>