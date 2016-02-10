<?php include("header.php");?>
<?php include("menu.php");?>
<?php 
	$registration_id=$_SESSION['registration_id'];
	/*...........................................................*/
	$result=$conn->query("select a.id,b.company_name from job_registration a inner join job_profile b on a.id=b.registration_id  where registration_id='$registration_id'");
	$row=$result->fetch_assoc();	
	
?>
<!-- -------------------------------- container starts ------------------------------ -->
<div class="page_title"><span>welcome <?php echo getUserName($conn,$registration_id)?></span></div>
<div class="inner_conainer" >
  <?php include("employer_dashboard_link.php");?>
  <div class="dashboard_right fade_anim">
    <div class="dashbox_wrap">
      <div class="dashbox blue_bg">
            	<div class="title"><img src="images/icon_profile_big.png" />profile</div>
				<p><strong>Company Name :</strong> <?php echo $row['company_name'];?></p>
                <p><strong>Name :</strong> <?php echo getUserName($conn,$registration_id);?></p>
                <p><strong>Email :</strong> <?php echo getUserEmail($conn,$registration_id);?></p>
                <p><strong>Mobile :</strong> <?php echo getUserMobile($conn,$registration_id);?></p>
               	<a class="more" href="employer_profile.php"></a>
            </div>
      <!--<div class="dashbox green_bg">
        <div class="title"><img src="images/icon_exam_store_big.png" />Online Tests Summary
          <div class="clear"></div>
        </div>
        <div class="posted_job">
          <div class="marquee_1">
            <div class="job_disc">
              <div class="name">Junior Accountant</div>
              <span>- </span>
              <div class="place">Mumbai</div>
            </div>
            <div class="job_disc">
              <div class="name">CA (Chartered Accountant) </div>
              <span>- </span>
              <div class="place">Mumbai</div>
            </div>
            <div class="job_disc">
              <div class="name">Tax Accountant</div>
              <span>- </span>
              <div class="place">Mumbai</div>
            </div>
            <div class="job_disc">
              <div class="name">CA (Chartered Accountant) </div>
              <span>- </span>
              <div class="place">Goa</div>
            </div>
          </div>
          <div class="clear"></div>
        </div>
        <a class="more"></a> </div>-->
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