<?php include("header.php");?>
<?php include("menu.php");?>
<!-- xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx accordian starst  xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx -->
<link rel="stylesheet" type="text/css" href="css/accordian.css" />
<script type="text/javascript" src="js/ddaccordion.js"></script>
<script type="text/javascript">
ddaccordion.init({
	headerclass: "expandable", //Shared CSS class name of headers group that are expandable
	contentclass: "categoryitems", //Shared CSS class name of contents group
	revealtype: "click", //Reveal content when user clicks or onmouseover the header? Valid value: "click" or "mouseover
	mouseoverdelay: 200, //if revealtype="mouseover", set delay in milliseconds before header expands onMouseover
	collapseprev: true, //Collapse previous content (so only one open at any time)? true/false 
	defaultexpanded: [0], //index of content(s) open by default [index1, index2, etc]. [] denotes no content
	onemustopen: false, //Specify whether at least one header should be open always (so never all headers closed)
	animatedefault: true, //Should contents open by default be animated into view?
	persiststate: true, //persist state of opened contents within browser session?
	toggleclass: ["", "openheader"], //Two CSS classes to be applied to the header when it's collapsed and expanded, respectively ["class1", "class2"]
	togglehtml: ["prefix", "", ""], //Additional HTML added to the header when it's collapsed and expanded, respectively  ["position", "html1", "html2"] (see docs)
	animatespeed: "fast", //speed of animation: integer in milliseconds (ie: 200), or keywords "fast", "normal", or "slow"
	oninit:function(headers, expandedindices){ //custom code to run when headers have initalized
		//do nothing
	},
	onopenclose:function(header, index, state, isuseractivated){ //custom code to run whenever a header is opened or closed
		//do nothing
	}
})

</script>
<!-- xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx accordian ends  xxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxxx -->
<link type="text/css" rel="stylesheet" href="css/simplePagination.css" />
<script src="js/jquery.simplePagination.js"></script>
<!--<script type="text/javascript" src="js/jquery.pajinate.js"></script>-->
<script>
jQuery(function($) {
    var pageParts = $(".paginate");
    var numPages = pageParts.length;
    var perPage = 10;
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
<div class="page_title"><span> Interview tips </span></div>
<div class="inner_conainer">
  <div class="arrowlistmenu">
	<?php 
    $result=$conn->query("select id,question,true_ans,status from cms_quest_ans where status='1'");
    while($row=$result->fetch_assoc())
    {
    $id=$row['id'];		
    $question=$row['question'];	
    $true_ans=$row['true_ans'];	
    $status=$row['status'];	
    ?>
    <div class="main_accord paginate">
      <div class="menuheader expandable"><strong><span class="quest">
	  Q.<?php echo preg_replace("/(<br\s*\/?>\s*)+/", '',$id);?></span>
<?php echo preg_replace("/(<br\s*\/?>\s*)+/", '',$question);?></strong></div>
      	<div class="categoryitems accord_detail">
        	<div class="ans">Ans.</div>
        	<?php echo $true_ans; ?> </div>
       	</div>
       <div class="clear"></div>
      <?php } ?>
      <div id="page-nav"></div>
  </div>
</div>
<!-- -------------------------------- container ends ------------------------------ -->
<?php include("footer.php");?>
</body>
</html>
