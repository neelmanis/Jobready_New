<?php
include("header.php");
$registration_id=$_SESSION['registration_id'];
if(!isset($_SESSION['registration_id']))
		header('location:index.php');
include("menu.php");
?>
<?php 
/*...........................................................*/
$action=$_REQUEST['action'];
$mail=$_REQUEST['mail'];
$mob=$_REQUEST['mob'];
$password=$_REQUEST['password'];

$results=$conn->query("select email,mobile_no from job_registration where id='$registration_id'");
$row=$results->fetch_assoc();
$got_mail=$row['email'];
$got_mob=$row['mobile_no'];

/******* Change Email  ****/
if($action=="changeemail")
{
$result1=$conn->query("select email from job_registration where email='$mail'");
$row1=$result1->fetch_assoc();
$num=$result1->num_rows;
if($num>0)
{ $_SESSION['succ_msg']= 'This EmailID Already Exist';	}
else{
$sql=$conn->query("update job_registration set email='$mail' where id='$registration_id'");
/*********************          Email Script Start      ************************/
$to = "$got_mail";
$subject = "Account Credential Details";
$body = '<table width="100%" height="auto" cellspacing="0" cepadding="0" border="0" align="center" style=" font-family:Arial, Helvetica, sans-serif; font-size:14px; ">    
    <tr>
    <td width="19" ></td>
    <td colspan="2" style="padding:10px; color:#FFFFFF; font-weight:bold;"><img src="http://digitalagencymumbai.com/jobready/images/logo.png" style="width:125px;"/> </td>
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
<p>Here is your account information please keep this as you may need this at a later stage. Your Email has been Changed.</p>
<p>If you did not get your Email, or if you have already managed to retrieve your Email, you can ignore this message and continue using JobbReady with your current Email id.</p>
<p>Your Current Email ID: </p>
<p>Email: '.$mail.'</p>
    </td>
    </tr>    
    </table>
    </td>
    </tr>    
   </table>';
$headers  = 'MIME-Version: 1.0'."\n"; 
$headers .= 'Content-type: text/html; charset=iso-8859-1'."\n";
$headers .= 'From:JobbReady <do-not-reply@jobbready.com>'."\n";
mail($to, $subject, $body, $headers);

$_SESSION['succ_msg']="Your Email has been updated";
header("location:change_password.php"); exit;
}
}

/******* Change Mobile  ****/
if($action=="changemob")
{
$result1=$conn->query("select mobile_no from job_registration where mobile_no='$mob'");
$row1=$result1->fetch_assoc();
$num=$result1->num_rows;
if($num>0)
{ $_SESSION['succ_msg']= 'This Mobile No Already Exist';	}
else{
$sql=$conn->query("update job_registration set mobile_no='$mob' where id='$registration_id'");
/*********************          Email Script Start      ************************/
$to = "$got_mail";
$subject = "Account Credential Details";
$body = '<table width="100%" height="auto" cellspacing="0" cepadding="0" border="0" align="center" style=" font-family:Arial, Helvetica, sans-serif; font-size:14px; ">    
    <tr>
    <td width="19" ></td>
    <td colspan="2" style="padding:10px; color:#FFFFFF; font-weight:bold;"><img src="http://digitalagencymumbai.com/jobready/images/logo.png" style="width:125px;"/> </td>
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
<p>Here is your account information please keep this as you may need this at a later stage. Your Mobile No has been Changed.</p>
<p>If you did not get your Mobile No, or if you have already managed to retrieve your Mobile No, you can ignore this message and continue using JobbReady with your current Mobile No.</p>
<p>Your Current Mobile No: </p>
<p>Mobile No: '.$mob.'</p>
    </td>
    </tr>    
    </table>
    </td>
    </tr>    
   </table>';
$headers  = 'MIME-Version: 1.0'."\n"; 
$headers .= 'Content-type: text/html; charset=iso-8859-1'."\n";
$headers .= 'From:JobbReady <do-not-reply@jobbready.com>'."\n";
mail($to, $subject, $body, $headers);
$_SESSION['succ_msg']="Your Mobile No has been updated";
header("location:change_password.php"); exit;
}
}

