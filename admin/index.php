<?php
session_start();
error_reporting(E_ALL ^ E_NOTICE);
include('dbcon.php');
$loginnow=$_POST['loginnow'];
if($loginnow=='yes')
{
$username=mysql_real_escape_string($_POST['username']); 
$password=mysql_real_escape_string($_POST['password']); 
$username=str_replace(" ","",$username);
$password=str_replace(" ","",$password);
$query="SELECT * FROM admin_master WHERE (contact_name='$username' OR email_id='$username') AND password='$password' AND status='1'";
$result = mysql_query($query)or die(mysql_error());
$num_row = mysql_num_rows($result);
$row=mysql_fetch_array($result);
$uid=$row['id'];
$user=$row['contact_name'];
if( $num_row ==1 ) {
$_SESSION['id']=$uid;
$_SESSION['contact_name']= $user;
header('location:users.php');
exit;
}
else{ ?>
<div class="alert alert-danger">Access Denied</div>		
<?php
}}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="">
<meta name="author" content="">
<link rel="icon" href="images/fav_icon.png">
<title>Job Ready Admin Login</title>
<!-- Bootstrap core CSS -->
<link href="css/bootstrap.min.css" rel="stylesheet">
<!-- Custom styles for this template -->
<link href="css/login.css" rel="stylesheet">
</head>
<body>
<div class="container">
<form class="form-signin" method="POST" action="<?php echo $_SERVER['PHP_SELF'];?>">
<h2 class="form-signin-heading">Please Login</h2>
<input type="hidden" name="loginnow" value="yes">
<label for="inputEmail" class="sr-only">Email address</label>
<input type="text" name="username" id="username" class="form-control" placeholder="Username" required>
<label for="inputPassword" class="sr-only">Password</label>    
<input type="password" name="password" id="password" class="form-control" placeholder="Password" required>  
<button name="submit" type="submit" class="btn btn-lg btn-primary btn-block">Login</button>
</form>
</div>
</body>
</html>