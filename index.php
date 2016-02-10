<?php include("header.php");?>
<?php include("menu.php");?>
<link type="text/css" rel="stylesheet" href="css/simplePagination.css" />
<script src="js/jquery.simplePagination.js"></script>
<!--<script type="text/javascript" src="js/jquery.pajinate.js"></script>-->
<script>
jQuery(function($) {
    var pageParts = $(".paginate");
    var numPages = pageParts.length;
    var perPage = 3;
    pageParts.slice(perPage).hide();
    $("#page-nav").pagination({
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
<!-- -------------------------------- home content starts ------------------------------ -->
<div class="home_container_wrap fade_anim">
  <div class="home_container">
    <?php
	$current_date = date('m-d-Y');
	$sql="SELECT * FROM `master_video` WHERE status='1' ORDER BY id DESC LIMIT 1";
	$result=$conn->query($sql);
	while($rows=$result->fetch_assoc())
	{
    ?>
    <div class="home_video"> <?php echo $rows['link'];?> </div>
    <?php } ?>
    <!-- -------------------------------- job content starts ------------------------------ -->
    <div class="current_opening">
      <?php 
			$today_date = date('Y-m-d H:i:s');
		    $last=date('Y-m-d H:i:s', strtotime('-2 months'));
			$sql="SELECT * FROM `master_job` WHERE `post_date` BETWEEN '" .$last."' AND  '" .$today_date."' order by id desc";		
		    $result=$conn->query($sql);
	  ?>
      <?php $rowcount=mysqli_num_rows($result); ?>
      <div class="title black">Current openings (
        <?php  echo $rowcount  ,results;?>
        ) </div>
      <ul class="opening">
        <?php
		  while($rows=$result->fetch_assoc())
		  {$uid=$rows['id'];
			  ?>
        <li id="job-up" class="paginate"><a href="job_profile.php?id=<?php echo $uid;?>"><span><?php echo $rows['designation'];?></span></a><?php echo $rows['designation'];?> - <?php echo $rows['co_profile'];?></li>
        <?php } ?>
      </ul>
      <div class="clear"></div>
      <div id="page-nav"></div>
    </div>
    <!-- -------------------------------- job content ends ------------------------------ -->
  </div>
</div>
<div class="clear"></div>
</div>
<!-- -------------------------------- home content starts ------------------------------ -->
<!-- -------------------------------- container starts ------------------------------ -->
<div class="main_container">
  <div class="content_left">
    <div class="title grey">Success Stories</div>
    <div class="microsoft container">
      <ul class="marquee">
        <?php
		$sql="SELECT * FROM `master_success_story` WHERE status='1' order by post_date"; 
		$result=$conn->query($sql);
		while($rows=$result->fetch_assoc())
		{
		$post_date=$rows['post_date'];		
    ?>
        <li> <img src="admin/story_image/<?php echo $rows['image'];?>" />
          <div class="name"> <?php echo $rows['title'];?> <span><?php echo date("F jS, Y",strtotime($post_date));?></span> </div>
          <p><?php echo $rows['desc'];?></p>
          <div class="clear"></div>
        </li>
        <?php  }  ?>
      </ul>
    </div>
  </div>
  <div class="content_right">
    <div class="title grey">Upcoming Events</div>
    <!--Horizontal Tab START-->
    <div class="tab_wrapper">
      <!--Horizontal Tab-->
      <div id="horizontalTab">
        <ul class="resp-tabs-list">
          <li>Training </li>
          <li>Seminars</li>
          <li>Workshops </li>
        </ul>
        <div class="resp-tabs-container">
          <!-- ----------------- tab 1 starts ----------- -->
          <div>
            <ul class="training">
              <?php
			$current_date = date('Y-m-d h:i:s');
			$sql="SELECT * FROM `master_events_list` WHERE type='Training' and status='1' ORDER BY events_date "; 
				$result=$conn->query($sql);
				while($rows=$result->fetch_assoc())
                {
                ?>
              <li>
                <div class="time">
                  <div class="date"> <?php echo  date("d", strtotime($rows['events_date'])); ?> </div>
                  <div class="month"> <?php echo  date("M", strtotime($rows['events_date'])); ?> </div>
                </div>
                <div class="brief"> <a href="show_events.php?id=<?php echo $rows['id'];?>"><?php echo $rows['title'];?></a>
                  <p><?php echo $rows['desc'];?></p>
                </div>
                <div class="clear"></div>
              </li>
              <?php  }  ?>
            </ul>
            <div class="clear"></div>
          </div>
          <!-- ----------------- tab 1 ends ----------- -->
          <!-- ----------------- tab 2 starts ----------- -->
          <div>
            <ul class="training">
              <?php
				$sql="SELECT * FROM `master_events_list` WHERE type='Seminars' and status='1' ORDER BY events_date"; 
				$result=$conn->query($sql);
				while($rows=$result->fetch_assoc())
				{
            ?>
              <li>
                <div class="time">
                  <div class="date"> <?php echo  date("d", strtotime($rows['events_date'])); ?> </div>
                  <div class="month"> <?php echo  date("M", strtotime($rows['events_date'])); ?> </div>
                </div>
                <div class="brief"> <a href="show_events.php?id=<?php echo $rows['id'];?>"><?php echo $rows['title'];?></a>
                  <p><?php echo $rows['desc'];?></p>
                </div>
                <div class="clear"></div>
              </li>
              <?php  }  ?>
            </ul>
            <div class="clear"></div>
          </div>
          <!-- ----------------- tab 2 ends ----------- -->
          <!-- ----------------- tab 3 starts ----------- -->
          <div>
            <ul class="training">
              <?php
			$sql="SELECT * FROM `master_events_list` WHERE type='Workshops' and status='1' ORDER BY events_date"; 
			$result=$conn->query($sql);
			while($rows=$result->fetch_assoc())
			{
            ?>
              <li>
                <div class="time">
                  <div class="date"> <?php echo  date("d", strtotime($rows['events_date'])); ?> </div>
                  <div class="month"> <?php echo  date("M", strtotime($rows['events_date'])); ?> </div>
                </div>
                <div class="brief"> <a href="show_events.php?id=<?php echo $rows['id'];?>"><?php echo $rows['title'];?></a>
                  <p><?php echo $rows['desc'];?></p>
                </div>
                <div class="clear"></div>
              </li>
              <?php  }  ?>
            </ul>
            <div class="clear"></div>
          </div>
          <!-- ----------------- tab 3 ends ----------- -->
        </div>
        <div class="clear"></div>
      </div>
    </div>
    <!--Horizontal Tab END-->
  </div>
  <div class="clear"></div>
</div>
<!-- -------------------------------- container ends ------------------------------ -->
<?php include("footer.php");?>
</body>
</html>
