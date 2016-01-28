<?php include("header.php");?>
<?php include("menu.php");?>
<?php 
$registration_id=$_SESSION['registration_id'];
$result=$conn->query("select * from job_training_list where registration_id='$registration_id'");
$num=$result->num_rows;

?>
<!-- -------------------------------- container starts ------------------------------ -->
<div class="page_title"><span>welcome <?php echo getUserName($conn,$registration_id)?></span></div>
<div class="inner_conainer" >
	<?php include("trainer_dashboard_link.php");?>
    <div class="dashboard_right fade_anim">
    	<div class="dashbox_wrap">
         	<div class="dashbox blue_bg">
            	<div class="title"><img src="images/icon_profile_big.png" />profile<div class="clear"></div></div>
                <p><strong>Name :</strong> <?php echo getUserName($conn,$registration_id);?></p>
                <p><strong>Email :</strong> <?php echo getUserEmail($conn,$registration_id);?></p>
                <p><strong>Mobile :</strong> <?php echo getUserMobile($conn,$registration_id);?></p>
               	<a class="more" href="trainer_profile.php"></a>
                
            </div>
            
            <div class="dashbox green_bg">
            	<div class="title"><img src="images/icon_tranings_big.png" />Trainings Courses<div class="clear"></div></div>
               	<div class="posted_job">
				 <?php while($row=$result->fetch_assoc()){?>
				<p><?php echo getInterest($conn,$row['area_of_interest']);?></p> 
				 <?php  } ?>
                   
                    <div class="clear"></div>
            	</div>
                
                <a class="more" href="training_cources.php"></a>
            </div>
            
            <div class="dashbox red_bg">
            	<div class="title"><img src="images/icon_training_request_big.png" />Training requests from candidates<div class="clear"></div></div>
               <div class="posted_job">
                    <div class="marquee_1">
					<!----  Start getting list of training offered by jobready  ---->
					<?php 
					$results=$conn->query("select * from job_student_training_interest where trainer_registraion_id='$registration_id'");
					while($rows=$results->fetch_assoc()){
					?>	
                    	<div class="job_disc">
                        	<div class="name"><?php echo getUserName($conn,$rows['registration_id']);?></div>
                    		<span>- </span>
                   	 		<div class="place"><?php echo getInterest($conn,getTrainerDetails($conn,$rows['training_id'],'area_of_interest'));?></div>
                        </div>
                             <?php }?>                  
                    </div>
                    <div class="clear"></div>
            	</div>      
                
                <a class="more" href="training_requests_from_candidates.php"></a>
            </div>
            
            <div class="dashbox purple_bg">
            	<div class="title"><img src="images/icon_feedback_big.png" />Candidates feedback <div class="clear"></div></div>
               <div class="posted_job">
                    <ul class="marquee_1">
					<!----  Start getting list of training offered by jobready  ---->
					<?php 
					$results=$conn->query("SELECT F.*,R.*,P.fname as first_name FROM `master_feedback` F,`job_profile`P,`job_registration` R
WHERE P.registration_id=F.trainer_id and F.trainer_id=$_SESSION[registration_id] and F.status='1'GROUP BY F.id DESC");
					while($rows=$results->fetch_assoc()){
					?>	
                        <li><?php echo $rows['feed_description'];?>
                       	<div class="feedback_name">- <?php echo $rows['first_name'];?></div>     
                       </li>
					<?php } ?>
                    </ul>
                    <div class="clear"></div>
            	</div>                
                <a class="more" href="trainer_candidates_feedback.php"></a>
            </div>
        
        </div>
    
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
    </div><div class="clear"></div>
</div>
<!-- -------------------------------- footer ends ------------------------------ -->

<!----------------- pop up display none start-------------------------->


<div id="inline1" style="width:100%; display:none;">
		
    <div class="form_login">    
        <div class="pop_head">Log in</div>
        <div class="form_details fade_anim">
        	
            <div class="textfield">
                <input type="text" onfocus="if(this.value=='Enter your Email or Mobile No.')value='';" onblur="if(this.value=='')value='Enter your Email or Mobile No.';" value="Enter your Email or Mobile No." />    
            </div>
            
            <div class="textfield">
                <input type="text" onfocus="if(this.value=='Password')value='';" onblur="if(this.value=='')value='Password';" value="Password" />    
            </div>
            
            
                   
            <div class="textfield fade">
                <input type="submit" value="Login" />    
            </div>
            
            <div class="clear"></div>
            
          	<div class="forgot_password"><input type="checkbox" /> Remember me <span><a href="#">Forgot Password ?</a></span></div>
            
           	 <div class="form_devider"><span>OR</span></div>
             
             <a href="#" class="facebook"><img src="images/icon_facebook.png" /> Log in via Facebook</a>
             <a href="#" class="gplus"><img src="images/icon_gplus.png" /> Log in via Google</a>
             
        </div>
    </div>  
    
    <div class="form_signup">    
        <div class="pop_head">Sign up</div>
        <div class="form_details fade_anim">
        	<!--<h3>type of actor </h3>
            <div class="radio_wrap">
            	<div class="radio"><input type="radio" name="actor" /> Student</div>
                <div class="radio"><input type="radio" name="actor"/> Trainer</div>
                <div class="radio"><input type="radio" name="actor"/> Firms</div>
            </div>-->
            
            <div class="textfield">
                <input type="text" onfocus="if(this.value=='Enter your Email')value='';" onblur="if(this.value=='')value='Enter your Email';" value="Enter your Email" />    
            </div>
            
            <div class="textfield">
                <input type="text" onfocus="if(this.value=='Password')value='';" onblur="if(this.value=='')value='Password';" value="Password" />    
            </div>
            
            <div class="textfield">
                <input type="text" onfocus="if(this.value=='Mobile Number')value='';" onblur="if(this.value=='')value='Mobile Number';" value="Mobile Number" />    
            </div>
            
                   
            <div class="textfield fade">
                <input type="submit" value="Submit" />    
            </div>
            
           	 
        </div>
    </div>       
        
</div>


<!----------------- pop up display none end -------------------------->

</body>
</html>
