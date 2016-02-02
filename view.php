<?php 
include("header.php");
include("menu.php");
$registration_id=$_SESSION['registration_id'];
?>


<div id="inline2" style="width:100%; display:none;">
<form action="" name="sendmail" id="sendmail" method="post">
<input type="hidden" name="action" value="sendmail"/>        
    <div class="add_training">    
        <div class="pop_head">Contact Jobready For Training</div>
        <ul class="login" style="display:none;"></ul>
        <div class="form_details fade_anim">
            <div class="textfield">
               <textarea name="description" id="description" placeholder="Comment"></textarea>
            </div>
			<div class="textfield">
              <input type="text" name="mail" value="<?php echo $mail; ?>"/>
            </div>
            <div class="textfield fade">
            <input type="submit" value="Submit" name="submit"/>            
            </div>           
            <div class="clear"></div>  
        </div>
		</div>   
    </form> 
</div>