<?php 
session_start();
ob_start();
include('db.inc.php');
include('functions.php');
?>
<?php 
$action=$_POST['action'];
if($action=="addtraining"){
$url="training_cources.php";
$error_msg="";
$registration_id=$_SESSION['registration_id'];
$post_date=date('Y-m-d h:i:s');
$create_dir = "upload/training_doc/".$registration_id; 
if (!file_exists($create_dir)) { 
mkdir($create_dir, 0777);
}
$area_of_interest=$_POST['area_of_interest'];
if($area_of_interest=="")
	$error_msg.="<li>Please Select a category</li>";
		
$description=check_string($_POST['description']);
if($description==1)
		$error_msg.="<li>Enter Some Description</li>";
	else	
		$description=$_REQUEST['description'];	
	
$file_name=$_FILES['doc']['name'];
$file_temp=$_FILES['doc']['tmp_name'];
$file_type=$_FILES['doc']['type'];
$file_size=$_FILES['doc']['size'];
if($_FILES['doc']['name']!="")
{
	$doc=uploadFile($file_name,$file_temp,$file_type,$file_size,"training_doc");
	if(preg_match("<li>",$upload_cv))
		$error_msg.=$upload_cv;
}
else
	$error_msg.="<li>Please Upload Some Document</li>";
	
if($error_msg=="")
{
	if($conn->query("insert into job_training_list set registration_id='$registration_id',area_of_interest='$area_of_interest',description='$description',doc='$doc',post_date='$post_date'")==TRUE)
	{
		$error_msg="success";
	}
	else
	{
		$error_msg="";
		$url="error.php";
	}
}	
echo json_encode(array('url'=>$url,'error_msg'=>$error_msg));
}
if($action=="delete"){
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
}
if($action=="showinterest"){
	$url="personal_trainings.php";
	$error_msg="";
	$training_id=$_POST['training_id'];
	$trainer_registraion_id=$_POST['trainer_registraion_id'];
	$registration_id=$_POST['registration_id'];
	$post_date=date('Y-m-d h:i:s');
	if($conn->query("insert into job_student_training_interest set training_id='$training_id',trainer_registraion_id='$trainer_registraion_id',registration_id='$registration_id',post_date='$post_date'")==TRUE)
	{
		$error_msg="success";
	}
	else
	{
		$error_msg="";
		$url="error.php";
	}
	echo json_encode(array('url'=>$url,'error_msg'=>$error_msg));
}
if($action=="acceptinterest"){
	$url="training_requests_from_candidates.php";
	$error_msg="";
	$id=$_POST['id'];
	if($conn->query("update job_student_training_interest set trainer_acceptance='Y' where id='$id'")==TRUE)
	{
		$error_msg="success";
	}
	else
	{
		$error_msg="";
		$url="error.php";
	}
	echo json_encode(array('url'=>$url,'error_msg'=>$error_msg));
}
?>
