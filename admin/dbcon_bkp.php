<?php
$dbhost="jobreadydemodb.db.5456494.hostedresource.com";
$dbname="jobreadydemodb";
$dbuser="jobreadydemodb";
$dbpass="Naukari@2015";

$conn = mysql_connect($dbhost,$dbuser,$dbpass) or die("Connection failed");
$db=mysql_select_db($dbname,$conn) or die("Database not connected");
?>