/******* Change Password  ****/
if($action=="changepass")
{ 
	if($password==""){
		$_SESSION['fail_msg']="Please enter your password";
	}
	else{

$sql=$conn->query("update job_registration set password=md5('$password') where id='$registration_id'");
/********************* Email Script Start ************************/
$to = "$got_mail";
$subject = "Account Credential Details";
$body = '<table width="100%" height="auto" cellspacing="0" cepadding="0" border="0" align="center" style=" font-family:Arial, Helvetica, sans-serif; font-size:14px; ">    
    <tr>
    <td width="19" ></td>
    <td colspan="2" style="padding:10px; color:#FFFFFF; font-weight:bold;"><img src="http://digitalagencymumbai.com/jobready/images/logo.png" style="width:125px;"/> </td>
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
<p>Your Current Password: </p>
<p>Password: '.$password.'</p>
    </td>
    </tr>    
    </table>
    </td>
    </tr>    
   </table>';
$headers  = 'MIME-Version: 1.0'."\n"; 
$headers .= 'Content-type: text/html; charset=iso-8859-1'."\n";
$headers .= 'From:JobbReady <do-not-reply@jobbready.com>'."\n";
mail($to, $subject, $body, $headers);
$_SESSION['succ_msg']="Your Password has been Changed";
}
}

?>

<div class="page_title"><span>welcome <?php echo getUserName($conn,$registration_id)?></span></div>
<div class="inner_conainer" >
<?php //include("personal_dashboard_link.php");?>
<div class="tab_wrapper_other"> 		
<div class="enquiry_wrap_2">
<div class="content_head">Change your Login Credential <br/>
<?php 
if(isset($_SESSION['succ_msg']) && $_SESSION['succ_msg']!=""){
echo "<span class='notification n-success' style='color: green;'>".$_SESSION['succ_msg']."</span>";
$_SESSION['succ_msg']="";}	else	echo "";
?>
<?php 
if(isset($_SESSION['fail_msg']) && $_SESSION['fail_msg']!=""){
echo "<span class='notification n-attention' style='color: red;'>".$_SESSION['fail_msg']."</span>";
$_SESSION['fail_msg']="";
} else	echo "";
?>
</div>

<form class="cmxform" method="post" name="from1" id="form1">
<div class="pass">
<div class="textfield">
<input type="hidden" name="action" value="changeemail" />
Email<input type="text" id="mail" name="mail" value="<?php echo $got_mail;?>" Placeholder="Change Your Email" />
</div>
</div>
<div class="pass_sub">
<input type="submit" name="submit" value="Update" style="float:right;"/>
</div>
</form>

<form class="cmxform" method="post" name="from1" id="form1">
<div class="pass">
<div class="textfield">
<input type="hidden" name="action" value="changemob" />
Mobile<input type="text" id="mob" name="mob" value="<?php echo $got_mob;?>" Placeholder="Change Your Mobile" />
</div></div>
<div class="pass_sub">
<input type="submit" name="submit" value="Update" style="float:right;"/>
</div>
</form>

<form class="cmxform" method="post" name="from1" id="form1">
<div class="pass">
<div class="textfield">
<input type="hidden" name="action" value="changepass" />
Password<input type="password" id="password" name="password" Placeholder="Change Your Password"/>
</div></div>
<div class="pass_sub">             
<input type="submit" name="submit" value="Update" style="float:right;"/>
</div>
</form> 

</div>     
<div class="clear"></div>    
</div>
<div class="clear"></div>
</div>
<!-- -------------------------------- container ends ------------------------------ -->
<?php include("footer.php");?>
</body>
</html>
