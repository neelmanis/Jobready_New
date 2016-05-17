<?php include('header.php');   
//echo "---><br/>".$username.$gotuid;
$getuid=$_REQUEST['uid'];
?>

<?php
$neelxz="SELECT * FROM `master_city` Where `id`= $getuid";
$result = mysql_query($neelxz);
$mysqlrow=mysql_fetch_array($result);
 //print_r($mysqlrow);
$city=$mysqlrow['city'];
$status=$mysqlrow['status'];
if($mysqlrow['status']=="1"){$active="selected";}
if($mysqlrow['status']=="0"){$inactive="selected";}
?>

<?php
$savedetails=$_POST['savedetails'];
if($savedetails=='saveapp')
{
$city=trim(strtoupper($_POST['city']));
$status=trim($_POST['status']);

if(empty($city))
{$signup_error="Please Enter City";}
elseif(preg_match('/^[0-9 .\-]+$/i', $city))
{$signup_error= 'City Name is not valid';}
else{
$neelx="UPDATE `master_city` SET `modified_date`=NOW(),`city`='$city',`status`='$status' WHERE `id` ='$getuid'";
$mysqlresults = mysql_query($neelx)or die(mysql_error());
if($mysqlresults){
header('location:city.php');
}}}
?>
<div class="container">
<h4 class="page-header">
<span class="glyphicon glyphicon-user"></span>&nbsp;Update City <?php if(isset($signup_error)){ echo '<span style="color: red;" />'.$signup_error.'</span>';} ?></h4>
<form action=""  method="post" name="newapp" id="newapp" onsubmit="return checkForm(this);">
<input type="hidden" name="savedetails" value="saveapp">
<div class="row">
<div class="col-md-6">
<b>City :</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" class="form-control" name="city" value="<?php echo $city;?>"/>
</div>
<div class="col-md-6">
<b>Status :</b>&nbsp;&nbsp;<select class="form-control" name="status">
<option value="1" <?php echo $active;?>>Active</option>
<option value="0" <?php echo $inactive;?>>Inactive</option>
</select>
</div>
</div>
<br/>
<button class="btn btn-success" name="savecity" value="Save Details" onclick="save_city(); return false;">
<i class="icon-save"></i>&nbsp;Update city</button>
</form>        
</div>
<?php include('footer.php'); ?>