
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
		<font color=white><center><h3 class ="panel-title"><b>MY ORDERS LIST</b></center></h3></font>
		</div>
 <table class="table table-stripped table-hover table-bordered table-condensed" style="background-color:white;">
	<thead>
		<tr>
			<th>PRODUCT/EQUIPMENT NAME</th>
			<th>QUANTITY</th>
			<th>ORDER BY</th>
			<th>ORDER TIME</th>
			<th>COLLECTION CENTER</th>
		</tr>
	</thead>
	<tbody>		
		
		<?php
		require("include/connection.php");				
			$results = mysql_query("SELECT * FROM `order` WHERE `orderby` ='".$_SESSION['loguser']."' ORDER BY `order_id` DESC") or die (mysql_error());			
			while($project = mysql_fetch_array($results)){
				echo "
				<tr> 
					<td>".$project['product']."</td>
					<td>".$project['quantity']."</td>
					<td>".$project['orderby']."</td>
					<td>".$project['ordertime']."</td>
					<td>".$project['collection_center']."</td>		
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




