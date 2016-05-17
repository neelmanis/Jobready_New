<?php
include("header.php");
include("menu.php");
?>
<link type="text/css" rel="stylesheet" href="css/simplePagination.css" />
<script src="js/jquery.simplePagination.js"></script>
<!--<script type="text/javascript" src="js/jquery.pajinate.js"></script>-->
<script>
jQuery(function($) {
    var pageParts = $(".paginate");
    var numPages = pageParts.length;
    var perPage = 5;
    pageParts.slice(perPage).hide();
    $("#page-nav").pagination({
        items: numPages,
        itemsOnPage: perPage,
        cssStyle: "light-theme",
        onPageClick: function(pageNum) {
            var start = perPage * (pageNum - 1);
            var end = start + perPage;
            pageParts.hide()
                     .slice(start, end).show();
        }
    });
});
</script>
<div class="page_title"><span> Soft skills at Work </span></div>
<?php 
$result=$conn->query("select * from cms_skw where status='1'");
while($row=$result->fetch_assoc())
{
$id=$row['id'];
$title=$row['title'];	
$image=$row['image'];	
$desc=$row['desc'];	
$limit=200;
$post = substr($desc, 0, $limit); 
?>
<div class="inner_conainer fade_anim">
<ul class="media">
<li class="paginate">
<?php if(isset($image) && !empty($image)) { ?>
<img src="admin/skw/<?php echo $image;?>" ><?php } ?>
<div class="skw"><a href="view_skw_post.php?id=<?php echo $id; ?>" target="_blank"><?php echo $title;?></a></div>
<p> <?php echo $post;?></p>
<div class="clear"></div>
</li>
<?php } ?>
</ul>
<div class="clear"></div>
 <div id="page-nav"></div>    
</div>
<!-- -------------------------------- container ends ------------------------------ -->
<?php include("footer.php");?>
</body></html>