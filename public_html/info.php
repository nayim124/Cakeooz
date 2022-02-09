<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="css/info.css" /> 
    <title>Info Page</title>
    <style>
        table {
            border: 1px solid #ccc;
            border-collapse: collapse;
            margin: 0;
            padding: 0;
            width: 100%;
            table-layout: fixed;
        }
        
        table caption {
            font-size: 1.5em;
            margin: .5em 0 .75em;
        }
        
        table tr {
            background-color: #f8f8f8;
            border: 1px solid #ddd;
            padding: .35em;
        }
        
        table th,
        table td {
            padding: .625em;
            text-align: center;
        }
        
        table th {
            font-size: .85em;
            letter-spacing: .1em;
            text-transform: uppercase;
        }
        
        @media screen and (max-width: 600px) {
            table {
            border: 0;
            }
        
            table caption {
            font-size: 1.3em;
            }
            
            table thead {
            border: none;
            clip: rect(0 0 0 0);
            height: 1px;
            margin: -1px;
            overflow: hidden;
            padding: 0;
            position: absolute;
            width: 1px;
            }
            
            table tr {
            border-bottom: 3px solid #ddd;
            display: block;
            margin-bottom: .625em;
            }
            
            table td {
            border-bottom: 1px solid #ddd;
            display: block;
            font-size: .8em;
            text-align: right;
            }
            
            table td::before {
            content: attr(data-label);
            float: left;
            font-weight: bold;
            text-transform: uppercase;
            }
            
            table td:last-child {
            border-bottom: 0;
            }
        }

</style>
</head>
<body>
    <?php
        session_start();
        include "afterheader.php";
        include "connection.php";
    ?>
    <?php
        $_SESSION['name'] = ($_POST['baby-shower-delight']);
        $typeOfCake;
        $priceOfCake;
        $sql = "SELECT Description, Type, Price FROM Product";

        $result = mysqli_query($conn, $sql);

        if(mysqli_num_rows($result) > 0){
            while($row = mysqli_fetch_array($result)){
                if($row['Description'] == $_SESSION['name']){
                    $typeOfCake = $row['Type'];
                    $priceOfCake = $row['Price'];
                };
            };
        };
    ?>
    <img src="./menuImages/RoyalDelights/crown-ooz.png" id="minion-ooz" alt="minion-ooz"/>
    <table>
        <caption>Information about <?php echo $_SESSION['name'] ?></caption>
        <thead>
            <tr>
            <th scope="col">Cake</th>
            <th scope="col">Type</th>
            <th scope="col">Price</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td data-label="Cake"><?php echo $_SESSION['name'] ?></td>
                <td data-label="Type"><?php echo $typeOfCake ?></td>
                <td data-label="Price"><?php echo $priceOfCake ?></td>
            </tr>
        </tbody>
    </table>
</body>
</html>