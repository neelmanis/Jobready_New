<?php include("header.php");?>
<?php include("menu.php");?>
<?php 
	$registration_id=$_SESSION['registration_id'];
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
            <th width="18%"> Training Category </th>
            <th width="23%"> Trainer Name</th>
            <th width="40%"> Brief Description</th>
            <th width="19%"> </th>
          </tr>
        </thead>
        
          <tbody>
        <?php 
			/*..............................Further Training List....................................*/
			$user_interest=getUserInterest($conn,$registration_id);
			$result1=$conn->query("SELECT * FROM `job_training_list` WHERE admin_id!=0 and status=1");
			while($row1=$result1->fetch_assoc()){
		?>
          <tr>
            <td data-title="Training Category"><?php echo getInterest($conn,$row1['area_of_interest']);?></td>
            <td data-title="Name of the Program"><?php echo getAdminName($conn,$row1['admin_id']);?></td>
            <td data-title="Brief Description"><?php echo $row1['description'];?></td>
			<td data-title=""><a href="#" class="contact">contact</a></td>
                        
			
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
