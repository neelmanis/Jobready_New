<?php 
session_start();
ob_start();
include('db.inc.php');
include('functions.php');
include('g_login.php');
error_reporting(0);
?>
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
<!-- xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx tab starst  xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx -->
<link type="text/css" rel="stylesheet" href="css/responsive_tab.css" />
<script src="js/responsive_tab.js" ></script>
<script type="text/javascript">
    $(document).ready(function () {
        $('#horizontalTab').easyResponsiveTabs({
            type: 'default', //Types: default, vertical, accordion           
            width: 'auto', //auto or any width like 600px
            fit: true,   // 100% fit in a container
            closed: 'accordion', // Start closed if in accordion view
            activate: function(event) { // Callback function if tab is switched
                var $tab = $(this);
                var $info = $('#tabInfo');
                var $name = $('span', $info);
                $name.text($tab.text());
                $info.show();
            }
        });
        $('#horizontalTab1').easyResponsiveTabs({
            type: 'vertical',
            width: 'auto',
            fit: true
        });
    });
</script>
<!-- xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx tab end  xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx -->
<!---------------- POP UP START -------------------->
<link rel="stylesheet" type="text/css" href="css/jquery.fancybox.css" media="screen" />
<script type="text/javascript" src="js/jquery.fancybox.js"></script>
<script type="text/javascript">
		$(document).ready(function() {
			$('.fancybox').fancybox();
		});
	</script>
<!---------------- POP UP END -------------------->
<!-- -------------------------------- marquee starts ------------------------------ -->
<link type="text/css" rel="stylesheet" href="css/marquee.css" />
<script>
	$(".toggle").on("click", function () {
    $(".container").toggleClass("microsoft");
});
</script>
<!-- -------------------------------- marquee ends ------------------------------ -->
<!-- xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx multi selections starts  xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx -->
<link rel="stylesheet" href="css/multiple-select.css" />
<link type="text/css" rel="stylesheet" href="css/history.css" />
<!-- xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx multi selections ends  xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx -->
</head>
<!-- -------------------------------- marquee starts ------------------------------ -->
<link type="text/css" rel="stylesheet" href="css/marquee_other.css" />
<!-- -------------------------------- marquee ends ------------------------------ -->
<body>