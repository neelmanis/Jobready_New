<?php include("header.php");?>
<?php include("menu.php");?>
<?php 
$registration_id=$_REQUEST['registration_id'];
/*...........................................................*/
$result=$conn->query("select a.*,b.* from job_registration a,job_profile b where a.id='$registration_id' and b.registration_id='$registration_id'");
$row=$result->fetch_assoc();

/*...........................get area of interest.....................................*/
$result1=$conn->query("select * from job_area_of_interest where registration_id='$registration_id'");
while($row1=$result1->fetch_assoc())
{
	$interest.=getInterest($conn,$row1['area_of_interest']).",";
}
?>
<!-- -------------------------------- container starts ------------------------------ -->
<div class="page_title"><span>Profile Details</span></div>
<div class="inner_conainer">
<div class="add_info"><a href='javascript:history.back(1);'>Back</a></div>
  <div class="trainer_feedback">
    <!--<div class="pic"><img src="images/feedback_profile.jpg" /></div>-->
    <div class="profile_detail">
      <div class="name"><?php echo ucfirst($row['fname']);?></div>
      <span><?php echo ucfirst(getCityName($conn,$row['city']));?>,<?php echo ucfirst($row['pincode']);?></span>
      <ul class="contact">
        <li><img src="images/icon_phone.png" /> <?php echo ucfirst($row['mobile_no']);?></li>
        <li><img src="images/icon_mail.png" /> <a href="mailto:<?php echo $row['email'];?>"><?php echo $row['email'];?></a></li>
      </ul>
    </div>
    <div class="clear"></div>
  </div>
  
  <div class="trainer_feedback">
    <h5>Personal Information</h5>
    <div>
            <div class="quest_box fade_anim">
              <div class="info_wrap">
                <div class="info">
                  <div class="head">Gender</div>
                  <div class="dvdr">:</div>
                  <div class="det"><?php echo ucfirst($row['gender']);?></div>
                </div>
                <div class="info">
                  <div class="head">DOB</div>
                  <div class="dvdr">:</div>
                  <div class="det"><?php echo ucfirst($row['dob']);?></div>
                </div>
                <div class="info">
                  <div class="head">Address 1</div>
                  <div class="dvdr">:</div>
                  <div class="det"><?php echo ucfirst($row['address1']);?></div>
                </div>
                <div class="info">
                  <div class="head">Address 2</div>
                  <div class="dvdr">:</div>
                  <div class="det"><?php echo ucfirst($row['address2']);?></div>
                </div>
                <?php if($row['address3']!=""){?>
                <div class="info">
                  <div class="head">Address 3</div>
                  <div class="dvdr">:</div>
                  <div class="det"><?php echo ucfirst($row['address3']);?></div>
                </div>
                <?php }?>
                <div class="info">
                  <div class="head">PIN Code</div>
                  <div class="dvdr">:</div>
                  <div class="det"><?php echo ucfirst($row['pincode']);?></div>
                </div>
                <div class="info">
                  <div class="head">City/Town</div>
                  <div class="dvdr">:</div>
                  <div class="det"><?php echo ucfirst(getCityName($conn,$row['city']));?></div>
                </div>
                <div class="clear"></div>
              </div>
              <div class="clear"></div>
            </div>
          </div>
  </div>
  <div class="trainer_feedback">
    <h5>Profile</h5>
    <div>
            <div class="quest_box fade_anim">
              <div class="info_wrap">
                <div class="info">
                  <div class="head">Areas Of Interest</div>
                  <div class="dvdr">:</div>
                  <div class="det"><?php echo $interest;?></div>
                </div>
                <div class="info">
                  <div class="head">Prefered Location</div>
                  <div class="dvdr">:</div>
                  <div class="det"><?php echo ucfirst(getCityName($conn,$row['preffered_location']));?></div>
                </div>
                <div class="info">
                  <div class="head">Brief Profile</div>
                  <div class="dvdr">:</div>
                  <div class="det"><?php echo ucfirst($row['brief_profile']);?></div>
                </div>
                <div class="info">
                  <div class="head">Skills / Kew words</div>
                  <div class="dvdr">:</div>
                  <div class="det"><?php echo ucfirst($row['keyword_skill']);?></div>
                </div>
                <div class="clear"></div>
              </div>
              <div class="clear"></div>
            </div>
          </div>
  </div>
  <div class="trainer_feedback">
    <h5>Educational Info</h5>
    <div>
            <div class="quest_box  fade_anim">
              <div class="clear"></div>
              <div class="table_main" id="no-more-tables">
                <table class="table-bordered table-striped table-condensed cf">
                  <thead>
                    <tr bgcolor="#868686" style="color:#fff;">
                      <th> education </th>
                      <th> institutions </th>
                      <th> year </th>
                      <th> %</th>
                      <th> major </th>
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
                    </tr>
                   <?php }?>
                  </tbody>
                </table>
                <div class="clear"></div>
              </div>
            </div>
            <div class="clear"></div>
          </div>
  </div>
  <div class="trainer_feedback">
    <h5>Employment Info</h5>
    <div>
            <div class="quest_box  fade_anim">
              <div class="clear"></div>
              <div class="table_main" id="no-more-tables">
                <table class="table-bordered table-striped table-condensed cf">
                  <thead>
                     <tr bgcolor="#868686" style="color:#fff;">
                      <th> Employer Name </th>
                      <th> Start Month </th>
                      <th> Start year </th>
                      <th>Last Designation </th>
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

                    </tr>
                   <?php }?>
                  </tbody>
                </table>
                <div class="clear"></div>
              </div>
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
