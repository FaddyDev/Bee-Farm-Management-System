 <?php include('header.php'); ?>
   <?php include('session.php'); ?>  
 
  <?php include('navbar.php'); ?>
  <?php include('product_sidebar.php'); ?>
				
                <div class="span6" id="content">
                     <div class="row-fluid">
                        <!-- block -->
                        <div class="block">
                            <div class="navbar navbar-inner block-header">
                              
								<div class = "panel-heading" style="background-color:green;"> 
								<font color=white><center><h4 class ="panel-title"><b>ADD BEE PRODUCTS</b></center></h4></font>
                            </div>
							<div class="block-content collapse in">
									<a href="product.php"><i class="icon-arrow-left"></i> Back</a>
                            <div class="block-content collapse in">
                                <div class="span12">
								<form class="form-horizontal" method="post" action="add_product.php" enctype="multipart/form-data">
										<div class="control-group">
											<label class="control-label" for="inputEmail">Product name</label>
                                          <div class="controls">
                                            <input name="name" class="input focused" id="focusedInput" type="text" placeholder = "Product Name" required pattern="[a-zA-Z][a-zA-Z0-9\s]*">
                                          </div>
                                        </div>
										<div class="control-group">
											<label class="control-label" for="inputEmail">Description</label>
                                          <div class="controls">
                                            <input name="description" class="input focused" id="focusedInput" type="text" placeholder = "Description" required pattern="[a-zA-Z][a-zA-Z0-9\s]*">
                                          </div>
                                        </div>
										<div class="control-group">
											<label class="control-label" for="inputEmail">Price</label>
                                          <div class="controls">
                                            <input name="price" class="input focused" id="focusedInput" type="integer" placeholder = "Price" required >
                                          </div>
                                        </div>
										<div class="control-group">
											<label class="control-label" for="inputEmail">Quantity</label>
                                          <div class="controls">
                                            <input name="quantity" class="input focused" id="focusedInput" type="integer" placeholder = "Quantity" required >
                                          </div>
                                        </div>
										
										<div class="control-group">
											<label class="control-label" for="inputPassword">Farmer name</label>
											<div class="controls">
											       <select name="owner" class="input-block-level span5" required>
						                           <option></option>
						                           <?php
						                           $query = mysql_query("select * from farmer order by farmer_name ")or die(mysql_error());
						                           while($row = mysql_fetch_array($query)){
						                           ?>
						                           <option value="<?php echo $row['farmer_name'] ?>"><?php echo $row['farmer_name']; ?></option>
						                           <?php
						                           }
						                           ?>
					                               </select>
											</div>
										</div>
										<div class="controls">
												
									        <input type="file" class="span8" name="image" id="focusedInput" placeholder="image" accept="image/*" required pattern>
											
                                             </div>
											</div>
											<?php
                                               
                                             if (isset($_FILES['image']['tmp_name'])) {
	                                                move_uploaded_file($_FILES["image"]["tmp_name"],"products-uploads/" . $_FILES["image"]["name"]);
											 }
?>
										
										
									
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
                    </div><?php
if (isset($_POST['save'])){
$name = $_POST['name'];
$description= $_POST['description'];
$price = $_POST['price'];
$quantity = $_POST['quantity'];
$owner= $_POST['owner'];
$image = $_FILES['image']['name'];
$location = $_POST['location'];



$query = mysql_query("select * from products where name  =  '$name' ")or die(mysql_error());
$count = mysql_num_rows($query);

if ($count > 0){ ?>
<script>
alert('Date Already Exist');
</script>
<?php
}else{
mysql_query("insert into products (name,description,price,quantity,owner,image,location) values('$name','$description','$price','$quantity','$owner','$image','$location')")or die(mysql_error());
?>
<script>
window.location = "product.php";
</script>
<?php
}
}
?>