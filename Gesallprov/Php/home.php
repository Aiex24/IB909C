<?php

header('Content-type: text/html');

$introstring ="";

$fh = fopen('../Resources/intro.txt','r');
while ($line = fgets($fh)) {
  $introstring = $introstring. "<br>". $line;
}
fclose($fh);

$introhtml = file_get_contents("../Views/home.html");
$introhtml = str_replace('<!--intro-->', $introstring, $introhtml);

$introhtml = utf8_encode($introhtml);
$introhtml = json_encode($introhtml);
echo ($introhtml);
?>