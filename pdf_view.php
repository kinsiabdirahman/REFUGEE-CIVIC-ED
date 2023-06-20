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
<script>
function addBookmark(pdf_id) {
  var xhr = new XMLHttpRequest();
  xhr.onreadystatechange = function() {
    if (xhr.readyState === 4 && xhr.status === 200) {
      // Bookmark added successfully
      alert("PDF file bookmarked.");
    }
  };
  xhr.open("POST", "bookmark_action.php", true);
  xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
  xhr.send("pdf_id=" + pdf_id);
}
</script>
</head>
<body>
	<h1>Resources Available:</h1>
	<table>
		<tr>
			<th>Filename</th>
			<th>View</th>
			<!-- <th>Bookmark</th> -->
			<!-- <th>Download</th> -->
		</tr>
		<?php
		// Include the database connection file
		include('dbcon.php');
		// Fetch PDF files from the database
		$sql = "SELECT * FROM files";
		$result = mysqli_query($con, $sql);
		if (mysqli_num_rows($result) > 0) {
			// Output data of each row
			while($row = mysqli_fetch_assoc($result)) {
				$pdf_id = $row["id"];
				$pdf_name = $row["filename"];
				echo "<tr>";
				echo "<td>" . $pdf_name . "</td>";
				echo "<td><a href='view_pdf_action.php?pdf_id=$pdf_id' target='_blank'>View</a></td>";
				// echo "<td><button onclick=\"addBookmark($pdf_id)\">Bookmark</button></td>";
				// echo "<td><a href='download_pdf.php?pdf_id=$pdf_id' download>Download</a></td>";
				echo "</tr>";
			}
		} else {
			echo "<tr><td colspan='4'>No PDF files found.</td></tr>";
		}
		// Close the database connection
		mysqli_close($con);
		?>
	</table>
