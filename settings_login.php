<?php
	$host = "feenix-mariadb.swin.edu.au";
	$user = "s104550680"; // your user name
	$pwd = "120204"; // your password (date of birth ddmmyy unless changed)
	$sql_db = "s104550680_db"; // your database



	$conn = @mysqli_connect(
		$host,
		$user,
		$pwd,
		$sql_db);
?>
	