<?php
class Users {
	public $tableName = 'job_registration';
	
	function __construct(){
		//database configuration
		$dbServer = 'localhost'; //Define database server host
		$dbUsername = 'root'; //Define database username
		$dbPassword = ''; //Define database password
		$dbName = 'jobready'; //Define database name
		
		//connect databse
		$con = mysqli_connect($dbServer,$dbUsername,$dbPassword,$dbName);
		if(mysqli_connect_errno()){
			die("Failed to connect with MySQL: ".mysqli_connect_error());
		}else{
			$this->connect = $con;
		}
	}
	
	function checkUser($oauth_uid,$fname,$email,$link){
		$prevQuery = mysqli_query($this->connect,"SELECT * FROM job_registration WHERE oauth_uid = '".$oauth_uid."'") or die(mysqli_error($this->connect));
		if(mysqli_num_rows($prevQuery) > 0){
			$update = mysqli_query($this->connect,"UPDATE job_registration SET modified_date = '".date("Y-m-d H:i:s")."',ip_address = '".$_SERVER['REMOTE_ADDR']."' WHERE oauth_uid = '".$oauth_uid."'") 
			or die(mysqli_error($this->connect));
			$_SESSION['registration_id']=mysqli_insert_id($this->connect);
			
		}else{
			$insert = mysqli_query($this->connect,"INSERT INTO job_registration SET  oauth_uid = '".$oauth_uid."', fname = '".$fname."', email = '".$email."', gpluslink = '".$link."', post_date = '".date("Y-m-d H:i:s")."', modified_date = '".date("Y-m-d H:i:s")."',ip_address = '".$_SERVER['REMOTE_ADDR']."'") or die(mysqli_error($this->connect));
			$_SESSION['registration_id']=mysqli_insert_id($this->connect);
		}
		
		$query = mysqli_query($this->connect,"SELECT * FROM job_registration WHERE oauth_uid = '".$oauth_uid."'") or die(mysqli_error($this->connect));
		$result = mysqli_fetch_array($query);
		return $result;
	}
}
?>