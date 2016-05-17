<?php
include("header.php");
include("menu.php");
?>
<div class="page_title"><span> Employment Scenario Updates </span></div>
<?php 
$result=$conn->query("select * from cms_editor where status='1'");
while($row=$result->fetch_assoc())
{
$id=$row['id'];
$title=$row['title'];	
$desc=$row['desc'];
$limit=250;
$post = substr($desc, 0, $limit); 
?>
<div class="inner_conainer fade_anim">
<ul class="media">
<li>
<div class="skw"><a href="view_esu_post.php?id=<?php echo $id; ?>" target="_blank"><?php echo $title;?><a/></div>
<p> <?php echo $post;?></p>
<div class="clear"></div>
</li>
<?php } ?>
</ul>
<div class="clear"></div>    
</div>
<!-- -------------------------------- container ends ------------------------------ -->
<?php include("footer.php");?>
</body></html>