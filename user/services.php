
<?php
 session_start();
if(isset($_SESSION['loguser'])){}else{
	echo '<div style="text-align:center;background-color:green">
<h1>YOU MUST LOGIN FIRST</h1>
<a href="login.php" > LOGIN </a><br /> 
</div>';
 echo "<script> alert('You required login first');</script>";	
header('refresh:2; url="login.php"');
die();
}

?>
 <body style="background: url(img/index.jpg) no-repeat center center fixed">
 <?php include("mainheader.php");?>
 <div class="container">
<div class="row">
 <?php include("servicesidebar.php");?>
 
<div class="col-md-10 hidden-xs" >

<center><img class="img img-responsive" src="img/mainlogo.jpg" /></center>
</div>
 
 
</div>
<BR />


<br />
<?php include("mainfooter.php");?>
</div>
</body>