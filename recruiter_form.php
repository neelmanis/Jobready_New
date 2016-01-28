<?php 
session_start();
ob_start();
include('db.inc.php');
include('functions.php');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"> 
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<script src="js/1.8.3_min.js" type="text/javascript"></script>
<script type="text/javascript">
$(document).ready(function(){
	$("#seveRecruiter").on('click',function(e){
	    e.preventDefault();
		formData=$('#recruiterForm').serialize();
		var errors = jQuery('.recruiterError');
		$.ajax({
			type:"POST",
			url:"employer_job_inc.php",
			data:formData,
			dataType:"JSON",
			success:function(data)
			{
				//alert(data);
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
  <div class="pop_head">add recruiter</div>
  <ul class="recruiterError"></ul>
  <form action="" name="" id="recruiterForm"  method="post" autocomplete="off">
  <div class="form_details fade_anim">
  <?php 
	/*..............................Recruiter List....................................*/
	$registration_id=$_REQUEST['registration_id'];
	$result=$conn->query("select * from job_registration where id='$registration_id'");
	$row=$result->fetch_assoc();
   ?>
  <div class="textfield">
  	  <input type="hidden" name="action" id="" value="addRecruiter"/>
      <input type="text" name="name" onfocus="if(this.value=='Name')value='';" onblur="if(this.value=='')value='Name';" value="<?php echo ($registration_id ? getUserName($conn,$row['id']) : 'Name');?>" />
    </div>
    <div class="textfield">
      <input type="text" name="designation" onfocus="if(this.value=='Designation')value='';" onblur="if(this.value=='')value='Designation';" value="<?php echo ($registration_id ? getDesignation($conn,$row['id']) : 'Designation');?>" />
    </div>
    <div class="textfield">
      <input type="text" name="email" onfocus="if(this.value=='Email')value='';" onblur="if(this.value=='')value='Email';" value="<?php echo ($registration_id ? $row['email'] : 'Email');?>" />
    </div>
    <div class="textfield">
      <input type="text" name="mobile" onfocus="if(this.value=='Mobile')value='';" onblur="if(this.value=='')value='Mobile';" value="<?php echo ($registration_id ? $row['mobile_no'] : 'Mobile');?>" />
    </div>
    <div class="textfield">
      <input type="password" name="password" onfocus="if(this.value=='Password')value='';" onblur="if(this.value=='')value='Password';" value="Password" />
    </div>
    <div class="textfield fade">
      <?php if($registration_id!=''){?>
      	<input type="hidden" name="update" value="update"/>
        <input type="hidden" name="recruiter_id" value="<?php echo $registration_id;?>"/>
      <?php }?>
      <input type="submit" name="seveRecruiter" id="seveRecruiter" value="Save"/>
    </div>
  
    <div class="clear"></div>
  </div>
  </form>
</div>
</body>
</html>
