
<?php
      require_once("connect.php");
    ?>

<?php

$userid = $_GET['id'];

$query="DELETE FROM countries WHERE UserName='$userid'";
$results = mysqli_query($conn, $query);
if(!$results) {
echo ("Query error: " . mysqli_error($conn));
}
else {
header("location: ../mod_del_countries.php");
}
?>