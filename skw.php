<?php
include("header.php");
include("menu.php");
?>
<?php 
$result=$conn->query("select * from cms_editor where id='2'");
$row=$result->fetch_assoc();
$title=$row['title'];
$desc=$row['desc'];
?>
<div class="page_title"><span> <?php echo $title;?> </span></div>
<div class="inner_conainer fade_anim">
<?php echo $desc;?>
<div class="clear"></div>  
</div>
<!-- -------------------------------- container ends ------------------------------ -->

<?php include("footer.php");?>
</body></html>