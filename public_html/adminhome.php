<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Cakeooz</title>
	<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">
	<link href="index.css" rel="stylesheet">
</head>
<body>
	<div class="box-area">
		<header>

				<div class="logo">
					<a href="adminhome.php">CAKEOOZ</a>
				</div>
				<nav>
					<a href="adminhome.php">Home</a> <a href="orders.php">Orders</a> <a href="reports.php">Reports</a> <a href="adminlogout.php">Logout</a>
				</nav>

		</header>
		<div class="banner-area">
			<h2>CAKEOOZ</h2>
		</div>
		<div class="content-area">
			<div class="wrapper">
				<p><?php
				session_start();
                if(isset($_SESSION["Staff_ID"])) {
					?>
                    Welcome <?php echo $_SESSION["FirstName"]; ?>.
					<?php
                    }else echo 'You currently are not logged in, please <a href="login.php">Log In</a>';
					?></p>
                    </div>
                    </div>
                    </div>
                    </body>
                    </html>