<?php 
include('header.php');  
$getuid=$_REQUEST['uid'];
?>

<?php
$neelx="SELECT  area_of_interest,status FROM `master_interest_area` Where `id`= $getuid";
$result = mysql_query($neelx);
while($mysqlrow=mysql_fetch_array($result))
{ //print_r($mysqlrow);
$area_of_interest=$mysqlrow['area_of_interest'];
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
$sub_status=trim($_POST['sub_status']);
if(preg_match('/^[0-9 .\-]+$/i', $subject))
{$signup_error= 'Subject Name is not valid';}
else{
$neely="UPDATE `master_interest_area` SET `modified_date`=NOW(),area_of_interest='$subject',`status`='$sub_status' WHERE `id` ='$getuid'"; 
$mysqlresults = mysql_query($neely)or die(mysql_error());
 //print $neely;
if($mysqlresults){
header('location:interest_area.php');
}
}}
?>

<div class="container">
<h4 class="page-header">
<span class="glyphicon glyphicon-user"></span>&nbsp;Update Interest Area <?php if(isset($signup_error)){ echo '<span style="color: red;" />'.$signup_error.'</span>';} ?></h4>
<form action=""  method="post" name="newapp" id="newapp" onsubmit="return checkForm(this);">
<input type="hidden" name="savedetails" value="saveapp">
<div class="row">
<div class="col-md-3">
<b>Subject :</b> <input type="text" class="form-control" name="subject" value="<?php echo $area_of_interest ;?>" placeholder="Enter Subject Name"/>
</div>

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