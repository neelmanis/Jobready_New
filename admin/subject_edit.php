<?php 
include('header.php');
//echo "---><br/>".$username.$gotuid;
$getuid=$_REQUEST['uid'];
?>

<?php
$neelx="SELECT * FROM `master_subject_list` Where `id`= $getuid";
$result = mysql_query($neelx);
while($mysqlrow=mysql_fetch_array($result))
{ //print_r($mysqlrow);
$subject=$mysqlrow['subject'];
$is_compulsory=$mysqlrow['is_compulsory'];
if($is_compulsory=="1"){$comp="selected";}
if($is_compulsory=="0"){$interest_based="selected";}
$duration=$mysqlrow['duration'];
$limit=$mysqlrow['limit'];
$status=$mysqlrow['status'];
if($mysqlrow['status']=="1"){$active="selected";}
if($mysqlrow['status']=="0"){$inactive="selected";}
}
?>

<?php
$savedetails=$_POST['savedetails'];
if($savedetails=='saveapp')
{
$subject=trim(strtoupper($_POST['subject']));
$is_com=trim($_POST['is_com']);
$duration=trim($_POST['duration']);
$limit=trim($_POST['limit']);
$sub_status=trim($_POST['sub_status']);

if(preg_match('/^[0-9 .\-]+$/i', $subject))
{$signup_error= 'Subject Name is not valid';}
else{
$neely="UPDATE `master_subject_list` SET `modified_date`=NOW(),`subject`='$subject',`is_compulsory`='$is_com',`duration`='$duration',`limit`='$limit',`status`='$sub_status' WHERE `id` ='$getuid'"; 
$mysqlresults = mysql_query($neely)or die(mysql_error());
//print $neely;
if($mysqlresults){
header('location:subject.php');
}}}
?>

<div class="container">
<h4 class="page-header">
<span class="glyphicon glyphicon-user"></span>&nbsp;Update Subject <?php if(isset($signup_error)){ echo '<span style="color: red;" />'.$signup_error.'</span>';} ?></h4>
<form action=""  method="post" name="newapp" id="newapp" onsubmit="return checkForm(this);">
<input type="hidden" name="savedetails" value="saveapp">
<div class="row">
<div class="col-md-3">
<b>Subject :</b> <input type="text" class="form-control" name="subject" value="<?php echo $subject ;?>" placeholder="Enter Subject Name"/>
</div>
<div class="col-md-3">
<b>Is Compulsory :</b> <select class="form-control" name="is_com">
<option value="1" <?php echo $comp;?>>Compulsory</option>
<option value="0" <?php echo $interest_based;?>>Interest Based</option>
</select>
</div>
<div class="col-md-3">
<b>Enter Duration :</b> <input type="number" class="form-control" name="duration" placeholder="Enter Duration in Seconds" value="<?php echo $duration ;?>" required/>
</div>
<div class="col-md-3">
<b>Limit :</b> <input type="number" class="form-control" name="limit" value="<?php echo $limit ;?>" placeholder="Enter Limit"/>
** Set Question Limit For Online Test</div>
<div class="col-md-3">
<b>Status :&nbsp;&nbsp;</b>&nbsp;<select class="form-control" name="sub_status">
<option value="1" <?php echo $active;?>>Active</option>
<option value="0" <?php echo $inactive;?>>Inactive</option>
</select>
</div>
</div>
<br/>
<button class="btn btn-success" name="saveinterest" value="Save Details" onclick="save_interest(); return false;">
<i class="icon-save"></i>&nbsp;Update Interest</button>
</form>        
</div>
<?php include('footer.php') ?>