<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="stylesheet" type="text/css" href="signup.css">
<?php
include 'header.html';
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Sign Up</title>
</head>
<?php

include 'connection.php';
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
?>

<body>

<form method="POST">
  <div class="container">
    <br>
	<label for="firstname"><b>First Name</b></label>
    <input type="text" placeholder="Enter Your First Name" name="FirstName" required>
    <br><br>
    <label for="lastname"><b>Last Name</b></label>
    <input type="text" placeholder="Enter Your Last Name" name="LastName" required>
    <br><br>
    <label for="tel"><b>Mobile Number</b></label>
    <input type="number" placeholder="Enter Tel" name="Tel" required>
    <br><br>
    <label for="dob"><b>Date Of Birth</b></label>
    <input type="date" placeholder="Enter Your Date of Birth" name="DateOfBirth" required>
    <br><br>
    <label for="email"><b>Email</b></label>
    <input type="text" placeholder="Enter Email" name="Email" required>
	  <br><br>
    <label for="password"><b>Password</b></label>
    <input type="password" placeholder="Enter Password" name="Password" required>
	  <br><br>
    Already have an account? <a href="login.php">Log In</a>
    <br><br>
    <input type="checkbox" checked="checked" name="termsbox" style="margin-bottom:15px"> I Agree
    </label>

    <p>By creating an account you agree to our <a href="terms.php" style="color:dodgerblue">Terms & Conditions</a>.</p>

    <div class="clearfix">
      <input type="reset">
      <button type="submit" class="signupbtn" name="Submit">Sign Up</button>
    </div>
  </div>
</form>

</body>
</html>