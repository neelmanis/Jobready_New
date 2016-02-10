<?php
include("header.php");
$registration_id=$_SESSION['registration_id'];
	if(!isset($_SESSION['registration_id']) || actor_type($conn,$registration_id)!="S")
			header('location:index.php');
include("menu.php");
$attemptid= getAttemptID($conn,$registration_id);
?>

<?php 
$exam_type=$_SESSION['exam_type'];
if(!empty($_SESSION['registration_id'])){
$scores = getResult($conn, $_POST);
if($scores){
	foreach ($scores as $key => $value) {
	$result=$conn->query("select * from `scores` where registration_id='$registration_id' and attempt_id='$attemptid' and `subject_id`='$value[sub_id]'");
	$num=$result->num_rows;
	if($num==0)
	{
	$neelx=$conn->query("INSERT INTO `scores` set `registration_id`='$registration_id',`attempt_id`='$attemptid',`exam_type`='$exam_type',`subject_id`='$value[sub_id]',`right_answer`='$value[correctAns]', `wrong_answer`='$value[wrongAns]', `unanswered`='$value[unanswered]', `total_question`='$value[total_question]', `total_marks_obtain`='$value[total_marks_obtain]',`total_marks`='$value[total_marks]'");	
			}
		}	
	}		
}
header('location:exam_score.php');
?>

