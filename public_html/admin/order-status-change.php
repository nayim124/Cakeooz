<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../css/table.css" /> 
    <link rel="stylesheet" type="text/css" href="../css/adminOrders.css" /> 
    <title>Orders Recieved</title>
    <style>
        body {
            background-color: rgb(95,95,95);
        }
        

    </style>
</head>
<body>
    <?php
        session_start();
        include "adminheader.php";
        include "../connection.php";
        if(!isset($_SESSION["Staff_ID"])) {
        header("Location:../entrance/login.php");
        };

        if(isset($_POST['action']) && $_POST['action'] == 'Submit New Changes') {
            echo $_POST['Status'][0];
            echo $_POST['Status'][1];
            echo $_POST['Status'][2];
            echo $_POST['Status'][3];
            // foreach ($_POST['Status']  as $status){
            //     echo $status;
            // }
            $ordersSql = "SELECT * FROM Orders";
            $ordersResult = mysqli_query($conn, $ordersSql);

            if(mysqli_num_rows($ordersResult) > 0){
                while($row = mysqli_fetch_array($ordersResult) && ($_POST['Status'] as $status)){
                    // foreach ($_POST['Status']  as $status){
                    //     echo $status;
                    // }
                    $sql = mysqli_query($conn, "UPDATE Orders SET Status = $status WHERE") or die (mysqli_error($conn));
                    
                };
            };
            header("orders.php");
        }
    ?> 
    
</body>
</html>

