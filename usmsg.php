<?php
session_start();
require 'dbcon.php';

// If download button is clicked
if (isset($_POST['download_inquiries'])) {
    // Set headers to download Excel file
    header('Content-Type: application/vnd.ms-excel');
    header('Content-Disposition: attachment; filename="inquiries.xls"');
    
    // Create query to fetch user data
    $query = "SELECT * FROM inquiries";
    $query_run = mysqli_query($con, $query);

    // Create Excel file header row
    echo "User ID\tUsername\tEmail\tPhone\tMessage\tStatus\n";

    // Loop through user data and add rows to Excel file
    if(mysqli_num_rows($query_run) > 0)
    {
        foreach($query_run as $user)
        {
            echo $user['id'] . "\t" . $user['username'] . "\t" . $user['email'] . $user['phone'] .$user['message'] .$user['status'] ."\n";
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

    <title>AVIEW INQUIRIES</title>
       <!-- This page shows all the Inquiries-->
</head>
<body>
  
    <div class="container mt-4">

        <?php include('message.php'); ?>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Inquiries Report
                        <form method="post">
                                <button type="submit" name="download_inquiries" class="btn btn-primary float-end ">Download Excel</button>
                            </form>                        </h4>
                    </div>
                    <div class="card-body">

                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    
                                    <th>Userame</th>
                                    <th>Email</th>
                                    <th>Message</th>
                                    <th>Phone</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    $query = "SELECT * FROM inquiries";
                                    $query_run = mysqli_query($con, $query);

                                    if(mysqli_num_rows($query_run) > 0)
                                    {
                                        foreach($query_run as $user)
                                        {
                                            ?>
                                            <tr>
                                            
                                                <td><?= $user['username']; ?></td>
                                                <td><?= $user['email']; ?></td>
                                                <td><?= $user['message']; ?></td>
                                                <td><?= $user['phone']; ?></td>
                                                <td><?= $user['status']; ?></td>
                                                
                                                <!-- <td>
                                                    <a href="messageview.php?id=<?= $user['id']; ?>" class="btn btn-info btn-sm">View</a>
                                                    <a href="messedit.php?id=<?= $user['id']; ?>" class="btn btn-success btn-sm">Edit</a>
                                                    <form action="code.php" method="POST" class="d-inline">
                                                        <button type="submit" name="delete_inq" value="<?=$user['id'];?>" class="btn btn-danger btn-sm">Delete</button>
                                                    </form>
                                                </td>
                                            </tr> -->
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
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>