<?php $page=basename($_SERVER['PHP_SELF']);?>

<div class="dashboard_left">

    <div class="link <?php if($page=="employer_dashboard.php"){?>active<?php }?>"><a href="employer_dashboard.php" <?php if($page=="employer_dashboard.php"){?>class="active"<?php }?>><img src="images/icon_dashboard.png" />Dashboard</a></div>

    <div class="link <?php if($page=="employer_profile.php"){?>active<?php }?>"><a href="employer_profile.php" <?php if($page=="employer_profile.php"){?>class="active"<?php }?>><img src="images/icon_profile.png" />Profile</a></div>

    <div class="link <?php if($page=="employer_job.php"){?>active<?php }?>"><a href="employer_job.php" <?php if($page=="employer_job.php"){?>class="active"<?php }?>><img src="images/icon_jobs.png" />Jobs</a></div>

    <div class="link <?php if($page=="employer_candidates_contacted.php"){?>active<?php }?>"><a href="employer_candidates_contacted.php" <?php if($page=="employer_candidates_contacted.php"){?>class="active"<?php }?>><img src="images/icon_candidate_contacted.png" />Candidates contacted  </a></div>

    <div class="link <?php if($page=="employer_interested_candidate.php"){?>active<?php }?>"><a href="employer_interested_candidate.php" <?php if($page=="employer_interested_candidate.php"){?>class="active"<?php }?>><img src="images/icon_interested_candidate.png" />Interested candidates </a></div>

    <div class="link <?php if($page=="employer_training_offered.php"){?>active<?php }?>"><a href="employer_training_offered.php" <?php if($page=="employer_training_offered.php"){?>class="active<?php }?>><img src="images/icon_tranings.png" />Trainings offered by JobbReady</a></div>

<?php if(isset($_SESSION['registration_type']) && $_SESSION['registration_type']=="SA"){?>
    <div class="link <?php if($page=="employer_recruiter_listing.php"){?>active<?php }?>"><a href="employer_recruiter_listing.php" <?php if($page=="employer_recruiter_listing.php.php"){?>class="active"<?php }?>><img src="images/icon_recruiter_login.png" />Manage Recruiter Login </a></div>
  <?php }?>

    <div class="link <?php if($page=="change_password.php"){?>active<?php }?>"><a href="change_password.php" <?php if($page=="change_password.php"){?>class="active"<?php }?>><img src="images/pass.png" />Change Login Credential  </a></div>

</div>