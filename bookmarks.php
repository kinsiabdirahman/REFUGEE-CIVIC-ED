<!DOCTYPE html>
<html>
<head>
	<title>Bookmarked Files</title>
	<style>
	table {
		border-collapse: collapse;
		width: 100%;
		margin-bottom: 20px;
		border: 1px solid #ccc;
		background-color: #fff;
		box-shadow: 0 1px 1px rgba(0,0,0,.05);
		font-family: Arial, sans-serif;
	}
	th, td {
		text-align: left;
		padding: 12px;
		border-bottom: 1px solid #ddd;
	}
	th {
		background-color: #f2f2f2;
		font-weight: bold;
		text-transform: uppercase;
	}
	tr:hover {
		background-color: #f5f5f5;
	}
	tr:nth-child(even) {
		background-color: #f2f2f2;
	}
</style>
</head>
<body>
	<h1>Bookmarked Files</h1>
	<table>
		<tr>
			<th>Filename</th>
			<th>View</th>
			<th>Remove</th>
		</tr>
		<?php
		session_start();
		// Check if the user is logged in and the bookmarks session exists
		if (isset($_SESSION['user_id']) && isset($_SESSION['bookmarks'])) {
			$bookmarks = $_SESSION['bookmarks'];
			// Include the database connection file
			include('dbcon.php');
			foreach ($bookmarks as $pdf_id) {
				// Fetch PDF file information from the database
				$sql = "SELECT * FROM files WHERE id = '$pdf_id'";
				$result = mysqli_query($con, $sql);
				if (mysqli_num_rows($result) > 0) {
					$row = mysqli_fetch_assoc($result);
					$pdf_name = $row["filename"];
					echo "<tr>";
					echo "<td>" . $pdf_name . "</td>";
					echo "<td><a href='view_pdf_action.php?pdf_id=$pdf_id' target='_blank'>View</a></td>";
					echo "<td><button onclick=\"removeBookmark($pdf_id)\">Remove</button></td>";
					echo "</tr>";
				}
			}
			// Close the database connection
			mysqli_close($con);
		} else {
			echo "<tr><td colspan='3'>No bookmarks found.</td></tr>";
		}
		?>
	</table>
	<script>
		function removeBookmark(pdf_id) {
			// Send an AJAX request to the server to remove the bookmark
			var xhttp = new XMLHttpRequest();
			xhttp.onreadystatechange = function() {
				if (this.readyState == 4 && this.status == 200) {
					location.reload(); // Reload the page to update the bookmarks table
				}
			};
			xhttp.open("GET", "remove_bookmark_action.php?pdf_id=" + pdf_id, true);
			xhttp.send();
		}
	</script>
</body>
</html>
