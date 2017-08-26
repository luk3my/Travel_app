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
$pass_word = $_POST['p_word'];
$first_name = $_POST['f_name'];
$last_name = $_POST['l_name'];
$e_mail = $_POST['email'];
 
// escape variables for security
$user_name = mysqli_real_escape_string($conn, $user_name);
$pass_word = mysqli_real_escape_string($conn, $pass_word);
$first_name = mysqli_real_escape_string($conn, $first_name);
$last_name = mysqli_real_escape_string($conn, $last_name);
$e_mail = mysqli_real_escape_string($conn, $e_mail);

 
// create the UPDATE query
$query="UPDATE users SET Password='$pass_word', FirstName='$first_name', LastName='$last_name', Email='$e_mail' WHERE UserName='$user_name' ";
 
 
//execute the query
$results = mysqli_query($conn, $query );
// check for errors
if(!$results) {
echo ("Query error: " . mysqli_error($conn));
exit;
}
else {
// Redirect the browser window back to the select query page if there are no errors
header("location: ../mod_del_user.php");
}
?>


</body>
</html>