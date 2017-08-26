<?php
require_once("connect.php");
session_start();
if(!$_SESSION['logged']){
header("Location: ../user_menu.php");
exit;
}
?>