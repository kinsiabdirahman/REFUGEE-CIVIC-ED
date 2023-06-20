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
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <title>ADMIN SIDE USERS</title>
</head>
<body>
  
    <div class="container mt-4">

        <?php include('message.php'); ?>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>User Details
                            <!-- Add download button -->
                            <form method="post">
                                <button type="submit" name="download_users" class="btn btn-primary float-end ">Download Excel</button>
                            </form>
                        </h4>
                    </div>
                    <div class="card-body">

                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    
                                    <th>Userame</th>
                                    <th>Email</th>
                                   
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    $query = "SELECT * FROM users";
                                    $query_run = mysqli_query($con, $query);

                                    if(mysqli_num_rows($query_run) > 0)
                                    {
                                        foreach($query_run as $user)
                                        {
                                            ?>
                                            <tr>
                                            
                                                <td><?= $user['username']; ?></td>
                                                <td><?= $user['email']; ?></td>
                                                
                                                <td>
                                                  
                                                    <form action="code.php" method="POST" class="d-inline">
                                                    </form>
                                                </td>
                                            </tr>
                                            <?php
                                        }
                                    }
                                    else
                                    {
                                        echo "<h5> No Record Found </h5>";
                                    }
                                ?>
                                
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
