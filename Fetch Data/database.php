<?php

$host = "localhost";
$username = "root";
$password = "";
$dbname = "sample1";

// Connection to Database
$con = mysqli_connect($host, $username, $password, $dbname);

// Check if Connected to Database sucessfully
if(mysqli_connect_errno()) {
	echo "Failed to Connect: ".mysqli_connect_errno();
}

?>