<?php include("header.php");?>
<?php include("menu.php");?>
<?php
//$registration_id=$_SESSION['registration_id'];

if(isset($_POST['reset']))
{
	$_SESSION['email']='';
	$_SESSION['mobile_no']='';
	$_SESSION['type_of_actor']='';
}
else
{ 
	if(isset($_POST['search'])){
		$_SESSION['email']=$_POST['email'];
		$_SESSION['mobile_no']=$_POST['mobile_no'];
		$_SESSION['type_of_actor']=$_POST['type_of_actor'];
	}
}

$sql="select * from job_registration where status='1'";

if(isset($_SESSION['email']) && $_SESSION['email']!='')
{	$email=$_POST['email'];
	$sql.=" and email like '%$email%'";
}
if(isset($_SESSION['mobile_no']) && $_SESSION['mobile_no']!='')
{	$mobile_no=$_POST['mobile_no'];
	$sql.=" and mobile_no like '%$mobile_no%'";
}
if(isset($_SESSION['type_of_actor']) && $_SESSION['type_of_actor']!='')
{   $type_of_actor=$_POST['type_of_actor'];
	$sql.=" and type_of_actor='$type_of_actor'";
}
?>

<!-- -------------------------------- container starts ------------------------------ -->
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
          <th> email </th>
          <th> mobile </th>
          <th> Company </th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td data-title="email"><input type="text" class="auto_input" name="email" value="<?php echo $_SESSION['email'];?>"></td>
          <td data-title="mobile"><input type="text" class="auto_input" name="mobile_no" value="<?php echo $_SESSION['mobile_no'];?>"></td>
          <td data-title="Area of Interest">
		  	<select name="type_of_actor" id="type_of_actor">
				<option value="">Please Select Actor</option>
				<?php 
					$result=$conn->query("select  type_of_actor from job_registration where status=1");
					while($row=$result->fetch_assoc()){
				?>
				<option value="<?php echo $row['id'];?>" <?php if($_SESSION['type_of_actor']==$row['id']){?> selected="selected"<?php }?>><?php echo $row['type_of_actor'];?></option>
			<?php }?>
			</select>
          </td>
        </tr>
      </tbody>
    </table>
  </div>
  <div class="add_info">
<input type="submit"  class="editSave" value="Submit" name="search"/>
<input type="submit"  name="reset" value="Reset"/>
  </div>
  </form>
  <div class="clear"></div>
  <div class="table_job" id="no-more-tables-job">
    <div class="clear"></div>
    <table class="table-bordered-job table-striped table-condensed-job cf">
      <thead>
        <tr>
          <th>email</th>
          <th>mobile_no </th>
          <th>Company</th>
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
          <td data-title="email"><?php echo $row['email'];?></td>
          <td data-title="mobile_no"><?php echo $row['mobile_no'];?></td>
          <td data-title="Area of Interest"><?php echo $row['type_of_actor'];?></td>
		   <td data-title="">
          	<a href="job_profile.php?id=<?php echo $row['id'];?>" class="contact">View</a>
         </td>
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