
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
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

<!---------------- range START -------------------->

<link rel="stylesheet" href="css/jquery-ui.css">
<!--<script src="js/jquery-1.10.2.js"></script>-->
<script src="js/jquery-ui.js"></script>
	<script>
	$(function() {
		$( "#slider-range" ).slider({
			range: true,
			min: 0,
			max: 5,
			values: [ 1, 3],
			slide: function( event, ui ) {
				//$( "#amount" ).val( "MIN " + ui.values[ 0 ] + " - MAX " + ui.values[ 1 ] );
				$("#minval").text( ui.values[ 0 ] );
		$("#maxval").text(ui.values[ 1 ]);
			}
		});
		/*$( "#amount" ).val( "MIN " + $( "#slider-range" ).slider( "values", 0 ) +
			" - MAX " + $( "#slider-range" ).slider( "values", 1 ) );*/
		$("#minval").text($( "#slider-range" ).slider( "values", 0 ));
		$("#maxval").text($( "#slider-range" ).slider( "values", 1 ));
	});
	</script>
<!---------------- range end -------------------->

<!---------------- show-hide starts -------------------->
<script>
$(document).ready(function(){
    
	var width=$(window).innerWidth();
	if(width<1000)
	{
	$("h5").click(function(){
        $(".filter").toggle();
    });
	}
	 $("h5").click(function(){
        $(".filter").addClass("show");
		
    });
});
</script>
<!---------------- show-hide end -------------------->



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
<div class="page_title"><span>current opening</span></div>


