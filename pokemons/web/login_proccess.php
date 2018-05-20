<?php
include "config.php";
if(mysqli_connect_errno()){
echo mysqli_connect_error();
    }

if(empty($_SESSION)){   // if the session not yet started
   session_start();
}
if(!isset($_POST['submit'])) { // if the form not yet submitted
   echo "not submitted";
   exit;
}
//check if the username entered is in the database.
$username=$_POST['username'];
$password=$_POST['password'];

if (preg_match('/[\'^£$%&*()}{@#~?><>,|=_+¬-]/', $username)){
        header("location: login.php"); // send to home page
        exit;
    }
    else if(preg_match('/[\'^£$%&*()}{@#~?><>,|=_+¬-]/', $password)){
        header("location: login.php"); // send to home page
        exit;
    };


$select = $conn->prepare("SELECT name, usertype FROM users WHERE name='$username' and password='$password'");
$select -> bind_result($name,$usertype);
$select -> execute();
$select -> fetch();
$select -> close();





$result = mysqli_query($conn,"SELECT name, usertype FROM users WHERE name='$username' and password='$password'");
//conditions
$count  = mysqli_num_rows($result);
	if($count==0) {
		echo "Invalid Username or Password!";
	} else {
    $_SESSION['username'] = $name;
    $_SESSION['usertype'] = $usertype;
		echo "You are successfully authenticated!";
    header("Location: list.php");
    exit;
	}
//if exists, then extract the password.



?>
