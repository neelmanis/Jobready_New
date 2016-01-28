<?php 
include('header.php');  
//echo "---><br/>".$username.$gotuid;
$getuid=$_REQUEST['uid'];
?>

<?php
$neelxz="SELECT * FROM `master_video` Where `id`= $getuid";
$result = mysql_query($neelxz);
while($mysqlrow=mysql_fetch_array($result))
{ //print_r($mysqlrow);
$title=$mysqlrow['title'];
$link=$mysqlrow['link'];
$status=$mysqlrow['status'];
if($mysqlrow['status']=="1"){$active="selected";}
if($mysqlrow['status']=="0"){$inactive="selected";}
}
?>
<?php
$savedetails=$_POST['savedetails'];
if($savedetails=='saveapp')
{
$u_title=trim($_POST['title']);
$u_link=trim($_POST['link']);
$status=trim($_POST['status']);

$neelx="UPDATE `master_video` SET `modified_date`=NOW(),`title`='$u_title',`link`='$u_link',`status`='$status' WHERE `id` ='$getuid' " ;
$mysqlresults = mysql_query($neelx)or die(mysql_error());
 //print $neelx;
if($mysqlresults){
header('location:video.php');
?>
<?php
}}
?>

<div class="container">
<h4 class="page-header">
<span class="glyphicon glyphicon-user"></span>&nbsp;Update Video <?php if(isset($signup_error)){ echo '<span style="color: red;" />'.$signup_error.'</span>';} ?></h4>
<form action=""  method="post" name="newapp" id="newapp" onsubmit="return checkForm(this);">
<input type="hidden" name="savedetails" value="saveapp">
<div class="row">
<div class="col-md-6">
<b>Title :</b> <input type="text" class="form-control" name="title" value="<?php echo $title ;?>"/>
</div>
<div class="col-md-6">
<b>Link :</b> <textarea class="form-control" name="link" rows="8" id="link"><?php echo $link ;?></textarea>
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
<i class="icon-save"></i>&nbsp;Update Video</button>
</form>        
</div>
<?php include('footer.php') ?>