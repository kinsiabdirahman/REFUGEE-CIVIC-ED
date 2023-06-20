<!DOCTYPE html>
<html>
<head>
	<title>Resources Available:</title>
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
	<h1>Resources Available:</h1>
	<table>
		<tr>
			<th>Filename</th>
			<th>View</th>
			<th>Bookmark</th>
			<!-- <th>Download</th> -->
		</tr>
		<?php
		// Include the database connection file
		include('dbcon.php');
		// Fetch files from the database
		$sql = "SELECT * FROM files";
		$result = mysqli_query($con, $sql);
		if (mysqli_num_rows($result) > 0) {
			// Output data of each row
			while($row = mysqli_fetch_assoc($result)) {
				$pdf_id = $row["id"];
				$pdf_name = $row["filename"];
				echo "<tr>";
				echo "<td>" . $pdf_name . "</td>";
				echo "<td><a href='view_file_action.php?file_id=$pdf_id' target='_blank'>View</a></td>";
				echo "<td><a href='bookmark_file.php?file_id=$pdf_id'>Bookmark</a></td>";
				// echo "<td><a href='download_file.php?file_id=$file_id' download>Download</a></td>";
				echo "</tr>";
			}
		} else {
			echo "<tr><td colspan='4'>No files found.</td></tr>";
		}
		// Close the database connection
		mysqli_close($con);
		?>
	</table>
</body>
</html>
