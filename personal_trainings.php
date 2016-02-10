<?php include("header.php");?>
<?php 
$registration_id=$_SESSION['registration_id'];
if(!isset($_SESSION['registration_id']) || actor_type($conn,$registration_id)!="S")
		header('location:index.php');
?>
<?php include("menu.php");?>
<!-- -------------------------------- container starts ------------------------------ -->
<script type="text/javascript">
$(document).ready(function() {
    $('#example').DataTable({
    "bLengthChange": false,
	"iDisplayLength": 10
	});
	$('#example1').DataTable({
    "bLengthChange": false,
	"iDisplayLength": 10
	});
});
</script>

<script src="js/jquery.dataTables.min.js"></script>
<link rel="stylesheet" type="text/css" href="css/jquery.dataTables.min.css"/>
<div class="page_title"><span>welcome <?php echo getUserName($conn,$registration_id)?></span></div>
<div class="inner_conainer" >
  <?php include("personal_dashboard_link.php");?>
  <div class="dashboard_right fade_anim">
    <div class="content_head">Accepted Training</div>
    <div class="table_main_other table_job" id="no-more-tables-other">
      <div class="clear"></div>
      <table class="table-bordered-other table-striped table-condensed-other cf" id="example">
        <thead>
          <tr>
            <th> Training Category </th>
            <th> Trainer Name </th>
            <th> Training Brief</th>
            <th> Document </th>
            <th> Feddback </th>
          </tr>
        </thead>
        <tbody>
          <?php 
            /*..............................Accepted Training List....................................*/
            $result=$conn->query("select * from job_student_training_interest where registration_id='$registration_id' and trainer_acceptance='Y'");
            while($row=$result->fetch_assoc()){
        ?>
          <tr>
            <td data-title="Training Category" align="center"><?php echo getInterest($conn,getTrainerDetails($conn,$row['training_id'],'area_of_interest'));?></td>
            <td data-title="Training Name" align="center"><a data-trainer='<?php echo getTrainerDetails($conn,$row['training_id'],'registration_id') ?>' class="fancybox enquiry fade" href="#inline2"><?php echo getUserName($conn,getTrainerDetails($conn,$row['training_id'],'registration_id'));?></a></td>
            <td data-title="Training Brief" align="center"><?php echo getTrainerDetails($conn,$row['training_id'],'description');?></td>
            <td data-title="Document" align="center"><a href="upload/training_doc/<?php echo $registration_id."/".getTrainerDetails($conn,$row['training_id'],'doc');?>" target="_blank">Download</a></td>
            <td data-title="Feedback" align="center"><a class="fancybox fancybox.ajax fade" href="feedback_form.php?trainer_registraion_id=<?php echo $row['trainer_registraion_id'];?>">Click Here</a></td>
          </tr>
          <?php }?>
        </tbody>
      </table>
      <div class="clear"></div>
    </div>
    <div class="content_head">Pending Requested Training</div>
    <div class="table_main_other table_job" id="no-more-tables-other">
      <div class="clear"></div>
      <table class="table-bordered-other table-striped table-condensed-other cf" id="example1">
        <thead>
          <tr>
            <th> Training Category </th>
            <th> Trainer Name </th>
            <th> Training Brief</th>
            <th> Document </th>
          </tr>
        </thead>
        <tbody>
          <?php 
            /*..............................further training List....................................*/
            $result=$conn->query("select * from job_student_training_interest where registration_id='$registration_id' and trainer_acceptance='P'");
            while($row=$result->fetch_assoc()){
          ?>
          <tr>
            <td data-title="Training Category" align="center"><?php echo getInterest($conn,getTrainerDetails($conn,$row['training_id'],'area_of_interest'));?></td>
            <td data-title="Training Name" align="center"><a href="candidate_trainer_profile.php?registration_id=<?php echo $row['trainer_registraion_id'];?>"><?php echo getUserName($conn,getTrainerDetails($conn,$row['training_id'],'registration_id'));?></a></td>
            <td data-title="Training Brief" align="center"><?php echo getTrainerDetails($conn,$row['training_id'],'description');?></td>
            <td data-title="Document" align="center"><a href="upload/training_doc/<?php echo $registration_id."/".getTrainerDetails($conn,$row['training_id'],'doc');?>" target="_blank">Download</a></td>
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
