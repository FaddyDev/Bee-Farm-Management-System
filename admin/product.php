<?php include('header.php'); ?>
<?php include('session.php'); ?>
    <body>
		<?php include('navbar.php'); ?>
        <div class="container-fluid">
            <div class="row-fluid">
				<?php include('product_sidebar.php'); ?>
				
                <div class="span9" id="">
                     <div class="row-fluid">
					  <a href="add_product.php" class="btn btn-info"><i class="icon-plus-sign icon-large"></i> Add Bee products</a>
                        <!-- block -->
                        <div id="block_bg" class="block">
                            <div class="navbar navbar-inner block-header">
                               
                                 <div class = "panel-heading" style="background-color:green;"> 
								<font color=white><center><h3 class ="panel-title"><b>BEE PRODUCTS</b></center></h3></font>
                            </div>
                            <div class="block-content collapse in">
                                <div class="span12">
									<form action="delete_product.php" method="post">
  									<table cellpadding="1" cellspacing="0" border="1" class="table" id="example">
										<a data-toggle="modal" href="#product_delete" id="delete"  class="btn btn-danger" name=""><i class="icon-trash icon-large"></i></a>
													<?php include('modal_delete.php'); ?>
									<thead>
										  <tr>
													<th></th>
													<th>Name</th>
													<th>Description</th>
													<th>Price</th>
													<th>Quantity</th>
													<th>Owner</th>
													<th>Image</th>
													<th></th>
										   </tr>
										</thead>
										<tbody>
										<?php
										$class_query = mysql_query("select * from  products ")or die(mysql_error());
										while($class_row = mysql_fetch_array($class_query)){
										$id = $class_row['product_id'];										
										?>
												
										<tr>
											<td width="30">
											<input id="optionsCheckbox" class="uniform_on" name="selector[]" type="checkbox" value="<?php echo $id; ?>">
											</td>
											<td><?php echo $class_row['name']; ?></td>
											<td><?php echo $class_row['description']; ?></td>
											<td><?php echo $class_row['price']; ?></td>
											<td><?php echo $class_row['quantity']; ?></td>
											<td><?php echo $class_row['owner']; ?></td>
											<td><img src="products-uploads/<?php echo $class_row['image']; ?>"</td>
											
											<td width="40"><a href="edit_product.php<?php echo '?id='.$id; ?>" class="btn btn-success"><i class="icon-pencil icon-large"></i> </a></td>
                                     
                               
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