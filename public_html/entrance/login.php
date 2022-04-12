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

      $result = mysqli_query($conn,"SELECT * FROM Customer WHERE Email='" . $_POST["Email"] . "'");

      $row = mysqli_fetch_array($result);
      if(is_array($row)) {
        $verifyPassword = password_verify($_POST['Password'], $row['Password']);
        if($verifyPassword == 1){
          $_SESSION["Customer_ID"] = $row['Customer_ID'];
          $_SESSION["FirstName"] = $row['FirstName'];
        }
      } else {
          $message = "Invalid Email or Password!";
        }
      }
    if(isset($_SESSION["Customer_ID"])) {
      header("Location:../home/home.php");
    }
    if(isset($_SESSION["Staff_ID"])) {
      header("Location:../admin/adminhome.php");
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
  <input type="text" name="Email" required>
  <br>
  Password<br>
  <input type="Password" name="Password" id="ShowPass" required>
  <br>
  <input type="checkbox" onclick="myFunction()">Show Password
  <br><br>
  <a href="signup.php" style="color: #ffffff;">Don't have an account?</a>
  <br><br>
  <a href="reset_pass.html" style="color: #ffffff;">Forgot Password?</a>
  <br><br>
  <a href="adminlogin.php" style="color: #ffffff;">Admin?</a>
  <br><br>
  <button type="submit" class="loginbtn" name="Submit">Log In</button>

  </form>
<script>
  function myFunction() {
  var x = document.getElementById("ShowPass");
  if (x.type === "password") {
    x.type = "text";
  } else {
    x.type = "password";
  }
}
</script>
</body>
</html>