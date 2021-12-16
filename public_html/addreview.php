<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>

<?php

$hostname = 'localhost';
$username = 's2001758';
$password = 's2001758@lsc';
$db = 's2001758';

$dbconnect=mysqli_connect($hostname,$username,$password,$db);

if ($dbconnect ->connect_error)
 {
   die('Database connection failed: ' . $dbconnect->connect_error);
 }
 
if (isset($_POST['submit']))
{
$reviewer_name = $_POST['reviewer_name'];
$star_rating = $_POST['star_rating'];
$details = $_POST['details'];
     
$query = "INSERT INTO user_review (reviewer_name, star_rating, details) VALUES('$reviewer_name','$star_rating','$details')";
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