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
  
  $query = "SELECT * FROM users WHERE UserName='$uname'";
  
  $results = mysqli_query($conn, $query);
  
  if (!$results) {
	  
	  echo ("Query error: " . mysqli_error($conn));
	  
  }
  
  else {
	  
  // fetch and store results for later use if no errors
  
  while ($row = mysqli_fetch_array($results)) {
	  
	  $uname = $row['UserName'];
	  $fname = $row['FirstName'];
	  $lname = $row['LastName'];
	  $pword = $row['Password'];
	  $email = $row['Email'];
      
	}
  
  }
  
  ?>




<h1>Please modify users details below</h1>

<form method="post" action="php/modify_user.php">
<h2>User details</h2>
<?php echo "<h3>User name:</h3><p>$uname</p>";?>
<h3>Password:</h3><input type="text" name="p_word" value="<?=$pword?>" required>
<h3>First name:</h3><input type="text" name="f_name" value="<?=$fname?>" required>
<h3>Last name:</h3><input type="text" name="l_name" value="<?=$lname?>" required>
<h3>Email:</h3><input type="text" name="email" value="<?=$email?>" required>
<button type="submit" name="submit">Submit</button>
<a class="button top-right" href="user_menu.html">Back</a>

<form action="Php/logout.php">			
  <p><input class="button top-right" type="submit" name="logout" value="Logout" /></p>
</form>

</body>
</html>