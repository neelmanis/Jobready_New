<?php 
include('header.php');  
ob_start();
//echo "---><br/>".$username.$gotuid;
$getuid=$_REQUEST['uid'];
?>
<!-- Multiselect Start -->
<script type="text/javascript" src="js/prettify.js"></script>
<link rel="stylesheet" href="css/bootstrap-multiselect.css" type="text/css">
<script type="text/javascript" src="js/bootstrap-multiselect.js"></script>
<script type="text/javascript" src="js/bootstrap-multiselect-collapsible-groups.js"></script>
<script type="text/javascript">
            $(document).ready(function() {
                window.prettyPrint() && prettyPrint();
            });
</script>
<script type="text/javascript">
$(document).ready(function() {
$('#example-selectAllName').multiselect({
includeSelectAllOption: true,
selectAllName: 'select-all-name'
});
});
</script>
<!-- Multiselect over -->
<!-- date picker start -->
<link href="css/jquery-ui.css" rel="stylesheet" type="text/css"/>
<script src="js/jquery-ui.min.js"></script>
<script type="text/javascript">
 $(function() {
        $( "#job_from, #job_to" ).datepicker({
            defaultDate: "+1w",
            changeMonth: true,
            numberOfMonths: 2,
            onSelect: function( selectedDate ) {
                if(this.id == 'job_from'){
                  var dateMin = $('#job_from').datepicker("getDate");
                  var rMin = new Date(dateMin.getFullYear(), dateMin.getMonth(),dateMin.getDate() + 1); 
                  var rMax = new Date(dateMin.getFullYear(), dateMin.getMonth(),dateMin.getDate() + 62); 
                  $('#job_to').datepicker("option","minDate",rMin);
                  $('#job_to').datepicker("option","maxDate",rMax);                    
                }
                
            }
        });
    });
    </script>
<!-- date picker over -->
<!-- Keyword start -->
<link href="tag/bootstrap-tagsinput.css" rel="stylesheet">
<script src="tag/bootstrap-tagsinput-angular.min.js"></script>
<script src="tag/bootstrap-tagsinput-angular.js"></script>
<script src="tag/bootstrap-tagsinput.min.js"></script>
<script src="tag/bootstrap-tagsinput.js"></script>
<!-- Keyword over -->

<?php
$neelxz="SELECT `id`, `job_code`, `designation`, `keyword`, `job_desc`, `co_profile`, `salary_from`, `salary_to`, `job_from`, `job_to`, `area_of_interest`, `dept`, `status` FROM `master_job` WHERE `id`= $getuid";
$result = mysql_query($neelxz);
while($mysqlrow=mysql_fetch_array($result))
{ //print_r($mysqlrow);
$job_code=$mysqlrow['job_code'];
$job_designation=$mysqlrow['designation'];
$job_keyword=$mysqlrow['keyword'];
$job_description=$mysqlrow['job_desc'];
$co_profile=$mysqlrow['co_profile'];

$salary_from=$mysqlrow['salary_from'];
$salary_to=$mysqlrow['salary_to'];
$job_from=$mysqlrow['job_from'];
$job_to=$mysqlrow['job_to'];
$aoi=$mysqlrow['area_of_interest'];
$dept=$mysqlrow['dept'];

$status=$mysqlrow['status'];
if($mysqlrow['status']=="1"){$active="selected";}
if($mysqlrow['status']=="0"){$inactive="selected";}
}
?>
<?php
$savedetails=$_POST['savedetails'];
if($savedetails=='saveapp')
{
$job_code=trim($_POST['job_code']);
$job_designation=trim($_POST['job_designation']);
$job_keyword=trim($_POST['job_keyword']);
$job_description=trim($_POST['job_description']);
$co_profile=trim($_POST['co_profile']);
$salary_from=trim($_POST['salary_from']);
$salary_to=trim($_POST['salary_to']);
$job_from=trim($_POST['job_from']);
$job_to=trim($_POST['job_to']);
$aoi=trim($_POST['aoi']);
$dept=trim($_POST['dept']);
$job_status=trim($_POST['job_status']);

$neelx="UPDATE `master_job` SET `modified_date`=NOW(),`job_code`='$job_code',`designation`='$job_designation',`keyword`='$job_keyword',`job_desc`='$job_description',`co_profile`='$co_profile',`salary_from`='$salary_from',`salary_to`='$salary_to',`job_from`='$job_from',`job_to`='$job_to',`area_of_interest`='$aoi',`dept`='$dept',`status`='$job_status' WHERE `id` ='$getuid' " ;
$mysqlresults = mysql_query($neelx)or die(mysql_error());
//print $neelx;
if($mysqlresults){
header('location:manage_job.php');
}}
?>

