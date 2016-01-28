<?php
//http://www.krizna.com/general/login-with-facebook-using-php/
class Users {
	public $tableName = 'job_registration';
	
	function __construct(){
		//database configuration
		$dbServer = 'localhost'; //Define database server host
		$dbUsername = 'kwebcpan_jobread'; //Define database username
		$dbPassword = 'mukeshgiit@86'; //Define database password
		$dbName = 'kwebcpan_jobreadydemodb'; //Define database name
		
		//connect databse
		$con = mysqli_connect($dbServer,$dbUsername,$dbPassword,$dbName);
		if(mysqli_connect_errno()){
			die("Failed to connect with MySQL: ".mysqli_connect_error());
		}else{
			$this->connect = $con;
		}
	}
	
    function checkuser($fuid,$femail,$fname){	
	$current_date = date('Y-m-d H:i:s');
	
		$query = mysqli_query($this->connect,"SELECT * FROM job_registration WHERE email='".$femail."' and Fuid = '".$fuid."'") or die(mysqli_error($this->connect));
		$result = mysqli_fetch_assoc($query);
		if(mysqli_num_rows($query) > 0){
		//echo "UPDATE job_registration SET modified_date = '".$current_date."',email = '".$femail."',ip_address = '".$_SERVER['REMOTE_ADDR']."' WHERE Fuid = '".$fuid."'"; exit;
	    $update =  mysqli_query($this->connect,"UPDATE job_registration SET modified_date = '".$current_date."',email = '".$femail."',ip_address = '".$_SERVER['REMOTE_ADDR']."' WHERE Fuid = '".$fuid."'") or die(mysqli_error($this->connect));
		return $_SESSION['registration_id']=$result['id'];
		}else{
		//	echo "INSERT INTO job_registration SET  Fuid = '".$fuid."',email = '".$femail."', post_date = '".date("Y-m-d H:i:s")."',ip_address = '".$_SERVER['REMOTE_ADDR']."'"; exit;
		$insert = mysqli_query($this->connect,"INSERT INTO job_registration SET  Fuid = '".$fuid."',email = '".$femail."', post_date = '".date("Y-m-d H:i:s")."',ip_address = '".$_SERVER['REMOTE_ADDR']."'") or die(mysqli_error($this->connect));
		$_SESSION['registration_id']=mysqli_insert_id($this->connect);
		return $_SESSION['registration_id'];
	}
}
}
?>
