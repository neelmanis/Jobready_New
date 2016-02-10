<?php include("header.php");?>
<?php include("menu.php");?>
<div class="page_title"><span> Self help Articles </span></div>
<?php 
$result=$conn->query("select * from cms_sh_articles where status='1'");
while($row=$result->fetch_assoc())
{
$title=$row['title'];	
$image=$row['image'];	
$desc=$row['desc'];	
?>
<div class="inner_conainer fade_anim">
<ul class="media">
<li>
<?php if(isset($image) && !empty($image)) { ?>
<img src="admin/article_image/<?php echo $image;?>" ><?php } ?>
<div class="name"><?php echo $title;?></div>
<p> <?php echo $desc;?></p>
<div class="clear"></div>
</li>
<?php } ?>
</ul>
<div class="clear"></div>    
</div>
<!-- -------------------------------- container ends ------------------------------ -->
<?php include("footer.php");?>
</body></html>