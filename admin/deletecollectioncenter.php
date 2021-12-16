<?php
include('dbcon.php');
if (isset($_POST['delete_center'])){
$id=$_POST['selector'];
$N = count($id);
for($i=0; $i < $N; $i++)
{
	$result = mysql_query("DELETE FROM collection_center where center_id='$id[$i]'");
}
header("location: collection.php");
}
?>