<?php
mysql_connect("localhost","root","Faddy") or die ("can't connect to server<br />".mysql_error());
mysql_select_db("nyuki")or die ("can't connect to database <br />".mysql_error());
//mysql_select_db('nyuki',mysql_connect('localhost','root',''))or die(mysql_error());
?>