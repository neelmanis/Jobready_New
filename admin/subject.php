<?php include('header.php');?>
<?php
$action=$_REQUEST['action'];
$getid=$_REQUEST['id'];
$status=$_REQUEST['status'];
if (($action=='active') && ($getid!=''))
{
$sqly="UPDATE `master_subject_list` SET `modified_date`=NOW(),`status`='$status' where id='$getid'";
$active_result = mysql_query($sqly)or die(mysql_error());
if($active_result)
{ header('location:subject.php'); } else {  die('Error: ' . mysql_error()); }
} 
?>

<div class="container">
<div class="margin-top">
<div class="row">	
<div class="span12">	
<div class="alert alert-info">Subject List For Online Examination </div>
<a href="subject_add.php" ><i class="fa fa-plus"></i>&nbsp;<strong>Add Subject</strong></a>
<table cellpadding="0" cellspacing="0" border="0" class="table  table-bordered" id="example">
<thead>
<tr>
<th>ID</th>                                            
<th>Subject</th>  
<th>Based On</th>  
<th>Duration (In Sec)</th>  
<th>Limit</th>                                                                
<th>Action</th>
</tr>
</thead>
<tbody>

<?php 
$userx="SELECT `id`, `subject`,`is_compulsory`,`duration`,`limit`, `status` FROM `master_subject_list` WHERE 1";
$result = mysql_query($userx)or die(mysql_error());
while($row=mysql_fetch_array($result)){
//print_r($row);
$getid=$row['id']; 
$is_com=$row['is_compulsory'];
?>

<tr>
<td><?php echo $getid; ?></td>                             
<td><?php echo $row['subject']; ?></td>
<td><?php if($is_com == 1) {echo 'Compulsory'; } else { echo 'Interest';} ?></td>
<td><?php echo $row['duration']; ?></td>
<td><?php echo $row['limit']; ?></td>
<?php $status=$row['status']; ?>				  

<td width="200">
<?php if($status == 1) { ?> <a href="subject.php?id=<?php echo $getid; ?>&status=0&action=active" onClick="return(window.confirm('Are you sure you want to Deactivate.'));" class="btn btn-success">Active</a><?php } else { ?><a  href="subject.php?id=<?php echo $getid; ?>&status=1&action=active" onClick="return(window.confirm('Are you sure you want to Activate.'));" class="btn btn-warning">Inactive</a><?php } ?>
&nbsp;<a title="View" href="subject_edit.php?uid=<?php echo $getid;?>" class="btn btn-info">Edit</a> 
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