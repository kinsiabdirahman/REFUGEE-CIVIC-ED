<!DOCTYPE html>
<html>
<head>
	<title>Feedback Form</title>
	<link rel="stylesheet" type="text/css" href="css/feedback.css">
</head>
<body>
	<div class="container">
		<h1>Feedback Form</h1>
		<form method="post" action="submit_feedback.php">
			<label for="username">Username:</label>
			<input type="text" name="username" required>

			<label for="email">Email:</label>
			<input type="email" name="email" required>

			<label for="rating">Rating:</label>
			<select name="rating">
				<option value="excellent">Excellent</option>
				<option value="average">Average</option>
				<option value="below_average">Below Average</option>
			</select>

			<label for="feedback">Feedback:</label>
			<textarea name="feedback" required></textarea>

			<input type="submit" value="Submit">
		</form>
	</div>
</body>
</html>
