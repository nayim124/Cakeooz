<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://code.ionicframework.com/1.0.0-beta.1/css/ionic.min.css" rel="stylesheet">
    <script src="https://code.ionicframework.com/1.0.0-beta.1/js/ionic.bundle.min.js"></script>
    <link rel="stylesheet" href="../css/payments.css" />
    <title>Payments Page</title>
    <style lang="scss">
       
    </style>
</head>
<body>
    <?php   
        session_start();
        include "../connection.php";
        if(!isset($_SESSION["Customer_ID"])) {
            header("Location:../entrance/login.php");
        };
        $totalPurchase;
        $customer_ID;
        $order_status = 'placed';
        $ordersSql = "SELECT * FROM Orders WHERE Status != 'Dispatched'";
        $ordersResult = mysqli_query($conn, $ordersSql);
        $order_Number = rand(10, 1000);
        $date = date("jS F Y");
        $quantity;
        if(mysqli_num_rows($ordersResult) > 0){
            while($row = mysqli_fetch_array($ordersResult)){
                $customer_ID = $row['Customer_ID'];
                $productSql = "SELECT * FROM Product";
                $productResult = mysqli_query($conn, $productSql);
                if(mysqli_num_rows($productResult) > 0){
                    while($product_row = mysqli_fetch_array($productResult)){
                        if($product_row['Product_ID'] == $row['Product_ID']){
                            $quantity = $product_row['Quantity'] - $row['Quantity']; //stock is updated
                            if($quantity < 0){
                                $quantity = 0;
                            }
                            $productId = $row['Product_ID'];
                            //update the quantiy of the product in the product table
                            $sql = mysqli_query($conn, "UPDATE Product SET Quantity = $quantity WHERE Product_ID = $productId") or die (mysqli_error($conn));
                        }
                    }
                }
            };
            $sql = mysqli_query($conn, "UPDATE Orders SET Status = 'Dispatched' WHERE Customer_ID = $customer_ID") or die (mysqli_error($conn));
            //ADD DATE TO THE PAGE AND ADD ICON DISPATCH
        };
    ?>
    <ion-pane>
        <ion-header-bar class="bar bar-header bar-stable" style="background-color: rgb(95,95,95);">
            <div class="buttons">
                <button  onclick="javascript:history.go(-5)" class="button icon-left ion-ios7-arrow-back button-clear button-light ion-myclass"></button>
            </div>
            <h1 class="title" style="color: white; font-size: 2em"> Hi <? echo $_SESSION["FirstName"]; ?>, Your order has been dispatched </h1>
        </ion-header-bar>
        <a href="https://icons8.com/icon/7493/in-transit"></a>
    </ion-pane>
    

    <div class="dispatched-container">
        <div class="row">
            <div class="col-12 col-md-10 dispatched-box box">
           
                <div class="row justify-content-between">
                    <div class="dispatched-tracking completed">
                         <span class="is-complete"></span>
                         <p> Order Placed<br><span><?php echo $date ?></span></p>
                    </div>
                    <div class="dispatched-tracking">
                         <span class="is-complete"></span>
                         <p> Dispatched<br><span>pending...</span></p>
                    </div>
                    <div class="dispatched-tracking">
                         <span class="is-complete"></span>
                         <p> Delivered<br><span>pending...</span></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>