<?php

session_start(); 
header('Content-type: text/html');
$newgamehtml = file_get_contents("../Views/newgame.html");
$newgamehtml = json_encode($newgamehtml);
echo $newgamehtml;

?>