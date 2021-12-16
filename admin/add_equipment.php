<?php include('header.php'); ?>
<?php include('session.php'); ?>
<?php
if(isset($_POST['save'])){
	
	$eqpname = $_POST['eqpname'];
	$description = $_POST['description'];
	$price = $_POST['price'];
	$quantity = $_POST['quantity'];
	$owner = $_POST['owner'];
	$date = $_POST['date'];
	
	//getting image
	$to ='equipment-uploads/';	
	$photo= $_FILES['pic']['name'];	
	$type = $_FILES['pic']['type'];	
	$tmp = $_FILES['pic']['tmp_name'];	
	move_uploaded_file($tmp,$to.$photo);
	

	
	require("dbcon.php");				
	$results = mysql_query("SELECT * FROM `equipment` WHERE `name`='$eqpname' ") or die (mysql_error());
	
	if(mysql_num_rows($results) == 0 ){
		mysql_query("INSERT INTO `equipment`(`equipment_id`, `name`, `description`, `price`, `quantity`, `owner`, `image`, `date`)
		VALUES (null,'$eqpname','$description','$price','$quantity','$owner','$photo','$date')") or die (mysql_error());
		echo "<script>alert('Equipment added Successifully')</script>";
		
	}else{echo "<script>alert('That Equipment name is already taken')</script>";}

	
	
	
}


?>
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
		
						<div class="span6" id="content">
		                    <div class="row-fluid">
							
		                        <!-- block -->
		                        <div class="block">
		                            <div class="navbar navbar-inner block-header">
		                               
										 <div class = "panel-heading" style="background-color:green;"> 
								<font color=white><center><h4 class ="panel-title"><b>ADD EQUIPMENT</b></center></h4></font>
		                            </div>
		                            <div class="block-content collapse in">
									<a href="equipment.php"><i class="icon-arrow-left"></i> Back</a>
									<form class="form-horizontal" method="post" action="add_equipment.php" enctype="multipart/form-data">
										<div class="control-group">
											<label class="control-label" for="inputEmail">Equipment name</label>
											<div class="controls">
											<input type="text" name="eqpname" id="focusedInput" placeholder="Equipment name" required='required' />
											</div>
										</div>
										<div class="control-group">
											<label class="control-label" for="inputPassword">Description</label>
											<div class="controls">
											<input type="text" class="span8" name="description" id="focusedInput" placeholder="Description" required='required' />
											</div>
										</div>
										<div class="control-group">
											<label class="control-label" for="inputPassword">Price</label>
											<div class="controls">
											<input type="integer" class="span8" name="price" id="focusedInput" placeholder="price" required='required' />
											</div>
										</div>
										<div class="control-group">
											<label class="control-label" for="inputPassword">Quantity</label>
											<div class="controls">
											<input type="integer" class="span8" name="quantity" id="focusedInput" placeholder="quantity" required='required' />
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
										<button name="save" type="submit" class="btn btn-info"><i class="icon-save"></i> Save</button>
										</div>
										</div>
										</form>
										
								
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