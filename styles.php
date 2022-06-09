<?php

session_start();
require_once 'common.php';
require_once 'template.php';

$cnt = "<h1>Pracownicy</h1>";

$cnt = "<h1>Nagłówek &lt;h1&gt;</h1>\n" 
    . "<h2>Nagłówek &lt;h2&gt;</h2>\n" 
    . "<h3>Nagłówek &lt;h3&gt;</h3>\n" 
    . "<h4>Nagłówek &lt;h4&gt;</h4>\n"
    . "<p>Poniżej nagłówek &lt;h4 class='menu'&gt;" 
    . "<h4 class='menu'>\n"
    . "<a href='#'>Odnośnik &lt;a href='...'&gt;opis&lt;/a&gt;</a> &bull; " 
    . "<a href='#'>Kolejny odnośnik</a> " 
    . "</h4>\n"
    . "<p>Akapit &lt;p&gt;</p>\n" 
    . "<div class='post'><h3>Pudełko zewnętrzne &lt;div class='post'&gt;</h3>" 
    . "<p>Powyżej nagłówek &lt;h3&gt;, tu akapit &lt;p&gt;" 
    . "<div class='text'><h4>Pudełko wewnętrzne &lt;div class='text'&gt;</h4>" 
    . "<p>Powyżej nagłówek &lt;h4&gt;, tu akapit &lt;p&gt;" 
    . "</div>" 
    . "</div>";


echo getPage(getMenu(), $cnt);
?>