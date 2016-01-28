<?php 
include('header.php');  
ob_start();
//echo "---><br/>".$username.$gotuid;
?>
<!-- ckeditor start -->
<!--<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.1/jquery.min.js"></script>-->
<script src="//cdn.ckeditor.com/4.4.4/full/ckeditor.js"></script>
<!-- ckeditor over -->

<!-- date picker start -->
<link href="css/datepicker.css" rel="stylesheet" type="text/css" />
<!--<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>-->
<script src="js/bootstrap-datepicker.js"></script>
<script>
$(document).ready(function () {
                $('#example1').datepicker({
                minDate: 0,
                autoclose: true, 
                todayHighlight: true,
                format: "dd-mm-yyyy"
                });  
            });    
</script>
<!-- date picker over -->
<?php
$savedetails=$_POST['savedetails'];
if($savedetails=='saveapp')
{
$events_date=trim($_POST['events_date']);
$events_title=trim($_POST['events_title']);
$content=trim($_POST['content']);
$events_type=trim($_POST['events_type']);
$events_status=trim($_POST['events_status']);

if(empty($events_date))
{$signup_error="Please Choose Events Date";}
elseif(empty($events_title)) 
{$signup_error="Please Choose Events Title";}
elseif(empty($content)) 
{$signup_error="Please Choose Events Description";}
elseif(empty($events_type) && $events_type==0) 
{$signup_error="Please Choose Events Type";}
else{
$neelx="INSERT INTO `master_events_list`(`id`, `post_date`, `events_date`, `title`, `desc`, `type`, `status`) VALUES ('',NOW(),'$events_date','$events_title','$content','$events_type','$events_status')";
$mysqlresults = mysql_query($neelx);
if($mysqlresults){
header('location:events.php');
}}}?>

<div class="container">
<h4 class="page-header">
<span class="glyphicon glyphicon-user"></span>&nbsp;Add Events <?php if(isset($signup_error)){ echo '<span style="color: red;" />'.$signup_error.'</span>';} ?></h4>
<form action=""  method="post" name="newapp" id="newapp" onsubmit="return checkForm(this);">
<input type="hidden" name="savedetails" value="saveapp">
<div class="row">
<div class="col-md-6" id="datepicker">
<b>Events Date :</b> <input type="text" id="example1" class="form-control" name="events_date" value="<?php echo $events_date; ?>">       
</div>
<div class="col-md-6">
<b>Events Title :</b> <input type="text" class="form-control" name="events_title" value="<?php echo $events_title; ?>"/>
</div>
</div>
<div class="row">
<div class="col-md-6">
<b>Events Description :</b> <textarea name="content" class="ckeditor" id="content"><?php echo $content;?></textarea>
</div><br/>
<div class="col-md-6">
<b>Type :</b> &nbsp;&nbsp;<select class="form-control" name="events_type">
<option value="0" selected>Select</option>
<option value="Training">Training</option>
<option value="Seminars">Seminars</option>
<option value="Workshops">Workshops</option>
</select>
</div>
</div>
<div class="row">
<div class="col-md-6">
<b>Status :</b> <select class="form-control" name="events_status">
<option value="1">Active</option>
<option value="0">Inactive</option>
</select>
</div>
</div>

<br/>
<button class="btn btn-success" name="saveevents" value="Save Details" onclick="save_events(); return false;">
<i class="icon-save"></i>&nbsp;Add Events</button>
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