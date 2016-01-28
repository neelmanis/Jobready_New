<?php include("header.php");?>
<?php include("menu.php");?>
<?php  $registration_id=$_SESSION['registration_id'];?>
<?php 
$id=$_REQUEST['id'];
$result=$conn->query("select * from master_job where id='$id'");
$row=$result->fetch_assoc();
?>


<!-- -------------------------------- container starts ------------------------------ -->
<div class="page_title"><span>Job Detail</span></div>
<div class="inner_conainer">
		<div class="info_wrap">
        <div class="info">
            <div class="head">Job Code</div>
            <div class="dvdr">:</div>
            <div class="det"><?php echo $row['job_code'];?></div>
        </div>
        <div class="info">
            <div class="head">Designation</div>
            <div class="dvdr">:</div>
            <div class="det"><?php echo $row['designation'];?></div>
        </div>
        <div class="info">
            <div class="head">Job Description</div>
            <div class="dvdr">:</div>
            <div class="det"><?php echo $row['job_desc'];?></div>
        </div>
          <div class="info">
            <div class="head">Company Profile</div>
            <div class="dvdr">:</div>
            <div class="det"><?php echo $row['co_profile'];?></div>
        </div>
        <div class="info">
            <div class="head">Salary Range (in Rupees)</div>
            <div class="dvdr">:</div>
            <div class="det"><?php echo $row['salary_from'];?> - <?php echo $row['salary_to'];?>Rs.</div>
        </div>
          <div class="info">
            <div class="head">Job Location</div>
            <div class="dvdr">:</div>
            <div class="det"><?php echo $row['job_location'];?></div>
        </div>
        <div class="clear"></div>
    </div>
     
     <div class="clear"></div>
    
</div>
<!-- -------------------------------- container ends ------------------------------ -->
<div class="ad_banner"><a href="#"><img src="images/ad_banner.jpg" alt="" /></a></div>
<?php include("footer.php");?>
</body></html>
