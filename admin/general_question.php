<?php 
include('header.php');
//echo "---><br/>".$username.$gotuid;
?>
<?php
function getSubject($getid)
{ //Query For getting Subject
$query=mysql_query("SELECT `subject` FROM `master_subject_list` WHERE id='$getid'");
$result=mysql_fetch_array($query);
return $result['subject'];
}
?>

<?php
$action=$_REQUEST['action'];
$getid=$_REQUEST['id'];
$status=$_REQUEST['status'];

if (($action=='active') && ($getid!=''))
{
echo $neelx="UPDATE `master_general_question` SET `modified_date`=NOW(),`status`='$status' where id='$getid'";
$active_result = mysql_query($neelx)or die(mysql_error());
if($active_result)
{ header('location:general_question.php?action=view'); } else {  die('Error: ' . mysql_error()); }
}
?>
<?php
if($_REQUEST['Reset']=="Reset")
{
  $_SESSION['sub_id']="";
  $_SESSION['question']="";
  header("Location: general_question.php?action=view");
}else
{
	$search_type=$_REQUEST['search_type'];
	if($search_type=="SEARCH")
	{ 
	$_SESSION['sub_id']=mysql_real_escape_string($_REQUEST['sub_id']);
	$_SESSION['question']=mysql_real_escape_string($_REQUEST['question']);
	}
}
?>	
<style type="text/css">
	.pagination ul > li > a, .pagination ul > li > span{
		border-left-width:1px;
	}
</style>

<div class="container">
<div class="margin-top">
<div class="row">	
<div class="span12">
<div class="alert alert-info">Manage Question </div>

<form name="search" action="" method="post" > 
<input type="hidden" name="search_type" id="search_type" value="SEARCH" />
<table width="100%" border="0" cellspacing="2" cellpadding="2" class="detail_txt" >
<tr class="orange1">
    <td colspan="11" >Search Options</td>
</tr>

<tr >
<td width="19%" ><strong>Subject</strong></td>
<td width="81%"><input type="text" name="sub_id" id="sub_id" class="input_txt" value="<?php echo $_SESSION['sub_id'];?>" /></td>
</tr>    
    
<tr >
  <td><strong>Question</strong></td>
  <td><input type="text" name="question" id="question" class="input_txt" value="<?php echo $_SESSION['question'];?>" /></td>
</tr>
<tr >
    <td>&nbsp;</td>
    <td><input type="submit" name="Submit" value="Search"  class="input_submit" /> <input type="submit" name="Reset" value="Reset"  class="input_submit" /></td>
</tr>	
</table>
</form>      
</div>

