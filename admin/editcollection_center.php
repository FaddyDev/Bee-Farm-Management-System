<?php include('header.php'); ?>
<?php include('session.php'); ?>
<?php $get_id = $_GET['id']; ?>
    <body>
		<?php include('navbar.php'); ?>
        <div class="container-fluid">
            <div class="row-fluid">
				<?php include('collection_sidebar.php'); ?>
				
						<div class="span7" id="content">
		                    <div class="row-fluid">
									 <a href="add_farmer.php" class="btn btn-info"><i class="icon-plus-sign icon-large"></i> Add collection center</a>
		                        <!-- block -->
		                        <div id="" class="block">
		                            <div class="navbar navbar-inner block-header">
		                                <div class="muted pull-left">Edit collection center details</div>
		                            </div>
		                            <div class="block-content collapse in">
									<a href="collection.php"><i class="icon-arrow-left"></i> Back</a>
									
									<?php
									$query = mysql_query("select * from collection_center where center_id = '$get_id'")or die(mysql_error());
									$row = mysql_fetch_array($query);
									?>
									
									    <form class="form-horizontal" method="post">
										<div class="control-group">
											<label class="control-label" for="focusedInput">Collection center name</label>
											<div class="controls">
											<input type="text" value="<?php echo $row['name']; ?>" name="name" id="focusedInput" placeholder="Collection center name">
											</div>
										</div>
										<div class="control-group">
											<label class="control-label" for="focusedInput">Location</label>
											<div class="controls">
											<input type="text" value="<?php echo $row['location']; ?>" class="span8" name="location" id="focusedInput" placeholder="Location">
											</div>
										</div>
										<div class="control-group">
											<label class="control-label" for="focusedInput">Phone</label>
											<div class="controls">
											<input type="text" value="<?php echo $row['phone']; ?>" class="span8" name="phone" id="focusedInput"  placeholder="Phone">
											</div>
										</div>
										<div class="control-group">
											<label class="control-label" for="focusedInput">Paybill</label>
											<div class="controls">
											<input type="text" value="<?php echo $row['paybill']; ?>" class="span8" name="paybill" id="focusedInput"  placeholder="Paybill">
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
                                          $location = $_POST['location'];
                                          $phone = $_POST['phone'];
										  $paybill = $_POST['paybill'];
                                         
                                       
 
										
										
									
										 mysql_query("update collection_center set name ='$name',location='$location', phone='$phone', paybill='$paybill' where center_id = '$get_id' ")or die(mysql_error());
																		
										mysql_query("insert into activity_log (date,username,action) values(NOW(),'$user_username','Edit collection center details of  $name')")or die(mysql_error());
										
										?>
										<script>
										window.location = "collection.php";
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