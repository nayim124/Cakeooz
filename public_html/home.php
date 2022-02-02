<!DOCTYPE html>
<html lang="en">
<head>
<link rel="shortcut icon" href="./images/cakeicon.png" />
	<meta charset="UTF-8">
	<title>Cakeooz</title>
	<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">
	<link href="index.css" rel="stylesheet">
	<style>
		.cards .regular-delights {
			display: flex;
			align-items: center;
			justify-content: center;
			text-align: center;
		}

		.cards .royal-delights {
			display: flex;
			align-items: center;
			justify-content: center;
			text-align: center;
		}

		.card-img {
  			width: 50%;
  			padding: 5px;
			margin: auto;
		}

		.card-img:hover{
			background: 20px #fff;
			padding-bottom: 50px;
		}

		.button{
			opacity:0;
		}
		.btn {
			padding: 1em 2.1em 1.1em;
			border-radius: 50em !important
			margin: 8px 8px 8px 8px;
			color: white;
			display: inline-block;
			-webkit-transtion: 0.3s;
			-moz-transition: 0.3s;
			-o-transition: 0.3s;
			font-weight: 900;
			font-family: sans-serif;
			font-size: .80em;
			text-transform: uppercase;
			text-align: center;
			position: center;
			justify-content: center;
			-webkit-box-shadow: 0em -0.3rem 0em rgba(0, 0, 0, 0.1) inset;
			-moz-box-shadow: 0em -0.3rem 0em rgba(0, 0, 0, 0.1) inset;
			box-shadow: 0em -0.3rem 0em rgba(0, 0, 0, 0.1) inset;
		}
		.btn:hover {
			opacity: 0.75;
		}
		.card-img:hover .button{
			float:right;
			opacity: 1;
			color: #gray;
			background: green;
			padding: 20px;
		}

		.card-img img {
			display: block;
			width: 100%;
			max-width: 500px
		}

		.royal-delights p {
			text-align: center;
		}

		#Top {
			display: none;
			position: fixed;
			bottom: 20px;
			right: 30px;
			z-index: 99;
			font-size: 18px;
			border: none;
			outline: none;
			background-color: gray;
			color: white;
			cursor: pointer;
			padding: 15px;
			border-radius: 4px;
		}
		
		.green {
			background-color: #90EE90;
		}
	</style>
