<?php
include('header.php'); 
//echo "---><br/>".$username.$gotuid;
?>

<?php
$action=$_REQUEST['action'];
$getid=$_REQUEST['id'];
$status=$_REQUEST['status'];

if (($action=='active') && ($getid!=''))
{
$sqly="UPDATE `master_events_list` SET `modified_date`=NOW(),`status`='$status' where id='$getid'";
$active_result = mysql_query($sqly)or die(mysql_error());
if($active_result)
{ header('location:events.php'); } else {  die('Error: ' . mysql_error()); }
} 
?>

<div class="container">
<div class="margin-top">
<div class="row">	
<div class="span12">	
<div class="alert alert-info">Events </div>
<a href="events_add.php" ><i class="fa fa-plus"></i>&nbsp;<strong>Add Events</strong></a>
<table cellpadding="0" cellspacing="0" border="0" class="table  table-bordered" id="example">
<thead>
<tr>
<th>ID</th>                                            
<th width="100">Events Date</th> 
<th width="100">Title</th> 
<th>Description</th>  
<th>Type</th>                                                                
<th>Action</th>
</tr>
</thead>
<tbody>
							 
<?php 
$neelx="SELECT `id`, `events_date`, `title`, `desc`,`type`, `status` FROM `master_events_list` WHERE 1";
$result = mysql_query($neelx)or die(mysql_error());
while($row=mysql_fetch_array($result)){
//print_r($row);
$getid=$row['id'];
$desc=$row['desc'];
/*************************** Limit character ***/
$limit=60;
$post = substr($desc, 0, $limit); 
?>
<tr>
<td><?php echo $getid; ?></td>                              
<td ><?php echo $row['events_date']; ?></td>
<td ><?php echo $row['title']; ?></td>
<td><?php echo $post; ?></td>
<td width="50"><?php echo $row['type']; ?></td>
<?php $status=$row['status']; ?>
						  
<td width="150">
 <?php if($status == 1) { ?> <a href="events.php?id=<?php echo $getid; ?>&status=0&action=active" onClick="return(window.confirm('Are you sure you want to Deactivate.'));" class="btn btn-success">Active</a><?php } else { ?><a  href="events.php?id=<?php echo $getid; ?>&status=1&action=active" onClick="return(window.confirm('Are you sure you want to Activate.'));" class="btn btn-warning">Inactive</a><?php } ?>
 <?php /* if($status==0)
 { echo '<button type="button" class="btn btn-danger">Inactive</button>';
 }else{ echo '<button type="button" class="btn btn-success">Active</button>';} */ ?>
&nbsp;<a title="View" href="events_edit.php?uid=<?php echo $getid;?>" class="btn btn-info">Edit</a> 
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