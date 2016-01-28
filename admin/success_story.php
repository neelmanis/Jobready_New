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
$sqly="UPDATE `master_success_story` SET `modified_date`=NOW(),`status`='$status' where id='$getid'";
$active_result = mysql_query($sqly)or die(mysql_error());
if($active_result)
{ header('location:success_story.php'); } else {  die('Error: ' . mysql_error()); }
} 
?>

<div class="container">
<div class="margin-top">
<div class="row">	
<div class="span12">	
<div class="alert alert-info">Success Story </div>
<a href="success_story_add.php" ><i class="fa fa-plus"></i>&nbsp;<strong>Add Story</strong></a>

<table cellpadding="0" cellspacing="0" border="0" class="table  table-bordered" id="example">
<thead>
<tr>
<th>ID</th>                                            
<th width="100">Post Date</th> 
<th width="100">Name</th> 
<th>Description</th>                                                       
<th>Action</th>
</tr>
</thead>
<tbody>
							 
<?php 
$neelx="SELECT `id`, `post_date`,`title`, `desc`, `status` FROM `master_success_story` WHERE 1";
$result = mysql_query($neelx)or die(mysql_error());
while($row=mysql_fetch_array($result)){
//print_r($row);
$getid=$row['id'];
$title=$row['title'];
$desc=$row['desc'];
/*************************** Limit character ***/
$limit=60;
$post = substr($desc, 0, $limit); 
?>
<tr>
<td><?php echo $getid; ?></td>                              
<td ><?php echo $row['post_date']; ?></td>
<td ><?php echo $row['title']; ?></td>
<td><?php echo $post; ?></td>
<?php $status=$row['status']; ?>
						  
<td width="150">
 <?php if($status == 1) { ?> <a href="success_story.php?id=<?php echo $getid; ?>&status=0&action=active" onClick="return(window.confirm('Are you sure you want to Deactivate.'));" class="btn btn-success">Active</a><?php } else { ?><a  href="success_story.php?id=<?php echo $getid; ?>&status=1&action=active" onClick="return(window.confirm('Are you sure you want to Activate.'));" class="btn btn-warning">Inactive</a><?php } ?>
&nbsp;<a title="View" href="success_story_edit.php?uid=<?php echo $getid;?>" class="btn btn-info">Edit</a> 
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