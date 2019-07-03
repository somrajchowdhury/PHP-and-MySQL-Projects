<?php

$host = "localhost";
$username = "root";
$password = "";
$dbname = "sample2";

// Connect to database
$mysqli = new mysqli($host, $username, $password, $dbname);

if($mysqli->connect_error) {
	printf("Connection Failed: %s", $mysqli->connect_error);
	exit();
}

?>