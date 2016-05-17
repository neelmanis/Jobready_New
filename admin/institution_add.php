<?php include('header.php');  //echo "---><br/>".$username.$gotuid;?>
<?php$savedetails=$_POST['savedetails'];if($savedetails=='saveapp'){$user_institution=trim(strtoupper($_POST['institution']));$institution_status=trim($_POST['institution_status']);$sqlx="SELECT institution from master_institution  WHERE institution='$user_institution'";$result = mysql_query($sqlx);$mysqlrow=mysql_fetch_array($result);$getInstitution=$mysqlrow['institution'];
if(empty($user_institution)){$signup_error="Please Enter Institution";}elseif(preg_match('/^[0-9 .\-]+$/i', $user_institution)) {$signup_error= 'Institution Name is not valid';}elseif($getInstitution == $user_institution){$signup_error="Institution Already Exist";}else{//$donexx=0;$neelx="INSERT INTO `master_institution`(`id`, `post_date`, `institution`, `status`) VALUES ('',NOW(),'$user_institution','$institution_status')";$mysqlresults = mysql_query($neelx)or die(mysql_error()); //print $neelx;if($mysqlresults){header('location:institution.php');//$donexx=1;?><!--<br/><div class="alert alert-success"><strong>Success!</strong>New Interest Added Successfully.</div>--><?php}}}//if($donexx==0)//{?>
<div class="container"><h4 class="page-header">
<span class="glyphicon glyphicon-user"></span>&nbsp;Add Institution <?php if(isset($signup_error)){ echo '<span style="color: red;" />'.$signup_error.'</span>';} ?></h4>
<form action=""  method="post" name="newapp" id="newapp" onsubmit="return checkForm(this);">
<input type="hidden" name="savedetails" value="saveapp">
<div class="row">
<div class="col-md-6">
<b>Institution :</b> <input type="text" class="form-control" name="institution"/>
</div>
<div class="col-md-6">
<b>Status :</b>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<select class="form-control" name="institution_status">
<option value="1">Active</option>
<option value="0">Inactive</option>
</select>
</div>
</div>

<br/>
<button class="btn btn-success" name="saveinstitution" value="Save Details" onclick="save_institution(); return false;">
<i class="icon-save"></i>&nbsp;Add Institution</button>
</form>        
</div>
<?php //} ?>
<?php include('footer.php') ?>