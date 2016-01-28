<?php include("header.php");?>
<?php include("menu.php");?>
<script type="text/javascript">
$(document).ready(function(){
	$(".icon").click(function(){
		$this = $(this);
		$data=$this.data('icon');
		//alert($data);return false;
		$this.addClass($this.data('icon') + 'Active');
		$this.parents('li').siblings('li').find('a').each(function(index,element){
			var iconClass = $(element).data('icon') + 'Active';
			$(element).removeClass(iconClass);
		})
		$.ajax({
				type:"POST",
				url:"login_registration_inc.php",
				data:"type_of_actor="+$data+"&&actorType=actorType",
				dataType:"JSON",
				success:function(data)
				{
					//console.log(data);
					//alert(data);
					window.location.href=data.url;	
				}
		});
	});
});
</script>
<!-- -------------------------------- container starts ------------------------------ --><?php  /* For redirect Gmail 14 JAN 2015*/if(isset($_SESSION['registration_id'])&& $_SESSION['registration_id']!=''){$registration_id=$_SESSION['registration_id']; $actor_type=actor_type($conn,$registration_id);		if($actor_type=='S')		{				$redirect_url="personal_dashboard.php"; 				header("Location: ".$redirect_url);		}			elseif($actor_type=='T')			{				$redirect_url="trainer_dashboard.php";				header("Location: ".$redirect_url);			}			elseif($actor_type=='F')			{				$redirect_url="employer_dashboard.php";				header("Location: ".$redirect_url);			}			   }?>
<div class="page_title"><span>select actor</span></div>
<div class="inner_conainer">
	<div class="exam_wrap">
		<!--<div class="content_head">asdgjop agjpa ogjpoj</div>-->
        <ul class="actor fade_anim">
        	<li>
            	<span>firm</span>
                <a href="#" class="icon firm" data-icon="firm"></a>
            </li>
            <li>
            	<span>student</span>
                <a href="#" class="icon student" data-icon="student"></a>
            </li>
            <li>
            	<span>trainer</span>
                <a href="#" class="icon trainer" data-icon="trainer"></a>
            </li>
        </ul>
        <!--        
        <div class="enquiry_wrap fade_anim">
            <input type="submit" value="Submit" />
            <div class="clear"></div>
        </div>
        -->
    </div> 
</div>
<!-- -------------------------------- container ends ------------------------------ -->
<div class="ad_banner"><a href="#"><img src="images/ad_banner.jpg" alt="" /></a></div>
<?php include("footer.php");?>