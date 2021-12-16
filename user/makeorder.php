
<?php
 session_start();
if(isset($_SESSION['loguser'])){}else{header("location:login.php");}


if(isset($_POST['order'])){
	require("include/connection.php");
$results2 = mysql_query("SELECT * FROM `cart` ") or die (mysql_error());
while($project2 = mysql_fetch_array($results2)){
	
	//update equipments quantity
	$eqp=mysql_query("SELECT * FROM `equipment` WHERE `name`='".$project2['name']."' ") or die (mysql_error());
	$project3 = mysql_fetch_array($eqp);
	if(mysql_num_rows($eqp)==1){
		$newqty=$project3['quantity']-$project2['qty'];
		mysql_query("UPDATE `equipment` SET `quantity`='".$newqty."' WHERE `name`='".$project2['name']."'  ") or die (mysql_error());
		}
		
	//update bee products quantity
	$eqp=mysql_query("SELECT * FROM `products` WHERE `name`='".$project2['name']."' ") or die (mysql_error());
	$project3 = mysql_fetch_array($eqp);
	if(mysql_num_rows($eqp)==1){
		$newqty=$project3['quantity']-$project2['qty'];
		mysql_query("UPDATE `products` SET `quantity`='".$newqty."' WHERE `name`='".$project2['name']."'  ") or die (mysql_error());
		}
		
	
	
	
	mysql_query("INSERT INTO `order`(`order_id`, `product`, `quantity`,  `orderby`, `ordertime`, `collection_center`)
	VALUES (null,'".$project2['name']."','".$project2['qty']."','".$_SESSION['loguser']."','".date("Y-m-d")." ".date("h:i:s a")."','".$_POST['clcenter']."')") or die (mysql_error());
}	
  
  mysql_query("TRUNCATE TABLE `cart` ") or die (mysql_error());	
  
echo ("<script language='javascript'> window.alert('Succesfully ordered. sms notification sent to the supplier and farmer')</script>");	
echo "<script> window.location='orderlog.php'</script>";	
	
}

?>
 <body style="background: url(img/index.jpg) no-repeat center center fixed">
 <?php include("mainheader.php");?>
 <div class="container">
<div class="row">
 <div class="col-xs-3"> 
</div>
<div class="col-md-6" style="border:solid white 2px; border-radius:10px;  background:rgba(255,255,255,0.9); padding:20px;"> 
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
									 
		<center>
		<form method="POST" action="makeorder.php">
		<b>SELECT COLLECTION CENTER</b>
		<BR />
			<select name='clcenter' required='required' >
			<option></option>
			<?php 
			$results = mysql_query("SELECT * FROM `collection_center`") or die (mysql_error());
			while($project = mysql_fetch_array($results)){
				echo "<option>".$project['name']."</option>";	
			}
			?>
			
			</select><BR /><BR />


											
		<button type='submit' class='btn btn-warning' name='order' >
		<font color=white>  ORDER NOW </font></button></form>
		</center>
</div>
<BR /><BR />


<br />
<?php include("mainfooter.php");?>
</div>
</body>





<?php
//SMS CODE TO THE SUPPLIER 
error_reporting(0);
$resultse = mysql_query("SELECT * FROM `cart`") or die (mysql_error());
while($projecte = mysql_fetch_array($resultse)){
 $resultsb = mysql_query("SELECT * FROM equipment where name='".$projecte['name']."' ") or die (mysql_error());
 if(mysql_num_rows($resultsb)>0){
   while($equipment = mysql_fetch_array($resultsb)){
   	  $resultsc = mysql_query("SELECT * FROM supplier where supplier_name='".$equipment['owner']."' ") or die (mysql_error());
	  if($row = mysql_fetch_array($resultsc)){
	    $phone = '+254'.$row['phone'];
		//SMS
		$message = 'Client '.$projecte['orderby'].' has  succesfully ordered '.$projecte['qty'].' units of equipment '.$projecte['name'].',  which amounts to KShs '.$projecte['tatol'].'. Kindly process the order.';


// Be sure to include the file you've just downloaded
require_once('sms/AfricasTalkingGateway.php');
// Specify your login credentials
$username   = "alcajerah";
$apikey     = "a520bfc640a07cf33568ec6dc2ab893c7ec11050eb2d217a566427ed878c26c6";
// Specify the numbers that you want to send to in a comma-separated list
// Please ensure you include the country code (+254 for Kenya in this case)
$recipients = $phone;
// And of course we want our recipients to know what we really do
$message    = $message;
// Create a new instance of our awesome gateway class
$gateway    = new AfricasTalkingGateway($username, $apikey);
// Any gateway error will be captured by our custom Exception class below, 
// so wrap the call in a try-catch block
try 
{ 
  // Thats it, hit send and we'll take care of the rest. 
  $results = $gateway->sendMessage($recipients, $message);
            
  //foreach($results as $result) {
    // status is either "Success" or "error message"
    //echo " Number: " .$result->number;
    //echo " Status: " .$result->status;
    //echo " MessageId: " .$result->messageId;
    //echo " Cost: "   .$result->cost."\n";
	
//echo ("<script language='javascript'> window.alert('succesfully ordered. sms notification sent to the supplier.')<//script>");
//echo "<meta http-equiv='refresh' content='0;url=shopping_cart.php'> ";
	
 // }
}
catch ( AfricasTalkingGatewayException $e )
{
  echo "Encountered an error while sending: ".$e->getMessage();
}
		
	  }
   }
  }
  }
  
  
 
  //sms to the farmer
  $resultsf = mysql_query("SELECT * FROM `cart`") or die (mysql_error());
$num2 = mysql_num_rows($resultsf);
while($projectf = mysql_fetch_array($resultsf)){
   $resultsx = mysql_query("SELECT * FROM products where name='".$projectf['name']."' ") or die (mysql_error());
    if(mysql_num_rows($resultsx)>0){
   while($products = mysql_fetch_array($resultsx)){
	  $resultsy = mysql_query("SELECT * FROM farmer where farmer_name='".$products['owner']."' ") or die (mysql_error());
	  if($row = mysql_fetch_array($resultsy)){
	    
		$phone = '+254'.$row['phone'];
		//SMS
		$message = 'Client '.$projectf['orderby'].', has  succesfully ordered '.$projectf['qty'].' Kgs/Ltrls of product '.$projectf['name'].', which amounts to KShs '.$projectf['tatol'].'. Kindly process the order.';


// Be sure to include the file you've just downloaded
require_once('sms/AfricasTalkingGateway.php');
// Specify your login credentials
$username   = "alcajerah";
$apikey     = "a520bfc640a07cf33568ec6dc2ab893c7ec11050eb2d217a566427ed878c26c6";
// Specify the numbers that you want to send to in a comma-separated list
// Please ensure you include the country code (+254 for Kenya in this case)
$recipients = $phone;
// And of course we want our recipients to know what we really do
$message    = $message;
// Create a new instance of our awesome gateway class
$gateway    = new AfricasTalkingGateway($username, $apikey);
// Any gateway error will be captured by our custom Exception class below, 
// so wrap the call in a try-catch block
try 
{ 
  // Thats it, hit send and we'll take care of the rest. 
  $results = $gateway->sendMessage($recipients, $message);
            
  //foreach($results as $result) {
    // status is either "Success" or "error message"

    //echo " Number: " .$result->number;
    //echo " Status: " .$result->status;
    //echo " MessageId: " .$result->messageId;
    //echo " Cost: "   .$result->cost."\n";
	
//echo ("<script language='javascript'> window.alert('succesfully ordered.SMS sent to the farmer.')<//script>");
//echo "<meta http-equiv='refresh' content='0;url=shopping_cart.php'> "; 
	
 // }
}
catch ( AfricasTalkingGatewayException $e )
{
  echo "Encountered an error while sending: ".$e->getMessage();
}
		
	  }
   }
  }
  
  }
?>
 