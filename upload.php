<?php
// MySQL database connection parameters
// $host = "localhost";
// $user = "username";
// $password = "password";
// $dbname = "database_name";

// Connect to MySQL database
$conn = mysqli_connect('localhost', 'root', '', 'refugeecivicrights');

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Check if the form was submitted
if (isset($_POST["submit"])) {
    // Get the file details
    $filename = $_FILES["file"]["name"];
    $filetype = $_FILES["file"]["type"];
    $filetmpname = $_FILES["file"]["tmp_name"];

    // Read the file contents
    $filecontent = file_get_contents($filetmpname);

    // Escape special characters in the file content
    $filecontent = mysqli_real_escape_string($conn, $filecontent);

    // Insert the file into the database
    $sql = "INSERT INTO files (filename, filetype, filecontent) VALUES ('$filename', '$filetype', '$filecontent')";

    if (mysqli_query($conn, $sql)) {
        echo "File uploaded successfully.";
    } else {
        echo "Error uploading file: " . mysqli_error($conn);
    }

   
}



// Close MySQL database connection
mysqli_close($conn);
?>
