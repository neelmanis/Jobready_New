<?php include("header.php");?>
<?php 
$registration_id=$_SESSION['registration_id'];
if(!isset($_SESSION['registration_id']) || actor_type($conn,$registration_id)!="T")
		header('location:index.php');
?>
<?php include("menu.php");?>
<link type="text/css" rel="stylesheet" href="css/simplePagination.css" />
<script src="js/jquery.simplePagination.js"></script>
<script>
jQuery(function($) {
    var pageParts = $(".paginate_feed");
	var numPages = pageParts.length;
    var perPage = 3;
    pageParts.slice(perPage).hide();
    $("#page-feed").pagination({
        items: numPages,
        itemsOnPage: perPage,
        cssStyle: "light-theme",
        onPageClick: function(pageNum) {
            var start = perPage * (pageNum - 1);
            var end = start + perPage;
            pageParts.hide()
                     .slice(start, end).show();
        }
    });
});

</script>
<!-- -------------------------------- container starts ------------------------------ -->
<div class="page_title"><span>welcome <?php echo getUserName($conn,$registration_id)?></span></div>
<div class="inner_conainer" >
  <?php include("trainer_dashboard_link.php");?>
  <div class="dashboard_right fade_anim">
    <ul class="feedback_wrap">
      <?php
		$sql="SELECT * FROM `master_feedback` WHERE trainer_id='$registration_id'";
		$result=$conn->query($sql);
		$count=$result->num_rows;
		if($count>0){
		while($rows=$result->fetch_assoc())
		{
        ?>
      <li id="job-up" class="paginate_feed">
        <p><?php echo $rows['feed_description'];?></p>
        <div class="candidate">- <?php echo getUserName($conn,$rows['registration_id']);?></div>
      </li>
      <?php  } }else{ ?>
      <li>No Feedbacks to show..!!</li>
      <?php }?>
    </ul>
    
    <?php if($count>0){?><div id="page-feed" class="pull-right"></div><?php }?>
    <div class="clear"></div>
  </div>
  <div class="clear"></div>
</div>
<!-- -------------------------------- container ends ------------------------------ -->
<?php include("footer.php");?>
</body>
</html>
