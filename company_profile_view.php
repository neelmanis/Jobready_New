<?php include("header.php");?>
<?php include("menu.php");?>
<?php 
$registration_id=$_REQUEST['registration_id'];
/*...........................................................*/
$result=$conn->query("select a.*,b.* from job_registration a,job_profile b where a.id='$registration_id' and b.registration_id='$registration_id'");
$row=$result->fetch_assoc();

?>
<!-- -------------------------------- container starts ------------------------------ -->
<div class="page_title"><span>Profile Details</span></div>
<div class="inner_conainer">
<div class="add_info"><a href='javascript:history.back(1);'>Back</a></div>
  <div class="trainer_feedback">
    <!--<div class="pic"><img src="images/feedback_profile.jpg" /></div>-->
    <div class="profile_detail">
	<div class="name"><?php echo ucfirst($row['company_name']);?></div>
      
	  <span>Contact person: <?php echo ucfirst($row['fname']);?></span>
      <ul class="contact">
        <li><img src="images/icon_phone.png" /> <?php echo ucfirst($row['mobile_no']);?></li>
        <li><img src="images/icon_mail.png" /> <a href="mailto:<?php echo $row['email'];?>"><?php echo $row['email'];?></a></li>
      </ul>
    </div>
    <div class="clear"></div>
  </div>
  
  <div class="trainer_feedback">
    <h5>Company Information</h5>
    <div>
            <div class="quest_box fade_anim">
              <div class="info_wrap">
			    <div class="info">
                  <div class="head">Profile</div>
                  <div class="dvdr">:</div>
                  <div class="det"><?php echo ucfirst($row['company_profile']);?></div>
                </div>
				<div class="info">
                  <div class="head">Phone</div>
                  <div class="dvdr">:</div>
                  <div class="det"><?php echo ucfirst($row['comapny_landline']);?></div>
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
                <div class="clear"></div>
              </div>
              <div class="clear"></div>
            </div>
          </div>
  </div>
  <div class="clear"></div>
</div>
<!-- -------------------------------- container ends ------------------------------ -->
<?php include("footer.php");?>
</body>
</html>
