<?php 
include('header.php');  
//echo "---><br/>".$username.$gotuid;
$getuid=$_REQUEST['uid'];
?>

<?php
$neelxz="SELECT * FROM `master_institution` Where `id`= $getuid";
$result = mysql_query($neelxz);
while($mysqlrow=mysql_fetch_array($result))
{ //print_r($mysqlrow);
$user_institution=$mysqlrow['institution'];
$status=$mysqlrow['status'];
if($mysqlrow['status']=="1"){$active="selected";}
if($mysqlrow['status']=="0"){$inactive="selected";}
}
?>
<?php
$savedetails=$_POST['savedetails'];
if($savedetails=='saveapp')
{
$u_institution=trim($_POST['u_institution']);
$ins_status=trim($_POST['institution_status']);

if(preg_match('/^[0-9 .\-]+$/i', $u_institution))
{$signup_error= 'Institution Name is not valid';}
else{
$neelx="UPDATE `master_institution` SET `modified_date`=NOW(),`institution`='$u_institution',`status`='$ins_status' WHERE `id` ='$getuid' " ;
$mysqlresults = mysql_query($neelx)or die(mysql_error());
 //print $neelx;
if($mysqlresults){
header('location:institution.php');
?>
<?php
}}}
?>

<div class="container">
<h4 class="page-header">
<span class="glyphicon glyphicon-user"></span>&nbsp;Update Institution <?php if(isset($signup_error)){ echo '<span style="color: red;" />'.$signup_error.'</span>';} ?></h4>
<form action=""  method="post" name="newapp" id="newapp" onsubmit="return checkForm(this);">
<input type="hidden" name="savedetails" value="saveapp">
<div class="row">
<div class="col-md-6">
<b>Institution :</b> <input type="text" class="form-control" name="u_institution" value="<?php echo $user_institution ;?>"/>
</div>
<div class="col-md-6">
<b>Status :</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<select class="form-control" name="institution_status">
<option value="1" <?php echo $active;?>>Active</option>
<option value="0" <?php echo $inactive;?>>Inactive</option>
</select>
</div>
</div>

<br/>
<button class="btn btn-success" name="saveinstitution" value="Save Details" onclick="save_institution(); return false;">
<i class="icon-save"></i>&nbsp;Update Institution</button>
</form>        
</div>
<?php include('footer.php') ?>