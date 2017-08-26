<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="css/style.css">
  <title>Document</title>
</head>
<body>


<?php
      require_once("php/connect.php");
      require_once("php/check_login.php");
    ?>


<?php
// Read the values in from the department table
$query = "SELECT * FROM users";
$results = mysqli_query($conn, $query );
if(!$results) {
echo ("Query error: " . mysqli_error($conn));
}
?>  

<h1>Please complete the form below</h1>

<form method="post" action="php/add_Countries.php">

<h2>Please select your user name</h2>
<select name="u_name">
<?php while ($row = mysqli_fetch_array($results)) { ?>
<option value="<?php echo $row['UserName'];?>">
<?php echo $row['UserName'];?> </option>
<?php } ?>
</select>
                                          
<h2>What are your Top 5 countries?</h2>
<h3>Country 1:</h3><input type="text" name="c1" required>
<h3>Country 2:</h3><input type="text" name="c2">
<h3>Country 3:</h3><input type="text" name="c3">
<h3>Country 4:</h3><input type="text" name="c4">
<h3>Country 5:</h3><input type="text" name="c5">
<h2>Number of countries you have visted:<h2><input type="text" name="number" required><br>

<button type="submit" name="submit">Submit</button>
<a class="button top-right" href="index.php">Exit</a>

<form action="Php/logout.php">			
  <p><input class="button top-right" type="submit" name="logout" value="Logout" /></p>
</form> 

</body>
</html>
