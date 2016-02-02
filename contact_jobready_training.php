<?php 
session_start();
ob_start();
include('db.inc.php');
include('functions.php');
$registration_id=$_SESSION['registration_id'];
$user=getUserName($conn,$registration_id);
$user_mail=getUserEmail($conn,$registration_id);
?>
<?php 
$id=$_REQUEST['id'];
$result=$conn->query("select contact_name,email_id from admin_master where id='$id'");
$row=$result->fetch_assoc();
$admin_name=$row['contact_name'];
$email=$row['email_id'];
//print_r($row);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"> 
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<script src="js/1.8.3_min.js" type="text/javascript"></script>
</head>
<body>
<div class="add_training">
  <div class="pop_head">Contact Jobready For Training</div>
  <ul class="recruiterError"></ul>
  <!-------------------- Send Mail to Admin For Training Start ---->
<?php
$action=$_POST['action'];
if($action=="sendmail")
{
$description=$_POST['description'];
if(empty($description)){
$_SESSION['fail_msg']= "Please Enter Your Comment.";
}else{

/*********************          Email Script Start      ************************/
$to = "$email";
$subject = "Account Credential Details";
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
<strong style="font-size:18px;">Thanks for Contact Jobb Ready</strong>
<p>Company wants Training For Jobready.</p>
<p>Company:'.$user.' </p>
<p>Email: '.$user_mail.'</p>
<p>Comment: '.$description.'</p>
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

$_SESSION['succ_msg']="Thanks For Contacted Jobready For Training";
}}
?>
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
<!--Send Mail to Admin For Training Stop ---->
<form action="" name="sendmail" id="sendmail" method="post">
<input type="hidden" name="action" value="sendmail"/> 
<input type="hidden" name="mail" value="<?php echo $email; ?>"/>       
    <div class="add_training">
        <ul class="login" style="display:none;"></ul>
        <div class="form_details fade_anim">
		<div class="textfield">
         <input type="text" name="user" value="<?php echo $admin_name; ?>" disabled/>
        </div>
		<div class="textfield">
        <input type="text" name="email" value="<?php echo $email; ?>" disabled/>
        </div>
            <div class="textfield">
               <textarea name="description" id="description" placeholder="Message" ></textarea>
            </div>
            <div class="textfield fade">
            <input type="submit" value="Submit" name="submit"/>            
            </div>           
            <div class="clear"></div>  
        </div>
		</div>   
    </form> 
</div>
</body>
</html>
