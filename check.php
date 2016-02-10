<?php
include("header.php");
include("menu.php");
$registration_id=$_SESSION['registration_id'];
$actor_type=actor_type($conn,$_SESSION['registration_id']);
if($actor_type!=='S' && $registration_id=='')
{
	header('location:index.php');
}
?>
