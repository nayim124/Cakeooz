<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="../css/cart.css" /> 
    <title>Cart Page</title>
</head>
<body>
    <?php
        session_start();
        include "../connection.php";
        include "afterheader.php";
        $customerName;
        if(isset($_SESSION["Customer_ID"])){
            $customerName =  $_SESSION["FirstName"];
        }
    ?> 

    <div class="cart">
        <div style="color: beige;"class="labels"> 

            <label class="item-description"> Description </label>
            <label class="item-details"> Item </label>
            <label class="item-price"> Price </label>
            <label class="item-quantity"> Quantity </label>
            <label class="item-status"> Status </label>
            <label class="item-price-total"> Total </label>
        </div>

       <?php
            $productId;
            $quantity;
            $price;
            $status;
            $description;
            $type;
            $typeOfCake;
            $totalPurchase;
            $sql = "SELECT * FROM CartItems";
            $taxCalculation;
            $totalCartPrice = 0;
            $result = mysqli_query($conn, $sql);

            if(mysqli_num_rows($result) > 0){
                while($row = mysqli_fetch_array($result)){
                    if($row['Customer_ID'] == $_SESSION["Customer_ID"]){
                       $productId = $row['Product_ID'];
                       $quantity = $row['Quantity'];
                       $totalPurchase = $row['Price'];
                       $totalCartPrice = $totalCartPrice + $totalPurchase;
                    };
                    $prodcutSql = "SELECT * FROM Product";

                    $productResult = mysqli_query($conn, $prodcutSql);

                    if(mysqli_num_rows($productResult) > 0){
                        while($row = mysqli_fetch_array($productResult)){
                            if($row['Product_ID'] == $productId){
                                $price = $row['Price'];
                                $description = $row['Description'];
                                $typeOfCake = $row['Type'];
                                if($typeOfCake == 'Regular Delight'){
                                    $type = 'RegularDelights';
                                }
                                else{
                                    $type = 'RoyalDelights';
                                }
                            };
                        };
                    };           
                    echo '<div class="product">';
                    echo '<div class="item-description">' .$description. '</div>';
                    echo '<div class="item-details">';
                    echo '<div class="item-title"><p>' .$description. '</p></div>';
                    echo '</div>';
                    echo '<div class="item-price">£ ' .$price. '</div>';
                    echo '<div class="item-quantity">' .$quantity. '</div>';
                    echo '<div class="item-status">In stock</div>';
                    echo '<div class="item-price-total">' .$totalPurchase. '</div>';
                    echo '</div>';
                };
            }   
            else {
                echo '<h1 id="title"> Your cart is empty! </h1>';
            } 
            $taxCalculation = $totalCartPrice * 0.1;
       ?>

        <div class="totals">
            <div class="totals-item">
                <label class="totals-label" > Sub total </label>
                <div class="total-value" id="cart-subtotal"> £<? echo $totalCartPrice ?> </div>
            </div>
            <div class="totals-item">
                <label class="totals-label"> Tax (10%) </label>
                <div class="total-value" id="cart-tax"> <? echo $taxCalculation ?> </div>
            </div>
            <div class="totals-item">
                <label class="totals-label"> Shipping </label>
                <div class="total-value" id="cart-shipping"> £10 </div>
            </div>
            <div class="totals-item totals-item-total">
                <label class="totals-label"> Final total </label>
                <div class="total-value" id="cart-total">£
                    <?php 
                        if($totalCartPrice != 0) {
                            echo ($totalCartPrice + $taxCalculation + 10);
                        }
                        else {
                            echo (0);
                        }
                     ?> 
                </div>
            </div>
        </div>
        <form action="order-confirmation.php" method="POST">
            <input type="submit" name="action"  class="checkout" value="Checkout" />
        </form>
    </div>
</body>
</html>