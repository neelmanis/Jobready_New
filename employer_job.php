<?php include("header.php");?>
<?php 
	$registration_id=$_SESSION['registration_id'];
	if(!isset($_SESSION['registration_id']) || actor_type($conn,$registration_id)!="F")
			header('location:index.php');
?>
<?php include("menu.php");?>
<script type="text/javascript">
$(document).ready(function(){
$("form" ).on( "submit", function( event ) {
  event.preventDefault();
  formData=$(this).serialize();
  $.ajax({
		  type:"POST",
		  url:"employer_job_inc.php",
		  data:formData,
		  dataType: 'JSON',
		  dataType:'html',
		  success:function(data)
			{	
				//alert(data);
				var data = $.parseJSON(data);
				if($.trim(data.error_msg)!="success")
				{	
					$('.login').show().html(data.error_msg);
					$('html, body').animate({scrollTop: "0px"}, 800);
				}
				else
					window.location.href=data.url;
			}
		});
});
});
</script>
<!---------------- Keyword Start -------------------->
<link href="css/keyword.css" rel="stylesheet" />
<script src="js/jquery.tags.js"></script>
<script>
	jQuery(document).ready(function($){
		$('input.tags').tags({
			separator:   ',',
			maxTagWords: 0,
			tagAdded:    function(tag) { console.log('Tag added:'+tag); },
			tagRemoved:  function(tag) { console.log('Tag removed:'+tag); }
		});
		/* Hide the little text we put for users with no javascript enabled */
		$('.tag-help').hide();
	});
</script>
<!---------------- Keyword End -------------------->
<script type="text/javascript">
$(document).ready(function() {
    $('#example').DataTable({
    "bLengthChange": false,
	"iDisplayLength": 10
	});
});
</script>
<script src="js/jquery.dataTables.min.js"></script>
<link rel="stylesheet" type="text/css" href="css/jquery.dataTables.min.css"/>

<!-- xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx Date Picker Start  xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx -->
<script language="JavaScript" src="js/jquery.datepick.js" type="text/javascript"></script>
<link type="text/css" rel="stylesheet" href="css/jquery.datepick.css">
<script>
$(document).ready(function () {
	$('#configPicker1').datepick({showTrigger: '#calImg', dateFormat:'dd-mm-yyyy'});
	$('#configPicker2').datepick({showTrigger: '#calImg', dateFormat:'dd-mm-yyyy'});
});    
</script>
<!-- xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx Date Picker End  xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx -->
<?php 
$jobId = $_REQUEST['jobId'];
$result=$conn->query("select * from master_job where registration_id='$registration_id' and id='$jobId'");
$row=$result->fetch_assoc();
?>

