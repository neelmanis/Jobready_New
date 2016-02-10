<?php include("header.php");?>
<?php 
	$registration_id=$_SESSION['registration_id'];
	if(!isset($_SESSION['registration_id']) || actor_type($conn,$registration_id)!="F")
			header('location:index.php');
?>
<?php include("menu.php");?>
<?php 
	/*...........................................................*/
	$result=$conn->query("select a.*,b.* from job_registration a,job_profile b where a.id='$registration_id' and b.registration_id='$registration_id'");
	$row=$result->fetch_assoc();
?>
<!-- -------------------------------- container starts ------------------------------ -->
<div class="page_title"><span>welcome <?php echo getUserName($conn,$registration_id)?></span></div>
<div class="inner_conainer" >
  <?php include("employer_dashboard_link.php");?>
  <div class="dashboard_right">
    <!--Horizontal Tab START-->
    <div class="tab_wrapper_other">
      <!--Horizontal Tab-->
      <div id="horizontalTab">
        <ul class="resp-tabs-list">
          <li>COMPANY NFORMATION </li>
        </ul>
        <div class="resp-tabs-container">
          <!-- ----------------- tab 1 starts ----------- -->
          <div>
            <div class="quest_box fade_anim">
              <div class="info_wrap">
                <div class="info">
                  <div class="head">Company Name</div>
                  <div class="dvdr">:</div>
                  <div class="det"><?php echo $row['company_name'];?></div>
                </div>
                <div class="info">
                  <div class="head">Company Profile</div>
                  <div class="dvdr">:</div>
                  <div class="det"><?php echo $row['company_profile'];?></div>
                </div>
                <div class="info">
                  <div class="head">Conatct Person Name</div>
                  <div class="dvdr">:</div>
                  <div class="det"><?php echo $row['fname'];?></div>
                </div>
                <div class="info">
                  <div class="head"> Contact Person Email</div>
                  <div class="dvdr">:</div>
                  <div class="det"><?php echo $row['company_contact_email'];?></div>
                </div>
                <div class="info">
                  <div class="head">Mobile Number</div>
                  <div class="dvdr">:</div>
                  <div class="det"><?php echo $row['mobile_no'];?></div>
                </div>
                <div class="info">
                  <div class="head">Landline Number</div>
                  <div class="dvdr">:</div>
                  <div class="det"><?php echo $row['comapny_landline'];?></div>
                </div>
                <div class="info">
                  <div class="head">Address 1</div>
                  <div class="dvdr">:</div>
                  <div class="det"><?php echo $row['address1'];?></div>
                </div>
                <div class="info">
                  <div class="head">Address 2</div>
                  <div class="dvdr">:</div>
                  <div class="det"><?php echo $row['address2'];?></div>
                </div>
                <div class="info">
                  <div class="head">Address 3</div>
                  <div class="dvdr">:</div>
                  <div class="det"><?php echo $row['address3'];?></div>
                </div>
                <div class="info">
                  <div class="head">PIN Code</div>
                  <div class="dvdr">:</div>
                  <div class="det"><?php echo $row['pincode'];?></div>
                </div>
                <div class="clear"></div>
              </div>
              <div class="add_info"> <a href="company_registration.php" class="editSave">Edit</a> </div>
              <div class="clear"></div>
            </div>
          </div>
          <!-- ----------------- tab 1 ends ----------- -->
        </div>
        <div class="clear"></div>
      </div>
    </div>
    <!--Horizontal Tab END-->
  </div>
  <div class="clear"></div>
</div>
<!-- -------------------------------- container ends ------------------------------ -->
<?php include("footer.php");?>
</body>
</html>
