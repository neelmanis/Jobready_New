<?php include("header.php");?><?php include("menu.php");?><?php 	$registration_id=$_SESSION['registration_id'];	/*...........................................................*/	$result=$conn->query("select a.id,b.company_name from job_registration a inner join job_profile b on a.id=b.registration_id  where registration_id='$registration_id'");	$row=$result->fetch_assoc();	?><?php /*  Get total no of jobs */$result=$conn->query("select COUNT(id) as total from master_job where registration_id='$registration_id' and status=1");$rows=$result->fetch_assoc();$total_jobs=$rows['total'];/*  Get total no of people interested */$results=$conn->query("select COUNT(id) as total from job_student_job_interest where `employer_registraion_id`='$registration_id' and `employer_acceptance`='P'");$row1=$results->fetch_assoc();$total_interest=$row1['total'];/*  Get total no of interview */$result2=$conn->query("select COUNT(id) as total from job_student_job_interest where `employer_registraion_id`='$registration_id' and `employer_acceptance`='Y'");$row2=$result2->fetch_assoc();$total_interview=$row2['total'];?><!-- -------------------------------- container starts ------------------------------ --><div class="page_title"><span>welcome <?php echo getUserName($conn,$registration_id)?></span></div><div class="inner_conainer" >  <?php include("employer_dashboard_link.php");?>  <div class="dashboard_right fade_anim">    <div class="dashbox_wrap">      <div class="dashbox blue_bg">            	<div class="title"><img src="images/icon_profile_big.png" />profile</div>				<p><strong>Company Name :</strong> <?php echo $row['company_name'];?></p>                <p><strong>Name :</strong> <?php echo getUserName($conn,$registration_id);?></p>                <p><strong>Email :</strong> <?php echo getUserEmail($conn,$registration_id);?></p>                <p><strong>Mobile :</strong> <?php echo getUserMobile($conn,$registration_id);?></p>               	<a class="more" href="employer_profile.php"></a>            </div>      <div class="dashbox green_bg">        <div class="title"><img src="images/icon_exam_store_big.png" />Job Summary          <div class="clear"></div>        </div>        <div class="posted_job">          <p><strong>No. of Jobs :</strong> <?php echo $total_jobs;?></p>                <p><strong>No of People Interested :</strong> <?php echo $total_interest;?></p>                <p><strong>No of people interviewed  :</strong> <?php echo $total_interview;?></p>
          <div class="clear"></div>
        </div>
        <a class="more"></a> </div>
      <div class="dashbox red_bg">
            	<div class="title"><img src="images/icon_tranings_big.png" />Trainings offered by JobbReady
				<div class="clear"></div></div>
                <div class="posted_job">
                    <div class="marquee_1">
					<!----  Start getting list of training offered by jobready  ---->
					<?php 
					$results=$conn->query("SELECT `area_of_interest`, `admin_id` FROM `job_training_list` WHERE admin_id!='0' and status=1 order by id desc");
					while($rows=$results->fetch_assoc()){
					?>	
                    	<div class="job_disc">
                        	<div class="name"><?php echo getAdminName($conn,$rows['admin_id']);?></div>
                    		<span>- </span>
                   	 		<div class="place"><?php echo getInterest($conn,$rows['area_of_interest']);?></div>
                        </div>
                     <?php }?>                  
                    </div>
                    <div class="clear"></div>
            	</div>                
                <a class="more" href="employer_training_offered.php"></a>
            </div>
    </div>
  </div>
  <div class="clear"></div>
</div>
<!-- -------------------------------- container ends ------------------------------ -->
<div class="ad_banner"><a href="#"><img src="images/ad_banner.jpg" alt="" /></a></div>
<?php include("footer.php");?>
</body>
</html>