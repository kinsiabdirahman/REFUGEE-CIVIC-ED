<?php
// Start the session
session_start();

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
  // If the user is not logged in, redirect to the login page
  header('Location: login.php');
  exit;
}

// Get the PDF ID from the request parameters
$pdf_id = $_GET['pdf_id'];

// Connect to the database
include('dbcon.php');

// Prepare the SQL statement to insert the bookmarked PDF file
$sql = "INSERT INTO bookmarks (user_id, pdf_id) VALUES (?, ?)";
$stmt = mysqli_prepare($con, $sql);
mysqli_stmt_bind_param($stmt, 'ii', $_SESSION['user_id'], $pdf_id);

// Execute the SQL statement
if (mysqli_stmt_execute($stmt)) {
  // If the bookmark was added successfully, redirect to the bookmarks page
  header('Location: bookmark.php');
  exit;
} else {
  // If there was an error adding the bookmark, display an error message
  echo "Error: " . mysqli_error($con);
}

// Close the database connection
mysqli_close($con);
?>
