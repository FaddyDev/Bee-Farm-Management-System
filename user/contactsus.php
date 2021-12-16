
<?php
 session_start();

 
 if(isset($_POST['btnsend'])){
	 $username = $_POST['cstname'];
	 $mail = $_POST['useremail'];
	 $message = $_POST['message'];
	 $date = date('Y-m-d');
	 $time = date('H:i:s');
	 
	 include("include/connection.php");
	 mysql_query("INSERT INTO `usercomment`(`cmt_id`,`username`,`mail`, `msg`, `date`, `time`) VALUES (null,'$username','$mail','$message','$date','$time')")or die (mysql_error());

	 
	 
	 
	 
	 
	 require_once "Mail.php";
	 $from ='<brianmubix@gmail.com>';
	 $to ="<".$mail.">";
	 $subject = 'Mukulima Bee team thanks you';
	 $body = "Hi, How are you? \nThank you for sending us a direct message. We will keep you updated.\n
	 From Mkulima Bee team. \n\n\nEmail auto generated. No reply.";
	 
	 $headers =array(
	 'From'=>$from,
	 'To'=>$to,
	 'Subject'=>$subject
	 );
	 
	 $smtp = Mail::factory('smtp', array(
	 'host'=>'ssl://smtp.gmail.com',
	 'port'=>'465',  
	 'auth'=>true, 
	 'username'=>'brianmubix@gmail.com',
	 'password'=>'2377116bmk'
	 ));
	 
	 $mail = $smtp->send($to, $headers, $body);
	 
	 if(PEAR::isError($mail)){		 
		//$error= '"'.$mail->getMessage().'"';
		//echo "<script>alert('OOPS ERROR !!     ".$error."')</script>";
	 }else{}		

	 
		echo "<script>alert('Message sent successfully. Thank You.')</script>";
	 
 }
 
 
?>
<!DOCTYPE html>
<html>
<head>
<title>Contact us</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<link href="layout/styles/layout.css" rel="stylesheet" type="text/css" media="all">
</head>



 <body style="background: url(img/index.jpg) no-repeat center center fixed">
 <?php include("mainheader.php");?>
 <div class="container">
<div class="row">

<div class="col-md-5" style="border:solid white 2px; border-radius:10px;  background:rgba(255,255,255,0.7); padding:20px;">

<center><h4 class="page-header"><U><B>SEND US A DIRECT MESSAGE </B></U></h4><center><br/>


<form method="post" action="">

<input type="text" name="cstname" class="form-control" placeholder="NAME" required='required'/>
<BR/><BR/>

<input name="useremail" class="form-control" type="email"  placeholder="Enter Email Here&hellip;" required='required' /><BR/><BR/>
<textarea rows=5 cols=40 name='message' placeholder="Type Your Message Here.." required='required'></textarea><BR/><BR/>

<center><input name="btnsend" class="btn btn-success" type="submit" value="SEND"  /></center><BR/><BR/><BR/>



</form>


 <!-- ################################################################################################ -->
          <h4><font color=#000000>THESE ARE FELLOW CUSTOMERS' VIEWS ON OUR PRODUCTS</font></h4>		  
          <ul class="nospace listing">
		  
		  <?php			
			$results = mysql_query("SELECT * FROM `usercomment` ORDER BY `cmt_id` DESC") or die (mysql_error());
			while($views = mysql_fetch_array($results)){
				echo '<li class="clear">
					  <div class="imgl borderedbox"> Date:   '.$views['date'].'  Time:   '.$views['time'].'</div>
					  <p class="nospace btmspace-15"><font color=#DC143C>'.$views['username'].' said: </font></p>
					  <p>'.$views['msg'].'</p>
					</li>';
			}
		  ?>
            
          </ul>
          
  <!-- ################################################################################################ --> 
		
		
</div>



<div class="col-md-1"></div>
<div class="col-md-6" style="border:solid white 2px; border-radius:10px;  background:rgba(255,255,255,0.7); padding:20px;">

		<center><h1 class="page-header"><U><B>Contact Us </B></U></h1><center><br/>

		  <div class="col-md-6">
				<figure class="center"><img class="img img-responsive" src="img/phone.png" alt="">          
				</figure>
		  </div>
		  <div class="col-md-6" style="text-align:left;">
		      
				<address>
					Mkulima Bee Online System<br>
					Nyandarua<br>        
					141-60600<br>
					<br>
					<span class="glyphicon glyphicon-earphone"></span> 0719487189<br>
					<span class="glyphicon glyphicon-earphone"></span> 0733902511<br>
					<span class="glyphicon glyphicon-envelope"></span> <a href="#">lieutenantmunene@gmail.com</a>
				</address>
		 </div>	
		 <div class="col-md-12" >
		 <br /><br /><br />
		 
		  Follow us on Social media 
        <ul class="faico clear">
          <li><a class="faicon-twitter" href="#"><i class="fa fa-twitter"></i></a></li>
          <li><a class="faicon-linkedin" href="#"><i class="fa fa-linkedin"></i></a></li>
          <li><a class="faicon-facebook" href="https://wwww.facebook.com/freshya.bright/" target="_blank"><i class="fa fa-facebook"></i></a></li>
          <li><a class="faicon-flickr" href="#"><i class="fa fa-instagram"></i></a></li>
        </ul>     
		 
		 <br /><br /><br />
		  <figure class="center"><img class="btmspace-15" src="img/worldmap.png" alt="">
          <figcaption><a href="#">Find Us With Google Maps &raquo;</a></figcaption>
          </figure>	
		</div>
		
</div>
</div>
<BR />
<div class="row">


</div>

<br />
<?php include("mainfooter.php");?>
</div>


<!-- JAVASCRIPTS --> 
<script src="layout/scripts/jquery.min.js"></script> 
<script src="layout/scripts/jquery.fitvids.min.js"></script> 
<script src="layout/scripts/jquery.mobilemenu.js"></script> 
<script src="layout/scripts/tabslet/jquery.tabslet.min.js"></script>
</body>
</html>