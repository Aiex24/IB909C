<?php
//Lagrar globala variabler i arrayen superglobals tillsammans med nyckel
header('Content-type: text/plain');
$superglobals = array(
	'$_REQUEST' => $_REQUEST, 
	'$_GET' => $_GET,
    '$_SERVER' => $_SERVER, 
	'$_ENV' => $_ENV,
    '$_POST' => $_POST, 
);

//Skriver ut alla värden i arrayen
        foreach ($superglobals as $globalkey => $global) {
            foreach ($global as $key => $value) {
                echo  $key . ': ' . $value . "\n";
            }
        }
?>
