<?php 
include('header.php');  
?>
<!-- date picker start -->
<link href="datepicker/css/datepicker.css" rel="stylesheet" type="text/css" />
<script src="datepicker/js/bootstrap-datepicker.js"></script>
<script>
$(document).ready(function () {
                $('#dpd1').datepicker({
                minDate: 0,
                autoclose: true, 
                todayHighlight: true,
                format: "dd/mm/yyyy"
                });  
            });    
</script>
<script>
		$(function(){
			window.prettyPrint && prettyPrint();		

        // disabling dates
        var nowTemp = new Date();
        var now = new Date(nowTemp.getFullYear(), nowTemp.getMonth(), nowTemp.getDate(), 0, 0, 0, 0);

        var checkin = $('#dpd1').datepicker({
          onRender: function(date) {
            return date.valueOf() < now.valueOf() ? 'disabled' : '';
          }
        }).on('changeDate', function(ev) {
          if (ev.date.valueOf() > checkout.date.valueOf()) {
            var newDate = new Date(ev.date)
            newDate.setDate(newDate.getDate() + 1);
            checkout.setValue(newDate);
          }
          checkin.hide();
          $('#dpd2')[0].focus();
        }).data('datepicker');
        var checkout = $('#dpd2').datepicker({
          onRender: function(date) {
            return date.valueOf() <= checkin.date.valueOf() ? 'disabled' : '';
          }
        }).on('changeDate', function(ev) {
          checkout.hide();
        }).data('datepicker');
		});
	
    </script>
<!-- date picker over -->
<br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>

<div class="container">
            <table class="table">
        <thead>
          <tr>
            <th>Check in: <input type="text" class="span2" value="" id="dpd1"></th>
            <th>Check out: <input type="text" class="span2" value="" id="dpd2"></th>
          </tr>
        </thead>
      </table>
        </div>