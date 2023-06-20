<!DOCTYPE html>
<html>
<head>
	<title>Contact Form</title>
	<link rel="stylesheet" type="text/css" href="css/userinput.css">
</head>
<body>
	<div class="container">
		<h1>Contact Us</h1>
		<form action="submit.php" method="POST">
			<label for="username">Username:</label>
			<input type="text" id="username" name="username" placeholder="Your username" required>

			<label for="email">Email:</label>
			<input type="email" id="email" name="email" placeholder="Your email" required>

			<label for="phone">Phone:</label>
			<input type="tel" id="phone" name="phone" placeholder="Your phone number" required>

			<label for="message">Message:</label>
			<textarea id="message" name="message" placeholder="Write your message here" required></textarea>

			<input type="submit" value="Submit">
		</form>
	</div>
</body>
</html>
