<?php include("header.php");?>
<?php include("menu.php");?>
<?php $registration_id=$_SESSION['registration_id'];?>
<script src="js/jquery.dataTables.min.js"></script>
<link rel="stylesheet" type="text/css" href="css/jquery.dataTables.min.css"/>
<script type="text/javascript">
$(document).ready(function() {
    $('#example').DataTable({
    "bLengthChange": false,
	"iDisplayLength": 10
	});
});
</script>
<!-- -------------------------------- container starts ------------------------------ -->
<div class="page_title"><span>welcome <?php echo getUserName($conn,$registration_id)?></span></div>
<div class="inner_conainer" >
  <?php include("employer_dashboard_link.php");?>
  <div class="dashboard_right fade_anim">
    <div class="table_job" id="no-more-tables-job">
      <!--<div class="search_other">
        <input type="text" onfocus="if(this.value=='Training category, etc.....')value='';" onblur="if(this.value=='')value='Training category, etc.....';" value="Training category, etc....."/>
        <input type="submit" value="Search" />
        <div class="clear"></div>
      </div>-->
      <div class="clear"></div>
      <table class="table-bordered-job table-striped table-condensed-job cf" id="example">
        <thead>
          <tr>
            <th> Jobcode </th>
            <th> Candidate Name </th>
            <th> Contact</th>
            <th> JobbReady Score</th>
            <th> Interviewed </th>
          </tr>
        </thead>
        <tbody>
        <?php 
            $result=$conn->query("select * from job_student_job_interest where employer_registraion_id='$registration_id' and employer_acceptance='Y'");
            $num=$result->num_rows;
			while($row=$result->fetch_assoc()){
        ?>
          <tr>
            <td data-title="Jobcode"><?php echo getJobDetails($conn,$row['job_id'],'job_code');?></td>
            <td data-title="Candidate Name"><?php echo getUserName($conn,$row['registration_id']);?> </td>
            <td data-title="Contact"><?php echo getUserMobile($conn,$row['registration_id']);?></td>
            <td data-title="JobbReady Score">85%</td>
            <td data-title=""><a href="#">Contacted</a></td>
          </tr>
          <?php }?>
        </tbody>
      </table>
      <div class="clear"></div>
    </div>
    <!--<div class="pagination">
      <div class="prev"><a href="#"><</a></div>
      <a href="#">1</a><a href="#">2</a><a href="#">3</a><a href="#">4</a><a href="#">5</a>
      <div class="next"><a href="#">></a></div>
      <div class="clear"></div>
    </div>-->
    <div class="clear"></div>
  </div>
  <div class="clear"></div>
</div>
<!-- -------------------------------- container ends ------------------------------ -->
<div class="ad_banner"><a href="#"><img src="images/ad_banner.jpg" alt="" /></a></div>
<?php include("footer.php");?>
</body>
</html>