<div class="inner_conainer fade_anim">
	<div class="search">
    	<input type="text" onfocus="if(this.value=='Skill, Designations, Companies')value='';" onblur="if(this.value=='')value='Skill, Designations, Companies';" value="Skill, Designations, Companies"/>
        
        <input type="submit" value="Search" />
        <div class="clear"></div>
    </div>
    
    <div class="current_opening_wrap">
    	<div class="filter_wrap">
        	<h5>Job Filter</h5>
            <div class="filter">
                <div class="select_box">
                	<select>
                	<option>Select Location</option>
                    <option>Mumbai</option>
                    <option>Pune</option>
                    <option>Nashik</option>
                </select>
                </div>
                
                <div class="box">
                	<div class="head">Select Employer</div>
                    <div class="chose"><input type="checkbox" /> <span>HDFC Bank</span></div>
                    <div class="chose"><input type="checkbox" /> <span>ICICI Bank</span></div>
                    <div class="chose"><input type="checkbox" /> <span>Kotak Bank</span></div>
                </div>
                
                <div class="box">
                	<div class="head">Select Skill</div>
                    <div class="chose"><input type="checkbox" /> <span>Banking</span></div>
                    <div class="chose"><input type="checkbox" /> <span>Account</span></div>
                    <div class="chose"><input type="checkbox" /> <span>Finance</span></div>
                </div>
                
                <div class="select_box">
                	<select>
                	<option>Select Location</option>
                    <option>Mumbai</option>
                    <option>Pune</option>
                    <option>Nashik</option>
                </select>
                </div>
                
                <div class="box">
                	<div class="head">Experience in years</div>
					<div id="slider-range"></div>
                    
                     <div class="experience_range">
                        
                       <div class="min"> Min <span id="minval" ></span></div>
                       <div class="max"> Max <span id="maxval" ></span></div>
                       <div class="clear"></div>
                    </div>
                    
                    
                </div>
                
                
            </div>
        </div>
      	
        <div class="current_opening_right">	
          
            <div class="job_details_wrap">
                <div class="job_details">
                    <div class="brief padding_none"><img src="images/company_logo.jpg" /></div>
                    <div class="brief details">
                        <span>Investment Analyst</span>
                        Lorem Ipsum is simply dummy text of typesetting industry. Lorem Ipsum has 
                    </div>
                    <div class="brief border"><img src="images/training_icon.png" />Maersk Training</div>
                    <div class="brief border"><img src="images/location_icon.png" />Chennai, Tamil Nadu</div>
                    <div class="brief border"><a href="#">show interest</a></div>
                </div>
                
                <div class="job_details">
                    <div class="brief padding_none"><img src="images/company_logo.jpg" /></div>
                    <div class="brief details">
                        <span>Investment Analyst</span>
                        Lorem Ipsum is simply dummy text of typesetting industry. Lorem Ipsum has 
                    </div>
                    <div class="brief border"><img src="images/training_icon.png" />Maersk Training</div>
                    <div class="brief border"><img src="images/location_icon.png" />Chennai, Tamil Nadu</div>
                    <div class="brief border"><a href="#">show interest</a></div>
                </div>
                
                <div class="job_details">
                    <div class="brief padding_none"><img src="images/company_logo.jpg" /></div>
                    <div class="brief details">
                        <span>Investment Analyst</span>
                        Lorem Ipsum is simply dummy text of typesetting industry. Lorem Ipsum has 
                    </div>
                    <div class="brief border"><img src="images/training_icon.png" />Maersk Training</div>
                    <div class="brief border"><img src="images/location_icon.png" />Chennai, Tamil Nadu</div>
                    <div class="brief border"><a href="#">show interest</a></div>
                </div>
                
                <div class="job_details">
                    <div class="brief padding_none"><img src="images/company_logo.jpg" /></div>
                    <div class="brief details">
                        <span>Investment Analyst</span>
                        Lorem Ipsum is simply dummy text of typesetting industry. Lorem Ipsum has 
                    </div>
                    <div class="brief border"><img src="images/training_icon.png" />Maersk Training</div>
                    <div class="brief border"><img src="images/location_icon.png" />Chennai, Tamil Nadu</div>
                    <div class="brief border"><a href="#">show interest</a></div>
                </div>
                
                <div class="job_details">
                    <div class="brief padding_none"><img src="images/company_logo.jpg" /></div>
                    <div class="brief details">
                        <span>Investment Analyst</span>
                        Lorem Ipsum is simply dummy text of typesetting industry. Lorem Ipsum has 
                    </div>
                    <div class="brief border"><img src="images/training_icon.png" />Maersk Training</div>
                    <div class="brief border"><img src="images/location_icon.png" />Chennai, Tamil Nadu</div>
                    <div class="brief border"><a href="#">show interest</a></div>
                </div>
                
                <div class="job_details">
                    <div class="brief padding_none"><img src="images/company_logo.jpg" /></div>
                    <div class="brief details">
                        <span>Investment Analyst</span>
                        Lorem Ipsum is simply dummy text of typesetting industry. Lorem Ipsum has 
                    </div>
                    <div class="brief border"><img src="images/training_icon.png" />Maersk Training</div>
                    <div class="brief border"><img src="images/location_icon.png" />Chennai, Tamil Nadu</div>
                    <div class="brief border"><a href="#">show interest</a></div>
                </div>
                
                <div class="job_details">
                    <div class="brief padding_none"><img src="images/company_logo.jpg" /></div>
                    <div class="brief details">
                        <span>Investment Analyst</span>
                        Lorem Ipsum is simply dummy text of typesetting industry. Lorem Ipsum has 
                    </div>
                    <div class="brief border"><img src="images/training_icon.png" />Maersk Training</div>
                    <div class="brief border"><img src="images/location_icon.png" />Chennai, Tamil Nadu</div>
                    <div class="brief border"><a href="#">show interest</a></div>
                </div>
                
                <div class="job_details">
                    <div class="brief padding_none"><img src="images/company_logo.jpg" /></div>
                    <div class="brief details">
                        <span>Investment Analyst</span>
                        Lorem Ipsum is simply dummy text of typesetting industry. Lorem Ipsum has 
                    </div>
                    <div class="brief border"><img src="images/training_icon.png" />Maersk Training</div>
                    <div class="brief border"><img src="images/location_icon.png" />Chennai, Tamil Nadu</div>
                    <div class="brief border"><a href="#">show interest</a></div>
                </div>
                
                <div class="clear"></div>
                
                  <div class="pagination">
                    <div class="prev"><a href="#"><</a></div>
                    <a href="#">1</a><a href="#">2</a><a href="#">3</a><a href="#">4</a><a href="#">5</a>
                    <div class="next"><a href="#">></a></div>
                    <div class="clear"></div>
                  </div>
            </div>
        </div>
        
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

</body>
</html>
