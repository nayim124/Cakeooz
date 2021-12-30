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
			<div class="wrapper">
				<div class="logo">
					<a href="home.php">CAKEOOZ</a>
				</div>
				<nav>
					<a href="home.php">Home</a> <a href="menu.php">Menu</a> <a href="cart.php">Cart</a> <a href="logout.php">Logout</a>
				</nav>
			</div>
		</header>
		<div class="banner-area">
			<h2>CAKEOOZ</h2>
		</div>
		<div class="content-area">
			<div class="wrapper">
				<p><?php
				session_start();
                if(isset($_SESSION["Customer_ID"])) {
					?>
                    	Welcome <?php echo $_SESSION["FirstName"]; ?>.
					<?php
                }
				else echo 'You currently are not logged in, please <a href="login.php">Log In</a>';
					?></p>
					<div class="cards">
						<div class="card" id="black-forest"><img src="./menuImages/RegularDelights/black-forest.png" alt="black-forest"/></div>
					</div>
                    </div>
            </div>
        </div>
    </body>
</html>