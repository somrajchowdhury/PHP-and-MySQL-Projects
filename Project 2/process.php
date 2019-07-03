<?php include "database.php"; ?>

<?php session_start(); ?>

<?php

	// Check to see if score variable is set
	if(!isset($_SESSION["score"])) {
		$_SESSION["score"] = 0;
	}

	if(isset($_POST["submit"])) {
		$number = $_POST["number"];
		$your_choice = $_POST["choice"];

		// Next question variable
		$next_question = $number+1;

		// Get the total number of questions
		$query_number_of_questions = "SELECT * FROM questions";

		// Get the query result
		$query_number_of_questions_result = $mysqli->query($query_number_of_questions) or die($mysqli->error.__LINE__);

		// Get the total count
		$number_of_questions = $query_number_of_questions_result->num_rows;

		// Query to get the correct option from database
		$query_correct_option = "SELECT * FROM choices
									WHERE question_number = $number AND is_correct = 1";

		$query_correct_option_result = $mysqli->query($query_correct_option) or die($mysqli->error.__LINE__);

		// Fetch the query results as an associative array
		$fetched_result = $query_correct_option_result->fetch_assoc();

		// Getting the result row with the correct option
		$correct_option = $fetched_result["id"];

		// If the correct option and your selected choice match, update the score variable
		if($correct_option == $your_choice) {
			$_SESSION["score"]++;
		}

		// Check if current question is the last question
		if($number == $number_of_questions) {
			header("Location: final.php");
			exit();
		} else {
			header("Location: question.php?n=".$next_question);
		}
	}

?>