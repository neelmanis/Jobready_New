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
$('.candidatecontact').live('click',function(){
var clas=$(this).attr('class').split(' ');
var id=clas[2];	
	if(confirm("Are you sure you want to Interviewed ?")){
		$.ajax({
				type:"POST",
				url:"employer_job_inc.php",
				data:"action=candidatecontact&&id="+id,
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
            <th> Interviewed </th>
			<th> Feedback </th>
          </tr>
        </thead>
        <tbody>
        <?php
            $result=$conn->query("select * from job_student_job_interest where employer_registraion_id='$registration_id' and employer_acceptance='Y'");
            $num=$result->num_rows;
			while($row=$result->fetch_assoc()){
			$candidate_interviewed=$row['candidate_interviewed'];
			$candidate_offered=$row['candidate_offered'];
			$post_date=$row['post_date'];
			$date=date('d-m-Y',strtotime($post_date));							
        ?>
          <tr>
			<td data-title="Date"><?php echo $date;?></td>
            <td data-title="Jobcode"><?php echo getJobDetails($conn,$row['job_id'],'job_code');?></td>
            <td data-title="Candidate Name"><a href="candidate_trainer_profile.php?registration_id=<?php echo $row['registration_id'];?>"><?php echo getUserName($conn,$row['registration_id']);?></a></td>
            <td data-title="Contact"><?php echo getUserMobile($conn,$row['registration_id']);?></td>
            <!--<td data-title="JobbReady Score">85%</td>-->
            <!--<td data-title=""><a href="#">Contacted</a></td>-->
			<td data-title=""><?php if($candidate_interviewed == "Y") { ?><a href="#" class="contact">Interviewed</a><?php } else { ?><a href="#" class="contact candidatecontact <?php echo $row['id'];?>">Contact</a> <?php } ?>			</td>
			<td data-title="offer" align="center" ><?php if($candidate_offered == "Y") { ?><!--<a href="#" class="feedback_icon" ><img src="images/active.png" border="0" title="Feedback Done"/></a>--><?php } else { ?><a class="feedback_icon fancybox fancybox.ajax fade" href="employer_offered_inc.php?uid=<?php echo $row['id'];?>"><img src="images/feedback_icon.png" border="0" title="Give Feedback"/></a> <?php } ?> <a class="feedback_icon fancybox fancybox.ajax fade" href="view_feedback.php?employer_registraion_id=<?php echo $row['employer_registraion_id'];?>&candidate_id=<?php echo $row['registration_id'];?>"  class="feedback_icon" ><img src="images/view_icon.png" /> </a>  </td>
			<!--<td data-title="Offer"><a class="fancybox fancybox.ajax fade" href="employer_offered_inc.php?uid=<?php echo $row['id'];?>">Offer</a></td>-->
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