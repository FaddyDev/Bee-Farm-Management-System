<?php
session_start();
$error="";
if(isset($_POST['signup'])){
	
	if(($_POST['pass1']) != ($_POST['pass2'])){
		$error="<font color=red >PLEASE TRY AGAIN <br /> Passwords does not match</font>";			
	}else{
		$fname=$_POST['fname'];
		$sname=$_POST['sname'];
		$category=$_POST['category'];
		$uname=$_POST['uname'];
		$pass=$_POST['pass1'];
		
		include("include/connection.php");
		$sql=mysql_query("SELECT * FROM users WHERE `username`='$uname'") or die (mysql_error());
        if(mysql_num_rows($sql) == 0){			
			mysql_query("INSERT INTO `users`( `username`, `category`, `password`, `firstname`, `lastname`) 
			VALUES ('$uname','$category','$pass','$fname','$sname')") or die (mysql_error());
			
			$_SESSION['loguser'] = $uname;
			$_SESSION['signupsucc'] = "<font color='blue'> SIGN UP SUCCESSIFUL <br /> Please Login</font>";
			
			header('location:login.php');
			
		
			
		}else{
			$error="<font color='blue'>SORRY!!<br/>The username \"".$uname."\" is already taken!<br/ >please try using another</font>";		 
		}		
		
	}	
	
}
 
 ?>
 
 
 
 <body style="background: url(img/index.jpg) no-repeat center center fixed">
 <?php include("mainheader.php");?>
 <div class="container">
<div class="row">

<div class="col-md-4" style="border:solid white 2px; border-radius:10px;  background:rgba(255,255,255,0.7); padding:20px;">

<form action="signup.php" method="post">
<center>
<U><B>Sign Up As A New User</B></U><br/>
<?php  echo $error;?>

<center>
<input type="text" name="fname" required='required' class="form-control" placeholder="FIRST NAME" /><br/>
<input type="text" name="sname" required='required' class="form-control" placeholder="SECOND NAME" /><br/>
<select name="category" class="form-control" required='required' >
		<option></option>
		<option>Supplier</option>
		<option>Farmer</option>
		<option>Buyer</option>
</select><br/>

<input type="text" name="uname" required='required' class="form-control" placeholder="USERNAME" /><br/>
<input type="password" name="pass1" required='required' class="form-control" placeholder="PASSWORD" /><br/>
<input type="password" name="pass2" required='required'  class="form-control" placeholder=" CONFIRM PASSWORD" /><br/>
<input type="submit" name="signup" class="btn btn-info" value="SIGN UP"/><br/><br />
Already have an account? <a href="login.php">LOGIN</a>

</form>
</div>

<div class="col-md-8 hidden-xs" >

<center><img class="img img-responsive" src="img/mainlogo.jpg" /></center>
</div>
</div>
<BR />


<br />
<?php include("mainfooter.php");?>
</div>
</body>