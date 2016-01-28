<?php
//session_start();
//require 'config.php';
include("header.php");
echo getUserName($conn,$registration_id);
$registration_id=$_SESSION['registration_id'];
?>

<?php 
$category='';
@$category=$_POST['category'];

// For get Limit of Subject 
$result=$conn->query("SELECT `limit` FROM `master_subject_list` where sub_id='$category'");
$row=$result->fetch_assoc();
$limit=$row['limit'];
//echo "--->".$gotsubgectID=$row['limit'];

if(!empty($_SESSION['registration_id'])){
?>
<!DOCTYPE html>
<html>
	<head>
		<title>Jobready Quiz Application</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<!-- Bootstrap -->
		<link href="exam_css/bootstrap.min.css" rel="stylesheet" media="screen">
		<link href="exam_css/style.css" rel="stylesheet" media="screen">
			
		<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <script src="exam_js/jquery-1.10.2.min.js"></script>
        <!-- Include all compiled plugins (below), or include individual files as needed -->
        <script src="exam_js/bootstrap.min.js"></script>
        <script src="exam_js/jquery.validate.min.js"></script>
		<script src="exam_js/countdown.js"></script>
		<style>
			.container {
				margin-top: 110px;
			}
			.error {
				color: #B94A48;
			}
			.form-horizontal {
				margin-bottom: 0px;
			}
			.hide{display: none;}
		</style>
	</head>
<body>
<header>
<p class="text-center"><a href="personal_dashboard.php"><img src="images/dashboard.png"></a><br/>
Welcome Your User ID: <?php if(!empty($_SESSION['registration_id'])){echo $_SESSION['registration_id'];}?></p>
</header>
<div id='timer'>
<?php
// Get Time Limit of Subject 
//echo "SELECT `duration` FROM `master_subject_list` where sub_id='$category'"; 
$getTime=$conn->query("SELECT `duration` FROM `master_subject_list` where sub_id='$category'");
$row=$getTime->fetch_assoc();
$mytime=$row['duration'];
//$mytime=120;
?>
<script type="application/javascript">
var myCountdownTest = new Countdown({
time: 60, 
width:200, 
height:80, 
rangeHi:"minute"
});
</script>           
</div>
        
<div class="container question">
<div class="col-xs-12 col-sm-8 col-md-8 col-xs-offset-4 col-sm-offset-3 col-md-offset-3">
<p>Jobready Quiz Application</p>
<hr>
<form class="form-horizontal" role="form" id='login' method="post" action="result.php">
<?php					
					/* Check total question  */
				//	echo "SELECT * FROM `master_general_question` WHERE sub_id=$category ORDER BY RAND() limit $limit";
			
					$neelx=$conn->query("SELECT * FROM `master_general_question` WHERE sub_id=$category ORDER BY RAND() limit $limit");
					//echo	$neel="select * from questions where category_id=$category ORDER BY RAND()";
					$rows=$neelx->num_rows;
					$i=1;
					while($row=$neelx->fetch_assoc()){?>                              
                    
                    <?php if($i==1){?>         
                    <div id='question<?php echo $i;?>' class='cont'>
                    <p class='questions' id="qname<?php echo $i;?>"> <?php echo $i?>.<?php echo $row['question'];?></p>
                    <input type="radio" value="1" id='radio1_<?php echo $row['gque_id'];?>' name='<?php echo $row['gque_id'];?>'/><?php echo $row['option1'];?>
                   <br/>
                    <input type="radio" value="2" id='radio1_<?php echo $row['gque_id'];?>' name='<?php echo $row['gque_id'];?>'/><?php echo $row['option2'];?>
                    <br/>
                    <input type="radio" value="3" id='radio1_<?php echo $row['gque_id'];?>' name='<?php echo $row['gque_id'];?>'/><?php echo $row['option3'];?>
                    <br/>
                    <input type="radio" value="4" id='radio1_<?php echo $row['gque_id'];?>' name='<?php echo $row['gque_id'];?>'/><?php echo $row['option4'];?>
                    <br/>
                    <input type="radio" checked='checked' style='display:none' value="5" id='radio1_<?php echo $row['gque_id'];?>' name='<?php echo $row['gque_id'];?>'/>                                                                      
                    <br/>
                    <button id='<?php echo $i;?>' class='next btn btn-success' type='button'>Next</button>
                    </div>     
                      
                     <?php }elseif($i<1 || $i<$rows){?>
                     
                    <div id='question<?php echo $i;?>' class='cont'>
                    <p class='questions' id="qname<?php echo $i;?>"><?php echo $i?>.<?php echo $row['question'];?></p>
                    <input type="radio" value="1" id='radio1_<?php echo $row['gque_id'];?>' name='<?php echo $row['gque_id'];?>'/><?php echo $row['option1'];?>
                    <br/>
                    <input type="radio" value="2" id='radio1_<?php echo $row['gque_id'];?>' name='<?php echo $row['gque_id'];?>'/><?php echo $row['option2'];?>
                    <br/>
                    <input type="radio" value="3" id='radio1_<?php echo $row['gque_id'];?>' name='<?php echo $row['gque_id'];?>'/><?php echo $row['option3'];?>
                    <br/>
                    <input type="radio" value="4" id='radio1_<?php echo $row['gque_id'];?>' name='<?php echo $row['gque_id'];?>'/><?php echo $row['option4'];?>
                    <br/>
                    <input type="radio" checked='checked' style='display:none' value="5" id='radio1_<?php echo $row['gque_id'];?>' name='<?php echo $row['gque_id'];?>'/>                                                                      
                    <br/>
                    <button id='<?php echo $i;?>' class='previous btn btn-success' type='button'>Previous</button>                    
                    <button id='<?php echo $i;?>' class='next btn btn-success' type='button' >Next</button>
                    </div>
                        
                        
                   <?php }elseif($i==$rows){?>
                    <div id='question<?php echo $i;?>' class='cont'>
                    <p class='questions' id="qname<?php echo $i;?>"><?php echo $i?>.<?php echo $row['question'];?></p>
                    <input type="radio" value="1" id='radio1_<?php echo $row['gque_id'];?>' name='<?php echo $row['gque_id'];?>'/><?php echo $row['option1'];?>
                    <br/>
                    <input type="radio" value="2" id='radio1_<?php echo $row['gque_id'];?>' name='<?php echo $row['gque_id'];?>'/><?php echo $row['option2'];?>
                    <br/>
                    <input type="radio" value="3" id='radio1_<?php echo $row['gque_id'];?>' name='<?php echo $row['gque_id'];?>'/><?php echo $row['option3'];?>
                    <br/>
                    <input type="radio" value="4" id='radio1_<?php echo $row['gque_id'];?>' name='<?php echo $row['gque_id'];?>'/><?php echo $row['option4'];?>
                    <br/>
                    <input type="radio" checked='checked' style='display:none' value="5" id='radio1_<?php echo $row['gque_id'];?>' name='<?php echo $row['gque_id'];?>'/>                                                                      
                    <br/>
                    
                    <button id='<?php echo $i;?>' class='previous btn btn-success' type='button'>Previous</button>                    
                    <button id='<?php echo $i;?>' class='next btn btn-success' type='submit'>Finish</button>
                    </div>
					<?php } $i++;} ?>
					
				</form>
			</div>
		</div>
	
		<script>
		$('.cont').addClass('hide');
		count=$('.questions').length;
		 $('#question'+1).removeClass('hide');
		 
		 $(document).on('click','.next',function(){
		     last=parseInt($(this).attr('id'));     
		     nex=last+1;
		     $('#question'+last).addClass('hide');
		     
		     $('#question'+nex).removeClass('hide');
		 });
		 
		 $(document).on('click','.previous',function(){
             last=parseInt($(this).attr('id'));     
             pre=last-1;
             $('#question'+last).addClass('hide');
             
             $('#question'+pre).removeClass('hide');
         });
            
         setTimeout(function() {
             $("form").submit();
          }, 60000);
		</script>
	</body>
</html>
<?php }else{    
 header( 'Location: online_test.php' ) ;      
// header( 'Location: http://localhost:8080/jobreadyadmin/Jobready/exam/index.php' ) ;      
}
?>