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
include 'header.html';
if(count($_POST)>0) {
include 'connection.php';
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
header("Location:adminhome.php");
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
<h3 align="center">Enter Login Details</h3>
  ID:<br>
  <input type="number" name="IDNumber">
  <br>
  Password:<br>
  <input type="Password" name="Password">
  <br><br>
  Not an admin? <a href="login.php">Back to normal log in</a>
  <br><br>
  <input type="reset">
  <input type="submit" name="Submit" value="Log In">
  </form>
</body>
</html>