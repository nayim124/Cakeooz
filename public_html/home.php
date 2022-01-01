<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Cakeooz</title>
	<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">
	<link href="index.css" rel="stylesheet">
</head>
<body>
<?php
include "afterheader.php";
?>
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
						<figure  id="black-forest"><img src="./menuImages/RegularDelights/black-forest.png" class="card-img" alt="black-forest"/></figure>
						<figure  id="creme-delight"><img src="./menuImages/RegularDelights/creme-delight.png" class="card-img" alt="creme-delight"/></figure>
						<figure  id="crescent-delight"><img src="./menuImages/RegularDelights/crescent-delight.png" class="card-img" alt="crescent-delight"/></figure>
						<figure  id="crown-delight"><img src="./menuImages/RegularDelights/crown-delight.png" class="card-img" alt="crown-delight"/></figure>
						<figure  id="crown-ooz"><img src="./menuImages/RegularDelights/crown-ooz.png" class="card-img" alt="crown-ooz"/></figure>
						<figure  id="eskimo-ooz"><img src="./menuImages/RegularDelights/black-forest.png" class="card-img" alt="eskimo-ooz"/></figure>
						<figure  id="floral-delight"><img src="./menuImages/RegularDelights/floral-delight.png" class="card-img" alt="floral-delight"/></figure>
						<figure  id="white-lady"><img src="./menuImages/RegularDelights/white-lady.png" class="card-img" alt="white-lady"/></figure>
					</div>
            </div>
        </div>
    </body>
</html>