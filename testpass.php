<?php include("header.php");?>
<?php include("menu.php");?>
<?php
include('db.inc.php');
?>
<?php 
$senddetails=$_POST['senddetails'];
$email = $_POST['email'];

if($senddetails=='send')
{ 
	$result=$conn->query("SELECT email FROM job_registration WHERE email = '$email'");
	$check2=$result->num_rows;
	if($check2==0){ echo 'Sorry, we cannot find your account details please try another email address.';}
	else {
	$query=$conn->query("SELECT email FROM job_registration WHERE email = '$email'");
	$r=	$query->fetch_assoc();
	
	$password = substr( rand(), 0, 7);
	echo "==>".$pass = $password;

//send email
$to = "$email";
$subject = "Account Password Details Recovery";
$body = "Here is your account information please keep this as you may need this at a later stage. Your password has been reset your password is :<strong> $pass</strong> Please login and change your password. Regards Site Admin";
$additionalheaders = "From: <user@jobbready.com>";
$additionalheaders .= "Reply-To: noreply@jobbready.com";
mail($to, $subject, $body, $additionalheaders);

$pass1 = md5($pass); //encrypted version for database entry
echo "--->".$pass1;
//update database
$sql=$conn->query("UPDATE job_registration SET password='$pass1' WHERE email = '$email'");
$rsent = true;
	}
	if ($rsent == true){
    echo "<p>We sent an email with your account details to $email</p>";
    } else {
    echo "<p>Please enter your e-mail address. You will receive a new password via e-mail.</p>";
    }
	
//}
}
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
<title>Welcome to Jobb Ready</title>
<link rel="shortcut icon" href="images/fav_icon.png" type="image/x-icon">
</head>

<body>
<!-- -------------------------------- container starts ------------------------------ -->
<div class="page_title"><span>forgot password</span></div>
<div class="inner_conainer fade_anim"> 
		
	<div class="contact_right">
    	<div class="content_head">Fill your Email ID below</div>
		<form method="POST" action="">
        	<div class="enquiry_wrap">
			<div class="textfield">
                    <input type="text" Placeholder="Email" name="email"/>
					<input type="hidden" name="senddetails" id="senddetails" value="send" />
            </div>
                
                   <div class="clear"></div>
				   <input type="submit" name="send" value="Send" style="float:left;"/>               
            </div>        
            <div class="clear"></div>
    </div>     
     <div class="clear"></div>    
</div>
<!-- -------------------------------- container ends ------------------------------ -->
 <div class="ad_banner"><a href="#"><img src="images/ad_banner.jpg" alt="" /></a></div>
<!-- -------------------------------- footer starts ------------------------------ -->
<div class="footer_wrap">
	<div class="footer">
    	<div class="copyright">© 2015 JobbReady.com</div>
        <div class="kweb"><a href="http://kwebmaker.com/" target="_blank">K Webmaker™</a></div>
    </div><div class="clear"></div>
</div>
</body>
</html>
