<?php

include "database.php";

?>

<?php

$query = "SELECT * FROM users";
$query_result = mysqli_query($con, $query);

?>

<!DOCTYPE html>
<html>
	<head>
		<title>php-MySQL Data Display</title>
		<link type="text/css" rel="stylesheet" href="style/style.css" />
	</head>
	<body>
		<div id="container">
			
			<header>
				<h2>Data from the Database</h2>
			</header>

			<div id="data">
				<table>
					<tr>
						<th>ID</th>
						<th>Name</th>
						<th>Age</th>
					</tr>
					<?php while($row = mysqli_fetch_assoc($query_result)) : ?>
						<tr>
							<td><?php echo $row["id"]; ?></td>
							<td><?php echo $row["name"]; ?></td>
							<td><?php echo $row["age"]; ?></td>
						</tr>
					<?php endwhile; ?>
				</table>
			</div>

			<div id="inputs">

				<div id="error">
					<?php if(isset($_GET["error"])) : ?>
						<h3><?php echo $_GET["error"]; ?></h3>
					<?php endif; ?>
				</div>

				<h4>Enter details:</h4>
				<form method="POST" action="process.php">
					<input type="text" name="username" placeholder="Enter name" />
					<input type="number" name="userage" placeholder="Enter age" />
					<br />
					<input type="submit" name="submit" value="SUBMIT" />
				</form>
			</div>

		</div>
	</body>
</html>