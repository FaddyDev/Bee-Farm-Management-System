<?php session_start();
session_unset($_SESSION['loguser']);
 
  require("include/connection.php");
  mysql_query("TRUNCATE TABLE `cart` ") or die (mysql_error());

header('location:login.php');

?>