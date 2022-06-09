<?php

session_start();
require_once 'common.php';
require_once 'template.php';

$cnt = "<h1>Modele samochodów</h1>";



echo getPage(getMenu(), $cnt);
?>
