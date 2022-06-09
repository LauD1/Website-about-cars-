<?php
session_start();
require_once 'common.php';
require_once 'template.php';

$cnt = "<h1>Rejestracja</h1>\n";

$cnt .= "<form action='rejestracja.php' method='POST'>"
        . "<fieldset><legend>Rejestracja</legend>"
        . "<form action='rejestracja.php' method='post'>"
        . "<table>"
        . "<tr><td><label for='employeeNumber'>Numer: </label>"  
        . "<td><input type='text' name='employeeNumber' id='employeeNumber'>"
        . "<tr><td><label for='login'>Login: </label>"
        . "<td><input type='text' name='login' id='login'>"
        . "<tr><td><label for='Email'>Email: </label>"
        . "<td><input type='text' name='Email' id='Email'>"
        . "<tr><td><label for='pass1'>Hasło: </label>"
        . "<td><input type='password' name='pass1' id='pass1'>"
        . "<tr><td><label for='pass2'>Ponownie: </label>"
        . "<td><input type='password' name='pass2' id='pass2'>"
        . "<tr><td><input type='submit' value='Potwierdź'>"
        . "</table>"
        . "</fieldset>"
        .  "</form>";

if (isset($_POST['pass1'])) {
    $ps1 = $_POST['pass1'];
    $ps2 = $_POST['pass2'];
    $cnt .= "<div class='post'>";
    
    if ($ps1 === $ps2 && !empty($ps1)){
        $sql = "SELECT login from employees WHERE login = '{$_POST['login']}'";
        $qry1 = new dbQuery($sql);
        $lg = $qry1->next();
        if (is_null($lg['login']) && !empty($_POST['login'])){
            $sql = "SELECT email FROM employees WHERE email = '{$_POST['Email']}'";
            $qry2 = new dbQuery($sql);
            $el = $qry2->next();
            if (is_null($el['email']) && !empty($_POST['Email']) ){
                $sql = "INSERT INTO employees (employeeNumber, login, email, pass) VALUES ('{$_POST['employeeNumber']}','{$_POST['login']}', '{$_POST['Email']}', '{$ps1}')";
                $qry3 = new dbQuery($sql);
                $_SESSION['rejestracja'] = TRUE;
                header("Location: login.php");
            }
            else{
                $cnt .= "<p>Wpisany Email jest zajęty lub nie jest wpisany.";
            }
        }
        else{
            $cnt .= "<p>Wpisany login jest zajęty lub nie jest wpisany.";
        }
    }
 else {
        $cnt .= "<p>Podane hasła różnią się od siebie, lub nie są podane.";
    }
    $cnt .= "</div>";
}
else{
    $cnt .= "<div class='post'>";
    $cnt .= "<p>Nie wpisano haseł.";
}


echo getPage(getMenu(), $cnt);
?>