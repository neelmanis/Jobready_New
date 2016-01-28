<?php 
include('header.php');  
//echo "---><br/>".$username.$gotuid;
$id=$_REQUEST['uid'];
?>
<?php
$neelxz="SELECT * FROM `master_general_question` Where `id`= $id";
$result = mysql_query($neelxz);
while($mysqlrow=mysql_fetch_array($result))
{
$sub_id=$mysqlrow['sub_id'];
$question=$mysqlrow['question'];
$option1=$mysqlrow['option1'];
$option2=$mysqlrow['option2'];
$option3=$mysqlrow['option3'];
$option4=$mysqlrow['option4'];
$true_ans=$mysqlrow['true_ans'];
$marks=$mysqlrow['marks'];
$duration=$mysqlrow['duration'];
$status=$mysqlrow['status'];
if($mysqlrow['status']=="1"){$active="selected";}
if($mysqlrow['status']=="0"){$inactive="selected";}
}
?>
<?php
$savedetails=$_POST['savedetails'];
if($savedetails=='saveapp')
{ //print_r($_POST);
$subject=trim($_POST['subject']);
$question=trim($_POST['question']);
$option1=trim($_POST['option1']);
$option2=trim($_POST['option2']);
$option3=trim($_POST['option3']);
$option4=trim($_POST['option4']);
$true_ans=trim($_POST['true_ans']);
$marks=trim($_POST['marks']);
$duration=trim($_POST['duration']);
$status=trim($_POST['status']);

$sqly="UPDATE `master_general_question` SET `sub_id`='$subject',`modified_date`=NOW(),`question`='$question',`option1`='$option1',`option2`='$option2',`option3`='$option3',`option4`='$option4',`true_ans`='$true_ans',`marks`='$marks',`duration`='$duration',`status`='$status' WHERE `id`= $id";
$mysqlresults = mysql_query($sqly)or die(mysql_error());
 //print $sqly;
if($mysqlresults){
header('location:general_question.php');
?>
<?php
}}
?>

<div class="container">
<h4 class="page-header">
<span class="glyphicon glyphicon-user"></span>&nbsp;Update Question <?php if(isset($signup_error)){ echo '<span style="color: red;" />'.$signup_error.'</span>';} ?></h4>
<form action=""  method="post" name="newapp" id="newapp" onsubmit="return checkForm(this);">
<input type="hidden" name="savedetails" value="saveapp">
<div class="row">
<div class="col-md-6">
<b>Select Subject :</b>&nbsp; 
<select class="form-control" name="subject">
<option value="">--Select Subject--</option>
<?php
$sqlx="SELECT `id`, `subject`, `is_compulsory`, `status` FROM `master_subject_list` WHERE `status`='1' ORDER BY subject ASC";
//$neelxz="SELECT `id`, `area_of_interest` FROM `master_interest_area` WHERE `status`=1 ORDER BY area_of_interest ASC";
$result = mysql_query($sqlx);
while($mysqlrow=mysql_fetch_array($result)){ ?>
<option value="<?php echo $mysqlrow['id'];?>"<?php if($mysqlrow['id']==$sub_id){?> selected="selected"<?php }?>><?php echo $mysqlrow['subject'];?></option>
<?php }?>
</select>
</div>
<div class="col-md-6">
<b>Enter Question :</b> <textarea class="input-xxlarge" name="question" rows="5" id="question" placeholder="Enter Question" required><?php echo $question;?></textarea>
</div>
</div>
<div class="row">
<div class="col-md-6">
<b>Enter Option A :</b> <input type="text" class="input-xxlarge" name="option1" placeholder="Enter Option A" value="<?php echo $option1 ;?>" required/>
</div>
<div class="col-md-6">
<b>Enter Option B :</b> <input type="text" class="input-xxlarge" name="option2" placeholder="Enter Option B"  value="<?php echo $option2 ;?>" required/>
</div>
</div>
<div class="row">
<div class="col-md-6">
<b>Enter Option C :</b> <input type="text" class="input-xxlarge" name="option3" placeholder="Enter Option C" value="<?php echo $option3 ;?>" required/>
</div>
<div class="col-md-6">
<b>Enter Option D :</b> <input type="text" class="input-xxlarge" name="option4" placeholder="Enter Option D" value="<?php echo $option4 ;?>" required/>
</div>
</div>
<div class="row">
<div class="col-md-4">
<b>Correct Answer :</b>&nbsp;<select class="form-control" name="true_ans">
<option value="0" selected>Choose Correct Answer</option>
<option <?php if ($true_ans == '1') echo 'selected '; ?>value="1">Option A</option>
<option <?php if ($true_ans == '2') echo 'selected '; ?>value="2">Option B</option>
<option <?php if ($true_ans == '3') echo 'selected '; ?>value="3">Option C</option>
<option <?php if ($true_ans == '4') echo 'selected '; ?>value="4">Option D</option>
</select>
</div>
<div class="col-md-4">
<b>Enter Marks :</b> &nbsp;&nbsp;&nbsp;&nbsp;<input type="number" class="form-control" name="marks" placeholder="Enter Marks in Number" value="<?php echo $marks ;?>" required/>
</div>
<!--<div class="col-md-4">
<b>Enter Duration :</b> <input type="number" class="form-control" name="duration" placeholder="Enter Duration in Seconds" value="<?php echo $duration ;?>" required/>
</div>-->
</div>
<div class="row">
<div class="col-md-4">
<b>Status :&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
</b><select class="form-control" name="status">
<option value="1" <?php echo $active;?>>Active</option>
<option value="0" <?php echo $inactive;?>>Inactive</option>
</select>
</div>
</div>

<button class="btn btn-success" name="savequestion" value="Save Details" onclick="save_question(); return false;">
<i class="icon-save"></i>&nbsp;Update Question</button>
</form>        
</div>
<?php include('footer.php') ?>