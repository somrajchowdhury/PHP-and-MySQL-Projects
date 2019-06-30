<?php

include "database.php";

//Check if form is submitted
if(isset($_POST["submit"])) {
	$name = mysqli_real_escape_string($con, $_POST["username"]);
	$age = mysqli_real_escape_string($con, $_POST["userage"]);


	if(!isset($name) || $name=="" || !isset($age) || $age=="") {
		$error = "Fill in both the fields";
		header("Location: index.php?error".urlencode($error));
		exit();
	} else {
		$insert_query = "INSERT INTO users (name, age)
						 VALUES ('$name','$age')";
		$insert_query_results = mysqli_query($con, $insert_query);
	}

	if(!($insert_query_results)) {
		echo "Failed to Insert: ".mysqli_error($con);
	} else {
		header("Location: index.php");
		exit();
	}
}

?>