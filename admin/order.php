<?php include('header.php'); ?>
<?php include('session.php'); ?>
    <body>
		<?php include('navbar.php'); ?>
        <div class="container-fluid">
            <div class="row-fluid">
				<?php include('orders_sidebar.php'); ?>
		
                <div class="span10" id="content">
                     <div class="row-fluid">
					 
                        <!-- block -->
                        <div id="block_bg" class="block">
                            <div class="navbar navbar-inner block-header">
                                <div class = "panel-heading" style="background-color:green;"> 
								<font color=white><center><h3 class ="panel-title"><b>ORDERS LIST</b></center></h3></font>
								</div>
                            </div>
                            <div class="block-content collapse in">
                                <div class="span12">
									<form action="delete_equipment.php" method="post">
									<table cellpadding="1" cellspacing="0" border="1" class="table table-stripped table-hover table-bordered table-condensed" id="example">
  									 
	<thead>
		<tr>
			<th>PRODUCT NAME</th>
			<th>QUANTITY</th>
			<th>ORDER BY</th>
			<th>ORDER TIME</th>
			<th>COLLECTION CENTER</th>
		</tr>
	</thead>
	<tbody>		
		
		<?php
		require("dbcon.php");				
			$results = mysql_query("SELECT * FROM `order` ORDER BY `order_id` DESC") or die (mysql_error());			
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
									</form>
                                </div>
                            </div>
                        </div>
                        <!-- /block -->
                    </div>


                </div>
            </div>
		<?php include('footer.php'); ?>
        </div>
		<?php include('script.php'); ?>
    </body>

</html>