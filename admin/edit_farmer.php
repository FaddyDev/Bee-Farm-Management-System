<?php include('header.php'); ?>
<?php include('session.php'); ?>
<?php $get_id = $_GET['id']; ?>
    <body>
		<?php include('navbar.php'); ?>
        <div class="container-fluid">
            <div class="row-fluid">
				<?php include('farmer_sidebar.php'); ?>
				
						<div class="span7" id="content">
		                    <div class="row-fluid">
									 <a href="add_farmer.php" class="btn btn-info"><i class="icon-plus-sign icon-large"></i> Add farmer</a>
		                        <!-- block -->
		                        <div id="" class="block">
		                            <div class="navbar navbar-inner block-header">
		                                <div class="muted pull-left">Edit farmer details</div>
		                            </div>
		                            <div class="block-content collapse in">
									<a href="farmer.php"><i class="icon-arrow-left"></i> Back</a>
									
									<?php
									$query = mysql_query("select * from farmer where farmer_id = '$get_id'")or die(mysql_error());
									$row = mysql_fetch_array($query);
									?>
									
									    <form class="form-horizontal" method="post">
										<div class="control-group">
											<label class="control-label" for="focusedInput">Farmer name</label>
											<div class="controls">
											<input type="text" value="<?php echo $row['farmer_name']; ?>" name="farmer_name" id="focusedInput" placeholder="Farmer name">
											</div>
										</div>
										<div class="control-group">
											<label class="control-label" for="focusedInput">Supplier Address</label>
											<div class="controls">
											<input type="text" value="<?php echo $row['email']; ?>" class="span8" name="email" id="focusedInput" placeholder="Farmer Address">
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
										
                                          $farmer_name = $_POST['farmer_name'];
                                          $email = $_POST['email'];
                                          $phone = $_POST['phone'];
                                          $location = $_POST['location'];
                                          $description = $_POST['description'];
 
										
										
									
										 mysql_query("update farmer set farmer_name = '$farmer_name',email='$email', phone='$phone' ,location='$location', description='$description' where farmer_id = '$get_id' ")or die(mysql_error());
																		
										mysql_query("insert into activity_log (date,username,action) values(NOW(),'$user_username','Edit product details of $farmer_name')")or die(mysql_error());
										
										?>
										<script>
										window.location = "farmer.php";
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