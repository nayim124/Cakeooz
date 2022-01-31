<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Cart</title>
</head>
<?php
include "afterheader.php";
?>
<body>
<?php
session_start();
$message="";
#checks if form has been submitted
if(count($_POST)>0) {
  #connects page to database
  include 'connection.php';

  #collects data from form
  $Quantity = $_POST['Quantity'];
  $Product = $_POST['Product'];

  #Collects product quantity from table
  $Check = mysqli_query($conn, "SELECT * FROM Product WHERE Product_ID='".$Product."'") or die(mysqli_error($conn));
  $QuantityCheck  = mysqli_fetch_array($Check);
	
  #validates all values in the form
  if (($Quantity == "") or ($Product == "")){
	$message = "Please fill in all of the fields";
}
  #Checks that product is in stock
  else if($QuantityCheck["Quantity"] - $Quantity < 0){
  	$message= "We do not have this many in stock";
}
  else{
    #gets price for selected package in the package table
    $select = mysqli_query($conn, "SELECT * FROM Product WHERE Product_ID='".$Product."'") or die(mysqli_error($conn));
    $Package = mysqli_fetch_array($select);
  
    #calculates estimated price and gets date
    $Price = $Package["Price"]*$Quantity;
  	$Date = date("1","2");

    #saves Order to database
    $Customer_ID = $_SESSION["Customer_ID"];
    $OrderDate = date("Y-m-d"); 

    $sql = mysqli_query($conn, "INSERT INTO Orders (OrderDate, Customer_ID, Product_ID , Price, Quantity, Status) 
    VALUES ('$OrderDate','$Customer_ID','$Product','$Price','$Quantity','Order Placed')") or die (mysqli_error($conn));

    #Gets new stock quantity
    $Stock = $Package["Quantity"] - $Quantity;

    #Updates stock of product
    $sql2 = mysqli_query($conn, "UPDATE Product SET Quantity='$Stock' WHERE Product_ID='$Product'") or die (mysqli_error($conn));

    $message =  "New record created successfully.";
    #Send user to invoice page
    header("Location:invoice.php");
	}
}

#redirect users that aren't logged in to the referal page
if($_SESSION["Customer_ID"]){}
else{ 
	header("Location:login.php");
}
?>


<html>
<head>
<link rel="stylesheet" type = "text/css" href="CSS/Style.css">
<link rel="stylesheet" type = "text/css" href="CSS/table.css">
<title>Cart</title>
</head>
<body>
</body>
<h1 style="text-align:center">Order a cake</h1>

<form method="post" align="center">
<div class="message"><?php if($message!="") { echo $message; } ?></div>


<div class="input-group">
<label>Type of cake</label>
 <select name="Product">
  <option value="">Choose type</option>
  <option value="1">Regular Delight</option>
  <option value="2">Royal Delight</option>
</select>
</div>


<div class="cakes">
<label>Regular Delights</label>
 <select name="Regular Delights">
  <option value="">Choose a cake</option>
  <option value="1">Black Forest</option>
  <option value="1">Creme Delight</option>
  <option value="1">Crescent Delight</option>
  <option value="3">Crown Delight</option>
  <option value="2">Crown Ooz</option>
  <option value="2">Eskimo-ooz</option>
  <option value="4">Floral Delight</option>
  <option value="4">White Lady</option>
</select>
</div>


<div class="royal-delight">
<label>Royal Delights</label>
 <select name="Royal Delights">
  <option value="">Choose a cake</option>
  <option value="1">Baby Shower Delight</option>
  <option value="2">Castle Delight</option>
  <option value="3">Choco Truffle Trouble</option>
  <option value="3">Double Delight</option>
  <option value="3">Minion-ooz</option>
  <option value="3">Princess Delight</option>
  <option value="4">Santa Delight</option>
</select>
</div>

<div class="quantity">
<label>Quantity</label>
<select name="Quantity">
  <option value="">Amount</option>
  <option value="1">1</option>
  <option value="2">2</option>
  <option value="3">3</option>
  <option value="4">4</option>
  <option value="5">5</option>
  <option value="6">6</option>
  <option value="7">7</option>
  <option value="8">8</option>
  <option value="9">9</option>
  <option value="10">10</option>
</select>
</div>

<div class="input-group" align="center">
<button class="btn" type="submit" name="Submit" >Submit</button>
</div>
</form>

<br><br><br>
<?php
#adds footer to bottom of page
include 'footer.php';
?>

</html>
</DOCTYPE>
</body>
</html>

<div id="orgAssign" class="selectGroup">
   <div class="selectItem selected" data-value="10047">Test 1</div>
   <div class="selectItem selected" data-value="10046">Test 2</div>
   <div class="selectItem" data-value="10033">Test 3</div>
   <div class="selectItem" data-value="10032">Test 4</div>
</div>

<script>
$('regular-delight').on('click', function() {
    $(this).toggleClass('selected');
    getValues();
});
</script>