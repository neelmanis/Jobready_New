<?php include("header.php");?>
<?php 
$registration_id=$_SESSION['registration_id'];
if(!isset($_SESSION['registration_id']) || actor_type($conn,$registration_id)!="F")
		header('location:index.php');
?>
<?php include("menu.php");?>
<!-- -------------------------------- container starts ------------------------------ -->
<div class="page_title"><span>welcome <?php echo getUserName($conn,$registration_id)?></span></div>
<div class="inner_conainer" >
  <?php include("employer_dashboard_link.php");?>
  <div class="dashboard_right fade_anim">
    <div class="content_head"><a class="fancybox fancybox.ajax fade" href="recruiter_form.php">add recruiter</a></div>
    <div class="table_job" id="no-more-tables-job">
      <div class="clear"></div>
      <table class="table-bordered-job table-striped table-condensed-job cf">
        <thead>
          <tr>
            <th> Name </th>
            <th> Email ID</th>
            <th> Mobile No</th>
            <th> Designation</th>
            <th> Edit</th>
          </tr>
        </thead>
        <tbody>
          <?php 
            /*..............................Recruiter List....................................*/
            $result=$conn->query("select * from job_registration where id='$registration_id'");
            while($row=$result->fetch_assoc()){
        ?>
          <tr>
            <td data-title="Name"><?php echo getUserName($conn,$row['id']);?></td>
            <td data-title="Email ID"><?php echo $row['email'];?></td>
            <td data-title="Mobile"><?php echo $row['mobile_no'];?></td>
            <td data-title="Designation"><?php echo getDesignation($conn,$row['id']);?></td>
            <td data-title="Edit"><a class="fancybox fancybox.ajax fade" href="recruiter_form.php?registration_id=<?php echo $row['id'];?>"><img src="images/edit_icon.png" /></a></td>
          </tr>
          <?php }?>
        </tbody>
      </table>
      <div class="clear"></div>
    </div>
    <div class="clear"></div>
  </div>
  <div class="clear"></div>
</div>
<!-- -------------------------------- container ends ------------------------------ -->
<!-- -------------------------------- footer starts ------------------------------ -->
<?php include("footer.php");?>
<!-- -------------------------------- footer ends ------------------------------ -->
</body>
</html>
