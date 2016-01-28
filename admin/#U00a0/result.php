<?php
//session_start();
//require 'config.php';
include("header.php");
include("menu.php");
echo getUserName($conn,$registration_id);
$registration_id=$_SESSION['registration_id'];
$getattemptid= getAttemptID($conn,$registration_id);
error_reporting(1);
?>
<meta http-equiv="refresh" content="5;url=personal_dashboard.php">
<?php 
if(!empty($_SESSION['registration_id'])){
		
	$scores = getResult($conn, $_POST);
	if($scores){
		foreach ($scores as $key => $value) {
	//	echo $key . ": " . $value['sub_id'];  
	//	echo $key . ": " . $value['correctAns'];
	//	echo $key . ": " . $value['wrongAns'];
	//	echo $key . ": " . $value['unanswered'];
	//	echo $key . ": " . $value['total_question'];  
	//	echo $key . ": " . $value['total_marks_obtain'];		
	//echo "INSERT INTO `scores`(`id`, `user_id`, `subject_id`, `right_answer`, `wrong_answer`, `unanswered`, `total_question`, `total_marks_obtain`) VALUES ('','$registration_id','$value[sub_id]','$value[correctAns]','$value[wrongAns]','$value[unanswered]','$value[total_question]','$value[total_marks_obtain]')";	
	
	$neelx=$conn->query("INSERT INTO `scores`(`id`, `user_id`, `subject_id`, `right_answer`, `wrong_answer`, `unanswered`, `total_question`, `total_marks_obtain`,`total_marks`,`attempt_id`) VALUES ('','$registration_id','$value[sub_id]','$value[correctAns]','$value[wrongAns]','$value[unanswered]','$value[total_question]','$value[total_marks_obtain]','$value[total_marks]','$getattemptid')");
		
		}	
	
	}		
}
?>
<div class="page_title"><span>Thanks For Exam</span></div>

