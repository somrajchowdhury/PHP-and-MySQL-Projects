<?php include "database.php"; ?>

<?php

	// Check if the submit question button was pressed
	if(isset($_POST["submitQuestion"])) {
		$question_number = $_POST["question_number"];
		$question_text = $_POST["question_text"];

		//Create a choices array
		$choices = array();
		// $key => $value
		$choices[1] = $_POST["choice1"];
		$choices[2] = $_POST["choice2"];
		$choices[3] = $_POST["choice3"];
		$choices[4] = $_POST["choice4"];

		$correct_choice = $_POST["correct_choice"];

		// Query to insert into the questions table
		$query_insert_questions = "INSERT INTO questions (question_number, question_text) 
									VALUES ('$question_number','$question_text')";

		// Run query to insert into questions table
		$insert_data = $mysqli->query($query_insert_questions) or die($mysqli->error.__LINE__);

		// If question table insertion is successful, then insert choices
		if($insert_data) {
			// Array_name: $choices ; $choice=>$value : $key=>$value;
			foreach ($choices as $choice => $value) {
				// Check if any choice is not left blank
				if($value != "") {
					if($correct_choice == $choice) {
						$is_correct = 1;
					} else {
						$is_correct = 0;
					}
					// Query to insert into the choices table
					$query_insert_choices = "INSERT INTO choices (question_number, is_correct, choice_text)
												VALUES ('$question_number','$is_correct','$value')";

					// Run query to insert into choices table
					$insert_data = $mysqli->query($query_insert_choices) or die($mysqli->error.__LINE__);

					// Validate insert
					if($insert_data) {
						continue;
					} else {
						die($mysqli->error.__LINE__);
					}
				}
			}
			$message = "Question has been added.";
		} 
	}

	// Get the total number of questions
	$query_number_of_questions = "SELECT * FROM questions";

	// Get the query result
	$query_number_of_questions_result = $mysqli->query($query_number_of_questions) or die($mysqli->error.__LINE__);

	// Get the total count
	$number_of_questions = $query_number_of_questions_result->num_rows;

	// Add 1 to the $number_of_questions so that you don't have to remember the value everytime
	$this_question_number = $number_of_questions + 1;

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
			<h2>Add a Question</h2>
			<?php
				if(isset($message)) {
					echo "<b><p>". $message . "</p></b>";
				}
			?>
			<div class="addQuestion">
				<form method="POST" action="add.php">
					<p>
						<label>Question Number: </label>
						<input type="number" min="1" value="<?php echo $this_question_number; ?>" name="question_number" />
					</p>
					<p>
						<label>Question Text: </label>
						<input type="text" name="question_text" />
					</p>
					<p>
						<label>Choice #1: </label>
						<input type="text" name="choice1" />
					</p>
					<p>
						<label>Choice #2: </label>
						<input type="text" name="choice2" />
					</p>
					<p>
						<label>Choice #3: </label>
						<input type="text" name="choice3" />
					</p>
					<p>
						<label>Choice #4: </label>
						<input type="text" name="choice4" />
					</p>
					<p>
						<label>Correct choice: </label>
						<input type="number" name="correct_choice" />
					</p>
					<p>
						<br/>
						<input type="submit" name="submitQuestion" value="Submit Question" />
						<a href="index.php" class="start">Done: Take Quiz!</a>
					</p>
				</form>
			</div>
		</main>

		</div>

	</body>
</html>