<?php include("header.php");?>
<?php include("menu.php");?>
<div class="page_title"><span> JobbReady in Media </span></div>
<?php 
$result=$conn->query("select * from cms_why_jb_media where status='1'");
while($row=$result->fetch_assoc())
{
$title=$row['title'];	
$doc=$row['doc'];	
$desc=$row['desc'];	
?>
<div class="inner_conainer fade_anim">
<ul class="media">
<li>
<?php if(isset($doc) && !empty($doc)) { ?>
<img src="admin/jb_media/<?php echo $doc;?>" ><?php } ?>
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