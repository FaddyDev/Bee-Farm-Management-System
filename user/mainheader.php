 <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>

<?php

if(isset($_SESSION['loguser'])){
	$loguservar="<b>logged in as: <span class='glyphicon glyphicon-user'></span> ".$_SESSION['loguser']."    <br /><a href='logout.php'><button class='btn btn-danger btn-xs'> <span class='glyphicon glyphicon-log-out'></span> LOGOUT</button></a></b>";
}else{ $loguservar="<a href='login.php'><button type='button' class='btn btn-default' data-toggle='modal' data-target='#loginmodal'><span class='glyphicon glyphicon-log-in'></span>  LOGIN</button></a>";}

?>


<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
<script src="bootstrap/js/jquery.min.js"></script>
<script src="bootstrap/js/bootstrap.min.js"></script>



<div class="row" style="background-color:green; font-size:20px;" >
<div class="col-xs-12 hidden-xs"><center> <font color=white ><b>Mkulima Bee Online System</b> </font> </center></div>
</div>

<div class="row">
<nav class="navbar navbar-default" style="background-color:green; ">

<div class="container-fluid">

<div class="navbar-header">
    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
        <span class="sr-only">Toggle navigation</span>
		<span class="icon-bar"></span>
		<span class="icon-bar"></span>
		<span class="icon-bar"></span>	
    </button>
	<a class="navbar-brand visible-xs"> <font color=white >Mkulima Bee Online System </font>	</a>
</div>

<?php 
  //get number of items in the cart.
  require("include/connection.php");
$results2 = mysql_query("SELECT * FROM `cart` ") or die (mysql_error());
$totalqty =0;
while($project2 = mysql_fetch_array($results2)){	
	$totalqty = $totalqty + $project2['qty'];
}


?>

<div class="collapse navbar-collapse" id ="bs-example-navbar-collapse-1">
<font color=white >
    <ul class="nav navbar-nav"  >
        <li><a href="index.php"><font color=white ><span class="glyphicon glyphicon-home"></span> Home</font></a></a></li>
		<li><a href="services.php"><font color=white ><span class="glyphicon glyphicon-stats"></span> Services</font></a></a></li>
		<li><a href="aboutus.php"><font color=white ><span class="glyphicon glyphicon-eye-open"></span> About Us</font></a></a></li>
		<li><a href="contactsus.php"><font color=white ><span class="glyphicon glyphicon-earphone"></span> Contact US</font></a></li>
		<li><button type='button' class='btn btn-success' data-toggle='modal' data-target='#loginmodal'>
		<font color=white >Shopping cart <span class="glyphicon glyphicon-shopping-cart"> </span><span class="badge"><?php echo $totalqty;?></span> </font></button>
		</li>
		
    </ul>
	<ul class="nav navbar-nav navbar-right">
		<li><?php echo $loguservar;?> </li>		
	</ul>
	
	
	</font>
</div>


</div>

</nav>
</div>


 <!-- MODAL TO POPUP  -->
			<div class ="modal fade" id="loginmodal" tabindex="-1" role="dialog" aria-labelleby="myModalLabel" aria-hidden="true" >
				<div class="modal-dialog">
					<div class="modal-content">
						
						<div class="modal-header"><!-- heading -->
							<button type="button" class="close" data-dismiss="modal" aria-label="close">
							<span aria-hidden="true" > &times </span>
							</button>
							<h4 class="modal-title" id="myModalLabel">
							
							</h4>
						</div> <!-- end of heading -->

						<div class="modal-body"><!-- body -->
						<div class = "panel-heading" style="background-color:green;"> 
							<font color=white><center><h3 class ="panel-title"><b>SHOPPNIG CART</b></center></h3></font>
						</div>
							 <table class="table table-stripped table-hover table-bordered table-condensed" style="background-color:white;">
										<thead>
											<tr>
												<th>NAME</th>
												<th>UNIT PRICE</th>
												<th>QUANTITY</th>
												<th>TOTAL</th>
												
											</tr>
										</thead>
										<tbody>		
											
											<?php
											require("include/connection.php");				
												$results = mysql_query("SELECT * FROM `cart`") or die (mysql_error());
												if(mysql_num_rows($results) == 0 ){echo "<tr><td colspan=5 style='text-align:center;'><font color=green><b>EMPTY CART</b></font></td></tr>";}
												while($project = mysql_fetch_array($results)){
													echo "
													<tr> 
														<td>".$project['name']."</td>
														<td>".$project['unitprice']."</td>
														<td>".$project['qty']."</td>
														<td>".$project['tatol']."</td>
																
													</tr>
													";
													
													
												}
											?>
											
											<tr><td colspan=5 style='text-align:center;'><font color=green><b> 
											<?php
											$results2 = mysql_query("SELECT * FROM `cart` ") or die (mysql_error());
											$alltotal =0;
											while($project2 = mysql_fetch_array($results2)){
												$alltotal = $alltotal + $project2['tatol'];
											}
											echo "TOTAL COST= ".$alltotal;
											?>
											
										</tbody>
									 </table>
						</div> <!-- end of body -->						
						
						<div class="modal-footer"><!-- footer -->
						
								<a href="shopping_cart.php">  <button type='button' class='btn btn-success' >
								<font color=white ><span class="glyphicon glyphicon-edit"> </span>EDIT CART </font></button></a>
								
								<a href="makeorder.php"><button type='button' class='btn btn-success' >
		<font color=white >PROCCEED TO ORDERING <span class="glyphicon glyphicon-menu-right"> </span> </font></button></a>
								
						</div><!-- end of footer -->
						
					</div>
					

				</div>
			</div> <!-- END OF MODAL TO POPUP  -->