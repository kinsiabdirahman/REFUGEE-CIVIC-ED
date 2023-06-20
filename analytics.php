
<?php
session_start();
require 'dbcon.php';

// If download button is clicked
if (isset($_POST['download_users'])) {
    // Set headers to download Excel file
    header('Content-Type: application/vnd.ms-excel');
    header('Content-Disposition: attachment; filename="users.xls"');
    
    // Create query to fetch user data
    $query = "SELECT * FROM users";
    $query_run = mysqli_query($con, $query);

    // Create Excel file header row
    echo "User ID\tUsername\tEmail\n";

    // Loop through user data and add rows to Excel file
    if(mysqli_num_rows($query_run) > 0)
    {
        foreach($query_run as $user)
        {
            echo $user['id'] . "\t" . $user['username'] . "\t" . $user['email'] . "\n";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
	<link rel="stylesheet" type="text/css" href="css/analytics.css">
     <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">


</head>
<body>
<h1>BELOW ARE THE AVAILABLE REPORTS</h1>
    <div class="container">
    <label for="file">GRAPHS ON THE STATUS OF INQUIRIES</label>
 <a href="status.php"class="viewbtn" target="_blank">VIEW</a>
      
</div>

<div class="container"> 
<label for="file">REPORTS ON USERS IN THE SYSTEM</label>   
<a href="userexcel.php"class="viewbtn" name= 'download_users' target="_blank"> DOWNLOAD</a>


<form method="post">
<!-- <button type="submit" name="download_users" class="btndown">DOWNLOAD EXCEL</button> -->
</form>
      
</div>

<div class="container"> 
<label for="file">REPORTS ON INQUIRIES MADE</label>   
<a href="usmsg.php"class="viewbtn" name= 'download_inquiries' target="_blank"> DOWNLOAD</a>


<form method="post">
<!-- <button type="submit" name="download_users" class="btndown">DOWNLOAD EXCEL</button> -->
</form>
      
</div>
    
    
</body>
</html>