</head>
<body>
<?php
include "afterheader.php";
include "connection.php";
?>
		<div class="banner-area">
			<h2><?php
				session_start();
                if(isset($_SESSION["Customer_ID"])){
					?>
                    	Welcome <?php echo $_SESSION["FirstName"]; ?>
					<?php
                }
				elseif(!isset($_SESSION['Customer_ID'])){
					header("Location:index.php");
				}
					?></h2>
		</div>
		<div class="content-area">
			<div class="wrapper">
					
					<div class="cards">
						<p>Regular Delights</p>
						<div class="regular-delights">
							<div class="card-img"> 
								<img src="./menuImages/RegularDelights/black-forest.png" id="black-forest" alt="black-forest"/><a href="cart.php/?id=black-forest" class="button">Buy</a>
							</div>
							<div class="card-img"><img src="./menuImages/RegularDelights/creme-delight.png" id="creme-delight" alt="creme-delight"/><a href="cart.php/?id=creme-delight" class="button">Buy</a></div>
							<div class="card-img" ><img src="./menuImages/RegularDelights/crescent-delight.png" id="crescent-delight" alt="crescent-delight"/><a href="cart.php/?id=crescent-delight" class="button">Buy</a></div>
							<div class="card-img" ><img src="./menuImages/RegularDelights/crown-delight.png" id="crown-delight" alt="crown-delight"/><a href="cart.php/?id=crown-delight" class="button">Buy</a></div>
							<div class="card-img" ><img src="./menuImages/RegularDelights/crown-ooz.png" id="crown-ooz" alt="crown-ooz"/><a href="cart.php/?id=crown-ooz" class="button">Buy</a></div>
							<div class="card-img" ><img src="./menuImages/RegularDelights/eskimo-ooz.png" id="eskimo-ooz" alt="eskimo-ooz"/><a href="cart.php/?id=eskimo-ooz" class="button">Buy</a></div>
							<div class="card-img" ><img src="./menuImages/RegularDelights/floral-delight.png" id="floral-delight" alt="floral-delight"/><a href="cart.php/?id=floral-delight" class="button">Buy</a></div>
							<div class="card-img" ><img src="./menuImages/RegularDelights/white-lady.png" id="white-lady" alt="white-lady"/><a href="cart.php/?id=white-lady" class="button">Buy</a></div>
						</div>
						<br />
						<p>Royal Delights</p>
						<div class="royal-delights">
							<div class="card-img" >
								<img src="./menuImages/RoyalDelights/baby-shower-delight.png" id="baby-shower-delight" alt="baby-shower-delight"/>
								<form action="info.php/?id=<?php echo 'baby-shower-delight'; ?>" method="POST">
									<input type="submit" class="button btn green" value="Find out more"/>
								</form>
								<form action="order.php">
									<input type="submit" class="button btn green" value="order"/>
								</form>
							</div>
							<div class="card-img">
								<img src="./menuImages/RoyalDelights/castle-delight.png" id="castle-delight" alt="castle-delight"/>
								<form action="info.php/?id=<?php echo 'castle-delight'; ?>" method="POST">
									<input type="submit" class="button btn green" value="Find out more"/>
								</form>
								<form action="order.php">
									<input type="submit" class="button btn green" value="Order"/>
								</form>
							</div>
							<div class="card-img" >
								<img src="./menuImages/RoyalDelights/choco-ooz.png" id="choco-ooz" alt="choco-ooz"/>
								<form action="info.php/?id=<?php echo 'choco-ooz'; ?>" method="POST">
									<input type="submit" class="button btn green" value="Find out more"/>
								</form>
								<form action="order.php">
									<input type="submit" class="button btn green" value="Order"/>
								</form>
							</div>
							<div class="card-img" >
								<img src="./menuImages/RoyalDelights/choco-truffle-trouble.png" id="choco-truffle-trouble" alt="choco-truffle-trouble"/>
								<form action="info.php/?id=<?php echo 'choco-truffle-trouble'; ?>" method="POST">
									<input type="submit" class="button btn green" value="Find out more"/>
								</form>
								<form action="order.php">
									<input type="submit" class="button btn green" value="Order"/>
								</form>
							</div>
							<div class="card-img" >
								<img src="./menuImages/RoyalDelights/double-delight.png" id="double-delight" alt="double-delight"/>
								<form action="info.php/?id=<?php echo 'double-delight'; ?>" method="POST">
									<input type="submit"  class="button btn green" value="Find out more"/>
								</form>
								<form action="order.php">
									<input type="submit" class="button btn green" value="Order"/>
								</form>
							</div>
							<div class="card-img" >
								<img src="./menuImages/RoyalDelights/minion-ooz.png" id="minion-ooz" alt="minion-ooz"/>
								<form action="info.php/?id=<?php echo 'minion-ooz'; ?>" method="POST">
									<input type="submit" class="button btn green" value="Find out more"/>
								</form>
								<form action="order.php">
									<input type="submit" class="button btn green" value="Order"/>
								</form>
							</div>
							<div class="card-img" >
								<img src="./menuImages/RoyalDelights/princess-delight.png" id="princess-delight" alt="princess-delight"/>
								<form action="info.php/?id=<?php echo 'princess-delight'; ?>" method="POST">
									<input type="submit" class="button btn green" value="Find out more"/>
								</form>
								<form action="savedItems.php/?id=<?php echo 'princess-delight'?>&name=<?php echo $_SESSION["Customer_ID"] ?>" method="POST">
									<input type="submit" class="button btn green" value="Save Item"/>
								</form>
								<form action="order.php">
									<input type="submit" class="button btn green" value="Order"/>
								</form>
							</div>
							<div class="card-img" >
								<img src="./menuImages/RoyalDelights/santa-delight.png" id="santa-delight" alt="santa-delight"/>
								<form action="info.php/?id=<?php echo 'santa-delight'; ?>" method="POST">
									<input type="submit" class="button btn green" value="Find out more"/>
								</form>
								<form action="savedItems.php/?id=<?php echo 'santa-delight'?>&name=<?php echo $_SESSION["Customer_ID"] ?>" method="POST">
									<input type="submit" class="button btn green" value="Save Item"/>
								</form>
								<form action="order.php">
									<input type="submit" class="button btn green" value="Order"/>
								</form>

							</div>
						<button onClick="scrollTop()" id="Top">⇧</button>
					</div>
			 </div>
            </div>
        </div>
		<script>
		var button = document.getElementById("Top")
		window.onscroll = function() {
			if (document.body.scrollTop > 450 || document.documentElement.scrollTop > 450)
			{
				button.style.display="block"
			}
			else{
				button.style.display="none"
			}
		}
		function scrollTop() {
			document.body.scrollTop = 0
			document.documentElement.scrollTop = 0
		}
		</script>
		<?php
	$product_array = $db_handle->runQuery("SELECT * FROM Product ORDER BY id ASC");
if (!empty($product_array)) { 
	foreach($product_array as $key=>$value){
?>
	<div class="product-item">
		<form method="post" action="cart.php?action=add&code=<?php echo $product_array[$key]["code"]; ?>">
		<div class="product-image"><img src="<?php echo './menuImages/RoyalDelights/'. $product_array[$key]["name"] . '.png'?>"></div>
		<div class="product-tile-footer">
		<div class="product-title"><?php echo $product_array[$key]["name"]; ?></div>
		<div class="product-price"><?php echo "$".$product_array[$key]["price"]; ?></div>
		<div class="cart-action"><input type="text" class="product-quantity" name="quantity" value="1" size="2" /><input type="submit" value="Add to Cart" class="btnAddAction" /></div>
		</div>
		</form>
	</div>
<?php
	}
}
?>
	<footer id="footer"> 
	</footer>
	</body>
</html>