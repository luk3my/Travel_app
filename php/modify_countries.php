<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="css/style.css">
  <title>Data Entry</title>
</head>
<body>

<?php
      require_once("connect.php");
    ?>

<?php

// read the values from the form and store in variables
$user_name = $_POST['u_name'];
$country1 = $_POST['c1'];
$country2 = $_POST['c2'];
$country3 = $_POST['c3'];
$country4 = $_POST['c4'];
$country5 = $_POST['c5'];
$count = $_POST['number'];
$rank = $_POST['r'];


 
// escape variables for security
$country1 = mysqli_real_escape_string($conn, $country1);
$country2 = mysqli_real_escape_string($conn, $country2);
$country3 = mysqli_real_escape_string($conn, $country3);
$country4 = mysqli_real_escape_string($conn, $country4);
$country5 = mysqli_real_escape_string($conn, $country5);
$count = mysqli_real_escape_string($conn, $count);
$rank = mysqli_real_escape_string($conn, $rank);


 
// create the UPDATE query
$query="UPDATE countries SET Country1='$country1', Country2='$country2', Country3='$country3', Country4='$country4', Country5='$country5',
Count='$count', Rank='$rank' WHERE UserName='$user_name' ";
 
//execute the query
$results = mysqli_query($conn, $query );
// check for errors
if(!$results) {
echo ("Query error: " . mysqli_error($conn));
exit;
}
else {
// Redirect the browser window back to the select query page if there are no errors
header("location: ../mod_del_countries.php");
}
?>





</body>
</html>