<?php 
include('header.php');   
ob_start();
//echo "---><br/>".$username.$gotuid;
$getuid=$_REQUEST['uid'];
?>
<script src="//cdn.ckeditor.com/4.4.4/full/ckeditor.js"></script>

<?php
$neelxz="SELECT `id`, `post_date`,`title`,`image`, `desc`, `status` FROM `cms_skw` WHERE `id`= $getuid";
$result = mysql_query($neelxz);
while($mysqlrow=mysql_fetch_array($result))
{ //print_r($mysqlrow);
$title=$mysqlrow['title'];
$content=$mysqlrow['desc'];
$image=$mysqlrow['image'];
$status=$mysqlrow['status'];
if($mysqlrow['status']=="1"){$active="selected";}
if($mysqlrow['status']=="0"){$inactive="selected";}
}
?>

<?php
$savedetails=$_POST['savedetails'];
if($savedetails=='saveapp')
{ //print_r($_POST);
$title=trim($_POST['title']);
$status=trim($_POST['status']);
$content=trim($_POST['content']);
$file_name = $_FILES['uploadedimage']['name']; 
$file_size =$_FILES['uploadedimage']['size'];
$file_tmp =$_FILES['uploadedimage']['tmp_name'];
$file_type=$_FILES['uploadedimage']['type'];
$new_file_name = strtolower($_FILES['uploadedimage']['tmp_name']);
$imageName = rand(11111,99999);
$img = $imageName.$file_name;
$path="skw/".$img; 

if($file_name!=''){
move_uploaded_file($file_tmp,$path);
$neelx="UPDATE `cms_skw` SET `modified_date`=NOW(),`image`='$img',`status`='$status' WHERE `id`= $getuid";  
$mysqlresult=mysql_query($neelx);
if($mysqlresult){
header("Location:skw.php");
}
}
$new1="UPDATE `cms_skw` SET `modified_date`=NOW(),`title`='$title',`desc`='$content',`status`='$status' WHERE `id`= $getuid";
$mysqlresult=mysql_query($new1);
if($mysqlresult){
header("Location:skw.php");
}}
?>

<div class="container">
<h4 class="page-header">
<span class="glyphicon glyphicon-user"></span>&nbsp;Update Soft skills at Work <?php if(isset($signup_error)){ echo '<span style="color: red;" />'.$signup_error.'</span>';} ?></h4>

<form action=""  method="POST" name="newapp" id="newapp" enctype="multipart/form-data"/>
<input type="hidden" name="savedetails" value="saveapp">
<div class="row">
<div class="col-md-6">
<b>Title :</b> <input type="text" class="form-control" name="title" value="<?php echo $title; ?>"/>
</div>
<div class="col-md-6">
<b>Image :</b> <input type="file" name="uploadedimage" id="uploadedimage"/>
<?php if (isset($image) && !empty($image)) {?>
<img src="skw/<?php echo $image; ?>" align="center" height="100" width="100"><?php } ?>
</div>
</div>
<div class="row">
<div class="col-md-6">
<b>Description :</b> <textarea name="content" class="ckeditor" id="content"><?php echo $content;?></textarea>
</div><br/>
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
<i class="icon-save"></i>&nbsp;Update</button>
</form>        
</div>

<!-- ckeditor script -->
<script>
CKEDITOR.replace( 'content', {
filebrowserBrowseUrl: 'ckfinder/ckfinder.html',
filebrowserImageBrowseUrl: 'ckfinder/ckfinder.html?Type=Files',
filebrowserImageBrowseUrl: 'ckfinder/ckfinder.html?Type=Images',
filebrowserFlashBrowseUrl: 'ckfinder/ckfinder.html?Type=Flash',
filebrowserUploadUrl: 'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
filebrowserImageUploadUrl: 'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',
filebrowserFlashUploadUrl: 'ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Flash'
});
</script>
<?php  ob_end_flush(); ?>
<?php include('footer.php'); ?>