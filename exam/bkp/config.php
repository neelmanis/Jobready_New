<?php

define('BASE_PATH','http://localhost:8080/exam/');
define('DB_HOST', 'localhost');
define('DB_NAME', 'jobready');
define('DB_USER','root');
define('DB_PASSWORD','');

@$con=mysql_connect(DB_HOST,DB_USER,DB_PASSWORD) or die("Failed to connect to MySQL: " . mysql_error());
$db=mysql_select_db(DB_NAME,$con) or die("Failed to connect to MySQL: " . mysql_error());

?>