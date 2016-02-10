<?php include("header.php");?>
<?php include("menu.php");?>
<?php
$registration_id=$_SESSION['registration_id'];
if(isset($_POST['reset']))
{
	$_SESSION['gender']='';
	$_SESSION['education']='';
	$_SESSION['area_of_interest']='';
}
else
{ 
	if(isset($_POST['search'])){
		$_SESSION['gender']=$_POST['gender'];
		$_SESSION['education']=$_POST['education'];
		$_SESSION['area_of_interest']=$_POST['area_of_interest'];
		
	}
}
$sql="select a.id,a.type_of_actor,b.fname,b.gender,c.education,d.area_of_interest from job_registration a,job_profile b,job_education_profile c,job_area_of_interest d where a.id=b.registration_id and a.type_of_actor='S' and a.status='1'";
if(isset($_SESSION['gender']) && $_SESSION['gender']!='')
{	$gender=$_POST['gender'];
	$sql.=" and b.gender like '%$gender%'";
}
if(isset($_SESSION['education']) && $_SESSION['education']!='')
{	$education=$_POST['education'];
	$sql.=" and c.education='$education'";
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
var employer_registraion_id=clas[1];
var registration_id=clas[2];	
	if(confirm("Are you sure you want to contact?")){
		$.ajax({
				type:"POST",
				url:"employer_job_inc.php",
				data:"action=showcandidateinterest&&employer_registraion_id="+employer_registraion_id+"&&registration_id="+registration_id,
				dataType:"JSON",
				success:function(data)
				{
					alert(data);
					//console.log(data);
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
          <th> Gender </th>
          <th> Qualification </th>
          <th> Area Of Interest</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td data-title="Gender">
          <select name="gender" id="gender">
				<option value="">Select Gender</option>
				<option value="Male" <?php if($_SESSION['gender']=="Male"){?> selected="selected"<?php }?>>Male</option>
                <option value="Female" <?php if($_SESSION['gender']=="Female"){?> selected="selected"<?php }?>>Female</option>
			</select>
          </td>
          <td data-title="Qualification">
		  	<select name="education" id="education">
				<option value="">Select Qualification</option>
				<?php 
					$result=$conn->query("select * from master_education where status=1");
					while($row=$result->fetch_assoc()){
				?>
				<option value="<?php echo $row['id'];?>" <?php if($_SESSION['education']==$row['id']){?> selected="selected"<?php }?>><?php echo $row['education'];?></option>
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
          <th> Gender </th>
          <th> Qualification </th>
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
          <td data-title="Candidate Name"><a href="candidate_trainer_profile.php?registration_id=<?php echo $row['id'];?>"><?php echo $row['fname'];?></a></td>
          <td data-title="Gender"><?php echo $row['gender'];?></td>
          <td data-title="Qualification"><?php echo getUserEducation($conn,$row['id']);?></td>
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