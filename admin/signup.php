<?php
		include('admin/dbcon.php');
		session_start();
		$firstname=$_POST['firstname'];
	    $lastname=$_POST['lastname'];
	     $category=$_POST['category'];
	     $username=$_POST['username'];
	    $password=$_POST['password'];
	    $cpassword=$_POST['cpassword'];

		$query = mysql_query("select * from users where firstname = '$firstname' and lastname='$lastname' and category='$category' and username='$username' and password='$password'")or die(mysql_error());
$count = mysql_num_rows($query);
if ($count > 0){ ?>
<script>
alert('Data Already Exist');
</script>
<?php
}else{
mysql_query("insert into users (firstname,lastname,category,username,password) values('$firstname','$lastname','$cp','$l','$d')")or die(mysql_error());

		$count = mysql_num_rows($query);
		$row = mysql_fetch_array($query);


		if ($count > 0){
		
		$_SESSION['id']=$row['user_id'];
		
		echo 'true';
		
		mysql_query("insert into user_log (username,login_date,user_id)values('$username',NOW(),".$row['user_id'].")")or die(mysql_error());
		 }else{ 
		echo 'false';
		}	
				
		?>