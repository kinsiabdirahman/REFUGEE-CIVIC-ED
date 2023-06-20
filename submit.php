<?php
// Replace with your database credentials
// $servername = "localhost";
// $username = "username";
// $password = "password";
// $dbname = "database_name";

// Create connection
$conn = mysqli_connect('localhost', 'root', '', 'refugeecivicrights');

// Check connection
if (!$conn) {
	die("Connection failed: " . mysqli_connect_error());
}

// Get form data
$username = $_POST['username'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$message = $_POST['message'];



// Prepare and bind SQL statement
$stmt = $conn->prepare("INSERT INTO inquiries (username, email, phone, message) VALUES (?, ?, ?, ?)");
$stmt->bind_param("ssss", $username, $email, $phone, $message);

// Execute SQL statement
if ($stmt->execute() === TRUE) {
	echo "Thank you for your message!";
} else {
	echo "Error: " . $sql . "<br>" . $conn->error;
}

// Close connection
$conn->close();
?>
