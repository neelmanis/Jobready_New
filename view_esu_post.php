<?php
include("header.php");
include("menu.php");
$uid=$_GET['id'];
$result=$conn->query("select * from cms_editor where id='$uid'");
$row=$result->fetch_assoc();
$title=$row['title'];		
$desc=$row['desc'];
?>
<div class="page_title"><span><?php echo $title;?></span></div>
<div class="inner_conainer fade_anim">
<ul class="media">
<li class="paginate">
<p> <?php echo $desc;?></p>
<div class="clear"></div>
</li>
</ul>
<div class="clear"></div>   
</div>
<!-- -------------------------------- container ends ------------------------------ -->
<?php include("footer.php");?>
</body></html>