<?php include("header.php");?>
<?php include("menu.php");?>
<?php $registration_id=$_SESSION['registration_id'];$result=$conn->query("select F.*, I.* from master_feedback F,job_training_list T  where F.registration_id='$registration_id' and F.trainer_id=T.registration_id");$num=$result->num_rows;
?>
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
<script type="text/javascript">
$(document).ready(function(){
$('a.enquiry').on('click',function(e){
	e.preventDefault();
	$('input[name=trainerID]').val($(this).attr('data-trainer'));	
})
$("form" ).on( "submit", function( event ) {
  event.preventDefault();
  var data = $(this).serialize();
  $.ajax({
		  type:"POST",
		  url:"feedback_inc.php",
		  data: data,
		  dataType:"JSON",
		  success:function(data)
			{
				window.location.href=data.url;
			}
		});
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
            
            <td data-title="Training Name" align="center">
            <a data-trainer='<?php echo getTrainerDetails($conn,$row['training_id'],'registration_id') ?>' class="fancybox enquiry fade" href="#inline2"><?php echo getUserName($conn,getTrainerDetails($conn,$row['training_id'],'registration_id'));?></a></td>
            
            <td data-title="Training Brief" align="center"><?php echo getTrainerDetails($conn,$row['training_id'],'description');?></td>
            <td data-title="Document" align="center"><a href="upload/training_doc/<?php echo $registration_id."/".getTrainerDetails($conn,$row['training_id'],'doc');?>" target="_blank">Download</a></td>
          </tr>
          <?php }?>
        </tbody>
      </table>
      <div class="clear"></div>
    </div>
    <div class="content_head">further training</div>
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
            $result=$conn->query("select * from job_student_training_interest where registration_id='$registration_id'");
            while($row=$result->fetch_assoc()){
        ?>
          <tr>
            <td data-title="Training Category" align="center"><?php echo getInterest($conn,getTrainerDetails($conn,$row['training_id'],'area_of_interest'));?></td>
            
            <td data-title="Training Name" align="center">
            <a data-trainer='<?php echo getTrainerDetails($conn,$row['training_id'],'registration_id') ?>' class="fancybox enquiry fade" href="#inline2"><?php echo getUserName($conn,getTrainerDetails($conn,$row['training_id'],'registration_id'));?></a></td>
            
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
<div class="ad_banner"><a href="#"><img src="images/ad_banner.jpg" alt="" /></a></div>
<?php include("footer.php");?>
</body>
</html>
