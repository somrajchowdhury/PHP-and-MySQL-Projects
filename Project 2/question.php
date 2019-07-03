<?php include "database.php"; ?>

<?php session_start(); ?>

<?php

	// Get the question number from the GET variable n
	$number = (int) $_GET["n"];


	// Get question from the database using query
	$query_question = "SELECT * FROM questions
				WHERE question_number = $number";
	$query_question_result = $mysqli->query($query_question) or die($mysqli->error.__LINE__);

	// Fetching rows from database as an associative array
	$question = $query_question_result->fetch_assoc();


	// Get choices for the question from the database using query
	$query_choices = "SELECT * FROM choices
						WHERE question_number = $number";

	$query_choices_result = $mysqli->query($query_choices) or die($mysqli->error.__LINE__);

	// Fetching rows from database as an associative array is done in a loop later


	$query_num_questions = "SELECT * FROM questions";
	$query_num_questions_result = $mysqli->query($query_num_questions) or die($mysqli->error.__LINE__);
	$number_of_questions = $query_num_questions_result->num_rows;

?>

<!DOCTYPE html>
<html>
	<head>
		<title>Quizzer | PHP&MySQL</title>
		<link type="text/css" rel="stylesheet" href="css/style.css" />
	</head>
	<body>

		<div class="container">

		<header>
			<div>
				<h2 class="headingStyle">Quiz</h2><h2 class="headingColor">zer.</h2>
			</div>
		</header>

		<main>
			<div class="questionList">
				<div class="current">
					Question <?php echo $number; ?> of <?php echo $number_of_questions; ?>
				</div>
				<br/>
				<p class="question">
					<b><?php echo $_GET["n"]."."; ?><?php echo $question["question_text"]; ?></b>
				</p>
				<form method="POST" action="process.php">
					<ul class="choices">
						<?php while($choices = $query_choices_result->fetch_assoc()) : ?>
							<li>&emsp;&emsp;<input type="radio" name="choice" value="<?php echo $choices["id"]; ?>" /><?php echo $choices["choice_text"]; ?></li>
						<?php endwhile; ?>
					</ul>
					<br/>
					<input type="submit" name="submit" value="Submit" />
					<!-- Getting the particular question number as hidden input -->
					<!-- Hidden input means getting an input from the script without the human typing the input -->
					<input type="hidden" name="number" value="<?php echo $number; ?>">
				</form>
			</div>
		</main>

		</div>

	</body>
</html>