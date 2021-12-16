<<?php include('header.php'); ?>
<?php include('session.php'); ?>
<?php $get_id = $_GET['id']; ?>
    <body>
		<?php include('navbar.php'); ?>
        <div class="container-fluid">
            <div class="row-fluid">
				<?php include('product_sidebar.php'); ?>
		
						<div class="span7" id="content">
		                    <div class="row-fluid">
									 <a href="add_product.php" class="btn btn-info"><i class="icon-plus-sign icon-large"></i> Add product</a>
		                        <!-- block -->
		                        <div id="" class="block">
		                            <div class="navbar navbar-inner block-header">
		                                <div class="muted pull-left">Edit product details</div>
		                            </div>
		                            <div class="block-content collapse in">
									<a href="product.php"><i class="icon-arrow-left"></i> Back</a>
									
									<?php
									$query = mysql_query("select * from products where product_id = '$get_id'")or die(mysql_error());
									$row = mysql_fetch_array($query);
									?>
									
									    <form class="form-horizontal" method="post">
										<div class="control-group">
											<label class="control-label" for="focusedInput">Product name</label>
											<div class="controls">
											<input type="text" value="<?php echo $row['name']; ?>" class="span8" name="name" id="focusedInput" placeholder="Product name">
											</div>
										</div>
										<div class="control-group">
											<label class="control-label" for="focusedInput">Description</label>
											<div class="controls">
											<input type="text" value="<?php echo $row['description']; ?>" class="span8" name="description" id="focusedInput" placeholder="Description" required>
											</div>
										</div>
										<div class="control-group">
											<label class="control-label" for="focusedInput">Price</label>
											<div class="controls">
											<input type="text" value="<?php echo $row['price']; ?>" class="span4" name="price" id="focusedInput" required>
											</div>
											</div>
										
										<div class="control-group">
											<label class="control-label" for="focusedInput">Quantity</label>
											<div class="controls">
											<input type="text" value="<?php echo $row['quantity']; ?>" class="span4" name="quantity" id="focusedInput" required>
											</div>
										</div>
										<div class="control-group">
											<label class="control-label" for="focusedInput">Owner</label>
											<div class="controls">
											<input type="text" value="<?php echo $row['owner']; ?>" class="span8" name="owner" id="focusedInput" required>
											</div>
										</div>
										<div class="control-group">
											<label class="control-label" for="focusedInput">Image</label>
											<div class="controls">
											<input type="text" value="<?php echo $row['image']; ?>" class="span8" name="image" id="focusedInput" required>
											</div>
										</div>
										
										
												
																		
											
										<div class="control-group">
										<div class="controls">
										
										<button name="update" type="submit" class="btn btn-info"><i class="icon-save icon-large"></i> Update</button>
										</div>
										</div>
										</form>
										
										<?php
										if (isset($_POST['update'])){
										$name = $_POST['name'];
										$description = $_POST['description'];
										$price = $_POST['price'];
										$quantity= $_POST['quantity'];
										$owner = $_POST['owner'];
										$image = $_POST['image'];
										
										
										
									
										mysql_query("update products set name = '$name' ,description = '$description',price = '$price',quantity = '$quantity',owner='$owner',image='$image' where product_id = '$get_id' ")or die(mysql_error());
																		
																		
																		
																		
																		
																		
																		
										mysql_query("insert into activity_log (date,username,action) values(NOW(),'$user_username','Edit product details of  $name')")or die(mysql_error());
										
										?>
										<script>
										window.location = "product.php";
										</script>
										<?php
										}
										
										
										?>
									
								
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