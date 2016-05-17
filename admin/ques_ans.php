<?php 
include('header.php');  
?>
<?php
$action=$_REQUEST['action'];
$getid=$_REQUEST['id'];
$status=$_REQUEST['status'];

if (($action=='active') && ($getid!=''))
{
$neelx="UPDATE `cms_quest_ans` SET `modified_date`=NOW(),`status`='$status' where id='$getid'";
$active_result = mysql_query($neelx)or die(mysql_error());
if($active_result)
{ header('location:ques_ans.php'); } else {  die('Error: ' . mysql_error()); }
}
?>
<div class="container">
<div class="margin-top">
<div class="row">	
<div class="span12">	
<div class="alert alert-info">Question & Answer </div>
<a href="ques_ans_add.php" ><i class="fa fa-plus"></i>&nbsp;<strong>Add Question & Answer</strong></a>
<table cellpadding="0" cellspacing="0" border="0" class="table  table-bordered" id="example">
<thead>
<tr>
<th>ID</th>                                            
<th>Questions</th>
<!--<th>Answer</th>-->                                      
<th>Action</th>
</tr>
</thead>
<tbody>
<?php 
$neelx="SELECT `id`, `question`,`true_ans`, `status` FROM `cms_quest_ans` WHERE 1";
$result = mysql_query($neelx)or die(mysql_error());
while($row=mysql_fetch_array($result)){
//print_r($row);
$id=$row['id']; 
?>
<tr>
<td><?php echo $id; ?></td>                              
<td><?php echo preg_replace("/(<br\s*\/?>\s*)+/", '',$row['question']);?>
<!--<?php echo $row['question']; ?>--></td>
<!--<td><?php echo $row['true_ans']; ?></td>-->
<?php $status=$row['status']; ?>
<td width="150">
<?php if($status == 1) { ?> <a href="ques_ans.php?id=<?php echo $id; ?>&status=0&action=active" onClick="return(window.confirm('Are you sure you want to Deactivate.'));" class="btn btn-success">Active</a><?php } else { ?><a  href="ques_ans.php?id=<?php echo $id; ?>&status=1&action=active" onClick="return(window.confirm('Are you sure you want to Activate.'));" class="btn btn-warning">Inactive</a><?php } ?>
&nbsp;<a title="View" href="ques_ans_edit.php?uid=<?php echo $id;?>" class="btn btn-info">Edit</a> 
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