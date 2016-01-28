<?php 

include('header.php');  

//ob_start();

//echo "---><br/>".$username.$gotuid;

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

<link href="datepicker/css/datepicker.css" rel="stylesheet" type="text/css" />

<script src="datepicker/js/bootstrap-datepicker.js"></script>

<script>

$(document).ready(function () {

                $('#job_from').datepicker({

                minDate: 0,

                autoclose: true, 

                todayHighlight: true,

                format: "dd-mm-yyyy"

                });  

            });    

</script>

<script>

		$(function(){

			window.prettyPrint && prettyPrint();		



        // disabling dates

        var nowTemp = new Date();

        var now = new Date(nowTemp.getFullYear(), nowTemp.getMonth(), nowTemp.getDate(), 0, 0, 0, 0);



        var checkin = $('#job_from').datepicker({

          onRender: function(date) {

            return date.valueOf() < now.valueOf() ? 'disabled' : '';

          }

        }).on('changeDate', function(ev) {

          if (ev.date.valueOf() > checkout.date.valueOf()) {

            var newDate = new Date(ev.date)

            newDate.setDate(newDate.getDate() + 1);

            checkout.setValue(newDate);

          }

          checkin.hide();

          $('#job_to')[0].focus();

        }).data('datepicker');

        /* var checkout = $('#job_to').datepicker({

          onRender: function(date) {

            return date.valueOf() <= checkin.date.valueOf() ? 'disabled' : '';

          }

        }).on('changeDate', function(ev) {

          checkout.hide();

        }).data('datepicker'); */

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

$savedetails=$_POST['savedetails'];

if($savedetails=='saveapp')

{

//print_r($_POST);

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

$job_location=trim($_POST['job_location']);

$job_status=trim($_POST['job_status']);



$neelx="INSERT INTO `master_job`(`id`, `registration_id`, `admin_id`, `post_date`,`job_code`, `designation`, `keyword`, `job_desc`, `co_profile`, `salary_from`, `salary_to`, `job_from`, `job_to`, `area_of_interest`, `job_location`, `status`) VALUES ('','','$gotuid',NOW(),'$job_code','$job_designation','$job_keyword','$job_description','$co_profile','$salary_from','$salary_to','$job_from','$job_to','$aoi','$job_location','$job_status')";

$mysqlresults = mysql_query($neelx);

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

<b>Job Code :</b>&nbsp; <input type="text" class="form-control" name="job_code" value="<?php echo $job_code; ?>" Placeholder="Please Enter Job Code" required />       

</div>

<div class="span6">

<b>Designation :</b> <input type="text" class="form-control" name="job_designation" value="<?php echo $job_designation; ?>" Placeholder="Please Enter Designation" required />

</div>

</div>

<div class="row">

<div class="span12">

<b>Keywords :</b> <input type="text" class="input-xlarge" name="job_keyword" id="job_keyword" Placeholder="Please Enter Keywords" data-role="tagsinput" value="<?php echo $job_keyword ;?>" required>  

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

<b>Job From :</b> <input type="text" class="form-control" name="job_from" id="job_from" value="<?php echo $job_from; ?>" Placeholder="Job From" required />  

</div>

<div class="span6">

<b>Reporting To :</b> <input type="text" class="form-control" name="job_to" id="job_to" value="<?php echo $job_to; ?>" Placeholder="Reporting To" required />

</div>

</div>

<div class="row">

<div class="span6">

<b>Select Job Category :</b>

<select class="form-control" name="aoi">
<option value="">--Select Category--</option>
<?php

$neelxz="SELECT `id`,`area_of_interest`, `status` FROM `master_interest_area` WHERE `status`=1 ORDER BY area_of_interest ASC";

$result = mysql_query($neelxz);

while($mysqlrow=mysql_fetch_array($result))

{ //print_r($mysqlrow);

$getID=$mysqlrow['id'];

$areas_of_interest=$mysqlrow['area_of_interest'];

echo "<option value='".$getID ."'>$areas_of_interest</option>";

}?>

</select>

<!--

<select id="example-selectAllName" multiple="multiple"  name="aoi[]">

<?php /*

$neelxz="SELECT `id`,`areas_of_interest`, `status` FROM `area_of_interest_master` WHERE `status`=1 ORDER BY areas_of_interest ASC";

$result = mysql_query($neelxz);

while($mysqlrow=mysql_fetch_array($result))

{ //print_r($mysqlrow);

$getID=$mysqlrow['id'];

$areas_of_interest=$mysqlrow['areas_of_interest'];

echo "<option value='$getID'>$areas_of_interest</option>";

} */?>

</select> -->

</div>

<div class="span6">

<b>Job Location :</b> <input type="text" class="form-control" name="job_location" value="<?php echo $job_location; ?>" Placeholder="Job Loaction" required />

</div>

</div>

<div class="row">

<div class="span6">

<b>Status :</b> <select class="form-control" name="job_status">

<option value="1">Active</option>

<option value="0">Inactive</option>

</select>

</div>

</div>



<br/>

<button class="btn btn-success" name="savejob" value="Save Details" onclick="save_job(); return false;">

<i class="icon-save"></i>&nbsp;Add Job</button>

</form>        

</div>



<?php // ob_end_flush(); ?>

<?php include('footer.php'); ?>