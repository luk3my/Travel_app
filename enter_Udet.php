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


<h1>Please complete the form below</h1>

<form method="post" action="php/add_Udet.php">
<h2>User details</h2>
<h3>User name:</h3><input type="text" name="u_name" required>
<h3>Password:</h3><input type="text" name="p_word" required>
<h3>First name:</h3><input type="text" name="f_name" required>
<h3>Last name:</h3><input type="text" name="l_name" required>
<h3>Email:</h3><input type="text" name="email" required>
<button type="submit" name="submit">Submit</button>
<a class="button top-right" href="user_menu.html">Back</a>

<form action="Php/logout.php">
  <p><input class="button top-right" type="submit" name="logout" value="Logout" /></p>
</form>

</body>
</html>
