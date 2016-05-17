<?php 
session_start();
ob_start();
include('db.inc.php');
include('functions.php');
?>
<?php 
$action=$_POST['action'];
if($action=="addjob"){
$registration_id=$_SESSION['registration_id'];
$url="employer_job.php";
$error_msg="";
$registration_id=$_SESSION['registration_id'];
$post_date=date('Y-m-d h:i:s');
$job_code=$_POST['job_code'];
if($job_code=="")
	$error_msg.="<li>Please Select Job Code</li>";
$designation=check_string($_POST['designation']);
if($designation==1)
		$error_msg.="<li>Enter Some Designation</li>";
	else	
		$designation=$_REQUEST['designation'];
	
$job_title=check_string($_POST['job_title']);
if($job_title==1)
		$error_msg.="<li>Enter Job Title</li>";
	else	
		$job_title=$_REQUEST['job_title'];	
	
$keyword=$_POST['keyword'];
if($keyword=="")
		$error_msg.="<li>Enter Some keyword</li>";
	else	
		$keyword=$_REQUEST['keyword'];
	
$job_desc=$_POST['job_desc'];
if($job_desc=="")
		$error_msg.="<li>Enter Valid Description</li>";
	else	
		$job_desc=$_REQUEST['job_desc'];
	
$co_profile=$_POST['co_profile'];
if($co_profile=="")
		$error_msg.="<li>Enter Company profile</li>";
	else	
		$co_profile=$_REQUEST['co_profile'];	
if($_POST['job_from']=="")
		$error_msg.="<li>Enter job start date</li>";
	else	
		$job_from=$_REQUEST['job_from'];
	
		$job_to=$_REQUEST['job_to'];	
		$min_exp=$_REQUEST['min_exp'];	
		$no_job=$_REQUEST['no_job'];	
if($_POST['area_of_interest']=="")
		$error_msg.="<li>Select Area of Interest</li>";
	else	
		$area_of_interest=$_REQUEST['area_of_interest'];	
$job_location=check_string($_POST['job_location']);
if($job_location==1)
		$error_msg.="<li>Choose Job Location</li>";
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
			if($conn->query("update master_job set modified_date='$modified_date',job_code='$job_code',designation='$designation',job_title='$job_title',keyword='$keyword',job_desc='$job_desc',co_profile='$co_profile',salary_from='$salary_from',salary_to='$salary_to',job_from='$job_from',job_to='$job_to',area_of_interest='$area_of_interest',job_location='$job_location',min_exp='$min_exp',no_job='$no_job' where id='$jobId' and registration_id='$registration_id'")==TRUE)
			$error_msg="success";
		else{$error_msg="";$url="error.php";}
		}
		else
		{
		if($conn->query("insert into master_job set registration_id='$registration_id',post_date='$post_date',modified_date='$modified_date',job_code='$job_code',designation='$designation',job_title='$job_title',keyword='$keyword',job_desc='$job_desc',co_profile='$co_profile',salary_from='$salary_from',salary_to='$salary_to',job_from='$job_from',job_to='$job_to',area_of_interest='$area_of_interest',job_location='$job_location',min_exp='$min_exp',no_job='$no_job'")==TRUE)
			$error_msg="success";
		else{$error_msg="";$url="error.php";}
		}
	}	
	echo json_encode(array('url'=>$url,'error_msg'=>$error_msg));
}
if($action=="showjobinterest"){
	$url="search_for_job.php";
	$error_msg="";
	$job_id=$_POST['job_id'];
	$employer_registraion_id=$_POST['employer_registraion_id'];
	$registration_id=$_POST['registration_id'];
	$post_date=date('Y-m-d h:i:s');
	
	
	$query=$conn->query("SELECT * FROM `job_student_job_interest` WHERE job_id='$job_id' and registration_id='$registration_id'");
	$num=$query->num_rows;
	if($num>0)
		$error_msg="You have already applied";
	else
	{
		if($conn->query("insert into job_student_job_interest set job_id='$job_id',employer_registraion_id='$employer_registraion_id',registration_id='$registration_id',post_date='$post_date'")==TRUE)
		{
			$error_msg="success";
		}
		else
		{
			$error_msg="Could not Apply.";
			$url="error.php";
		}
	}
	echo json_encode(array('url'=>$url,'error_msg'=>$error_msg));
}
if($action=="acceptjobinterest"){
	$url="employer_interested_candidate.php";
	$error_msg="";
	$id=$_POST['id'];
	if($conn->query("update job_student_job_interest set employer_acceptance='Y' where id='$id'")==TRUE)
	{
		$error_msg="success";
	}	else	{
		$error_msg="";
		$url="error.php";
	}
	echo json_encode(array('url'=>$url,'error_msg'=>$error_msg));
}
if($action=="candidatecontact"){
	$url="employer_candidates_contacted.php";
	$error_msg="";
	$id=$_POST['id'];
	if($conn->query("update job_student_job_interest set candidate_interviewed='Y' where id='$id'")==TRUE)
	{
		$error_msg="success";
	}	else	{
		$error_msg="";
		$url="error.php";
	}
	echo json_encode(array('url'=>$url,'error_msg'=>$error_msg));
}
if($action=="addRecruiter"){
	$url="employer_recruiter_listing.php";
	$error_msg="";
	$registration_id=$_SESSION['registration_id'];
	$registration_type=$_POST['registration_type'];
	$referenceId=getReferenceId($conn,$registration_id);
	$check_name=check_string($_POST['name']);
	if($check_name==1 || $_POST['name']=="Name")
		$error_msg.="<li>Please enter name</li>";
	else	
		$name=$_POST['name'];	
	$check_company_name=check_string($_POST['company']);
	if($check_company_name==1 || $_POST['company']=="Company")
		$error_msg.="<li>Please Enter Company Name</li>";
	else	
		$company=$_POST['company'];	
	
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
	if($error_msg=="")	{
		if(!isset($_POST['recruiter_id']) && $_POST['recruiter_id']=='')
		{
		$result = $conn->query("select * from job_registration where (email='$email' || mobile_no='$mobile')");
		if($result->num_rows>0)
			$error_msg="<li>You have been already registered with this email id</li>";		
		else if($conn->query("insert into job_registration set registration_type='$registration_type',type_of_actor='F',refer_registration_id='$referenceId',email='$email',password='$password', mobile_no='$mobile',post_date='$post_date',modified_date='$post_date',ip_address='$ip_address',status=1")==TRUE)			{
			$recruiter_id=$conn->insert_id;
			$conn->query("update job_profile set fname='$name',designation='$designation',company_name='$company' where registration_id='$recruiter_id'");
			}
			else
			{
				$error_msg="<li>Sorry there is some problem ..Kindly contact with admin</li>";	
				$url="error.php";
			}
		}
		else
		{
			$recruiter_id=$_POST['recruiter_id'];
			$conn->query("update job_registration set registration_type='$registration_type',type_of_actor='F',refer_registration_id='$referenceId',email='$email',password='$password', mobile_no='$mobile',modified_date='$post_date',ip_address='$ip_address' where id='$recruiter_id'"); 
		$conn->query("update job_profile set fname='$name',designation='$designation',company_name='$company' where registration_id='$recruiter_id'");
		}
	}
	echo json_encode(array('url'=>$url,'error_msg'=>$error_msg));
}
if($action=="sendoffer"){
	$url="employer_candidates_contacted.php";
	$error_msg="";
		
	$offered=$_REQUEST['offered'];
	
	$check_description=check_string($_POST['comment']);
	if($_POST['comment']=="")
		$error_msg.="<li>Please enter Feedback</li>";
	else
	//$comment=$_POST['comment'];
	$comment = ereg_replace( "\n","<br/>", $_POST['comment']);

	$candidate_id=$_POST['candidate_id'];
	if($error_msg=="")
	{
		$conn->query("update job_student_job_interest set candidate_offered='$offered',comment='$comment',comment_date=NOW() where id='$candidate_id'");
	}
	echo json_encode(array('url'=>$url,'error_msg'=>$error_msg));
}
// Send Mail to Jobbready For Training
if($action=="sendcontact"){  
	$url="employer_training_offered.php";
	$error_msg="";
	$check_description=check_string($_POST['description']);
	if($check_description==1 || $_POST['description']=="description")
		$error_msg.="<li>Please enter description</li>";
	else
	$description=$_POST['description'];
	
	$admin_mail=$_POST['admin_mail'];
	$co_u_name=$_POST['co_u_name'];
	
	$co_name=$_POST['company_name'];
	$user_mail=$_POST['user_mail'];
	if($error_msg=="")
	{	
	$to = "$admin_mail";
	$subject = "Jobbreay Enquiry Details";
	$body = '<table width="100%" height="auto" cellspacing="0" cepadding="0" border="0" align="center" style=" font-family:Arial, Helvetica, sans-serif; font-size:14px; ">    
    <tr>
    <td width="19" ></td>
    <td colspan="2" style="padding:10px; color:#FFFFFF; font-weight:bold;"><img src="http://digitalagencymumbai.com/jobready/images/logo.png" style="width:125px;"/> </td>
    <td width="19" >&nbsp;</td>
    </tr>
    <tr>
    <td bgcolor="#ED1A21" style="padding:10px;">&nbsp;</td>
    <td colspan="2" bgcolor="#ED1A21" style="padding:10px; font-size:30px; text-align:center; color:#fff;">Welcome to Jobb Ready</td>
   <td bgcolor="#ED1A21" style="padding:10px;">&nbsp;</td>
    </tr>   

    <tr>
    <td >&nbsp;</td>
    <td colspan="2">
    <table width="1000px" border="0" cellspacing="0" cellpadding="0" align="center">  
    <tr>
<td valign="top"  style="padding:10px; line-height:20px; font-family:Arial, Helvetica, sans-serif; font-size:14px;">
<strong style="font-size:18px;">Thanks for Contact Jobb Ready</strong>
<p>Company:'.$co_name.' </p>
<p>Contact person:'.$co_u_name.' </p>
<p>Email: '.$user_mail.'</p>
<p>Comment: '.$description.'</p>
    </td>
    </tr>    
    </table>
    </td>
    </tr>    
   </table>';
$headers  = 'MIME-Version: 1.0'."\n"; 
$headers .= 'Content-type: text/html; charset=iso-8859-1'."\n";
$headers .= 'From:JobbReady <do-not-reply@jobbready.com>'."\n";
mail($to, $subject, $body, $headers);
} 
echo json_encode(array('url'=>$url,'error_msg'=>$error_msg));	
} 
if($action=="showcandidateinterest"){
	$url="employer_candidates_contacted.php";
	$error_msg="";

	$employer_registraion_id=$_POST['employer_registraion_id'];
	$registration_id=$_POST['registration_id'];
	
	$candidatEmail = getUserEmail($conn,$registration_id);
	$candidatName = getUserName($conn,$registration_id);
	
	$companyEmail = getUserEmail($conn,$employer_registraion_id);
	$comanyName=getCompanyName($conn,$employer_registraion_id);
	$comanyMobile=getUserMobile($conn,$employer_registraion_id);
	
	
	$subject = $comanyName." showing interest in your profile";
	$body = '<table width="100%" height="auto" cellspacing="0" cepadding="0" border="0" align="center" style=" font-family:Arial, Helvetica, sans-serif; font-size:14px; ">    
    <tr>
    <td width="19" ></td>
    <td colspan="2" style="padding:10px; color:#FFFFFF; font-weight:bold;"><img src="http://digitalagencymumbai.com/jobready/images/logo.png" style="width:125px;"/> </td>
    <td width="19" >&nbsp;</td>
    </tr>
    <tr>
    <td bgcolor="#ED1A21" style="padding:10px;">&nbsp;</td>
    <td colspan="2" bgcolor="#ED1A21" style="padding:10px; font-size:30px; text-align:center; color:#fff;">'.$comanyName.' showing interest in your profile</td>
   <td bgcolor="#ED1A21" style="padding:10px;">&nbsp;</td>
    </tr>   

    <tr>
    <td >&nbsp;</td>
    <td colspan="2">
    <table width="1000px" border="0" cellspacing="0" cellpadding="0" align="center">  
    <tr>
		<td valign="top"  style="padding:10px; line-height:20px; font-family:Arial, Helvetica, sans-serif; font-size:14px;">
		<p>Dear :'.$candidatName.', </p>
		<p>Company with following details showing intrest in you</p>
		<p>Company Name:'.$comanyName.' </p>
		<p>Contact person Email:'.$companyEmail.' </p>
		<p>mobile: '.$comanyMobile.'</p>
    </td>
    </tr>    
    </table>
    </td>
    </tr>    
   </table>';
	$headers  = 'MIME-Version: 1.0'."\n"; 
	$headers .= 'Content-type: text/html; charset=iso-8859-1'."\n";
	$headers .= 'From:JobbReady <do-not-reply@jobbready.com>'."\n";
	$mail=mail($candidatEmail, $subject, $body, $headers);
	if($mail)
		$error_msg="Success";
	else $error_msg="Success";
	
	echo json_encode(array('url'=>$url,'error_msg'=>$error_msg));
}

if($action=="sendjobdetails"){
	$url="employer_recruiter_listing.php";
	$error_msg="";
		
	$job_by=$_POST['job_by'];	
	$job_to=$_POST['job_to'];	
	
	if($error_msg=="")	{
	$conn->query("update master_job set  registration_id=$job_to where id='$job_by'");
	}
	echo json_encode(array('url'=>$url,'error_msg'=>$error_msg));
}
?>