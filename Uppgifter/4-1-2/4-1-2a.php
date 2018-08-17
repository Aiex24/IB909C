<?php
header('Content-type: text/html');
//Ersätter markering i html-dpkumentet med det värde som skickas in
$html = file_get_contents("4-1-2b.html");
$html = str_replace('---value---', $_POST['name'], $html);
echo $html;
?>