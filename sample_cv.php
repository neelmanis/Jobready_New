<?php 
include("header.php");
include("menu.php");
?>
<div class="page_title"><span> Sample CVs </span></div>
<?php 
$result=$conn->query("select title, cv, status from cms_sample_cv where status='1'");
while($row=$result->fetch_assoc())
{
$title=$row['title'];	
$cv=$row['cv'];	
?>
<div class="inner_conainer fade_anim">
<ul class="media">
<li>
<div class="name"><?php echo $title;?>
<?php if($cv!=''){ ?>
<span><a href="admin/sample_cv/<?php echo $cv;?>">Download</a> </span>
<?php }else{ echo 'Doc Not Found'; } ?>
</div>


<div class="clear"></div>
</li>
<?php } ?>
</ul>
<div class="clear"></div>    
</div>
<!-- -------------------------------- container ends ------------------------------ -->
<?php include("footer.php");?>
</body></html>