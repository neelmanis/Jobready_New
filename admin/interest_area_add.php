<?php 
include('header.php');  
?>
<?php
$savedetails=$_POST['savedetails'];
if($savedetails=='saveapp')
{
$subject=trim(strtoupper($_POST['subject']));
$sub_status=trim($_POST['sub_status']);

$sqlx="SELECT area_of_interest from master_interest_area  WHERE area_of_interest='$subject'";
$result = mysql_query($sqlx);
$mysqlrow=mysql_fetch_array($result);
$getAoi=$mysqlrow['area_of_interest'];

if(empty($subject))
{$signup_error="Please Enter Subject";}
elseif(preg_match('/^[0-9 .\-]+$/i', $subject)) 
{$signup_error= 'Subject Name is not valid';}
elseif($getAoi == $subject)
{$signup_error="Interest Area Already Exist";}
else{
$sqlx="INSERT INTO `master_interest_area`(`id`, `post_date`, `area_of_interest`, `status`) VALUES ('',NOW(),'$subject','$sub_status')";
$mysqlresults = mysql_query($sqlx)or die(mysql_error());
//print $sqlx;
if($mysqlresults){
header('location:interest_area.php');
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
<span class="glyphicon glyphicon-user"></span>&nbsp;Add Interest Area <?php if(isset($signup_error)){ echo '<span style="color: red;" />'.$signup_error.'</span>';} ?></h4>

<form action=""  method="post" name="newapp" id="newapp" onsubmit="return checkForm(this);">
<input type="hidden" name="savedetails" value="saveapp">
<div class="row">
<div class="col-md-3">
<b>Subject :</b> <input type="text" class="form-control" name="subject" value="<?php echo $subject ;?>" placeholder="Enter Subject Name"/>
</div>

<div class="col-md-3">
<b>Status :&nbsp;&nbsp;</b>&nbsp;<select class="form-control" name="sub_status">
<option value="1" <?php echo $active;?>>Active</option>
<option value="0" <?php echo $inactive;?>>Inactive</option>
</select>
</div>
</div>
<br/>
<button class="btn btn-success" name="savesubject" value="Save Details" onclick="save_subject(); return false;">
<i class="icon-save"></i>&nbsp;Add Subject</button>
</form>        
</div>
<?php //} ?>
<?php include('footer.php') ?>