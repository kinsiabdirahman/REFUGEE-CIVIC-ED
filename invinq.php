<?php
session_start();

// check if the user is logged in
if(!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit();
}

include('dbcon.php');

// get the username of the logged in user
$username = $_SESSION['username'];

// retrieve the inquiries made by the logged in user
$query = "SELECT * FROM inquiries WHERE username = '$username'";
$query_run = mysqli_query($con, $query);

?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <title>View Inquiries</title>
  </head>
  <body>
  
    <div class="container mt-5">

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>My Inquiries
                            <a href="userdash.php" class="btn btn-danger float-end">BACK</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <?php
                        // check if there are any inquiries to display
                        if(mysqli_num_rows($query_run) > 0) {
                            echo '<table class="table">';
                            echo '<thead>';
                            echo '<tr>';
                            echo '<th>#</th>';
                            echo '<th>Username</th>';
                            echo '<th>Email</th>';
                            echo '<th>Phone</th>';
                            echo '<th>Message</th>';
                            echo '</tr>';
                            echo '</thead>';
                            echo '<tbody>';

                            // loop through the inquiries and display them in a table
                            $count = 1;
                            while($row = mysqli_fetch_assoc($query_run)) {
                                echo '<tr>';
                                echo '<td>'.$count.'</td>';
                                echo '<td>'.$row['username'].'</td>';
                                echo '<td>'.$row['email'].'</td>';
                                echo '<td>'.$row['phone'].'</td>';
                                echo '<td>'.$row['message'].'</td>';
                                echo '</tr>';
                                $count++;
                            }

                            echo '</tbody>';
                            echo '</table>';
                        } else {
                            echo '<p>You have not made any inquiries yet.</p>';
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
  </body>
</html>
