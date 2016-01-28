<!DOCTYPE html>
<html>
    <head>
        <title>Bootstrap Multiselect</title>
        <meta name="robots" content="noindex, nofollow" />
        <meta http-equiv="content-type" content="text/html; charset=UTF-8" />

        <link rel="stylesheet" href="css/bootstrap.css" type="text/css">    

        <script type="text/javascript" src="js/jquery-1.7.2.min.js"></script>
        <script type="text/javascript" src="js/bootstrap.js"></script>
        <script type="text/javascript" src="js/prettify.js"></script>

        <link rel="stylesheet" href="css/bootstrap-multiselect.css" type="text/css">
        <script type="text/javascript" src="js/bootstrap-multiselect.js"></script>
        <script type="text/javascript" src="js/bootstrap-multiselect-collapsible-groups.js"></script>

        <script type="text/javascript">
            $(document).ready(function() {
                window.prettyPrint() && prettyPrint();
            });
        </script>
    </head>
<body>
<div class="container">
<div class="row">
<script type="text/javascript">
$(document).ready(function() {
$('#example-selectAllName').multiselect({
includeSelectAllOption: true,
selectAllName: 'select-all-name'
});
});
</script>
<select id="example-selectAllName" multiple="multiple">
<option value="1">Option 1</option>
<option value="2">Option 2</option>
<option value="3">Option 3</option>
<option value="4">Option 4</option>
<option value="5">Option 5</option>
<option value="6">Option 6</option>
</select>
</div>
</div>
</body>
</html>
