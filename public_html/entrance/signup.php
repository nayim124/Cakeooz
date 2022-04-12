<!DOCTYPE html>
<html lang ="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <link rel="stylesheet" href="../css/signup.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700&display=swap" rel="stylesheet">
</head>
<?php

session_start();
include "header.php";
$message="";


if(isset($_POST["Join"])){

  include "../connection.php";

  $FirstName = $_POST["FirstName"];
  $LastName = $_POST["LastName"];
  $Tel = $_POST["Tel"];
  $DateOfBirth = $_POST["DateOfBirth"];
  $Email = $_POST["Email"];
  $Password = $_POST["Password"];
  $hash = password_hash($Password,  
          PASSWORD_DEFAULT);

  if($FirstName=="" or $LastName=="" or $Email=="" or $Password==""){
    $message ="fill in";
  }
  else{
    mysqli_query($conn, "INSERT INTO Customer(FirstName, LastName, Tel, DateOfBirth, Email, Password) VALUES ('$FirstName', '$LastName', '$Tel', '$DateOfBirth', '$Email','$hash' )") or die(mysqli_error($conn));
    $message ="Success";
  }
  $verify = password_verify($Password, $hash);
  if($verify == 1){
    $result = mysqli_query($conn,"SELECT * FROM Customer WHERE Email='" . $_POST["Email"] . "' and Password = '". $hash ."'");
    $row = mysqli_fetch_array($result);
  }
  else{
    $message = "Error";
  }
  

  if(is_array($row)) {
    $_SESSION["Customer_ID"] = $row['Customer_ID'];
    $_SESSION["FirstName"] = $row['FirstName'];
  }
  else
  {
    $message = "Error";
  }
}

if(isset($_SESSION["Customer_ID"])) {
  header("Location:../home/home.php");
}
if(isset($_SESSION["Staff_ID"])) {
    header("Location:../admin/adminhome.php");
  }
?>
<body>

  <form id="signup_form" method="POST">
    <div class="container">
    <h2 align="center">Sign Up</h2>
      <br>
      First Name<br>
      <input id="firstName" type="text" name="FirstName" required>
      <br>
      Last Name<br>
      <input id="lastName" type="text" name="LastName" required>
      <br>
      Phone Number<br>
      <input type="number" onKeyDown="if(this.value.length == 11 && event.keyCode!=8) return false;" name="Tel" maxlength="11" required>
      <br>
      Date of Birth<br>
      <input type="date" name="DateOfBirth" required>
      <br>
      Email<br>
      <input id="email" type="text" name="Email" required>
      <br>
      Password<br>
      <input id="password" type="Password" name="Password" required>
      <br><br>
      <input type="checkbox" onclick="myFunction()">Show Password
      <br><br>
      <a href="login.php" style="color: #ffffff;">Already have an account?</a>
      <br><br>
      <div class="clearfix">
          <input onclick="validateSignUp();" type="submit" value="Join" name="Join">
      </div>
    </div>
  </form>
  <script>
        document.getElementById('signup_form').addEventListener("submit", validateSignUp);

        function validateSignUp(){
          var error = "";

          error += validateEmail();

          error += validateName();

          error += validatePassword();

          if(error != ""){
            alert(error);
            event.preventDefault();
          }
        }

        function validateEmail(){
          var error_message = "";
          var entered_email = document.forms["signup_form"]["email"].value;

          var format = /\w+([\.-]?\w{1})*@\w{1}([\.-]?\w+)*(\.\w{1})+/;

          if(!(entered_email.match(format))){
              signup_form.email.focus();
              signup_form.email.select();
              error_message = "Please enter a valid email address \n";
          }
          return error_message;
        }

        function validateName(){
          var error_message = "";
          var format = /^[A-Za-z]+$/;
          var entered_firstName = document.forms["signup_form"]["firstName"].value;
          var entered_lastName = document.forms["signup_form"]["lastName"].value;

          
          if(!format.test(entered_firstName)){
              signup_form.firstName.focus();
              signup_form.firstName.select();
              error_message = "Please enter a valid first name \n";
          }
          if(!format.test(entered_lastName)){
              signup_form.lastName.focus();
              signup_form.lastName.select();
              error_message = "Please enter a valid last name \n";
          }
          return error_message;
        }

        function validatePassword(){
          var error_message = "";
          var entered_password = document.forms["signup_form"]["password"].value;

          var upperCaseformat = /[A-Z]/g;

          if(entered_password.length  < 6){
              signup_form.password.focus();
              signup_form.password.select();
              error_message = "Please enter a valid password that has at least 6 characters \n";
          }
          if(entered_password.length  >  15){
              signup_form.password.focus();
              signup_form.password.select();
              error_message = "Password length must not exceed 15 characters \n";
          }
          if(!entered_password.match(upperCaseformat)){
              signup_form.password.focus();
              signup_form.password.select();
              error_message = "Password must have at least one upper case character \n";
          }
          return error_message;
        }
  </script>
  <script>
    function myFunction() {
        var x = document.getElementById("password");
        if (x.type === "password") {
          x.type = "text";
        } else {
          x.type = "password";
        }
      }
  </script>
</body>

