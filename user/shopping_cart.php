
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
		<font color=white><center><h3 class ="panel-title"><b>SHOPPING CART</b></center></h3></font>
		</div>
<table class="table table-stripped table-hover table-bordered table-condensed" style="background-color:white;">
										<thead>
											<tr>
												<th>NAME</th>
												<th>UNIT PRICE</th>
												<th>QUANTITY</th>
												<th>TOTAL</th>
												<th>ACTION</th>
											</tr>
										</thead>
										<tbody>		
											
											<?php
											require("include/connection.php");				
												$results = mysql_query("SELECT * FROM `cart`") or die (mysql_error());
												
												if(mysql_num_rows($results) == 0 ){echo "<tr><td colspan=5 style='text-align:center;'><font color=green><b>EMPTY CART</b></font></td></tr>";}
												while($project = mysql_fetch_array($results)){
													echo "
													<tr> <form method='post' action='shopping_cart.php'>
														<td>".$project['name']."</td>
														<td>".$project['unitprice']."</td>
														<td> <b>".$project['qty']."</b> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
															<button name='add".$project['item_id']."' type='submit' class='btn btn-success btn-xs' ><span class='glyphicon glyphicon-plus'></span> </button> &nbsp;&nbsp;															
															<button name='sub".$project['item_id']."' type='submit' class='btn btn-danger btn-xs' ><span class='glyphicon glyphicon-minus'></span> </button>
														</td>
														<td>".$project['tatol']."</td>
														<td> <button name='del".$project['item_id']."' type='submit' class='btn btn-danger' ><span class='glyphicon glyphicon-trash'></span>  Remove</button> </form> </td>					
													</tr>
													";
													
													if(isset($_POST['del'.$project['item_id']])){
														mysql_query("DELETE FROM `cart` WHERE `item_id`='".$project['item_id']."'") or die(mysql_error());						
														echo "<script> window.location='shopping_cart.php'</script>";
													}
													
													if(isset($_POST['add'.$project['item_id']])){
														$results1 = mysql_query("SELECT * FROM `cart` WHERE `name`='".$project['name']."'") or die (mysql_error());			
														while($project1 = mysql_fetch_array($results1)){
															
																	//get available quantity
															//getting equipments quantity
																$eqp=mysql_query("SELECT * FROM `equipment` WHERE `name`='".$project['name']."' ") or die (mysql_error());
																$project3 = mysql_fetch_array($eqp);
																if(mysql_num_rows($eqp)==1){
																	$available=$project3['quantity'];
																	}																	
																//getting bee products quantity
																$eqp=mysql_query("SELECT * FROM `products` WHERE `name`='".$project['name']."' ") or die (mysql_error());
																$project3 = mysql_fetch_array($eqp);
																if(mysql_num_rows($eqp)==1){
																	$available=$project3['quantity'];
																	}
															
															
															$qty=$project1['qty']+1;
															if($qty > $available){echo "<script> alert('can not order more than ".$project1['qty']." units of ".$project['name']." at the moment ');</script>";}else{
															$total = $qty * $project1['unitprice'];
															mysql_query("UPDATE `cart` SET `qty`='$qty',`tatol`='$total' WHERE `name`='".$project1['name']."'") or die(mysql_error());
															}
														}				
														echo "<script> window.location='shopping_cart.php'</script>";
														
													}
													
													if(isset($_POST['sub'.$project['item_id']])){
														
														$results1 = mysql_query("SELECT * FROM `cart` WHERE `name`='".$project['name']."'") or die (mysql_error());			
														while($project1 = mysql_fetch_array($results1)){
															$qty=$project1['qty']-1;
															$total = $qty * $project1['unitprice'];
															mysql_query("UPDATE `cart` SET `qty`='$qty',`tatol`='$total' WHERE `name`='".$project1['name']."'") or die(mysql_error());
															
															if($qty==0){mysql_query("DELETE FROM `cart` WHERE `item_id`='".$project['item_id']."'") or die(mysql_error());}
															
														}				
														echo "<script> window.location='shopping_cart.php'</script>";
													}													
													
												}
											?>
											
											<tr><td colspan=5 style='text-align:center;'><font color=green><b> 
											<?php
											
											$results2 = mysql_query("SELECT * FROM `cart` ") or die (mysql_error());
												$totalqty =0;
												while($project2 = mysql_fetch_array($results2)){	
													$totalqty = $totalqty + $project2['qty'];
												}
												echo " ITEMS = ".$totalqty."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
											
											$results2 = mysql_query("SELECT * FROM `cart` ") or die (mysql_error());
											$alltotal =0;
											while($project2 = mysql_fetch_array($results2)){
												$alltotal = $alltotal + $project2['tatol'];
											}
											echo "TOTAL COST= ".$alltotal;
											
											
											?>
											
											
											</b></font></td></tr>
											
										</tbody>
									 </table>
									 
		<center>				 
		<a href="makeorder.php"><button type='button' class='btn btn-success' >
		<font color=white >PROCEED TO ORDERING <span class="glyphicon glyphicon-menu-right"> </span> </font></button></a>
		</center>
 
 
 </div>
 
</div>
<BR />


<br />
<?php include("mainfooter.php");?>
</div>
</body>


