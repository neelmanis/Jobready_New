<?php
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
function check_string($data)
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
function getEducation($conn,$id)
	$sql = "SELECT  education FROM  master_education  where id='$id'";	
	$result = $conn->query($sql);
	$row=$result->fetch_assoc();
	return $row['education'];					
}
function getCollege($conn,$id)
function getInterest($conn,$id)
function getUserName($conn,$registration_id)
function getCompanyProfile($conn,$registration_id)
function getAdminName($conn,$admin_id)
function getDesignation($conn,$registration_id)
function getUserMobile($conn,$registration_id)
function getUserEmail($conn,$registration_id)
function getCityName($conn,$city)
function getUserInterest($conn,$registration_id)
		$i++;
	}
	return $intrest;					
}
function getTrainerDetails($conn,$training_id,$field)
{
$sql = "SELECT  registration_id,area_of_interest,description,doc FROM  job_training_list  where id='$training_id'";	
function getTrainerAcceptance($conn,$training_id,$registration_id)
function getJobDetails($conn,$job_id,$field)
function getJobAcceptance($conn,$job_id,$registration_id)
function getSubject($conn,$registration_id)
function getResult($conn, $results = array()){
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
function getAttemptID($conn,$registration_id)
function getSubjectName($conn,$subject_id)
{
} */
?>