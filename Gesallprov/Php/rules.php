<?php

header('Content-type: text/html');

$rulestring ="";

$fh = fopen('../Resources/rules.txt','r');
while ($line = fgets($fh)) {
  $rulestring = $rulestring. "<br>". $line;
}
fclose($fh);

$ruleshtml = file_get_contents("../Views/rules.html");
$ruleshtml = str_replace('<!--text-->', $rulestring, $ruleshtml);

$ruleshtml = utf8_encode($ruleshtml);
$ruleshtml = json_encode($ruleshtml);
echo ($ruleshtml);
?>

