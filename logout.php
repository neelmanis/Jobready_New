<?php 
session_start();
ob_start();
session_destroy();
unset($_SESSION['token']);  //Google token session data unset
unset($_SESSION['FBID']);
unset($_SESSION['registration_id']);
header("Location:index.php");

?>
