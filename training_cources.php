<?php
include("header.php");
$registration_id=$_SESSION['registration_id'];
if(!isset($_SESSION['registration_id']) || actor_type($conn,$registration_id)!="T")
		header('location:index.php');
include("menu.php");
?>
<?php 
$result=$conn->query("select * from job_training_list where registration_id='$registration_id'");
$num=$result->num_rows;
?>

<script type="text/javascript">
$(document).ready(function(){
$("form" ).on( "submit", function( event ) {
  event.preventDefault();
  var formData = new FormData(this);
  $.ajax({
		  type:"POST",
		  url:"training_inc.php",
		  data:formData,
		  mimeType: 'multipart/form-data',
		  contentType: false,
		  dataType: 'JSON',
		  dataType:'html',
		  cache: false,
		  processData: false,
		  success:function(data)
			{
				var data = $.parseJSON(data);
				if($.trim(data.error_msg)!="success")	
					$('.login').show().html(data.error_msg);
				else
					window.location.href=data.url;
			}
		});
});
});
</script>

<script type="text/javascript">
$(document).ready(function(){
$('.deleteTraining').live('click',function(){
var clas=$(this).attr('class').split(' ');
var clasId=clas[1];	
	if(confirm("Are you sure you want to delete this?")){
		$.ajax({
				type:"POST",
				url:"training_inc.php",
				data:"action=delete&&clasId="+clasId,
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

<script type="text/javascript">
$(document).ready(function() {
    $('#example').DataTable({
    "bLengthChange": false,
	"iDisplayLength": 10
	});
});
</script>

<script src="js/jquery.dataTables.min.js"></script>
<link rel="stylesheet" type="text/css" href="css/jquery.dataTables.min.css"/>
<!-- -------------------------------- container starts ------------------------------ -->
<div class="page_title"><span>welcome <?php echo getUserName($conn,$registration_id)?></span></div>
<div class="inner_conainer" >
	<?php include("trainer_dashboard_link.php");?>
    <div class="dashboard_right fade_anim">
    	<div class="content_head">Trainings offered by Trainer</div>    
        <div class="add_new"><a class="fancybox enquiry fade" href="#inline2"><input type="button"  value="Add New Training"></a></div>
        <?php if($num>0){?>
  		<div class="table_job" id="no-more-tables-job">          
         <table class="table-bordered-job table-striped table-condensed-job" id="example">
          <thead>
              <tr>
				  <th width="12%"> Date </th>
				  <th width="21%"> Title</th>
                  <th width="15%"> Training Category</th>
                  <th width="64%"> Brief Description </th>
                  <th width="12%"> Document</th>
                  <th width="9%">Delete</th>
              </tr>
          </thead>
            <tbody>
            <?php while($row=$result->fetch_assoc()){ 
				$post_date=$row['post_date'];
				$date=date('d-m-Y',strtotime($post_date));
			?>
            <tr>
				<td data-title="Date"><?php echo $date;?></td>
				<td data-title="Training Title"><?php echo $row['title'];?></td>
                <td data-title="Training Category"><?php echo getInterest($conn,$row['area_of_interest']);?></td>
                <td data-title="Brief Description"><?php echo $row['description'];?></td>
                <td data-title="Availability"><a href="upload/training_doc/<?php echo $registration_id."/".$row['doc'];?>" target="_blank">Download</a></td>
                <td data-title="Edit"><a  href="#" class="deleteTraining <?php echo $row['id']?>"><img src="images/delete.png"/></a></td>
            </tr>
            <?php }?>
            </tbody>
        </table>
        <div class="clear"></div>        
       	</div>
        <?php } else {?>
        Record Not Found
        <?php }?>
		<div class="clear"></div>
    </div>
    <div class="clear"></div>
</div>
<!-- -------------------------------- container ends ------------------------------ -->
<?php include("footer.php");?>
</body>
</html>
<!-- -------------------------------- footer ends ------------------------------ -->
<div id="inline2" style="width:100%; display:none;">
<form action="" name="addTraining" id="addTraining" method="post">
    <div class="add_training">    
        <div class="pop_head">Add New Training</div>
        <ul class="login" style="display:none;"></ul>
        <div class="form_details fade_anim">
             <div class="textfield">
                <select name="area_of_interest" id="area_of_interest">
                <option value="">Please Select Category</option>
				<?php 
                 $result=$conn->query("select * from master_interest_area where status='1'");
                    while($row=$result->fetch_assoc()){
                ?>
                    <option value="<?php echo $row['id'];?>"><?php echo $row['area_of_interest'];?></option>
                <?php }?>
                </select>
            </div>
			<div class="textfield">
             <input type="text" name="title" id="title" placeholder="Title">
            </div>			
            <div class="textfield">
               <textarea name="description" id="description"></textarea>
            </div>
            <div class="textfield fade">
                <input type="file" name="doc" id="doc"/>    
            </div>
            <div class="textfield fade">
                <input type="submit" value="Submit"/>
                <input type="hidden" name="action" value="addtraining"/>    
            </div>           
            <div class="clear"></div>  
        </div>
    </div>   
    </form> 
</div>
</body>
</html>