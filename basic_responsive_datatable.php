<?php 
include'db.inc.php';
?>
<!--
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.10/css/jquery.dataTables.min.css">
<script type="text/javascript" language="javascript" src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.10.10/js/jquery.dataTables.min.js"></script>-->



<link rel="stylesheet" type="text/css" href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.11/css/dataTables.bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.0.2/css/responsive.bootstrap.min.css">


<script type="text/javascript" language="javascript" src="//code.jquery.com/jquery-1.12.0.min.js"></script>
<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.10.11/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.10.11/js/dataTables.bootstrap.min.js"></script>
<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/responsive/2.0.2/js/dataTables.responsive.min.js"></script>
<!--<script type="text/javascript" language="javascript" src="https://cdn.datatables.net/responsive/2.0.2/js/responsive.bootstrap.min.js"></script>-->

<script type="text/javascript">
$(document).ready(function() {
    $('#example').DataTable();
} );
</script>
<!--<script src="js/jquery.dataTables.min.js"></script>
<link rel="stylesheet" type="text/css" href="css/jquery.dataTables.min.css"/>-->
<!-- -------------------------------- container starts ------------------------------ -->
<div class="page_title"><span>welcome </span></div>
<div class="inner_conainer" >
<div class="dashboard_right fade_anim">
<div class="content_head">Trainings offered by Trainer</div>    
<?php 
$result=$conn->query("select * from master_job where status=1");
$num=$result->num_rows;
if($num>0){?>
		
  		<div class="table_job" id="no-more-tables-job">          
         <!--<table class="table-bordered-job table-striped table-condensed-job" id="example">-->
 <table id="example" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
          <thead>
              <tr>
				  <th width="21%"> UID</th>
                  <th width="21%"> Code</th>
                  <th width="64%"> Designation </th>
                  <th width="12%"> keyword</th>
              </tr>
          </thead>
            <tbody>
            <?php while($row=$result->fetch_assoc()){?>
            <tr>
				<td data-title="Training Title"><?php echo $row['id'];?></td>
                <td data-title="Training Category"><?php echo $row['job_code'];?></td>
                <td data-title="Brief Description"><?php echo $row['designation'];?></td>
				<td data-title="Brief Description"><?php echo $row['keyword'];?></td>
                
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
<!-- -------------------------------- footer starts ------------------------------ -->
<!-- -------------------------------- footer ends ------------------------------ -->
</body>
</html>