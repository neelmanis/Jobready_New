<?php include("header.php");?>
<!-- xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx accordian starst  xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx -->
<!-- -------------------------------- container starts ------------------------------ -->
		<?php
		$mlx=$conn->query("select attempt_id from scores where registration_id='$registration_id' and exam_type='gen' group by attempt_id");
		while($row=$mlx->fetch_assoc()){
		?>
				<div class="main_accord">
                <div class="menuheader expandable"><strong>Test <?php echo $row['attempt_id'];?></strong></div>
                <div class="categoryitems accord_detail">
				<?php
					$attempt_id=$row['attempt_id'];
					$neely=$conn->query("select * from scores where attempt_id='$attempt_id' and registration_id='$registration_id'");
					while($rows=$neely->fetch_assoc()){
					$subject_id=$rows['subject_id'];
					$total_marks_obtain=$rows['total_marks_obtain'];
					$total_marks=$rows['total_marks'];	
					$right_per=$total_marks_obtain/$total_marks*100;
				?>
					<div class="exam_score">	
						<div class="subject">
							<?php echo getSubjectName($conn,$subject_id); ?><span><?php echo ceil($right_per); ?>%</span>
<!-- -------------------------------- container ends ------------------------------ -->
</html>