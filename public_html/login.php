<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="login.css" rel="stylesheet">
<title>Log In</title>
</head>
<?php
session_start();
$message="";
include "header.php";
if(count($_POST)>0) {
include 'connection.php';
$result = mysqli_query($conn,"SELECT * FROM Customer WHERE Email='" . $_POST["Email"] . "' and Password = '". $_POST["Password"]."'");
$row = mysqli_fetch_array($result);
if(is_array($row)) {
$_SESSION["Customer_ID"] = $row['Customer_ID'];
$_SESSION["FirstName"] = $row['FirstName'];
}
else
{
$message = "Invalid Email or Password!";
}
}
if(isset($_SESSION["Customer_ID"])) {
header("Location:home.php");
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Log In</title>
</head>

<body>
<form name"frmUser" method="post" action="" align="center">
<div class="message"><?php if($message!="") { echo $message; } ?></div>
<h2 align="center">Log In</h2>
  <br>
  Email<br>
  <input type="text" name="Email">
  <br>
  Password<br>
  <input type="Password" name="Password">
  <br><br>
  Don't have an account? <a href="signup.php">Sign up</a>
  <br><br>
  Forgot your password? <a href="forgot-password.php">Recover</a>
  <br><br>
  Admin? <a href="adminlogin.php">Log In</a>
  <br><br>
  <button type="submit" class="loginbtn" name="Submit" value="Log In"></button>

  </form>
</body>
</html>