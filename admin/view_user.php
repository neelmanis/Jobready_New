<?php include('header.php'); ?>
<?php //include('navbar.php'); ?><?php if($_REQUEST['uid']!=''){$gotuidx= $_GET['uid'];//echo "--->".$gotuidx;
$sqlx ="select a.id,a.type_of_actor,a.email,a.mobile_no,a.status,a.post_date,	b.fname,b.company_name,b.comapny_landline,b.gender,b.dob,b.address1,b.address2,b.address3,b.city,b.pincode,b.brief_profile,b.preffered_location,b.keyword_skill,b.upload_cv,c.area_of_interest,d.education,d.education_others,d.college,d.college_other,d.specialization,d.year_of_completion,d.percentage from job_registration a inner join job_profile b on a.id=b.registration_id inner join job_area_of_interest c on a.id=c.registration_id inner join job_education_profile d on a.id=d.registration_id where a.id='$gotuidx'";//echo $sqlx;
$result2=mysql_query($sqlx);
if($row2 = mysql_fetch_array($result2)){ 
//print_r($row2);
$fname=stripslashes($row2['fname']);$mname=stripslashes($row2['mname']);$lname=stripslashes($row2['lname']);			$email=stripslashes($row2['email']);$mobile_no=stripslashes($row2['mobile_no']);			$role=stripslashes($row2['type_of_actor']);$co_name=stripslashes($row2['company_name']);$gender=stripslashes($row2['gender']);$mob=stripslashes($row2['mob']);$dob=stripslashes($row2['dob']);			
$address_line1=stripslashes($row2['address1']);
$address_line2=stripslashes($row2['address2']);
$address_line3=stripslashes($row2['address3']);
$city=stripslashes($row2['city']);	
$pincode=stripslashes($row2['pincode']);				
$land_line_no=stripslashes($row2['comapny_landline']);
$profile=stripslashes($row2['brief_profile']);
$location=stripslashes($row2['preffered_location']);
$skill=stripslashes($row2['keyword_skill']);
$cv=stripslashes($row2['upload_cv']);			
$areaInterest=stripslashes($row2['area_of_interest']);
$qualification=stripslashes($row2['qualification']);
$qualification_others=stripslashes($row2['qualification_others']);
$college=stripslashes($row2['college']);
$college_other=stripslashes($row2['college_other']);
$specialization=stripslashes($row2['specialization']);
$year_of_completion=stripslashes($row2['year_of_completion']);
$percentage=stripslashes($row2['percentage']);
$status=stripslashes($row2['status']);
$post_date=stripslashes($row2['post_date']);
			
if($row2['type_of_actor']=="F"){$role ="Firm";}
elseif($row2['type_of_actor']=="T"){$role ="Trainer";}
elseif($row2['type_of_actor']=="S"){$role ="Student";} 		
}
?>

<div class="container">
<div class="row ">
<div class="col-lg-12 top-buffer" style="text-align:center;">
<div class="lead">Job Ready User Details</div>
</div>
</div>

