<?php include("header.php");?>
<?php include("menu.php");?>
<?php 
$registration_id=$_REQUEST['registration_id'];
/*...........................................................*/
$result=$conn->query("select a.*,b.* from job_registration a,job_profile b where a.id='$registration_id' and b.registration_id='$registration_id'");
$row=$result->fetch_assoc();

/*...........................get area of interest.....................................*/
$result1=$conn->query("select * from job_area_of_interest where registration_id='$registration_id'");
while($row1=$result1->fetch_assoc())
{
	$interest.=getInterest($conn,$row1['area_of_interest']).",";
}
?>
<script src="js/jquery.dataTables.min.js"></script>
<link rel="stylesheet" type="text/css" href="css/jquery.dataTables.min.css"/>
<script type="text/javascript">

$(document).ready(function() {
    $('#example').DataTable({
    "bLengthChange": false,
	"bFilter": false,
	"iDisplayLength": 10
	});

	$('#example1').DataTable({
    "bLengthChange": false,
	"bFilter": false,
	"iDisplayLength": 10
	});

});

</script>
<!-- -------------------------------- container starts ------------------------------ -->
<div class="page_title"><span>Profile Details</span></div>
<div class="inner_conainer">
<div class="add_info"><a href='javascript:history.back(1);'>Back</a></div>
  <div class="trainer_feedback">
    <!--<div class="pic"><img src="images/feedback_profile.jpg" /></div>-->
    <div class="profile_detail">
      <div class="name"><?php echo ucfirst($row['fname']);?></div>
      <span><?php echo ucfirst(getCityName($conn,$row['city']));?>,<?php echo ucfirst($row['pincode']);?></span>
      <ul class="contact">
        <li><img src="images/icon_phone.png" /> <?php echo ucfirst($row['mobile_no']);?></li>
        <li><img src="images/icon_mail.png" /> <a href="mailto:<?php echo $row['email'];?>"><?php echo $row['email'];?></a></li>
      </ul>
    </div>
    <div class="clear"></div>
  </div>
 
  <div class="trainer_feedback">
    <h5>Profile</h5>
    <div>
            <div class="quest_box fade_anim">
              <div class="info_wrap">
                <div class="info">
                  <div class="head">Areas Of Interest</div>
                  <div class="dvdr">:</div>
                  <div class="det"><?php echo $interest;?></div>
                </div>
                <div class="info">
                  <div class="head">Prefered Location</div>
                  <div class="dvdr">:</div>
                  <div class="det">
				  <?php if($row['preffered_location']==0) { echo "No Preference"; } else {?><?php echo ucfirst(getCityName($conn,$row['preffered_location']));?> <?php } ?></div>
                </div>
                <div class="info">
                  <div class="head">Brief Profile</div>
                  <div class="dvdr">:</div>
                  <div class="det"><?php echo ucfirst($row['brief_profile']);?></div>
                </div>
                <div class="info">
                  <div class="head">Skills / Kew words</div>
                  <div class="dvdr">:</div>
                  <div class="det"><?php echo ucfirst($row['keyword_skill']);?></div>
                </div>
                <div class="clear"></div>
              </div>
              <div class="clear"></div>
            </div>
          </div>
  </div>
  
<div class="trainer_feedback">
<h5>Training List</h5>
    <div class="table_main_other table_job" id="no-more-tables-other">
      <div class="clear"></div>
      <table class="table-bordered-other table-striped table-condensed-other cf" id="example">
        <thead>
          <tr>
			<th> Date </th>
            <th> Training </th>
          </tr>
        </thead>
        <tbody>
<?php 
$result1=$conn->query("select title,post_date from job_training_list where registration_id='$registration_id' and status='1'");
while($row1=$result1->fetch_assoc()){
$post_date=$row1['post_date'];
$date=date('d-m-Y',strtotime($post_date));
?>
<tr>
<td data-title="Date" align="center"><?php echo $date;?></td>
<td data-title="Title" align="center"><?php echo $row1['title'];?></td>
</tr>
<?php }?>
</tbody>
</table>
<div class="clear"></div>
</div>
<div class="clear"></div>
</div>

<div class="trainer_feedback">
<h5>Feedback</h5>
    <div class="table_main_other table_job" id="no-more-tables-other">
      <div class="clear"></div>
      <table class="table-bordered-other table-striped table-condensed-other cf" id="example1">
        <thead>
          <tr>
			<th> Date </th>
            <th> Candidate </th>
			<th> Feedback </th>
          </tr>
        </thead>
        <tbody>
<?php 
$result1=$conn->query("select registration_id,trainer_id,feed_description,status,post_date from master_feedback where trainer_id='$registration_id' and status='1'");
while($row1=$result1->fetch_assoc()){
$post_date=$row1['post_date'];
$date=date('d-m-Y',strtotime($post_date));
?>
<tr>
<td data-title="Date" align="center"><?php echo $date;?></td>
<td data-title="Title" align="center"><?php echo getUserName($conn,$row1['registration_id']);?></td>
<td data-title="Description" align="center"><?php echo $row1['feed_description'];?></td>
</tr>
<?php }?>
</tbody>
</table>
<div class="clear"></div>
</div>
<div class="clear"></div>
</div>
  
<div class="clear"></div>
</div>
<!-- -------------------------------- container ends ------------------------------ -->
<?php include("footer.php");?>
</body>
</html>
