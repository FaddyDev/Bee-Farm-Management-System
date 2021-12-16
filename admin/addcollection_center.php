   <?php include('header.php'); ?>
   <?php include('session.php'); ?>
   <div class="row-fluid">
   <?php include('navbar.php'); ?>
        <div class="container-fluid">
            <div class="row-fluid">
				<?php include('collection_sidebar.php'); ?>
				
                <div class="span6" id="content">
                     <div class="row-fluid">
                        <!-- block -->
                        <div class="block">
                            <div class="navbar navbar-inner block-header">
                                <div class="muted pull-left">Add collection center</div>
                            </div>
							<div class="block-content collapse in">
									<a href="collection.php"><i class="icon-arrow-left"></i> Back</a>
                            <div class="block-content collapse in">
                                <div class="span12">
								<form class="form-horizontal" method="post" action="addcollection_center.php" enctype="multipart/form-data">
										<div class="control-group">
										<label class="control-label" for="focusedInput">Collection center name</label>
                                          <div class="controls">
                                            <input class="input focused" name="name" id="focusedInput" type="text" placeholder = "collection center name" required pattern="[a-zA-Z][a-zA-Z0-9\s]*">
                                          </div>
                                        </div>
										<div class="control-group">
										<label class="control-label" for="focusedInput">Location</label>
                                          <div class="controls">
                                            <input class="input focused" name="location" id="focusedInput" type="text" placeholder = "Location" required pattern="[a-zA-Z][a-zA-Z0-9\s]*">
                                          </div>
                                        </div>
										<div class="control-group">
										<label class="control-label" for="focusedInput">Phone</label>
                                          <div class="controls">
                                            <input class="input focused" name="phone" id="focusedInput" type="integer" placeholder = "Phone" required >
                                          </div>
                                        </div>
										<div class="control-group">
										<label class="control-label" for="focusedInput">Mpesa Paybill</label>
                                          <div class="controls">
                                            <input class="input focused" name="paybill" id="focusedInput" type="integer" placeholder = "M-pesa Paybill " required >
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
$name = $_POST['name'];
$location = $_POST['location'];
$phone = $_POST['phone'];
$paybill = $_POST['paybill'];


$query = mysql_query("select * from collection_center where name = '$name' and location = '$location' and phone = '$phone' and paybill='$paybill' ")or die(mysql_error());
$count = mysql_num_rows($query);

if ($count > 0){ ?>
<script>
alert('Data Already Exist');
</script>
<?php
}else{
mysql_query("insert into collection_center (name,location,phone,paybill) values('$name','$location','$phone',$paybill)")or die(mysql_error());

mysql_query("insert into activity_log (date,username,action) values(NOW(),'$user_username','Add collection center  $name',M-pesa paybill No $paybill)")or die(mysql_error());
?>
<script>
window.location = "collection.php";
</script>
<?php
}
}
?>