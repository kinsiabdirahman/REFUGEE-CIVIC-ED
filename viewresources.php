<?php include('download.php') ?>
<!DOCTYPE html>
<html>
<head>
	<title>View PDF</title>
	<link rel="stylesheet" type="text/css" href="css/viewresources.css">
</head>
<body>
	<div class="container">
		<h1>View PDF</h1>
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

		// Select all PDF files from the database
		$sql = "SELECT * FROM files";
		$result = mysqli_query($conn, $sql);

		// Display the list of PDF files
		if (mysqli_num_rows($result) > 0) {
			echo "<ul>";
		    while($row = mysqli_fetch_assoc($result)) {
		        echo "<li><a href='view.php?id=" . $row['id'] . "' target='_blank'>" . $row['filename'] . "</a></li>";
		    }
		    echo "</ul>";
		} else {
		    echo "No PDF files found.";
		}

		// Close MySQL database connection
		mysqli_close($conn);
		?>
	</div>
</body>
</html>
