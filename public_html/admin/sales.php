<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../css/chart.css" /> 
    <link rel="stylesheet" type="text/css" href="../css/button.css" /> 
    <link rel="stylesheet" type="text/css" href="//cdnjs.cloudflare.com/ajax/libs/semantic-ui/1.12.0/semantic.min.css">
    <title>Sales</title>
</head>
<body>
    <?php
        session_start();
        include "adminheader.php";
        include "../connection.php";
        if(!isset($_SESSION['Staff_ID'])){
            header("Location:../entrance/index.php");
        }
        if(isset($_SESSION['Customer_ID'])){
            header("Location:../home/home.php");
        }
        //store associative array for cakes
        $cakes;
        //only getting orders that are dispatched because they have been paid
        $orderSql = "SELECT Product_ID, Quantity, Price, Final_Price FROM Orders WHERE Status = 'Dispatched'"; 
        $orderResult = mysqli_query($conn, $orderSql);
        $totalSales = 0;
        $totalProfit = 0;
        $totalOriginalPrice = 0;
        $totalQuantity = 0;
        if(mysqli_num_rows($orderResult) > 0){
            
            while($order_row = mysqli_fetch_array($orderResult)){
                $totalSales += $order_row['Price'];
                $totalQuantity += $order_row['Quantity'];
                $productSql = "SELECT *  FROM Product";
                $productResult = mysqli_query($conn, $productSql);
                if(mysqli_num_rows($productResult) > 0){
                    while($product_row = mysqli_fetch_array($productResult)){
                        if($order_row['Product_ID'] ==  $product_row['Product_ID'] && $product_row['Quantity'] != 0){
                            $currentPrice = ($order_row['Price'] / $order_row['Quantity'])- $product_row['Cost']; //deduct cost of cake
                            $totalOriginalPrice += $currentPrice;
                            $cakes[$product_row['Description']] = $order_row['Quantity'];
                        }
                    }
                }
                $totalOriginalPrice *= $order_row['Quantity'];
            } 
        }
        $salesArray = json_encode($cakes);
        $totalProfit = ($totalOriginalPrice * $totalQuantity);
    ?>
    <script src="https://www.amcharts.com/lib/4/core.js"></script>
    <script src="https://www.amcharts.com/lib/4/charts.js"></script>
    <script src="https://www.amcharts.com/lib/4/themes/animated.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.4/jspdf.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <h1 style="margin-top: 3em;"> Sales Chart </h1>
    <form class="sales_form">
        <div id="sales-chart"></div>
        <div> Total sales made: £ <?php echo $totalSales ?> </div>
        <div> Total profit made: £ <?php echo $totalOriginalPrice ?> </div>
    </form>
    <div onclick="createSalesPDF()" class="ui button aligned center black" id="sales_pdf"> Export to PDF </div>
    <script>


        
       am4core.useTheme(am4themes_animated);

        var salesChart = am4core.create("sales-chart", am4charts.PieChart);
        
        var salesArr = <?php echo $salesArray; ?>;
        var totalSales = <?php echo $totalSales; ?>;
        var totalProfit = <?php echo $totalProfit; ?>;
        for(const [cake, sold] of Object.entries(salesArr)){
            salesChart.data.push({"cake": cake, "sales": sold})
        }

        var cakeSeries = salesChart.series.push(new am4charts.PieSeries());
        cakeSeries.dataFields.value = "sales";
        cakeSeries.dataFields.category = "cake";
        cakeSeries.slices.template.stroke = am4core.color("blue");
        cakeSeries.slices.template.strokeWidth = 2;
        cakeSeries.slices.template.strokeOpacity = 1;

        cakeSeries.hiddenState.properties.opacity = 1;
        cakeSeries.hiddenState.properties.endAngle = -90;
        cakeSeries.hiddenState.properties.startAngle = -90;


        function createSalesPDF(){
            var document = new jsPDF();
            for(const [cake, sold] of Object.entries(salesArr)){
                document.text(cake, 10, 10);
                document.text(sold, 10, 20);
            }
            document.text(totalSales.toString(), 10, 30);
            document.text(totalProfit.toString(), 10, 40);
            document.save('sales.pdf');
        };

    </script>
</body>
</html>