<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../css/info.css" /> 
    <title>Reviews Recieved</title>
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
    <style>
        body {
            background-color: rgb(95,95,95);
        }

        table {
            border: 1px solid #ccc;
            border-collapse: collapse;
            margin: 0;
            margin-top: 5em;
            padding: 4rem;
            width: 100%;
            table-layout: fixed;
        }
        
        table caption {
            font-size: 1.5em;
            margin: .5em 0 .75em;
        }
        
        table tr {
            background-color: rgb(95,95,95);
            border: 1px solid #ddd;
            padding: .35em;
            color: white;
            font-family: Poppins;
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
    <table>
        <caption>Reviews Received</caption>
        <thead>
            <tr>
            <th scope="col">Review</th>
            <th scope="col">Name</th>
            <th scope="col">Stars</th>
            <th scope="col">Description</th>
            </tr>
        </thead>
        <tbody>
                <?php 
                    $sql = "SELECT * FROM Reviews";
                    $result = mysqli_query($conn, $sql);
                    if(mysqli_num_rows($result) > 0){
                        while($row = mysqli_fetch_array($result)){
                            echo "<tr>";
                            echo "<td value='" .$row['Review_ID']. "'>" .$row['Review_ID']. "</td>";
                            echo "<td value='" .$row['Review_ID']. "'>" .$row['Name']. "</td>";
                            echo "<td value='" .$row['Review_ID']. "'>" .$row['Stars']. "</td>";
                            echo "<td value='" .$row['Review_ID']. "'>" .$row['Description']. "</td>";
                            echo "</tr>";
                        };
                    };
                ?>
        </tbody>
    </table>
</body>
</html>

</body>
</html>