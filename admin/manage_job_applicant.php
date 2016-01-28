<?php
include('header.php');

function getUserName($id)
{
$sql = mysql_query("SELECT  fname FROM  job_profile  where registration_id='$id'");	
$result = mysql_fetch_array($sql);
return $result['fname'];				
}
function getcv($id)
{
$sqlx = mysql_query("SELECT  upload_cv FROM  job_profile  where registration_id='$id'");	
$results = mysql_fetch_array($sqlx);
return $results['upload_cv'];				
}
?>
<?php
$action=$_REQUEST['action'];
$id=$_REQUEST['id'];
$status=$_REQUEST['status'];

if(($action=='active') && ($id!=''))
{
$sqx="UPDATE `job_student_job_interest` SET `modified_date`=NOW(),`employer_acceptance`='$status' where id='$id'";
$result = mysql_query($sqx)or die(mysql_error());
if($result)
{ header('location:manage_job_applicant.php'); } else {  die('Error: ' . mysql_error()); }
}
?>

<div class="container">
<div class="margin-top">
<div class="row">	
<div class="span12">	
<div class="alert alert-info">Manage Job Applicants</div>
<table cellpadding="0" cellspacing="0" border="0" class="table table-bordered" id="example">
<thead>
<tr>
<th>ID</th>                                            
<th>User</th>
<th>CV</th>
<th>Action</th>
</tr>
</thead>
<tbody>
<?php 
$sqlx="SELECT * FROM `job_student_job_interest` WHERE `admin_id`!=0";
$result = mysql_query($sqlx)or die(mysql_error());
while($row=mysql_fetch_array($result)){
$id=$row['id'];
$registration_id=$row['registration_id'];
$employer_acceptance=$row['employer_acceptance'];
?>
<tr>
<td><?php echo $id; ?></td>                              
<td><?php echo getUserName($registration_id); ?></td>
<td><a href="../upload/cv/<?php echo $registration_id;?>/<?php echo getcv($registration_id); ?>">Download</a></td>
<td width="130">
<?php if($employer_acceptance == "Y") { ?><a href="#" class="btn btn-success">Accepted</a><?php } else { ?><a href="manage_job_applicant.php?id=<?php echo $id; ?>&status=Y&action=active" onClick="return(window.confirm('Are you sure you want to Accept.'));" class="btn btn-warning">Accept</a><?php } ?>
</td>									
</tr>
<?php } ?>                           
</tbody>
</table>
</div>		
</div>
</div>
</div>
<?php include('footer.php') ?>