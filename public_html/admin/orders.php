<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="../css/table.css" /> 
    <link rel="stylesheet" type="text/css" href="../css/adminOrders.css" /> 
    <link rel="stylesheet" type="text/css" href="../css/button.css" />
    <title>Orders Recieved</title>
    <style>
        body {
            background-color: rgb(95,95,95);
        }
        #search_input {
            background-color: transparent;
            font-size: 1.5em;
            padding: 12px 20px 12px 40px;
            border: 1px solid #DDD;
            margin-top: 5rem;
            margin-left: 15rem;
            display: flex;
            position: relative;
            color: white;
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
    ?> 
    <input type="text" id="search_input" onkeyup="search()" placeholder="Search for an order..." title="Type in a order" />

    <table id="search_table">
        <caption>Orders Received</caption>
        <thead>
            <tr>
            <th scope="col">Order</th>
            <th scope="col">Customer ID</th>
            <th scope="col">First Name</th>
            <th scope="col">Description</th>
            <th scope="col">Quantity</th>
            <th scope="col">Order Date</th>
            <th scope="col">Status</th>
            <th scope="col">Cancel Order</th>
            </tr>
        </thead>
        <tbody>
                <?php 
                    $sql = "SELECT * 
                    FROM Product, Customer, Orders
                    WHERE Product.Product_ID = Orders.Product_ID AND
                    Customer.Customer_ID = Orders.Customer_ID";
                    $result = mysqli_query($conn, $sql);
                    if(mysqli_num_rows($result) > 0){
                        while($row = mysqli_fetch_array($result)){
                            $productId = $row['Product_ID'];
                            echo "<tr>";
                            echo "<td value='" .$row['Order_ID']. "'>" .$row['Order_ID']. "</td>";
                            echo "<td value='" .$row['Order_ID']. "'>" .$row['Customer_ID']. "</td>";
                            echo "<td value='" .$row['Order_ID']. "'>" .$row['FirstName']. "</td>";
                            echo "<td value='" .$row['Order_ID']. "'>" .$row['Description']. "</td>";
                            echo "<td value='" .$row['Order_ID']. "'>" .$row['Quantity']. "</td>";
                            echo "<td value='" .$row['Order_ID']. "'>" .$row['OrderDate']. "</td>";
                            echo "<td value='" .$row['Order_ID']. "'>" .$row['Status']. "</td>";
                            echo "<td><form action='../home/order-confirmation.php' method='POST'> <input type='submit' name='action'  class='checkout' value='Cancel' /><input name=\"product\" hidden value='" .$productId. "' /></form></td>";
                            echo "</tr>";
                        };
                    };
                ?>
        </tbody>
    </table>
    <input style="display:none;" id="save-status" type="submit" id="order" class="status-button" name="action" value="Submit New Changes" />
    <script>
        function onSelectChange(event) {
            console.log(event.value);
            var submitChange = document.getElementById("save-status");
            submitChange.style.display = "inline-block";
        }

        function search() {
            var input, filter, table, tr, td, i, search_value;
            input = document.getElementById("search_input");
            filter = input.value.toUpperCase();
            table = document.getElementById("search_table");
            tr = document.getElementsByTagName("tr");

            for(i = 0; i < tr.length; i++) {
                td = tr[i].getElementsByTagName("td")[0];

                if(td){
                    search_value = td.textContent || td.innerText;
                    if(search_value.toUpperCase().indexOf(filter) > -1){
                        tr[i].style.display = "";
                    }
                    else{
                        tr[i].style.display = "none";
                    }
                }
            }
            
        
        }
    </script>
</body>
</html>

