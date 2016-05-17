<?php 
session_start();
ob_start();
include('db.inc.php');
include('functions.php');
$uid=$_REQUEST['uid'];
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
  <div class="pop_head">Give Feedback</div>
  <ul class="recruiterError"></ul>
    <form action="" name="" id="recruiterForm"  method="post" autocomplete="off">
    <input type="hidden" name="action" value="sendoffer"/> 
    <input type="hidden" name="candidate_id" value="<?php echo $uid;?>"/>      
    <div class="add_training">
        <ul class="login" style="display:none;"></ul>
        <div class="form_details fade_anim">
		<div class="textfield">
         Offered <input type="checkbox" name="offered" value="Y"/> 
        </div>
        <div class="textfield">
        <textarea name="comment" id="comment" placeholder="Feedback" ></textarea>
        </div>
        <div class="textfield fade">
        <input type="submit" name="seveRecruiter" id="seveRecruiter" value="Save"/>
        </div>           
        <div class="clear"></div>  
        </div>
		</div>   
    </form>
</div>
</body>
</html>