<div class="row">	
<div class="span11 well">
<legend>Personal Details</legend>
<div id="pd">			
				<div class="row mysrow" style="padding:1px 0px;">
					<div class="span2"><strong>Name	:</strong></div>
					<div class="span4"><?php echo $fname;?></div>
				</div>				
				<div class="row mysrow" style="padding:1px 0px;">
					<div class="span2"><strong>Role	:</strong></div>
					<div class="span4"><?php echo $role;?></div>
				</div>
				<div class="row mysrow" style="padding:1px 0px;">
					<div class="span2"><strong>Email:</strong></div>
					<div class="span4"><?php echo $email;?></div>
				</div>				
				<div class="row mysrow" style="padding:1px 0px;">
					<div class="span2"><strong>Company	:</strong></div>
					<div class="span4"><?php echo $co_name;?></div>
				</div>
				<div class="row mysrow" style="padding:1px 0px;">
					<div class="span2"><strong>Gender	:</strong></div>
					<div class="span4"><?php echo $gender;?></div>
				</div>
				<div class="row mysrow" style="padding:1px 0px;">
					<div class="span2"><strong>Mobile:</strong></div>
					<div class="span4"><?php echo $mobile_no;?></div>
				</div>				
				<div class="row mysrow" style="padding:1px 0px;">
					<div class="span2"><strong>Dob	:</strong></div>
					<div class="span4"><?php echo $dob;?></div>
				</div>				
				<div class="row mysrow" style="padding:1px 0px;">
					<div class="span2"><strong>Address 1:</strong></div>
					<div class="span4"><textarea rows="5" disabled><?php echo $address_line1; ?></textarea></div>
				</div>	
				<div class="row mysrow" style="padding:1px 0px;">
					<div class="span2"><strong>Address 2:</strong></div>
					<div class="span4"><textarea rows="5" disabled><?php echo $address_line2; ?></textarea></div>
				</div>
				<div class="row mysrow" style="padding:1px 0px;">
					<div class="span2"><strong>City	:</strong></div>
					<div class="span4"><?php echo $city; ?></div>
				</div>	
				<div class="row mysrow" style="padding:1px 0px;">
					<div class="span2"><strong>Pin Code	:</strong></div>
					<div class="span4"><?php echo $pincode; ?></div>
				</div>	
				<div class="row mysrow" style="padding:1px 0px;">
					<div class="span2"><strong>Brief Profile	:</strong></div>
					<div class="span4"><?php echo $profile; ?></div>
				</div>	
				<div class="row mysrow" style="padding:1px 0px;">
					<div class="span2"><strong>Preferred Location	:</strong></div>
					<div class="span4"><?php echo $location; ?></div>
				</div>	
				<div class="row mysrow" style="padding:1px 0px;">
					<div class="span2"><strong>Skill	:</strong></div>
					<div class="span4"><?php echo $skill; ?></div>
				</div>	
				<div class="row mysrow" style="padding:1px 0px;">
					<div class="span2"><strong>CV	:</strong></div>
					<div class="span4"><?php echo $cv; ?></div>
				</div>	
			</div>
	</div>
	
	<div class="span11 well">
		<legend>Interest Area</legend>
			<div id="pd">			
				<div class="row mysrow" style="padding:1px 0px;">
					<div class="span2"><strong>Area of Interest	:</strong></div>
					<div class="span4"><?php echo $areaInterest; ?></div>
				</div>				
			</div>
	</div>	
	
	<div class="span11 well">
		<legend>Educational Profile</legend>
			<div id="pd">			
				<div class="row mysrow" style="padding:1px 0px;">
					<div class="span2"><strong>Qualification	:</strong></div>
					<div class="span4"><?php echo $qualification; ?></div>
				</div>				
				<div class="row mysrow" style="padding:1px 0px;">
					<div class="span2"><strong>Other Qualification	:</strong></div>
					<div class="span4"><?php echo $qualification_others; ?></div>
				</div>
				<div class="row mysrow" style="padding:1px 0px;">
					<div class="span2"><strong>College	:</strong></div>
					<div class="span4"><?php echo $college; ?></div>
				</div>				
				<div class="row mysrow" style="padding:1px 0px;">
					<div class="span2"><strong>Other College	:</strong></div>
					<div class="span4"><?php echo $college_other; ?></div>
				</div>	
				<div class="row mysrow" style="padding:1px 0px;">
					<div class="span2"><strong>Specialization	:</strong></div>
					<div class="span4"><?php echo $specialization; ?></div>
				</div>				
				<div class="row mysrow" style="padding:1px 0px;">
					<div class="span2"><strong>Year of Completion :</strong></div>
					<div class="span4"><?php echo $year_of_completion; ?></div>
				</div>	
				<div class="row mysrow" style="padding:1px 0px;">
					<div class="span2"><strong>Percentage	:</strong></div>
					<div class="span4"><?php echo $percentage; ?>%</div>
				</div>				
				<div class="row mysrow" style="padding:1px 0px;">
				<div class="span2"><strong>Status :</strong></div>
				<?php if($status == '1') 
				{ echo "<div class='span4'><span style='color:green'>Active</span></div>";
				}else if($status == '0') {
				echo "<div class='span4'><span style='color:red'>Deactive</span></div>";
				} 
				?>
				</div>
				<div class="row mysrow" style="padding:1px 0px;">
				<div class="span2"><strong>Date	:</strong></div>
				<div class="span4"><?php echo date("d-m-Y",strtotime($post_date)); ?></div>
				</div>		
				</div>		
	</div>
	</div>	
	</div>	
</div>
 <?php 
} 
?>
<?php include('footer.php') ?>