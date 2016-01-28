<?php 
include("header.php");
include("menu.php");
$registration_id=$_SESSION['registration_id'];  
?>

<!---------------------------------- container starts -------------------------------->
<div class="page_title"><span>welcome <?php echo getUserName($conn,$registration_id)?></span></div>
<div class="inner_conainer">
<div class="exam_wrap fade_anim">
   
<div class="quest_box">
<form class="form-signin" method="POST" id='signin' name="signin" action="online_exam_ib.php">
<div class="form-group">
<select class="form-control" name="category" id="category">
<option value="">Choose your Subject</option>
<?php
$result=$conn->query("SELECT id,subject FROM `master_subject_list` where is_compulsory = '0'");
while($row=$result->fetch_assoc())
{
$sub_id=$row['id']; // if u want to send id
$get_subject=$row['subject'];
echo "<option value='".$sub_id ."'>$get_subject</option>";	
}
?>
</select>
</div>
<br>
<button class="btn btn-success btn-block" type="submit">Submit</button>
</form>
</div>
</div>
</div>

<div class="ad_banner"><a href="#"><img src="images/ad_banner.jpg" alt="" /></a></div>
<?php include("footer.php");?>
</body></html>