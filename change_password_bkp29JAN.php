<?php include("header.php");?>
<?php include("menu.php");?>
<?php include('db.inc.php');?>
<?php 
$registration_id=$_SESSION['registration_id'];
/*...........................................................*/

$action=$_REQUEST['action'];
$new_password=$_REQUEST['new_password'];
$con_password=$_REQUEST['con_password'];

$pass=md5($new_password);
if($action=="changepass")
{ //print_r($_POST);  
	if(empty($new_password)){
	$_SESSION['fail_msg']= "Please Enter New Password.";
	} elseif(empty($con_password)){
	$_SESSION['fail_msg']= "Please Enter Confirm Password.";
	} elseif($new_password != $con_password) {
	$_SESSION['fail_msg']= "Passords don't match";
	} else {	
	//echo "update job_registration set password='$new_password' where id='$registration_id'"; exit;    
	$sql=$conn->query("UPDATE job_registration SET password='$pass' WHERE id='$registration_id'");
	$_SESSION['succ_msg']="Your Password has been changed";
	if($_SESSION['succ_msg'])
	{
	$new_password='';
	$con_password='';
	}
}
}
?>

<div class="page_title"><span>welcome <?php echo getUserName($conn,$registration_id)?></span></div>
<div class="inner_conainer" >
<?php include("personal_dashboard_link.php");?>

<div class="dashboard_right fade_anim"> 		
<div class="enquiry_wrap_2">
<div class="content_head">Change your Password <br/>
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
<div class="textfield">
<input type="hidden" name="action" value="changepass" />
<input type="password" id="new_password" name="new_password" value="<?php echo $new_password; ?>" Placeholder="Enter New Password" />
</div>
<div class="textfield">
<input type="password" id="con_password" name="con_password" value="<?php echo $con_password; ?>" Placeholder="Enter Confirm Password"/>
</div>              
<input type="submit" name="submit" value="Submit" style="float:left;"/>
</form> 
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
  </div>
  <div class="clear"></div>
</div>
<!-- -------------------------------- footer ends ------------------------------ -->
</body>
</html>
