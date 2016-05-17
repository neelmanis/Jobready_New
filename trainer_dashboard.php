<?php include("header.php");?>
<?php 
	$registration_id=$_SESSION['registration_id'];
	if(!isset($_SESSION['registration_id']) || actor_type($conn,$registration_id)!="T")
			header('location:index.php');
?>
<?php include("menu.php");?>
<?php 
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
        <div class="title"><img src="images/icon_profile_big.png" />profile
          <div class="clear"></div>
        </div>
        <p><strong>Name :</strong> <?php echo getUserName($conn,$registration_id);?></p>
        <p><strong>Email :</strong> <?php echo getUserEmail($conn,$registration_id);?></p>
        <p><strong>Mobile :</strong> <?php echo getUserMobile($conn,$registration_id);?></p>
        <a class="more" href="trainer_profile.php"></a> </div>
      <div class="dashbox green_bg">
        <div class="title"><img src="images/icon_tranings_big.png" />Trainings Courses
          <div class="clear"></div>
        </div>
        <div class="posted_job">
          <?php while($row=$result->fetch_assoc()){?>
          <p><?php echo $row['title'];?></p>
          <?php  } ?>
          <div class="clear"></div>
        </div>
        <a class="more" href="training_cources.php"></a> </div>
      <div class="dashbox red_bg">
        <div class="title"><img src="images/icon_training_request_big.png" />Training requests from candidates
          <div class="clear"></div>
        </div>
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
        <a class="more" href="training_requests_from_candidates.php"></a> </div>
      <div class="dashbox purple_bg">
        <div class="title"><img src="images/icon_feedback_big.png" />Candidates feedback
          <div class="clear"></div>
        </div>
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
        <a class="more" href="trainer_candidates_feedback.php"></a> </div>
    </div>
  </div>
  <div class="clear"></div>
</div>
<!-- -------------------------------- container ends ------------------------------ -->

<?php include("footer.php");?>
</body>
</html>
