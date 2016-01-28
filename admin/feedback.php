<?php
include('header.php'); 
//echo "---><br/>".$username.$gotuid;
?>
<?php
function getUserName($getid)
{
	$sql = "SELECT  fname FROM  job_profile  where id='$getid'";	
	$result = mysql_query($sql);
	$row=mysql_fetch_array($result);
	return $row['fname'];					
}

$action=$_REQUEST['action'];
$getid=$_REQUEST['id'];
$status=$_REQUEST['status'];

if (($action=='active') && ($getid!=''))
{
$sqly="UPDATE `master_feedback` SET `modified_date`=NOW(),`status`='$status' where id='$getid'";
$active_result = mysql_query($sqly)or die(mysql_error());
if($active_result)
{ header('location:feedback.php'); } else {  die('Error: ' . mysql_error()); }
} 

if (($action=='del') && ($getid!=''))
{
	$sqlu="DELETE FROM `master_feedback` WHERE id='$getid'";
	$del_result = mysql_query($sqlu);	
	if($del_result)
	{ header('location:feedback.php'); } else {  die('Error: ' . mysql_error()); }
}
?>

<div class="container">
<div class="margin-top">
<div class="row">	
<div class="span12">	
<div class="alert alert-info">Feedback </div>
<!--<a href="feedback_add.php" ><i class="fa fa-plus"></i>&nbsp;<strong>Add Feedback</strong></a>-->

<table cellpadding="0" cellspacing="0" border="0" class="table  table-bordered" id="example">
<thead>
<tr>
<th>ID</th>                                            
<th><center>Feedback</center></th>
<th width="150">Trainer Name</th>
<th width="150">Trainee Name</th>
<th width="100">Post Date</th>                                                       
<th width="180">Action</th>
</tr>
</thead>
<tbody>
							 
<?php 
$sql="SELECT F.*,P.fname as first_name FROM `master_feedback` F, `job_profile` P WHERE P.registration_id=F.trainer_id GROUP BY F.id DESC";
$result = mysql_query($sql)or die(mysql_error());
while($row=mysql_fetch_array($result)){
//print_r($row);
$getid=$row['id'];
$trainer_name=$row['first_name'];
$trainee_name=getUserName($row['registration_id']);
$trainer_id=$row['trainer_id']; 
?>
<tr>
<td><?php echo $getid; ?></td>                              
<td ><?php echo $row['feed_description']; ?></td>
<td ><?php echo strtoupper($trainer_name); ?></td>
<td ><?php echo strtoupper($trainee_name); ?></td>
<td ><?php echo $row['post_date']; ?></td>
<?php $status=$row['status']; ?>
						  
<td width="150">
 <?php if($status == 1) { ?> <a href="feedback.php?id=<?php echo $getid; ?>&status=0&action=active" onClick="return(window.confirm('Are you sure you want to Deactivate.'));" class="btn btn-success">Active</a><?php } else { ?><a  href="feedback.php?id=<?php echo $getid; ?>&status=1&action=active" onClick="return(window.confirm('Are you sure you want to Activate.'));" class="btn btn-warning">Inactive</a><?php } ?>
&nbsp;
<a href="feedback.php?action=del&id=<?php echo $getid; ?>" onClick="return(window.confirm('Are you sure you want to delete?'));" class="btn btn-danger"> Delete</a> 
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