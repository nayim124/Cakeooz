<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://code.ionicframework.com/1.0.0-beta.1/css/ionic.min.css" rel="stylesheet">
    <script src="https://code.ionicframework.com/1.0.0-beta.1/js/ionic.bundle.min.js"></script>
    <title>Payments Page</title>
    <style lang="scss">
       body {
            background-color: rgb(95,95,95);
            
        } 
        
        .payment-confirmation {
            text-align: center;
            color: white;
            display: none;
            font-size: 1.5em;
            margin-top: 15rem;
            margin-left: 15rem;
            text-transform: uppercase;
        }
        .list {
            background-color: rgb(95,95,95);
        }
    </style>
</head>
<body>
    <?php   
        session_start();
        include "../connection.php";
        if(!isset($_SESSION["Customer_ID"])) {
            header("Location:../entrance/login.php");
        };
        $customer_ID;
        
        $customerSql = "SELECT * FROM Customer";
        $customerResult = mysqli_query($conn, $customerSql);
        if(mysqli_num_rows($customerResult) > 0){
            echo "YES";
            while($row = mysqli_fetch_array($customerResult)){
                if($row['FirstName'] === $_SESSION["FirstName"] ){
                    $customer_ID = $row['Customer_ID'];
                }
            }
        }
        
        $totalPurchase;
        $order_status = 'placed';
        $ordersSql = "SELECT * FROM Orders WHERE Customer_ID = $customer_ID AND Status != 'Dispatched'";
        $ordersResult = mysqli_query($conn, $ordersSql);
        $order_Number = rand(10, 1000);
        if(mysqli_num_rows($ordersResult) > 0){
            $price;
            while($row = mysqli_fetch_array($ordersResult)){
                $price += $row['Final_Price']; //only calculate the price of the order placed items
                $customer_ID = $row['Customer_ID'];
            };
            $totalPurchase = $price;
        };

        $totalPurchaseWithTax = $totalPurchase + ($totalPurchase * 0.1 + 10);
    ?>
   <ion-pane>
        <ion-header-bar class="bar bar-header bar-stable" style="background-color: rgb(95,95,95);">
            <div class="buttons">
                <button  onclick="javascript:history.go(-5)" class="button icon-left ion-ios7-arrow-back button-clear button-light ion-myclass"></button>
            </div>
            <h1 class="title" style="color: white; font-size: 2em"> <? echo $_SESSION["FirstName"]; ?> Please complete your payment </h1>
        </ion-header-bar>
        <ion-content header-shrink scroll-event-interval="5" style="margin-top: 10rem">
            <h4 style="padding: 0.5em; color:white;"> Credit Card details </h4>
            <div class="list" style="background-color: rgb(95,95,95);">
                <label class="item item-input">
                    <i class="ion-ios7-person" style="padding-right:0.5em;"></i>
                    <input type="text" placeholder="Full Name"/>
                </label>
                <label class="item item-input">
                    <i class="icon ion-card" style="padding-right:0.5em;"></i>
                    <input id="card_number" type="text" onKeyDown="if(this.value.length==16 && event.keyCode!=8) return false;" placeholder="Card Number" required/>
                </label>
                <div class="row" style="padding:0;">
                    <div class="col" style="padding:0;">
                        <label class="item item-input">
                            <input type="text" id="expiry_date" placeholder="Expiry Date"/>
                        </label>
                    </div>
                    <div class="col" style="padding:0;">
                        <label class="item item-input">
                            <input type="text" id="cvv"  onKeyDown="if(this.value.length==3 && event.keyCode!=8) return false;"  placeholder="CVV"/>
                        </label>
                    </div>
                </div>
                <div id="confirm" class="payment-confirmation">
                    Thank you! <? echo $_SESSION["FirstName"]; ?> you have successfully made a payment <br /> <br />
                    Your Order has been placed <br /> <br />
                    Your Order number is <span style="color: green; font-weight: bold; font-size: 1.7em"><? echo $order_Number; ?> </span> <br /> <br />
                    <b><span id="time" style="background-color:red;"></span>
                </div>
            </div>
        </ion-content>
        <div class="bar bar-footer my-foter bar-positive" onclick="payment()" value="Pay Now!">
            <div class="title" style="font-size:120%; font-weight:bold; text-align: center;">
                Pay Now £<?php echo $totalPurchaseWithTax ?>
            </div>
        </div>

        <script>
            var timeoutHandle = null;
            function payment() {
                var error_message_payment;
                var error_message_date;
                error_message_payment = validatePayment();
                error_message_date = validateDate();
                if( error_message_payment != ""){
                    alert(error_message_payment);
                    event.preventDefault();
                }
                else if(error_message_date != ""){
                    alert(error_message_date);
                    event.preventDefault();
                }
                else{
                    var confirmation = document.getElementById("confirm");
                    confirmation.style.display = "inline-block";
                    startTimer(5);
                }
            }
            function validatePayment(){
                var card_number  = document.getElementById("card_number");
                var card_cvv  = document.getElementById("cvv");
                var error = "";

                if(card_number.value.length == 0 || card_cvv.value.length == 0){
                    error =  "Please enter the correct card details";
                }
                return error;
                
            }
            function validateDate(){
                var error = "";
                var payment_format = /\d{2}\/\d{2}/;

                var expiry_date = document.getElementById("expiry_date");
                if(expiry_date.value.length == 0){
                    error = "Please enter a valid date";
                }
                else if(!(expiry_date.value.match(payment_format))) {
                    error = "Please enter a correct expiry date format of 'MM/YY' \n";
                }
                return error;
            }
            //set a timer to redirect customer to the home page
            function startTimer(timeoutCount) {
                if(timeoutCount == 0){
                    window.location.href="order-placed.php";
                }
                else if(timeoutCount < 5) {
                    document.getElementById('time').innerHTML = 'You have ' + (timeoutCount * 5000)/1000 + ' seconds until you are redirected';
                }
                timeoutHandle = setTimeout(function () { startTimer(timeoutCount-1);}, '5000');
            }

        </script>
    </ion-pane>
</body>
</html>