<?php
// Connect to the database
$con = mysqli_connect('localhost', 'root', '', 'refugeecivicrights');


// Check connection
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

// Get the ID of the PDF document to download
$id = $_GET['id'];

// Get the file details from the database
$query = "SELECT * FROM files WHERE id = $id";
$result = mysqli_query($con, $query);

if ($result) {
    $row = mysqli_fetch_assoc($result);
    $filename = $row['filename'];
    $filetype = $row['filetype'];
    $filecontent = $row['filecontent'];

    // Set the content type and send the file content to the browser
    header('Content-type: application/pdf' );
    header('Content-Disposition: attachment; filename="' . basename($row['filename'], '.php') . '.pdf"');
    readfile($row['file_path']);
} else {
    echo "Error: " . mysqli_error($con);
}

// Close the database connection
mysqli_close($con);
?>
