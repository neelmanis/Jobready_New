<?php session_start();ob_start();include('db.inc.php');include('functions.php');?>
<?php $action=$_POST['action'];if($action=="addjob"){$registration_id=$_SESSION['registration_id'];$url="employer_job.php";$error_msg="";$registration_id=$_SESSION['registration_id'];$post_date=date('Y-m-d h:i:s');$job_code=$_POST['job_code'];if($job_code=="")	$error_msg.="<li>Please Select Job Code</li>";$designation=check_string($_POST['designation']);if($designation==1)		$error_msg.="<li>Enter Some Designation</li>";	else			$designation=$_REQUEST['designation'];	$keyword=check_string($_POST['keyword']);if($keyword==1)		$error_msg.="<li>Enter Some keyword</li>";	else			$keyword=$_REQUEST['keyword'];	
$job_desc=check_string($_POST['job_desc']);if($job_desc==1)		$error_msg.="<li>Enter Valid Description</li>";	else			$job_desc=$_REQUEST['job_desc'];	
$co_profile=check_string($_POST['co_profile']);
if($co_profile==1)
		$error_msg.="<li>Enter Company profile</li>";
	else	
		$co_profile=$_REQUEST['co_profile'];	
				
if($_POST['job_from']=="")
		$error_msg.="<li>Enter job start date</li>";
	else	
		$job_from=$_REQUEST['job_from'];	

if($_POST['job_to']=="")
		$error_msg.="<li>Enter job end date</li>";
	else	
		$job_to=$_REQUEST['job_to'];	

if($_POST['area_of_interest']=="")
		$error_msg.="<li>Enter Select Area of Interest</li>";
	else	
		$area_of_interest=$_REQUEST['area_of_interest'];	

$job_location=check_string($_POST['job_location']);
if($job_location==1)
		$error_msg.="<li>Enter Job Location</li>";
	else	
		$job_location=$_REQUEST['job_location'];
		
$salary_from=$_POST['minimal'];	
$salary_to=$_POST['maxval'];
$jobId=$_POST['jobId'];

$post_date=date('Y-m-d h:i:s');	

	if($error_msg=="")
	{
		$num=$conn->query("select * from master_job where id='$jobId' and registration_id='$registration_id'")->num_rows;
		if($num>0)
		{
			if($conn->query("update master_job set modified_date='$modified_date',job_code='$job_code',designation='$designation',keyword='$keyword',job_desc='$job_desc',co_profile='$co_profile',salary_from='$salary_from',salary_to='$salary_to',job_from='$job_from',job_to='$job_to',area_of_interest='$area_of_interest',job_location='$job_location' where id='$jobId' and registration_id='$registration_id'")==TRUE)
			$error_msg="success";
		else{$error_msg="";$url="error.php";}
		}
		else
		{
		if($conn->query("insert into master_job set registration_id='$registration_id',post_date='$post_date',modified_date='$modified_date',job_code='$job_code',designation='$designation',keyword='$keyword',job_desc='$job_desc',co_profile='$co_profile',salary_from='$salary_from',salary_to='$salary_to',job_from='$job_from',job_to='$job_to',area_of_interest='$area_of_interest',job_location='$job_location'")==TRUE)
			$error_msg="success";
		else{$error_msg="";$url="error.php";}
		}
	}	
	echo json_encode(array('url'=>$url,'error_msg'=>$error_msg));
}


