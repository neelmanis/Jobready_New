<?php 
include('header.php');  
ob_start();
//echo "---><br/>".$username.$gotuid;
$getuid=$_REQUEST['uid'];
?>
<!-- Keyword start -->
<link href="tag/bootstrap-tagsinput.css" rel="stylesheet">
<script src="tag/bootstrap-tagsinput-angular.min.js"></script>
<script src="tag/bootstrap-tagsinput-angular.js"></script>
<script src="tag/bootstrap-tagsinput.min.js"></script>
<script src="tag/bootstrap-tagsinput.js"></script>
<!-- Keyword over -->
<?php
$neelxz="SELECT `id`, `area_of_interest`,`title`, `description`,`job_keyword`, `doc`, `status` FROM `job_training_list` WHERE `id`= $getuid";
$result = mysql_query($neelxz);
while($mysqlrow=mysql_fetch_array($result))
{ //print_r($mysqlrow);
$description=$mysqlrow['description'];
$aoi=$mysqlrow['area_of_interest'];
$trainer_name=$mysqlrow['title'];
$job_keyword=$mysqlrow['job_keyword'];
$doc=$mysqlrow['doc'];
$status=$mysqlrow['status'];
if($mysqlrow['status']=="1"){$active="selected";}
if($mysqlrow['status']=="0"){$inactive="selected";}
}
?>

<?php
$savedetails=$_POST['savedetails'];
if($savedetails=='saveapp')
{ print_r($_POST);
$aoi=trim($_POST['aoi']);
$admin_trainer_name=trim($_POST['trainer_name']);
$description=trim($_POST['training_description']);
$job_keyword=trim($_POST['job_keyword']);
$status=trim($_POST['status']);

$file_name = $_FILES['file_upload']['name']; 
$file_size =$_FILES['file_upload']['size'];
$file_tmp =$_FILES['file_upload']['tmp_name'];
$file_type=$_FILES['file_upload']['type'];
$new_file_name = strtolower($_FILES['file_upload']['tmp_name']);

//$imageName = rand(11111,99999);

//$img = $imageName.$file_name;

$img = $file_name;
$path="../upload/training_doc/".$img; // WE are Getting Document from main Folder

if($file_name!=''){
move_uploaded_file($file_tmp,$path);
echo $neelx="UPDATE `job_training_list` SET `modified_date`=NOW(),`doc`='$img',`status`='$status' WHERE `id`= $getuid";  
$mysqlresult=mysql_query($neelx); 
if($mysqlresult){
header("Location:training_offered_jobready.php");
}
} 

$new1="UPDATE `job_training_list` SET `modified_date`=NOW(),`area_of_interest`='$aoi',`title`='$admin_trainer_name',`description`='$description',`job_keyword`='$job_keyword',`status`='$status' WHERE `id`= $getuid"; 
$mysqlresult=mysql_query($new1);
if($mysqlresult){
header("Location:training_offered_jobready.php");
}}
?>
<div class="container">
<h4 class="page-header">
<span class="glyphicon glyphicon-user"></span>&nbsp;Update Training <?php if(isset($signup_error)){ echo '<span style="color: red;" />'.$signup_error.'</span>';} ?></h4>
<form action=""  method="post" name="newapp" id="newapp" onsubmit="return checkForm(this);" enctype="multipart/form-data">
<input type="hidden" name="savedetails" value="saveapp">
<div class="row">
<div class="span6">
<b>Trainer Name :</b> <input type="text" class="form-control" name="trainer_name" value="<?php echo $trainer_name; ?>" Placeholder="Please Enter Title" required/>
</div>
</div>
<div class="row">
<div class="span6">
<b>Training Category :</b>
<?php
function fetch($sql) {
$sql;
$data = array();
$result = mysql_query($sql) or trigger_error(mysql_error().$sql);
while($row = mysql_fetch_array($result)) {
$data[] = $row;
}
return $data;
}
$neelxz = fetch('SELECT `id`,`area_of_interest`, `status` FROM `master_interest_area` WHERE `status`=1 ORDER BY area_of_interest ASC');
?>
<select class="form-control" name="aoi">
<?php for($i=0;$i<count($neelxz);$i++) { ?>
<option value="<?php echo $neelxz[$i]['id'];?>" <?php if($neelxz[$i]['id']== $aoi) echo 'selected="selected"' ;?>><?php echo $neelxz[$i]['area_of_interest'] ; ?></option>
<?php  } ?>
</select>
</div>
</div>

<div class="row">
<div class="span12">
<b>Description :</b> <textarea class="form-control" name="training_description" rows="5" id="training_description" style="margin: 0px 0px 10px; width: 933px; height: 100px;" Placeholder="Please Enter Training description" required><?php echo $description ;?></textarea>  
</div>
</div>
<div class="row">
<div class="span12">
<b>Keywords :</b> <input type="text" class="input-xlarge" name="job_keyword" id="job_keyword" Placeholder="Please Enter Keywords" data-role="tagsinput" value="<?php echo $job_keyword ;?>" required>  
</div>
</div>
<div class="row">
<div class="span6">
<b>Choose Document :</b> <input type="file" class="form-control" name="file_upload" />
<?php if (isset($doc) && !empty($doc)) { echo $doc; }?>
</div>
</div>
<div class="row">
<div class="span6">
<b>Status :</b> <select class="form-control" name="status">
<option value="1" <?php echo $active;?>>Active</option>
<option value="0" <?php echo $inactive;?>>Inactive</option>
</select>
</div>
</div>
<br/>
<button class="btn btn-success" name="savejob" value="Save Details" onclick="save_job(); return false;">
<i class="icon-save"></i>&nbsp;Update Training</button>
</form>        
</div>
<?php  //ob_end_flush(); ?>
<?php include('footer.php'); ?>