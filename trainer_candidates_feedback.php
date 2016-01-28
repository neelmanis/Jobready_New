<?php include("header.php");?>
<?php include("menu.php");?>
<link type="text/css" rel="stylesheet" href="css/simplePagination.css" />
<script src="js/jquery.simplePagination.js"></script>
<?php $registration_id=$_SESSION['registration_id'];?>
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
    <?php if($result>0){?>
    <ul class="feedback_wrap">
      <?php
		$sql="SELECT F.*,R.*,P.fname as first_name FROM `master_feedback` F,`job_profile`P,`job_registration` R
        WHERE P.registration_id=F.trainer_id and F.trainer_id=$_SESSION[registration_id] and F.status='1'GROUP BY F.id DESC";
		$result=$conn->query($sql);
		while($rows=$result->fetch_assoc())
		{
        ?>
          <li id="job-up" class="paginate_feed">
            <p><?php echo $rows['feed_description'];?></p>
            <div class="candidate">- <?php echo $rows['first_name'];?></div>
          </li>
      	<?php  } }else{ ?>
      <li>No Feedbacks to show..!!</li>
      <?php }?>
    </ul>
    <div class="clear"></div>
    <div id="page-feed" class="pull-right"></div>
    <div class="clear"></div>
  </div>
  <div class="clear"></div>
</div>
<!-- -------------------------------- container ends ------------------------------ -->
<div class="ad_banner"><a href="#"><img src="images/ad_banner.jpg" alt="" /></a></div>
<?php include("footer.php");?>
</body>
</html>
