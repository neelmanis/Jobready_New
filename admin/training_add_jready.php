<?php 
include('header.php');  
?>

<?php
$savedetails=$_POST['savedetails'];
if($savedetails=='saveapp')
{
//print_r($_POST);
$aoi=trim($_POST['aoi']);
$trainer_name=trim($_POST['trainer_name']);
$description=trim($_POST['training_description']);
$status=trim($_POST['status']);

$file_name = $_FILES['file_upload']['name'];
$file_size =$_FILES['file_upload']['size'];
$file_tmp =$_FILES['file_upload']['tmp_name'];
$file_type=$_FILES['file_upload']['type'];
$new_file_name = strtolower($_FILES['file_upload']['tmp_name']);
$img = $file_name;
$path="../upload/training_doc/".$file_name; // WE are sending Document to main Folder

if($file_size>2097152)
{ echo "Your uploaded file size is more than 2MB so please reduce the file size and then upload.<BR>"; }
elseif(move_uploaded_file($file_tmp,$path)){
	
$sql="INSERT INTO `job_training_list`(`id`, `registration_id`, `admin_id`, `area_of_interest`,`title`, `description`, `doc`, `post_date`,`status`) VALUES ('','','$gotuid','$aoi','$trainer_name','$description','$img',NOW(),'$status')";
$result=mysql_query($sql);
if($sql){
header("Location:training_offered_jobready.php");
}}}
?>

<div class="container">
<h4 class="page-header">
<span class="glyphicon glyphicon-user"></span>&nbsp;Add Trainings <?php if(isset($signup_error)){ echo '<span style="color: red;" />'.$signup_error.'</span>';} ?></h4>
<form action=""  method="post" name="newapp" id="newapp" enctype="multipart/form-data">
<input type="hidden" name="savedetails" value="saveapp">
<div class="row">
<div class="span6">
<b>Title :</b> <input type="text" class="form-control" name="trainer_name" value="<?php echo $trainer_name;?>" Placeholder="Please Enter Title" required/>
</div>
</div>
<div class="row">
<div class="span6">
<b>Training Category :</b>
<select class="form-control" name="aoi">
<option value="">--Select Category--</option>
<?php
$neelxz="SELECT `id`,`subject`, `status` FROM `master_area_of_interest` WHERE status='1' ORDER BY subject ASC";
$result = mysql_query($neelxz);
while($mysqlrow=mysql_fetch_array($result))
{
$getID=$mysqlrow['id'];
$areas_of_interest=$mysqlrow['subject'];
echo "<option value='".$getID ."'>$areas_of_interest</option>";
}
?>
</select>
</div>
</div>
<div class="row">
<div class="span12">
<b>Description :</b> <textarea class="form-control" name="training_description" rows="5" id="training_description" style="margin: 0px 0px 10px; width: 933px; height: 100px;" Placeholder="Please Enter Training description" required><?php echo $training_description ;?></textarea>  
</div>
</div>
<div class="row">
<div class="span6">
<b>Choose Document :</b> <input type="file" class="form-control" name="file_upload" />
</div>
</div>
<div class="row">
<div class="span6">
<b>Status :</b> <select class="form-control" name="status">
<option value="1">Active</option>
<option value="0">Inactive</option>
</select>
</div>
</div>
<br/>
<button class="btn btn-success" name="savejob" value="Save Details" onclick="save_job(); return false;">
<i class="icon-save"></i>&nbsp;Add Training</button>
</form>        
</div>
<?php include('footer.php'); ?>