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

  		<h2>Please select modify or delete to change a users details.</h2><br>
      <h3>*Please remove any corresponding country data before deleting a user</h3>
  	
<?php
  
  
  $query = "SELECT * FROM users";
  
  $results = mysqli_query($conn, $query );
  
  if(!$results) {
	  
	  echo ("Query error: " . mysqli_error($conn));
	  
  }
  
  else {
	  
  // fetch and display results
  
  while ($row = mysqli_fetch_array($results)) {
	  
	$u_name = $row['UserName'];
	
  echo "<p>User name: $row[UserName]</p>";
	  
  echo "<p>First name: $row[FirstName]</p>";
  
  echo "<p>Last name: $row[LastName]</p>";
  
  echo "<p>Email: $row[Email]</p>";
  
  echo "<p>Password: $row[Password]</p>";
     
	echo "<a href='Php/delete_user.php?id=$u_name'>Delete</a> <a href='modify_Udet.php?id=$u_name'>Modify</a>";
	
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