<?php
 header('Content-type: text/html');
$cookie_name = $_GET['name'];
$msg = $cookie_name . "hittades inte";
$html = file_get_contents("4-2b.html");
if(isset($_COOKIE[$cookie_name])) {
  

$html = str_replace('<!---Time---->', "Tid: " . $_COOKIE[$cookie_name], $html);
$html = str_replace('<!---Name---->', "Namn: " . $cookie_name, $html);
$msg = "Följande information inbäddad i kakor sändes nu från dig till webbserversidesprogrammet:\n\n";

}
$html = str_replace('<!---Msg---->', "Namn: " . $msg, $html);

echo $html;
?>