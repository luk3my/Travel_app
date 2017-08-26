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
    ?>

<h1>Welcome - Please login</h1>

<form method="post" action="php/sec_login.php">
<h2>User name</h2> <input type="text" name="u_name">
<h2>Password</h2>  <input type="text" name="p_word"><br>
<p><input class="button" type="submit" name="login" value="User Login" /></p>
</form>

<form method="post" action="php/ad_login.php">
<h2>User name</h2> <input type="text" name="ad_name">
<h2>Password</h2>  <input type="text" name="p_word"><br>
<p><input class="button" type="submit" name="login" value="admin Login" /></p>
</form>

</body>
</html>

