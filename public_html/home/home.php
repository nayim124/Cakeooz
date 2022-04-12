<!DOCTYPE html>
<html lang="en">
<head>
<link rel="shortcut icon" href="../images/cakeicon.png" />
	<meta charset="UTF-8">
	<title>Cakeooz</title>
	<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">
	<link href="../css/index.css" rel="stylesheet">
	<link rel="stylesheet" href="../css/home.css">
</head>
<body>
<?php
include "afterheader.php";
include "../connection.php";
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
					header("Location:../entrance/login.php");
				}
					?></h2>
		</div>
		<div class="content-area">
		<section id="menu" class="p-5">
			<div class="wrapper">
					<ul class="filter-gluten">
						<li><a href="">Nut Free</a></li>
						<li><a href="">Gluten Free</a></li>
						<li><a href="">Reset</a></li>
					</ul>
					<div class="cards">
						<p>Regular Delights</p>
						<div class="regular-delights">
							<div class="card-img"> 
							
								<form action="info.php" method="POST">
									<input type="submit" name="cake" class="cake-button" id="nutfree" value="Black Forest"/>
								</form>
								<br/>
							</div>
							<div class="card-img"> 
							
								<form action="info.php" method="POST">
									<input type="submit" name="cake" class="cake-button" id="glutenfree" value="Crown-ooz"/>
								</form>
								<br/>
							</div>
							<div class="card-img"> 
							
								<form action="info.php" method="POST">
									<input type="submit" name="cake" class="cake-button" id="nutfree" value="Crown Delight"/>
								</form>
								<br/>
							</div>
							<div class="card-img"> 
							
								<form action="info.php" method="POST">
									<input type="submit" name="cake" class="cake-button" id="glutenfree" value="Floral Delight"/>
								</form>
								<br/>
							</div>
							<div class="card-img"> 
							
								<form action="info.php" method="POST">
									<input type="submit" name="cake" class="cake-button" id="glutenfree" value="White Lady"/>
								</form>
								<br/>
							</div>
							<div class="card-img"> 
							
								<form action="info.php" method="POST">
									<input type="submit" name="cake" class="cake-button" id="nutfree" value="Crescent Delight"/>
								</form>
								<br/>
							</div>
							<div class="card-img"> 
							
								<form action="info.php" method="POST">
									<input type="submit" name="cake" class="cake-button" id="glutenfree" value="Creme Delight"/>
								</form>
								<br/>
							</div>
							<div class="card-img"> 
							
								<form action="info.php" method="POST">
									<input type="submit" name="cake" class="cake-button" id="glutenfree" value="Eskimo-ooz"/>
								</form>
								<br/>
							</div>
						</div>
						<br />
						<p>Royal Delights</p>
						<div class="royal-delights">
							<div class="card-img"> 
								
								<form action="info.php" method="POST">
									<input type="submit" name="cake" class="cake-button" id="nutfree" value="Santa Delight"/>
								</form>
								<br/>
							</div>
							<div class="card-img"> 
							
								<form action="info.php" method="POST">
									<input type="submit" name="cake" class="cake-button" id="glutenfree" value="Minion-ooz"/>
								</form>
								<br/>
							</div>
							<div class="card-img"> 
							
								<form action="info.php" method="POST">
									<input type="submit" name="cake" class="cake-button" id="glutenfree" value="Baby Shower Delight"/>
								</form>
								<br/>
							</div>
							<div class="card-img"> 
							
								<form action="info.php" method="POST">
									<input type="submit" name="cake" class="cake-button" id="glutenfree" value="Choco Truffle Trouble"/>
								</form>
								<br/>
							</div>
							<div class="card-img"> 
							
								<form action="info.php" method="POST">
									<input type="submit" name="cake" class="cake-button" id="nutfree" value="Princess Delight"/>
								</form>
								<br/>
							</div>
							<div class="card-img"> 
							
								<form action="info.php" method="POST">
									<input type="submit" name="cake" class="cake-button" id="nutfree" value="Double Delight"/>
								</form>
								<br/>
							</div>
							<div class="card-img"> 
							
								<form action="info.php" method="POST">
									<input type="submit" name="cake" class="cake-button" id="nutfree" value="Castle Delight"/>
								</form>
								<br/>
							</div>
							<div class="card-img"> 
							
								<form action="info.php" method="POST">
									<input type="submit" name="cake" class="cake-button" id="glutenfree" value="Choco-ooz"/>
								</form>
								<br/>
							</div>
					</div>
			 </div>
            </div>
		</section>
        </div>
		<script>
		
			var cakes = document.querySelectorAll('.cards div div');
			view(cakes, "no");

			each('.filter-gluten li a', function(el) {
				el.addEventListener('click', function(e) {
					e.preventDefault();
					filterGluten(el);
				});
			});

			function filterGluten(type) {
				var value = type.textContent,
					linksToLowerCase = value.toString().toLowerCase();
				if(value === "Nut Free"){
					each('.cake-button', function(e){
						e.classList.remove('cake-button');
						e.style.visibility = "hidden";
					})
					view(document.querySelectorAll('#' +'nutfree'), "yes");
				}
				if(value === "Gluten Free"){
					each('.cake-button', function(e){
						e.classList.remove('cake-button');
						e.style.visibility = "hidden";
					})
					view(document.querySelectorAll('#' + 'glutenfree'), "yes");
				}
				if (value === "Reset"){
					view(document.querySelectorAll('#' + 'glutenfree'), "yes");
					view(document.querySelectorAll('#' + 'nutfree'), "yes");
				}
				
			}
			function each(element, callback){
				var cakeDivs = document.querySelectorAll(element),
					converToArr = Array.prototype.slice.call(cakeDivs);
				Array.prototype.forEach.call(converToArr, function(selector, index) {
					if(callback) return callback(selector);
				});
			};
			function view(cakes, filter) {
				if (filter === "yes"){
					(
					function showCakes(counter) {
						setTimeout(function() {
							cakes[counter].classList.add('cake-button');

							cakes[counter].style.visibility = 'visible';
							counter++;
							if(counter < cakes.length) showCakes(counter);
						}, 50)
					})(0);
				}
				
			}
		</script>
		<?php
		$product_array = $db_handle->runQuery("SELECT * FROM Product ORDER BY id ASC");
		if (!empty($product_array)) { 
			foreach($product_array as $key=>$value){
		?>
		<div class="product-item">
			<form method="post" action="cart.php?action=add&code=<?php echo $product_array[$key]["code"]; ?>">
			<div class="product-image"><img src="<?php echo '../menuImages/RoyalDelights/'. $product_array[$key]["name"] . '.png'?>"></div>
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
	</body>
</html>