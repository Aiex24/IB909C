<?php
header('Content-type: text/plain');
echo "\n";

//Skriver ut alla nycklar med värde som skickas in
foreach ($_POST as $key => $value) {
    echo  $key . ' = ' . $value . "\n";
}
?>