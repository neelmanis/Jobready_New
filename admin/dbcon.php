<?php
$dbname="jobready";
$dbhost="localhost";
$dbuser="root";
$dbpass="";

@$conn = mysql_connect($dbhost,$dbuser,$dbpass) or die("Connection failed");
$db=mysql_select_db("jobready", $conn) or die("Database not connected");
/*
$dbname="kwebcpan_jobreadydemodb";
$dbhost="localhost";
$dbuser="kwebcpan_jobread";
$dbpass="mukeshgiit@86";

@$conn = mysql_connect($dbhost,$dbuser,$dbpass) or die("Connection failed");
$db=mysql_select_db("kwebcpan_jobreadydemodb", $conn) or die("Database not connected");
*/
?>