<!-- -------------------------------- container starts ------------------------------ -->
<div class="page_title"><span>welcome <?php echo getUserName($conn,$registration_id)?></span></div>
<div class="inner_conainer" >
  <?php include("employer_dashboard_link.php");?>
  <div class="dashboard_right fade_anim">
    <div class="content_head">add job</div>
    <ul class="login" style="display:none;"></ul>
    <div class="form_wrap">
    <form action="" name="addTraining" id="addTraining" method="post">
      <div class="textfield"> <span>Job Code<sup>*</sup></span>
        <div class="fields">
          <input type="text" name="job_code" id="job_code" value="<?php echo $row['job_code'];?>" />
        </div>
      </div>
      <div class="textfield mar_left"> <span>Designation<sup>*</sup></span>
        <div class="fields">
          <input type="text" name="designation" id="designation" value="<?php echo $row['designation'];?>" />
        </div>
      </div>
	  <div class="textfield"> <span>Job Title<sup>*</sup></span>
        <div class="fields">
          <input type="text" name="job_title" id="job_title" value="<?php echo $row['job_title'];?>" />
        </div>
      </div>
      <div class="textfield_1"> <span>keywords<sup>*</sup></span>
        <div class="fields">
        	<input class="tags" type="text" name="keyword" id="keyword" value="<?php echo $row['keyword'];?>"/>
        </div>
      </div>
      <div class="textfield_1"> <span>Job description<sup>*</sup></span>
        <div class="fields">
          <textarea name="job_desc" id="job_desc"><?php echo $row['job_desc'];?></textarea>
        </div>
      </div>
      <div class="textfield_1"> <span>Company Profile<sup>*</sup></span>
        <div class="fields">
          <textarea name="co_profile" id="co_profile"><?php if($jobId!=""){echo $row['co_profile'];}else{ echo getCompanyProfile($conn,$registration_id);}?></textarea>
        </div>
      </div>
	  
	  <div class="textfield"> <span>Salary Min.<sup></sup></span>
        <div class="fields">
          <input type="text" name="minimal" value="<?php echo $row['salary_from'];?>" />
        </div>
      </div>
      <div class="textfield mar_left"> <span>Salary Max<sup></sup></span>
        <div class="fields">
          <input type="text" name="maxval" value="<?php echo $row['salary_to'];?>" />
        </div>
      </div>
	
      <div class="textfield"> <span>Expected Start date <sup>*</sup></span>
        <div class="fields">
          <input type="text" name="job_from" id="configPicker1" value="<?php echo $row['job_from'];?>" />
        </div>
      </div>
      <div class="textfield mar_left"> <span>Reporting  to<sup></sup></span>
        <div class="fields">
          <input type="text" name="job_to" value="<?php echo $row['job_to'];?>" />
        </div>
      </div>
	  
      <div class="textfield"> <span>Job Category<sup>*</sup></span>
        <div class="fields">
          <select name="area_of_interest" id="area_of_interest">
          <option value="">--Select Category--</option>
			<?php 
            	$result1=$conn->query("select * from master_interest_area where status=1");
            	while($row1=$result1->fetch_assoc()){
            ?>
            	<option value="<?php echo $row1['id'];?>" <?php if($row1['id']==$row['area_of_interest'])echo 'selected="selected"';?>><?php echo $row1['area_of_interest'];?></option>
            <?php }?>
          </select>
        </div>
      </div>
      <div class="textfield mar_left"> <span>Location<sup>*</sup></span>
        <div class="fields">
        <select name="job_location" id="job_location">
            <option value="">---Select City/Town---</option>
            <?php 
            $city_result=$conn->query("select * from master_city where status=1");
            while($city_row=$city_result->fetch_assoc()){
            ?>
              <option value="<?php echo $city_row['id'];?>" <?php if($city_row['id']==$row['job_location'])echo 'selected="selected"';?> ><?php echo $city_row['city'];?></option>
              <?php }?>
        </select>
        </div>
      </div>
	  <div class="textfield"> <span>Min. Experience<sup></sup></span>
        <div class="fields">
          <input type="number" name="min_exp" Placeholder="Min Experience in Years" value="<?php echo $row['min_exp'];?>" />
        </div>
      </div>
	  <div class="textfield mar_left"> <span>No. Of Jobs<sup></sup></span>
        <div class="fields">
          <input type="text" name="no_job" value="<?php echo $row['no_job'];?>" />
        </div>
      </div>
        <div class="clear"></div>
        <input type="hidden" name="action" value="addjob"/>
        <input type="hidden" name="jobId" id="jobId" value="<?php echo $_REQUEST['jobId'];?>"/>
        <input type="submit" name="" value="Job Submission" class="view_more"/>
        <div class="clear"></div>
      </form>
      
      <div class="clear" style="height:50px;"></div>
      <div class="content_head">posted job</div>
      <div class="table_job" id="no-more-tables-job">
        <div class="clear"></div>
        <table class="table-bordered-job table-striped table-condensed-job cf" id="example">
          <thead>
            <tr>
			  <th>Date </th>
			  <th>Title</th>
              <th>Designation </th>
              <th> Job description </th>
              <th> Location</th>
              <th> view</th>
              <th> edit </th>
            </tr>
          </thead>
          <tbody>
			<?php 
			$result=$conn->query("select * from master_job where registration_id='$registration_id' and status=1");
			while($row=$result->fetch_assoc()){
				$post_date=$row['post_date'];
				$date=date('d-m-Y',strtotime($post_date));
				$desc=$row['job_desc'];
			?>
            <tr>
			  <td data-title="Date"><?php echo $date;?></td>
			  <td data-title="Title"><?php echo $row['job_title'];?></td>
              <td data-title="Post"><?php echo $row['designation'];?></td>
              <td data-title="Job description"><?php echo $post = substr($desc, 0, 80); ?></td>
              <td data-title="Job Location"><?php echo getCityName($conn,$row['job_location']);?></td>
              <td data-title="view"><a href="view_employer_job.php?uid=<?php echo $row['id'];?>"><img src="images/view_icon.png" /></a></td>
              <td data-title="Edit"><a href="employer_job.php?jobId=<?php echo $row['id'];?>"><img src="images/edit_icon.png" /></a></td>
            </tr>
            <?php }?>
          </tbody>
        </table>
        <div class="clear"></div>
      </div>
      <div class="clear"></div>
    </div>
  </div>
  <div class="clear"></div>
</div>
<!-- -------------------------------- container ends ------------------------------ -->
<?php include("footer.php");?>
</body>
</html>