<?php if($_REQUEST['action']=='view') {?>    	
<div class="container">
<div class="margin-top">
<div class="row">	
<div class="span12">
<a href="general_question_add.php" ><i class="fa fa-plus"></i>&nbsp;<strong>Add Question</strong></a>        	
<table cellpadding="0" cellspacing="0" border="0" class="table  table-bordered" id="example1">
<thead>
<tr>
<th>Q. No.</th>                                         
<th>Question</th>
<th>Subject</th>
<th>Marks</th>                                                          
<th>Action</th>
</tr>
</thead>
    
    <?php 
	
 	$page=1;//Default page
	$limit=10;//Records per page
	$start=0;//starts displaying records from 0
	if(isset($_GET['page']) && $_GET['page']!=''){
	$page=$_GET['page'];	
	}
	$start=($page-1)*$limit;
	
    $order_by = isset($_REQUEST['order_by'])?$_REQUEST['order_by']:'g.post_date';
    $asc_desc = isset($_REQUEST['asc_desc'])?$_REQUEST['asc_desc']:'desc';
    $attach = " order by ".$order_by." ".$asc_desc." ";
    
    $i=1;

	//$sql="SELECT `id`,`sub_id`, `question`,`marks`,`status` FROM `master_general_question` WHERE 1";
	$sql="SELECT s.subject, g.sub_id,g.`id`,g.`question`,g.`marks`,g.`status`
	FROM master_general_question as g JOIN  master_subject_list as s where g.sub_id=s.id";
	if($_SESSION['question']!="")
	{
	$sql.=" and g.question like '%".$_SESSION['question']."%'";
	}
	
	if($_SESSION['sub_id']!="")
	{
	$sql.=" and s.subject like '%".$_SESSION['sub_id']."%'";
	}

	$sql.= "  ".$attach." ";
	
	$result1=mysql_query($sql);
	$rCount=mysql_num_rows($result1);
	
	$sql1= $sql." limit $start, $limit ";
	$result=mysql_query($sql1);

	if($rCount>0)
    {	
	while($row = mysql_fetch_array($result))
	{//	print_r($row);
    ?> 
<tbody>	
<!--<tr <?php if($i%2==0){echo "bgcolor='#CCCCCC'";}?>>-->
<tr>
<td><?php echo $row['id'];?></td>
<td><?php echo strtoupper($row['question']); ?></td>
<td><?php echo strtoupper($row['subject']);?></td>
<!--<td><?php echo strtoupper(getSubject($row['sub_id']));?></td>-->
<td align="left"><?php echo $row['marks']; ?></td>
<td width="200">
<?php if($row['status'] == 1) { ?> <a href="general_question.php?id=<?php echo $row['id']; ?>&status=0&action=active" onClick="return(window.confirm('Are you sure you want to Deactivate.'));" class="btn btn-success">Active</a><?php } else { ?><a  href="general_question.php?id=<?php echo $row['id']; ?>&status=1&action=active" onClick="return(window.confirm('Are you sure you want to Activate.'));" class="btn btn-warning">Inactive</a><?php } ?>
&nbsp;<a title="View" href="general_question_edit.php?uid=<?php echo $row['id'];?>" class="btn btn-info">Edit</a> 
</td>
</tr>
</tbody>
<?php
$i++;
}
}
else
{
?>
<tr>
<td colspan="10">Records Not Found</td>
</tr>
<?php }	?>
</table>
</div>
</div>
</div>
</div>
<?php } ?> 
<?php
function pagination($per_page = 10, $page = 1, $url = '', $total){ 

$adjacents = "2";

$page = ($page == 0 ? 1 : $page); 
$start = ($page - 1) * $per_page; 

$prev = $page - 1; 
$next = $page + 1;
$lastpage = ceil($total/$per_page);
$lpm1 = $lastpage - 1;

$pagination = "";
if($lastpage > 1)
{ 
$pagination .= "<div class='pagination pagination-right'> <ul>";
$pagination .= "<li class='details'>Page $page of $lastpage</li>";
if ($lastpage < 7 + ($adjacents * 2))
{ 
for ($counter = 1; $counter <= $lastpage; $counter++)
{
if ($counter == $page)
$pagination.= "<li class='active'><a >$counter</a></li>";
else
$pagination.= "<li><a href='{$url}$counter'>$counter</a></li>"; 
}
}
elseif($lastpage > 5 + ($adjacents * 2))
{
if($page < 1 + ($adjacents * 2)) 
{
for ($counter = 1; $counter < 4 + ($adjacents * 2); $counter++)
{
if ($counter == $page)
$pagination.= "<li class='active'><a >$counter</a></li>";
else
$pagination.= "<li><a href='{$url}$counter'>$counter</a></li>"; 
}
$pagination.= "<li class='dot'>...</li>";
$pagination.= "<li><a href='{$url}$lpm1'>$lpm1</a></li>";
$pagination.= "<li><a href='{$url}$lastpage'>$lastpage</a></li>"; 
}
elseif($lastpage - ($adjacents * 2) > $page && $page > ($adjacents * 2))
{
$pagination.= "<li><a href='{$url}1'>1</a></li>";
$pagination.= "<li><a href='{$url}2'>2</a></li>";
$pagination.= "<li class='dot'>...</li>";
for ($counter = $page - $adjacents; $counter <= $page + $adjacents; $counter++)
{
if ($counter == $page)
$pagination.= "<li class='active'><a >$counter</a></li>";
else
$pagination.= "<li><a href='{$url}$counter'>$counter</a></li>"; 
}
$pagination.= "<li class='dot'>..</li>";
$pagination.= "<li><a href='{$url}$lpm1'>$lpm1</a></li>";
$pagination.= "<li><a href='{$url}$lastpage'>$lastpage</a></li>"; 
}
else
{
$pagination.= "<li><a href='{$url}1'>1</a></li>";
$pagination.= "<li><a href='{$url}2'>2</a></li>";
$pagination.= "<li class='dot'>..</li>";
for ($counter = $lastpage - (2 + ($adjacents * 2)); $counter <= $lastpage; $counter++)
{
if ($counter == $page)
$pagination.= "<li class='active'><a >$counter</a></li>";
else
$pagination.= "<li><a href='{$url}$counter'>$counter</a></li>"; 
}
}
}

if ($page < $counter - 1){
$pagination.= "<li><a href='{$url}$next'>Next</a></li>";
$pagination.= "<li><a href='{$url}$lastpage'>Last</a></li>";
}else{
$pagination.= "<li class='active'><a >Next</a></li>";
 $pagination.= "<li class='active'><a >Last</a></li>";
}
$pagination.= "</ul></div>\n"; 
} 
return $pagination;
}
?>       
<div class="pages_1">Total number of Questions: <?php echo $rCount;?> 
<?php echo pagination($limit,$page,'general_question.php?action=view&page=',$rCount);?>
</div>
</div>
</div>
<?php include('footer.php') ?>