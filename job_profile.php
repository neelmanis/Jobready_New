<?php include("header.php");?>
<?php include("menu.php");?>
<?php  $registration_id=$_SESSION['registration_id'];?>
<script type="text/javascript">
$(document).ready(function(){
$('.showjobinterest').live('click',function(){
var clas=$(this).attr('class').split(' ');
var job_id=clas[1];
var employer_registraion_id=clas[2];
var registration_id=clas[3];	
	if(confirm("Are you sure you want to Apply for Job?")){
		$.ajax({
				type:"POST",
				url:"employer_job_inc.php",
				data:"action=showjobinterest&&job_id="+job_id+"&&employer_registraion_id="+employer_registraion_id+"&&registration_id="+registration_id,
				dataType:"JSON",
				success:function(data)
				{
					//console.log(data);
					window.location.href=data.url;
				}
			});
	}
	else
	{
		return false;
	}
  });
});
</script>

<!-- -------------------------------- container starts ------------------------------ -->
<?php 
$id=$_REQUEST['id'];
$result=$conn->query("select * from master_job where id='$id'");
$row=$result->fetch_assoc();
?>
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
            <div class="det"><?php echo $row['co_profile'];?><br/>
			<!--<a href="company_profile_view.php?registration_id=<?php echo $row['registration_id'];?>">View Company Profile</a>-->
			<input type="button" onclick="location.href='company_profile_view.php?registration_id=<?php echo $row['registration_id'];?>';" value="View Company Profile" /></div>
        </div>
        <div class="info">
            <div class="head">Salary Range (in Rupees)</div>
            <div class="dvdr">:</div>
            <div class="det"><?php echo $row['salary_from'];?> - <?php echo $row['salary_to']." ";?>Rs.</div>
        </div>
          <div class="info">
            <div class="head">Job Location</div>
            <div class="dvdr">:</div>
            <div class="det"><?php echo getCityName($conn,$row['job_location']);?></div>
        </div>
        <div class="clear"></div>
    </div>
	
	
	    
		<?php if(isset($_SESSION['registration_id'])):?>
        <?php if(actor_type($conn,$registration_id)=="S"):?>
		<div class="info">
            <div class="head">&nbsp;</div>
            <div class="dvdr">&nbsp;</div>
            <div class="det">
				<div class="apply"><a href="#" class="showjobinterest <?php echo $row['id']." ".$row['registration_id']." ".$registration_id;?> contact">Apply</a></div>
				<?php else:?>
				<div class="apply"><a href="#" onclick="return(window.confirm('Only Candidate can Apply..!!'));" class="contact">Apply</a></div> 
				<?php endif ;else : ?>		
				<div class="apply"><a class="fancybox fancybox.ajax fade" href="login_signup_form.php?redirect_url=job_profile.php?id=<?php echo $id;?>">Apply</a></div>
				<?php endif;?>
				<div class="apply"><a href='javascript:history.back(1);'>Back</a></div>
			</div>
        </div>
	 
	 
	 
     <div class="clear"></div>
     <!--<div class="add_info"><a href='javascript:history.back(1);'>Back</a></div>  -->
</div>
<!-- -------------------------------- container ends ------------------------------ -->
<?php include("footer.php");?>
</body></html>
