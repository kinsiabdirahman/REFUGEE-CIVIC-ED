<?php
session_start();
require 'dbcon.php';

if(isset($_POST['delete_user']))
{
    $user_id = mysqli_real_escape_string($con, $_POST['delete_user']);

    $query = "DELETE FROM users WHERE id='$user_id' ";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        $_SESSION['message'] = "User Deleted Successfully";
        header("Location: userindex.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "User Not Deleted";
        header("Location: userindex.php");
        exit(0);
    }
}

if(isset($_POST['update_user']))
{
    $user_id = mysqli_real_escape_string($con, $_POST['user_id']);


    $username = mysqli_real_escape_string($con, $_POST['username']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $password = mysqli_real_escape_string($con, $_POST['password']);
    $password = md5($password);
  

    $query = "UPDATE users SET username='$username', email='$email', username='$username'  WHERE id='$user_id' ";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        $_SESSION['message'] = "User Updated Successfully";
        header("Location: userindex.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "User Not Updated";
        header("Location: userindex.php");
        exit(0);
    }

}


if(isset($_POST['save_user']))
{
    $username = mysqli_real_escape_string($con, $_POST['username']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $password = mysqli_real_escape_string($con, $_POST['password']);
    $password = md5($password);
  

    $query = "INSERT INTO users (username,email,password) VALUES ('$username','$email','$password')";

    $query_run = mysqli_query($con, $query);
    if($query_run)
    {
        $_SESSION['message'] = "User Created Successfully";
        header("Location: usercreate.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "User Not Created";
        header("Location: usercreate.php");
        exit(0);
    }
}



if(isset($_POST['send_inq']))
{
    $username = mysqli_real_escape_string($con, $_POST['username']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $phone = mysqli_real_escape_string($con, $_POST['phone']);
    $message = mysqli_real_escape_string($con, $_POST['message']);
  

    $query = "INSERT INTO inquiries (username,email,phone,message) VALUES ('$username','$email','$phone','$message')";

    $query_run = mysqli_query($con, $query);
    if($query_run)
    {
        $_SESSION['message'] = "Inquiry Sent Successfully";
        header("Location: makeinq.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Inquiry Not Sent";
        header("Location: makeinq.php");
        exit(0);
    }
}


if(isset($_POST['delete_inq']))
{
    $user_id = mysqli_real_escape_string($con, $_POST['delete_inq']);

    $query = "DELETE FROM inquiries WHERE id='$user_id' ";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        $_SESSION['message'] = "Inquiry Deleted Successfully";
        header("Location: indexinq.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Inquiry Not Deleted";
        header("Location: indexinq.php");
        exit(0);
    }
}


if(isset($_POST['update_inquiry']))
{
    $user_id = mysqli_real_escape_string($con, $_POST['user_id']);

    $username = mysqli_real_escape_string($con, $_POST['username']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $message= mysqli_real_escape_string($con, $_POST['message']);
    $status = mysqli_real_escape_string($con, $_POST['status']);
  

    $query = "UPDATE inquiries SET username='$username', email='$email', message='$message' ,status='$status' WHERE id='$user_id' ";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        $_SESSION['message'] = "Inquiry Updated Successfully";
        header("Location: indexinq.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Inquiry Not Updated";
        header("Location: indexinq.php");
        exit(0);
    }

}
?>