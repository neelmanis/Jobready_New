<?php include("header.php");?>
<?php include("menu.php");?>
<script type="text/javascript">
$(document).ready(function(){
	$('.login').hide();
	$("form" ).on( "submit", function( e ) {
		e.preventDefault();
		var formData = new FormData(this);
		$.ajax({
			  type:"POST",
			  url:"company_registration_inc.php",
			  data:formData,
			  mimeType: 'multipart/form-data',
			  contentType: false,
			  dataType: 'JSON',
			  dataType:'html',
			  cache: false,
			  processData: false,
			  beforeSend: function() {    
				$(".loader").show("slow");
			  },
			  success:function(data)
				{
					//alert(data);
					$(".loader").hide("slow");
					var data = $.parseJSON(data);
					if($.trim(data.error_msg)!="success")	
						$('.login').show().html(data.error_msg);
					else
						window.location.href=data.url;
				}
			});
	});
});
</script>
<?php 
$registration_id=$_SESSION['registration_id'];
$result=$conn->query("select * from job_profile where registration_id='$registration_id'");
$row=$result->fetch_assoc();
?>
<!-- -------------------------------- container starts ------------------------------ -->
<span style="display:none;" class="loader"></span>
<div class="page_title"><span>company registrations</span></div>
<div class="inner_conainer">
<ul class="login"></ul>
<form action="" name="" method="post">
  <div class="exam_wrap">
    <div class="form_wrap fade_anim">
      <div class="textfield"> <span>Company Name<sup>*</sup></span>
        <div class="fields">
          <input type="text" name="company_name" id="company_name" value="<?php echo $row['company_name'];?>" />
        </div>
      </div>
	  <div class="textfield mar_left"> <span>Company Profile<sup>*</sup></span>
        <div class="fields">
          <textarea name="company_profile" id="company_profile" rows="10" cols="40"><?php echo $row['company_profile'];?></textarea>
        </div>
      </div>
      <div class="textfield"> <span>Contact Person Name<sup>*</sup></span>
        <div class="fields">
          <input type="text" name="fname" id="fname" value="<?php echo $row['fname'];?>" />
        </div>
      </div>
      <div class="textfield mar_left"> <span>Contact Person Email<sup>*</sup></span>
        <div class="fields">
          <input type="text" name="company_contact_email" id="company_contact_email" value="<?php echo $row['company_contact_email'];?>" />
        </div>
      </div>
    <!--  <div class="textfield"> <span>Contact Person Mobile No<sup>*</sup></span>
        <div class="fields">
          <input type="text" name="mobile_no" id="mobile_no" value="<?php echo $row['mobile_no'];?>" />
        </div>
      </div>-->
      <div class="textfield"> <span>Office Phone</span>
        <div class="fields">
          <input type="text" name="comapny_landline" id="comapny_landline" value="<?php echo $row['comapny_landline'];?>" />
        </div>
      </div>
      <div class="textfield mar_left"> <span>Company Address 1 <sup>*</sup></span>
        <div class="fields">
          <input type="text" name="address1" id="address1" value="<?php echo $row['address1'];?>" />
        </div>
      </div>
      <div class="textfield"> <span>Company Address 2<sup>*</sup> </span>
        <div class="fields">
          <input type="text" name="address2" id="address2" value="<?php echo $row['address2'];?>" />
        </div>
      </div>
      <div class="textfield mar_left"> <span>Company Address 3</span>
        <div class="fields">
          <input type="text" name="address3" id="address3" value="<?php echo $row['address3'];?>" />
        </div>
      </div>
      <div class="textfield mar_left"> <span>Pincode <sup>*</sup></span>
        <div class="fields">
          <input type="text" name="pincode" id="pincode" value="<?php echo $row['pincode'];?>" />
        </div>
      </div>
      <input type="submit" value="Submit" class="common_button" />
      <div class="clear"></div>
    </div>
  </div>
  </form>
</div>
<!-- -------------------------------- container ends ------------------------------ -->
<div class="ad_banner"><a href="#"><img src="images/ad_banner.jpg" alt="" /></a></div>
<?php include("footer.php");?>
</body>
</html>
