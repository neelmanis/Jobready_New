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
$result=$conn->query("select company_name from job_profile where registration_id='$registration_id'");
$row=$result->fetch_assoc();
$company_name=$row['company_name'];

$result=$conn->query("select contact_name,email_id from admin_master where id='$id'");
$row=$result->fetch_assoc();
$admin_name=$row['contact_name'];
$email=$row['email_id'];
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"> 
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<script src="js/1.8.3_min.js" type="text/javascript"></script>
<script type="text/javascript">
$(document).ready(function(){
	$("#savecontact").on('click',function(e){
	    e.preventDefault();
		formData=$('#sendmail').serialize();
		var errors = jQuery('.recruiterError');
		$.ajax({
			type:"POST",
			url:"employer_job_inc.php",
			data:formData,
			dataType:"JSON",
			success:function(data)
			{
			//	alert(data);
				 console.log(data);
				 if($.trim(data.error_msg)!="")	
					errors.html(data.error_msg);	
				else
					window.location.href=data.url;  
			}
		});
	});
});
</script>
</head>
<body>
<div class="add_training">
<div class="pop_head">Contact Jobready For Training</div>
<ul class="recruiterError"></ul>
<form action="" name="sendmail" id="sendmail" method="post">
<input type="hidden" name="action" value="sendcontact"/> 
<input type="hidden" name="admin_mail" value="<?php echo $email; ?>"/> 
<input type="hidden" name="co_u_name" value="<?php echo $user; ?>"/>
<input type="hidden" name="company_name" value="<?php echo $company_name; ?>"/>
<input type="hidden" name="user_mail" value="<?php echo $user_mail; ?>"/>       
    <div class="add_training">
        <ul class="login" style="display:none;"></ul>
        <div class="form_details fade_anim">
		<div class="textfield">
         <input type="text" name="" value="<?php echo $admin_name; ?>" disabled/>
        </div>
		<div class="textfield">
        <input type="text" name="" value="<?php echo $email; ?>" disabled/>
        </div>
        <div class="textfield">
            <textarea name="description" id="description" placeholder="Message" ></textarea>
        </div>
        <div class="textfield fade">
            <input type="submit" value="Submit" name="savecontact" id="savecontact"/>            
        </div>           
        <div class="clear"></div>  
        </div>
	</div>   
    </form> 
</div>
</body>
</html>
