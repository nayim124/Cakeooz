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
					<a href="home.php">Home</a> <a href="#menu">Menu</a> <a href="cart.php">Cart</a> <a href="logout.php">Logout</a>
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
						<div class="card" id="creme-delight"><img src="./menuImages/RegularDelights/creme-delight.png" alt="creme-delight"/></div>
						<div class="card" id="crescent-delight"><img src="./menuImages/RegularDelights/crescent-delight.png" alt="crescent-delight"/></div>
						<div class="card" id="crown-delight"><img src="./menuImages/RegularDelights/crown-delight.png" alt="crown-delight"/></div>
						<div class="card" id="crown-ooz"><img src="./menuImages/RegularDelights/crown-ooz.png" alt="crown-ooz"/></div>
						<div class="card" id="eskimo-ooz"><img src="./menuImages/RegularDelights/black-forest.png" alt="eskimo-ooz"/></div>
						<div class="card" id="floral-delight"><img src="./menuImages/RegularDelights/floral-delight.png" alt="floral-delight"/></div>
						<div class="card" id="white-lady"><img src="./menuImages/RegularDelights/white-lady.png" alt="white-lady"/></div>
					</div>
                    </div>
            </div>
        </div>
    </body>
</html>