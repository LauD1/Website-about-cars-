<?php

session_start();
require_once 'common.php';
require_once 'template.php';

$cnt = "<h1>Logowanie</h1>" .
    getLoginForm();

if ($_SESSION['login']){
    $cnt .= "<div class='post'>"
            . "<h3>Nie odnaleziono loginu użytkownika.</h3>\n"
            . "</div>";
    $_SESSION['login'] = false;
}

if ($_SESSION['pass']){
    $cnt .= "<div class='post'>";
    $cnt .= "<h3>Podane hasło jest niepoprawne.</h3>\n"
            . "</div>";
    $_SESSION['pass'] = false;
}

if ($_SESSION['resethasla']){
    $cnt .= "<div class='post'>";
    $cnt .= "<h3>Hasło zostało zresetowane.</h3>\n"
            . "</div>";
    $_SESSION['passreset'] = false;
}

if ($_SESSION['rejestracja']){
    $cnt .= "<div class='post'>";
    $cnt .= "<h3>Rejestracja przebiegła pomyślnie.</h3>\n"
            . "</div>";
    $_SESSION['rejestracja'] = false;
}

$cnt .= "<a href='resetowaniehasla.php'>Zresetuj Hasło</a>";

echo getPage(getMenu(), $cnt);
?>