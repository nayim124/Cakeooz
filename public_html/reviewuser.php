<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>
</head>

<body>
<?php

$hostname = "localhost";
$username = "s2001758";
$password = "s2001758@lsc";
$db = "s2001758";
$dbconnect=mysqli_connect($hostname,$username,$password,$db);

if ($dbconnect->connect_error) {
die("database connection failed: " . $dbconnect->connect_error);
}
?>

<table border="1" align="center">
<tr>
  <td>REVIEWER_NAME</td>
  <td>STAR_RATING</td>
  <td>DETAILS</td>
</tr>

<?php

$query = mysqli_query($dbconnect, "SELECT * FROM user_review")
   or die (mysqli_error($dbconnect));
   
while ($row = mysqli_fetch_array($query)) {
echo
"<tr>
<td>{$row['reviewer_name']}</td>
<td>{$row['star_rating']}</td>
<td>{$row['details']}</td>
   </tr>\n";
   
}
?>
</body>
</html>