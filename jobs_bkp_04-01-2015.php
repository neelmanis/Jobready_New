<?php include("header.php");?>
<?php include("menu.php");?>
<?php $registration_id=$_SESSION['registration_id'];
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
	"iDisplayLength": 10
	});
	
	$('#example1').DataTable({
    "bLengthChange": false,
	"iDisplayLength": 10
	});
});
</script>


<script type="text/javascript">
$(document).ready(function(){
$('.showjobinterest').live('click',function(){
var clas=$(this).attr('class').split(' ');
var job_id=clas[1];
var employer_registraion_id=clas[2];
var admin_id=clas[3];
var registration_id=clas[4];	
	if(confirm("Are you sure you want to show interest?")){
		$.ajax({
				type:"POST",
				url:"employer_job_inc.php",
				data:"action=showjobinterest&&job_id="+job_id+"&&employer_registraion_id="+employer_registraion_id+"&&admin_id="+admin_id+"&&registration_id="+registration_id,
				dataType:"JSON",
				success:function(data)
				{
					//console.log(data);
					window.location.href=data.url;
				}
			});
	}
	else
	{
		return false;
	}
  });
});
</script>

<div class="page_title"><span>welcome <?php echo getUserName($conn,$registration_id)?></span></div>
<div class="inner_conainer" >
  <?php include("personal_dashboard_link.php");?>
  <div class="dashboard_right fade_anim">
    <div class="content_head">Company Showing Interest Your Profile</div>
    <div class="table_main_other" id="no-more-tables-other">
      <div class="clear"></div>
      <table class="table-bordered-other table-striped table-condensed-other cf" id="example">
       <thead>
          <tr>
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
        ?>
          <tr>
            <td data-title="Job Code"><?php echo getJobDetails($conn,$row1['job_id'],'job_code');?></td>
            <td data-title="Job Description"><?php echo getJobDetails($conn,$row1['job_id'],'job_desc');?></td>
            <td data-title="Designation"><?php echo getJobDetails($conn,$row1['job_id'],'designation');?></td>
            <td data-title="Location"><?php echo getJobDetails($conn,$row1['job_id'],'job_location');?> </td>
          </tr>
		  <?php }?>
        </tbody>
      </table>
      <div class="clear"></div>
    </div>
    <div class="content_head">Show Your Interest</div>
    <div class="table_main_other" id="no-more-tables-other">
      <div class="clear"></div>
      <table class="table-bordered-other table-striped table-condensed-other cf" id="example1">
        <thead>
          <tr>
            <th> Job Description </th>
            <th> Designation</th>
            <th> Location</th>
            <th> </th>
          </tr>
        </thead>
        <tbody>
        <?php 
            $result=$conn->query("select * from master_job where status='1'");
            $num=$result->num_rows;
			while($row=$result->fetch_assoc()){
        ?>
          <tr>
            <!--<td data-title="Candidates Name"><img src="images/company_logo.jpg" /></td>-->
            <td data-title="Interest"><?php echo $row['job_desc'];?></td>
            <td data-title="Candidates Name"><?php echo $row['designation'];?></td>
            <td data-title="Email id"><?php echo getCityName($conn,$row['job_location']);?></td>
            <?php 
				$employer_acceptance=getJobAcceptance($conn,$row['id'],$registration_id);
				if($employer_acceptance=="Y" || $employer_acceptance=="P"){
			?>
            <td data-title="Action"><a href="#">Interested</a></td>
            <?php } else {?>
            <td data-title="Action"><a href="#" class="showjobinterest <?php echo $row['id']." ".$row['registration_id']." ".$row['admin_id']." ".$registration_id;?>">Show Interest</a></td>
            <?php }?>
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
<div class="ad_banner"><a href="#"><img src="images/ad_banner.jpg" alt="" /></a></div>
<?php include("footer.php");?>
</body>
</html>
