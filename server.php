<?php
session_start();

// initializing variables
$username = "";
$email    = "";
$errors = array(); 

// connect to the database
$db = mysqli_connect('localhost', 'root', '', 'refugeecivicrights');

// REGISTER USER
if (isset($_POST['reg_user'])) {
  // receive all input values from the form
  $username = mysqli_real_escape_string($db, $_POST['username']);
  $email = mysqli_real_escape_string($db, $_POST['email']);
  $password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
  $password_2 = mysqli_real_escape_string($db, $_POST['password_2']);

  // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errors array
  if (empty($username)) { array_push($errors, "Username is required"); }
  if (empty($email)) { array_push($errors, "Email is required"); }
  if (empty($password_1)) { array_push($errors, "Password is required"); }
  if ($password_1 != $password_2) {
	array_push($errors, "The two passwords do not match");
  }

  // first check the database to make sure 
  // a user does not already exist with the same username and/or email
  $user_check_query = "SELECT * FROM users WHERE username='$username' OR email='$email' LIMIT 1";
  $result = mysqli_query($db, $user_check_query);
  $user = mysqli_fetch_assoc($result);
  
  if ($user) { // if user exists
    if ($user['username'] === $username) {
      array_push($errors, "Username already exists");
    }

    if ($user['email'] === $email) {
      array_push($errors, "email already exists");
    }
  }

  // Finally, register user if there are no errors in the form
  if (count($errors) == 0) {
  	$password = md5($password_1);//encrypt the password before saving in the database

  	$query = "INSERT INTO users (username, email, password) 
  			  VALUES('$username', '$email', '$password')";
  	mysqli_query($db, $query);
  	$_SESSION['username'] = $username;
  	$_SESSION['success'] = "You are now logged in";
  	header('location: login.php');
  }
}

// LOGIN USER
if (isset($_POST['login_user'])) {
  $username = mysqli_real_escape_string($db, $_POST['username']);
  $password = mysqli_real_escape_string($db, $_POST['password']);

  if (empty($username)) {
  	array_push($errors, "Username is required");
  }
  if (empty($password)) {
  	array_push($errors, "Password is required");
  }

  if (count($errors) == 0) {
  	$password = md5($password);
  	$query = "SELECT * FROM users WHERE username='$username' AND password='$password'";
  	$results = mysqli_query($db, $query);
  	if (mysqli_num_rows($results) == 1) {
  	  $_SESSION['username'] = $username;
  	  $_SESSION['success'] = "You are now logged in";
  	  header('location: userdash.php');
  	}else {
  		array_push($errors, "Wrong username/password combination");
  	}
    
  }
}

// LOGIN ADMIN
if (isset($_POST['login_admin'])) {
  $username = mysqli_real_escape_string($db, $_POST['username']);
  $password = mysqli_real_escape_string($db, $_POST['password']);

  if (empty($username)) {
  	array_push($errors, "Username is required");
  }
  if (empty($password)) {
  	array_push($errors, "Password is required");
  }

  if (count($errors) == 0) {
  	$password = md5($password);
  	$query = "SELECT * FROM users WHERE username='$username' AND password='$password'";
  	$results = mysqli_query($db, $query);
  	if (mysqli_num_rows($results) == 1) {
  	  $_SESSION['username'] = $username;
  	  $_SESSION['success'] = "You are now logged in";
  	  header('location: adminhome.php');
  	}else {
  		array_push($errors, "Wrong username/password combination");
  	}
    
  }
}

// SEND MESSAGE
// if (isset($_POST['send_msg'])) {
  // receive all input values from the form
  // $name = mysqli_real_escape_string($db, $_POST['name']);
  // $email = mysqli_real_escape_string($db, $_POST['email']);
  // $phone = mysqli_real_escape_string($db, $_POST['phone']);
  // $message = mysqli_real_escape_string($db, $_POST['message']);

  // $query = "INSERT INTO inquiries ( name,email,phone, message) VALUES ('$name','$email','$phone','$message')";
  //   mysqli_query($db, $query);
  // 	$_SESSION['username'] = $username;
  // 	$_SESSION['success'] = "You are now logged in";
  // 	header('location: index.php');



    // if($query_run)
    // {
    //     $_SESSION['message'] = "Inquiry sent successfully";
    //     header("Location: usinquiry.php");
    //     exit(0);
    // }
    // else
    // {
    //     $_SESSION['message'] = "Inquiry not sent";
    //     header("Location: usinquiry.php");
    //     exit(0);
    // }
  
  // }

  //SECOND ATTEMPT
   //check whether submit button is pressed or not
// if((isset($_POST['send_msg'])))
// {
  //fetching and storing the form data in variables
// $name = $con->real_escape_string($_POST['name']);
// $email = $con->real_escape_string($_POST['email']);
// $phone = $con->real_escape_string($_POST['phone']);
// $comments = $con->real_escape_string($_POST['message']);
//   //query to insert the variable data into the database
// $sql="INSERT INTO inquiries (name, email, phone, message) VALUES ('$name',''$email', '$phone', '$message')";
//   //Execute the query and returning a message
// if(!$result = $con->query($sql)){
// die('Error occured [' . $conn->error . ']');
// }
// else
//    echo "Thank you! We will get in touch with you soon";
// }

?>