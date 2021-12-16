<?php include('header.php'); ?>
<?php include('session.php'); ?>
 <script>
  $(function() {
    $( ".datepicker" ).datepicker({dateFormat: "yy/mm/dd",maxDate: new Date()});
  });
  </script>
    <body>
		<?php include('navbar.php'); ?>
        <div class="container-fluid">
            <div class="row-fluid">
				<?php include('equipment_sidebar.php'); ?>
		
						<div class="span9" id="content">
		                    <div class="row-fluid">
							
		                        <!-- block -->
		                        <div class="block">
		                            <div class="navbar navbar-inner block-header">
		                                <div class="muted pull-left">Add Equipment</div>
		                            </div>
		                            <div class="block-content collapse in">
									<a href="equipment.php"><i class="icon-arrow-left"></i> Back</a>
									<form class="form-horizontal" method="post">
										<div class="control-group">
											<label class="control-label" for="inputEmail">Equipment name</label>
											<div class="controls">
											<input type="text" name="name" id="focusedInput" placeholder="Equipment name" required pattern="[a-zA-Z][a-zA-Z0-9\s]*">
											</div>
										</div>
										<div class="control-group">
											<label class="control-label" for="inputPassword">Description</label>
											<div class="controls">
											<input type="text" class="span8" name="description" id="focusedInput" placeholder="Description" required pattern="[a-zA-Z][a-zA-Z0-9\s]*">
											</div>
										</div>
										<div class="control-group">
											<label class="control-label" for="inputPassword">Price</label>
											<div class="controls">
											<input type="integer" class="span8" name="price" id="focusedInput" placeholder="price" required >
											</div>
										</div>
										<div class="control-group">
											<label class="control-label" for="inputPassword">Quantity</label>
											<div class="controls">
											<input type="integer" class="span8" name="quantity" id="focusedInput" placeholder="quantity" required >
											</div>
										</div>
										<div class="control-group">
											<label class="control-label" for="inputPassword">Owner</label>
											<div class="controls">
											<input type="text" class="span8" name="owner" id="focusedInput" placeholder="owner" required pattern="[a-zA-Z][a-zA-Z0-9\s]*">
											</div>
										    </div>
										     <div class="control-group">
											<label class="control-label" for="inputPassword">Image</label>
											<div class="controls">
											
									        <input type="file" class="span8" name="image" id="focusedInput" placeholder="image" accept="image/x-png, image/gif, image/jpeg" required pattern>
											
                                                                    
		
											
											<?php
                                               
                                             if (!isset($_FILES['image']['tmp_name'])) {
	                                                echo "";
	                                                  }else{
	                                                      $file=$_FILES['image']['tmp_name'];
	                                                      $image= addslashes(file_get_contents($_FILES['image']['tmp_name']));
	                                                      $image_name= addslashes($_FILES['image']['name']);
	                                                      $image_size= getimagesize($_FILES['image']['tmp_name']);

	
		                                                 if ($image_size==FALSE) {
		
			                                            echo "That's not an image!";
			
		                                                }else{
			
			                                          move_uploaded_file($_FILES["image"]["tmp_name"],"equipment-uploads/" . $_FILES["image"]["name"]);
			
			                                           $location="equipment-uploads/" . $_FILES["image"]["name"];
			                                           $name=$_POST['name'];
			                                           $number=$_POST['number'];
			                                           $descr=$_POST['descr'];
			
                                                  $query=mysql_query("insert into equipment ( image )VALUES('$image')");
			
			                                       echo ("<script language='javascript'> window.alert('image successfully  added')</script>");
			                                       echo "<meta http-equiv='refresh' content='0;url=product.php'> ";
			                                      }
	                                                }
                                                        ?>
                                                 </div>
											</div>
											<div class="controls">
											<input type="text" class="datepicker" name="date" id="focusedInput" placeholder=" date uploaded" onKeyDown="return false" autocomplete="off" required ">
											<script type="text/javascript">
                                                $(function () {
                                                $('#focusedInput').datetimepicker();
                                                            });
                                                        </script>
											
											</div>
										    </div>

			
										<div class="control-group">
										<div class="controls">
										<button name="save" type="submit" class="btn btn-info"><i class="icon-save"></i> Save</button>
										</div>
										</div>
										</form
										
										<?php
										if (isset($_POST['save'])){
										$name = $_POST['name'];
										$description = $_POST['description'];
										$price = $_POST['price'];
										$quantity= $_POST['quantity'];
										$owner = $_POST['owner'];
										$image = $_POST['image'];
										$date = $_POST['date'];
									;
										
										
										
										
										$query = mysql_query("select * from equipment where name = '$name' and description='$description' and price='$price' and quantity='$quantity' and owner='$owner' and image='$image' and date='$date'")or die(mysql_error());
										$count = mysql_num_rows($query);

										if ($count > 0){ ?>
										<script>
										alert('Data Already Exist');
										</script>
										<?php
										}else{
										mysql_query("insert into equipment (name,description,price,quantity,owner,image,date) values('$name','$description','$price','$quantity','$owner','$image','$date')")or die(mysql_error());
										
										
										mysql_query("insert into activity_log (date,username,action) values(NOW(),'$user_username','Add equipment $name')")or die(mysql_error());
										
										
										?>
										<script>
										window.location = "equipment.php";
										</script>
										<?php
										}
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