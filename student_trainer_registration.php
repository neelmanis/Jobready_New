<?php include("header.php");?>
<?php include("menu.php");?>
<script type="text/javascript">
$(document).ready(function(){
	$('.login').hide();
	$('form').on('submit',function(e){
		e.preventDefault();
		$this = $(this);
		$submitButton = $this.find('input.register');
		var tabIndex = parseInt($submitButton.data('block')) + 1;
		var formData = new FormData(this);
		var errors = $this.prev('.login');
		$.ajax({
			  type:"POST",
			  url:"student_trainer_registration_inc.php",
			  data:formData,
			  mimeType: 'multipart/form-data',
			  contentType: false,
			  dataType: 'json',
			  cache: false,
			  processData: false,
			  beforeSend: function() {    
				$(".loader").show("slow");
			  },
			  success:function(data)
			  {
			  		$(".loader").hide("slow");
					if($.trim(data.error_msg)=="success" && data.step)
						window.location.href=data.url;
					else if($.trim(data.error_msg)=="success")
						$('ul.resp-tabs-list').find('li').eq(tabIndex).trigger('click');
					else 
						errors.show().html(data.error_msg);
			  }
		});
	})
});
</script>
<script src="js/registration.js"></script>


<!-- xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx Date Picker Start  xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx -->
<script language="JavaScript" src="js/jquery.datepick.js" type="text/javascript"></script>
<link type="text/css" rel="stylesheet" href="css/jquery.datepick.css">
<script>
$(document).ready(function () {
	$('#configPicker1').datepick({showTrigger: '#calImg', dateFormat:'dd-mm-yyyy'});
});    
</script>

<!-- xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx Date Picker End  xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx -->
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
<?php 
$registration_id=$_SESSION['registration_id'];
$result=$conn->query("select a.id,b.*,c.*  from job_registration a LEFT JOIN job_profile b on a.id=b.registration_id LEFT JOIN job_education_profile c on a.id=c.registration_id where a.id='$registration_id'");
$row=$result->fetch_assoc();
$fname=$row['fname'];
$gender=$row['gender'];
$dob=$row['dob'];
$address1=$row['address1'];
$address2=$row['address2'];
$address3=$row['address3'];
$city=$row['city'];
$pincode=$row['pincode'];
$brief_profile=$row['brief_profile'];
$preffered_location=$row['preffered_location'];
$keyword_skill=$row['keyword_skill'];
$upload_cv=$row['upload_cv'];
/*.........................Get Area Of Interest.............................*/

$interest_result=$conn->query("select * from job_area_of_interest where registration_id='$registration_id'");
while($interest_row=$interest_result->fetch_assoc())
{
	$area_of_interest.=$interest_row['area_of_interest'].",";
}
?>


