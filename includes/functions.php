<?php

class Users {
	public $tableName = 'job_registration';
	
	function __construct(){
		//database configuration
	/*	$dbServer = 'localhost'; //Define database server host
		$dbUsername = 'root'; //Define database username
		$dbPassword = ''; //Define database password
		$dbName = 'jobready'; //Define database name
		*/
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
	
	function checkUser($oauth_provider,$oauth_uid,$fname,$lname,$email,$gender,$locale,$link,$picture){
		$prevQuery = mysqli_query($this->connect,"SELECT * FROM $this->tableName WHERE oauth_uid = '".$oauth_uid."'") or die(mysqli_error($this->connect));
		if(mysqli_num_rows($prevQuery) > 0){
			$update = mysqli_query($this->connect,"UPDATE $this->tableName SET modified_date = '".date("Y-m-d H:i:s")."',ip_address = '".$_SERVER['REMOTE_ADDR']."' WHERE oauth_uid = '".$oauth_uid."'") or die(mysqli_error($this->connect)); 
		}else{
			$insert = mysqli_query($this->connect,"INSERT INTO $this->tableName SET oauth_uid = '".$oauth_uid."', email = '".$email."',gpluslink = '".$link."', post_date = '".date("Y-m-d H:i:s")."', modified_date = '".date("Y-m-d H:i:s")."',ip_address = '".$_SERVER['REMOTE_ADDR']."'") or die(mysqli_error($this->connect));
		}
		
		$query = mysqli_query($this->connect,"SELECT * FROM $this->tableName WHERE oauth_uid = '".$oauth_uid."'") or die(mysqli_error($this->connect));
		$result = mysqli_fetch_array($query);
		return $result['id'];
	}
}
?>