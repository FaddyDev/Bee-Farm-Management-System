   <div class="row-fluid">
       <a href="farmer.php" class="btn btn-info"><i class="icon-plus-sign icon-large"></i> Add Bee Farmer</a>
                        <!-- block -->
                        <div class="block">
                            <div class="navbar navbar-inner block-header">
                                <div class="muted pull-left">Edit Bee Farmer Details</div>
                            </div>
                            <div class="block-content collapse in">
                                <div class="span12">
								<form method="post">
								
									<?php
									$query = mysql_query("select * from farmer where farmer_id = '$get_id' ")or die(mysql_error());
									$row = mysql_fetch_array($query);
									?>
										
										  <div class="block-content collapse in">
                                <div class="span12">
								<form method="post">
										<div class="control-group">
                                          <div class="controls">
                                            <input class="input focused" value="<?php echo $row['farmer_name']; ?>" id="focusedInput" name="farmer_name" type="text" placeholder = "Farmer name" required pattern="[a-zA-Z][a-zA-Z0-9\s]*">
                                          </div>
                                        </div>
										
										<div class="control-group">
                                          <div class="controls">
                                            <input class="input focused" value="<?php echo $row['email']; ?>" id="focusedInput" name="email" type="email" placeholder = "Email address" required pattern="[a-zA-Z][a-zA-Z0-9\.\s]*">
                                          </div>
                                        </div>
										<div class="control-group">
                                          <div class="controls">
                                            <input class="input focused" value="<?php echo $row['phone']; ?>" id="focusedInput" name="phone" type="text" placeholder = "phone" required pattern="[a-zA-Z][a-zA-Z0-9\s]*">
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
 

                                    $farmer_name = $_POST['farmer_name'];
                                    $email = $_POST['email'];
                                    $phone = $_POST['phone'];
                                    $location = $_POST['location'];
                                    $description = $_POST['description'];
 
 
 mysql_query("update department set farmer_name = '$farmer_name' , email='$email', phone='$phone' location='$location', description='$description' where farmer_id = '$get_id' ")or die(mysql_error());
 ?>
 <script>
 window.location='farmer.php'; 
 </script>
 <?php 
 }
 ?>
 