<?php @session_start();@ob_start();include('db.inc.php');include('functions.php');?>
<?php $regisType=$_POST['regisType'];if($regisType=="login"){	if($_POST['username']=="Enter your Email or Mobile No")		$error_msg.="<li>Enter valid username</li>";	else		$username=$_POST['username'];
	if($_POST['password']=="Password")		$error_msg.="<li>Enter valid password</li>";	else		$password=$_POST['password'];	$redirect_url=$_POST['redirect_url'];	if($error_msg=="")	{		$result=$conn->query("select * from job_registration where (email='$username' || mobile_no='$username') and password='".md5($password)."' and status=1");		$num=$result->num_rows;		$row=$result->fetch_assoc();		$error_msg="";		$url="";		if($num>0)		{
			$actor_type=actor_type($conn,$row['id']);
			$_SESSION['registration_id']=$row['id'];
			$_SESSION['registration_type']=$row['registration_type'];
			if($redirect_url!="")
				$url=$redirect_url;
			elseif($_SESSION['registration_type']=="A")
				$url="employer_job.php";
			elseif($actor_type=='S')
				$url="personal_dashboard.php";
			elseif($actor_type=='T')
				$url="trainer_dashboard.php";
			elseif($actor_type=='F')
				$url="employer_dashboard.php";
			else 
				$url="select_actor.php";
		}
		else
			$error_msg="Your username or password is invalid";
	}
	echo json_encode(array('url'=>$url,'error_msg'=>$error_msg));
}
if($regisType=="signup")
{
	$error_msg="";
	$url="";
	$email_flag=check_email($_POST['email']);
	
	if($email_flag==1)
		$email=$_POST['email'];
	else if($_POST['email']=="Enter your Email")
		$error_msg.="<li>Enter valid email id</li>";
	else
		$error_msg.="<li>Enter valid email id</li>";
		
	if($_POST['password']=="Password")
		$error_msg.="<li>Enter valid password</li>";
	else
		$password=md5($_POST['password']);
	
	$mobile_no_flag=check_mobno($_POST['mobile_no']);
	if($mobile_no_flag==1)
		$error_msg.="<li>Enter valid mobile no</li>";
	else if($_POST['mobile_no']=="Mobile Number")
		$error_msg.="<li>Enter valid mobile no</li>";
	else
		$mobile_no=$_POST['mobile_no'];
		
	if(empty($_SESSION['captcha_code'] ) ||  strcasecmp($_SESSION['captcha_code'], $_POST['captcha_code']) != 0)
		$error_msg.= "The captcha code does not match!";
		
	$post_date=date('Y-m-d h:i:s');
	
	$ip_address=$_SERVER['REMOTE_ADDR']?:($_SERVER['HTTP_X_FORWARDED_FOR']?:$_SERVER['HTTP_CLIENT_IP']);
	if($error_msg==""){
	$result = $conn->query("select * from job_registration where (email='$email' || mobile_no='$mobile_no')");
	if($result->num_rows>0)
		$error_msg="<li>You have been already registered with this Email id <br/>or Mobile no</li>";
	else
	{
		if($conn->query("insert into job_registration set email='$email',password='$password', mobile_no='$mobile_no',post_date='$post_date',modified_date='$post_date',ip_address='$ip_address',status=1")==TRUE)
		{
			$_SESSION['registration_id']=$conn->insert_id;
			$actor_type=actor_type($conn,$_SESSION['registration_id']);
			if($actor_type=='S' || $actor_type=='T' || $actor_type=='F')
			{
				$url="registration_step1.php";
			}
			else
			{
				$url="select_actor.php";
			}
		}
		else
		{
			$error_msg="<li>Sorry there is some problem ..Kindly contact with admin</li>";	
			$url="error.php";
		}
	  }
	}
	echo json_encode(array('url'=>$url,'error_msg'=>$error_msg));
}

if(isset($_POST['actorType']) && $_POST['actorType']=="actorType"){
$registration_id=$_SESSION['registration_id']; 
	$type_of_actor=$_POST['type_of_actor'];
	if($type_of_actor=="firm"){$type_of_actor="F";}
	elseif($type_of_actor=="student"){$type_of_actor="S";}
	elseif($type_of_actor=="trainer"){$type_of_actor="T";}
	else{$type_of_actor="O";}
	$url="";
	$error_msg="";
	//echo "update job_registration set type_of_actor='$type_of_actor' where id='$registration_id'";exit;
	if($conn->query("update job_registration set type_of_actor='$type_of_actor' where id='$registration_id'")==TRUE)
	{
		$actor_type=actor_type($conn,$registration_id);
		if($actor_type=='S')
		{
			$url="student_trainer_registration.php";
		}
		elseif($actor_type=='T')
		{
			$url="student_trainer_registration.php";
		}
		elseif($actor_type=='F')
		{
			$url="company_registration.php";
		}
	}
	else
	{
		
		$url="error.php";
		$error_msg="<li>Sorry there is some problem ..Kindly contact with admin</li>";
	}
	echo json_encode(array('url'=>$url,'error_msg'=>$error_msg));
}
?>
