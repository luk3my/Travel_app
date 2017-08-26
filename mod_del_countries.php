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
      require_once("php/connect.php");
      require_once("php/check_login.php")
    ?>




<div class="main_content">

  		<h2>Please select modify or delete to change country details.</h2>
  	
<?php
  
  
  $query = "SELECT * FROM countries";
  
  $results = mysqli_query($conn, $query );
  
  if(!$results) {
	  
	  echo ("Query error: " . mysqli_error($conn));
	  
  }
  
  else {
	  
  // fetch and display results
  
  while ($row = mysqli_fetch_array($results)) {
	  
	$u_name = $row['UserName'];
	
  echo "<p>User name: $row[UserName]</p>";
	  
  echo "<p>Counrty 1: $row[Country1]</p>";
  
  echo "<p>Counrty 2: $row[Country2]</p>";

  echo "<p>Counrty 3: $row[Country3]</p>";

  echo "<p>Counrty 4: $row[Country4]</p>";

  echo "<p>Counrty 5: $row[Country5]</p>";
  
  echo "<p>No. of countries: $row[Count]</p>";
  
  echo "<p>Rank: $row[Rank]</p>";
  
 
	  
	echo "<a href='php/delete_countries.php?id=$u_name'>Delete</a> <a href='modify_Cdet.php?id=$u_name'>Modify</a>";
	
	echo "<hr>";
	
	echo "<br>";
	
	}
  
  }
  
  ?>
  		
  	
  	</div>

<form action="Php/logout.php">			
  <p><input class="button top-right" type="submit" name="logout" value="Logout" /></p>
</form>

</body>
</html>