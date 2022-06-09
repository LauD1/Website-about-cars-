<?php

session_start();
require_once 'common.php';
require_once 'template.php';

$cnt = "<h1>Produkty Alfabetycznie:</h1>";

if (!isset($_GET['pg'])){
    $_GET['pg'] = 0;
}
$i=0;
//$count = 108;

//$page = isSet( $_GET['page']) ? intval( $_GET['page']) : 1;

/*$limit=10;*/

//$from= $page * $limit;

//$allPage= $count / $limit;

$product = (int) $_GET["product"];
$sql = "SELECT productCode, productName, productLine FROM products order by productName "; //. $from . ','. $limit;
/*echo 'LIMIT:'.$limit.'<br>';
echo 'FROM:'.$from.'<br>';
echo 'PAGE:'.$page.'<br>';
echo 'COUNT:'.$count.'<br>';
/*for($i=1;$i<=allPage;$i++)
{
    echo '<a href="alf.php?page=' . $i . '">'. $i . '</a>';
}
*/
$qry = new dbQuery($sql);
$prod = $qry->next();
//$cnt .= "<div class='post'>\n";

while (($prod = $qry->next()) != NULL) {
    $i++;
//$cnt .= "<div class='text'>" 
    $lnk[] = "<a href='produkt.php?productCode={$prod["productCode"]}'><h3>{$prod["productName"]}</h3></a>";
    $lnk1[] = "<a href='kategoriee.php?productLine={$prod["productLine"]}'><h3>{$prod["productLine"]}<h3></a>";
     
    //$cnt .= "</div>\n";
}
for ($a=0;$a<($i/10);$a++){
    $cnt .= "<a href='alf.php?pg={$a}'><span class='licznik'>$a</span></a> ";
}
$cnt .= "<div class='post'>\n";
if (isset($_GET['pg'])){
   $a=$_GET['pg']*10; 
}
$p=$a+10;
while ($a<$p && $a<$i){
    $cnt .= "<div class='text'>"
      . "<h4>$lnk[$a] $lnk1[$a]</h4>" 
      . "</div>\n";
    $a++;
}
//$cnt .= "</div>\n";


$cnt .= "</div>\n";
echo getPage(getMenu(), $cnt);
?>