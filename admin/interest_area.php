<?php include('header.php'); ?>
<div class="container">
<?php 
<tr>
<td><?php echo $getid; ?></td>                          
<td><?php echo $row['subject']; ?></td>
<td width="200">
 <?php if($status == 1) { ?> <a href="interest_area.php?id=<?php echo $getid; ?>&status=0&action=active" onClick="return(window.confirm('Are you sure you want to Deactivate.'));" class="btn btn-success">Active</a><?php } else { ?><a  href="interest_area.php?id=<?php echo $getid; ?>&status=1&action=active" onClick="return(window.confirm('Are you sure you want to Activate.'));" class="btn btn-warning">Inactive</a><?php } ?>
&nbsp;<a title="View" href="interest_area_edit.php?uid=<?php echo $getid;?>" class="btn btn-info">Edit</a> 
</tr>
<?php } ?>                           
</tbody>
</table>
</div>		
</div>
</div>
</div>
<?php include('footer.php') ?>