<?php include('header.php');  ?>
<?php
$savedetails=$_POST['savedetails'];
if($savedetails=='saveapp')
{
$city=trim(strtoupper($_POST['city']));
$status=trim($_POST['status']);

$sqlx="SELECT city from master_city  WHERE city='$city'";
$result = mysql_query($sqlx);
$mysqlrow=mysql_fetch_array($result);
$getCity=$mysqlrow['city'];
//print_r($mysqlrow); 

if(empty($city))
{$signup_error="Please Enter City";}
elseif(preg_match('/^[0-9 .\-]+$/i', $city)) 
{$signup_error= 'City Name is not valid';}
elseif($getCity == $city)
{$signup_error="City Name Already Exist";}
else{
$neelx="INSERT INTO `master_city`(`id`, `post_date`, `city`, `status`) VALUES ('',NOW(),'$city','$status')";
$mysqlresults = mysql_query($neelx)or die(mysql_error());
if($mysqlresults){
header('location:city.php');
}
}}
?>

<div class="container">
<h4 class="page-header">
<span class="glyphicon glyphicon-user"></span>&nbsp;Add City <?php if(isset($signup_error)){ echo '<span style="color: red;" />'.$signup_error.'</span>';} ?></h4>
<form action=""  method="post" name="newapp" id="newapp" onsubmit="return checkForm(this);">
<input type="hidden" name="savedetails" value="saveapp">
<div class="row">
<div class="col-md-6">
<b>City :</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="text" class="form-control" name="city"/>
</div>
<div class="col-md-6">
<b>Status :</b>&nbsp;&nbsp;<select class="form-control" name="status">
<option value="1">Active</option>
<option value="0">Inactive</option>
</select>
</div>
</div>
<br/>
<button class="btn btn-success" name="savecity" value="Save Details" onclick="save_city(); return false;">
<i class="icon-save"></i>&nbsp;Add City</button>
</form>        
</div>
<?php include('footer.php') ?>