<?php
$conn = mysqli_connect("localhost","root","","Cakeooz");
if (!$conn) {
	die('<div class="center">Connection failed: ' . mysqli_connect_error() . "</div>");
}
// echo "Connected successfully";
$allCars = mysqli_query($conn, "SELECT * FROM Car");
$currentUser = mysqli_fetch_assoc(mysqli_query($conn, "SELECT * FROM Client WHERE Client_ID = 1"));

if ($_SERVER['REQUEST_METHOD'] === 'POST'){
 $name = test_input($_POST["Name"]);
 $email = test_input($_POST["Email"]);
 $address = test_input($_POST["Address"]);
 $postCode = test_input($_POST["PostCode"]);
 $vehicle = test_input($_POST["Vehicle"]);
 $bDate = test_input($_POST["bDate"]);
 $bTime = test_input($_POST["bTime"]);
 
 $result = mysqli_query($conn, "SELECT * FROM Booking WHERE Date = '" . $bDate . "' AND Time ='" . $bTime . "'");
 if (mysqli_num_rows($result) > 0){
   echo '<div class="center">Double Booking Detected, reverting booking. Please try again in another slot.</div>';
  }else{
   $sql= "INSERT INTO Booking (Client_ID, Car_ID, Date, Time) VALUES ('" . $currentUser["Car_ID"] ."','". $Vehicle ."','". $bDate ."','". $bTime ."')";
   $result = mysqli_query($conn, $sql);
   if ($result) {
	echo '<div class="center">New record created successfully</div>';
   }else{
	echo "Error: " . $sql . "<br>" . mysqli_error($conn);
   }
  }
}

function test_input($data) {
	$data=trim($data);
	$data=stripslashes($data);
	$data=htmlspecialchars($data);
	return $data;
}
?>
	
