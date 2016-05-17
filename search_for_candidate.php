<?php include("header.php");?>
<?php include("menu.php");?>
<?php
$registration_id=$_SESSION['registration_id'];
if(isset($_POST['reset']))
{
	$_SESSION['keyword']='';
	$_SESSION['designation']='';
	$_SESSION['city']='';
	$_SESSION['area_of_interest']='';
}
else
{ 
	if(isset($_POST['search'])){
		$_SESSION['keyword']=$_POST['keyword'];
		$_SESSION['designation']=$_POST['designation'];
		$_SESSION['city']=$_POST['city'];
		$_SESSION['area_of_interest']=$_POST['area_of_interest'];
		
	}
}
$sql="select a.id,a.type_of_actor,b.fname,b.city,c.education,d.area_of_interest,e.last_designation from job_registration a,job_profile b,job_education_profile c,job_area_of_interest d,job_employment_profile e where a.id=b.registration_id and a.type_of_actor='S' and a.status='1'";

if(isset($_SESSION['keyword']) && $_SESSION['keyword']!='')
{	$keyword=$_POST['keyword'];
	$sql.=" and (b.gender like '%$keyword%' || b.fname like '%$keyword%' || b.city in (select id from master_city where city='$keyword'))";
}
if(isset($_SESSION['city']) && $_SESSION['city']!='')
{	$city=$_POST['city'];
	$sql.=" and b.city='$city'";
}
if(isset($_SESSION['designation']) && $_SESSION['designation']!='')
{	$designation=$_POST['designation'];
	$sql.=" and e.last_designation ='$designation'";
}
if(isset($_SESSION['area_of_interest']) && $_SESSION['area_of_interest']!='')
{   $area_of_interest=$_POST['area_of_interest'];
	$sql.=" and d.area_of_interest='$area_of_interest'";
}
$sql.=" group by a.id order by a.id desc";
?>

<!-- -------------------------------- container starts ------------------------------ -->
<script type="text/javascript">
$(document).ready(function(){
$('.showcandidateinterest').live('click',function(){
var clas=$(this).attr('class').split(' ');
var registration_id=clas[1];	
var employer_registraion_id=clas[2];
	if(confirm("Are you sure you want to contact?")){
		$.ajax({
				type:"POST",
				url:"employer_job_inc.php",
				data:"action=showcandidateinterest&&employer_registraion_id="+employer_registraion_id+"&&registration_id="+registration_id,
				dataType:"JSON",
				success:function(data)
				{
					//alert(data);
					//console.log(data);
					if(data.error_msg=='Success')
					alert('You have succesfully Contacted');
				else
					alert('Some Technical Problem. Contact Admininstrator');
					//window.location.href=data.url;
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
<div class="page_title"><span>Search for Candidate</span></div>
<div class="inner_conainer fade_anim">
<form action="" name="search_for_job" method="post">
  <div class="table_main  editinfo" id="no-more-tables">
    <table class="table-bordered table-striped table-condensed cf">
      <thead>
        <tr bgcolor="#868686" style="color:#fff;">
          <th> Keyword </th>
          <th> Designation </th>
          <th> Location </th>
          <th> Area Of Interest</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td data-title="Keyword">
          	<input type="text" name="keyword" id="keyword" value="<?php echo $_SESSION['keyword'];?>" />
          </td>
          <td data-title="Designation">
         	 <input type="text" name="designation" id="designation" value="<?php echo $_SESSION['designation'];?>" />
          </td>
          <td data-title="Location">
            <select name="city" id="city">
               <option value="">---Locations---</option>
                <?php 
                	$city_result=$conn->query("select * from master_city where status=1");
                	while($city_row=$city_result->fetch_assoc()){
                ?>
              	<option value="<?php echo $city_row['id'];?>" <?php if($city_row['id']==$_SESSION['city'])echo 'selected="selected"';?> ><?php echo $city_row['city'];?></option>
              <?php }?>
            </select>
		  </td>
          <td data-title="Area Of Interest">
		  <select name="area_of_interest" id="area_of_interest">
            <option value="">---Select Area Of Interest---</option>
            <?php 
            $result1=$conn->query("select * from master_interest_area where status=1");
            while($row1=$result1->fetch_assoc()){
            ?>
              <option value="<?php echo $row1['id'];?>" <?php if($row1['id']==$_SESSION['area_of_interest'])echo 'selected="selected"';?> ><?php echo $row1['area_of_interest'];?></option>
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
        <th> Candidate Name </th>
          <th> Last Designation </th>
          <th> Loaction </th>
          <th> Area Of Interest</th>
          <th></th>
        </tr>
      </thead>
      <tbody>
	  <?php 
            $result=$conn->query($sql);
            $num=$result->num_rows;
			while($row=$result->fetch_assoc()){
        ?>
	  
        <tr class="paginate">
        <!--<td data-title="Candidate Name"><a href="candidate_trainer_profile.php?registration_id=<?php echo $row['id'];?>"><?php echo $row['fname'];?></a></td>-->
		  <?php if(isset($_SESSION['registration_id'])):?>
          	<?php if(actor_type($conn,$registration_id)=="F"):?>
              <td data-title="">
                <a href="candidate_trainer_profile.php?registration_id=<?php echo $row['id'];?>"><?php echo $row['fname'];?></a>
              </td>
          	<?php else:?>
            	<td data-title="">
                	<a href="#" onclick="return(window.confirm('Only Employer can contact..!!'));" ><?php echo $row['fname'];?></a>
                </td>
		<?php endif ;else : ?>
		<td data-title="Action">
        	<a class="fancybox fancybox.ajax fade" href="login_signup_form.php?redirect_url=<?php echo basename($_SERVER['PHP_SELF']);?>"><?php echo $row['fname'];?></a>
         </td>
		<?php endif;?>		  
		  
          <td data-title="Designation"><?php echo $row['last_designation'];?></td>
          <td data-title="Location"><?php echo getCityName($conn,$row['city']);?></td>
          <td data-title="Area of Interest"><?php echo getUserInterest($conn,$row['id']);?></td>
        
		  <?php if(isset($_SESSION['registration_id'])):?>
          	<?php if(actor_type($conn,$registration_id)=="F"):?>
              <td data-title="">
                <a href="#" class="showcandidateinterest <?php echo $row['id']." ".$registration_id;?> contact">Contact</a>
              </td>
          	<?php else:?>
            	<td data-title="">
                	<a href="#" onclick="return(window.confirm('Only Employer can contact..!!'));" class="contact">Contact</a>
                </td>
		<?php endif ;else : ?>
		<td data-title="Action">
        	<a class="fancybox fancybox.ajax fade" href="login_signup_form.php?redirect_url=<?php echo basename($_SERVER['PHP_SELF']);?>">Show Interest</a>
         </td>
		<?php endif;?>
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