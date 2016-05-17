<?php
include("header.php");
include("menu.php");
?>
<?php
$action=$_REQUEST['action'];
if($action=="senddetails")
{ //print_r($_POST); 
$fname=trim($_POST['fname']);
$lname=trim($_POST['lname']);
$mail=trim($_POST['mail']);
$phone=trim($_POST['phone']);
$address=trim($_POST['address']);
$enquiry=trim($_POST['enquiry']);
$regex = '/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/'; 

if(empty($fname)){
$_SESSION['fail_msg']= "Please Enter First Name.";}
elseif(preg_match('/^[0-9 .\-]+$/i', $fname)) 
{$_SESSION['fail_msg']= "Please Enter Valid First Name";}
elseif(empty($lname)){
$_SESSION['fail_msg']= "Please Enter Last Name.";}
elseif(preg_match('/^[0-9 .\-]+$/i', $lname)) 
{$_SESSION['fail_msg']= "Please Enter Valid Last Name";}
 elseif(empty($mail)){
$_SESSION['fail_msg']= "Please Enter Email.";} 
elseif(!preg_match($regex, $mail)) {
$_SESSION['fail_msg']= "Please Enter Valid Email";} 
elseif(empty($phone)){
$_SESSION['fail_msg']= "Please Enter Mobile No.";} 
elseif(is_numeric($phone) == false){
$_SESSION['fail_msg']= "Please Enter Valid Mobile No"; }
elseif (strlen($phone)>10 || strlen($phone)<10){ 
$_SESSION['fail_msg']="Mobile Number should be 10 digits.";  }
elseif($address==""){
$_SESSION['fail_msg']= "Please Enter Your Address";
}elseif(empty($enquiry)){
$_SESSION['fail_msg']= "Please Enter Your Enquiry";
}else{
$sql=$conn->query("INSERT INTO `contact_feedback`(`id`, `post_date`,`fname`, `lname`, `mail`, `phone`, `address`, `enquiry`) VALUES ('',NOW(),'$fname','$lname','$mail','$phone','$address','$enquiry')");

/*********************          Email Script Start      ************************/

$to = "neelmani@kwebmaker.com";
$subject = "Jobbready Enquiry";
$body = '<table width="100%" height="auto" cellspacing="0" cepadding="0" border="0" align="center" style=" font-family:Arial, Helvetica, sans-serif; font-size:14px; ">    
    <tr>
    <td width="19" ></td>
    <td colspan="2" style="padding:10px; color:#FFFFFF; font-weight:bold;"><img src="http://digitalagencymumbai.com/jobready/images/logo.png" style="width:125px;"/> </td>
    <td width="19" >&nbsp;</td>
    </tr>

    <tr>
    <td >&nbsp;</td>
    <td colspan="2">
    <table width="1000px" border="0" cellspacing="0" cellpadding="0" align="center">  
    <tr>
<td valign="top"  style="padding:10px; line-height:20px; font-family:Arial, Helvetica, sans-serif; font-size:14px;">
<strong style="font-size:18px;">Thanks for being a part of Jobb Ready</strong>
<p><b>Name:</b> '.$fname .' '. $lname.'</p>
<p><b>Email:</b> '.$mail.'</p>
<p><b>Contact No:</b> '.$phone.'</p>
<p><b>Address:</b> '.$address.'</p>
<p><b>Enquiry:</b> '.$enquiry.'</p>
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

$_SESSION['succ_msg']="Thanks For Your Enquiry";	
	if($_SESSION['succ_msg'])
	{
	$fname='';
	$lname='';
	$mail='';
	$phone='';
	$address='';
	$enquiry='';
	}
}
}
?>


<div class="page_title"><span>contact us</span></div>
<div class="inner_conainer fade_anim">
    <div class="contact_left">
    	<ul class="contact">
        	<li><img src="images/icon_map.png" /> For any queries please call us between 9 am to 6 pm (Monday - Friday)</li>
            <li><img src="images/icon_phone.png" /> 09821642627</li>
            <li><img src="images/icon_mail.png" /> <a href="mailto:info@jobbready.com">info@jobbready.com</a></li>
        </ul> 
    </div>

<div class="contact_right">
<div class="content_head">Suggestion or feedback
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
		<input type="hidden" name="action" value="senddetails" />
        	<div class="enquiry_wrap">
                <div class="textfield">
                 <input type="text" id="fname" name="fname" Placeholder="First Name" value="<?php echo $fname;?>"/>
                </div>
                <div class="textfield">
                 <input type="text" id="lname" name="lname" Placeholder="Last Name" value="<?php echo $lname;?>"/>
                </div>               
                <div class="textfield">
                <input type="text" id="mail" name="mail" Placeholder="Email" value="<?php echo $mail;?>"/>
                </div>              

                <div class="textfield"> 
             <input type="text" id="phone" name="phone" Placeholder="Mobile No." value="<?php echo $phone;?>"/>
                </div>
                <div class="clear"></div>
             <!--   <div class="textfield_1">
            <textarea id="address" name="address" placeholder="Address"><?php echo $address;?></textarea>
                </div>-->
                <div class="textfield_1">
                    <textarea id="enquiry" name="enquiry" placeholder="Enquiry"><?php echo $enquiry;?></textarea>
                </div>    
                <input type="submit" name="submit"/>
				</form>
            </div>
            <div class="clear"></div>
    </div>   
     <div class="clear"></div>  
</div>
<!-- -------------------------------- container ends ------------------------------ -->
<?php include("footer.php");?>
</body></html>