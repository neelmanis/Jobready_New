<?php 
session_start();
ob_start();

?>
<html>
<head>
<noscript>
<meta http-equiv="refresh" content="0; url=javascriptdisable.php" />
</noscript>
</head>
<title> Home Page</title>
<body>
<?php echo $_SESSION['error_msg'];?>
</body>
</html>