<?php include("header.php");?>
<?php include("menu.php");?>
<?php 
$action=$_REQUEST['action'];
if($action=="send")
{   
	$email_id=$_REQUEST['email_id'];
    $query=mysql_query("select * from registration_master where email_id='$email_id' and status=1");
	$result=mysql_fetch_array($query);
	$email_id=$result['email_id'];
	$password=$result['password'];
	$first_name=$result['first_name'];
	$last_name=$result['last_name'];
	
	$num=mysql_num_rows($query);
	if($num>0){
	/*.......................................Send mail to users mail id...............................................*/
    $message ='<table width="100%" border="0" cellspacing="0" cellpadding="0" style="font-family:"Lucida Sans"; font-size:14px; color:#333333; text-align:justify; ">
  <tr>
    <td colspan="2"> 
      <table width="100%" border="0" cellspacing="0" cellpadding="0">
        <tr>
         <td width="150" align="left"><img src="http://www.gjepc.org/images/logo_gjepc.png" width="150" height="91" /></td>
          <td width="85%" align="right"><img src="http://www.gjepc.org/images/logo_in.png" width="105" height="91" /></td>
        </tr>
      </table>
	 </td>
  </tr>
  
  <tr>
    <td height="10" colspan="2" align="left" style="font-family:"Lucida Sans"; font-size:14px; color:#990000; border-bottom: solid thin #666666;">&nbsp;</td>
  </tr>
  
  <tr>
    <td height="30" colspan="2" align="left" style="font-family:"Lucida Sans"; font-size:14px; font-weight:bold; color:#990000;">Dear '. $first_name.' '.$last_name.',</td>
  </tr>
  
	<tr>
		<td>&nbsp; </td>
	</tr>
	
  <tr>
  <td align="left"  style="text-align:justify;">You may now log in to http://www.gjepc.org/login.php using the following<br/>  </td>
  </tr>
  
  <tr>
    <td align="left"  style="text-align:justify;"><strong>User Name :</strong> '. $email_id .' </td>
  </tr>
  
  <tr>
    <td align="left"  style="text-align:justify;"><strong>Password :</strong> '. $password .'</td>
  </tr>
  
  <tr>
    <td>&nbsp; </td>
  </tr>
  
  <tr>
    <td>&nbsp; </td>
  </tr>
  
  <tr>
    <td height="22" align="left"  style="font-family:"Lucida Sans"; font-size:14px; font-weight:bold; color:#990000;">Kind Regards,</td>
  </tr>
  <tr>
    <td align="left"><strong>GJEPC Web Team,</strong></td>
  </tr>
 </table>';
	
	 $to =$email_id;
	 $subject = "Forgot Password Of GJEPC Member"; 
	 $headers  = 'MIME-Version: 1.0'."\n\r"; 
	 $headers .= 'Content-type: text/html; charset=iso-8859-1'."\n\r"; 
	 $headers .= 'From: admin@gjepc.org';			
     @mail($to, $subject, $message, $headers);
		 
	 $_SESSION['succ_msg']="Your password has been sent to your email id";
	 }
	 else
	 {
	   $_SESSION['succ_msg1']="You have entered wrong email id";
	 }
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>About GJEPC | Forgot Password</title>

<!-- Main css -->
<?php include ('maincss.php') ?>
<!-- Main css -->
<script src="jsvalidation/jquery.js" type="text/javascript"></script>
<script src="jsvalidation/jquery.validate.js" type="text/javascript"></script> 
<link rel="stylesheet" type="text/css" media="screen" href="css/cmxform.css" /> 
<script type="text/javascript">
$().ready(function() {
	// validate the comment form when it is submitted
	$("#commentForm").validate();
	// validate signup form on keyup and submit
	$("#form1").validate({
			//var member_id=$("#member_type_id").val();
		rules: {  
			email_id: {
				required: true,
				email:true
			}
		},
		messages: {
			email_id: {
				required: "Please enter a valid email id",
			}
	 }
	});
});
</script>
</head>

<body>
<!-- main -->
<div class="main">

<!-- Top -->
<?php include ('top.php') ?>
<!-- Top -->


<div class="inner_mainwidth">


<div class="online_business_banner">
<!-- Bread come-->
<div class="top_breadcome">
<div class="breadcome_text">
<div class="bread_text"><a href="index.php">Home </a></div>
<div class="bread_img"><img src="images/breadcome_arrow.png" /></div>
<div class="bread_text">Forgot Password</div>

</div>
</div>
<!-- Bread come-->

<!-- Midle Bg -->
<div class="inner_midle_bg">
<div class="text_heading">Forgot Password</div>
<?php 
if($_SESSION['succ_msg']!=""){
echo "<span class='notification n-success'>".$_SESSION['succ_msg']."</span>";
$_SESSION['succ_msg']="";
}
if($_SESSION['succ_msg1']!=""){
echo "<span class='notification n-attention'>".$_SESSION['succ_msg1']."</span>";
$_SESSION['succ_msg1']="";
}
?>
<div class="clear"></div>
<!-- Midle -->
<form class="cmxform" method="post" name="from1" id="form1">
<div class="midleleft_online">
<div class="contact_wrp"> 
<div class="contact_text">Email <span>*</span> </div>
<div class="contact_form_bg">
<input type="text" class="login_text_bgtext" value="" id="email_id" name="email_id" />
</div>
</div>
<div class="clear"></div>
<div class="contact_text"></div>
<div class="logintext_bt">
<input type="hidden" name="action" value="send" />
<input type="image" src="images/submit_button.jpg" alt="Search" width="209" height="30" />
</div>
<div class="clear"> </div>
</div>
</form>
<!-- Midle -->

<div class="midleleft_online_login">

<div class="forgot">
If you do not receive your new password within a few minutes 
please contact us at:
</div>

<div class="login_password">The Gem & Jewellery Export Promotion Council (Web Team)</div><br />
<div class="login_access"><strong>Email- membership@gjepcindia.com </strong><br />


<div class="clear"></div>
</div>

<div class="clear"></div>

</div>
<!-- Midle Bg -->
<div class="innerbg_bottom"></div>
<div class="clear"></div>
</div>

<div class="clear"></div>




<!-- Fotter -->
<?php include ('fotter.php') ?>
<!-- Fotter -->
<div class="clear"></div>

</div>
</div>
<!-- main -->
</body>
</html>
