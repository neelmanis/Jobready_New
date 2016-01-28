<?php include("header.php");?>
<?php include("menu.php");?>
<?php $registration_id=$_SESSION['registration_id'];?>
<!-- -------------------------------- container starts ------------------------------ -->
<script type="text/javascript">
$(document).ready(function() {
    $('#example').DataTable({
    "bLengthChange": false,
	"iDisplayLength": 10
	});
});
</script>
<script type="text/javascript">
$(document).ready(function(){
$('.acceptinterest').live('click',function(){
var clas=$(this).attr('class').split(' ');
var id=clas[2];	
	if(confirm("Are you sure you want to accept?")){
		$.ajax({
				type:"POST",
				url:"training_inc.php",
				data:"action=acceptinterest&&id="+id,
				dataType:"JSON",
				success:function(data)
				{
					//alert(data);
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

<script src="js/jquery.dataTables.min.js"></script>
<link rel="stylesheet" type="text/css" href="css/jquery.dataTables.min.css"/>
<div class="page_title"><span>welcome <?php echo getUserName($conn,$registration_id)?></span></div>
<div class="inner_conainer" >
  <?php include("trainer_dashboard_link.php");?>
  <div class="dashboard_right fade_anim">
    <div class="table_job" id="no-more-tables-job">
      <div class="clear"></div>
      <table class="table-bordered-job table-striped table-condensed-job cf" id="example">
        <thead>
          <tr>
            <th>Candidates Name</th>
            <th>Interest </th>
            <th>Email id</th>
            <th>Contact </th>
            <th> </th>
          </tr>
        </thead>
        <tbody>
		<?php 
            $result=$conn->query("select * from job_student_training_interest where trainer_registraion_id='$registration_id'");
            $num=$result->num_rows;
            while($row=$result->fetch_assoc()){
        ?>
          <tr>
            <td data-title="Candidates Name"><?php echo getUserName($conn,$row['registration_id']);?></td>
            <td data-title="Interest"><?php echo getInterest($conn,getTrainerDetails($conn,$row['training_id'],'area_of_interest'));?></td>
            <td data-title="Email id"><?php echo getUserEmail($conn,$row['registration_id']);?></td>
            <td data-title="Contact"><?php echo getUserMobile($conn,$row['registration_id']);?></td>
            <?php if($row['trainer_acceptance']=="Y"):?>
            	<td data-title=""><a href="#" class="contact">Accepted</a></td>
             <?php else : ?>
             	<td data-title=""><a href="#" class="contact acceptinterest <?php echo $row['id'];?>">accept</a></td>
              <?php endif;?>
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
<!-- -------------------------------- footer starts ------------------------------ -->
<div class="footer_wrap">
  <div class="footer">
    <div class="copyright">© 2015 JobbReady.com</div>
    <div class="kweb"><a href="http://kwebmaker.com/" target="_blank">K Webmaker™</a></div>
  </div>
  <div class="clear"></div>
</div>
<!-- -------------------------------- footer ends ------------------------------ -->
</body>
</html>
