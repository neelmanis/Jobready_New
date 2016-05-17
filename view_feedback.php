<?php
session_start();
ob_start();
include('db.inc.php');
include('functions.php');
$employer_registraion_id=$_GET['employer_registraion_id'];
$registration_id=$_GET['candidate_id'];
?>
<!-- -------------------------------- container starts ------------------------------ -->
<?php
$emp_refid=getReferenceId($conn,$employer_registraion_id);
$result=$conn->query("select job_id,employer_registraion_id,registration_id,comment,comment_date from job_student_job_interest where employer_registraion_id in (select id from job_registration where (id='$emp_refid' or refer_registration_id='$emp_refid')) and registration_id ='$registration_id' and comment!=''");
?>

<div class="add_training" style="min-width: 320px;">
<div class="pop_head">Feedback (<?php echo getUserName($conn,$registration_id);?>)</div> 

<table class="table-bordered-job table-striped table-condensed-job cf dataTable no-footer">
<thead bgcolor="black" style="color: #fff;padding-bottom: 10px;">
<th align="center">Job Code</th>
<th align="center">Recruiter Name</th>
<th align="center">Date</th>
<td align="center" colspan="2">Comment</td>
</thead>
<?php
while($row=$result->fetch_assoc()){
$comment=$row['comment'];
if(!empty($comment)){ ?>
<tr>
<td align="center"><?php echo getJobDetails($conn,$row['job_id'],'job_code');?></td>
<td align="center"><?php echo getUserName($conn,$row['employer_registraion_id']);?></td>
<td align="center"><?php echo $row['comment_date'];?></td>
<td align="center"><?php echo $comment;?></td>
</tr>
<?php } else {?>
<div id="job-up" class="paginate_feed"><p> &nbsp; No Feedback</p></div>
<?php }}?>
<div class="clear"></div>
</table>
</div>
<!-- -------------------------------- container ends ------------------------------ -->
</body>
</html>