<?php 
include('header.php');  
ob_start();
//echo "---><br/>".$username.$gotuid;
$esuid='1';
?>
<!-- ckeditor start -->
<!--<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.1/jquery.min.js"></script>-->
<script src="//cdn.ckeditor.com/4.4.4/full/ckeditor.js"></script>
<!-- ckeditor over -->

<?php
$neelxz="SELECT `id`,`title`, `desc`, `status` FROM `cms_editor` WHERE `id`= $esuid";
$result = mysql_query($neelxz);
while($mysqlrow=mysql_fetch_array($result))
{ //print_r($mysqlrow);
$title=$mysqlrow['title'];
$content=$mysqlrow['desc'];
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
$content=trim(mysql_real_escape_string($_POST['content']));

$new1="UPDATE `cms_editor` SET `modified_date`=NOW(),`title`='$title',`desc`='$content',`status`='$status' WHERE `id`= $esuid";
$mysqlresult=mysql_query($new1);
if($mysqlresult){
header("Location:esu.php");
}}
?>

<div class="container">
<h4 class="page-header">
<span class="glyphicon glyphicon-user"></span>&nbsp;Employment Scenario Updates<?php if(isset($signup_error)){ echo '<span style="color: red;" />'.$signup_error.'</span>';} ?></h4>

<form action=""  method="POST" name="newapp" id="newapp" enctype="multipart/form-data"/>
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