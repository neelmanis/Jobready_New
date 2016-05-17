<?php 
include('header.php');   
//echo "---><br/>".$username.$gotuid;
?>
<?php
$savedetails=$_POST['savedetails'];
if($savedetails=='saveapp')
{
//$question=mysql_real_escape_string($_POST['question']);
//$true_ans=mysql_real_escape_string($_POST['answer']);
$question = ereg_replace( "\n","<br/>", $_POST['question']);
$true_ans = ereg_replace( "\n","<br/>", $_POST['answer']);
$status=trim($_POST['status']);

if(empty($question))
{$signup_error= "Please Enter Question";}
elseif(empty($true_ans))
{$signup_error= "Please Enter Answer";}
else{
echo $neelx="INSERT INTO `cms_quest_ans`(`id`,`post_date`, `question`, `true_ans`,`status`) VALUES ('',NOW(),'$question','$true_ans','$status')"; 
$mysqlresults = mysql_query($neelx)or die(mysql_error());
if($mysqlresults){
header('location:ques_ans.php'); 
?>
<?php
}}}
?>
<div class="container">
<h4 class="page-header">
<span class="glyphicon glyphicon-user"></span>&nbsp;Add Question & Answer <?php if(isset($signup_error)){ echo '<span style="color: red;" />'.$signup_error.'</span>';} ?></h4>
<form action=""  method="post" name="newapp" id="newapp" onsubmit="return checkForm(this);">
<input type="hidden" name="savedetails" value="saveapp">
<div class="row">
<div class="col-md-4">
<b>Enter Question :</b> <textarea class="input-xxlarge" name="question" rows="3" id="question" placeholder="Enter Question Here.."><?php echo $question;?></textarea>
</div>
</div>
<div class="row">
<div class="col-md-4">
<b>Enter Answer :</b> &nbsp;&nbsp;&nbsp;<textarea class="input-xxlarge" name="answer" rows="5" id="answer" placeholder="Enter Answer Here.."><?php echo $answer;?></textarea>
</div>
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