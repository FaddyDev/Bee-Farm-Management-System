<?php
 session_start();
if(isset($_SESSION['loguser'])){}else{header("location:login.php");}

?>
 <body style="background: url(img/index.jpg) no-repeat center center fixed">
 <?php include("mainheader.php");?>
 <div class="container">
<div class="row">
 <?php include("servicesidebar.php");?>
 
 <div class="col-xs-10 table-responsive">
 <div class = "panel-heading" style="background-color:green;"> 
		<font color=white><center><h3 class ="panel-title"><b>EQUIPMENT</b></center></h3></font>
		</div>
 <table class="table table-stripped table-hover table-bordered table-condensed " style="background-color:white;">
	<thead>
		<tr>
			<th>NAME</th>
			<th>DESCRIPTION</th>
			<th>PRICE/UNIT</th>
			<th>QUANTITY</th>
			<th>OWNER</th>
			<th>IMAGE</th>
			<th>ACTION</th>
		</tr>
	</thead>
	<tbody>		
		
		<?php
		require("include/connection.php");				
			$results = mysql_query("SELECT * FROM `equipment`") or die (mysql_error());			
			while($project = mysql_fetch_array($results)){
				
				
				
				echo "
				<tr> 
					<td>".$project['name']."</td>
					<td>".$project['description']."</td>
					<td>".$project['price']."</td>
					<td>".$project['quantity']."</td>
					<td>".$project['owner']."</td>
					<td> <img class='img img-responsive' src='../admin/equipment-uploads/".$project['image']."'  /> </td>
					<td><form method='post' action='equipment.php'> <a href='equipment.php'><button name='add".$project['equipment_id']."' type='submit' class='btn btn-success' ><span class='glyphicon glyphicon-shopping-cart'></span>  Add To Cart</button></a> </form> </td>
				</tr>
				";	
				
				
				
				if(isset($_POST["add".$project['equipment_id']])){
						if($project['quantity']!=0){
							//first check if quantity ordered is available
							
							$item=mysql_query("SELECT * FROM `cart` WHERE `name`='".$project['name']."' ") or die(mysql_error());
							if(mysql_num_rows($item) == 0){
							 mysql_query("INSERT INTO `cart`(`item_id`, `name`, `unitprice`, `qty`, `tatol` ,`orderby`) VALUES (null,'".$project['name']."','".$project['price']."','1','".$project['price']."','".$_SESSION['loguser']."') ") or die(mysql_error());	
							}else{								
								$results1 = mysql_query("SELECT * FROM `cart` WHERE `name`='".$project['name']."'") or die (mysql_error());			
								while($project1 = mysql_fetch_array($results1)){
									
									$qty=$project1['qty']+1;
									if($qty > $project['quantity']){echo "<script> alert('can not order more than ".$project['quantity']." units of ".$project['name']." at the moment ');</script>";
									}else{
									$total = $qty * $project1['unitprice'];
									mysql_query("UPDATE `cart` SET `qty`='$qty',`tatol`='$total' WHERE `name`='".$project1['name']."'") or die(mysql_error());
									}
								}
								
													
							}
								
							echo "<script> window.location='equipment.php'</script>";
							
						}else{echo "<script> alert('".$project['name']." is out of stock. Try again later');</script>"; }
				
				}
				
				
			}
			
			
			
		?>
		
	</tbody>
 </table>
 
 
 </div>
 
 
</div>
<BR />


<br />
<?php include("mainfooter.php");?>
</div>
</body>