<?php
    session_start();

    include "afterheader.php";

    require_once('connection.php');

    $today = date("Y-m-d");

    $Description = isset($_POST['Description']);
    $Quantity = isset($_POST['Quantity']);

    $Customer_ID = $_SESSION['Customer_ID'];

    if( isset($_REQUEST['Order_ID']) && $_REQUEST['Order_ID'] == '' )
    {
        
        $sql = "INSERT INTO Orders(Customer_ID, OrderDate) VALUES(" .$Customer_ID. ", '" .$today. "')";
        
        if(mysqli_query($conn, $sql)){
            $Order_ID = mysqli_insert_id($conn);

            $sql = "INSERT INTO Orders2(Order_ID, Product_ID, Quantity) VALUES(" .$Order_ID. ", " .$Description. ", " .$Quantity. ")";
            
            if(mysqli_query($conn, $sql)){
                echo "<script>window.location = 'order.php?Order_ID=" .$Order_ID. "';</script>";
            }
            else{
                 echo "ERROR: " . mysqli_error($conn);
            }
            else{
                echo "ERROR: " . mysqli_error($conn);
            }

    }else{
        $Order_ID = $_REQUEST['Order_ID'];

        $sql = "INSERT INTO Orders2(Order_ID, Product_ID, Quantity) VALUES(" .$Order_ID. ", " .$Description. ", " .$Quantity. ")";

        if(mysqli_query($conn, $sql)){
            echo "<script>window.location = 'order.php?Order_ID=" .$Order_ID. "';</script>";
        }
        else{
             echo "ERROR: " . mysqli_error($conn);
        }
    }


?>