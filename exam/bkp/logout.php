<?php 
session_start();
ob_start();
session_destroy();
unset($_SESSION['registration_id']);
header("Location:../index.php");
?>