
<?php
 session_start();
if(isset($_SESSION['signupsucc'])){	$signsuc=$_SESSION['signupsucc'];	session_unset($_SESSION['signupsucc']);
}else{$signsuc="";}

$error="";
if(isset($_POST['login'])){
	$uname=$_POST['uname'];
	$pass=$_POST['pass'];
	include("include/connection.php");
	$sql=mysql_query("SELECT * FROM users WHERE `username`='$uname' && `password`='$pass'") or die (mysql_error());
	if(mysql_num_rows($sql) > 0){
		$_SESSION['loguser'] = $uname;
		header("location:services.php");
	}else{$error="<font color=red>OOPS!!<br /> Wrong username or password</font>";}
}

?>
 <body style="background: url(img/index.jpg) no-repeat center center fixed">
 <?php include("mainheader.php");?>
 <div class="container">
<div class="row">
<div class="col-md-4">
</div>
<div class="col-md-4" style="border:solid white 2px; border-radius:10px;  background:rgba(255,255,255,0.7); padding:20px;">

<form action="" method="post">
<center><U><B>SIGN IN</B></U><center><br/>
<?php echo $signsuc; ?>
<br />
<?php echo $error; ?>
<input type="text" name="uname"required='required' class="form-control" placeholder="USERNAME" /><br/>
<input type="password" name="pass" required='required' class="form-control" placeholder="PASSWORD" /><br/>
<input type="submit" name="login" class="btn btn-info" value="LOGIN"/><br/>
</form>
</div>
</div>
<BR />
<div class="row">

<div class="col-md-4">
</div>
<div class="col-md-4" style="border:solid white 2px; border-radius:10px;  background:rgba(255,255,255,0.7); padding:20px;">

<center>
<b>New to Mkulima Bee Online System<b>
<hr  /><br />
<a href="signup.php"><button type="submit" class="btn btn-warning "><span class='glyphicon glyphicon-log-in'> </span> <b>SIGN UP</b></button><a/>

<br/><br />
</center>
</div>
</div>

<br />
<?php include("mainfooter.php");?>
</div>
</body>