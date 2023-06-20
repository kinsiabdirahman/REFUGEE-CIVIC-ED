<?php
// Database configuration
// $host = "localhost";
// $username = "root";
// $password = "";
// $database = "refugeecivicrights";

// Create a database connection
$con = mysqli_connect("localhost","root","","refugeecivicrights");
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

// Get user inputs from form
$username = mysqli_real_escape_string($con, $_POST['username']);
$email = mysqli_real_escape_string($con, $_POST['email']);
$rating = mysqli_real_escape_string($con, $_POST['rating']);
$feedback = mysqli_real_escape_string($con, $_POST['feedback']);

// Insert user feedback into database
$sql = "INSERT INTO feedback (username, email, rating, feedback) VALUES ('$username', '$email', '$rating','$feedback')";
if (mysqli_query($con, $sql)) {
    // Feedback submitted successfully
    echo "<script>alert('Thank you for your feedback!')</script>";

} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($con);
}

// Close the database connection
mysqli_close($con);
?>
