<?php
include("header.php");
include("menu.php");
$uid=$_GET['id'];
$result=$conn->query("select * from cms_sh_articles where id='$uid'");
$row=$result->fetch_assoc();
$id=$row['id'];
$title=$row['title'];	
$image=$row['image'];	
$desc=$row['desc'];
?>
<div class="page_title"><span><?php echo $title;?></span></div>
<div class="inner_conainer fade_anim">
<ul class="media">
<li class="paginate">
<?php if(isset($image) && !empty($image)) { ?>
<img src="admin/article_image/<?php echo $image;?>" ><?php } ?>
<p> <?php echo $desc;?></p>
<div class="clear"></div>
</li>
</ul>
<div class="clear"></div>   
</div>
<!-- -------------------------------- container ends ------------------------------ -->
<?php include("footer.php");?>
</body></html>