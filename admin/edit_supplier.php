<?php include('header.php'); ?>
<?php include('session.php'); ?>
<?php $get_id = $_GET['id']; ?>
    <body>
		<?php include('navbar.php'); ?>
        <div class="container-fluid">
            <div class="row-fluid">
				<?php include('supplier_sidebar.php'); ?>
				
						<div class="span7" id="content">
		                    <div class="row-fluid">
									 <a href="add_supplier.php" class="btn btn-info"><i class="icon-plus-sign icon-large"></i> Add suppliers</a>
		                        <!-- block -->
		                        <div id="" class="block">
		                            <div class="navbar navbar-inner block-header">
		                                <div class="muted pull-left">Edit supplier details</div>
		                            </div>
		                            <div class="block-content collapse in">
									<a href="supplier.php"><i class="icon-arrow-left"></i> Back</a>
									
									<?php
									$query = mysql_query("select * from supplier where supplier_id = '$get_id'")or die(mysql_error());
									$row = mysql_fetch_array($query);
									?>
									
									    <form class="form-horizontal" method="post">
										<div class="control-group">
											<label class="control-label" for="focusedInput">Supplier name</label>
											<div class="controls">
											<input type="text" value="<?php echo $row['supplier_name']; ?>" name="supplier_name" id="focusedInput" placeholder="supplier name">
											</div>
										</div>
										<div class="control-group">
											<label class="control-label" for="focusedInput">Supplier Address</label>
											<div class="controls">
											<input type="text" value="<?php echo $row['supplier_address']; ?>" class="span8" name="supplier_address" id="focusedInput" placeholder="Supplier Address">
											</div>
										</div>
										<div class="control-group">
											<label class="control-label" for="focusedInput">Phone</label>
											<div class="controls">
											<input type="text" value="<?php echo $row['phone']; ?>" class="span8" name="phone" id="focusedInput" required>
											</div>
										</div>
										<div class="control-group">
											<label class="control-label" for="focusedInput">Location</label>
											<div class="controls">
											<input type="text" value="<?php echo $row['location']; ?>" class="span8" name="location" id="focusedInput" required>
											</div>
										</div>
										<div class="control-group">
											<label class="control-label" for="focusedInput">Description</label>
											<div class="controls">
											<input type="text" value="<?php echo $row['description']; ?>" class="span18" name="description" id="focusedInput" required>
											</div>
										
										
												
																		
											
									 <div class="control-group">
										<div class="controls">
										
										<button name="update" type="submit" class="btn btn-info"><i class="icon-save icon-large"></i> Update</button>
										</div>
										</div>
										</form>
										
										<?php
										if (isset($_POST['update'])){
										
                                          $supplier_name = $_POST['supplier_name'];
                                          $supplier_address = $_POST['supplier_address'];
                                          $phone = $_POST['phone'];
                                          $location = $_POST['location'];
                                          $description = $_POST['description'];
 
										
										
									
										 mysql_query("update supplier set supplier_name = '$supplier_name',supplier_address='$supplier_address', phone='$phone' ,location='$location', description='$description' where supplier_id = '$get_id' ")or die(mysql_error());
																		
										mysql_query("insert into activity_log (date,username,action) values(NOW(),'$user_username','Edit supplier details of $sn')")or die(mysql_error());
										
										?>
										<script>
										window.location = "supplier.php";
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

        </div>
		<?php include('script.php'); ?>
    </body>

</html>