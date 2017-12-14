<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php
	$mysqlHost = "localhost";
	$mysqlUser = "root";
	$mysqlPass = "";
	$mysqlDB   = "test";
	$db_connection = mysqli_connect("{$mysqlHost}", "{$mysqlUser}", "{$mysqlPass}") or die("Không thể kết nối database");
    mysqli_select_db($db_connection, "{$mysqlDB}") or die("Không thể chọn database");
	mysqli_query($db_connection, "SET NAMES 'utf8'");
?>