   <div class="row-fluid">
    <a href="supplier.php" class="btn btn-info"><i class="icon-plus-sign icon-large"></i> Add supplier</a>
                        <!-- block -->
                        <div class="block">
                            <div class="navbar navbar-inner block-header">
                                <div class = "panel-heading" style="background-color:green;"> 
								<font color=white><center><h4 class ="panel-title"><b>Edit equipment suppliers</b></center></h4></font>
                            </div>
							 <div class="block-content collapse in">
									<a href="supplier.php"><i class="icon-arrow-left"></i> Back</a>
							<?php 
							$query = mysql_query("select * from supplier where supplier_id = '$get_id'")or die(mysql_error());
							$row = mysql_fetch_array($query);
							?>
                            <div class="block-content collapse in">
                                <div class="span12">
								<form method="post">
										<div class="control-group">
                                          <div class="controls">
                                            <input class="input focused" value="<?php echo $row['supplier_name']; ?>" id="focusedInput" name="supplier_name" type="text" placeholder = "supplier name" required pattern="[a-zA-Z][a-zA-Z0-9\s]*">
                                          </div>
                                        </div>
										
										<div class="control-group">
                                          <div class="controls">
                                            <input class="input focused" value="<?php echo $row['supplier_address']; ?>" id="focusedInput" name="supplier_address" type="email" placeholder = "supplier address" required pattern="/^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i">
                                          </div>
                                        </div>
										<div class="control-group">
                                          <div class="controls">
                                            <input class="input focused" value="<?php echo $row['phone']; ?>" id="focusedInput" name="phone" type="text" placeholder = "phone" required >
                                          </div>
                                        </div>
										<div class="control-group">
                                          <div class="controls">
                                            <input class="input focused" value="<?php echo $row['location']; ?>" id="focusedInput" name="location" type="text" placeholder = "location" required pattern="[a-zA-Z][a-zA-Z0-9\s]*">
                                          </div>
                                        </div>
										<div class="control-group">
                                          <div class="controls">
                                            <input class="input focused" value="<?php echo $row['description']; ?>" id="focusedInput" name="description" type="text" placeholder = "Description" required pattern="[a-zA-Z][a-zA-Z0-9\s]*">
                                          </div>
                                        </div>
								
										
											<div class="control-group">
                                          <div class="controls">
												<button name="update" class="btn btn-success"><i class="icon-save icon-large"></i></button>

                                          </div>
                                        </div>
                                </form>
								</div>
                            </div>
                        </div>
                        <!-- /block -->
                    </div>
					
 <?php
 if (isset($_POST['update'])){
 

 $supplier_name = $_POST['supplier_name'];
 $supplier_address= $_POST['supplier_address'];
 $phone = $_POST['phone'];
 $location = $_POST['location'];
 $description = $_POST['description'];
 
 
 mysql_query("update supplier set supplier_name = '$supplier_name' , supplier_address='$supplier_address', phone='$phone' location='$location', description='$description' where department_id = '$get_id' ")or die(mysql_error());
 ?>
 <script>
 window.location='supplier.php'; 
 </script>
 <?php 
 }
 ?>
 