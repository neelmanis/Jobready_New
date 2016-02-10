<?php include('header.php');?>
<?php
function getaoi($getid)
{
	$query=mysql_query("SELECT `area_of_interest` FROM `master_interest_area` WHERE id='$getid'");
	$result=mysql_fetch_array($query);
	return $result['area_of_interest'];
}
function getCityName($getid)
{
	$sql = mysql_query("SELECT  city FROM  master_city  where id='$getid'");	
	$result = mysql_fetch_array($sql);
	return $result['city'];					
}
?>

<?php
$action=$_REQUEST['action'];
$getid=$_REQUEST['id'];
$status=$_REQUEST['status'];
if (($action=='active') && ($getid!=''))
{
$neelx="UPDATE `master_job` SET `modified_date`=NOW(),`status`='$status' where id='$getid'";
$active_result = mysql_query($neelx)or die(mysql_error());
if($active_result)
{ header('location:manage_job.php'); } else {  die('Error: ' . mysql_error()); }
}
?>

<div class="container">
<div class="margin-top">
<div class="row">	
<div class="span12">	
<div class="alert alert-info">Manage Company Job </div>
<!--<a href="manage_job_add.php" ><i class="fa fa-plus"></i>&nbsp;<strong>Add Job</strong></a>-->
<table cellpadding="0" cellspacing="0" border="0" class="table  table-bordered" id="example">
<thead>
<tr>
<th>ID</th>                                            
<th>Job Code</th>
<th>Designation</th>
<th>Salary From (Rs.)</th>
<th>Salary To (Rs.)</th>
<th>Job From</th>
<th>Reporting To</th>
<th>Interest Area</th>
<th>Location</th>                                                             
<th>Action</th>
</tr>
</thead>

<tbody>
<?php 
$neelx="SELECT `id`, `job_code`, `designation`, `salary_from`, `salary_to`, `job_from`, `job_to`, `area_of_interest`, `job_location`, `status` FROM `master_job` WHERE 1";
$result = mysql_query($neelx)or die(mysql_error());
while($row=mysql_fetch_array($result)){
//print_r($row);
$getid=$row['id'];
$aoiID=$row['area_of_interest'];
?>

<tr>
<td><?php echo $getid; ?></td>                              
<td><?php echo $row['job_code']; ?></td>
<td><?php echo $row['designation']; ?></td>
<td><?php echo $row['salary_from']; ?></td>
<td><?php echo $row['salary_to']; ?></td>
<td><?php echo $row['job_from']; ?></td>
<td><?php echo $row['job_to']; ?></td>
<td><?php echo getaoi($aoiID); ?></td>
<td><?php echo getCityName($row['job_location']); ?></td>
<?php $status=$row['status']; ?>			  

<td width="130">
<?php if($status == 1) { ?> <a href="manage_job.php?id=<?php echo $getid; ?>&status=0&action=active" onClick="return(window.confirm('Are you sure you want to Deactivate.'));" class="btn btn-success">Active</a><?php } else { ?><a  href="manage_job.php?id=<?php echo $getid; ?>&status=1&action=active" onClick="return(window.confirm('Are you sure you want to Activate.'));" class="btn btn-warning">Inactive</a><?php } ?>
&nbsp;<a title="View" href="manage_job_edit.php?uid=<?php echo $getid;?>" class="btn btn-info">Edit</a> 
</td>									
</tr>
<?php  }  ?>                           
</tbody>
</table>
</div>		
</div>
</div>
</div>
<?php include('footer.php') ?>