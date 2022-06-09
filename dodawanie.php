<?php

session_start();
require_once 'common.php';
require_once 'template.php';

$cnt = "<legend class='dodawanie'><h2>Dodawanie produktu</h2></legend>"
        ."<form action='dodawanie.php' method='post'>"
        ."<fieldset>" 
        . "<table>"
        . "<tr><td><label for='code'>Kod produktu: </label>"
        . "<td><input type='text' name='code' id='code'>"
        . "<tr><td><label for='name'>Nazwa produktu: </label>"
        . "<td><input type='text' name='name' id='name'>"
        . "<tr><td>Kategoria: "
        . "<td><select id='kategoria' name='kategoria'>"
        . "<option id='kategoria'>Classic Cars"
        . "<option id='kategoria'>Motorcycles"
        . "<option id='kategoria'>Planes"
        . "<option id='kategoria'>Trains"
        . "<option id='kategoria'>Ships"
        . "<option id='kategoria'>Trucks and Buses"
        . "<tr><td><label for='scale'>Skala produktu: </label>"
        . "<td><input type='text' name='scale' id='scale'>"
        . "<tr><td>Producent: "
        . "<td><select id='producent' name='producent'>"
        . "<option id='producent'>Autoart Studio Design"
        . "<option id='producent'>Carousel DieCast Legends"
        . "<option id='producent'>Classic Metal Creations"
        . "<option id='producent'>Exoto Designs"
        . "<option id='producent'>Gearbox Collectibles"
        . "<option id='producent'>Highway 66 Mini Classics"
        . "<option id='producent'>Min Lin DieCast"
        . "<option id='producent'>Motor City Art Classics"
        . "<option id='producent'>Red Start Diecast"
        . "<option id='producent'>Second Gear Diecast"
        . "<option id='producent'>Studio M Art Models"
        . "<option id='producent'>Unimax Art Galleries"
        . "<option id='producent'>Welly Diecast Productions"
        . "<tr><td><label for='description'>Opis produktu: </label>"
        . "<td><input type='text' name='description' id='description'>"
        . "<tr><td><label for='price'>Cena: </label>"
        . "<td><input type='text' name='price' id='price'>"
        . "<tr><td>&nbsp;<td><input type='submit' value='Dodaj'>"
        . "</table>"
        . "</form>"
        . "</fieldset>";
if(isset($_POST['kat'])){
if(empty($_POST['code']) || empty($_POST['name'])){
        $cnt.="<p>Nie podano kodu produktu lub nazwy produktu!";
}
    else{
        $sql = "INSERT INTO products (productCode ,productName, productLine, productScale, productVendor, productDescription, MSRP) VALUES ('{$_POST['code']}','{$_POST['name']}', '{$_POST['kat']}', '{$_POST['scale']}', '{$_POST['prod']}', '{$_POST['description']}', '{$_POST['price']}')";
        $qry3 = new dbQuery($sql);
        $_SESSION['sukces'] = TRUE;
        if($_SESSION['sukces']){
            $cnt.="<p>Dodawaie produktu przebiegło pomyślnie.";
        }
    }
}
         
echo getPage(getMenu(), $cnt);
?>