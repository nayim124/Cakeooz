<!DOCTYPE html>
<html lang="en">
<head>
	<link rel="shortcut icon" href="./images/cakeicon.png" />
	<meta charset="UTF-8">
	<title>Cakeooz</title>
	<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">
	<link href="index.css" rel="stylesheet">
</head>
<body>
	<?php
	session_start();
	include "connection.php";
	if(isset($_SESSION["Customer_ID"])) {
        header("Location:home.php");
    };
	?>
	<div class="box-area">
		<header>
				<div class="logo">
					<a href="index.php">CAKEOOZ</a>
				</div>
				<nav>
					<a href="index.php">Home</a> <a href="menu.php">Menu</a> <a href="signup.php">Sign Up</a> <a href="login.php">Log In</a>
				</nav>
		</header>
		<div class="banner-area">
			<h2>CAKEOOZ</h2>
		</div>
		<div class="content-area">
			<div class="wrapper">
				<p>Welcome to Cakeooz, the cake ordering system.</p>
			</div>
		</div>
	</div>
</body>
</html>
