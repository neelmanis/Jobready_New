<?php
include("header.php");
$registration_id=$_SESSION['registration_id'];
if(!isset($_SESSION['registration_id']) || actor_type($conn,$registration_id)!="F")
		header('location:index.php');
include("menu.php");
?>
<script src="js/jquery.dataTables.min.js"></script>
<link rel="stylesheet" type="text/css" href="css/jquery.dataTables.min.css"/>
<script type="text/javascript">
$(document).ready(function() {
    $('#example').DataTable({
    "bLengthChange": false,
	"iDisplayLength": 10,
	"order": [[0, "desc"]]
	});
});
</script>
<script type="text/javascript">
$(document).ready(function(){
$('.acceptjobinterest').live('click',function(){
var clas=$(this).attr('class').split(' ');
var id=clas[2];	
	if(confirm("Are you sure you want to contact ?")){
		$.ajax({
				type:"POST",
				url:"employer_job_inc.php",
				data:"action=acceptjobinterest&&id="+id,
				dataType:"JSON",
				success:function(data)
				{
					//alert(data);
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
<!-- -------------------------------- container starts ------------------------------ -->
<div class="page_title"><span>welcome <?php echo getUserName($conn,$registration_id)?></span></div>
<div class="inner_conainer" >
  <?php include("employer_dashboard_link.php");?>
  <div class="dashboard_right fade_anim">
    <div class="table_job" id="no-more-tables-job">
      <div class="clear"></div>
      <table class="table-bordered-job table-striped table-condensed-job cf" id="example">
        <thead>
          <tr>
		    <th> Date </th>
            <th> Jobcode </th>
            <th> Candidate Name </th>
            <th> Contact</th>
            <th> </th>
          </tr>
        </thead>
        <tbody>
        <?php 
            $result=$conn->query("select * from job_student_job_interest where employer_registraion_id='$registration_id' and employer_acceptance='P'");
            $num=$result->num_rows;
			while($row=$result->fetch_assoc()){
				$post_date=$row['post_date'];
				$date=date('d-m-Y',strtotime($post_date));
        ?>
          <tr>
			<td data-title="Date"><?php echo $date;?></td>
            <td data-title="Jobcode"><?php echo getJobDetails($conn,$row['job_id'],'job_code');?></td>
            <td data-title="Candidate Name">
            	<a href="candidate_trainer_profile.php?registration_id=<?php echo $row['registration_id'];?>"><?php echo getUserName($conn,$row['registration_id']);?></a>
            </td>
            <td data-title="Contact"><?php echo getUserMobile($conn,$row['registration_id']);?></td>
            <td data-title="">
            <table border="0" class="innertable" width="100%;">
            <tr>
            <td><a href="#" class="contact acceptjobinterest <?php echo $row['id'];?>">Contact</a></td>
            <td>
            <a class="contact fancybox fancybox.ajax fade feedback_icon" href="view_feedback.php?employer_registraion_id=<?php echo $row['employer_registraion_id'];?>&candidate_id=<?php echo $row['registration_id'];?>">View FeedBack</a>
            
            
            </td>
            </tr>
            </table>
<!--            <a href="#" class="contact acceptjobinterest <?php echo $row['id'];?>">Contact</a>
            <a href="#" class="contact acceptjobinterest <?php echo $row['id'];?>">View FeedBack</a>-->
            </td>
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