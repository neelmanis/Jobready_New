<?php include("header.php");?>
<?php include("menu.php");?>
<?php
$registration_id=$_SESSION['registration_id'];

if(isset($_POST['reset']))
{
	$_SESSION['keyword']='';
	$_SESSION['designation']='';
	$_SESSION['area_of_interest']='';
	$_SESSION['job_location']='';
}
else
{ 
	if(isset($_POST['search'])){
		$_SESSION['keyword']=$_POST['keyword'];
		$_SESSION['designation']=$_POST['designation'];
		$_SESSION['area_of_interest']=$_POST['area_of_interest'];
		$_SESSION['job_location']=$_POST['job_location'];
	}
}

$sql="select * from master_job where status='1'";

if(isset($_SESSION['keyword']) && $_SESSION['keyword']!='')
{	$keyword=$_POST['keyword'];
	$sql.=" and keyword like '%$keyword%'";
}
if(isset($_SESSION['designation']) && $_SESSION['designation']!='')
{	$designation=$_POST['designation'];
	$sql.=" and designation like '%$designation%'";
}
if(isset($_SESSION['area_of_interest']) && $_SESSION['area_of_interest']!='')
{   $area_of_interest=$_POST['area_of_interest'];
	$sql.=" and area_of_interest='$area_of_interest'";
}
if(isset($_SESSION['job_location']) && $_SESSION['job_location']!='')
{	$job_location= $_POST['job_location'];
	$sql.=" and job_location like '$job_location'";
}
?>

<!-- -------------------------------- container starts ------------------------------ -->
<script type="text/javascript">
$(document).ready(function(){
$('.showjobinterest').live('click',function(){
var clas=$(this).attr('class').split(' ');
var job_id=clas[1];
var employer_registraion_id=clas[2];
var admin_id=clas[3];
var registration_id=clas[4];	
	if(confirm("Are you sure you want to show interest?")){
		$.ajax({
				type:"POST",
				url:"employer_job_inc.php",
				data:"action=showjobinterest&&job_id="+job_id+"&&employer_registraion_id="+employer_registraion_id+"&&admin_id="+admin_id+"&&registration_id="+registration_id,
				dataType:"JSON",
				success:function(data)
				{
					//console.log(data);
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
<div class="page_title"><span>Search for job</span></div>
<div class="inner_conainer fade_anim">
<form action="" name="search_for_job" method="post">
  <div class="table_main  editinfo" id="no-more-tables">
    <table class="table-bordered table-striped table-condensed cf">
      <thead>
        <tr bgcolor="#868686" style="color:#fff;">
          <th> keyword </th>
          <th> designatioin </th>
          <th> Area of Interest </th>
          <th>Job Location</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td data-title="keyword"><input type="text" class="auto_input" name="keyword" value="<?php echo $_SESSION['keyword'];?>"></td>
          <td data-title="designatioin"><input type="text" class="auto_input" name="designation" value="<?php echo $_SESSION['designation'];?>"></td>
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
          <td data-title="Job Location">
		  <select name="job_location" id="job_location">
            <option value="">---Select City/Town---</option>
            <?php 
            $city_result=$conn->query("select * from master_city where status=1");
            while($city_row=$city_result->fetch_assoc()){
            ?>
              <option value="<?php echo $city_row['id'];?>" <?php if($city_row['id']==$_SESSION['job_location'])echo 'selected="selected"';?> ><?php echo $city_row['city'];?></option>
              <?php }?>
        </select>
		  </td>
        </tr>
      </tbody>
    </table>
  </div>
  <div class="add_info">
    <input type="submit"  class="editSave" value="Submit" name="search"/><input type="submit"  name="reset" value="Reset"/>
  </div>
  </form>
  <div class="clear"></div>
  <div class="table_job" id="no-more-tables-job">
    <div class="clear"></div>
    <table class="table-bordered-job table-striped table-condensed-job cf">
      <thead>
        <tr>
          <th>Keyword</th>
          <th>Designation </th>
          <th>Area of Interest</th>
          <th>Job Location </th>
          <th colspan="2"></th>
        </tr>
      </thead>
      <tbody>
	  <?php 
            $result=$conn->query($sql);
            $num=$result->num_rows;
			while($row=$result->fetch_assoc()){
        ?>
	  
        <tr class="paginate">
          <td data-title="Keyword"><?php echo $row['keyword'];?></td>
          <td data-title="Designation"><?php echo $row['designation'];?></td>
          <td data-title="Area of Interest"><?php echo getInterest($conn,$row['area_of_interest']);?></td>
          <td data-title="Job Location "><?php echo getCityName($conn,$row['job_location']);?></td>
		  <?php if(isset($_SESSION['registration_id'])):?>
          <td data-title="">
          	<a href="#" class="showjobinterest <?php echo $row['id']." ".$row['registration_id']." ".$row['admin_id']." ".$registration_id;?> contact">Contact</a>
          </td>
		<?php else : ?>
		<td data-title="Action">
        	<a class="fancybox fancybox.ajax fade" href="login_signup_form.php?redirect_url=<?php echo basename($_SERVER['PHP_SELF']);?>">Show Interest</a>
         </td>
		<?php endif;?>
        <td data-title="">
          	<a href="job_profile.php?id=<?php echo $row['id'];?>" class="contact" target="_blank">View</a>
         </td>
        </tr>
         <?php }?>
      </tbody>
    </table>
    <div class="clear"></div>
  </div>
	<div class="clear"></div>
	<div id="page-nav"></div>
  
  <!--<div class="pagination">
    <div class="prev"><a href="#"><</a></div>
    <a href="#">1</a><a href="#">2</a><a href="#">3</a><a href="#">4</a><a href="#">5</a>
    <div class="next"><a href="#">></a></div>
    <div class="clear"></div>
  </div>-->
  <div class="clear"></div>
</div>
<!-- -------------------------------- container ends ------------------------------ -->
<div class="ad_banner"><a href="#"><img src="images/ad_banner.jpg" alt="" /></a></div>
<?php include("footer.php");?>
</body></html>