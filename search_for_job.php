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
{	$keyword=$_SESSION['keyword'];
	$sql.=" and keyword like '%$keyword%'";
}
if(isset($_SESSION['designation']) && $_SESSION['designation']!='')
{	$designation=$_SESSION['designation'];
	$sql.=" and designation like '%$designation%'";
}
if(isset($_SESSION['area_of_interest']) && $_SESSION['area_of_interest']!='')
{   $area_of_interest=$_SESSION['area_of_interest'];
	$sql.=" and area_of_interest='$area_of_interest'";
}
if(isset($_SESSION['job_location']) && $_SESSION['job_location']!='')
{	$job_location= $_SESSION['job_location'];
	$sql.=" and job_location in (select id from master_city where city like '%$job_location%')";
}

if(isset($_POST['view_job']))
{
	$_SESSION['view_job']=$_POST['view_job'];
} 
if(isset($_SESSION['view_job']) && $_SESSION['view_job']!='')
{
$view_job= $_SESSION['view_job'];
$today_date = date('Y-m-d H:i:s');
$last=date('Y-m-d H:i:s', strtotime($view_job));
$sql.=" and `post_date` BETWEEN '" .$last."' AND  '" .$today_date."' order by id desc ";
}
?>

<!-- -------------------------------- container starts ------------------------------ -->
<script type="text/javascript">
$(document).ready(function(){
$('.showjobinterest').live('click',function(){
var clas=$(this).attr('class').split(' ');
var job_id=clas[1];
var employer_registraion_id=clas[2];
var registration_id=clas[3];	
	if(confirm("Are you sure you want to show interest?")){
		$.ajax({
				type:"POST",
				url:"employer_job_inc.php",
				data:"action=showjobinterest&&job_id="+job_id+"&&employer_registraion_id="+employer_registraion_id+"&&registration_id="+registration_id,
				dataType:"JSON",
				success:function(data)
				{
					if($.trim(data.error_msg)!="success")
						alert(data.error_msg);
					else
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
<div class="page_title"><span>Search for job</span></div>
<div class="inner_conainer fade_anim">
<form action="" name="search_for_job" method="post" autocomplete="on">
  <div class="table_main  editinfo" id="no-more-tables">
    <table class="table-bordered table-striped table-condensed cf">
      <thead>
        <tr bgcolor="#868686" style="color:#fff;">
          <th> keyword </th>
          <th> designation </th>
          <th> Industry Type </th>
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
          <input type="text" class="auto_input" name="job_location" value="<?php echo $_SESSION['job_location'];?>">
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
      <form method="POST" name="job_day" id="job_day">
        <tr>
          <th >Job Search Result</th>
          <th align="right"> 
          <select name="view_job" onchange="this.form.submit();">
            <option value="0">View All Posted Jobs</option>  
			<option <?php if($_SESSION['view_job'] == '-7 day') echo 'selected '; ?> value="-7 day">Last Week</option>
			<option <?php if($_SESSION['view_job'] == '-14 day') echo 'selected '; ?> value="-14 day">Last Two Weeks</option>
			<option <?php if($_SESSION['view_job'] == '-21 day') echo 'selected '; ?> value="-21 day">Last Three Weeks</option>
			<option <?php if($_SESSION['view_job'] == '-30 day') echo 'selected '; ?> value="-30 day">Last 30 days</option>
          </select>
          </th>
        </tr>
        </form>
      </thead>
      <tbody>
	  <?php 
            $result=$conn->query($sql);
            $num=$result->num_rows;
			while($row=$result->fetch_assoc()){
        ?>
	  
        <tr class="paginate">
          <td colspan="2" data-title="<?php echo $row['job_title'];?>">
              <h2 style="float: left;" align="left"><a href="job_profile.php?id=<?php echo $row['id'];?>" target="_blank"><?php echo $row['job_title'];?></a></h2>
              <span style="float: right;font-size: inherit;padding-left: 10px;">Job Posted on :<br><?php echo date('Y-m-d',strtotime($row['post_date']));?></span>
              <?php if(isset($_SESSION['registration_id'])):?>
                <?php if(actor_type($conn,$registration_id)=="S"):?>
                  <p data-title="">
                    <a href="#" class="showjobinterest <?php echo $row['id']." ".$row['registration_id']." ".$registration_id;?> contact" style="float: right;padding-right: 25px;margin-bottom: 5px;">Apply</a>
                  </p>
                <?php else:?>
                  <p data-title="">
                    <a href="#" class="contact" style="float: right;padding-right: 25px;margin-bottom: 5px;" onclick="return(window.confirm('Only Candidate can contact..!!'));" >Contact</a>
                  </p>
                <?php endif ;else : ?>
                  <p data-title="Action">
                    <a class="fancybox fancybox.ajax fade contact" href="login_signup_form.php?redirect_url=<?php echo basename($_SERVER['PHP_SELF']);?>" style="float: right;padding-right: 25px;margin-bottom: 5px;">Apply</a>
                  </p>
              <?php endif;?>
            <hr style="clear: both;">
            Min Exp : <?php echo $row['min_exp'];?> &nbsp; Yrs. &nbsp; Location : <?php echo getCityName($conn,$row['job_location']);?></p>
            <p>Description : <br> <?php echo $row['job_desc'];?></p>
            Skills : <?php echo $row['keyword'];?>
          </td>
          <!-- <td data-title="Keyword"><?php echo $row['keyword'];?></td>
          <td data-title="Designation"><?php echo $row['designation'];?></td>
          <td data-title="Area of Interest"><?php echo getInterest($conn,$row['area_of_interest']);?></td>
          <td data-title="Job Location "><?php echo getCityName($conn,$row['job_location']);?></td> -->
<!-- 		  <?php if(isset($_SESSION['registration_id'])):?>
          <?php if(actor_type($conn,$registration_id)=="S"):?>
              <td data-title="">
                <a href="#" class="showjobinterest <?php echo $row['id']." ".$row['registration_id']." ".$registration_id;?> contact">Contact</a>
              </td>
          	<?php else:?>
            	<td data-title="">
                	<a href="#" onclick="return(window.confirm('Only Candidate can contact..!!'));" class="contact">Contact</a>
                </td>
		<?php endif ;else : ?>
		<td data-title="Action">
        	<a class="fancybox fancybox.ajax fade" href="login_signup_form.php?redirect_url=<?php echo basename($_SERVER['PHP_SELF']);?>">Show Interest</a>
         </td>
		<?php endif;?> -->
        <!-- <td data-title="">
          	<a href="job_profile.php?id=<?php echo $row['id'];?>" class="contact" target="_blank">View</a>
         </td> -->
        </tr>
         <?php }?>
      </tbody>
    </table>
    <div class="clear"></div>
  </div>
	<div class="clear"></div>
	<div id="page-nav"></div>
  <div class="clear"></div>
</div>
<!-- -------------------------------- container ends ------------------------------ -->
<?php include("footer.php");?>
</body></html>