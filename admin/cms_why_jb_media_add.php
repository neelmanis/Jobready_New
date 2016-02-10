<?php 
include('header.php');   
ob_start();
//echo "---><br/>".$username.$gotuid;
?>
<!-- ckeditor start -->
<!--<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.1/jquery.min.js"></script>-->
<script src="//cdn.ckeditor.com/4.4.4/full/ckeditor.js"></script>
<!-- ckeditor over -->
<?php
$savedetails=$_POST['savedetails'];
if($savedetails=='saveapp')
{
$title=trim($_POST['title']);
$content=trim($_POST['content']);
$status=trim($_POST['status']);
$file_name = $_FILES['image']['name'];
$file_size =$_FILES['image']['size'];
$file_tmp =$_FILES['image']['tmp_name'];
$file_type=$_FILES['image']['type'];
$new_file_name = strtolower($_FILES['image']['tmp_name']);
$imageName = rand(11111,99999);
$img = $imageName.$file_name;
$path="jb_media/".$img;
if(empty($title)) 
{ $signup_error="Please Enter Title";}
elseif(empty($file_name)) 
{ $signup_error="Please Choose Doc";}
elseif($file_size>2097152)
{ $signup_error="Your uploaded file size is more than 2MB so please reduce the file size and then upload.<BR>"; }
elseif(empty($content)) 
{ $signup_error="Please Choose Description";}
elseif(move_uploaded_file($file_tmp,$path)){
$neelx="INSERT INTO `cms_why_jb_media`(`id`, `post_date`,`title`, `doc`, `desc`, `status`) VALUES ('',NOW(),'$title','$img','$content','$status')";
$mysqlresult=mysql_query($neelx);
if($mysqlresult){
header("Location:cms_why_jb_media.php");
}
}
}
?>
<div class="container">
<h4 class="page-header">
<span class="glyphicon glyphicon-user"></span>&nbsp;Add Media <?php if(isset($signup_error)){ echo '<span style="color: red;" />'.$signup_error.'</span>';} ?></h4>
<form action=""  method="post" name="newapp" id="newapp" enctype="multipart/form-data" onsubmit="return checkForm(this);">
<input type="hidden" name="savedetails" value="saveapp">
<div class="row">
<div class="col-md-6">
<b>Title :</b> <input type="text" class="form-control" name="title" value="<?php echo $title; ?>"/>
</div>
<div class="col-md-6">
<b>Image :</b> <input type="file" name="image" id="image" value="<?php echo $file_name; ?>">
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
<option value="1">Active</option>
<option value="0">Inactive</option>
</select>
</div>
</div>
<button class="btn btn-success" name="savestory" value="Save Details" onclick="save_story(); return false;">
<i class="icon-save"></i>&nbsp;Add Media</button>
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