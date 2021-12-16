<?php
include('dbcon.php');
if (isset($_POST['delete_farmer'])){
$id=$_POST['selector'];
$N = count($id);
for($i=0; $i < $N; $i++)
{
	$result = mysql_query("DELETE FROM farmer where farmer_id='$id[$i]'");
}
header("location: farmer.php");
}
?>