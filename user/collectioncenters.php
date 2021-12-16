
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
		<font color=white><center><h3 class ="panel-title"><b>COLLETION CENTERS</b></center></h3></font>
		</div>
 <table class="table table-stripped table-hover table-bordered table-condensed" style="background-color:white;">
	<thead>
		<tr>
			<th>CENTER NAME</th>
			<th>LOCATION</th>
			<th>PHONE</th>
			<th>PAYBILL</th>
			
		</tr>
	</thead>
	<tbody>		
		
		<?php
		require("include/connection.php");				
			$results = mysql_query("SELECT * FROM `collection_center` ") or die (mysql_error());			
			while($project = mysql_fetch_array($results)){
				echo "
				<tr> 
					<td>".$project['name']."</td>
					<td>".$project['location']."</td>
					<td>".$project['phone']."</td>
					<td>".$project['paybill']."</td>
							
				</tr>
				";
				
				
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