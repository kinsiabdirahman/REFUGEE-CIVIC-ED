
<?php
// Get the PDF ID from the URL
$pdf_id = $_GET['pdf_id'];
// Connect to the database
$con = mysqli_connect('localhost', 'root', '', 'refugeecivicrights');
// Check connection
if (!$con) {
	die("Connection failed: " . mysqli_connect_error());
}
// Fetch the PDF file from the database
$sql = "SELECT * FROM files WHERE id='$pdf_id'";
$result = mysqli_query($con, $sql);
if (mysqli_num_rows($result) == 1) {
	$row = mysqli_fetch_assoc($result);
	$filename = $row["filename"];
	$filecontent = $row["filecontent"];
	header("Content-type: application/pdf");
	header("Content-Disposition: inline; filename='" . $filename . "'");
	header("Content-Transfer-Encoding: binary");
	header("Accept-Ranges: bytes");
	echo $filecontent;
} else {
	echo "PDF file not found.";
}
// Close the database connection
mysqli_close($con);
?>
