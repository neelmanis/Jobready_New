<?php 
include('header.php');  
//echo "---><br/>".$username.$gotuid;
?>

<?php
$savedetails=$_POST['savedetails'];
if($savedetails=='saveapp')
{
$subject=trim($_POST['subject']);
$duration=trim($_POST['duration']);
$limit=trim($_POST['limit']);
$sub_status=trim($_POST['sub_status']);


if(empty($subject))
{$signup_error="Please Enter Subject";}
elseif(preg_match('/^[0-9 .\-]+$/i', $subject)) 
{$signup_error= 'Subject Name is not valid';}
elseif(empty($limit))
{$signup_error="Please Enter Limit";}
else{
$neelx="INSERT INTO `master_subject_list`(`sub_id`, `post_date`, `subject`,`duration`,`limit`, `status`) VALUES ('',NOW(),'$subject','$duration','$limit','$sub_status')";
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
<span class="glyphicon glyphicon-user"></span>&nbsp;Add Subject <?php if(isset($signup_error)){ echo '<span style="color: red;" />'.$signup_error.'</span>';} ?></h4>
<form action=""  method="post" name="newapp" id="newapp" onsubmit="return checkForm(this);">
<input type="hidden" name="savedetails" value="saveapp">
<div class="row">
<div class="col-md-3">
<b>Subject :</b> <input type="text" class="form-control" name="subject" value="<?php echo $subject ;?>" placeholder="Enter Subject Name"/>
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
<button class="btn btn-success" name="savesubject" value="Save Details" onclick="save_subject(); return false;">
<i class="icon-save"></i>&nbsp;Add Subject</button>
</form>        
</div>
<?php include('footer.php') ?>