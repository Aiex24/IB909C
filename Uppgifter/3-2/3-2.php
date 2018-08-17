<?php
//Lagrar globala variabler i arrayen superglobals tillsammans med nyckel

$superglobals = array(
	'$_REQUEST' => $_REQUEST, 
	'$_GET' => $_GET,
    '$_SERVER' => $_SERVER, 
	'$_ENV' => $_ENV,
    '$_POST' => $_POST, 
);

//Läser in html-dokument
$html = file_get_contents("3-2.html");

//Splitar html-koden där '<!--===xxx===-->' finns
$htmlArr = explode('<!--===xxx===-->',$html);

//Lagrar den del av htmlen som ska ersättas dvs tabell-delen
$htmlString = $htmlArr[1];

//Rensar den del som ska skrivas om;
$htmlArr[1] = "";

//Ersätter den del som där varje klobalvärde ska in
foreach ($superglobals as $globalkey => $global) {
    foreach ($global as $key => $value) {
		$tempString = $htmlString;
		$tempString = str_replace('---name---', $key, $tempString);
		$tempString = str_replace('---value---', $value, $tempString);
        $htmlArr[1] = $htmlArr[1] . $tempString;
        }
}

//Skriver ut html-elementen
for ($x = 0; $x <= 2; $x++) {
    echo $htmlArr[$x];
} 

?>