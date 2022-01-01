<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Cakeooz</title>
	<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">
	<link href="index.css" rel="stylesheet">
	<style>
		.cards{
			display: flex;
			align-items: center;
			justify-content: center;
		}

		.card-img {
  			width: 50%;
  			padding: 5px;
			margin: auto;
		}


		.card-img img{
			display: block;
			width: 100%;
			max-width: 500px;
			height: auto;
			margin: auto;
		}
	</style>
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
					
					<div class="cards">
						<div class="regular-delights">
							<div class="card-img" ><img src="./menuImages/RegularDelights/black-forest.png" id="black-forest" alt="black-forest"/></div>
							<div class="card-img"><img src="./menuImages/RegularDelights/creme-delight.png" id="creme-delight" alt="creme-delight"/></div>
							<div class="card-img" ><img src="./menuImages/RegularDelights/crescent-delight.png" id="crescent-delight" alt="crescent-delight"/></div>
							<div class="card-img" ><img src="./menuImages/RegularDelights/crown-delight.png" id="crown-delight" alt="crown-delight"/></div>
							<div class="card-img" ><img src="./menuImages/RegularDelights/crown-ooz.png" id="crown-ooz" alt="crown-ooz"/></div>
							<div class="card-img" ><img src="./menuImages/RegularDelights/eskimo-ooz.png" id="eskimo-ooz" alt="eskimo-ooz"/></div>
							<div class="card-img" ><img src="./menuImages/RegularDelights/floral-delight.png" id="floral-delight" alt="floral-delight"/></div>
							<div class="card-img" ><img src="./menuImages/RegularDelights/white-lady.png" id="white-lady" alt="white-lady"/></div>
						</div>
						<br />
						<div class="royal-delights">
							<div class="card-img" ><img src="./menuImages/RoyalDelights/baby-shower-delight.png" id="baby-shower-delight" alt="baby-shower-delight"/></div>
							<div class="card-img"><img src="./menuImages/RoyalDelights/castle-delight.png" id="castle-delight" alt="castle-delight"/></div>
							<div class="card-img" ><img src="./menuImages/RoyalDelights/choco-ooz.png" id="choco-ooz" alt="choco-ooz"/></div>
							<div class="card-img" ><img src="./menuImages/RoyalDelights/choco-truffle-trouble.png" id="choco-truffle-trouble" alt="choco-truffle-trouble"/></div>
							<div class="card-img" ><img src="./menuImages/RoyalDelights/double-delight.png" id="double-delight" alt="double-delight"/></div>
							<div class="card-img" ><img src="./menuImages/RoyalDelights/minion-ooz.png" id="minion-ooz" alt="minion-ooz"/></div>
							<div class="card-img" ><img src="./menuImages/RoyalDelights/princess-delight.png" id="princess-delight" alt="fprincess-delight"/></div>
							<div class="card-img" ><img src="./menuImages/RoyalDelights/santa-delight.png" id="santa-delight" alt="santa-delight"/></div>
						</div>
					</div>
			 </div>
            </div>
        </div>
    </body>
</html>