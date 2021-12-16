<?php

mysql_connect("localhost","root","Faddy") or die ("can't connect to server<br />".mysql_error());
mysql_query("CREATE DATABASE IF NOT EXISTS `nyuki`") or die (mysql_error());
mysql_select_db("nyuki")or die ("can't connect to database <br />".mysql_error());

//creating table for CART.
 mysql_query("CREATE TABLE IF NOT EXISTS `cart` (
  `item_id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `unitprice` varchar(100) NOT NULL,
  `qty` varchar(100) NOT NULL,
  `tatol` varchar(100) NOT NULL,
  `orderby` varchar(100) NOT NULL,
  PRIMARY KEY (`item_id`)
)
") or die (mysql_error());


//creating table for USERS.
 mysql_query("CREATE TABLE IF NOT EXISTS `users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `category` varchar(50) NOT NULL,
  `password` varchar(200) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  PRIMARY KEY (`user_id`)
)
") or die (mysql_error());




?>