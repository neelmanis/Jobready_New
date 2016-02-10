<?php 
session_start();
ob_start();
include('db.inc.php');
include('functions.php');
?>
<?php 
$regis_step=$_POST['regis_step'];
/*.........................Personal Info.............................*/
if($regis_step=="personal_info")
{
	$url="";
	$error_msg="";
	$registration_id=$_SESSION['registration_id'];
	
	$fname_flag=check_string($_REQUEST['fname']);
	if($fname_flag==1)
		$error_msg.="<li>Enter valid name</li>";
	else	
		$fname=$_REQUEST['fname'];

	if($_POST['gender']=="")
		$error_msg.="<li>Select Gender</li>";
	else
	$gender=$_POST['gender'];
	
	$dob=$_POST['dob'];	
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
	
	$city_flag=check_string($_REQUEST['city']);
	if($city_flag==1)
		$error_msg.="<li>Enter valid city</li>";
	else
	$city=$_REQUEST['city'];
	
	if($error_msg=="")
	{
		if($conn->query("update job_profile set fname='$fname',gender='$gender',dob='$dob',address1='$address1',address2='$address2',address3='$address3',pincode='$pincode',city='$city' where registration_id='$registration_id'")==TRUE)
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
}
/*.........................Profile Info.............................*/
if($regis_step=="profile_info")
{
	$url="";
	$error_msg="";
	$registration_id=$_SESSION['registration_id'];
	$post_date=date('Y-m-d h:i:s');
	$create_dir = "upload/cv/".$registration_id; 
	if (!file_exists($create_dir)) { 
	mkdir($create_dir, 0777);
	}
	$selectItem=$_POST['selectItem'];
	$actor_type=actor_type($conn,$registration_id);
	/*...........................insert area of interest Start................................*/
	if(empty($_POST['selectItem']))
	{
		$error_msg.="<li>Please select your area of interest</li>";
	}
	else
	{
		$result=$conn->query("delete from job_area_of_interest where registration_id='$registration_id'");
		for($i=0;$i<count($selectItem);$i++)
		{
			$conn->query("insert into job_area_of_interest set registration_id='$registration_id',area_of_interest='$selectItem[$i]'");
		}
	}
	
	/*...........................insert area of interest End................................*/
	$file_name=$_FILES['upload_cv']['name'];
	$file_temp=$_FILES['upload_cv']['tmp_name'];
	$file_type=$_FILES['upload_cv']['type'];
	$file_size=$_FILES['upload_cv']['size'];
	$check_upload_cv=$_POST['check_upload_cv'];
	if($actor_type=='S')
	{
		if($_FILES['upload_cv']['name']!="")
		{
			$upload_cv=uploadFile($file_name,$file_temp,$file_type,$file_size,"cv");
			if(preg_match("<li>",$upload_cv))
				$error_msg.=$upload_cv;
		}
		else if($check_upload_cv!='')
			$upload_cv=$check_upload_cv;
		else
			$error_msg.="<li>Please Upload your CV</li>";
	}
	else
	{
		$upload_cv="";
	}
	
	$preffered_location_flag=check_string($_POST['preffered_location']);
	if($preffered_location_flag==1)
		$error_msg.="<li>Please enter valid location</li>";
	else
		$preffered_location=$_POST['preffered_location'];
		
	$brief_profile_flag=$_POST['brief_profile'];
	if($brief_profile_flag=="")
		$error_msg.="<li>Please enter valid text in your profile</li>";
	else
		$brief_profile=$_POST['brief_profile'];
		
	$keyword_skill_flag=check_string($_POST['keyword_skill']);
	if($keyword_skill_flag==1)
		$error_msg.="<li>Please enter valid text in your keyword</li>";
	else
		$keyword_skill=$_POST['keyword_skill'];
	
	if($error_msg=="")
	{	
		if($conn->query("update job_profile set brief_profile='$brief_profile',preffered_location='$preffered_location',keyword_skill='$keyword_skill',upload_cv='$upload_cv' where registration_id='$registration_id'")==TRUE)
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
/*.........................Educational Info.............................*/
if($regis_step=="educational_info")
{
	$url="";
	$error_msg="success";
	echo json_encode(array('url'=>$url,'error_msg'=>$error_msg));
}
/*.........................Educational Info.............................*/
if($regis_step=="employment_info")
{
	$url="";
	$error_msg="success";
	$step=3;
	$id=$_SESSION['registration_id'];
	$actor_type=actor_type($conn,$id);
	if($actor_type=='S')
	{
		$url="personal_dashboard.php";
	}
	elseif($actor_type=='T')
	{
		$url="trainer_dashboard.php";
	}
	elseif($actor_type=='F')
	{
		$url="employer_dashboard.php";
	}
	else
	{	
		$url="select_actor.php";
	}
	echo json_encode(array('url'=>$url,'error_msg'=>$error_msg,'step'=>$step));
}

if($_REQUEST['action']=="addEducation")
{
	$html="";
	$error_msg="";
	$registration_id=$_SESSION['registration_id'];
	$education=$_REQUEST['education'];
		
	$college=$_REQUEST['college'];
	$specialization=$_REQUEST['specialization'];
	$year_of_completion=$_REQUEST['year_of_completion'];
	$percentage=$_REQUEST['percentage'];
	$post_date=date('Y-m-d h:i:s');
	$ip_address=$_SERVER['REMOTE_ADDR']?:($_SERVER['HTTP_X_FORWARDED_FOR']?:$_SERVER['HTTP_CLIENT_IP']);
	$id=$_REQUEST['id'];
	if($_REQUEST['opration']=="delete")
	{
		if($conn->query("delete from job_education_profile where id='$id'") == TRUE)
		{
			$error_msg="Record deleted successfully";
		}
		else
		{
			$error_msg="Sorry record could not be deleted";
		}
	}
	else
	{
		if($conn->query("insert into job_education_profile set registration_id='$registration_id',education='$education',college='$college',specialization='$specialization',year_of_completion='$year_of_completion',percentage='$percentage',post_date='$post_date',ip_address='$ip_address'")===TRUE)
		{
			$error_msg="Record added successfully";
		}
		else
		{
			$error_msg="Sorry record could not be added";
		}
	}
	$result=$conn->query("select * from job_education_profile where registration_id='$registration_id'");
	while($row=$result->fetch_assoc()){
	$html.='<tr>
	  <td data-title="Education">'.getEducation($conn,$row['education']).'</td>
	  <td data-title="Institutions">'.getCollege($conn,$row['college']).'</td>
	  <td data-title="Year">'.$row['year_of_completion'].'</td>
	  <td data-title="%">'.$row['percentage'].'%</td>
	  <td data-title="Major">'.$row['specialization'].'</td>
	  <td data-title="Remove"><a href="#"><img src="images/remove_iocn.png" class="deleteEdu '.$row['id'].'" /></a></td>
	</tr>';
	}
	echo json_encode(array('html'=>$html,'error_msg'=>$error_msg));
}

if($_REQUEST['action']=="addEmployment")
{
	$html="";
	$error_msg="";
	$registration_id=$_SESSION['registration_id'];
	$employer_name=$_REQUEST['employer_name'];
	$start_month=$_REQUEST['start_month'];
	$start_year=$_REQUEST['start_year'];
	$last_designation=$_REQUEST['last_designation'];
	
	$post_date=date('Y-m-d h:i:s');
	$ip_address=$_SERVER['REMOTE_ADDR']?:($_SERVER['HTTP_X_FORWARDED_FOR']?:$_SERVER['HTTP_CLIENT_IP']);
	$id=$_REQUEST['id'];
	if($_REQUEST['opration']=="delete")
	{
		if($conn->query("delete from job_employment_profile where id='$id'") == TRUE)
		{
			$error_msg="Record deleted successfully";
		}
		else
		{
			$error_msg="Sorry record could not be deleted";
		}
	}
	else
	{
		if($conn->query("insert into job_employment_profile set registration_id='$registration_id',employer_name='$employer_name',start_month='$start_month',start_year='$start_year',last_designation='$last_designation',post_date='$post_date',ip_address='$ip_address'")===TRUE)
		{
			$error_msg="Record added successfully";
		}
		else
		{
			$error_msg="Sorry record could not be added";
		}
	}
	$result=$conn->query("select * from job_employment_profile where registration_id='$registration_id'");
	while($row=$result->fetch_assoc()){
	$html.='<tr>
	  <td data-title="Employer Name">'.$row['employer_name'].'</td>
	  <td data-title="start month">'.$row['start_month'].'</td>
	  <td data-title="start year">'.$row['start_year'].'</td>
	  <td data-title="last designation">'.$row['last_designation'].'</td>
	  <td data-title="Remove"><a href="#"><img src="images/remove_iocn.png" class="deleteEdu '.$row['id'].'" /></a></td>
	</tr>';
	}
	echo json_encode(array('html'=>$html,'error_msg'=>$error_msg));
}
?>