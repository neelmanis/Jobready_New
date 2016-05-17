<?php 
include('header.php');   
ob_start();
//echo "---><br/>".$username.$gotuid;
?>
<!-- ckeditor start -->
<script src="//cdn.ckeditor.com/4.4.4/full/ckeditor.js"></script>
<!-- ckeditor over -->
<?php
$savedetails=$_POST['savedetails'];
if($savedetails=='saveapp')
{
$title=trim($_POST['title']);
$content=stripslashes($_POST['content']);
$status=trim($_POST['status']);

if(empty($title)) 
{ $signup_error="Please Enter Title";}
elseif(empty($content)) 
{ $signup_error="Please Enter Description";}
else{
$neelx="INSERT INTO `cms_editor`(`id`, `post_date`,`title`, `desc`, `status`) VALUES ('',NOW(),'$title','$content','$status')";
$mysqlresult=mysql_query($neelx);
if($mysqlresult){
header("Location:esu.php");
}
}
}
?>
<div class="container">
<h4 class="page-header">
<span class="glyphicon glyphicon-user"></span>&nbsp;Add Employment Scenario Updates <?php if(isset($signup_error)){ echo '<span style="color: red;" />'.$signup_error.'</span>';} ?></h4>
<form action=""  method="post" name="newapp" id="newapp" enctype="multipart/form-data" onsubmit="return checkForm(this);">
<input type="hidden" name="savedetails" value="saveapp">
<div class="row">
<div class="col-md-6">
<b>Title :</b> <input type="text" class="form-control" name="title" value="<?php echo $title; ?>"/>
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
<i class="icon-save"></i>&nbsp;Add</button>
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