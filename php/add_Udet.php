<?php
      require_once("connect.php");
    ?>

<?php
// Read the values from the form
$user_name = $_POST['u_name'];
$first_name = $_POST['f_name'];
$last_name = $_POST['l_name'];
$e_mail = $_POST['email'];
$pass_word = $_POST['p_word'];

 
// escape variables for security
$user_name = mysqli_real_escape_string($conn, $user_name);
$first_name = mysqli_real_escape_string($conn, $first_name);
$last_name = mysqli_real_escape_string($conn, $last_name);
$e_mail = mysqli_real_escape_string($conn, $e_mail);
$pass_word = mysqli_real_escape_string($conn, $pass_word);


 
// create the INSERT query
$query="INSERT INTO users (UserName, FirstName, LastName, Email, password) 
VALUES ('$user_name','$first_name', '$last_name', '$e_mail', '$pass_word')";
$results = mysqli_query($conn, $query );
if(!$results) {
echo ("Query error: " . mysqli_error($conn));
exit;
}
else {
// Redirect the browser window back to the add customer page
header("location: ../enter_Udet.php");
}
?>