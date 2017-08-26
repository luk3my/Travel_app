<?php
session_start();
// MySQL Database Connect
require_once("connect.php");
$username = mysqli_real_escape_string($conn, $_POST['u_name']); //prevent SQL injection
$password = mysqli_real_escape_string($conn, $_POST['p_word']); //prevent SQL injection
//$password = hash('sha256', $password); //hash the password with the SHA256 encryption
$query = "SELECT * FROM users WHERE UserName='$username' AND Password='$password'";
$result = mysqli_query($conn, $query) or die(mysqli_error($con)); //run the query
$row = mysqli_fetch_array($result); //create a variable called '$row' to store the results
$count=mysqli_num_rows($result); //count the number of rows returned by the query
if($count==1) { //if the number of matching records equals 1 
$_SESSION['login'] = $row['FirstName']; //initialise a session called 'login' to have a value of 'firstName'
$_SESSION['logged'] = TRUE;
$_SESSION['permissions'] = $row[Priv];
header('location:../user_menu.php'); // redirect to modify_dept.php
}
//if an error occurs initialise a session called 'error' to have a value of the error msg
else {
$_SESSION['error'] = "Incorrect Username or Password. Please try again.";
header('location:../index.php'); //redirect to index.php
}
?>