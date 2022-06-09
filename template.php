<?php

require_once 'common.php';

//-----------------------------------------------------------------------------
// Menu items
//-----------------------------------------------------------------------------

function getMenuItem($href, $text) {
  $mt = "<a href='$href'>$text</a>\n";
  return $mt;
}

function getSubmenuItem($href, $text) {
  $mt = "<a href='$href' class='sub'>$text</a>\n";
  return $mt;
}

//-----------------------------------------------------------------------------
// Menu 
//-----------------------------------------------------------------------------

function getMenu() {
  $menu =  "<p>Produkty</p>"
      . getMenuItem("alf.php", "Alfabetycznie")
      . getMenuItem("kat.php", "Kategoriami")
      . getMenuItem("producenci.php", "Producentami")
      . getSubmenuItem("wyszukiwarka.php", "Wyszukaj");
      if ($_SESSION['zalogowany']){
      $menu .= getSubmenuItem("dodawanie.php", "Dodaj Produkt");
      }
      $menu .=  "<p>Biura</p>\n"
      . getMenuItem("offices.php", "Biura")
      . getSubmenuItem("areas.php", "Obszary")
      . getSubmenuItem("employees.php", "Pracownicy")
      . "<p>Robocze</p>\n"
      . getMenuItem("styles.php", "Style")
      . "<p>Dostęp</p>\n";
if ($_SESSION['zalogowany']){
    $menu .= getMenuItem("profile.php", "Profil")
        . getSubmenuItem("logout.php", "Wyloguj");
        
}
    else{
        
  $menu .= getMenuItem("login.php", "Logowanie")
          . getMenuItem("rejestracja.php", "Rejestracja");
  }
  
  return $menu;
}

//-----------------------------------------------------------------------------
// Login form
//-----------------------------------------------------------------------------

$loginFormTemplate = <<<EOM
  <form action='checklogin.php' method='POST'>
    <fieldset><legend>Logowanie</legend>
    <table>
    <tr><td>Login:    <td><input type='text' size='30' name='login' value='===login==='>
    <tr><td>Hasło:    <td><input type='password' name='pass'>
    <tr><td>&nbsp;    <td><input type='submit' value='Zaloguj'>
      <input type='hidden' name='page' value='login'>
    </table>
    </fieldset>
  </form>\n
EOM;



function getLoginForm($login = "") {
  global $loginFormTemplate;
  $form = str_replace("===login===", $login, $loginFormTemplate);
  return $form;
}

//-----------------------------------------------------------------------------
// register form
//-----------------------------------------------------------------------------
/*
$registerFormTemplate = <<<EOM
<form action='checkregister.php' method='GET'>
    <fieldset><legend>Rejestracja</legend>
    <table>
    <tr><td>Login:    <td><input type='text' size='30' name='login' value='===register==='>
    <tr><td>Email:    <td><input type='text' size='50' name='email' value=''>
    <tr><td>Hasło:    <td><input type='password' name='pass' value=''>
    <tr><td>Ponownie: <td><input type='password' name='conf' value=''>
    <tr><td>&nbsp;    <td><input type='submit' value='Zarejestruj'>
      <input type='hidden' name='page' value='register'>
    </table>
    </fieldset>
  </form>\n
  EOM;


function getRegisterForm($register = "") {
    global $registerFormTemplate; 
    $form = str_replace("===register===", $register, $registerFormTemplate);
    return $form;
}
*/

//-----------------------------------------------------------------------------
// Page template
//-----------------------------------------------------------------------------

$pageTemplate = <<<EOM
<!DOCTYPE html>
<html>
<head>
  <meta http-equiv='Content-type' content='text/html;charset=utf-8'>
  <title>Modele samochodów</title>
  <link rel='stylesheet' type='text/css' href='./style.css'>
</head>
<body>
<table id='page'>
<tr>
<td id='logo'>
<img src='./media/car.png' alt='Modele samochodów'>
<td id='title'>
<h1>Modele samochodów</h1>
<p>Projekt Cars, <br>Eryk Jakubus</p>
<tr>
<td id='nav'>
<div>
<!-- Main menu begin -->
===MainMenu===
<!-- Main menu end -->
</div>
<td id='cont'>
<!-- Contents begin -->
===Contents===
<!-- Contents begin -->
</table>
</body>
</html>    
EOM;

function getPage($menu, $cont) {
  global $pageTemplate;
  $page = str_replace(
      ["===MainMenu===", "===Contents==="], [$menu, $cont], $pageTemplate);
  return $page;
}

//-----------------------------------------------------------------------------
// Product line & scale
//-----------------------------------------------------------------------------

function getProductLineControl($prline = "", $name = "prLine") {
  $sql = "SELECT productLine FROM productlines ORDER BY productLine";
  $qry = new dbQuery($sql);
  $sel = "<select name='$name'>";
  $sel .= $prline == "" ? "<option selected value=''>--- Select one ---" : "";
  while (($row = $qry->next()) != NULL) {
    $chk = $row["productLine"] == $prline ? "selected" : "";
    $sel .= "<option $chk value='{$row["productLine"]}'>{$row["productLine"]}";
  }
  $sel .= "</select>";
  return $sel;
}

function getProductScaleControl($prScale = "", $name = "prScale") {
  $sql = "SELECT productScale FROM products GROUP BY productScale";
  $qry = new dbQuery($sql);
  $sel = "<select name='$name'>";
  $sel .= $prScale == "" ? "<option selected value=''>--- Select one ---" : "";
  while (($row = $qry->next()) != NULL) {
    $chk = $row["productScale"] == $prScale ? "selected" : "";
    $sel .= "<option $chk value='{$row["productScale"]}'>{$row["productScale"]}";
  }
  $sel .= "</select>";
  return $sel;
}

?>
