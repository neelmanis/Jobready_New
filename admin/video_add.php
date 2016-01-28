<?php 
include('header.php');  
//echo "---><br/>".$username.$gotuid;
?>

<?php
$savedetails=$_POST['savedetails'];
if($savedetails=='saveapp')
{
$title=trim($_POST['title']);
$link=trim($_POST['link']);
$status=trim($_POST['status']);

if(empty($title))
{$signup_error="Please Enter title";}
else{
//$donexx=0;
$neelx="INSERT INTO `master_video`(`id`, `post_date`, `title`, `link`, `status`) VALUES ('',NOW(),'$title','$link','$status')";
$mysqlresults = mysql_query($neelx)or die(mysql_error());
 //print $neelx;
if($mysqlresults){
header('location:video.php');
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
<span class="glyphicon glyphicon-user"></span>&nbsp;Add Video <?php if(isset($signup_error)){ echo '<span style="color: red;" />'.$signup_error.'</span>';} ?></h4>
<form action=""  method="post" name="newapp" id="newapp" onsubmit="return checkForm(this);">
<input type="hidden" name="savedetails" value="saveapp">
<div class="row">
<div class="col-md-6">
<b>Title :</b> <input type="text" class="form-control" name="title" value="<?php echo $title ;?>"/>
</div>
<div class="col-md-6">
<b>Link :</b> <textarea class="form-control" name="link" rows="5" id="link"><?php echo $link ;?></textarea>
</div>
<div class="col-md-6">
<b>Status :</b> <select class="form-control" name="status">
<option value="1" <?php echo $active;?>>Active</option>
<option value="0" <?php echo $inactive;?>>Inactive</option>
</select>
</div>
</div>

<br/>
<button class="btn btn-success" name="savevideo" value="Save Details" onclick="save_video(); return false;">
<i class="icon-save"></i>&nbsp;Add Video</button>
</form>        
</div>
<?php //} ?>
<?php include('footer.php') ?>