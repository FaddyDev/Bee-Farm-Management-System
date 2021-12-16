   <?php include('header.php'); ?>
   <?php include('session.php'); ?>
   <div class="row-fluid">
   <?php include('navbar.php'); ?>
        <div class="container-fluid">
            <div class="row-fluid">
				<?php include('supplier_sidebar.php'); ?>
			
                <div class="span6" id="content">
                     <div class="row-fluid">
                        <!-- block -->
                        <div class="block">
                            <div class="navbar navbar-inner block-header">
                               
								 <div class = "panel-heading" style="background-color:green;"> 
								<font color=white><center><h4 class ="panel-title"><b>ADD EQUIPMENT SUPPLIERS</b></center></h4></font>
                            </div>
							<div class="block-content collapse in">
									<a href="supplier.php"><i class="icon-arrow-left"></i> Back</a>
                            <div class="block-content collapse in">
                                <div class="span12">
								
								<form class="form-horizontal" method="post" action="add_supplier.php" enctype="multipart/form-data">
										<div class="control-group">
										<label class="control-label" for="inputEmail">Supplier name</label>
                                          <div class="controls">
                                            <input class="input focused" id="focusedInput" name="supplier_name" type="text" placeholder = "supplier name" required pattern="[a-zA-Z][a-zA-Z0-9\s]*">
                                          </div>
                                        </div>
										<div class="control-group">
										<label class="control-label" for="inputEmail">Supplier address</label>
                                          <div class="controls">
                                            <input class="input focused" id="focusedInput" name="supplier_address" type="email" placeholder = "supplier address" required >
                                          </div>
                                        </div>
										
										<div class="control-group">
										<label class="control-label" for="inputEmail">Contact</label>
                                          <div class="controls">
                                            <input class="input focused" id="focusedInput" name="phone" type="integer" placeholder = "contact phone" required >
                                          </div>
                                        </div>
										<div class="control-group">
										<label class="control-label" for="inputEmail">Location</label>
                                          <div class="controls">
                                            <input class="input focused" id="focusedInput" name="location" type="text" placeholder = "location" required pattern="[a-zA-Z][a-zA-Z0-9\s]*">
                                          </div>
                                        </div>
										<div class="control-group">
										<label class="control-label" for="inputEmail">Description</label>
                                          <div class="controls">
                                            <input class="input focused" id="focusedInput" name="description" type="text" placeholder = "Description" required >
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
if (isset($_POST['save'])){
$supplier_name = $_POST['supplier_name'];
$supplier_address = $_POST['supplier_address'];
$phone = $_POST['phone'];
$location= $_POST['location'];
$description = $_POST['description'];


$query = mysql_query("select * from supplier where supplier_name = '$supplier_name' and supplier_address='$supplier_address' and phone='$phone' and location='$location' and description='$description'")or die(mysql_error());
$count = mysql_num_rows($query);

if ($count > 0){ ?>
<script>
alert('Data Already Exist');
</script>
<?php
}else{
mysql_query("insert into supplier (supplier_name,supplier_address,phone,location,description) values('$supplier_name','$supplier_address','$phone','$location','$description')")or die(mysql_error());
?>
<script>
window.location = "supplier.php";
</script>
<?php
}
}
?>