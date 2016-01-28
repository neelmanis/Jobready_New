
$("#addEdu").live('click',function() {
education=$('#education').val();
if(education==""){alert("Select Education");$('#education').focus();return false}
college=$('#college').val();
if(college==""){alert("Select College");$('#college').focus();return false}
year_of_completion=$('#year_of_completion').val();
if(year_of_completion==""){alert("Select year of completion");$('#year_of_completion').focus();return false}
percentage=$('#percentage').val();
if(percentage==""){alert("Enter Percentage");$('#percentage').focus();return false}
specialization=$('#specialization').val();
if(specialization==""){alert("Select Specialization");$('#specialization').focus();return false}
$.ajax({
	  type:"POST",
	  url:"student_trainer_registration_inc.php",
	  data:"action=addEducation&&education="+education+"&&college="+college+"&&specialization="+specialization+"&&year_of_completion="+year_of_completion+"&&percentage="+percentage,
	  beforeSend: function() {    
		$(".loader").show("slow");
	  },
	  dataType: 'json',
	  success:function(data)
	  {	
	  		$(".loader").hide("slow");
			$("#educationalDetails").html(data.html);  
			$("#educationalError").show(data.error_msg);
			$('#education').val('');$('#college').val('');$('#year_of_completion').val('');$('#percentage').val('');$('#specialization').val('')
	  }
	});

});


$(".deleteEdu").live('click',function() {
var className = $(this).attr('class').split(" ");
var id=className[1];
$.ajax({
	  type:"POST",
	  url:"student_trainer_registration_inc.php",
	  data:"action=addEducation&&opration=delete&&id="+id,
	  dataType: 'html',
	  dataType: 'json',
	  beforeSend: function() {    
		$(".loader").show("slow");
	  },
	  success:function(data)
	  {
			$(".loader").hide("slow");
			$("#educationalDetails").html(data.html);  
			$("#educationalError").show(data.error_msg);
	  }
	});

});