<?php
//require 'config.php';
include("header.php");
//include("../menu.php");
$registration_id=$_SESSION['registration_id'];
echo getUserName($conn,$registration_id);

?>


<!DOCTYPE html>
<html>
<head>
<title>Jobready Quiz Application</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<!-- Bootstrap -->
<link href="exam_css/bootstrap.min.css" rel="stylesheet" media="screen">
<link href="exam_css/style.css" rel="stylesheet" media="screen">
</head>

<body>
<header>
<p class="text-center"><a href="personal_dashboard.php"><img src="images/dashboard.png"></a><br/>
Welcome Your User ID: <?php if(!empty($_SESSION['registration_id'])){echo $_SESSION['registration_id'];}?></p>

</header>
<div class="container">
<div class="row">
<div class="col-xs-14 col-sm-7 col-lg-7">
<!--<div class='image'>
<img src="image/logo.png" class="img-responsive"/>
</div>-->
</div>
<div class="col-xs-10 col-sm-5 col-lg-5">
<div class="intro">
<!--<form class="form-signin" method="post" id='signin' name="signin" action="questions.php">-->
<form class="form-signin" method="post" id='signin' name="signin" action="online_exam.php">
<div class="form-group">
<select class="form-control" name="category" id="category">
<!--<option value="0">Choose your Subject</option>-->
<option value="">Choose your Subject</option>
<?php
$result=$conn->query("SELECT `sub_id`, `subject` FROM `master_subject_list` where status=1 ");
while($row=$result->fetch_assoc())
{
$sub_id=$row['sub_id']; // if u want to send id
$get_subject=$row['subject'];
echo "<option value='".$sub_id ."'>$get_subject</option>";	
}
?>
</select>
<span class="help-block"></span>
</div>
<br>
<button class="btn btn-success btn-block" type="submit">Submit</button>
</form>
</div>
</div>
</div>
</div>
		<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="exam_js/jquery-1.10.2.min.js"></script>
<script src="exam_js/bootstrap.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="exam_js/jquery.validate.min.js"></script>

<script>
			$(document).ready(function() {
				$("#signin").validate({
					submitHandler : function() {
					    console.log(form.valid());
						if (form.valid()) {
						    alert("sf");
							return true;
						} else {
							return false;
						}

					},
					rules : {						
						category:{
						    required : true
						}
					},
					messages : {						
						category:{
                            required : "Please Choose your Subject to start Quiz"
                        }
					},
					errorPlacement : function(error, element) {
						$(element).closest('.form-group').find('.help-block').html(error.html());
					},
					highlight : function(element) {
						$(element).closest('.form-group').removeClass('has-success').addClass('has-error');
					},
					success : function(element, lab) {
						var messages = new Array("That's Great!", "Looks good!", "You got it!", "Great Job!", "Smart!", "That's it!");
						var num = Math.floor(Math.random() * 6);
						$(lab).closest('.form-group').find('.help-block').text(messages[num]);
						$(lab).addClass('valid').closest('.form-group').removeClass('has-error').addClass('has-success');
					}
				});
			});
		</script>
</body>
</html>