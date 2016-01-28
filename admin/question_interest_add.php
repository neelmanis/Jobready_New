<?php 
include('header.php');  
//echo "---><br/>".$username.$gotuid;
?>

<?php
$savedetails=$_POST['savedetails'];
if($savedetails=='saveapp')
{
//	print_r($_POST);
$interest=trim($_POST['interest']);
$question=mysql_real_escape_string($_POST['question']);
$option1=trim($_POST['option1']);
$option2=trim($_POST['option2']);
$option3=trim($_POST['option3']);
$option4=trim($_POST['option4']);
$true_ans=trim($_POST['true_ans']);
$marks=trim($_POST['marks']);
$duration=trim($_POST['duration']);
$status=trim($_POST['status']);

if(empty($question))
{$signup_error= "Please Enter Question";}
elseif(empty($option1))
{$signup_error= "Please Enter Option A";}
elseif(empty($option2))
{$signup_error= "Please Enter Option B";}
elseif(empty($option3))
{$signup_error= "Please Enter Option C";}
elseif(empty($option4))
{$signup_error= "Please Enter Option D";}
elseif(empty($true_ans) && $true_ans==0)
{$signup_error= "Please Choose Correct Answer";}
elseif(empty($marks))
{$signup_error= "Please Enter Marks";}
/*elseif(empty($duration))
{$signup_error= "Please Enter Duration";}*/
else{
$neelx="INSERT INTO `master_interest_question`(`id`, `sub_id`,`post_date`, `question`, `option1`, `option2`, `option3`, `option4`, `true_ans`, `marks`, `duration`, `status`) VALUES ('','$interest',NOW(),'$question','$option1','$option2','$option3','$option4','$true_ans','$marks','$duration','$status')";
$mysqlresults = mysql_query($neelx)or die(mysql_error());
 //print $neelx;
if($mysqlresults){
header('location:question_interest.php');
?>
<?php
}}}
?>

<div class="container">
<h4 class="page-header">
<span class="glyphicon glyphicon-user"></span>&nbsp;Add Interest Based Question <?php if(isset($signup_error)){ echo '<span style="color: red;" />'.$signup_error.'</span>';} ?></h4>
<form action=""  method="post" name="newapp" id="newapp" onsubmit="return checkForm(this);">
<input type="hidden" name="savedetails" value="saveapp">
<div class="row">
<div class="col-md-6">
<b>Select Interest :</b>&nbsp; 
<select class="form-control" name="interest">
<?php
$neelxz="SELECT `id`, `area_of_interest` FROM `master_interest_area` WHERE `is_compulsory`='0' and `status`=1 ORDER BY area_of_interest ASC";
$result = mysql_query($neelxz);
while($mysqlrow=mysql_fetch_array($result))
{
	$id=$mysqlrow['id'];
	$get_interest=$mysqlrow['area_of_interest'];
	echo "<option value='".$id ."'>$get_interest</option>";
}?>
</select>
</div>
<div class="col-md-6">
<b>Enter Question :</b> <textarea class="input-xxlarge" name="question" rows="5" id="question" placeholder="Enter Question Here.."><?php echo $question;?></textarea>
</div>
</div>
<div class="row">
<div class="col-md-6">
<b>Enter Option A :</b> <input type="text" class="input-xxlarge" name="option1" placeholder="Enter Option A" value="<?php echo $option1 ;?>"/>
</div>
<div class="col-md-6">
<b>Enter Option B :</b> <input type="text" class="input-xxlarge" name="option2" placeholder="Enter Option B" value="<?php echo $option2 ;?>"/>
</div>
</div>
<div class="row">
<div class="col-md-6">
<b>Enter Option C :</b> <input type="text" class="input-xxlarge" name="option3" placeholder="Enter Option C" value="<?php echo $option3 ;?>"/>
</div>
<div class="col-md-6">
<b>Enter Option D :</b> <input type="text" class="input-xxlarge" name="option4" placeholder="Enter Option D" value="<?php echo $option4 ;?>"/>
</div>
</div>

<div class="row">
<div class="col-md-4">
<b>Correct Answer :</b>&nbsp;<select class="form-control" name="true_ans">
<option value="0" selected>Choose Correct Answer</option>
<option <?php if ($_POST['true_ans'] == '1') echo 'selected '; ?>value="1">Option A</option>
<option <?php if ($_POST['true_ans'] == '2') echo 'selected '; ?>value="2">Option B</option>
<option <?php if ($_POST['true_ans'] == '3') echo 'selected '; ?>value="3">Option C</option>
<option <?php if ($_POST['true_ans'] == '4') echo 'selected '; ?>value="4">Option D</option>
</select>
</div>
<div class="col-md-4">
<b>Enter Marks :</b> &nbsp;&nbsp;&nbsp;&nbsp;<input type="number" class="form-control" name="marks" placeholder="Enter Marks in Number" value="<?php echo $marks ;?>"/>
</div>
<!--<div class="col-md-4">
<b>Enter Duration :</b> <input type="number" class="form-control" name="duration" placeholder="Enter Duration in Seconds" value="<?php echo $duration ;?>"/>
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
<i class="icon-save"></i>&nbsp;Add Question</button>
</form>        
</div>
<?php include('footer.php') ?>