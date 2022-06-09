<?php

session_start();
require_once 'common.php';
require_once 'template.php';

$login = $_POST['login'];
$pass = $_POST['pass'];

$sql = "SELECT employeeNumber, email, login, pass FROM employees WHERE login='{$login}'";
$qry = new dbQuery($sql);
$emp = $qry->next();

if (is_null($emp['login'])){
    $_SESSION['login'] = true;
    header("Location: login.php");
}
else if ($pass != $emp['pass']){
    $_SESSION['pass'] = true;
    header("Location: login.php");
}
else {
    $cnt = "<h1>Witaj</h1>\n";
    $_SESSION['nr'] = $emp['employeeNumber'];
    $_SESSION['zalogowany'] = TRUE;
}
    

echo getPage(getMenu(), $cnt);