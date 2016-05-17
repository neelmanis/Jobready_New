<?php 
include('header.php');  
//echo "---><br/>".$username.$gotuid;
?>

<?php
function getSubject($getid)
{ //Query For getting Subject
$query=mysql_query("SELECT `subject` FROM `master_subject_list` WHERE id='$getid'");
$result=mysql_fetch_array($query);
return $result['subject'];
}
?>

<?php
$action=$_REQUEST['action'];
$getid=$_REQUEST['id'];
$status=$_REQUEST['status'];

if (($action=='active') && ($getid!=''))
{
echo $neelx="UPDATE `master_general_question` SET `modified_date`=NOW(),`status`='$status' where id='$getid'";
$active_result = mysql_query($neelx)or die(mysql_error());
if($active_result)
{ header('location:general_question.php'); } else {  die('Error: ' . mysql_error()); }
}
?>

<div class="container">
<div class="margin-top">
<div class="row">	
<div class="span12">	
<div class="alert alert-info">Manage Question </div>
<a href="general_question_add.php" ><i class="fa fa-plus"></i>&nbsp;<strong>Add Question</strong></a>

<table cellpadding="0" cellspacing="0" border="0" class="table  table-bordered" id="example">
<thead>
<tr>
<th>ID</th>                                            
<th>Question</th>
<th>Subject</th>
<th>Marks</th>                                                          
<th>Action</th>
</tr>
</thead>
<tbody>
								 
<?php 
$neelx="SELECT `id`,`sub_id`, `question`,`marks`,`duration`, `status` FROM `master_general_question` WHERE 1";
$result = mysql_query($neelx)or die(mysql_error());
while($row=mysql_fetch_array($result)){
//print_r($row);
$getid=$row['id'];
$sub_id=$row['sub_id']; 
?>
<tr>
<td><?php echo $getid; ?></td>                              
<td><?php echo $row['question']; ?></td>
<td><?php echo getSubject($sub_id); ?></td>
<td><?php echo $row['marks']; ?></td>
<!--<td><?php echo $row['duration']; ?></td>-->
<?php $status=$row['status']; ?>
						  
<td width="200">
<?php if($status == 1) { ?> <a href="general_question.php?id=<?php echo $getid; ?>&status=0&action=active" onClick="return(window.confirm('Are you sure you want to Deactivate.'));" class="btn btn-success">Active</a><?php } else { ?><a  href="general_question.php?id=<?php echo $getid; ?>&status=1&action=active" onClick="return(window.confirm('Are you sure you want to Activate.'));" class="btn btn-warning">Inactive</a><?php } ?>
&nbsp;<a title="View" href="general_question_edit.php?uid=<?php echo $getid;?>" class="btn btn-info">Edit</a> 
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