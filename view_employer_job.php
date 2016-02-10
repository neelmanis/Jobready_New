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
$aoi=$row['area_of_interest'];
$location=$row['job_location'];
?>
<!-- -------------------------------- container starts ------------------------------ -->
<div class="page_title"><span>welcome <?php echo getUserName($conn,$registration_id)?></span></div>
<div class="inner_conainer" >
  <?php include("employer_dashboard_link.php");?>
  <div class="dashboard_right fade_anim">
    <div class="content_head">View job</div>
    <ul class="login" style="display:none;"></ul>
    <div class="form_wrap">
      <div class="textfield"> <span>Job Code</span>:
        <div class="fields">
          <?php echo $row['job_code'];?>
        </div>
      </div>
      <div class="textfield mar_left"> <span>Designation</span>:
        <div class="fields">
        <?php echo $row['designation'];?>
        </div>
      </div>
      <div class="textfield_1"> <span>keywords</span>:
        <div class="fields">
	<?php echo $row['keyword'];?>
        </div>
      </div>
      <div class="textfield_1"> <span>Job description</span>:
        <div class="fields">
          <?php echo $row['job_desc'];?>
        </div>
      </div>
      <div class="textfield_1"> <span>Company Profile</span>:
        <div class="fields">
          <?php if($jobId!=""){echo $row['co_profile'];}else{ echo getCompanyProfile($conn,$registration_id);}?>
        </div>
      </div>
     
	  <div class="textfield"> <span>Salary Min.<sup></sup></span>:
        <div class="fields">
          <?php echo $row['salary_from'];?>
        </div>
      </div>
      <div class="textfield mar_left"> <span>Salary Max<sup></sup></span>:
        <div class="fields">
          <?php echo $row['salary_to'];?>
        </div>
      </div>
	
      <div class="textfield"> <span>Expected Start date </span>:
        <div class="fields">
          <?php echo $row['job_from'];?>
        </div>
      </div>
      <div class="textfield mar_left"> <span>Reporting  to<sup></sup></span>:
        <div class="fields">
         <?php echo $row['job_to'];?>
        </div>
      </div>
	  <div class="textfield"> <span>Job Category</span>:
        <div class="fields">
			<?php echo getInterest($conn,$aoi);	?>
        </div>
      </div>
      
	  <div class="textfield mar_left"> <span>Location</span>:
        <div class="fields">
        <?php echo getCityName($conn,$location);?>
        </div>
      </div>
	  <div class="textfield"> <span>Min. Experience</span>:
        <div class="fields">
          <?php echo $row['min_exp'];?>
        </div>
      </div><br/>
	  <div class="apply"><a href='javascript:history.back(1);'>Back</a></div>
        <div class="clear"></div>
		
    </div>
  </div>
  <div class="clear"></div>
</div>
<!-- -------------------------------- container ends ------------------------------ -->
<?php include("footer.php");?>
</body>
</html>
