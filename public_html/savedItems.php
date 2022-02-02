<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/info.css" /> 
    <title>Saved Item</title>
</head>
<body>
    <?php
        session_start();
        include "afterheader.php";
        include "connection.php";
    ?>
    <?php
        $cakeName = ($_GET['id']);
        $customerId = ($_GET['name']);
        $customerName;
        $cake;
        $priceOfCake;
        $typeOfCake;
        $orderId;
        $productId;
        $sql = "SELECT * FROM  Customer";
        $result = mysqli_query($conn, $sql);
        if(mysqli_num_rows($result) >  0){
            while($row = mysqli_fetch_array($result)){
                if($row['Customer_ID'] == $customerId){
                    $customerName = $row['FirstName'];
                };
            };
        };

        $sql = "SELECT Product_ID, Description, Type, Price FROM Product";

        $result = mysqli_query($conn, $sql);

        if(mysqli_num_rows($result) > 0){
            while($row = mysqli_fetch_array($result)){
                if($row['Description'] == $cakeName){
                    $productId = $row['Product_ID'];
                    $typeOfCake = $row['Type'];
                    $priceOfCake = $row['Price'];
                };
            };
        };
        $savedOrderSql = "SELECT * FROM SavedOrders";
        $savedOrdersResult = mysqli_query($conn, $savedOrderSql);

        if(mysqli_num_rows($savedOrdersResult) > 0){
            while($row = mysqli_fetch_array($savedOrdersResult)){
                if($row['Product_ID'] == $productId and $row['Customer_ID'] == $customerId){
                    $count = $row['Quantity'];
                    $sql2 = mysqli_query($conn, "UPDATE SavedOrders SET Quantity='$count'+1 WHERE Product_ID='$productId' AND Customer_ID = '$customerId' ") or die (mysqli_error($conn));
                }
                else if($row['Customer_ID'] == $customerId){
                    // $sql = mysqli_query($conn, "INSERT INTO SavedOrders (Customer_ID, Product_ID , Quantity) 
                    // VALUES ('$customerId','$productId', 1)") or die (mysqli_error($conn));
                    $sql = mysqli_query($conn, "INSERT INTO SavedOrders (Customer_ID, Product_ID) SELECT DISTINCT Product_ID FROM Product AND VALUES('$customerId','$productId', 1) ");
                };
            };
        };
    ?> 
    <table>
        <caption> <?php echo $customerName ?>'s Orders</caption>
        <thead>
            <tr>
            <th scope="col">Cake</th>
            <th scope="col">Price</th>
            <th scope="col">Type</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                
                <tr>
                    <?php

                        
                    ?>
                </tr>
 
            </tr>
        </tbody>
    </table>
</body>
</html>