<!-- -------------------------------- container starts ------------------------------ -->
<span style="display:none;" class="loader"></span>
<div class="page_title"><span>registrations</span></div>
<div class="inner_conainer">
  <div class="exam_wrap">
    <!--Horizontal Tab START-->
    <div class="tab_wrapper_other">
      <!--Horizontal Tab-->
      <div id="horizontalTab">
        <ul class="resp-tabs-list" id="tab">
          <li>PERSONAL INFO</li>
          <li>PROFILE INFO</li>
          <li>EDUCATIONAL INFO</li>
          <li>EMPLOYEMENT INFO</li>
        </ul>
        <div class="resp-tabs-container">
          <!-- ----------------- tab 1 starts ----------- -->
          <div>
          <ul class="personalError login"></ul>
          <form action="" name="" method="post">
          <input type="hidden" name="regis_step" id="regis_step" value="personal_info" />
            <div class="quest_box fade_anim">
              <div class="form_wrap">
                <div class="textfield"><span>Full Name<sup>*</sup></span>
                  <div class="fields">
                    <input type="text" name="fname" id="fname" value="<?php echo $fname;?>" />
                  </div>
                </div>
                <div class="textfield mar_left"> <span>Gender<sup>*</sup></span>
                  <div class="fields">
                    <div class="gender_type">
                      <input type="radio" name="gender" value="Male" <?php if($gender=="Male"){?> checked="checked"<?php }?> />
                      Male</div>
                    <div class="gender_type">
                      <input type="radio" name="gender" value="Female" <?php if($gender=="Female"){?> checked="checked"<?php }?>/>
                      Female</div>
                  </div>
                </div>
                <div class="textfield"> <span>DOB <sup>*</sup></span>
                  <div class="fields">
                    <input type="text" name="dob" id="configPicker1" value="<?php echo $dob;?>" />
                  </div>
                </div>
                <div class="textfield mar_left"> <span>Address 1<sup>*</sup></span>
                  <div class="fields">
                    <input type="text" name="address1" id="address1" value="<?php echo $address1;?>"  />
                  </div>
                </div>
                <div class="textfield"> <span>Address 2 <sup>*</sup></span>
                  <div class="fields">
                    <input type="text" name="address2" id="address2" value="<?php echo $address2;?>" />
                  </div>
                </div>
                <div class="textfield mar_left"> <span>Address 3 </span>
                  <div class="fields">
                    <input type="text" name="address3" id="address3" value="<?php echo $address3;?>" />
                  </div>
                </div>
                <div class="textfield"> <span>PinCode <sup>*</sup></span>
                  <div class="fields">
                    <input type="text" name="pincode" id="pincode" value="<?php echo $pincode;?>" />
                  </div>
                </div>
                <div class="textfield mar_left"> <span>City/Town <sup>*</sup></span>
                  <div class="fields">
                    <select name="city" id="city">
                    <option value="">---Select City/Town---</option>
                    <?php 
					$city_result=$conn->query("select * from master_city where status=1");
					while($city_row=$city_result->fetch_assoc()){
					?>
                      <option value="<?php echo $city_row['id'];?>" <?php if($city_row['id']==$city)echo 'selected="selected"';?> ><?php echo $city_row['city'];?></option>
                      <?php }?>
                    </select>
                  </div>
                </div>
              </div>
              <div class="add_info">
                <input type="submit" value="NEXT" class="register" data-block="0" />
              </div>
              <div class="clear"></div>
            </div>
            <div class="clear"></div>
            </form>
          </div>
          
          <!-- ----------------- tab 1 ends ----------- -->
          
          
          <!-- ----------------- tab 2 starts ----------- -->
          <div>
          <ul class="profileError login"></ul>
          <form action="" name="" method="post">
          <input type="hidden" name="regis_step" id="regis_step" value="profile_info" />
            <div class="quest_box  fade_anim">
              <div class="form_wrap">
                <div class="textfield"> <span>Areas Of Interest<sup>*</sup></span>
                  <div class="fields">
                    <select name="[]" id="ms" multiple="multiple">
						<?php 
                        	$result=$conn->query("select * from master_interest_area where status='1'");
							while($row=$result->fetch_assoc()){
                        ?>
                        <option value="<?php echo $row['id'];?>" <?php if(preg_match('/'.$row['id'].'/',$area_of_interest)){?>selected="selected" <?php }?>><?php echo $row['area_of_interest'];?></option>
                        <?php }?>
                    </select>
                  </div>
                </div>
				<div class="textfield mar_left"> <span>Preferred Locations<sup>*</sup></span>
                  <div class="fields">
					<select name="preffered_location" id="preffered_location">
                    <option value="">---Preferred Locations---</option>
                    <?php 
					$city_result=$conn->query("select * from master_city where status=1");
					while($city_row=$city_result->fetch_assoc()){
					?>
                      <option value="<?php echo $city_row['id'];?>" <?php if($city_row['id']==$preffered_location)echo 'selected="selected"';?> ><?php echo $city_row['city'];?></option>
                      <?php }?>
					  <option value="0" <?php if($preffered_location==0)echo 'selected="selected"';?> >No Preference </option>
                    </select>
                  </div>
                </div>
                <div class="textfield_1"> <span>Profile Brief<sup>*</sup></span>
                  <div class="fields">
                    <textarea name="brief_profile" id="brief_profile"><?php echo preg_replace("/(<br\s*\/?>\s*)+/", '',$brief_profile);?></textarea>
                  </div>
                </div>
                <div class="textfield_1 mar_left"> <span>Skills / Kew words<sup>*</sup></span>
                  <div class="fields">
                    <input class="tags" type="text" id="keyword_skill" name="keyword_skill" value="<?php echo $keyword_skill;?>">
                  </div>
                </div>
                <?php if(actor_type($conn,$registration_id)=="S"){?>
                <div class="textfield"> <span>CV upload<sup>*</sup></span>
                  <div class="fields">
                    <input type="file" name="upload_cv" id="upload_cv" />
                    <input type="hidden" name="check_upload_cv" id="check_upload_cv" value="<?php echo $upload_cv;?>"/>
                  </div>
                </div>
              <?php }?>
              </div>
              <div class="add_info">
                <a href="<?php echo $url;?>">Skip</a>
                <input type="submit" value="NEXT" class="register" data-block="1" />
                
              </div>
              <div class="clear"></div>
            </div>
            </form>
          </div>
          <!-- ----------------- tab 2 ends ----------- -->
          
          <!-- ----------------- tab 3 starts ----------- -->
          <div>
          <form action="" name="" id="" method="post">
          <ul class="educationalError login"></ul>
          <input type="hidden" name="regis_step" id="regis_step" value="educational_info" />
            <div class="quest_box  fade_anim">
              <div class="table_main" id="no-more-tables">
                <table class="table-bordered table-striped table-condensed cf">
                  <thead>
                    <tr bgcolor="#868686" style="color:#fff;">
                      <th> education </th>
                      <th> institutions </th>
                      <th> year </th>
                      <th> % / CGPA</th>
                      <th> major </th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td data-title="Education">
                      <select name="education" id="education">
                          <option value="">--Select Education--</option>
                          <?php 
						  $query=$conn->query("select * from master_education where status=1");
						  while($row=$query->fetch_assoc()){
						  ?>
                          <option value="<?php echo $row['id'];?>"><?php echo $row['education'];?></option>
                          <?php }?>
                        </select>
                      </td>
                      <td data-title="Institutions">
                      <select name="college" id="college">
                          <option value="">--Select College/Institute--</option>
                         <?php 
						  $query=$conn->query("select * from master_institution where status=1");
						  while($row=$query->fetch_assoc()){
						 ?>
                           <option value="<?php echo $row['id'];?>"><?php echo $row['institution'];?></option>
                          <?php }?>
                        </select>
                      </td>
                      
                      <td data-title="Year">
                       <select name="year_of_completion" id="year_of_completion">
                          <option value="">--Select--</option>
							  <?php for($i=1986;$i<date('Y');$i++){?>
                                <option value="<?php echo $i;?>"><?php echo $i;?></option>
                              <?php }?>
                       </select>
                      </td>
                      <td data-title="%"><input type="text" name="percentage" id="percentage" /></td>
                      <td data-title="Major"><textarea name="specialization" id="specialization"></textarea></td>
                    </tr>
                  </tbody>
                </table>
                <div class="add_info">
                  <input type="button" value="ADD" id="addEdu" />
                </div>
                <div class="clear"></div>
              </div>
              <div class="clear"></div>
              <div class="table_main" id="no-more-tables">
                <table class="table-bordered table-striped table-condensed cf">
                  <thead>
                    <tr bgcolor="#868686" style="color:#fff;">
                      <th> education </th>
                      <th> institutions </th>
                      <th> year </th>
                      <th> % / CGPA</th>
                      <th> major </th>
                      <th> remove </th>
                    </tr>
                  </thead>
                  <tbody id="educationalDetails">
                  <?php 
					$result=$conn->query("select * from job_education_profile where registration_id='$registration_id'");
					while($row=$result->fetch_assoc()){
				  ?>
                    <tr>
                      <td data-title="Education"><?php echo getEducation($conn,$row['education']);?></td>
                      <td data-title="Institutions"><?php echo getCollege($conn,$row['college']);?></td>
                      <td data-title="Year"><?php echo $row['year_of_completion'];?></td>
                      <td data-title="%"><?php echo $row['percentage'];?>%</td>
                      <td data-title="Major"><?php echo $row['specialization'];?></td>
                      <td data-title="Remove"><a href="#"><img src="images/remove_iocn.png" class="deleteEdu <?php echo $row['id'];?>"  /></a></td>
                    </tr>
                   <?php }?>
                  </tbody>
                </table>
                <div class="add_info">
                  <a href="<?php echo $url;?>">Skip</a>
                  <input type="submit" value="NEXT" class="register" data-block="2" />
                </div>
                <div class="clear"></div>
              </div>
            </div>
            <div class="clear"></div>
            </form>
          </div>
          <!-- ----------------- tab 3 ends ----------- -->
          
          <!-- ----------------- tab 4 start ----------- -->
          <div>
          <form action="" name="" id="" method="post">
          <ul class="employmentError login"></ul>
          <input type="hidden" name="regis_step" id="regis_step" value="employment_info" />
            <div class="quest_box  fade_anim">
              <div class="table_main" id="no-more-tables">
                <table class="table-bordered table-striped table-condensed cf">
                  <thead>
                    <tr bgcolor="#868686" style="color:#fff;">
                      <th> Employer Name </th>
                      <th> Start Month </th>
                      <th> Start Year </th>
                      <th> Last Designation </th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td data-title="Employer name">
                      <input type="text" name="employer_name" id="employer_name" />
                      </td>
                      <td data-title="Start Month">
                        <select name="start_month" id="start_month">
                        <option value="">--Select Month--</option>
                          <?php 
						  $query=$conn->query("select * from job_month");
						  while($row=$query->fetch_assoc()){
						  ?>
                          <option value="<?php echo $row['month'];?>"><?php echo $row['month'];?></option>
                          <?php }?>
                        </select>
                      </td>
                      <td data-title="Start year">
                      <input type="text" name="start_year" id="start_year" />
                      </td>
                      <td data-title="Last Designation">
                      	<input type="text" name="last_designation" id="last_designation" />
                      </td>
                    </tr>
                  </tbody>
                </table>
                <div class="add_info">
                  <input type="button" value="ADD" id="addEmp" />
                </div>
                <div class="clear"></div>
              </div>
              <div class="clear"></div>
              <div class="table_main" id="no-more-tables">
                <table class="table-bordered table-striped table-condensed cf">
                  <thead>
                     <tr bgcolor="#868686" style="color:#fff;">
                      <th> Employer Name </th>
                      <th> Start Month </th>
                      <th> Start year </th>
                      <th>Last Designation </th>
                      <th> remove </th>
                    </tr>
                  </thead>
                  <tbody id="employmentDetails">
                  <?php 
					$result=$conn->query("select * from job_employment_profile where registration_id='$registration_id'");
					while($row=$result->fetch_assoc()){
				  ?>
                    <tr>
                      <td data-title="Education"><?php echo $row['employer_name'];?></td>
                      <td data-title="Start Month"><?php echo $row['start_month'];?></td>
                      <td data-title="Start year"><?php echo $row['start_year'];?></td>
                      <td data-title="Last Designation"><?php echo $row['last_designation'];?></td>
                      <td data-title="Remove"><a href="#"><img src="images/remove_iocn.png" class="deleteEmp <?php echo $row['id'];?>"  /></a></td>
                    </tr>
                   <?php }?>
                  </tbody>
                </table>
                <div class="add_info">
                  <a href="<?php echo $url;?>">Skip</a>
                  <input type="submit" value="Submit" class="register" data-block="3" />
                </div>
                <div class="clear"></div>
              </div>
            </div>
            <div class="clear"></div>
            </form>
          </div>
          <!-- ----------------- tab 4 end ----------- -->
          
        </div>
        <div class="clear"></div>
      </div>
    </div>
    <!--Horizontal Tab END-->
  </div>
</div>
<!-- -------------------------------- container ends ------------------------------ -->
<?php include("footer.php");?>
</body>
</html>