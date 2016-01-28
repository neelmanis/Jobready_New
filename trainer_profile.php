<?php include("header.php");?>
<?php include("menu.php");?>
<?php 
$registration_id=$_SESSION['registration_id'];
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
<script src="js/registration.js"></script>
<!-- -------------------------------- container starts ------------------------------ -->
<div class="page_title"><span>welcome <?php echo getUserName($conn,$registration_id)?></span></div>
<div class="inner_conainer" >
  <?php include("trainer_dashboard_link.php");?>
  <div class="dashboard_right">
    <!--Horizontal Tab START-->
    <div class="tab_wrapper_other">
      <!--Horizontal Tab-->
      <div id="horizontalTab">
        <ul class="resp-tabs-list">
          <li>PERSONAL INFORMATION </li>
          <li>PROFILE INFORMATION </li>
          <li>EDUCATIONAL INFORMATION </li>
        </ul>
        <div class="resp-tabs-container">
          <!-- ----------------- tab 1 starts ----------- -->
          <div>
            <div class="quest_box fade_anim">
              <div class="info_wrap">
                <div class="info">
                  <div class="head">full name</div>
                  <div class="dvdr">:</div>
                  <div class="det"><?php echo ucfirst($row['fname']);?></div>
                </div>
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
                  <div class="head">mobile number</div>
                  <div class="dvdr">:</div>
                  <div class="det"><?php echo ucfirst($row['mobile_no']);?></div>
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
                <div class="info">
                  <div class="head">Address 3</div>
                  <div class="dvdr">:</div>
                  <div class="det"><?php echo ucfirst($row['address3']);?></div>
                </div>
                <div class="info">
                  <div class="head">PIN Code</div>
                  <div class="dvdr">:</div>
                  <div class="det"><?php echo ucfirst($row['pincode']);?></div>
                </div>
                <div class="info">
                  <div class="head">City/Town</div>
                  <div class="dvdr">:</div>
                  <div class="det"><?php echo ucfirst (getCityName($conn,$row['city']));?></div>
                </div>
                <div class="clear"></div>
              </div>
              <div class="add_info">
              <a href="student_trainer_registration.php#horizontalTab1" class="editSave">Edit</a>
              </div>
              <div class="clear"></div>
            </div>
          </div>
          <!-- ----------------- tab 1 ends ----------- -->
          <!-- ----------------- tab 2 starts ----------- -->
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
              <div class="add_info">
                <a href="student_trainer_registration.php#horizontalTab2" class="editSave">Edit</a>
              </div>
              <div class="clear"></div>
            </div>
          </div>
          <!-- ----------------- tab 2 ends ----------- -->
          <!-- ----------------- tab 3 start ----------- -->
          
          <div>
          <form action="" name="eduData" id="eduData" method="post">
          <input type="hidden" name="regis_step" id="regis_step" value="educational_info" />
            <div class="quest_box  fade_anim">
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
                      <th> %</th>
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
                      <td data-title="Remove"><img src="images/remove_iocn.png" class="deleteEdu <?php echo $row['id'];?>"  /></td>
                    </tr>
                   <?php }?>
                  </tbody>
                </table>
                <!--<div class="add_info">
                  <input type="button" value="SUBMIT" class="register" data-block="2" />
                </div>-->
                <div class="clear"></div>
              </div>
            </div>
            <div class="clear"></div>
            </form>
          </div>
          
          <!-- ----------------- tab 3 ends ----------- -->
          
        </div>
        <div class="clear"></div>
      </div>
    </div>
    <!--Horizontal Tab END-->
  </div>
  <div class="clear"></div>
</div>
<!-- -------------------------------- container ends ------------------------------ -->
<div class="ad_banner"><a href="#"><img src="images/ad_banner.jpg" alt="" /></a></div>
<!-- -------------------------------- footer starts ------------------------------ -->
<div class="footer_wrap">
  <div class="footer">
    <div class="copyright">© 2015 JobbReady.com</div>
    <div class="kweb"><a href="http://kwebmaker.com/" target="_blank">K Webmaker™</a></div>
  </div>
  <div class="clear"></div>
</div>
<!-- -------------------------------- footer ends ------------------------------ -->
</body>
</html>
