<?php 
include('header.php');  
?>

<?php
function getSubject($getid)
{ //Query For getting Area Of Interest
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
echo $neelx="UPDATE `master_interest_question` SET `modified_date`=NOW(),`status`='$status' where id='$getid'";
$active_result = mysql_query($neelx)or die(mysql_error());
if($active_result)
{ header('location:question_interest.php'); } else {  die('Error: ' . mysql_error()); }
}
?>

<div class="container">
<div class="margin-top">
<div class="row">	
<div class="span12">	
<div class="alert alert-info">Interest Based Question </div>
<!--
<div class="alert alert-info">
Finance <span class="badge badge-warning">4</span> | 
Banking <span class="badge badge-warning">4</span> |
Insurance <span class="badge badge-warning">4</span> |
Marketing <span class="badge badge-warning">4</span> |
IT <span class="badge badge-warning">4</span> |
HR <span class="badge badge-warning">4</span> |
Media <span class="badge badge-warning">4</span> 
</div>-->

<a href="question_interest_add.php" ><i class="fa fa-plus"></i>&nbsp;<strong>Add Interest Based Question</strong></a>
<table cellpadding="0" cellspacing="0" border="0" class="table  table-bordered" id="example">
<thead>
<tr>
<th>ID</th>                                            
<th>Question</th>
<th>Subject</th>
<th>Marks</th>   
<!--<th>Duration</th>   -->                                                          
<th>Action</th>
</tr>
</thead>
<tbody>
								 
<?php 
$neelx="SELECT `id`, `sub_id`, `question`, `marks`, `duration`, `status` FROM `master_interest_question` WHERE 1";
$result = mysql_query($neelx)or die(mysql_error());
while($row=mysql_fetch_array($result)){
//print_r($row);
$id=$row['id']; 
$sub_id=$row['sub_id']; 
?>
<tr>
<td><?php echo $id; ?></td>                              
<td><?php echo $row['question']; ?></td>
<td><?php echo getSubject($sub_id); ?></td>
<td><?php echo $row['marks']; ?></td>
<!--<td><?php echo $row['duration']; ?></td>-->
<?php $status=$row['status']; ?>
						  
<td width="200">
<?php if($status == 1) { ?> <a href="question_interest.php?id=<?php echo $id; ?>&status=0&action=active" onClick="return(window.confirm('Are you sure you want to Deactivate.'));" class="btn btn-success">Active</a><?php } else { ?><a  href="question_interest.php?id=<?php echo $id; ?>&status=1&action=active" onClick="return(window.confirm('Are you sure you want to Activate.'));" class="btn btn-warning">Inactive</a><?php } ?>

&nbsp;<a title="View" href="question_interest_edit.php?uid=<?php echo $id;?>" class="btn btn-info">Edit</a> 
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