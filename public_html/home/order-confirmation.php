<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="../css/info.css" /> 
    <title>Order Confirmation Page</title>
    <style>
        body {
            background-color: rgb(95,95,95);
        }
        
        img {
            margin-left: auto;
            margin-right: auto;
            display: block;
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
       
        if(isset($_POST['action']) && $_POST['action'] == 'Save') {
           $price  = $_POST['newPrice'];
           $cake = $_POST['cake'];
           $type = $_POST['type'];
           $customerID = $_SESSION["Customer_ID"];
           $OriginalPriceOfCake;
           
            $customerName;
            $orderId;
            $productId;
            $sql = "SELECT * FROM  Customer";
            $result = mysqli_query($conn, $sql);
            if(mysqli_num_rows($result) >  0){
                while($row = mysqli_fetch_array($result)){
                    if($row['Customer_ID'] == $customerID){
                        $customerName = $row['FirstName'];
                    };
                };
            };

            $sql = "SELECT Product_ID, Description, Type, Price FROM Product";

            $result = mysqli_query($conn, $sql);

            if(mysqli_num_rows($result) > 0){
                while($row = mysqli_fetch_array($result)){
                    if($row['Description'] == $cake){
                        $productId = $row['Product_ID'];
                        $OriginalPriceOfCake = $row['Price'];
                    };
                };
            };
            $quantity = $price / $OriginalPriceOfCake;
            $savedOrderSql = "SELECT * FROM SavedOrders WHERE Customer_ID = $customerID AND Product_ID = $productId";
            $savedOrdersResult = mysqli_query($conn, $savedOrderSql);

            if(mysqli_num_rows($savedOrdersResult) > 0){
                $sameProduct = false;
                while($row = mysqli_fetch_array($savedOrdersResult)){
                    if($row['Customer_ID'] == $customerID && $row['Product_ID'] == $productId){
                        $newQuantity = $row['Quantity'] + $quantity;
                        $sql = mysqli_query($conn, "UPDATE SavedOrders SET Quantity = $newQuantity WHERE Product_ID = $productId") or die (mysqli_error($conn));
                        break;
                    }
                };
            }
            else{
                $sql = mysqli_query($conn, "INSERT INTO SavedOrders (Customer_ID, Product_ID , Quantity) 
                VALUES ('$customerID','$productId', $quantity)") or die (mysqli_error($conn));
            } 
            echo '<div style="font-size: 44px; color: white; margin-top: 2em">
            <i onclick="javascript:history.go(-2)" class="fa fa-arrow-circle-left"></i>
            </div>
            <img src="https://img.icons8.com/carbon-copy/100/000000/checked-checkbox.png" width="125" height="120" style="display: block; border: 0px; text-align:center;" />
            <h2> Saved Order summary! </h2>
            <p> Cake: ' .$_POST['cake']. ' </p>
        
            <p>Type: ' .$_POST['type']. ' </p>
            <p>Price: £' .$price. ' </p>';
        }
        else if(isset($_POST['action']) && $_POST['action'] == 'Checkout') { 
            //SAVE CART ITEMS INTO ORDER TABLE
            $quantity;
            $cartItemsSql = "SELECT * FROM CartItems";
            $cartItemsResult = mysqli_query($conn, $cartItemsSql);
            $OrderDate = date('Y-m-d'); 
            if(mysqli_num_rows($cartItemsResult) > 0){
                $differentProduct = false;
                $sameProduct = false;
                while($row = mysqli_fetch_array($cartItemsResult)){
                    $customerID = $row['Customer_ID'];
                    $productId = $row['Product_ID'];
                    $quantity = $row['Quantity'];
                    $totalPurchase = $row['Price'];
                    $ordersSql = "SELECT * FROM Orders";
                    $ordersResult = mysqli_query($conn, $ordersSql);
                    $final_price = $totalPurchase + ($totalPurchase * 0.1 + 10); //tax and shipping fees
                    $sql = mysqli_query($conn, "INSERT INTO Orders (OrderDate, Customer_ID, Product_ID , Price, Quantity, Final_Price, Status) 
                    VALUES ('$OrderDate','$customerID','$productId','$totalPurchase','$quantity','$final_price', 'Order Placed')") or die (mysqli_error($conn));
                    $sql = mysqli_query($conn, "DELETE FROM CartItems WHERE Customer_ID = '$customerID'");
                }
                header('Location: payments.php');
            }
            else{
                echo '<h1 style="margin-top:3em"> You have not saved anything in your cart! </h1>';
            }
            
        }
        else if(isset($_POST['action']) && $_POST['action'] == 'Pay'){
            header('Location: payments.php');
        }
        else if(isset($_POST['action']) && $_POST['action'] == 'Cancel'){
            $productIdToDelete = $_POST['product'];
            $orderSql = "SELECT * FROM Orders";
            $orderSqlResult = mysqli_query($conn, $orderSql);
            $sql = mysqli_query($conn, "DELETE FROM Orders WHERE Product_ID = '$productIdToDelete'");
            echo '<div style="font-size: 44px; color: white; margin-top: 2em">
                        <i onclick="javascript:history.go(-2)" class="fa fa-arrow-circle-left"></i>
                        </div>
                        <img src="https://img.icons8.com/carbon-copy/100/000000/checked-checkbox.png" width="125" height="120" style="display: block; border: 0px; text-align:center;" />
                        <h1> The Order for  ' .$productIdToDelete. ' </h1>';
        }
        else{
            $price  = $_POST['newPrice'];
            $cake = $_POST['cake'];
            $type = $_POST['type'];
            $customerID = $_SESSION["Customer_ID"];
            $sql = "SELECT * FROM  Customer";
            $result = mysqli_query($conn, $sql);
            if(mysqli_num_rows($result) >  0){
                while($row = mysqli_fetch_array($result)){
                    if($row['Customer_ID'] == $customerID){
                        $customerName = $row['FirstName'];
                    };
                };
            };

            $sql = "SELECT Product_ID, Description, Type, Quantity, Price FROM Product";

            $result = mysqli_query($conn, $sql);
            $stockQuantity = false;
            if(mysqli_num_rows($result) > 0){
                while($row = mysqli_fetch_array($result)){
                    if($row['Description'] == $cake){
                        $productId = $row['Product_ID'];
                        $OriginalPriceOfCake = $row['Price'];
                        $stockQuantity = $row['Quantity'];
                    }
                };
            };
            $quantity = $price / $OriginalPriceOfCake;
            //checks if there is stock!
            if($stockQuantity <= 0 || $stockQuantity < $quantity) { //error message for stock being less than 0 or less than the asked amount by the customer
                echo '<div style="font-size: 44px; color: white; margin-top: 2em">
                        <i onclick="javascript:history.go(-2)" class="fa fa-arrow-circle-left"></i>
                        </div>
                        <img src="https://img.icons8.com/carbon-copy/100/000000/checked-checkbox.png" width="125" height="120" style="display: block; border: 0px; text-align:center;" />
                        <h1> Sorry there is no stock for ' .$_POST['cake']. ' </h1>';
            }
            else {
                
                $cartItemsSql = "SELECT * FROM CartItems";
                $cartItemsResult = mysqli_query($conn, $cartItemsSql);
                if(mysqli_num_rows($cartItemsResult) > 0){
                    $differentProduct = false;
                    $sameProduct = false;
                    while($row = mysqli_fetch_array($cartItemsResult)){
    
                        if($row['Product_ID'] != $productId){
                            $flag = true;
                            $sameProduct = false;
                        }
                       else if($row['Product_ID'] == $productId and $row['Customer_ID'] == $customerID){
                            $sameProduct = true;
                            $newQuantity = $row['Quantity'] + $quantity;
                            $newPrice = $row['Price'] + ($quantity * $OriginalPriceOfCake);
                            $sql = mysqli_query($conn, "UPDATE CartItems SET Quantity = $newQuantity, Price = $newPrice WHERE Product_ID = $productId") or die (mysqli_error($conn));
                            echo '<div style="font-size: 44px; color: white; margin-top: 2em">
                            <i onclick="javascript:history.go(-2)" class="fa fa-arrow-circle-left"></i>
                            </div>
                            <img src="https://img.icons8.com/carbon-copy/100/000000/checked-checkbox.png" width="125" height="120" style="display: block; border: 0px; text-align:center;" />
                            <h1> ' .$_POST['cake']. ' has been updated in your cart! </h1>
                            <h2> Order summary! </h2>
                            <p> Cake: ' .$_POST['cake']. ' </p>
                        
                            <p>Type: ' .$_POST['type']. ' </p>
                            <p>Price: £' .$newPrice. ' </p>';
                        break;
                       }
                    };
                    if(!$sameProduct){
                        $sql = mysqli_query($conn, "INSERT INTO CartItems (Customer_ID, Product_ID , Quantity, Price) 
                        VALUES ('$customerID','$productId','$quantity','$price')") or die (mysqli_error($conn));
                        echo '<div style="font-size: 44px; color: white; margin-top: 2em">
                        <i onclick="javascript:history.go(-2)" class="fa fa-arrow-circle-left"></i>
                        </div>
                        <img src="https://img.icons8.com/carbon-copy/100/000000/checked-checkbox.png" width="125" height="120" style="display: block; border: 0px; text-align:center;" />
                        <h1> ' .$_POST['cake']. ' has been added to your cart! </h1>
                        <p> Cake: ' .$_POST['cake']. ' </p>
                    
                        <p>Type: ' .$_POST['type']. ' </p>
                        <p>Price: £' .$_POST['newPrice']. ' </p>';
                    }
                } else{
                    $sql = mysqli_query($conn, "INSERT INTO CartItems (Customer_ID, Product_ID , Quantity, Price) 
                        VALUES ('$customerID','$productId','$quantity','$price')") or die (mysqli_error($conn));
                    echo '<div style="font-size: 44px; color: white; margin-top: 2em">
                    <i onclick="javascript:history.go(-2)" class="fa fa-arrow-circle-left"></i>
                  </div>
                  <img src="https://img.icons8.com/carbon-copy/100/000000/checked-checkbox.png" width="125" height="120" style="display: block; border: 0px; text-align:center;" />
                  <h1> ' .$_POST['cake']. ' has been added to your cart! </h1>
                  <p> Cake: ' .$_POST['cake']. ' </p>
            
                  <p>Type: ' .$_POST['type']. ' </p>
                  <p>Price: £' .$_POST['newPrice']. ' </p>';
                }
            }
            
        }
        
    ?>
    
</body>
</html>