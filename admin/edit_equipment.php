<?php include('header.php'); ?>
<?php include('session.php'); ?>
<?php $get_id = $_GET['id']; ?>
    <body>
		<?php include('navbar.php'); ?>
        <div class="container-fluid">
            <div class="row-fluid">
				<?php include('equipment_sidebar.php'); ?>
		
						<div class="span7" id="content">
		                    <div class="row-fluid">
									 <a href="add_equipment.php" class="btn btn-info"><i class="icon-plus-sign icon-large"></i> Add equipment</a>
		                        <!-- block -->
		                        <div id="" class="block">
		                            <div class="navbar navbar-inner block-header">
		                                <div class="muted pull-left">Edit equipment details</div>
		                            </div>
		                            <div class="block-content collapse in">
									<a href="equipment.php"><i class="icon-arrow-left"></i> Back</a>
									
									<?php
									$query = mysql_query("select * from equipment where equipment_id = '$get_id'")or die(mysql_error());
									$row = mysql_fetch_array($query);
									?>
									
									    <form class="form-horizontal" method="post">
										<div class="control-group">
											<label class="control-label" for="focusedInput">Equipment name</label>
											<div class="controls">
											<input type="text" value="<?php echo $row['name']; ?>" class="span8" name="name" id="focusedInput" placeholder="Equipment name">
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
											<label class="control-label" for="inputPassword">owner</label>
											<div class="controls">
											       <select name="owner" class="input-block-level span5" required>
						                           <option></option>
						                           <?php
						                           $query = mysql_query("select * from supplier order by supplier_name ")or die(mysql_error());
						                           while($row = mysql_fetch_array($query)){
						                           ?>
						                           <option value="<?php echo $row['supplier_name']; ?>"><?php echo $row['supplier_name']; ?></option>
						                           <?php
						                           }
						                           ?>
					                               </select>
											</div>
										</div>
										<div class="control-group">
											<label class="control-label" for="inputPassword">Image</label>
											<div class="controls">
											
									        <input type="file" class="span8" name="pic" id="pic" placeholder="image" accept="image/*" required='required' >
											
                                                 </div>
											</div>
										<div class="controls">
											<input type="text" class="datepicker" name="date" id="focusedInput" placeholder="date uploaded" onKeyDown="return false" autocomplete="off" required='required' ">
											<script type="text/javascript">
                                                $(function () {
                                                $('#focusedInput').datetimepicker();
                                                            });
                                                        </script>
											
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
										
										$date = $_POST['date'];
										
										
										//getting image
										$to ='equipment-uploads/';	
	                                    $photo= $_FILES["pic"]["name"];	
	                                    $type = $_FILES["pic"]["type"];	
	                                    $tmp = $_FILES["pic"]["tmp_name"];	
	                                    move_uploaded_file($tmp,$to.$photo);
										
										if (isset($_FILES['pic']['tmp_name'])) {
	                                                move_uploaded_file($_FILES["pic"]["tmp_name"],"equipment-uploads/" . $_FILES["pic"]["name"]);
											 }
								
										
									
										mysql_query("update equipment set name = '$name' ,description = '$description',price = '$price',quantity = '$quantity',owner='$owner',image='$photo',date='$date' where equipment_id = '$get_id' ")or die(mysql_error());
																		
																		
																		
																		
																		
																		
																		
										mysql_query("insert into activity_log (date,username,action) values(NOW(),'$user_username','Edit Equipment details of $name')")or die(mysql_error());
										
										?>
										<script>
										window.location = "equipment.php";
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