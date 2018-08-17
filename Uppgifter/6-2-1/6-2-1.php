<?php

//Läser in html element från fil
header('Content-type: text/html');
$html = file_get_contents("6-2-1.html");
echo $html;

//php-fil för att koppla upp sig mot databasen
include "database.php";

//Läser in värden från databasen
$sql = "SELECT * FROM usercomments";
$result = $conn->query($sql);
$conn->close();
if ($result->num_rows > 0) {
    // Lägger till värdena från databasen till html-koden
    while($row = $result->fetch_assoc()) {
		$htmlComment = file_get_contents("commentHtml.html");
		$htmlComment = str_replace('<!---id--->', $row["ID"], $htmlComment);
        $htmlComment = str_replace('<!---webpage--->', $row["Website"], $htmlComment);
		$htmlComment = str_replace('<!---time--->', $row["Time"], $htmlComment);
		$htmlComment = str_replace('<!---sender--->', $row["Sender"], $htmlComment);
		$htmlComment = str_replace('<!---email--->', $row["Email"], $htmlComment);
		$htmlComment = str_replace('<!---comment-->', $row["Comment"], $htmlComment);
		echo $htmlComment;
    }
}
?>