<?php
include("header.php");
$registration_id=$_SESSION['registration_id'];
if(!isset($_SESSION['registration_id']) || actor_type($conn,$registration_id)!="F")
		header('location:index.php');
include("menu.php");
?>
<!-- -------------------------------- container starts ------------------------------ -->
<script type="text/javascript">
$(document).ready(function() {
    $('#example').DataTable({
    "bLengthChange": false,
	"iDisplayLength": 10
	});	
});
</script>

<script src="js/jquery.dataTables.min.js"></script>
<link rel="stylesheet" type="text/css" href="css/jquery.dataTables.min.css"/>
<div class="page_title"><span>welcome <?php echo getUserName($conn,$registration_id);?></span></div>
<div class="inner_conainer" >
  <?php include("employer_dashboard_link.php");?>
  <div class="dashboard_right fade_anim">
    <div class="table_job" id="no-more-tables-job">
      <div class="clear"></div>
      <table class="table-bordered-job table-striped table-condensed-job cf" id="example">
        <thead>
          <tr>
			<th width="12%"> Date </th>
            <th width="15%"> Training Category </th>
            <th width="23%"> Title</th>
			<th width="23%"> Trainer Email</th>
            <th width="40%"> Brief Description</th>
            <th width="19%"> Contact</th>
          </tr>
        </thead>   
          <tbody>
        <?php 
			/*..............................Further Training List....................................*/
			$user_interest=getUserInterest($conn,$registration_id);
			$result1=$conn->query("SELECT * FROM `job_training_list` WHERE admin_id!=0 and status=1");
			while($row1=$result1->fetch_assoc()){
				$mail=getAdminEmail($conn,$row1['admin_id']);
				$post_date=$row1['post_date'];
				$date=date('d-m-Y',strtotime($post_date));
		?>
          <tr>
			<td data-title="Date"><?php echo $date;?></td>
            <td data-title="Training Category"><?php echo getInterest($conn,$row1['area_of_interest']);?></td>
            <td data-title="Name of the Program"><?php echo $row1['title'];?></td>
			<td data-title="Email"><?php echo $mail;?></td>
            <td data-title="Brief Description"><?php echo $row1['description'];?></td>
			<!--<td data-title=""><a class="fancybox enquiry fade" href="#inline2">
			<input type="button" value="Contact"></a></td>-->
			<td data-title="Edit"><a class="fancybox fancybox.ajax fade" href="contact_jobready_training.php?id=<?php echo $row1['admin_id'];?>">Contact</a></td>
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