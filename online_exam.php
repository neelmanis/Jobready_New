<?php 
include("header.php");
include("menu.php");
$registration_id=$_SESSION['registration_id'];  
?>
<?php 
if(!empty($_SESSION['registration_id'])){
?>
<!--<link href="exam_css/bootstrap.min.css" rel="stylesheet" media="screen">-->
<script src="exam_js/jquery-1.10.2.min.js"></script>
<script src="exam_js/bootstrap.min.js"></script>
<script src="exam_js/jquery.validate.min.js"></script>
<script src="exam_js/countdown.js"></script>
<!---------------------------------- container starts -------------------------------->
<div class="page_title"><span>welcome <?php echo getUserName($conn,$registration_id)?></span></div>
<?php 
$myarray=array();		
$result = $conn->query("SELECT * FROM `master_subject_list` where is_compulsory = '1'");
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
	$quesResult = $conn->query("select * from master_general_question where sub_id = $subId order by rand() limit $subLimit");	
	while($qr = $quesResult->fetch_assoc())
		array_push($questionArray, $qr);
}
//print_r($questionArray);
?>
<div class="inner_conainer">
  <div class="exam_wrap fade_anim">
    <div class="exam">
      <div class="head">OnLine Exam</div>
      <div class="coundown_box">
		<script type="application/javascript">
		var myCountdownTest = new Countdown({
				time: <?php echo $sumDuration; ?>, 
				width:150, 
				height:50, 
				rangeHi:"minute"
		});
		</script>
      </div>
      <div class="clear"></div>
    </div>
    
 <div class="quest_box">
<form class="form-horizontal" role="form" id='login' method="post" action="result.php">
<?php foreach($questionArray as $row){?>
		
        <div id='question<?php echo $questCt;?>' class='cont'>
        <div class="subject">Subject : <?php echo getSubjectName($conn,$row['sub_id']);?></div>
          <div class="question">
            <p class='questions' id="qname<?php echo $questCt;?>">
            <div class="quest_num"><?php echo $questCt?></div>
            <?php echo $row['question'];?>
            </p>
          </div>
          <div class="option">
            <input type="radio" value="1" id='radio1_<?php echo $row['id'];?>' name='<?php echo $row['id'];?>'/>
            &nbsp;<?php echo $row['option1'];?> </div>
          <div class="clear"></div>
          <br/>
          <div class="option">
            <input type="radio" value="2" id='radio1_<?php echo $row['id'];?>' name='<?php echo $row['id'];?>'/>
            &nbsp;<?php echo $row['option2'];?> </div>
          <div class="clear"></div>
          <br/>
          <div class="option">
            <input type="radio" value="3" id='radio1_<?php echo $row['id'];?>' name='<?php echo $row['id'];?>'/>
            &nbsp;<?php echo $row['option3'];?> </div>
          <div class="clear"></div>
          <br/>
          <div class="option">
            <input type="radio" value="4" id='radio1_<?php echo $row['id'];?>' name='<?php echo $row['id'];?>'/>
            &nbsp;<?php echo $row['option4'];?> </div>
          <div class="clear"></div>
          <br/>
          <div class="option">
            <input type="radio" checked='checked' style='display:none' value="5" id='radio1_<?php echo $row['id'];?>' name='<?php echo $row['id'];?>'/>
          </div>
          <br/>
          <?php 
		  if($questCt == 1){ ?>
          <button id='<?php echo $questCt;?>' class='next btn btn-success common_button' type='button'>Next</button>
          <?php } elseif($questCt > 1 && $questCt < $sumLimit ) { ?>
          <button id='<?php echo $questCt;?>' class='previous btn btn-success  common_button ' type='button'>Previous</button>
          <button id='<?php echo $questCt;?>' class='next btn btn-success common_button' type='button'>Next</button>
          <?php } else { ?>
          <button id='<?php echo $questCt;?>' class='previous btn btn-success common_button' type='button'>Previous</button>
          <button id='<?php echo $questCt;?>' class='next btn btn-success common_button' type='submit'>Finish</button>
          <?php } ?>
          <div class="clear"></div>
        </div>
        <?php 
$questCt++;	
}
?>
	<input type="hidden" name="exam_type" value="gen"/>
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
          }, <?php echo $sumDuration*1000; ?>);
</script>
<!-- -------------------------------- container ends ------------------------------ -->
<?php }else{    
 header( 'Location: online_test.php' ) ;           
}
?>
<!-- -------------------------------- container ends ------------------------------ -->
<div class="ad_banner"><a href="#"><img src="images/ad_banner.jpg" alt="" /></a></div>
<?php include("footer.php");?>
</body></html>