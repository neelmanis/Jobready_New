<?php include("header.php");?>
<?php 
	$registration_id=$_SESSION['registration_id'];
	if(!isset($_SESSION['registration_id']) || actor_type($conn,$registration_id)!="S")
			header('location:index.php');
?>
<?php include("menu.php");?>
<?php 
$result=$conn->query("select * from job_training_list where registration_id='$registration_id'");
$num=$result->num_rows;
?>

<!-- xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx accordian starst  xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx -->
<link rel="stylesheet" type="text/css" href="css/accordian.css" />
<script type="text/javascript" src="js/ddaccordion.js"></script>
<script type="text/javascript">
ddaccordion.init({
	headerclass: "expandable", //Shared CSS class name of headers group that are expandable
	contentclass: "categoryitems", //Shared CSS class name of contents group
	revealtype: "click", //Reveal content when user clicks or onmouseover the header? Valid value: "click" or "mouseover
	mouseoverdelay: 200, //if revealtype="mouseover", set delay in milliseconds before header expands onMouseover
	collapseprev: true, //Collapse previous content (so only one open at any time)? true/false 
	defaultexpanded: [1], //index of content(s) open by default [index1, index2, etc]. [] denotes no content
	onemustopen: false, //Specify whether at least one header should be open always (so never all headers closed)
	animatedefault: true, //Should contents open by default be animated into view?
	persiststate: true, //persist state of opened contents within browser session?
	toggleclass: ["", "openheader"], //Two CSS classes to be applied to the header when it's collapsed and expanded, respectively ["class1", "class2"]
	togglehtml: ["prefix", "", ""], //Additional HTML added to the header when it's collapsed and expanded, respectively  ["position", "html1", "html2"] (see docs)
	animatespeed: "fast", //speed of animation: integer in milliseconds (ie: 200), or keywords "fast", "normal", or "slow"
	oninit:function(headers, expandedindices){ //custom code to run when headers have initalized
		//do nothing
	},
	onopenclose:function(header, index, state, isuseractivated){ //custom code to run whenever a header is opened or closed
		//do nothing
	}
})
</script>
<!-- xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx accordian ends  xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx -->
<!-- -------------------------------- container starts ------------------------------ -->
<div class="page_title"><span>welcome <?php echo getUserName($conn,$registration_id)?></span></div>
<div class="inner_conainer" >
	<?php include("personal_dashboard_link.php");?>
    <div class="dashboard_right">
	<div class="add_info  fade_anim" style="float:none;">
	  <span class="add_info  fade_anim" style="float:none;">
	  <input type="button" onclick="location.href='online_exam.php';" value="GENERAL EXAM" />
	  </span>
	  <input type="button" onclick="location.href='select_subject.php';" value="SUBJECT BASED EXAM">
	</div>
	<div class="other_exam">General Awareness Result</div>
    	<div class="arrowlistmenu">           
		<?php
		$i=1;
		$mlx=$conn->query("select attempt_id from scores where registration_id='$registration_id' and exam_type='gen' group by attempt_id order by attempt_id desc limit 0,3");
		$gcount=$mlx->num_rows;
		if($gcount>0){
		while($row=$mlx->fetch_assoc()){
		$attempt_id=$row['attempt_id'];
		?>
				<div class="main_accord">
                <div class="menuheader expandable"><strong>Attempt<strong> <?php echo $i;?></strong><div class="average_percent">
				Percentage Optained : <?php echo getTotScore($conn,$attempt_id,$registration_id);?>%</div></div>
                <div class="categoryitems accord_detail">
				<?php
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
						</div>
						<div class="range">
							<div class="percentage sub_1" style="width:<?php echo ceil($right_per);?>%;"></div>
						</div>
					</div>	
				<?php }	?>
               	  </div>
				</div> 
				<?php $i++;} } else {?>
          <div class="exam_score">No result found..!!</div>
                <?php }?>
		</div>
		<div class="other_exam">Subject Based Exam Result</div>
    	<div class="arrowlistmenu">           
		<?php
		$j=1;
		$mlx=$conn->query("select attempt_id from scores where registration_id='$registration_id' and exam_type='interest' group by attempt_id order by attempt_id desc");
		$scount=$mlx->num_rows;
		if($scount>0){
		while($row=$mlx->fetch_assoc()){
		?>
				<div class="grand_quest">
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
                        </div>
                        <div class="range">
                            <div class="percentage sub_1" style="width:<?php echo ceil($right_per);?>%;"></div>
                        </div>
                    </div>	
				<?php }	?>
				</div> 
				<?php $j++;}} else {?>
          <div class="exam_score">No records found..!!</div>
                <?php }?>
		</div>
	    </div>
  <div class="clear"></div>
</div>

<!-- -------------------------------- container ends ------------------------------ -->
<?php include("footer.php");?>
</body>
</html>