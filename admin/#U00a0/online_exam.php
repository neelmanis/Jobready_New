<?php 
include("header.php");
include("menu.php");
echo getUserName($conn,$registration_id);
$registration_id=$_SESSION['registration_id'];  
?>
<?php //echo getSubject($conn,$registration_id);?>
<?php 
$category='';
@$category=$_POST['category'];

// For get Limit of Subject 
$result=$conn->query("SELECT `limit` FROM `master_subject_list` where sub_id='$category'");
$rowm=$result->fetch_assoc();
$limit=$rowm['limit'];
//echo "--->".$gotsubgectID=$rowm['limit'];

if(!empty($_SESSION['registration_id'])){
?>
<link href="exam_css/bootstrap.min.css" rel="stylesheet" media="screen">
<script src="exam_js/jquery-1.10.2.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="exam_js/bootstrap.min.js"></script>
<script src="exam_js/jquery.validate.min.js"></script>
<script src="exam_js/countdown.js"></script>

<!---------------------------------- container starts -------------------------------->
<div class="page_title"><span>Online Exam <?php //if(!empty($_SESSION['registration_id'])){echo $_SESSION['registration_id'];}?></span></div>


<div class="inner_conainer">
<div class="exam_wrap fade_anim">
<div class="exam">
<div class="head">Test 1 - Lorem Ipsum is simply dummy text</div>
<div class="coundown_box">

<?php
// Get Time Limit of Subject 
//echo "SELECT `duration` FROM `master_subject_list` where sub_id='$category'"; 
$getTime=$conn->query("SELECT `duration` FROM `master_subject_list` where sub_id='$category'");
$rown=$getTime->fetch_assoc();
$mytime=$rown['duration'];
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
<div class="clear"></div>
</div>
        
<div class="quest_box">
		
<form class="form-horizontal" role="form" id='login' method="post" action="result.php">
<?php
$myarray=array();		

$result = $conn->query("SELECT * FROM `master_interest_area` where id IN (SELECT area_of_interest FROM `job_area_of_interest` where registration_id=$registration_id) or is_compulsory = '1'");
$sumLimit = 0;
$sumDuration = 0;
$questCt = 1;
$questionArray = array();

while($data = $result->fetch_assoc()){
	$sumLimit = $sumLimit + intval($data['limit']);
	$sumDuration = $sumDuration + intval($data['duration']);
	array_push($myarray, $data);
}

foreach($myarray as $ques){
	$subId = $ques['id'];
	$subLimit = $ques['limit'];
	
//echo "select * from master_general_question where sub_id = $subId group by gque_id order by sub_id rand() limit $subLimit";
$quesResult = $conn->query("select * from master_general_question where sub_id = $subId order by rand() limit $subLimit");	
	while($qr = $quesResult->fetch_assoc())
		array_push($questionArray, $qr);
}
foreach($questionArray as $row){ 
	//echo $questCt;
?>
	<div id='question<?php echo $questCt;?>' class='cont'>  
		<div class="question">
			<p class='questions' id="qname<?php echo $questCt;?>">
			<div class="quest_num"><?php echo $questCt?></div>
			<?php echo $row['question'];?></p>
		</div>  
		
		<div class="option"><input type="radio" value="1" id='radio1_<?php echo $row['gque_id'];?>' name='<?php echo $row['gque_id'];?>'/> &nbsp;<?php echo $row['option1'];?>
		</div><div class="clear"></div><br/>
		
		<div class="option"><input type="radio" value="2" id='radio1_<?php echo $row['gque_id'];?>' name='<?php echo $row['gque_id'];?>'/> &nbsp;<?php echo $row['option2'];?>
		</div><div class="clear"></div><br/>
		
		<div class="option"><input type="radio" value="3" id='radio1_<?php echo $row['gque_id'];?>' name='<?php echo $row['gque_id'];?>'/> &nbsp;<?php echo $row['option3'];?>
		</div><div class="clear"></div><br/>
		
		<div class="option"><input type="radio" value="4" id='radio1_<?php echo $row['gque_id'];?>' name='<?php echo $row['gque_id'];?>'/> &nbsp;<?php echo $row['option4'];?>
		</div><div class="clear"></div><br/>
		
		<div class="option"><input type="radio" checked='checked' style='display:none' value="5" id='radio1_<?php echo $row['gque_id'];?>' name='<?php echo $row['gque_id'];?>'/> </div>
		<br/>
		<?php if($questCt == 1){ ?>
			<button id='<?php echo $questCt;?>' class='next btn btn-success' type='button'>Next</button>
		<?php } elseif($questCt > 1 && $questCt < $sumLimit ) { ?>
			<button id='<?php echo $questCt;?>' class='previous btn btn-success' type='button'>Previous</button>           
			<button id='<?php echo $questCt;?>' class='next btn btn-success' type='button'>Next</button>
		<?php } else { ?>
			<button id='<?php echo $questCt;?>' class='previous btn btn-success' type='button'>Previous</button>           
			<button id='<?php echo $questCt;?>' class='next btn btn-success' type='submit'>Finish</button>
		<?php } ?>
		<div class="clear"></div>
	</div>		
<?php 
$questCt++;	
}
?>
</form>            
</div>        
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
<!-- -------------------------------- container ends ------------------------------ -->
<?php }else{    
 header( 'Location: online_test.php' ) ;      
// header( 'Location: http://localhost:8080/jobreadyadmin/Jobready/exam/index.php' ) ;      
}
?>
 <div class="ad_banner"><a href="#"><img src="images/ad_banner.jpg" alt="" /></a></div>

<!-- -------------------------------- footer starts ------------------------------ -->
<div class="footer_wrap">
	<div class="footer">
    	<div class="copyright">© 2015 JobbReady.com</div>
        <div class="kweb"><a href="http://kwebmaker.com/" target="_blank">K Webmaker™</a></div>
    </div><div class="clear"></div>
</div>
<!-- -------------------------------- footer ends ------------------------------ -->
</body>
</html>