<?php include('header.php'); ?>
<?php$action=$_REQUEST['action'];$getid=$_REQUEST['id'];$status=$_REQUEST['status'];
if (($action=='active') && ($getid!=''))
{	$neelx="UPDATE `job_registration` SET `modified_date`=NOW(),`status`='$status' where id='$getid'";$active_result = mysql_query($neelx)or die(mysql_error());if($active_result){ header('location:users.php'); } else {  die('Error: ' . mysql_error()); }} ?>
<div class="container"><div class="margin-top"><div class="row">	<div class="span12">	<div class="alert alert-info">Users list </div><table cellpadding="0" cellspacing="0" border="0" class="table  table-bordered" id="example"><thead><tr><th>ID</th>
<th>Email</th>                        <th>Mobile</th>                                 <th>Role</th>                                 <th>Date</th> <th>Action</th></tr></thead><tbody>	 
<?php $userx="select a.id,a.type_of_actor,a.email,a.mobile_no,a.status,a.post_date, b.fname,b.company_name from job_registration a inner join job_profile b on a.id=b.registration_id  where 1";$result = mysql_query($userx)or die(mysql_error());while($row=mysql_fetch_array($result)){//print_r($row);$getid=$row['id'];  ?>
<tr>
<td width="80"><?php echo $getid; ?></td> <td width="80"><?php echo $row['email']; ?> </td><td width="80"><?php echo $row['mobile_no']; ?></td><?php if($row['type_of_actor']=="F"){$role ="Firm";} elseif($row['type_of_actor']=="T"){$role ="Trainer";}elseif($row['type_of_actor']=="S"){$role ="Student";} ?><td width="20"><?php echo $role; ?></td><!--<?php $status=$row['status']; ?><td width="80"><?php if($status == 1) {echo '<a href=""class="btn btn-info">Active</a>'; } else { echo '<a href=""class="btn btn-danger">Inactive</a>';}?></td>--><td width="80"><?php echo $row['post_date']; ?></td> 							  <td width="150"> <?php if($status == 1) { ?> <a href="users.php?id=<?php echo $getid; ?>&status=0&action=active" onClick="return(window.confirm('Are you sure you want to Deactivate.'));" class="btn btn-success">Active</a><?php } else { ?><a  href="users.php?id=<?php echo $getid; ?>&status=1&action=active" onClick="return(window.confirm('Are you sure you want to Activate.'));" class="btn btn-warning">Inactive</a><?php } ?>&nbsp;<a title="View" href="view_user.php?uid=<?php echo $getid;?>" class="btn btn-primary">View</a>
<!--<a title="View" href="#?uid=<?php echo $getid;?>" class="btn btn-danger">Active</a>--></td>									
</tr><?php  }  ?>                           
</tbody></table></div>		</div>
</div>
</div>
<?php include('footer.php') ?>