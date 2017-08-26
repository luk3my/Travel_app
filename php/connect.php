<?php

// Set values fof the variables

$servername = "localhost";

$username = "root";

$password = "";

$database = "trav_appdb";


// Connect to the MySQL database

$conn = @mysqli_connect($servername, $username, $password, $database);

// Check for valid connection.  If there are errors display an error message and error details

if (!$conn) {
	
	echo "Error: Unable to connect to MySQL." .PHP_EOL;
	
	echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL; // Display the MySQL error number
	
	echo "Debugging error: " . mysqli_connect_error() . PHP_EOL; // Display the MySQL error details
	
	exit;
	
	}

?>