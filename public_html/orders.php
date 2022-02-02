<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/info.css" /> 
    <title>Orders Recieved</title>
</head>
<body>
    <?php
        session_start();
        include "adminheader.php";
        include "connection.php";
        if(!isset($_SESSION["Staff_ID"])) {
        header("Location:index.php");
        };
    ?> 
    <table>
        <caption>Information about Orders</caption>
        <thead>
            <tr>
            <th scope="col">Order</th>
            <th scope="col">Customer ID</th>
            <th scope="col">First Name</th>
            <th scope="col">Description</th>
            <th scope="col">Quantity</th>
            <th scope="col">Order Date</th>
            <th scope="col">Status</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <?php 
                    $sql = "SELECT * 
                    FROM Product, Customer, Orders
                    WHERE Product.Product_ID = Orders.Product_ID AND
                    Customer.Customer_ID = Orders.Customer_ID";
                    $result = mysqli_query($conn, $sql);
                    if(mysqli_num_rows($result) > 0){
                        while($row = mysqli_fetch_array($result)){
                            echo "<td value='" .$row['Order_ID']. "'>" .$row['Order_ID']. "</td>";
                            echo "<td value='" .$row['Order_ID']. "'>" .$row['Customer_ID']. "</td>";
                            echo "<td value='" .$row['Order_ID']. "'>" .$row['FirstName']. "</td>";
                            echo "<td value='" .$row['Order_ID']. "'>" .$row['Description']. "</td>";
                            echo "<td value='" .$row['Order_ID']. "'>" .$row['Quantity']. "</td>";
                            echo "<td value='" .$row['Order_ID']. "'>" .$row['OrderDate']. "</td>";
                            echo "<td value='" .$row['Order_ID']. "'>" .$row['Status']. "</td>";
                        };
                    };
                ?>
            </tr>
        </tbody>
    </table>
</body>
</html>