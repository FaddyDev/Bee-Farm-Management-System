<?php include('header.php'); ?>
<?php include('session.php'); ?>
    <body>
		<?php include('navbar.php'); ?>
        <div class="container-fluid">
            <div class="row-fluid">
				<?php include('supplier_sidebar.php'); ?>
				<div class="span3" id="adduser">
					   			
				</div>
                <div class="span10" id="adduser">
                     <div class="row-fluid">
					  <a href="add_supplier.php" class="btn btn-info"><i class="icon-plus-sign icon-large"></i> Add supplier</a>
                        <!-- block -->
                        <div id="block_bg" class="block">
                            <div class="navbar navbar-inner block-header">
                               
							   
								 <div class = "panel-heading" style="background-color:green;"> 
								<font color=white><center><h3 class ="panel-title"><b>EQUIPMENT SUPPLIERS LIST</b></center></h3></font>
								
                            </div>
                            <div class="block-content collapse in">
                                <div class="span12">
									<form action="delete_supplier.php" method="post">
  									<table cellpadding="1" cellspacing="0" border="1" class="table" id="example">
									<a data-toggle="modal" href="#supplier_delete" id="delete"  class="btn btn-danger" name=""><i class="icon-trash icon-large"></i></a>
									<?php include('modal_delete.php'); ?>
										<thead>
										  <tr>
												<th></th>
												<th>SUPPLIER NAME</th>
												<th>SUPPLIER ADDRESS</th>
												<th>PHONE</th>
												<th>LOCATION</th>
												<th>DESCRIPTION</th>
											
												<th></th>
										   </tr>
										</thead>
										<tbody>
													<?php
													$user_query = mysql_query("select * from supplier")or die(mysql_error());
													while($row = mysql_fetch_array($user_query)){
													$id = $row['supplier_id'];
													?>
									
													<tr>
														<td width="30">
														<input id="optionsCheckbox" class="uniform_on" name="selector[]" type="checkbox" value="<?php echo $id; ?>">
														</td>
														<td><?php echo $row['supplier_name']; ?></td>
														<td><?php echo $row['supplier_address']; ?></td>
														<td><?php echo $row['phone']; ?></td>
														<td><?php echo $row['location']; ?></td>
														<td><?php echo $row['description']; ?></td>
														
												
														<td width="30"><a href="edit_supplier.php<?php echo '?id='.$id; ?>" class="btn btn-success"><i class="icon-pencil icon-large"></i></a></td>

                               
													</tr>
												<?php } ?>
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
		
        </div>
		<?php include('script.php'); ?>
    </body>

</html>