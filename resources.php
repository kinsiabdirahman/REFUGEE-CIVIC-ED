

<?php include('upload.php') ?>
<!DOCTYPE html>
<html>
<head>
	<title>Upload PDF</title>
	<link rel="stylesheet" type="text/css" href="css/resourcest.css">
	<link
      href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css"
      rel="stylesheet"
    />

</head>
<body>
	<div class="container">
		<h1>Upload PDF</h1>
		<form action="upload.php" method="post" enctype="multipart/form-data">
			<label for="file">Select a PDF file to upload:</label>
			<input type="file" name="file" id="file"><br><br>
			<input type="submit" value="Upload" name="submit">
      <a href="pdf_view.php"class="viewbtn">VIEW</a>
      
		</form>
	</div>

	<div class="pdf-container">
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

            // Get the three latest files from the database
            $sql = "SELECT filename FROM files ORDER BY id DESC LIMIT 3";
            $result = mysqli_query($conn, $sql);

		

            // Display the three latest files on the page
            if (mysqli_num_rows($result) > 0) {
                echo "<h2>Recently Added PDFs:</h2>";
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<div class='pdf-container'>";
                    echo "<h3>".$row["filename"]."</h3>";
                    echo "<a href='view_pdf.php?filename=".$row["filename"]."'>view</a>";
					
                    echo "</div>";
                }
            }

            // Close MySQL database connection
            mysqli_close($conn);
        ?>
    </div>
</body>
</html>


