<?php  
session_start();
ob_start();
include('db.inc.php');
include('functions.php');
include('g_login.php');
$registration_id=$_SESSION['registration_id'];
$trainer_registraion_id=$_REQUEST['trainer_registraion_id'];
?>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Feedback Form</title>
<script type="text/javascript">
$(document).ready(function(){
$("form" ).on( "submit", function( event ) {
  event.preventDefault();
  var data = $(this).serialize();
  $.ajax({
		  type:"POST",
		  url:"feedback_inc.php",
		  data: data,
		  dataType:"JSON",
		  success:function(data)
			{
				console.log(data);
				$('#feed_description').val('Enter Your Feedback');
				if($.trim(data.error_msg)!="success")	
					$('.login').show().html(data.error_msg);	
				else
					window.location.href=data.url;
			}
		});
});
});
</script>
</head>

<body>
<form action="" name="addFeedback" id="addFeedback" method="post">
    <div class="add_training">    
        <div class="pop_head">Feedback</div>
        <ul class="login" style="display:none;"></ul>
        <div class="form_details fade_anim">
           
            <div class="textfield">
               <textarea name="feed_description" id="feed_description" placeholder="Enter Your Feedback"></textarea>
            </div>
            
            <div class="textfield fade">
                <input type="submit" value="Submit"/>
                <input type="hidden" name="action" value="addfeedback"/>  
                <input type="hidden" name = "trainer_registraion_id" value='<?php echo $trainer_registraion_id;?>' > 
            </div>
            
            <div class="clear"></div>  
        </div>
    </div>   
 </form> 
</body>
</html>
