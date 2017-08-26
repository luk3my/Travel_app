<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="css/style.css">
  <title>User menu</title>
</head>
<body>


<?php
      require_once("php/connect.php");
      require_once("php/check_login.php");
?>

<?php 

		switch ($_SESSION['permissions']) {
			
			case 1:

				echo "<h1>Welcome to the data entry menu Admin</h1>";
				break;
			
			case 2:
			
				echo "<h1>Welcome to the data enrty menu traveller</h1>";
				break;
				
			
		}	
		
		?>
  
<h2>Please make a selection</h2>

<?php	

			if($_SESSION['permissions'] == 1) {
				
				
        echo  "<h3><a href='enter_Udet.php'><span>Enter user details</span></a><br>";
        echo  "<a href='enter_Countries.php'><span>Enter countries</span></a><br>";
        echo  "<a href='mod_del_user.php'><span>Modify/Delete user records</span></a><br>";
        echo  "<a href='mod_del_countries.php'><span>Modify/Delete country records</span></a></h3>";
        
			}
		
			if($_SESSION['permissions'] == NULL) {
  					
				echo  "	<h3><a href='enter_Udet.php'><span>Enter user details</span></a><br>";
        echo  "<a href='enter_Countries.php'><span>Enter countries</span></a><br></h3>";
			
  			}
			
			
		?>	


<form action="Php/logout.php">			
  <p><input class="button top-right" type="submit" name="logout" value="Logout" /></p>
</form>



</body>
</html>