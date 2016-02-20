<?php
include("header.php");
include("menu.php");
?>
<div class="page_title"><span> Soft skills at Work </span></div>
<?php 
$result=$conn->query("select * from cms_skw where status='1'");
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
<img src="admin/skw/<?php echo $image;?>" ><?php } ?>
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