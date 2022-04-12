<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="info.css" /> 
    <link rel="stylesheet" type="text/css" href="../css/table.css" />
    <title>Info Page</title>
    <style>
        body {
            background-color: rgb(95,95,95);
        }
        caption {
            color: white;
            font-family: Poppins;
        }
        img {
			border-radius: 50%;
			width: 100px;
			height: 100px;
			object-fit: cover;
            padding: 1.5rem;
		}


        .cake-button {
			display: inline-block;
			padding: 0.35rem 2.2rem;
			border: 0.1em solid black;
			margin: 0 0.3em 0.3em 0;
			border-radius: 0.12em;
			box-sizing: border-box;
			text-decoration: none;
			font-family: 'Robot', sans-serif;
			font-weight: 300;
			color: black;
			text-align: center;
			transition: all 0.2s;
			
		}
		.cake-button:hover {
			color: #000000;
			background-color: #00FF00;
		}
		@media all and (max-width: 30em) {
			.cake-button {
				display: block;
				margin: 0.4em auto;
			}
		}
        a {
            padding: 4px;
        }
        .quantity {
            -moz-appearence: none;
            -webkit-appearance: none;
            background: #f8f8f8;
            border: none;
            border-radius: 0;
            cursor: pointer;
            padding: 12px;
            width: 40%;
            font-size: 18px;
            text-align: center;
            display: block;
            margin: 0 auto;
            &:focus {
                color: black;
            }
            &::-ms-expand {
                display: none;
            }
        }
        input[type="text"] {
            background: transparent;
            border: none;
            color: white;
            font-size: 1em;
            padding: .625em;
        }
</style>
</head>
<body>
    <?php
        session_start();
        include "afterheader.php";
        include "../connection.php";
        if(!isset($_SESSION["Customer_ID"])) {
            header("Location:../entrance/login.php");
        };
    ?>
    <?php
        $_SESSION['name'] = ($_POST['cake']);
        $typeOfCake;
        $type;
        $priceOfCake;
        $sql = "SELECT Description, Type, Price FROM Product";

        $result = mysqli_query($conn, $sql);

        if(mysqli_num_rows($result) > 0){
            while($row = mysqli_fetch_array($result)){
                if($row['Description'] == $_SESSION['name']){
                    $typeOfCake = $row['Type'];
                    $priceOfCake = $row['Price'];
                    if($typeOfCake == 'Regular Delight'){
                        $type = 'RegularDelights';
                    }
                    else{
                        $type = 'RoyalDelights';
                    }
                };
            };
        };
    ?>
     
     
    <div style="font-size: 34px; color: white; margin-top: 1.5em">
        <i onclick="window.history.back();" class="fa fa-arrow-circle-left"></i>
    </div>
    <img src="../menuImages/<?php echo $type ?>/<?php echo $_SESSION['name'] ?>.png" id=<?php echo $_SESSION['name'] ?> alt=<?php echo $_SESSION['name'] ?>/>
    <form id="submit" action="order-confirmation.php" method="POST">
        <table>
            <caption><?php echo $_SESSION['name'] ?></caption>
            <thead>
                <tr>
                <th scope="col">Cake</th>
                <th scope="col">Type</th>
                <th scope="col">Price</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td data-label="Cake" name="cake" value="<?php echo $_SESSION['name'] ?>"><input type="hidden" name="cake" value="<?php echo $_SESSION['name'] ?>"><?php echo $_SESSION['name'] ?></td>
                    <td data-label="Type" name="cake" value="<?php echo $typeOfCake ?>"><input type="hidden" name="type" value="<?php echo $typeOfCake ?>"><?php echo $typeOfCake ?></td>
                    <td id="price" data-label="Price">£<input id="priceOfCake" type="text" class="newpriceOfCake" name="newPrice" value="<?php echo $priceOfCake ?>"></td>
                </tr>
            </tbody>
        </table><br />
        <div id="quantity" class="quantity" style="display:none;">

            <select onchange="onSelectChange(this)" class="quantity" name="Quantity">
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
                <option value="6">6</option>
                <option value="7">7</option>
                <option value="8">8</option>
                <option value="9">9</option>
                <option value="9">10</option>
            </select>
        </div>

        <button onclick="getQuantity()" type="button" id="order" class="cake-button" value="Order">Add to cart </button>
        <input  style="display:none;" id="save-order" type="submit" id="order" class="cake-button"name="action" value="Save" />
        <input style="display:none;" id="submit-button" type="submit" name="order" class="cake-button" value="Add to cart" />
    </form>
    <script>

        function getQuantity() {
            var quantity = document.getElementById("quantity");
            quantity.style.display = "block"; // shows the quantity
            quantity.style.background = "transparent";
            var order = document.getElementById("order");
            order.style.display = "none";
            var saveOrder = document.getElementById("save-order");
            saveOrder.style.display = "inline-block";
            var submit = document.getElementById("submit-button");
            submit.style.display = "inline-block";//show submit button
        }
        function onSelectChange(event) {
            document.getElementById("price").setAttribute("value", event.value *  <?php echo $priceOfCake ?>)
            document.getElementsByClassName("newpriceOfCake").value = event.value *  <?php echo $priceOfCake ?> //updates the price of the cake
            document.getElementById("priceOfCake").setAttribute("value", event.value *  <?php echo $priceOfCake ?>)
        }
    </script>
</body>
</html>