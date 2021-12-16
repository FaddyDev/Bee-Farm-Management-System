<?php

$results = mysql_query("SELECT * FROM `cart`") or die (mysql_error());
while($project = mysql_fetch_array($results)){
 $results = mysql_query("SELECT * FROM equipment where name='".$project['name']."' ") or die (mysql_error());
 if(mysql_num_rows($results)>0){
   while($equipment = mysql_fetch_array($results)){
	  $results = mysql_query("SELECT * FROM supplier where supplier_name='".$equipment['owner']."' ") or die (mysql_error());
	  if($row = mysql_fetch_array($results)){
	    $phone = '+254'.$row['phone'];
		//SMS
		
		$message = 'Client '.$project['orderby'].', has  succesfully ordered equipment '.$project['name'].', '.$project['qty'].' units which amounts to KShs '.$project['tatol'].' .Kindly confirm with the admin for more details ].';


// Be sure to include the file you've just downloaded
require_once('sms/AfricasTalkingGateway.php');
// Specify your login credentials
$username   = "Lieutenant";
$apikey     = "05325345203096267dec8f9b13dd01ae65e79f98ddc7a04071dd5161ea77e9aa";
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
            
  foreach($results as $result) {
    // status is either "Success" or "error message"
    //echo " Number: " .$result->number;
    //echo " Status: " .$result->status;
    //echo " MessageId: " .$result->messageId;
    //echo " Cost: "   .$result->cost."\n";
	
echo ("<script language='javascript'> window.alert('succesfully ordered.Kindly wait for confirmation through sms.')</script>");
echo "<meta http-equiv='refresh' content='0;url=ROOMDETAILS.php'> ";
	
  }
}
catch ( AfricasTalkingGatewayException $e )
{
  echo "Encountered an error while sending: ".$e->getMessage();
}
		
	  }
   }
  }
  
  
  
  //query products from the shopping cart
  
   $results = mysql_query("SELECT * FROM products where name='".$project['name']."' ") or die (mysql_error());
 if(mysql_num_rows($results)>0){
   while($products = mysql_fetch_array($results)){
	  $results = mysql_query("SELECT * FROM farmer where farmer_name='".$product['owner']."' ") or die (mysql_error());
	  if($row = mysql_fetch_array($results)){
	    
		$phone = '+254'.$row['phone'];
		//SMS
		$message = 'Client '.$project['orderby'].', has  succesfully ordered product '.$project['name'].', '.$project['qty'].' kgs which amounts to KShs '.$project['tatol'].' .Kindly confirm with the admin for more details ].';


// Be sure to include the file you've just downloaded
require_once('sms/AfricasTalkingGateway.php');
// Specify your login credentials
$username   = "Lieutenant";
$apikey     = "05325345203096267dec8f9b13dd01ae65e79f98ddc7a04071dd5161ea77e9aa";
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
            
  foreach($results as $result) {
    // status is either "Success" or "error message"
    //echo " Number: " .$result->number;
    //echo " Status: " .$result->status;
    //echo " MessageId: " .$result->messageId;
    //echo " Cost: "   .$result->cost."\n";
	
echo ("<script language='javascript'> window.alert('succesfully ordered.Kindly wait for confirmation through sms.')</script>");
echo "<meta http-equiv='refresh' content='0;url=ROOMDETAILS.php'> ";
	
  }
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
 