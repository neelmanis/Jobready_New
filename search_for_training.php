<?php include("header.php");?>
<?php include("menu.php");?>
<?php 
$registration_id=$_SESSION['registration_id'];
if(isset($_POST['reset']))
{
	$_SESSION['keyword']='';
	$_SESSION['area_of_interest']='';
}
else
{ 
	if(isset($_POST['search'])){
		$_SESSION['keyword']=$_POST['keyword'];
		$_SESSION['area_of_interest']=$_POST['area_of_interest'];
	}
}

$sql="select * from job_training_list where status='1' and registration_id!=0";
if(isset($_SESSION['area_of_interest']) && $_SESSION['area_of_interest']!='')
{	$area_of_interest=$_SESSION['area_of_interest'];
	$sql.=" and area_of_interest='$area_of_interest'";
}
if(isset($_SESSION['keyword']) && $_SESSION['keyword']!='')
{ $keyword=$_SESSION['keyword'];
	$sql.=" and description like '%$keyword%'";
}
?>
<script type="text/javascript">
$(document).ready(function(){
$('.showinterest').live('click',function(){
var clas=$(this).attr('class').split(' ');
var training_id=clas[1];
var trainer_registraion_id=clas[2];
var registration_id=clas[3];	
	if(confirm("Are you sure you want to show interest?")){
		$.ajax({
				type:"POST",
				url:"training_inc.php",
				data:"action=showinterest&&training_id="+training_id+"&&trainer_registraion_id="+trainer_registraion_id+"&&registration_id="+registration_id,
				dataType:"JSON",
				success:function(data)
				{
					window.location.href=data.url;
				}
			});
	}
	else
	{
		return false;
	}
  });
});
</script>
<!--.............................Pagination.......................................-->
<link type="text/css" rel="stylesheet" href="css/simplePagination.css" />
<script src="js/jquery.simplePagination.js"></script>
<script>
jQuery(function($) {
    var pageParts = $(".paginate");
    var numPages = pageParts.length;
    var perPage = 3;
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
<!-- -------------------------------- container starts ------------------------------ -->

<div class="page_title"><span>Search for Training</span></div>
<div class="inner_conainer fade_anim">
<form action="" name="search_for_trainer" method="post">
  <div class="table_main  editinfo" id="no-more-tables">
    <table class="table-bordered table-striped table-condensed cf">
      <thead>
        <tr bgcolor="#868686" style="color:#fff;">
          <th>Keyword</th>
          <th> Category</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td data-title="Keyword"><input type="text" class="auto_input" name="keyword" value="<?php echo $_SESSION['keyword'];?>"></td>
          <td data-title="Area of Interest">
			<select name="area_of_interest" id="area_of_interest">
				<option value="">Please Select Category</option>
				<?php 
					$result=$conn->query("select * from master_interest_area where status=1");
					while($row=$result->fetch_assoc()){
				?>
				<option value="<?php echo $row['id'];?>" <?php if($_SESSION['area_of_interest']==$row['id']){?> selected="selected"<?php }?>><?php echo $row['area_of_interest'];?></option>
			<?php }?>
			</select>
          </td>
        </tr>
      </tbody>
    </table>
  </div>
  <div class="add_info">
    <input type="submit"  class="editSave" value="Submit" name="search" /> <input type="submit" name="reset" value="Reset"/>
  </div>
 </form>
  
  <div class="clear"></div>
  
  <div class="table_job" id="no-more-tables-job">
    <div class="clear"></div>
    <table class="table-bordered-job table-striped table-condensed-job cf">
      <thead>
        <tr>
          <th>Training Category</th>
          <th>Trainer Name</th>
          <th>Training Brief</th>
		  <th colspan="2">Action</th>
        </tr>
      </thead>
      <tbody>
		<?php	 
			$result=$conn->query($sql);
			$num=$result->num_rows;
		?>
        <?php while($row=$result->fetch_assoc()){?>
            <tr class="paginate">
            <td data-title="Training Category"><?php echo getInterest($conn,$row['area_of_interest']);?></td>
            <td data-title="Training Name"><a href="candidate_trainer_profile.php?registration_id=<?php echo $row['registration_id'];?>"><?php echo getUserName($conn,$row['registration_id']);?></a></td>
            <td data-title="Training Brief"><?php echo $row['description'];?></td>
            
        	 <?php if(isset($_SESSION['registration_id'])):?>
          		<?php if(actor_type($conn,$registration_id)=="S"):?>
                    <td data-title="Action">
                    	<a href="#" class="showinterest <?php echo $row['id']." ".$row['registration_id']." ".$registration_id;?>">Show Interest</a>
                    </td>
          		<?php else:?>
                    <td data-title="">
                        <a href="#" onclick="return(window.confirm('Only Candidate can show interest..!!'));" class="contact">Contact</a>
                    </td>
				<?php endif ;else :?>
                    <td data-title="Action">
                        <a class="fancybox fancybox.ajax fade" href="login_signup_form.php?redirect_url=<?php echo basename($_SERVER['PHP_SELF']);?>">Show Interest</a>
                     </td>
			<?php endif;?>
            
            
            <td data-title="Action"><a href="training_profile_detail.php?id=<?php echo $row['id'];?>">View</a></td>
          </tr>
        <?php }?>
      </tbody>
    </table>
  </div>
    <div class="clear"></div>
	<div id="page-nav"></div>
  <div class="clear"></div>
</div>
<!-- -------------------------------- container ends ------------------------------ -->
<?php include("footer.php");?>
</body></html>