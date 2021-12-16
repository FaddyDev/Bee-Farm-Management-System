   <div class="row-fluid">
       <a href="class.php" class="btn btn-info"><i class="icon-plus-sign icon-large"></i> Add Bee products</a>
                        <!-- block -->
                        <div class="block">
                            <div class="navbar navbar-inner block-header">
                                <div class="muted pull-left">Edit Bee Product details</div>
                            </div>
							<?php
							$query = mysql_query("select * from viewproducts where order_id = '$get_id'")or die(mysql_error());
							$row = mysql_fetch_array($query);
							?>
                            <div class="block-content collapse in">
                                <div class="span12">
								<form method="post">
										<div class="control-group">
                                          <div class="controls">
                                            <input name="order_date" value="<?php echo $row['order_date']; ?>" class="input focused" id="focusedInput" type="text" placeholder = "Order date" required pattern="[a-zA-Z][a-zA-Z0-9\s]*">
                                          </div>
                                        </div>
										<div class="control-group">
                                          <div class="controls">
                                            <input name="buyer" value="<?php echo $row['buyer']; ?>" class="input focused" id="focusedInput" type="text" placeholder = "Buyer" required pattern="[a-zA-Z][a-zA-Z0-9\s]*">
                                          </div>
                                        </div>
										<div class="control-group">
                                          <div class="controls">
                                            <input name="product" value="<?php echo $row['product']; ?>" class="input focused" id="focusedInput" type="text" placeholder = "product Name" required pattern="[a-zA-Z][a-zA-Z0-9\s]*">
                                          </div>
                                        </div>
										<div class="control-group">
                                          <div class="controls">
                                            <input name="quantity" value="<?php echo $row['quantity']; ?>" class="input focused" id="focusedInput" type="text" placeholder = "Quantity" required pattern="[a-zA-Z][a-zA-Z0-9\s]*">
                                          </div>
                                        </div>
										<div class="control-group">
                                          <div class="controls">
                                            <input name="prod_image" value="<?php echo $row['prod_image']; ?>" class="input focused" id="focusedInput" type="text" placeholder = "Product image" required pattern="[a-zA-Z][a-zA-Z0-9\s]*">
                                          </div>
                                        </div>
										<div class="control-group">
                                          <div class="controls">
                                            <input name="location" value="<?php echo $row['location']; ?>" class="input focused" id="focusedInput" type="text" placeholder = "Location" required pattern="[a-zA-Z][a-zA-Z0-9\s]*">
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
                    </div><?php
if (isset($_POST['update'])){
$class_name = $_POST['class_name'];

mysql_query("update class set class_name = '$class_name' where class_id = '$get_id' ")or die(mysql_error());
?>

<script>
window.location = "class.php";
</script>
<?php

}
?>