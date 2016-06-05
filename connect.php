<?php 
	$serwer = "localhost";
	$user = "root";
	$password = "";
	$dbname = "antykwariat";

	$conn = new mysqli($serwer, $user, $password, $dbname);

	if($conn->connect_error){
		die("Connection failed:" . $conn->connect_error);
	}

	$conn->query('SET NAMES utf8');
	$conn->query('SET CHARACTER_SET utf8_unicode_ci');
	// echo "polaczenie udane";