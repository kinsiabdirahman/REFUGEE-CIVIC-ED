<?php
session_start();
require 'dbcon.php';
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <title>User Edit</title>
</head>
<body>
  
    <div class="container mt-5">

        <?php include('message.php'); ?>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Inquiry Edit 
                            <a href="indexinq.php" class="btn btn-danger float-end">BACK</a>
                        </h4>
                    </div>
                    <div class="card-body">

                        <?php
                        if(isset($_GET['id']))
                        {
                            $user_id = mysqli_real_escape_string($con, $_GET['id']);
                            $query = "SELECT * FROM inquiries WHERE id='$user_id' ";
                            $query_run = mysqli_query($con, $query);

                            if(mysqli_num_rows($query_run) > 0)
                            {
                                $user = mysqli_fetch_array($query_run);
                                ?>
                                <form action="code.php" method="POST">
                                    <input type="hidden" name="user_id" value="<?= $user['id']; ?>">

                                    <div class="mb-3">
                                        <label>Userame</label>
                                        <input type="text" name="username" value="<?=$user['username'];?>" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label>Email</label>
                                        <input type="email" name="email" value="<?=$user['email'];?>" class="form-control">
                                   
                                    <div class="mb-3">
                                       
                                    <div class="mb-3">
                                        <label>Email</label>
                                        <input type="message" name="message" value="<?=$user['message'];?>" class="form-control">
                                    </div>

                                    <div class="mb-3">
                                        <label>Status</label>
                                        <select name="status" class="form-select">
                                            <option value="Pending" <?php if($user['status'] == "Pending") echo "selected"; ?>>Pending</option>
                                            <option value="In_Progress" <?php if($user['status'] == "In_Progress") echo "selected"; ?>>In Progress</option>
                                            <option value="Completed" <?php if($user['status'] == "Completed") echo "selected"; ?>>Completed</option>
                                        </select>
                                    </div>
                    
                                   
                                    <div class="mb-3">
                                       
                                        <button type="submit" name="update_inquiry" class="btn btn-primary">
                                            Update Status
                                        </button>
                          
                                    </div>

                               
                                   </div>

                                </form>
                                <?php
                            }
                            else
                            {
                                echo "<h4>No Such Id Found</h4>";
                            }
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
