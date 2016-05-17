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
  <div class="pop_head">manage recruiters (assign job to others)</div>
  <ul class="recruiterError"></ul>
    <?php $registration_id=$_SESSION['registration_id']; ?>
  <form action="" name="" id="recruiterForm"  method="post" autocomplete="off">
  <div class="form_details fade_anim"> 
	<div class="textfield">
  	  <input type="hidden" name="action" id="" value="sendjobdetails"/>
      Transfer job By <select name="job_by" id="job_by">
            <option value="">--- Transfer job From ---</option>
            <?php 
            $city_result=$conn->query("select id,registration_id ,job_code ,designation from master_job where registration_id IN (SELECT a.id FROM job_registration a WHERE refer_registration_id ='$registration_id')");
            while($city_row=$city_result->fetch_assoc()){
            ?>
              <option value="<?php echo $city_row['id'];?>"  ><?php echo getUserName($conn,$city_row['registration_id'])."  ".getUserEmail($conn,$city_row['registration_id']).")";?></option>
              <?php }?>
        </select>
    </div>
	<div class="textfield"> To &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<select name="job_to" id="job_to">
            <option value="">--- To ---</option>
            <?php 
            $transfer_result=$conn->query("SELECT * FROM  `job_registration` WHERE  `refer_registration_id`='$registration_id'");
            while($transfer_row=$transfer_result->fetch_assoc()){
            ?>
              <option value="<?php echo $transfer_row['id'];?>" ><?php echo getUserName($conn,$transfer_row['id'])." (".getUserEmail($conn,$city_row['registration_id']).")";?></option>
              <?php }?>
        </select>
    </div>
    
<div class="textfield fade">
<input type="submit" name="seveRecruiter" id="seveRecruiter" value="Submit"/>
</div>
<div class="clear"></div>
</div>
</form>
</div>
</body>
</html>