<?php 
$actor_type=actor_type($conn,$_SESSION['registration_id']);
if($_SESSION['registration_type']=="A"){$url="employer_job.php";}
elseif($actor_type=='S'){$url="personal_dashboard.php";}
elseif($actor_type=='T'){$url="trainer_dashboard.php";}
elseif($actor_type=='F'){$url="employer_dashboard.php";}
else{$url="select_actor.php";}
?>
<!-- -------------------------------- header starts ------------------------------ -->
<div class="header_wrap">
    <div class="header fade_anim">
        <div class="logo"><a href="index.php"><img src="images/logo.png" alt="" /></a></div>
        <div class="header_right">
            <div class="menu_top">
            <?php if(isset($_SESSION['registration_id'])){?>
                 <a href="logout.php">logout</a>
                 <a href="<?php echo $url;?>">My Account</a>
             <?php } else{?>
             	<a class="fancybox fancybox.ajax fade" href="login_signup_form.php">Login</a>
             <?php }?>
            </div>
            <div class="clear"></div>
            
            <div class="menu_wrap fade_anim">
                <div id='cssmenu'>
                        <ul>
                            <li><a href='#'>home</a></li>
                            <li><a href='#'>Corporate</a></li>
                            <li><a href='#'>Our Services</a>							
							<ul>
								<li><a href="search_for_training.php">Search For Training</a></li>
								<li><a href="search_for_job.php">Search For Job</a></li>
                                <li><a href="search_for_candidate.php">Search For Candidate</a></li>
								<li><a href="employee_verification.php">Employee verification</a></li>
							</ul>
							</li>
							<li><a href='#'>Why JobbReady?</a>
							<ul>
								<li><a href="#">Need for JobbReady?</a></li>
								<li><a href="#">JobbReady in Media</a></li>
                                <li><a href="#">Employment Scenario Updates</a></li>
							</ul>
							</li>
                           <li><a href='#'>Resources</a>
							<ul>
								<li><a href="#">Interview Tips</a></li>
								<li><a href="#">Soft skills at Work </a></li>
                                <li><a href="#">Sample CVs</a></li>
								<li><a href="#">Trainings</a></li>
								<li><a href="#">Self help Articles</a></li>
							</ul>
						   </li>
                           <li><a href='contact_us.php'>Contact</a> </li>
                        </ul>
                    </div>	
              </div>
            
        </div>
        <div class="clear"></div>
    </div>
</div>    
<!-- -------------------------------- header ends ------------------------------ -->