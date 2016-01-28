<?php 
include('header.php');  
//echo "---><br/>".$username.$gotuid;
$getuid=$_REQUEST['uid'];
?>

<?php
$neelxz="SELECT * FROM `master_subject_list` WHERE `sub_id`= $getuid";
$result = mysql_query($neelxz);
while($mysqlrow=mysql_fetch_array($result))
{ //print_r($mysqlrow);
$subject=$mysqlrow['subject'];
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
$u_subject=trim($_POST['u_subject']);
$duration=trim($_POST['duration']);
$limit=trim($_POST['limit']);
$sub_status=trim($_POST['sub_status']);

if(preg_match('/^[0-9 .\-]+$/i', $u_subject))
{$signup_error= 'Subject Name is not valid';}
else{
$neelx="UPDATE `master_subject_list` SET `modified_date`=NOW(),`subject`='$u_subject',`duration`='$duration',`limit`='$limit',`status`='$sub_status' WHERE `sub_id` ='$getuid' " ;
$mysqlresults = mysql_query($neelx)or die(mysql_error());
 //print $neelx;
if($mysqlresults){
header('location:subject.php');
?>
<?php
}}}
?>

<div class="container">
<h4 class="page-header">
<span class="glyphicon glyphicon-user"></span>&nbsp;Update Subject <?php if(isset($signup_error)){ echo '<span style="color: red;" />'.$signup_error.'</span>';} ?></h4>
<form action=""  method="post" name="newapp" id="newapp" onsubmit="return checkForm(this);">
<input type="hidden" name="savedetails" value="saveapp">
<div class="row">
<div class="col-md-3">
<b>Subject :</b> <input type="text" class="form-control" name="u_subject" value="<?php echo $subject ;?>"/>
</div>
<div class="col-md-3">
<b>Enter Duration :</b> <input type="number" class="form-control" name="duration" placeholder="Enter Duration in Seconds" value="<?php echo $duration ;?>" required/>
</div>
<div class="col-md-3">
<b>Limit :</b> <input type="number" class="form-control" name="limit" value="<?php echo $limit ;?>"/>
** Set Question Limit For Online Test</div>
<div class="col-md-3">
<b>Status :&nbsp;&nbsp;</b>&nbsp;<select class="form-control" name="sub_status">
<option value="1" <?php echo $active;?>>Active</option>
<option value="0" <?php echo $inactive;?>>Inactive</option>
</select>
</div>
</div>

<br/>
<button class="btn btn-success" name="savesubject" value="Save Details" onclick="save_subject(); return false;">
<i class="icon-save"></i>&nbsp;Update Subject</button>
</form>        
</div>
<?php include('footer.php') ?>