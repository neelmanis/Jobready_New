<?php include("header.php");?>
<?php include("menu.php");?>
<?php include('db.inc.php');?>
<?php 
$senddetails=$_POST['senddetails'];
$email = $_POST['email'];

if($senddetails=='send')
{ 
if(empty($email))
{$signup_error="Please Enter Email";}
else{
$result=$conn->query("SELECT email FROM job_registration WHERE email = '$email'");
$check2=$result->num_rows;	
if($check2==0){ $signup_error= 'Sorry, we cannot find your account details please try another email address.';}
else{
$password = substr( rand(), 0, 7);
//echo "==>".$pass = $password;
$pass = $password;

//send email
$to = "$email";
$subject = "Account Password Details Recovery";
$body = '<table width="100%" height="auto" cellspacing="0" cepadding="0" border="0" align="center" style=" font-family:Arial, Helvetica, sans-serif; font-size:14px; ">    
    <tr>
    <td width="19" ></td>
    <td colspan="2" style="padding:10px; color:#FFFFFF; font-weight:bold;"><img src="images/logo.png" style="width:125px;"/> </td>
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
<strong style="font-size:18px;">Thanks for being a part of Jobb Ready</strong>
<p>Here is your account information please keep this as you may need this at a later stage. Your password has been reset.<br/>Please login and change your password.</p>
<p>If you did not attempt to reset your password, or if you have already managed to retrieve your password, you can ignore this message and continue using JobbReady with your current password.</p>
<p>Your Login Details: </p>
<p>Email: '.$email.'</p>
<p>Password: '.$pass.'</p>
    </td>
    </tr>    
    </table>
    </td>
    </tr>    
   </table>';
//$additionalheaders = "From: <user@jobbready.com>";
//$additionalheaders .= "Reply-To: noreply@jobbready.com";
$headers  = 'MIME-Version: 1.0'."\n"; 
$headers .= 'Content-type: text/html; charset=iso-8859-1'."\n";
$headers .= 'From:JobbReady <do-not-reply@jobbready.com>'."\n";
mail($to, $subject, $body, $headers);

$pass1 = md5($pass); //encrypted version for database entry
//echo "--->".$pass1;
//update database
$sql=$conn->query("UPDATE job_registration SET password='$pass1' WHERE email = '$email'");
$rsent = true;	
}
if ($rsent == true){
$signup_error= 'We sent an email with your account details to <strong>'.$email.'</strong>';
} else {
$signup_error= "Please Enter Valid Email id. You will receive a new password via e-mail.";
}
}
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
<div class="page_title"><span>Forgot your password?</span></div>
<div class="inner_conainer fade_anim"> 
		
	<div class="contact_right">
    	<div class="content_head">Enter your email address below:</div>
		<?php if(isset($signup_error)){ echo '<span style="color: red;" />'.$signup_error.'</span>';} ?>
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