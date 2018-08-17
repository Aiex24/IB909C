<?php
$cookie_name = "4-2Cookie";
$value  = date('d-m H:i:s');
//Sätter tidslängden till 3h
setcookie($cookie_name, $value, time() + (3600 * 3), "/");

header('Content-type: text/html');


$html = file_get_contents("4-2a.html");
$html = str_replace('---name---', $cookie_name, $html);
echo $html;



?>