<?php 
include('header.php'); 
ob_start();
//echo "---><br/>".$username.$gotuid;
$getuid=$_REQUEST['uid'];
?>

<?php
$neelxz="SELECT `id`, `title`,`cv`, `status` FROM `cms_sample_cv` WHERE `id`= $getuid";
$result = mysql_query($neelxz);
while($mysqlrow=mysql_fetch_array($result))
{ //print_r($mysqlrow);
$title=$mysqlrow['title'];
$cv=$mysqlrow['cv'];
$status=$mysqlrow['status'];
if($mysqlrow['status']=="1"){$active="selected";}
if($mysqlrow['status']=="0"){$inactive="selected";}
}
?>
<?php
$savedetails=$_POST['savedetails'];
if($savedetails=='saveapp')
{ //print_r($_POST);
$title=mysql_real_escape_string($_POST['title']);
$status=trim($_POST['status']);

$file_name = $_FILES['uploadedimage']['name']; 
$file_size =$_FILES['uploadedimage']['size'];
$file_tmp =$_FILES['uploadedimage']['tmp_name'];
$file_type=$_FILES['uploadedimage']['type'];
$new_file_name = strtolower($_FILES['uploadedimage']['tmp_name']);
$imageName = rand(11111,99999);
$img = $imageName.$file_name;
$path="sample_cv/".$img; 
if($file_name!=''){
move_uploaded_file($file_tmp,$path);
$neelx="UPDATE `cms_sample_cv` SET `modified_date`=NOW(),`cv`='$img',`status`='$status' WHERE `id`= $getuid"; 
$mysqlresult=mysql_query($neelx);
if($mysqlresult){
header("Location:sample_cv.php");
}
}
$new1="UPDATE `cms_sample_cv` SET `modified_date`=NOW(),`title`='$title',`status`='$status' WHERE `id`= $getuid";
$mysqlresult=mysql_query($new1);
if($mysqlresult){
header("Location:sample_cv.php");
}
}
?>
<div class="container">
<h4 class="page-header">
<span class="glyphicon glyphicon-user"></span>&nbsp;Update CV <?php if(isset($signup_error)){ echo '<span style="color: red;" />'.$signup_error.'</span>';} ?></h4>
<form action=""  method="POST" name="newapp" id="newapp" enctype="multipart/form-data"/>
<input type="hidden" name="savedetails" value="saveapp">
<div class="row">
<div class="col-md-6">
<b>Title :</b> &nbsp;&nbsp;&nbsp;&nbsp;<input type="text" class="form-control" name="title" value="<?php echo $title; ?>"/>
</div>
<div class="col-md-6">
<b>CV :</b> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="file" name="uploadedimage" id="uploadedimage"/>
<?php if($cv!=''){?>
<a href="sample_cv/<?php echo $cv;?>">Download</a>
<?php }else{ ?>CV Not Found
<?php }?>
</div>
</div>
<div class="row">
<div class="col-md-6">
<b>Status :</b> <select class="form-control" name="status">
<option value="1" <?php echo $active;?>>Active</option>
<option value="0" <?php echo $inactive;?>>Inactive</option>
</select>
</div>
</div>
<button class="btn btn-success" name="savestory" value="Save Details" onclick="save_story(); return false;">
<i class="icon-save"></i>&nbsp;Update CV</button>
</form>        
</div>
<?php  ob_end_flush(); ?>
<?php include('footer.php'); ?>