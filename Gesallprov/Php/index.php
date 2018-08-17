<?php

header('Content-type: text/html');

$gamehtml = file_get_contents("../Views/newgame.html");

$html = json_encode($gamehtml);

echo $html;
?>