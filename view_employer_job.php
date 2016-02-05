<?php include("header.php");?>
<?php include("menu.php");?>
<?php  $registration_id=$_SESSION['registration_id'];?>
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
$uid = $_REQUEST['uid'];
$result=$conn->query("select * from master_job where registration_id='$registration_id' and id='$uid'");
$row=$result->fetch_assoc();
?>


<!-- -------------------------------- container starts ------------------------------ -->
<div class="page_title"><span>welcome <?php echo getUserName($conn,$registration_id)?></span></div>
<div class="inner_conainer" >
  <?php include("employer_dashboard_link.php");?>
  <div class="dashboard_right fade_anim">
    <div class="content_head">View job</div>
    <ul class="login" style="display:none;"></ul>
    <div class="form_wrap">
    <form action="" name="addTraining" id="addTraining" method="post">
      <div class="textfield"> <span>Job Code<sup>*</sup></span>
        <div class="fields">
          <input type="text" name="job_code" id="job_code" value="<?php echo $row['job_code'];?>" disabled/>
        </div>
      </div>
      <div class="textfield mar_left"> <span>Designation<sup>*</sup></span>
        <div class="fields">
        <input type="text" name="designation" id="designation" value="<?php echo $row['designation'];?>" disabled/>
        </div>
      </div>
      <div class="textfield_1"> <span>keywords<sup>*</sup></span>
        <div class="fields">
	<textarea name="keyword" id="keyword" disabled/><?php echo $row['keyword'];?></textarea>
        </div>
      </div>
      <div class="textfield_1"> <span>Job description<sup>*</sup></span>
        <div class="fields">
          <textarea name="job_desc" id="job_desc" disabled><?php echo $row['job_desc'];?></textarea>
        </div>
      </div>
      <div class="textfield_1"> <span>Company Profile<sup>*</sup></span>
        <div class="fields">
          <textarea name="co_profile" id="co_profile" disabled><?php if($jobId!=""){echo $row['co_profile'];}else{ echo getCompanyProfile($conn,$registration_id);}?></textarea>
        </div>
      </div>
     
	  <div class="textfield"> <span>Salary Min.<sup></sup></span>
        <div class="fields">
          <input type="text" name="minimal" value="<?php echo $row['salary_from'];?>" disabled/>
        </div>
      </div>
      <div class="textfield mar_left"> <span>Salary Max<sup></sup></span>
        <div class="fields">
          <input type="text" name="maxval" value="<?php echo $row['salary_to'];?>" disabled/>
        </div>
      </div>
	
      <div class="textfield"> <span>Expected Start date <sup>*</sup></span>
        <div class="fields">
          <input type="text" name="job_from" id="configPicker1" value="<?php echo $row['job_from'];?>" disabled/>
        </div>
      </div>
      <div class="textfield mar_left"> <span>Reporting  to<sup></sup></span>
        <div class="fields">
          <input type="text" name="job_to" value="<?php echo $row['job_to'];?>" disabled />
        </div>
      </div>
	  
      <div class="textfield"> <span>Job Category<sup>*</sup></span>
        <div class="fields">
          <select name="area_of_interest" id="area_of_interest" disabled/>
          <option value="">--Select Category--</option>
			<?php 
            	$result1=$conn->query("select * from master_area_of_interest where status=1");
            	while($row1=$result1->fetch_assoc()){
            ?>
            	<option value="<?php echo $row1['id'];?>" <?php if($row1['id']==$row['area_of_interest'])echo 'selected="selected"';?>><?php echo $row1['subject'];?></option>
            <?php }?>
          </select>
        </div>
      </div>
      <div class="textfield mar_left"> <span>Location<sup>*</sup></span>
        <div class="fields">
        <select name="job_location" id="job_location" disabled/>
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
        <div class="clear"></div>
      </form>
      
      
      
    </div>
  </div>
  <div class="clear"></div>
</div>
<!-- -------------------------------- container ends ------------------------------ -->
<div class="ad_banner"><a href="#"><img src="images/ad_banner.jpg" alt="" /></a></div>
<?php include("footer.php");?>
</body>
</html>
