<!DOCTYPE html>
<html>
    <head>
        <title>Bootstrap</title>
        <meta name="viewport" content="width=device-width,initial-scale=1.0">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<link href="css/datepicker.css" rel="stylesheet" type="text/css" />
<script src="js/bootstrap-datepicker.js"></script>
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
</head>
<body>
<br/><br/><br/>

<div class="container">
<div class="row">
<div class="col-md-6">
Check in: <input type="text" class="span2" value="" id="dpd1">
</div>
<div class="col-md-6">
Check out: <input type="text" class="span2" value="" id="dpd2">
</div>
</div>
</div>
</body>