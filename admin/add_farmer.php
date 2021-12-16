<?php include('header.php'); ?>
   <?php include('session.php'); ?> 
 <div class="row-fluid">
  <?php include('navbar.php'); ?>
   <div class="container-fluid">
            <div class="row-fluid">
				<?php include('farmer_sidebar.php'); ?>
				
                <div class="span6" id="content">
                     <div class="row-fluid">
                        <!-- block -->
                        <div class="block">
                            <div class="navbar navbar-inner block-header">
                                <div class="muted pull-left">Add  Bee Farmer</div>
                            </div>
							<div class="block-content collapse in">
									<a href="farmer.php"><i class="icon-arrow-left"></i> Back</a>
                            <div class="block-content collapse in">
                                <div class="span12">
								<form class="form-horizontal" method="post" action="add_farmer.php" enctype="multipart/form-data">
									
										<div class="control-group">
										<label class="control-label" for="focusedInput">Farmer name</label>
                                          <div class="controls">
                                            <input class="input focused" id="focusedInput" name="farmer_name" type="text" placeholder = "Farmer name" required pattern="[a-zA-Z][a-zA-Z0-9\s]*">
                                          </div>
                                        </div>
										<div class="control-group">
										<label class="control-label" for="focusedInput">Email Address</label>
                                          <div class="controls">
                                            <input class="input focused" id="focusedInput" name="email" type="email" placeholder = "Email address" required>
                                          </div>
                                        </div>
										
										<div class="control-group">
										<label class="control-label" for="focusedInput">Phone</label>
                                          <div class="controls">
                                            <input class="input focused" id="focusedInput" name="phone" type="integer" placeholder = " phone" required >
                                          </div>
                                        </div>
										<div class="control-group">
										<label class="control-label" for="focusedInput">Location</label>
                                          <div class="controls">
                                            <input class="input focused" id="focusedInput" name="location" type="text" placeholder = "location" required pattern="[a-zA-Z][a-zA-Z0-9\s]*">
                                          </div>
                                        </div>
										<div class="control-group">
										<label class="control-label" for="focusedInput">Description</label>
                                          <div class="controls">
                                            <input class="input focused" id="focusedInput" name="description" type="text" placeholder = "Description" required pattern="[a-zA-Z][a-zA-Z0-9\s]*">
                                          </div>
                                        </div>
										
										  
                                           
                                           <div class="control-group">
                                          <div class="controls">
												<button name="save" class="btn btn-info"><i class="icon-plus-sign icon-large"></i></button>

                                          </div>
                                        </div>
                                </form>
								</div>
                            </div>
                        </div>
                        <!-- /block -->
                    </div>
					
					
					    <?php
                            if (isset($_POST['save'])) {
                           
                                $farmer_name = $_POST['farmer_name'];
                                $email = $_POST['email'];
                                $phone = $_POST['phone'];
								$location = $_POST['location'];
								$description = $_POST['description'];
								
								
								$query = mysql_query("select * from farmer where farmer_name = '$farmer_name' and email = '$email' and  phone = '$phone' and location = '$location' and description = '$description'")or die(mysql_error());
								$count = mysql_num_rows($query);
								
								if ($count > 0){ ?>
								<script>
								alert('Data Already Exist');
								</script>
								<?php
								}else{

                                mysql_query("insert into farmer (farmer_name,email,phone,location,description)
								values ('$farmer_name','$email','$phone','$location','$description')         
								") or die(mysql_error()); ?>
								<script>
							 	window.location = "farmer.php"; 
								</script>
								<?php   }} ?>
						 
						 