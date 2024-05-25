<?php
	$host = "feenix-mariadb.swin.edu.au";
	$user = "s103598757"; // your user name
	$pwd = "1210"; // your password (date of birth ddmmyy unless changed)
	$sql_db = "s103598757_db"; // your database



	$conn = @mysqli_connect(
		$host,
		$user,
		$pwd,
		$sql_db);

    if(!$conn){
        die("Connection Failed: " . mysqli_connect_errno());
    }
?>