<?php
include('dbcon.php');
if (isset($_POST['delete_product'])){
$id=$_POST['selector'];
$N = count($id);
for($i=0; $i < $N; $i++)
{
	$result = mysql_query("DELETE FROM products where product_id='$id[$i]'");
}
header("location: product.php");
}
?>