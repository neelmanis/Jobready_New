<?php 
session_start();
ob_start();
include('db.inc.php');
include('functions.php');
?>
<?php 
$action=$_POST['action'];
if($action=="addfeedback"){
$url="personal_trainings.php";
$error_msg="";
$registration_id=$_SESSION['registration_id'];
//$training_id=$_POST['training_id'];
$trainer_id=$_POST['trainerID'];
$post_date=date('Y-m-d h:i:s');

		
$feed_description=check_string($_POST['feed_description']);
if($feed_description==1)
		$error_msg.="<li>Enter Some Description</li>";
	else	
		$feed_description=$_REQUEST['feed_description'];	
	


if($error_msg=="")
{
	
	$check=mysqli_query($conn,"select * from master_feedback where feed_description='$feed_description' and registration_id='$registration_id'");
    $checkrows=mysqli_num_rows($check);
	if($checkrows>0) {
      echo "Feedback is Alredy given";
	  } else { 

	if($conn->query("insert into master_feedback set registration_id='$registration_id',trainer_id='$trainer_id',feed_description='$feed_description',status='0',post_date='$post_date'")==TRUE)
	{
		$error_msg="success";
		//$url="thanks.php";
		
	}
	else
	{
		$error_msg="";
		$url="error.php";
	}
}
}
echo json_encode(array('url'=>$url,'error_msg'=>$error_msg));

}
/*if($action=="delete"){
	$url="training_cources.php";
	$error_msg="";
	$id=$_POST['clasId'];
	if($conn->query("delete from job_training_list where id='$id'")==TRUE)
	{
		$error_msg="success";
	}
	else
	{
		$error_msg="";
		$url="error.php";
	}
	echo json_encode(array('url'=>$url,'error_msg'=>$error_msg));
}*/
?>
