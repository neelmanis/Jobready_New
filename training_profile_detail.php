<?php include("header.php");?>
<?php include("menu.php");?>
<?php  $registration_id=$_SESSION['registration_id'];?>
<?php 
$id=$_REQUEST['id'];
$result=$conn->query("select * from job_training_list where id='$id'");
$row=$result->fetch_assoc();
?>
<script type="text/javascript">
$(document).ready(function(){
$('.showinterest').live('click',function(){
var clas=$(this).attr('class').split(' ');
var training_id=clas[1];
var trainer_registraion_id=clas[2];
var registration_id=clas[3];	
	if(confirm("Are you sure you want to show interest?")){
		$.ajax({
				type:"POST",
				url:"training_inc.php",
				data:"action=showinterest&&training_id="+training_id+"&&trainer_registraion_id="+trainer_registraion_id+"&&registration_id="+registration_id,
				dataType:"JSON",
				success:function(data)
				{
					if($.trim(data.error_msg)!="success")
						alert(data.error_msg);
					else
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
<div class="page_title"><span>Training Detail</span></div>
<div class="inner_conainer">
		<div class="info_wrap">
        <div class="info">
            <div class="head">Trainer Name</div>
            <div class="dvdr">:</div>
            <div class="det">
			<?php
			if(getUserName($conn,$row['registration_id'])!=""){?>
			<?php echo getUserName($conn,$row['registration_id']); } else {?>
			<?php echo "JobbReady Training";} ?>
			</div>
        </div>
		<div class="info">
            <div class="head">Training</div>
            <div class="dvdr">:</div>
            <div class="det"><?php echo $row['title'];?></div>
        </div>
        <div class="info">
            <div class="head">Training Category</div>
            <div class="dvdr">:</div>
            <div class="det"><?php echo getInterest($conn,$row['area_of_interest']);?></div>
        </div>
        <div class="info">
            <div class="head">Training Description</div>
            <div class="dvdr">:</div>
            <div class="det"><?php echo $row['description'];?></div>
        </div>
        <div class="info">
            <div class="head">Download Document</div>
            <div class="dvdr">:</div>
            <?php if($row['doc']!=''){?>
            <div class="det"><a href="upload/training_doc/<?php echo $row['registration_id']."/".$row['doc'];?>" target="_blank">Link</a></div>
            <?php }else{ ?>
            <div class="det">Doc Not Found</div>
            <?php }?>
        </div>
        
        
		<div class="info">
            <div class="head">&nbsp;</div>
            <div class="dvdr">&nbsp;</div>
            <div class="det">
			<?php if(isset($_SESSION['registration_id'])):?>
            	<?php if(actor_type($conn,$registration_id)=="S"):?>
				<div class="apply"><a href="#" class="showinterest <?php echo $row['id']." ".$row['registration_id']." ".$registration_id;?> contact">Contact</a></div>
				<?php else:?>
				<div class="apply"><a href="#" onclick="return(window.confirm('Only Candidate can show interest..!!'));" class="contact">Contact</a> </div> 
				<?php endif ;else : ?>		
				<div class="apply"><a class="contact fancybox fancybox.ajax fade" href="login_signup_form.php?redirect_url=<?php echo basename($_SERVER['PHP_SELF']);?> ">Contact</a> </div>
			<?php endif;?>
			</div>
        </div>
        
        
        
        <div class="clear"></div>
    </div>
    <div class="clear"></div>    
    <!--<div class="add_info"><a href='javascript:history.back(1);'>Back</a></div>-->
</div>
<!-- -------------------------------- container ends ------------------------------ -->
<?php include("footer.php");?>
</body></html>
