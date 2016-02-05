<?phpfunction actor_type($conn,$registration_id){	$sql = "SELECT  type_of_actor FROM  job_registration  where id='$registration_id'";	
	$result = $conn->query($sql);
	$row=$result->fetch_assoc();
	return $row['type_of_actor'];					
}
function uploadFile($file_name,$file_temp,$file_type,$file_size,$loc){
	$upload_file = '';
	$target_folder = "upload/$loc/".$_SESSION['registration_id']."/";
	$target_path = "";
	$ext = pathinfo($file_name, PATHINFO_EXTENSION);
	if($file_name != '')
	{
		if ((($ext == "doc") || ($ext == "docx") || ($ext == "pdf") || ($ext == "txt") || ($ext == "rtx")) && $file_size < 2097152 )
		{
			$target_path = $target_folder.$file_name;
			if(@move_uploaded_file($file_temp, $target_path))
				return $upload_file = $file_name;
			else
				return $error_msg.="<li>Sorry error while uploading</li>";
		}
		else
			return $error_msg.="<li>Invalid file</li>";
	}
}
function check_string($data){
	if($data!='')
	{
	  $exp="/[^a-zA-Z0-9\-\/\.&,\(\)\: ]/";
	  $return_data=preg_match($exp,$data);
	  return $return_data;
	}
	else{return 1;}
}
function check_email($email)
{
	$e_exp="/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/i";
	$u_email=preg_match($e_exp,$email);	
	return $u_email;
}
function check_mobno($data)
{	
	if($data=="")
		return 1;
	else
	{
		$ans=preg_match('/[^0-9]/',$data);
		if($ans==0)
		{
			$data_len = strlen($data);
			if($data_len==10)
			{
				$data = trim($data);
				$block = '0000000000' ;
				if (strpos($data,'0000000000') !== false) 
				{
					return 1 ;
				}
				else { return 0 ;}
			}
			else
			{
				return 1;
			}
		}else{
			return 1;
		}	
	}		
}
function getEducation($conn,$id){
	$sql = "SELECT  education FROM  master_education  where id='$id'";	
	$result = $conn->query($sql);
	$row=$result->fetch_assoc();
	return $row['education'];					
}
function getCollege($conn,$id){	$sql = "SELECT  institution FROM  master_institution  where id='$id'";		$result = $conn->query($sql);	$row=$result->fetch_assoc();	return $row['institution'];					}
function getInterest($conn,$id){	$sql = "SELECT  area_of_interest FROM  master_interest_area  where id='$id'";		$result = $conn->query($sql);	$row=$result->fetch_assoc();	return $row['area_of_interest'];					}
function getUserName($conn,$registration_id){	$sql = "SELECT  fname FROM  job_profile  where registration_id='$registration_id'";		$result = $conn->query($sql);	$row=$result->fetch_assoc();	return $row['fname'];					}
function getCompanyProfile($conn,$registration_id){	$sql = "SELECT  company_profile FROM  job_profile  where registration_id='$registration_id'";		$result = $conn->query($sql);	$row=$result->fetch_assoc();	return $row['company_profile'];					}
function getAdminName($conn,$admin_id){	$sql = "SELECT  contact_name FROM  admin_master  where id='$admin_id'";		$result = $conn->query($sql);	$row=$result->fetch_assoc();	return $row['contact_name'];					}function getAdminEmail($conn,$admin_id){	$sql = "SELECT  email_id FROM  admin_master  where id='$admin_id'";		$result = $conn->query($sql);	$row=$result->fetch_assoc();	return $row['email_id'];					}
function getDesignation($conn,$registration_id){/*	$sql = "SELECT  designation FROM  job_profile  where id='$registration_id'";	*/	$sql = "SELECT  designation FROM  job_profile  where registration_id='$registration_id'";		$result = $conn->query($sql);	$row=$result->fetch_assoc();	return $row['designation'];					}
function getUserMobile($conn,$registration_id){	$sql = "SELECT  mobile_no FROM  job_registration  where id='$registration_id'";		$result = $conn->query($sql);	$row=$result->fetch_assoc();	return $row['mobile_no'];					}
function getUserEmail($conn,$registration_id){	$sql = "SELECT  email FROM  job_registration where id='$registration_id'";		$result = $conn->query($sql);	$row=$result->fetch_assoc();	return $row['email'];					}
function getCityName($conn,$city){	$sql = "SELECT  city FROM  master_city  where id='$city'";		$result = $conn->query($sql);	$row=$result->fetch_assoc();	return $row['city'];					}
function getUserInterest($conn,$registration_id){	$sql = "SELECT area_of_interest FROM  job_area_of_interest  where registration_id='$registration_id'";		$result = $conn->query($sql);	$num=$result->num_rows;	$i=1;	while($row=$result->fetch_assoc())	{		if($i<$num)			$intrest.=$row['area_of_interest'].",";		else			$intrest.=$row['area_of_interest'];
		$i++;
	}
	return $intrest;					
}
function getTrainerDetails($conn,$training_id,$field)
{
$sql = "SELECT  registration_id,area_of_interest,description,doc FROM  job_training_list  where id='$training_id'";		$result = $conn->query($sql);	$row=$result->fetch_assoc();	if($field=='registration_id')		return $row['registration_id'];	else if($field=='area_of_interest')		return $row['area_of_interest'];	else if($field=='description')		return $row['description'];	else if($field=='doc')		return $row['doc'];			}
function getTrainerAcceptance($conn,$training_id,$registration_id){	$sql = "SELECT  trainer_acceptance FROM  job_student_training_interest  where training_id='$training_id' and registration_id='$registration_id'";		$result = $conn->query($sql);	$row=$result->fetch_assoc();	return $row['trainer_acceptance'];					}
function getJobDetails($conn,$job_id,$field){	$sql = "SELECT  registration_id,job_code,designation,job_desc,job_location,designation FROM  master_job  where id='$job_id'";		$result = $conn->query($sql);	$row=$result->fetch_assoc();	if($field=='registration_id')		return $row['registration_id'];	else if($field=='job_code')		return $row['job_code'];	else if($field=='job_desc')		return $row['job_desc'];	else if($field=='job_location')		return $row['job_location'];	else if($field=='designation')		return $row['designation'];	}
function getJobAcceptance($conn,$job_id,$registration_id){	$sql = "SELECT  employer_acceptance FROM  job_student_job_interest  where job_id='$job_id' and registration_id='$registration_id'";		$result = $conn->query($sql);	$row=$result->fetch_assoc();	return $row['employer_acceptance'];					}
function getSubject($conn,$registration_id){	$sql = "SELECT area_of_interest FROM `master_interest_area` where id='$registration_id'";		$result = $conn->query($sql);	$row=$result->fetch_assoc();	return $row['area_of_interest'];					}
function getResult($conn, $results = array()){	if(sizeof($results)){		$all = array();		$rsArr = array();		foreach($results as $key => $value){			$sql = "select * from master_general_question where id = $key";			$result = $conn->query($sql);			$resultdata = $result->fetch_assoc();			$subId = $resultdata['sub_id'];						if(!array_key_exists($resultdata['sub_id'], $all)){				$all[$subId] = array('sub_id'=>$subId,'correctAns'=>0,'wrongAns'=>0, 'unanswered'=>0, 'total_question'=>0,'total_marks_obtain'=>0);			}		
			$all[$subId]['total_question']++;
			$all[$subId]['total_marks'] = $all[$subId]['total_marks'] + $resultdata['marks'];			
			if($value == $resultdata['true_ans']){
				$all[$subId]['correctAns']++;
				$all[$subId]['total_marks_obtain'] = $all[$subId]['total_marks_obtain'] + $resultdata['marks'];
			}
			elseif(!in_array($value, array(1,2,3,4)))
				$all[$subId]['unanswered']++;
			else
				$all[$subId]['wrongAns']++;
		}
		return $all;
	}
	else 
		return FALSE;
}
function getAttemptID($conn,$registration_id){$sql = "SELECT attempt_id FROM `scores` where registration_id='$registration_id' order by attempt_id desc limit 1";		$result = $conn->query($sql);	$row=$result->fetch_assoc();	if($row['attempt_id']=='')		return 1;	else 		return $row['attempt_id']+1;}/*
function getSubjectName($conn,$subject_id)
{	$sql = "SELECT area_of_interest FROM `master_interest_area` where id='$subject_id'";		$result = $conn->query($sql);	$row=$result->fetch_assoc();	return $row['area_of_interest'];
} */ function getSubjectName($conn,$subject_id){	$sql = "SELECT subject FROM `master_subject_list` where id='$subject_id'";		$result = $conn->query($sql);	$row=$result->fetch_assoc();	return $row['subject'];}function getReferenceId($conn,$registration_id){	$sql = "SELECT refer_registration_id FROM `job_registration` where id='$registration_id'";		$result = $conn->query($sql);	$row=$result->fetch_assoc();	if($row['refer_registration_id']!=0)	return $row['refer_registration_id'];	else	return $row['id'];}
?>