<?php include("header.php");
$registration_id=$_SESSION['registration_id'];
if(!isset($_SESSION['registration_id']) || actor_type($conn,$registration_id)!="F")header('location:index.php');?>
<?php include("menu.php");?>
<!-- -------------------------------- container starts ------------------------------ -->
<?php
$action=$_REQUEST['action'];
$getid=$_REQUEST['id'];
$status=$_REQUEST['status'];

if (($action=='active') && ($getid!=''))
{
//echo $getjob="select registration_id from master_job where registration_id='$getid'"; exit;
$getjob=$conn->query("select registration_id from master_job where registration_id='$getid'");
$num=$getjob->num_rows;
if($num > 0)
{ echo '<script language="javascript">';
	echo 'alert("Recruiter has some Job. Please Transfer job")';
	echo '</script>';
}else{
$result=$conn->query("UPDATE `job_registration` SET `modified_date`=NOW(),`status`='$status' where id='$getid'");
if($result)
{ header('location:employer_recruiter_listing.php'); } else {  die('Error: ' . mysql_error()); }
} }
?>

<div class="page_title"><span>welcome <?php echo getUserName($conn,$registration_id)?></span></div>
<div class="inner_conainer" >
  <?php include("employer_dashboard_link.php");?>
  <div class="dashboard_right fade_anim">
    <div class="content_head"><a class="fancybox fancybox.ajax fade" href="recruiter_form.php">add recruiter</a> | <a class="fancybox fancybox.ajax fade" href="transfer_job.php">manage recruiter</a></div> 
    <!--<div class="content_head"><a class="fancybox fancybox.ajax fade" href="transfer_job.php">Transfer job</a></div>-->
    <div class="table_job" id="no-more-tables-job">
      <div class="clear"></div>
      <table class="table-bordered-job table-striped table-condensed-job cf">
        <thead>
          <tr>
		    <th> Date </th>
            <th> Name </th>
            <th> Email ID</th>
            <th> Mobile No</th>
            <th> Designation</th>
            <th> Action</th>
          </tr>
        </thead>
        <tbody>
          <?php 
            /*..............................Recruiter List....................................*/
            $result=$conn->query("select * from job_registration where refer_registration_id='$registration_id'");
            while($row=$result->fetch_assoc()){
				$post_date=$row['post_date'];
				$date=date('d-m-Y',strtotime($post_date));
				$status=$row['status'];
        ?>
          <tr>
		    <td data-title="Date"><?php echo $date;?></td>
            <td data-title="Name"><?php echo getUserName($conn,$row['id']);?></td>
            <td data-title="Email ID"><?php echo $row['email'];?></td>
            <td data-title="Mobile"><?php echo $row['mobile_no'];?></td>
            <td data-title="Designation"><?php echo getDesignation($conn,$row['id']);?></td>
            <td data-title="Edit">
			<a class="fancybox fancybox.ajax fade left" href="recruiter_form.php?registration_id=<?php echo $row['id'];?>"><img src="images/edit_icon.png" /></a>
			
			<?php if($status == 1) { ?> <a href="employer_recruiter_listing.php?id=<?php echo $row['id']; ?>&status=0&action=active" onClick="return(window.confirm('Are you sure you want to Deactivate.'));" class="btn btn-success"><img src="images/active.png" border="0" title="Active"/></a><?php } else { ?><a  href="employer_recruiter_listing.php?id=<?php echo $row['id']; ?>&status=1&action=active" onClick="return(window.confirm('Are you sure you want to Activate.'));" class="btn btn-warning left"><img src="images/inactive.png" border="0" title="Inactive"/></a><?php } ?>
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
<!-- -------------------------------- footer starts ------------------------------ -->
<?php include("footer.php");?>
<!-- -------------------------------- footer ends ------------------------------ -->
</body>
</html>
