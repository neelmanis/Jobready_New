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
	$trainer_registraion_id=$_POST['trainer_registraion_id'];
	$post_date=date('Y-m-d h:i:s');
	$feed_description=check_string($_POST['feed_description']);
	if($feed_description==1)
			$error_msg.="<li>Enter Some Description</li>";
		else	
			$feed_description=$_POST['feed_description'];	
			
	if($error_msg=="")
	{ 
		$check=$conn->query("select * from master_feedback where trainer_id='$trainer_registraion_id' and registration_id='$registration_id'");
		$checkrows=$check->num_rows;
		if($checkrows>0)
		  		$error_msg.="Feedback is Alredy given";
		  else 
		  { 
			if($conn->query("insert into master_feedback set registration_id='$registration_id',trainer_id='$trainer_registraion_id',feed_description='$feed_description',status='1',post_date='$post_date'")==TRUE)
			{
				$error_msg="success";
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
?>
