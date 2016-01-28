<?php 
include('header.php');  
//echo "---><br/>".$username.$gotuid;
$getuid=$_REQUEST['uid'];
?>

<?php
$neelxz="SELECT * FROM `master_education` Where `id`= $getuid";
$result = mysql_query($neelxz);
while($mysqlrow=mysql_fetch_array($result))
{ //print_r($mysqlrow);
$u_education=$mysqlrow['education'];
$status=$mysqlrow['status'];
if($mysqlrow['status']=="1"){$active="selected";}
if($mysqlrow['status']=="0"){$inactive="selected";}
}
?>
<?php
$savedetails=$_POST['savedetails'];
if($savedetails=='saveapp')
{
$education=trim($_POST['education']);
$edu_status=trim($_POST['education_status']);

if(preg_match('/^[0-9 .\-]+$/i', $education))
{$signup_error= 'Education Name is not valid';}
else{
$neelx="UPDATE `master_education` SET `modified_date`=NOW(),`education`='$education',`status`='$edu_status' WHERE `id` ='$getuid' " ;
$mysqlresults = mysql_query($neelx)or die(mysql_error());
 //print $neelx;
if($mysqlresults){
header('location:education.php');
?>
<?php
}}}
?>

<div class="container">
<h4 class="page-header">
<span class="glyphicon glyphicon-user"></span>&nbsp;Update Education <?php if(isset($signup_error)){ echo '<span style="color: red;" />'.$signup_error.'</span>';} ?></h4>
<form action=""  method="post" name="newapp" id="newapp" onsubmit="return checkForm(this);">
<input type="hidden" name="savedetails" value="saveapp">
<div class="row">
<div class="col-md-6">
<b>Education :</b> <input type="text" class="form-control" name="education" value="<?php echo $u_education ;?>"/>
</div>
<div class="col-md-6">
<b>Status :</b> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<select class="form-control" name="education_status">
<option value="1" <?php echo $active;?>>Active</option>
<option value="0" <?php echo $inactive;?>>Inactive</option>
</select>
</div>
</div>

<br/>
<button class="btn btn-success" name="saveeducation" value="Save Details" onclick="save_education(); return false;">
<i class="icon-save"></i>&nbsp;Update Education</button>
</form>        
</div>
<?php include('footer.php') ?>