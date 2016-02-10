<?php include("header.php");?>
<?php include("menu.php");?>
<?php  $registration_id=$_SESSION['registration_id'];?>
<?php 
$id=$_REQUEST['id'];
$result=$conn->query("select * from job_training_list where id='$id'");
$row=$result->fetch_assoc();
?>


<!-- -------------------------------- container starts ------------------------------ -->
<div class="page_title"><span>Training Detail</span></div>
<div class="inner_conainer">
		<div class="info_wrap">
        <div class="info">
            <div class="head">Trainer Name</div>
            <div class="dvdr">:</div>
            <div class="det"><?php echo getUserName($conn,$row['registration_id']);?></div>
        </div>
        <div class="info">
            <div class="head">Trainign Category</div>
            <div class="dvdr">:</div>
            <div class="det"><?php echo getInterest($conn,$row['area_of_interest']);?></div>
        </div>
        <div class="info">
            <div class="head">Training Description</div>
            <div class="dvdr">:</div>
            <div class="det"><?php echo $row['description'];?></div>
        </div>
          <div class="info">
            <div class="head">Download Document</div>
            <div class="dvdr">:</div>
            <?php if($row['doc']!=''){?>
            <div class="det"><a href="upload/training_doc/<?php echo $row['registration_id']."/".$row['doc'];?>" target="_blank">Link</a></div>
            <?php }else{ ?>
            <div class="det">Doc Not Found</div>
            <?php }?>
        </div>
        <div class="clear"></div>
    </div>
    <div class="clear"></div>    
    <div class="add_info"><a href='javascript:history.back(1);'>Back</a></div>
</div>
<!-- -------------------------------- container ends ------------------------------ -->
<?php include("footer.php");?>
</body></html>
