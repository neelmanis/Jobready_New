<?php 
include('header.php');  
ob_start();
//echo "---><br/>".$username.$gotuid;
$getuid=$_REQUEST['uid'];
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
$neelxz="SELECT `id`,`events_date`, `title`, `desc`, `type`, `status` FROM `master_events_list` WHERE `id`= $getuid";
$result = mysql_query($neelxz);
while($mysqlrow=mysql_fetch_array($result))
{ //print_r($mysqlrow);
$events_date=$mysqlrow['events_date'];
$events_title=$mysqlrow['title'];
$desc=$mysqlrow['desc'];
$type=$mysqlrow['type'];
if($type=="Training"){$training="selected";}
if($type=="Seminars"){$seminars="selected";}
if($type=="Workshops"){$workshops="selected";}
$status=$mysqlrow['status'];
if($mysqlrow['status']=="1"){$active="selected";}
if($mysqlrow['status']=="0"){$inactive="selected";}
}
?>
<?php
$savedetails=$_POST['savedetails'];
if($savedetails=='saveapp')
{
$e_date=trim($_POST['e_date']);
$e_title=trim($_POST['e_title']);
$e_desc=trim($_POST['e_desc']);
$e_type=trim($_POST['e_type']);
$e_status=trim($_POST['e_status']);

if(empty($e_date))
{$signup_error="Please Choose Events Date";}
elseif(empty($e_title)) 
{$signup_error="Please Choose Events Title";}
elseif(empty($e_desc)) 
{$signup_error="Please Choose Events Description";}
elseif(empty($e_type) && $e_type==0) 
{$signup_error="Please Choose Events Type";}
else{
$neelx="UPDATE `master_events_list` SET `modified_date`=NOW(),`events_date`='$e_date',`title`='$e_title',`desc`='$e_desc',`type`='$e_type',`status`='$e_status' WHERE `id` ='$getuid' " ;
$mysqlresults = mysql_query($neelx)or die(mysql_error());
 //print $neelx;
if($mysqlresults){
header('location:events.php');
?>
<?php
}}}
?>

<div class="container">
<h4 class="page-header">
<span class="glyphicon glyphicon-user"></span>&nbsp;Update Events <?php if(isset($signup_error)){ echo '<span style="color: red;" />'.$signup_error.'</span>';} ?></h4>
<form action=""  method="post" name="newapp" id="newapp" onsubmit="return checkForm(this);">
<input type="hidden" name="savedetails" value="saveapp">
<div class="row">
<div class="col-md-6" id="datepicker">
<b>Events Date :</b> <input type="text" id="example1" class="form-control" name="e_date" value="<?php echo $events_date;?>">       
</div>
<div class="col-md-6">
<b>Events Title :</b> <input type="text" class="form-control" name="e_title" value="<?php echo $events_title; ?>"/>
</div>
</div>
<div class="row">
<div class="col-md-6">
<b>Events Description :</b> <textarea name="e_desc" class="ckeditor" id="content"><?php echo $desc;?></textarea>
</div><br/>
<div class="col-md-6">
<b>Type :</b> &nbsp;&nbsp;<select class="form-control" name="e_type">
<option value="0" selected>Select</option>
<option value="Training" <?php echo $training;?>>Training</option>
<option value="Seminars" <?php echo $seminars;?>>Seminars</option>
<option value="Workshops" <?php echo $workshops;?>>Workshops</option>
</select>
</div>
</div>
<div class="row">
<div class="col-md-6">
<b>Status :</b> <select class="form-control" name="e_status">
<option value="1" <?php echo $active;?>>Active</option>
<option value="0" <?php echo $inactive;?>>Inactive</option>
</select>
</div>
</div>

<br/>
<button class="btn btn-success" name="saveevents" value="Save Details" onclick="save_events(); return false;">
<i class="icon-save"></i>&nbsp;Update Events</button>
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