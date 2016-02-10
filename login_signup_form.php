<?php 
session_start();
ob_start();
include('db.inc.php');
include('functions.php');
include('g_login.php');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"> 
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
<script src="js/1.8.3_min.js" type="text/javascript"></script>
<script type="text/javascript">
$(document).ready(function(){
	$("body").on("submit", "form", function (e) {
		e.preventDefault();
		formData=$(this).serialize();
		if($(this).find("#regisType").val()=="login")
			var errors = jQuery('.loginError');
		else
			var errors = jQuery('.signupError');
		$.ajax({
			type:"POST",
			url:"login_registration_inc.php",
			data:formData,
			dataType:"JSON",
			success:function(data)
			{
				if($.trim(data.error_msg)!="")	
					errors.html(data.error_msg);	
				else
					window.location.href=data.url;
			}
		});
	});
});
</script>
<script language='JavaScript' type='text/javascript'>
function refreshCaptcha()
{
	var img = document.images['captchaimg'];
	img.src = img.src.substring(0,img.src.lastIndexOf("?"))+"?rand="+Math.random()*1000;
}
</script>
</head>
<body>
<div id="inline1" style="width:100%;">
    <div class="form_login">    
        <ul class="pop_head">Log in <?php //echo $_REQUEST['redirect_url'];?></ul>
        <div class="loginError"></div>
        <form action="" name="" id="form1"  method="post" autocomplete="off">
        <input type="hidden" name="regisType" id="regisType" value="login"/>
		<input type="hidden" name="redirect_url" value="<?php echo $_REQUEST['redirect_url'];?>"/>
        <div class="form_details fade_anim">
            <div class="textfield">
                <input type="text" name="username" id="username" onfocus="if(this.value=='Enter your Email or Mobile No')value='';" onblur="if(this.value=='')value='Enter your Email or Mobile No';" value="Enter your Email or Mobile No" />    
            </div>
            <div class="textfield">
                <input type="password" name="password" id="password" onfocus="if(this.value=='Password')value='';" onblur="if(this.value=='')value='Password';" value="Password" />    
            </div> 
            <div class="textfield fade">
                <input type="submit" value="Login" id="form" />    
            </div>
            <div class="clear"></div>
          	<div class="forgot_password"><!--<input type="checkbox" /> Remember me--> <span><a href="forgot_password.php">Forgot Password ?</a></span></div>
			<div class="clear"></div>
           	 <div class="form_devider"><span>OR</span></div>
              <a href="fbconfig.php" class="facebook"><img src="images/icon_facebook.png" /> Log in via Facebook</a>
             <a href="<?php echo $authUrl ?>" class="gplus"><img src="images/icon_gplus.png" /> Log in via Google</a>
        </div>
        </form>
    </div>  
    <div class="form_signup">    
        <div class="pop_head">Sign up</div>
        <ul class="signupError"></ul>
        <form action="" name="" id="form2"  method="post" autocomplete="off">
        <input type="hidden" name="regisType" id="regisType" value="signup"/>
        <div class="form_details fade_anim">
            <div class="textfield">
                <input type="text" name="email" id="email" onfocus="if(this.value=='Enter your Email')value='';" onblur="if(this.value=='')value='Enter your Email';" value="Enter your Email" />    
            </div>
            <div class="textfield">
                <input type="password" name="password" id="password" onfocus="if(this.value=='Password')value='';" onblur="if(this.value=='')value='Password';" value="Password" />    
            </div>
            <div class="textfield">
                <input type="text" name="mobile_no" id="mobile_no"  onfocus="if(this.value=='Mobile Number')value='';" onblur="if(this.value=='')value='Mobile Number';" value="Mobile Number" />    
            </div> 
			<div class="captcha">
				<img src="captcha_code_file.php?rand=<?php echo rand(); ?>" id='captchaimg' ><!--<img src="images/captcha.jpg" />--> 
				Can't read the image? click <a href='javascript: refreshCaptcha();'>here </a> to refresh
			</div>
             <div class="textfield">
                <input type="text" name="captcha_code" id="captcha_code"  />    
            </div>
            <div class="textfield fade">
                <input type="submit" id="form" value="Submit" />    
            </div>
        </div>
        </form>
    </div>       
</div>
</body>
</html>