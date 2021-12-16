<?php include('header.php'); ?>
<?php include('session.php'); ?>
    <body>
		<?php include('navbar.php'); ?>
        <div class="container-fluid">
            <div class="row-fluid">
				<?php include('equipment_sidebar.php'); ?>
		
                <div class="span10" id="content">
                     <div class="row-fluid">
					 <a href="add_equipment.php" class="btn btn-info"><i class="icon-plus-sign icon-large"></i> Add Equipment</a>
                        <!-- block -->
                        <div id="block_bg" class="block">
                            <div class="navbar navbar-inner block-header">
                               
								 <div class = "panel-heading" style="background-color:green;"> 
								<font color=white><center><h3 class ="panel-title"><b>EQUIPMENT LIST</b></center></h3></font>
                            </div>
                            <div class="block-content collapse in">
                                <div class="span12">
									<form action="delete_equipment.php" method="post">
  									<table cellpadding="1" cellspacing="0" border="1" class="table" id="example">
									<a data-toggle="modal" href="#subject_delete" id="delete"  class="btn btn-danger" name=""><i class="icon-trash icon-large"></i></a>
									<?php include('modal_delete.php'); ?>
										<thead>
										  <tr>
											    <th></th>
												<th>Name</th>
												<th>Description</th>
												<th>Price/unit</th>
												<th>Quantity</th>
												<th>0wner</th>
												<th>Image</th>
												<th>Date</th>
												<th></th>
										   </tr>
										</thead>
										<tbody>
											
												<?php
											$unit_query = mysql_query("select * from equipment")or die(mysql_error());
											while($row = mysql_fetch_array($unit_query)){
											$id = $row['equipment_id'];
											?>
										
											<tr>
													<td width="40">
													<input id="optionsCheckbox" class="uniform_on" name="selector[]" type="checkbox" value="<?php echo $id; ?>">
													</td>
													<td><?php echo $row['name']; ?></td>
													<td><?php echo $row['description']; ?></td>
													<td><?php echo $row['price']; ?></td>
													<td><?php echo $row['quantity']; ?></td>
													<td><?php echo $row['owner']; ?></td>
													<td><img src="equipment-uploads/<?php echo $row['image']; ?>"</td>
													<td><?php echo $row['date']; ?></td>
												
													<td width="40"><a href="edit_equipment.php<?php echo '?id='.$id; ?>" class="btn btn-success"><i class="icon-pencil"></i> </a></td>
										</tr>
											
											<?php } ?>   
                              
										</tbody>
									</table>
									</form>
                                </div>
                            </div>
                        </div>
                        <!-- /block -->
                    </div>


                </div>
            </div>
		
        </div>
		<?php include('script.php'); ?>
    </body>

</html>