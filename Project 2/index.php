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
				<h3>Test your PHP Knowledge!</h3>
				<br />
				<ul>
					<li><b>Number of Questions: </b><?php echo $number_of_questions; ?></li>
					<li><b>Assessment type: </b>MCQ</li>
					<!-- Per question time alloted is 30 seconds (half a minute) -->
					<!--<li><b>Time Alloted: </b><?php echo $number_of_questions*0.5; ?> minutes</li>-->
				</ul>
				<br />
				<!-- file.php?n=1 : n after the ? mark is called a GET variable -->
				<a href="question.php?n=1" class="start">Start Quiz!</a>
				<a href="add.php" class="start">Add a Question</a>
			</div>
		</main>

		</div>

	</body>
</html>