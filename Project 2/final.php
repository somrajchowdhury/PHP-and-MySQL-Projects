<?php session_start(); ?>

<?php include "database.php"; ?>

<?php

// Get the total number of questions
$query_number_of_questions = "SELECT * FROM questions";

// Get the query result
$query_number_of_questions_result = $mysqli->query($query_number_of_questions) or die($mysqli->error.__LINE__);

// Get the total count
$number_of_questions = $query_number_of_questions_result->num_rows;

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
			<div>
				<h2>You're done!</h2>
				<p>Congratulations! You have completed the quiz.</p>
				<p>Final Score: <?php echo $_SESSION["score"]; ?>/<?php echo $number_of_questions; ?></p>
				<br/>
				<a class="start" href="index.php">Retake Quiz</a>
			</div>
		</main>

		</div>

	</body>
</html>

<?php session_destroy(); ?>