<?php include('header.php'); ?>
if (($action=='active') && ($getid!=''))
<div class="container">
<?php 
$result = mysql_query($dlx)or die(mysql_error());
<td width="200">
<?php if($status == 1) { ?> <a href="city.php?id=<?php echo $getid; ?>&status=0&action=active" onClick="return(window.confirm('Are you sure you want to Deactivate.'));" class="btn btn-success">Active</a><?php } else { ?><a  href="city.php?id=<?php echo $getid; ?>&status=1&action=active" onClick="return(window.confirm('Are you sure you want to Activate.'));" class="btn btn-warning">Inactive</a><?php } ?>