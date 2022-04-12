<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../css/info.css" /> 
    <link rel="stylesheet" type="text/css" href="../css/table.css" />
    <link rel="stylesheet" type="text/css" href="../css/button.css" />
    <title>Saved Item</title>
    <style>

    body {
        background-color: rgb(95, 95, 95);
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
        $cakeName;
        $customerId = ($_SESSION["Customer_ID"]);
        $customerName;
        $cake;
        $priceOfCake;
        $typeOfCake;
        $orderId;
        $productId;
        $description;
        $newPrice;
        $sql = "SELECT * FROM  Customer";
        $result = mysqli_query($conn, $sql);
        if(mysqli_num_rows($result) >  0){
            while($row = mysqli_fetch_array($result)){
                if($row['Customer_ID'] == $customerId){
                    $customerName = $row['FirstName']; 
                };
            };
        };

        
        
    ?> 
    <table> 
        <caption> <?php echo $customerName ?>'s Saved Orders</caption>
        <thead>
            <tr>
            <th scope="col">Cake</th>
            <th scope="col">Type of cake</th>
            <th scope="col">Original Price</th>
            <th scope="col">Your purchase</th>
            <th scope="col">Amount purchased</th>
            <th scope="col">Add to cart</th>
            </tr>
        </thead>
        <tbody>
            <?php
                $savedOrderSql = "SELECT * FROM SavedOrders";
                $savedOrdersResult = mysqli_query($conn, $savedOrderSql);
        
                if(mysqli_num_rows($savedOrdersResult) > 0){
                    while($row = mysqli_fetch_array($savedOrdersResult)){
                        if($row['Customer_ID'] == $customerId){
                            $totalPurchase = $row['Quantity'];
                            $productId = $row['Product_ID'];
                            $sql = "SELECT Product_ID, Description, Type, Price FROM Product";
        
                            $productResult = mysqli_query($conn, $sql);
                    
                            if(mysqli_num_rows($productResult) > 0){
                                while($row = mysqli_fetch_array($productResult)){
                                    if($row['Product_ID'] == $productId){
                                        $description = $row['Description'];
                                        $typeOfCake = $row['Type'];
                                        $priceOfCake = $row['Price'];
                                    };
                                };
                            };
                            $newPrice = $priceOfCake * $totalPurchase;
                            if($newPrice == 0) {
                                $newPrice = $priceOfCake;
                                $totalPurchase = 1;
                            }
                            echo "<form id=\"saved-form\" action=\"order-confirmation.php\" method=\"POST\">";
                            echo "<tr>";
                            echo "<td name=\"cake\" value='" .$description. "'><input type=\"hidden\" name=\"cake\" value='" .$description. "'>" .$description.  "</td>";
                            echo "<td name=\"type\" value='" .$typeOfCake. "'><input type=\"hidden\" name=\"type\" value='" .$typeOfCake. "'>" .$typeOfCake.  "</td>";
                            echo "<td name=\"cake\" value='" .$priceOfCake. "'>£ " .$priceOfCake.  "</td>";
                            echo "<td name=\"newPrice\" value='" .$newPrice. "'><input type=\"hidden\" name=\"newPrice\" value='" .$newPrice. "'>£ " .$newPrice.  "</td>";
                            echo "<td value='" .$totalPurchase. "'>" .$totalPurchase.  "</td>";
                            echo "<td><input type=\"submit\" style=\"display:block;\" class=\"checkout\" id=\"submit-button\" type=\"submit\" name=\"order\" value=\"Add to cart\" /></td>";
                            echo "</tr>";
                            echo "</form>";
                        };
                    };
                };
            ?>
        
        </tbody>
    </table>
    </form>
    <form action="customerorders.php" method="POST">
            <input type="submit" name="action"  class="savedOrderCheckout" value="Your Orders" />
    </form>
</body>
</html>