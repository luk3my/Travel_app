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
      require_once("php/check_login.php")
?>


<?php
  
  
  $uname = $_GET['id'];
  
  $query = "SELECT * FROM countries WHERE UserName='$uname'";
  
  $results = mysqli_query($conn, $query);
  
  if (!$results) {
	  
	  echo ("Query error: " . mysqli_error($conn));
	  
  }
  
  else {
	  
  // fetch and store results for later use if no errors
  
  while ($row = mysqli_fetch_array($results)) {
	  
	  $uname = $row['UserName'];
	  $country1 = $row['Country1'];
	  $country2 = $row['Country2'];
	  $country3 = $row['Country3'];
	  $country4 = $row['Country4'];
	  $country5 = $row['Country5'];
    $count = $row['Count'];
    $rank = $row['Rank'];
	}
  
  }
  
  ?>


<?php
// Read the values in from the department table
$query = "SELECT * FROM countries";
$results = mysqli_query($conn, $query );
if(!$results) {
echo ("Query error: " . mysqli_error($conn));
}
?>  

<h1>Please modify details below</h1>

<form method="post" action="php/modify_countries.php">
<h2>User Name</h2>
<input type="text" name="u_name" value="<?=$uname?>" required>
</select>
                                          
<h2>What are the new Top 5 countries?</h2>
<h3>Country 1:</h3><input type="text" name="c1" value="<?=$country1?>" required>
<h3>Country 2:</h3><input type="text" name="c2" value="<?=$country2?>">
<h3>Country 3:</h3><input type="text" name="c3" value="<?=$country3?>">
<h3>Country 4:</h3><input type="text" name="c4" value="<?=$country4?>">
<h3>Country 5:</h3><input type="text" name="c5" value="<?=$country5?>">
<h2>Number of countries visted:<h2><input type="text" name="number" value="<?=$count?>" required><br>
<h3>Rank</h3><input type="text" name="r" value="<?=$rank?>">

<button type="submit" name="submit">Submit</button>
<a class="button top-right" href="index.php">Exit</a>


<form action="Php/logout.php">			
  <p><input class="button top-right" type="submit" name="logout" value="Logout" /></p>
</form>

</body>
</html>
