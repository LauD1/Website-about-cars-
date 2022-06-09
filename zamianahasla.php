<?php
session_start();
require_once 'common.php';
require_once 'template.php';

if (!$_SESSION['zalogowany']){
    header('Location:login.php');
}
else{
$cnt = "<h1>Twój profil</h1>\n";

$lnk1 = "<a href='profile.php'>Podsumowanie</a>";
$lnk2 = "<a href='zamianahasla.php'>Zmiana hasła</a>";


$cnt .= "<h4 class='menu'>&bull; $lnk1 &bull; $lnk2 </h4>"
        . "<fieldset><legend><h4>Zmiana hasła</h4></legend>"
        . "<form action='zamianahasla.php' method='post'>"
        . "<table><tr>"
        . "<td><label for='ps1'>Nowe hasło: </label>"
        . "<td><input type='password' name='ps1' id='ps1'>"
        . "<tr><td><label for='ps2'>Powtórz: </label>"
        . "<td><input type='password' name='ps2' id='ps2'>"
        . "<tr><td><input type='submit' value='Potwierdź'>"
        . "</table>"
        . "</form>"
        . "</fieldset>";

if (isset($_POST['ps1']) || isset($_POST['ps2'])) {
    $ps1 = $_POST['ps1'];
    $ps2 = $_POST['ps2'];
    $cnt .= "<div class='post'>";
    if ($ps1 === $ps2){
        $sql = "UPDATE employees SET pass = '$ps1' WHERE employeeNumber = '{$_SESSION['nr']}'";
        $qry = new dbQuery($sql);
        $cnt .= "<p>Hasło zostało zmienione.";
    }
 else {
        $cnt .= "<p>Podane wartości różnią się od siebie.";
    }
    $cnt .= "</div>";
}

echo getPage(getMenu(), $cnt);
}
?>