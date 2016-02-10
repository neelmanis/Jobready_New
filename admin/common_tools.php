<?phpinclude 'dbcon.php';// Check, if user ID session is NOT set then this page will jump to login page$username= $_SESSION['contact_name'];$gotuid= $_SESSION['id'];if (!isset($_SESSION['id'])){header('Location: index.php');}?>
	
	