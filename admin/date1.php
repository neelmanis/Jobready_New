<?php 
include('header.php');  
?>
<!-- date picker start -->
<link href="css/datepicker.css" rel="stylesheet" type="text/css" />
<!--<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>-->
<!--http://code.runnable.com/VBQwmgNhDgwzU_0-/future-and-past-date-desabled-for-bootstrap-and-bootstrap-datepicker-->
<script src="js/bootstrap-datepicker.js"></script>
<script>
$(document).ready(function () {
                $('#from').datepicker({
                minDate: 0,
                autoclose: true, 
                todayHighlight: true,
                format: "dd/mm/yyyy"
                });  
            });    
</script>
<script type="text/javascript">
 $(function() {
        $( "#from, #to" ).datepicker({
            defaultDate: "+1w",
            changeMonth: true,
            numberOfMonths: 2,
            onSelect: function( selectedDate ) {
                if(this.id == 'from'){
                  var dateMin = $('#from').datepicker("getDate");
                  var rMin = new Date(dateMin.getFullYear(), dateMin.getMonth(),dateMin.getDate() + 1); 
                  var rMax = new Date(dateMin.getFullYear(), dateMin.getMonth(),dateMin.getDate() + 62); 
                  $('#to').datepicker("option","minDate",rMin);
                  $('#to').datepicker("option","maxDate",rMax);                    
                }
                
            }
        });
    });
    </script>
<!-- date picker over -->
<br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>

<div class="container">
            <div class="hero-unit">
                <input  type="text" placeholder="click to show datepicker"  name="from" id="from">
                <input  type="text" placeholder="click to show datepicker"  name="to" id="to">
            </div>
        </div>