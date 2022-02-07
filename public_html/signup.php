<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="stylesheet" type="text/css" href="signup.css">
<?php
include "header.php";
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Sign Up</title>
</head>
<?php
include 'connection.php';
session_start();
if(isset($_POST["Submit"])){
	$firstname = $_POST["FirstName"];
	$lastname = $_POST["LastName"];
	$tel = $_POST["Tel"];
	$dob = $_POST["DateOfBirth"];
	$email = $_POST["Email"];
  $password = $_POST["Password"];
	
	if($email=="" or $password==""){
		$message = "Empty";
		}
	else{
		mysqli_query($conn, "INSERT INTO Customer (FirstName, LastName, Tel, DateOfBirth, Email, Password) VALUES ('$firstname', '$lastname', '$tel', '$dob', '$email', '$password')") or die(mysqli_error($conn));
		echo "Success";
		}
	}
if(isset($_SESSION["Customer_ID"])) {
  header("Location:home.php");
}
?>

<body>

<form method="POST">
  <div class="container">
  <h2 align="center">Sign Up</h2>
    <br>
    First Name<br>
    <input type="text" name="FirstName" required>
    <br>
    Last Name<br>
    <input type="text" name="LastName" required>
    <br><br>
    Mobile Number<br>
    <input type="number" name="Tel" required>
    <br>
    Date of Birth<br>
    <input type="date" name="DateOfBirth" required>
    <br><br>
    Email<br>
    <input type="text" name="Email" required>
    <br>
    Password<br>
    <input type="Password" name="Password" required>
    <br><br>
    Already have an account? <a href="login.php">Log In</a>
    <br><br>

    <div class="clearfix">
      <button type="submit" class="signupbtn" name="Submit">Sign Up</button>
    </div>
  </div>
</form>

</body>
</html>