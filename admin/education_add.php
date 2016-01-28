<?php 
include('header.php');  
//echo "---><br/>".$username.$gotuid;
?>

<?php
$savedetails=$_POST['savedetails'];
if($savedetails=='saveapp')
{
$u_education=trim($_POST['education']);
$education_status=trim($_POST['education_status']);

if(empty($u_education))
{$signup_error="Please Enter Education";}
elseif(preg_match('/^[0-9 .\-]+$/i', $u_education)) 
{$signup_error= 'Education Name is not valid';}
else{
//$donexx=0;
$neelx="INSERT INTO `master_education`(`id`, `post_date`, `education`, `status`) VALUES ('',NOW(),'$u_education','$education_status')";
$mysqlresults = mysql_query($neelx)or die(mysql_error());
 //print $neelx;
if($mysqlresults){
header('location:education.php');
//$donexx=1;
?>
<!--<br/><div class="alert alert-success"><strong>Success!</strong>New Interest Added Successfully.</div>-->
<?php
}}}
//if($donexx==0)
//{
?>

<div class="container">
<h4 class="page-header">
<span class="glyphicon glyphicon-user"></span>&nbsp;Add Education <?php if(isset($signup_error)){ echo '<span style="color: red;" />'.$signup_error.'</span>';} ?></h4>
<form action=""  method="post" name="newapp" id="newapp" onsubmit="return checkForm(this);">
<input type="hidden" name="savedetails" value="saveapp">
<div class="row">
<div class="col-md-6">
<b>Education :</b> <input type="text" class="form-control" name="education"/>
</div>
<div class="col-md-6">
<b>Status :</b> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<select class="form-control" name="education_status">
<option value="1">Active</option>
<option value="0">Inactive</option>
</select>
</div>
</div>

<br/>
<button class="btn btn-success" name="saveeducation" value="Save Details" onclick="save_education(); return false;">
<i class="icon-save"></i>&nbsp;Add Education</button>
</form>        
</div>
<?php //} ?>
<?php include('footer.php') ?>