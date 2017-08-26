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

$userid = $_GET['id'];

$query="DELETE FROM users WHERE UserName='$userid'";
$results = mysqli_query($conn, $query);
if(!$results) {
echo ("Query error: " . mysqli_error($conn));
}
else {
header("location: ../mod_del_user.php");
}
?>
  		
  	
  	</div>


</body>
</html>