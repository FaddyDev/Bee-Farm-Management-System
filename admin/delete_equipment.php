<?php
include('dbcon.php');
if (isset($_POST['delete_equipment'])){
$id=$_POST['selector'];
$N = count($id);
for($i=0; $i < $N; $i++)
{
	$result = mysql_query("DELETE FROM equipment where equipment_id='$id[$i]'");
}
header("location: equipment.php");
}
?>