<?php include("header.php");?>
<?php include("menu.php");?>
<?php  $registration_id=$_SESSION['registration_id'];?>
<?php 
$id=$_REQUEST['id'];
$result=$conn->query("select * from master_events_list where id='$id'");
$row=$result->fetch_assoc();
?>


<!-- -------------------------------- container starts ------------------------------ -->
<div class="page_title"><span>Upcoming Events ( <?php echo $row['type'];?> )</span></div>
<div class="inner_conainer">
		<div class="info_wrap">
        <div class="info">
            <div class="head">Title</div>
            <div class="dvdr">:</div>
            <div class="det"><?php echo $row['title'];?></div>
        </div>
        <div class="info">
            <div class="head">Date</div>
            <div class="dvdr">:</div>
            <div class="det"><?php echo $row['events_date'];?></div>
        </div>
        <div class="info">
            <div class="head">Description</div>
            <div class="dvdr">:</div>
            <div class="det"><?php echo $row['desc'];?></div>
        </div>        
        <div class="clear"></div>
    </div>
     <div class="add_info"><a href='javascript:history.back(1);'>Back</a></div>
     <div class="clear"></div>
    
</div>
<!-- -------------------------------- container ends ------------------------------ -->
<?php include("footer.php");?>
</body></html>