if($action=="showjobinterest"){
	$url="jobs.php";
	$error_msg="";
	$job_id=$_POST['job_id'];
	$employer_registraion_id=$_POST['employer_registraion_id'];
	$admin_id=$_POST['admin_id'];
	$registration_id=$_POST['registration_id'];
	$post_date=date('Y-m-d h:i:s');
	if($conn->query("insert into job_student_job_interest set job_id='$job_id',employer_registraion_id='$employer_registraion_id',admin_id='$admin_id',registration_id='$registration_id',post_date='$post_date'")==TRUE)
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
if($action=="acceptjobinterest"){
	$url="employer_interested_candidate.php";
	$error_msg="";
	$id=$_POST['id'];	if($conn->query("update job_student_job_interest set employer_acceptance='Y' where id='$id'")==TRUE)	{		$error_msg="success";	}	else	{		$error_msg="";		$url="error.php";	}	echo json_encode(array('url'=>$url,'error_msg'=>$error_msg));}
if($action=="candidatecontact"){	$url="employer_candidates_contacted.php";	$error_msg="";	$id=$_POST['id'];	if($conn->query("update job_student_job_interest set candidate_interviewed='Y' where id='$id'")==TRUE)	{		$error_msg="success";	}	else	{		$error_msg="";		$url="error.php";	}	echo json_encode(array('url'=>$url,'error_msg'=>$error_msg));}
if($action=="addRecruiter"){ print_r($_POST);
	$url="employer_recruiter_listing.php";
	$error_msg="";
	$registration_id=$_SESSION['registration_id'];		$admin_type=$_POST['admin_type'];
	$check_name=check_string($_POST['name']);
	if($check_name==1 || $_POST['name']=="Name")
		$error_msg.="<li>Please enter name</li>";
	else	
		$name=$_POST['name'];	
	$check_designation=check_string($_POST['designation']);
	if($check_designation==1 || $_POST['designation']=="Designation")
		$error_msg.="<li>Please enter designation</li>";
	else	
		$designation=$_POST['designation'];	
	if($_POST['email']=="Email")
		$error_msg.="<li>Please enter email id</li>";
	else	
		$email=$_POST['email'];		
	if($_POST['mobile']=="Mobile")
		$error_msg.="<li>Please enter mobile no</li>";
	else	
		$mobile=$_POST['mobile'];		
	$password=$_POST['password'];
	if($password=="Password")
		$error_msg.="<li>Please enter password</li>";
	else	
		$password=md5($_POST['password']);	
		$post_date=date('Y-m-d h:i:s');
	$ip_address=$_SERVER['REMOTE_ADDR']?:($_SERVER['HTTP_X_FORWARDED_FOR']?:$_SERVER['HTTP_CLIENT_IP']);	
	if($error_msg=="")	{		if(!isset($_POST['recruiter_id']) && $_POST['recruiter_id']=='')
		{
		$result = $conn->query("select * from job_registration where email='$email'");
		if($result->num_rows>0)
			$error_msg="<li>You have been already registered with this email id</li>";		
		else if($conn->query("insert into job_registration set registration_type='$admin_type',type_of_actor='F',refer_registration_id='$registration_id',email='$email',password='$password', mobile_no='$mobile',post_date='$post_date',modified_date='$post_date',ip_address='$ip_address',status=1")==TRUE)			{
				$recruiter_id=$conn->insert_id;
				$conn->query("update job_profile set fname='$name',designation='$designation' where registration_id='$recruiter_id'");
			}
			else
			{
				$error_msg="<li>Soory there is some problem ..Kindly contact with admin</li>";	
				$url="error.php";
			}
		}
		else
		{
			$recruiter_id=$_POST['recruiter_id'];
			$conn->query("update job_registration set registration_type='$admin_type',type_of_actor='F',refer_registration_id='$registration_id',email='$email',password='$password', mobile_no='$mobile',modified_date='$post_date',ip_address='$ip_address' where id='$recruiter_id'");
		$conn->query("update job_profile set fname='$name',designation='$designation' where id='$recruiter_id'");		}	}
	echo json_encode(array('url'=>$url,'error_msg'=>$error_msg));}if($action=="sendoffer"){	$url="employer_candidates_contacted.php";	$error_msg="";		if($_POST['offered']=="")		$error_msg.="<li>Please Choose offered</li>";	else			$offered=$_REQUEST['offered'];			$check_description=check_string($_POST['comment']);	if($check_description==1 || $_POST['comment']=="comment")		$error_msg.="<li>Please enter Comment</li>";	else	$comment=$_POST['comment'];		$candidate_id=$_POST['candidate_id'];	if($error_msg=="")	{	$conn->query("update job_student_job_interest set candidate_offered='$offered',comment='$comment' where id='$candidate_id'");	}	echo json_encode(array('url'=>$url,'error_msg'=>$error_msg));}
?>
