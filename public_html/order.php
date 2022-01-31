<?php
    session_start();
    include "afterheader.php";
    include "connection.php";

    if( isset($_REQUEST['Order_ID']) ){
        $Order_ID = $_REQUEST['Order_ID'];
    }else if(isset($_REQUEST['Description']){
        $Description = $_REQUEST['Description'];
    }
    else if(isset($_REQUEST['Quantity']){
        $Quantity = $_REQUEST['Quantity'];
    }
    else{
        $Order_ID = '';
        $Quantity = '';
        $Description = '';
    }
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=">
        <title>Order</title>
    </head>
    <body>
        <h1>Make An Order</h1>

        <form method="POST" action="orderscript.php?Order_ID=<?php echo $Order_ID; ?>?Description=<?php echo $Description ?>?Quantity=<?php echo $Quantity ?>">
            <table border="1">
                <thead>
                    <tr>
                        <th>Cake</th>
                        <th>Quantity</th>
                        <th>Price</th>
                        <th>Total</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    
                    <td colspan="2">
                        <select name="Description">
                            <option selected disabled>Choose a cake</option>
                            <?php
                                $sql = "SELECT Description, Type, Product_ID FROM Product";

                                $result = mysqli_query($conn, $sql);

                                if(mysqli_num_rows($result) > 0){
                                    while($row = mysqli_fetch_array($result)){
                                        echo "<option value='" .$row['Product_ID']. "'>" .$row['Description']. " (".$row['Type'].")";
                                    }
                                }else{
                                    echo "<option disabled>No cake found</option>";
                                }
                            ?>
                        </select>
                    </td>
                    <td colspan="2">
                        <input type="number" min="1" name="quantity"/> 
                    </td>
                    <td>
                        <input type="submit" value="Add"/>
                    </td>
                </tbody>
            </table>
        </form>
    </body>
</html>