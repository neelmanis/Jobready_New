<?php $page=basename($_SERVER['PHP_SELF']);?>
<div class="dashboard_left">
    	<div class="link <?php if($page=="personal_dashboard.php"){?>active<?php }?>"><a href="personal_dashboard.php" <?php if($page=="personal_dashboard.php"){?>class="active"<?php }?>><img src="images/icon_dashboard.png" />Dashboard</a></div>
        <div class="link <?php if($page=="personal_profile.php"){?>active<?php }?>"><a href="personal_profile.php" <?php if($page=="personal_profile.php"){?>class="active"<?php }?>><img src="images/icon_profile.png" />Profile</a></div>
        <div class="link <?php if($page=="exam_score.php"){?>active<?php }?>"><a href="exam_score.php" <?php if($page=="exam_score.php"){?>class="active"<?php }?>><img src="images/icon_exam_store.png" />Exam Score</a></div>
        <div class="link <?php if($page=="jobs.php"){?>active<?php }?>"><a href="jobs.php" <?php if($page=="jobs.php"){?>class="active"<?php }?>><img src="images/icon_jobs.png" />Jobs</a></div>
        <div class="link <?php if($page=="personal_trainings.php"){?>active<?php }?>"><a href="personal_trainings.php" <?php if($page=="personal_trainings.php"){?>class="active"<?php }?>><img src="images/icon_tranings.png" />Trainings </a></div>
        <div class="link <?php if($page=="change_password.php"){?>active<?php }?>"><a href="change_password.php" <?php if($page=="change_password.php"){?>class="active"<?php }?>><img src="images/pass.png" />Change Password </a></div>
    </div>