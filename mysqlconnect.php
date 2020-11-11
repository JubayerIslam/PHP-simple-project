<?php
	$servarname = "localhost";
	$usename = "root";
	$password = "";
	$dbname = "php_forum";

	$conn = mysqli_connect($servarname,$usename,$password,$dbname);

	if (!$conn) {
		die ("Database Connnect Failed" . mysqli_connect_error());
	}
?>