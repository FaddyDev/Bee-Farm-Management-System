   <div class="row-fluid">
   <a href="collection.php" class="btn btn-info"><i class="icon-plus-sign icon-large"></i> Add collection center</a>
                        <!-- block -->
                        <div class="block">
                            <div class="navbar navbar-inner block-header">
                                <div class="muted pull-left">Edit collection center</div>
                            </div>
                            <div class="block-content collapse in">
                                <div class="span12">
								<?php
								$query = mysql_query("select * from collection_center where center_id = '$get_id'")or die(mysql_error());
								$row = mysql_fetch_array($query);
								?>
								<form method="post">
										<div class="control-group">
                                          <div class="controls">
                                            <input class="input focused" value="<?php echo $row['name']; ?>" name="name" id="focusedInput" type="text" placeholder = "Collection center name" required pattern="[a-zA-Z][a-zA-Z0-9\s]*">
                                          </div>
                                        </div>
										
										<div class="control-group">
                                          <div class="controls">
                                            <input class="input focused" value="<?php echo $row['location']; ?>"  name="location"  id="focusedInput" type="text" placeholder = "Location" required pattern="[a-zA-Z][a-zA-Z0-9\s]*">
                                          </div>
                                        </div>
										
											<div class="control-group">
                                          <div class="controls">
                                            <input class="input focused" value="<?php echo $row['phone']; ?>"  name="phone" id="focusedInput" type="text" placeholder = "Phone" required >
                                          </div>
                                        </div>
										<div class="control-group">
                                          <div class="controls">
                                            <input class="input focused" value="<?php echo $row['paybill']; ?>"  name="paybill" id="focusedInput" type="text" placeholder = "Paybill" required >
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

$name = $_POST['name'];
$location = $_POST['location'];
$phone = $_POST['phone'];
$paybill = $_POST['paybill'];

mysql_query("update collection_center set name = '$name'  , location = '$location ' , phone = '$phone' ,paybill = '$paybill' where center_id = '$get_id' ")or die(mysql_error());

mysql_query("insert into activity_log (date,username,action) values(NOW(),'$user_username','Edit collection center $name')")or die(mysql_error());
?>
<script>
  window.location = "collection.php"; 
</script>
<?php
}
?>