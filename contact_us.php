<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
<title>Welcome to Jobb Ready</title>

<link rel="shortcut icon" href="images/fav_icon.png" type="image/x-icon">

<link rel="stylesheet" type="text/css" href="css/mystyle.css" />
<link rel="stylesheet" type="text/css" href="css/inner_pages.css" />
<script src="js/1.8.3_min.js" type="text/javascript"></script>

<!-- xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx Menu starst  xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx -->
<link rel="stylesheet" href="css/menu.css">
<script src="js/menu.js"></script>
<!-- xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx Menu end xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx -->




<!---------------- POP UP START -------------------->
    <link rel="stylesheet" type="text/css" href="css/jquery.fancybox.css" media="screen" />
	<script type="text/javascript" src="js/jquery.fancybox.js"></script>
	<script type="text/javascript">
		$(document).ready(function() {
			$('.fancybox').fancybox();
		});
	</script>
<!---------------- POP UP END -------------------->



</head>

<body>

<!-- -------------------------------- header starts ------------------------------ -->
<div class="header_wrap">
    <div class="header fade_anim">
        <div class="logo"><a href="index.html"><img src="images/logo.png" alt="" /></a></div>
        <div class="header_right">
            <div class="menu_top">
                <a class="fancybox enquiry fade" href="#inline1">Login</a>
                <a href="#">My Account</a>
            </div>
            <div class="clear"></div>
            
            <div class="menu_wrap fade_anim">
                <div id='cssmenu'>
                        <ul>
                            <li><a href='index.html'>home</a></li>
                            <li><a href='#'>Corporate</a></li>
                           <li><a href='#'>Our Services</a></li>
                           <li><a href='#' >Resources</a> </li>
                           <li><a href='#' >Contact</a> </li>
                        </ul>
                    </div>	
              </div>
            
        </div>
        <div class="clear"></div>
    </div>
</div>    
<!-- -------------------------------- header ends ------------------------------ -->


<!-- -------------------------------- container starts ------------------------------ -->
<div class="page_title"><span>contact us</span></div>


<div class="inner_conainer fade_anim">
	
    <div class="contact_left">
    	<ul class="contact">
        	<li><img src="images/icon_map.png" /> For any queries please call us between 9 am to 6 pm (Monday - Friday)</li>
            <li><img src="images/icon_phone.png" /> 09821642627</li>
            <li><img src="images/icon_mail.png" /> <a href="mailto:info@jobbready.com">info@jobbready.com</a></li>
        </ul>
    
    </div>
		
	<div class="contact_right">
    	<div class="content_head">Suggestion or feedback</div>
        	<div class="enquiry_wrap">
    	
        
                <div class="textfield">
                    <input type="text" onfocus="if(this.value=='First name')value='';" onblur="if(this.value=='')value='First name';" value="First name"/>
                </div>
                
                <div class="textfield">
                    <input type="text" onfocus="if(this.value=='last name')value='';" onblur="if(this.value=='')value='last name';" value="last name"/>
                </div>
                
                <div class="textfield">
                    <input type="text" onfocus="if(this.value=='Email')value='';" onblur="if(this.value=='')value='Email';" value="Email"/>
                </div>
                
                <div class="textfield">    
                    <input type="text" onfocus="if(this.value=='Telephone Number')value='';" onblur="if(this.value=='')value='Telephone Number';" value="Telephone Number"/>
                </div>
                
                <div class="clear"></div>
                <div class="textfield_1">
                    <textarea onfocus="if(this.value=='Address')value='';" onblur="if(this.value=='')value='Address';" value="Address">Address</textarea>
                </div>
                
                <div class="textfield_1">
                    <textarea onfocus="if(this.value=='Enquiry')value='';" onblur="if(this.value=='')value='Enquiry';" value="Enquiry">Enquiry</textarea>
                </div>    
                <input type="submit" />
                
            </div>
        
            <div class="clear"></div>
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
    </div><div class="clear"></div>
</div>
<!-- -------------------------------- footer ends ------------------------------ -->

<!----------------- pop up display none start-------------------------->


<div id="inline1" style="width:100%; display:none;">
		
    <div class="form_login">    
        <div class="pop_head">Log in</div>
        <div class="form_details fade_anim">
        	
            <div class="textfield">
                <input type="text" onfocus="if(this.value=='Enter your Email or Mobile No.')value='';" onblur="if(this.value=='')value='Enter your Email or Mobile No.';" value="Enter your Email or Mobile No." />    
            </div>
            
            <div class="textfield">
                <input type="text" onfocus="if(this.value=='Password')value='';" onblur="if(this.value=='')value='Password';" value="Password" />    
            </div>
            
            
                   
            <div class="textfield fade">
                <input type="submit" value="Login" />    
            </div>
            
            <div class="clear"></div>
            
          	<div class="forgot_password"><input type="checkbox" /> Remember me <span><a href="#">Forgot Password ?</a></span></div>
            
           	 <div class="form_devider"><span>OR</span></div>
             
             <a href="#" class="facebook"><img src="images/icon_facebook.png" /> Log in via Facebook</a>
             <a href="#" class="gplus"><img src="images/icon_gplus.png" /> Log in via Google</a>
             
        </div>
    </div>  
    
    <div class="form_signup">    
        <div class="pop_head">Sign up</div>
        <div class="form_details fade_anim">
        	<!--<h3>type of actor </h3>
            <div class="radio_wrap">
            	<div class="radio"><input type="radio" name="actor" /> Student</div>
                <div class="radio"><input type="radio" name="actor"/> Trainer</div>
                <div class="radio"><input type="radio" name="actor"/> Firms</div>
            </div>-->
            
            <div class="textfield">
                <input type="text" onfocus="if(this.value=='Enter your Email')value='';" onblur="if(this.value=='')value='Enter your Email';" value="Enter your Email" />    
            </div>
            
            <div class="textfield">
                <input type="text" onfocus="if(this.value=='Password')value='';" onblur="if(this.value=='')value='Password';" value="Password" />    
            </div>
            
            <div class="textfield">
                <input type="text" onfocus="if(this.value=='Mobile Number')value='';" onblur="if(this.value=='')value='Mobile Number';" value="Mobile Number" />    
            </div>
            
                   
            <div class="textfield fade">
                <input type="submit" value="Submit" />    
            </div>
            
           	 
        </div>
    </div>       
        
</div>


<!----------------- pop up display none end -------------------------->


<!--<script src="assets/jquery.min.js"></script>-->
<script src="js/jquery.multiple.select.js"></script>
<script>
    $(function() {
        $('#ms').change(function() {
            console.log($(this).val());
        }).multipleSelect({
            width: '100%'
        });
    });
</script>

</body>
</html>
