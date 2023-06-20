<!DOCTYPE html>
<html>
<head>
	<title>Report Chart</title>
	<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
	<?php 
		//Connect to database
		// $servername = "localhost";
		// $username = "root";
		// $password = "";
		// $dbname = "your_db_name";
		$conn = mysqli_connect("localhost","root","","refugeecivicrights");

		//Check connection
		if (!$conn) {
		    die("Connection failed: " . mysqli_connect_error());
		}

		//Query to get number of completed reports
		$sql = "SELECT COUNT(*) AS completed FROM inquiries WHERE status='Completed'";
		$result = mysqli_query($conn, $sql);
		$row = mysqli_fetch_assoc($result);
		$completed = $row['completed'];

		//Query to get number of in-progress reports
		$sql = "SELECT COUNT(*) AS in_progress FROM inquiries WHERE status='In_Progress'";
		$result = mysqli_query($conn, $sql);
		$row = mysqli_fetch_assoc($result);
		$in_progress = $row['in_progress'];

		//Query to get number of pending reports
		$sql = "SELECT COUNT(*) AS pending FROM inquiries WHERE status='Pending'";
		$result = mysqli_query($conn, $sql);
		$row = mysqli_fetch_assoc($result);
		$pending = $row['pending'];

		//Close connection
		mysqli_close($conn);
	?>

	<h1>Below is a graph showing the status of inquiries</h1>

	<div style="width: 50%;">
		<canvas id="myChart"></canvas>
	</div>

	<script>
		var ctx = document.getElementById('myChart').getContext('2d');
		var myChart = new Chart(ctx, {
		    type: 'bar',
		    data: {
		        labels: ['Completed', 'In Progress', 'Pending'],
		        datasets: [{
		            label: 'Progress of Inquiries',
		            data: [<?php echo $completed; ?>, <?php echo $in_progress; ?>, <?php echo $pending; ?>],
		            backgroundColor: [
		                'rgba(54, 162, 235, 0.2)',
		                'rgba(255, 206, 86, 0.2)',
		                'rgba(255, 99, 132, 0.2)'
		            ],
		            borderColor: [
		                'rgba(54, 162, 235, 1)',
		                'rgba(255, 206, 86, 1)',
		                'rgba(255, 99, 132, 1)'
		            ],
		            borderWidth: 1
		        }]
		    },
		    options: {
		        scales: {
		            y: {
		                beginAtZero: true
		            }
		        }
		    }
		});
	</script>
</body>
</html>
