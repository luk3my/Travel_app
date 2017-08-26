<?php
      require_once("connect.php");
    ?>

<?php
// Read the values from the form
$user_name = $_POST['u_name'];
$country_1 = $_POST['c1'];
$country_2 = $_POST['c2'];
$country_3 = $_POST['c3'];
$country_4 = $_POST['c4'];
$country_5 = $_POST['c5'];
$num = $_POST['number'];

 
// escape variables for security
$user_name = mysqli_real_escape_string($conn, $user_name);
$country_1 = mysqli_real_escape_string($conn, $country_1);
$country_2 = mysqli_real_escape_string($conn, $country_2);
$country_3 = mysqli_real_escape_string($conn, $country_3);
$country_4 = mysqli_real_escape_string($conn, $country_4);
$country_5 = mysqli_real_escape_string($conn, $country_5);
$num = mysqli_real_escape_string($conn, $num);

 
// create the INSERT query
$query="INSERT INTO countries (UserName, Country1, Country2, Country3, Country4, Country5, Count) 
VALUES ('$user_name', '$country_1', '$country_2', '$country_3', '$country_4', '$country_5', '$num')";
$results = mysqli_query($conn, $query );
if(!$results) {
echo ("Query error: " . mysqli_error($conn));
exit;
}
else {
// Redirect the browser window back to the add customer page
header("location: ../enter_Countries.php");
}
?>