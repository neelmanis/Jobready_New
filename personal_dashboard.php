<?php include("header.php");?>
<?php 
	$registration_id=$_SESSION['registration_id'];
	if(!isset($_SESSION['registration_id']) || actor_type($conn,$registration_id)!="S")
			header('location:index.php');
?>

<?php include("menu.php");?>

<!-- -------------------------------- container starts ------------------------------ -->
<div class="page_title"><span>welcome <?php echo getUserName($conn,$registration_id)?></span></div>
<div class="inner_conainer" >
  <?php include("personal_dashboard_link.php");?>
  <div class="dashboard_right fade_anim">
    <div class="dashbox_wrap">
      <div class="dashbox blue_bg">
        <div class="title"><img src="images/icon_profile_big.png" />profile</div>
        <p><strong>Name :</strong> <?php echo getUserName($conn,$registration_id);?></p>
        <p><strong>Email :</strong> <?php echo getUserEmail($conn,$registration_id);?></p>
        <p><strong>Mobile :</strong> <?php echo getUserMobile($conn,$registration_id);?></p>
        <p><strong>Area of Interest :</strong>
          <?php 
				$i=1;

				$result = $conn->query("SELECT area_of_interest FROM  job_area_of_interest  where registration_id='$registration_id'");	

				$num=$result->num_rows;

				while($row=$result->fetch_assoc()){

					if($i<$num)

						$intrest.= getInterest($conn,$row['area_of_interest']).", ";

					else

						$intrest.= getInterest($conn,$row['area_of_interest']);

					$i++;

				}

				echo $intrest;

                ?>
        </p>
        <a class="more" href="personal_profile.php"></a> </div>
      <div class="dashbox green_bg">
        <div class="title"><img src="images/icon_exam_store_big.png" />Online Tests Summary</div>
        <p><strong>Latest Online Test Result</strong></p>
        <?php
				$neelx=$conn->query("SELECT sum(`total_marks_obtain`) as `mark_obtain`,sum(`total_marks`) as `total_marks` FROM `scores` WHERE `registration_id`='$registration_id' and  exam_type='gen' group by attempt_id order by attempt_id desc limit 1");
				$num1=$neelx->num_rows;
				$row=$neelx->fetch_assoc();
				$mark_obtain =$row['mark_obtain'];
				$total_marks =$row['total_marks'];
				$mark_per=($mark_obtain/$total_marks)*100;
				if($num1>0){?>
        <div class="test_result"> <span><?php echo ceil($mark_per); ?>%</span>
          <!--<div class="range"><div class="percentage"></div></div>-->
          <div class="range">
            <div class="percentage sub_1" style="width:<?php echo $mark_per; ?>%;"></div>
          </div>
        </div>
        <?php } else {?>
        <div class="test_result"> <span>You Haven't Attempted Any Exams Yet..!</span> </div>
        <?php } ?>
        <a class="more" href="exam_score.php"></a> </div>
      <div class="dashbox red_bg">
        <div class="title"><img src="images/icon_tranings_big.png" />Trainings</div>
        <p><strong>Last Attended Trainer :</strong></p>
        <?php 

                /*..............................Accepted Training List....................................*/

                $result=$conn->query("select * from job_student_training_interest where registration_id='$registration_id' and trainer_acceptance='Y' order by post_date desc limit 1");

                while($row=$result->fetch_assoc()){

                ?>
        <div class="trainiing">
          <div class="name"><?php echo getUserName($conn,getTrainerDetails($conn,$row['training_id'],'registration_id'));?></div>
          <span>- </span>
          <div class="name"><?php echo getInterest($conn,getTrainerDetails($conn,$row['training_id'],'area_of_interest'));?></div>
          <div class="clear"></div>
        </div>
        <?php }?>
        
        <a class="more" href="personal_trainings.php"></a> </div>
      <div class="dashbox purple_bg">
        <div class="title"><img src="images/icon_jobs_big.png" />jobs</div>
        <p><strong>Company Showing Interest In Your Profile:</strong></p>
        <div class="job">
          <ul class="marquee_1">
            <?php 

                    $result1=$conn->query("select * from job_student_job_interest where registration_id='$registration_id' and employer_acceptance='Y'");

                    $num1=$result1->num_rows;

                    while($row1=$result1->fetch_assoc()){

                    ?>
            <li><strong>Job Code:</strong> <?php echo getJobDetails($conn,$row1['job_id'],'job_code');?> , <strong>Designation:</strong> <?php echo getJobDetails($conn,$row1['job_id'],'designation');?></li>
            <?php }?>
          </ul>
          <div class="clear"></div>
        </div>
        <a class="more" href="jobs.php"></a> </div>
    </div>
  </div>
  <div class="clear"></div>
</div>
<!-- -------------------------------- container ends ------------------------------ -->

<?php include("footer.php");?>
</body>
</html>
