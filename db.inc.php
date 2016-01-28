<?php 
date_default_timezone_set('Asia/Calcutta');
error_reporting(0);

$servername = "localhost";
$username = "root";
$password = "";
$dbname ="jobready";
// Create connection
$conn = new mysqli($servername, $username, $password,$dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

?>