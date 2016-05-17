<?php include('header.php');?>
<?php
function getaoi($getid)
{
	$query=mysql_query("SELECT `area_of_interest` FROM `master_interest_area` WHERE id='$getid'");
	$result=mysql_fetch_array($query);
	return $result['area_of_interest'];
}
?>

<?php
$action=$_REQUEST['action'];
$getid=$_REQUEST['id'];
$status=$_REQUEST['status'];
if (($action=='active') && ($getid!=''))
{
$neelx="UPDATE `job_training_list` SET `modified_date`=NOW(),`status`='$status' where id='$getid'";
$active_result = mysql_query($neelx)or die(mysql_error());
if($active_result)
{ header('location:training_offered_jobready.php'); } else {  die('Error: ' . mysql_error()); }
}
?>

<div class="container">
<div class="margin-top">
<div class="row">	
<div class="span12">	
<div class="alert alert-info">Trainings Offered By JobbReady</div>
<a href="training_add_jready.php" ><i class="fa fa-plus"></i>&nbsp;<strong>Add Training</strong></a>
<table cellpadding="0" cellspacing="0" border="0" class="table  table-bordered" id="example">
<thead>
<tr>
<th>ID</th>                                            
<th>Training Category</th>
<th>Title</th>
<th>Description</th>
<th>Date</th>                                                             
<th>Action</th>
</tr>
</thead>
<tbody>				 

<?php 
$neelx="SELECT `id`, `area_of_interest`, `title`,`description`, `doc`, `post_date`, `status` FROM `job_training_list` WHERE 1";
$result = mysql_query($neelx)or die(mysql_error());
while($row=mysql_fetch_array($result)){
$getid=$row['id'];
$aoiID=$row['area_of_interest'];
?>

<tr>
<td><?php echo $getid; ?></td>                              
<td><?php echo getaoi($aoiID); ?></td>
<td><?php echo $row['title']; ?></td>
<td><?php echo preg_replace("/(<br\s*\/?>\s*)+/", '',$row['description']); ?></td>
<!--<td><?php echo $row['description']; ?></td>-->
<td><?php echo $row['post_date']; ?></td>
<?php $status=$row['status']; ?>	  
<td width="130">
<?php if($status == 1) { ?> <a href="training_offered_jobready.php?id=<?php echo $getid; ?>&status=0&action=active" onClick="return(window.confirm('Are you sure you want to Deactivate.'));" class="btn btn-success">Active</a><?php } else { ?><a  href="training_offered_jobready.php?id=<?php echo $getid; ?>&status=1&action=active" onClick="return(window.confirm('Are you sure you want to Activate.'));" class="btn btn-warning">Inactive</a><?php } ?>
&nbsp;<a title="View" href="training_edit_jready.php?uid=<?php echo $getid;?>" class="btn btn-info">Edit</a> 
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