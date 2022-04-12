<!DOCTYPE html>
<html lang="en">
<head>
	<link rel="shortcut icon" href="./images/cakeicon.png" />
	<meta charset="UTF-8">
	<title>Cakeooz</title>
	<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">
	<link href="../css/index.css" rel="stylesheet">
</head>
<body>
	<?php
	session_start();
	include "../connection.php";
	include "header.php";
	if(isset($_SESSION["Customer_ID"])) {
        header("Location:../home/home.php");
    };
	if(isset($_SESSION["Staff_ID"])) {
        header("Location:../admin/adminhome.php");
    };
	?>
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
