<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="../css/login.css" rel="stylesheet">
<title>Log In</title>
</head>
<?php
session_start();
$message="";
include "header.php";
if(count($_POST)>0) {
include '../connection.php';
$result = mysqli_query($conn,"SELECT * FROM StaffMembers WHERE IDNumber='" . $_POST["IDNumber"] . "' and Password = '". $_POST["Password"]."'");
$row = mysqli_fetch_array($result);
if(is_array($row)) {
$_SESSION["Staff_ID"] = $row['Staff_ID'];
$_SESSION["FirstName"] = $row['FirstName'];
}
else
{
$message = "Invalid ID Number or Password!";
}
}
if(isset($_SESSION["Staff_ID"])) {
header("Location:../admin/adminhome.php");
}elseif(isset($_SESSION["Customer_ID"])) {
  header("Location:../home/home.php");
  };
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
<h2 align="center">Admin Log In</h2>
  <br>
  ID<br>
  <input type="number" name="IDNumber">
  <br>
  Password<br>
  <input type="Password" name="Password">
  <br><br>
  <a href="login.php" style="color: #ffffff; ">Not an admin?</a>
  <br><br>
  <button type="submit" class="loginbtn" name="Submit">Log In</button>
  </form>
</body>
</html>