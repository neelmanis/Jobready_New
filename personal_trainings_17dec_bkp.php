<?php include("header.php");?>
<?php include("menu.php");?>
<?php $registration_id=$_SESSION['registration_id'];?>
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
$('.showinterest').live('click',function(){
var clas=$(this).attr('class').split(' ');
var training_id=clas[1];
var trainer_registraion_id=clas[2];
var registration_id=clas[3];	
	if(confirm("Are you sure you want to show interest?")){
		$.ajax({
				type:"POST",
				url:"training_inc.php",
				data:"action=showinterest&&training_id="+training_id+"&&trainer_registraion_id="+trainer_registraion_id+"&&registration_id="+registration_id,
				dataType:"JSON",
				success:function(data)
				{
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
<script src="js/jquery.dataTables.min.js"></script>
<link rel="stylesheet" type="text/css" href="css/jquery.dataTables.min.css"/>

<div class="page_title"><span>welcome <?php echo getUserName($conn,$registration_id)?></span></div>
<div class="inner_conainer" >
  <?php include("personal_dashboard_link.php");?>
  <div class="dashboard_right fade_anim">
    <div class="content_head">Accepted Training</div>
    <div class="table_main_other" id="no-more-tables-other">
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
            <td data-title="Training Category"><?php echo getInterest($conn,getTrainerDetails($conn,$row['training_id'],'area_of_interest'));?></td>
            <td data-title="Training Name"><?php echo getUserName($conn,getTrainerDetails($conn,$row['training_id'],'registration_id'));?></td>
            <td data-title="Training Brief"><?php echo getTrainerDetails($conn,$row['training_id'],'description');?></td>
            <td data-title="Document"><a href="upload/training_doc/<?php echo $registration_id."/".getTrainerDetails($conn,$row['training_id'],'doc');?>" target="_blank">Download</a></td>
          </tr>
          <?php }?>
        </tbody>
      </table>
      <div class="clear"></div>
    </div>
    <div class="content_head">further training</div>
    <div class="table_main_other" id="no-more-tables-other">
      <div class="clear"></div>
      <table class="table-bordered-other table-striped table-condensed-other cf" id="example1">
        <thead>
          <tr>
            <th> Training Category </th>
            <th> Trainer Name </th>
            <th> Training Brief</th>
            <th> Document </th>
            <th> Action</th>
          </tr>
        </thead>
        <tbody>
        <?php 
			/*..............................Further Training List....................................*/
			$user_interest=getUserInterest($conn,$registration_id);
			$result1=$conn->query("select * from job_training_list where area_of_interest in(".$user_interest.")");
			while($row1=$result1->fetch_assoc()){
		?>
          <tr>
            <td data-title="Training Category"><?php echo getInterest($conn,$row1['area_of_interest']);?></td>
            <td data-title="Training Name"><?php echo getUserName($conn,$row1['registration_id']);?></td>
            <td data-title="Training Brief"><?php echo $row1['description'];?></td>
            <td data-title="Document"><a href="upload/training_doc/<?php echo $registration_id."/".$row1['doc'];?>" target="_blank">Download</a></td>
            <?php 
				$trainer_acceptance=getTrainerAcceptance($conn,$row1['id'],$registration_id);
				if($trainer_acceptance=="Y" || $trainer_acceptance=="P"){
			?>
            <td data-title="Action"><a href="#">Interested</a></td>
            <?php } else {?>
            <td data-title="Action"><a href="#" class="showinterest <?php echo $row1['id']." ".$row1['registration_id']." ".$registration_id;?>">Show Interest</a></td>
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
<!-- -------------------------------- footer starts ------------------------------ -->
<div class="footer_wrap">
  <div class="footer">
    <div class="copyright">© 2015 JobbReady.com</div>
    <div class="kweb"><a href="http://kwebmaker.com/" target="_blank">K Webmaker™</a></div>
  </div>
  <div class="clear"></div>
</div>
<!-- -------------------------------- footer ends ------------------------------ -->
</body>
</html>
