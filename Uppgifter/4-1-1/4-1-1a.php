
<?php
header('Content-type: text/html');

//Läser in ett html-dokument och lägger till värdet som skickades in vid markeringen
$html = file_get_contents("4-1-1b.html");
$html = str_replace('---name---', $_GET['name'], $html);
echo $html;
?>