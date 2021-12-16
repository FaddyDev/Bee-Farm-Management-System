<?php
include('dbcon.php');
if (isset($_POST['delete_supplier'])){
$id=$_POST['selector'];
$N = count($id);
for($i=0; $i < $N; $i++)
{
	$result = mysql_query("DELETE FROM supplier where supplier_id='$id[$i]'");
}
header("location: supplier.php");
}
?>