<?php 
include('header.php');   
//echo "---><br/>".$username.$gotuid;
$id=$_REQUEST['uid'];
?>
<?php
$neelxz="SELECT `id`, `question`,`true_ans`, `status` FROM `cms_quest_ans` WHERE `id`= $id";
$result = mysql_query($neelxz);
$mysqlrow=mysql_fetch_array($result);
$question=$mysqlrow['question'];
$true_ans=$mysqlrow['true_ans'];
$status=$mysqlrow['status'];
if($mysqlrow['status']=="1"){$active="selected";}
if($mysqlrow['status']=="0"){$inactive="selected";}
?>
<?php
$savedetails=$_POST['savedetails'];
if($savedetails=='saveapp')
{ //print_r($_POST);
$question=mysql_real_escape_string($_POST['question']);
//$true_ans=mysql_real_escape_string($_POST['answer']);
$true_ans = ereg_replace( "\n","<br/>", $_POST['answer']);
$status=trim($_POST['status']);

$neelx="UPDATE `cms_quest_ans` SET `modified_date`=NOW(),`question`='$question',`true_ans`='$true_ans',`status`='$status' WHERE `id`= $id";
$mysqlresults = mysql_query($neelx)or die(mysql_error());
 //print $neelx;
if($mysqlresults){
header('location:ques_ans.php');
?>
<?php
}}
?>
<div class="container">
<h4 class="page-header">
<span class="glyphicon glyphicon-user"></span>&nbsp;Update Question & Answer <?php if(isset($signup_error)){ echo '<span style="color: red;" />'.$signup_error.'</span>';} ?></h4>
<form action=""  method="post" name="newapp" id="newapp" onsubmit="return checkForm(this);">
<input type="hidden" name="savedetails" value="saveapp">
<div class="row">
<div class="col-md-6">
<b>Enter Question :</b> <textarea class="input-xxlarge" name="question" rows="3" id="question" placeholder="Enter Question" required><?php echo preg_replace("/(<br\s*\/?>\s*)+/", '',$question);?></textarea>
</div>
</div>
<div class="row">
<div class="col-md-6">
<b>Enter Answer :</b> &nbsp;&nbsp;&nbsp;<textarea class="input-xxlarge" name="answer" rows="5" id="answer" placeholder="Enter Answer Here.."><?php echo preg_replace("/(<br\s*\/?>\s*)+/", '',$true_ans);?></textarea>
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
<i class="icon-save"></i>&nbsp;Update</button>
</form>        
</div>
<?php include('footer.php') ?>