<?php include("header.php");?>
<?php 
$registration_id=$_SESSION['registration_id'];
if(!isset($_SESSION['registration_id']) || actor_type($conn,$registration_id)!="S")
		header('location:index.php');
?>
<?php include("menu.php");?>
<?php
	$result=$conn->query("select F.*, I.* from master_feedback F,job_training_list T  where F.registration_id='$registration_id' and F.trainer_id=T.registration_id");
	$num=$result->num_rows;
?>
<!-- -------------------------------- container starts ------------------------------ -->
<script src="js/jquery.dataTables.min.js"></script>
<link rel="stylesheet" type="text/css" href="css/jquery.dataTables.min.css"/>
<script type="text/javascript">

$(document).ready(function() {

    $('#example').DataTable({

    "bLengthChange": false,

	"iDisplayLength": 10,
	"order": [[0, "desc"]]

	});

	

	$('#example1').DataTable({

    "bLengthChange": false,

	"iDisplayLength": 10,
	"order": [[0, "desc"]]

	});

});

</script>
<div class="page_title"><span>welcome <?php echo getUserName($conn,$registration_id)?></span></div>
<div class="inner_conainer" >
  <?php include("personal_dashboard_link.php");?>
  <div class="dashboard_right fade_anim">
    <div class="content_head">Company Showing Interest Your Profile</div>
    <div class="table_main_other table_job" id="no-more-tables-other">
      <div class="clear"></div>
      <table class="table-bordered-other table-striped table-condensed-other cf" id="example">
        <thead>
          <tr>
			<th> Date </th>
            <th> Job Code </th>
            <th> Job Description </th>
            <th> Designation</th>
            <th> Location</th>
          </tr>
        </thead>
        <tbody>
          <?php 

            $result1=$conn->query("select * from job_student_job_interest where registration_id='$registration_id' and employer_acceptance='Y'");

            $num1=$result1->num_rows;

			while($row1=$result1->fetch_assoc()){
			    $post_date=$row1['post_date'];
				$date=date('Y-m-d',strtotime($post_date));

        ?>
          <tr>
		   <td data-title="Date" align="center"><?php echo $date;?></td>
            <td data-title="Job Code" align="center"><?php echo getJobDetails($conn,$row1['job_id'],'job_code');?></td>
            <td data-title="Job Description" align="center"><?php echo getJobDetails($conn,$row1['job_id'],'job_desc');?></td>
            <td data-title="Designation" align="center"><?php echo getJobDetails($conn,$row1['job_id'],'designation');?></td>
            <td data-title="Location" align="center"><?php echo getCityName($conn,getJobDetails($conn,$row1['job_id'],'job_location'));?> </td>
          </tr>
          <?php }?>
        </tbody>
      </table>
      <div class="clear"></div>
    </div>
    <div class="content_head">Your Interest in jobs</div>
    <div class="table_main_other table_job" id="no-more-tables-other">
      <div class="clear"></div>
      <table class="table-bordered-other table-striped table-condensed-other cf" id="example1">
        <thead>
          <tr>
		  <th> Date </th>
            <th> Job Code </th>
            <th> Job Description </th>
            <th> Designation</th>
            <th> Location</th>
          </tr>
        </thead>
        <tbody>
          <?php 
            $result=$conn->query("select * from job_student_job_interest where registration_id='$registration_id' and employer_acceptance='P'");
            $num=$result->num_rows;
			while($row=$result->fetch_assoc()){
				$post_date=$row['post_date'];
				$date=date('Y-m-d',strtotime($post_date));
        ?>
          <tr>
		  <td data-title="Date" align="center"><?php echo $date;?></td>
            <td data-title="Job Code" align="center"><?php echo getJobDetails($conn,$row['job_id'],'job_code');?></td>
            <td data-title="Job Description" align="center"><?php echo getJobDetails($conn,$row['job_id'],'job_desc');?></td>
            <td data-title="Designation" align="center"><?php echo getJobDetails($conn,$row['job_id'],'designation');?></td>
            <td data-title="Location" align="center"><?php echo getCityName($conn,getJobDetails($conn,$row['job_id'],'job_location'));?> </td>
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
