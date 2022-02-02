<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>

<?php
include "afterheader.php";
include "connection.php";


if (isset($_POST['submit']))
{
$Name = $_POST['Name'];
$Stars = $_POST['Stars'];
$Details = $_POST['Details'];
     
$query = "INSERT INTO Reviews (Name, Stars, Details) VALUES('$Name','$Stars','$Details')";
if (!mysqli_query($dbconnect, $query))
{
die('An error occurred. Your review has not been submitted.');
}
else
{
echo 'Thanks for your review.';
}
}
?>

</body>
</html>