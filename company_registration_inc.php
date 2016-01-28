<?php 
session_start();
ob_start();
include('db.inc.php');
include('functions.php');
?>
<?php
	$url="";
	$error_msg="";
	$registration_id=$_SESSION['registration_id'];
	$actor_type=actor_type($conn,$registration_id);
	
	if($actor_type=='S')
		$url="personal_dashboard.php";
	elseif($actor_type=='T')
		$url="trainer_dashboard.php";
	elseif($actor_type=='F')
		$url="employer_dashboard.php";
	else
		$url="select_actor.php";
	
	$company_name_flag=check_string($_REQUEST['company_name']);
	if($company_name_flag==1)
		$error_msg.="<li>Enter valid Company Name</li>";
	else	
		$company_name=$_REQUEST['company_name'];
		
   $company_profile=$_REQUEST['company_profile'];
   if($company_profile=="")
   	  $error_msg.="<li>Enter Company Profile</li>";
	else
	 $company_profile=$_REQUEST['company_profile'];

	$fname_flag=check_string($_REQUEST['fname']);
	if($fname_flag==1)
		$error_msg.="<li>Enter valid Contact Person Name</li>";
	else	
		$fname=$_REQUEST['fname'];

	if($_POST['company_contact_email']=="")
		$error_msg.="<li>Enter Enter Valid Email id</li>";
	else
		$company_contact_email=$_POST['company_contact_email'];
	
	$comapny_landline=$_REQUEST['comapny_landline'];		
	$address1_flag=check_string($_REQUEST['address1']);
	if($address1_flag==1)
		$error_msg.="<li>Enter valid address1</li>";
	else
	$address1=$_REQUEST['address1'];
	
	$address2_flag=check_string($_REQUEST['address2']);
	if($address2_flag==1)
		$error_msg.="<li>Enter valid address2</li>";
	else
	$address2=$_REQUEST['address2'];

	$address3=$_POST['address3'];
	
	$pincode_flag=check_string($_REQUEST['pincode']);
	if($pincode_flag==1)
		$error_msg.="<li>Enter valid pincode</li>";
	else
	$pincode=$_REQUEST['pincode'];
	
	if($error_msg=="")
	{
		if($conn->query("update job_profile set fname='$fname',company_name='$company_name',company_profile='$company_profile',company_contact_email='$company_contact_email',comapny_landline='$comapny_landline',address1='$address1',address2='$address2',address3='$address3',pincode='$pincode' where registration_id='$registration_id'")==TRUE)
		{
			$error_msg="success";
		}
		else
		{
			$url="error.php";
			$error_msg="";
		}
	}
	echo json_encode(array('url'=>$url,'error_msg'=>$error_msg));
?>