<div class="container">
<h4 class="page-header">
<span class="glyphicon glyphicon-user"></span>&nbsp;Add Job <?php if(isset($signup_error)){ echo '<span style="color: red;" />'.$signup_error.'</span>';} ?></h4>
<form action=""  method="post" name="newapp" id="newapp" onsubmit="return checkForm(this);">
<input type="hidden" name="savedetails" value="saveapp">
<div class="row">
<div class="span6">
<b>Job Code :</b> <input type="text" class="form-control" name="job_code" value="<?php echo $job_code; ?>" Placeholder="Please Enter Job Code" required >       
</div>
<div class="span6">
<b>Designation :</b> <input type="text" class="form-control" name="job_designation" value="<?php echo $job_designation; ?>" Placeholder="Please Enter Designation" required />
</div>
</div>
<div class="row">
<div class="span12">
<b>Keywords :</b> <input type="text" class="input-xlarge" name="job_keyword" id="job_keyword" data-role="tagsinput" value="<?php echo $job_keyword ;?>" required>
</div>
</div>
<div class="row">
<div class="span12">
<b>Job description :</b> <textarea class="form-control" name="job_description" rows="5" id="job_description" style="margin: 0px 0px 10px; width: 933px; height: 100px;" Placeholder="Please Enter Job description" required><?php echo $job_description ;?></textarea>  
</div>
</div>
<div class="row">
<div class="span12">
<b>Company Profile :</b> <textarea class="form-control" name="co_profile" rows="5" id="co_profile" style="margin: 0px 0px 10px; width: 933px; height: 100px;" Placeholder="Please Enter Company Profile" required><?php echo $co_profile ;?></textarea>  
</div>
</div>
<div class="row">
<div class="span6">
<b>Salary Range :</b> <input type="number" class="form-control" name="salary_from" value="<?php echo $salary_from; ?>" Placeholder="Please Enter Salary" required>       
</div>
<div class="span6">
<input type="number" class="form-control" name="salary_to" value="<?php echo $salary_to; ?>" Placeholder="Please Enter Salary" required/>
</div>
</div>
<div class="row">
<div class="span6">
<b>Job From :</b> <input type="text" class="form-control" name="job_from" id="job_from" value="<?php echo $job_from; ?>" Placeholder="Job From" required>  
</div>
<div class="span6">
<b>Job To :</b> <input type="text" class="form-control" name="job_to" id="job_to" value="<?php echo $job_to; ?>" Placeholder="Job To" required />
</div>
</div>
<div class="row">
<div class="span6">
<b>Area Of Interest :</b>
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
$neelxz = fetch('SELECT `id`,`areas_of_interest`, `status` FROM `area_of_interest_master` WHERE `status`=1 ORDER BY areas_of_interest ASC');
?>
<select class="form-control" name="aoi">
<?php for($i=0;$i<count($neelxz);$i++) { ?>
<option value="<?php echo $neelxz[$i]['id'];?>" <?php if($neelxz[$i]['id']== $aoi) echo 'selected="selected"' ;?>><?php echo $neelxz[$i]['areas_of_interest'] ; ?></option>
<?php  } ?>
</select>
</div>
<div class="span6">
<b>Department :</b> <input type="text" class="form-control" name="dept" value="<?php echo $dept; ?>" Placeholder="Department" required />
</div>
</div>
<div class="row">
<div class="span6">
<b>Status :</b> <select class="form-control" name="job_status">
<option value="1" <?php echo $active;?>>Active</option>
<option value="0" <?php echo $inactive;?>>Inactive</option>
</select>
</div>
</div>

<br/>
<button class="btn btn-success" name="savejob" value="Save Details" onclick="save_job(); return false;">
<i class="icon-save"></i>&nbsp;Update Job</button>
</form>        
</div>
<?php  //ob_end_flush(); ?>
<?php include('footer.php'); ?>