<?php include('header.php'); ?>
<?php include('session.php'); ?>
    <body>
		<?php include('navbar.php'); ?>
        <div class="container-fluid">
            <div class="row-fluid">
				<?php include('collection_sidebar.php'); ?>
				<div class="span3" id="adduser">
						   			
				</div>
                <div class="span9" id="">
                     <div class="row-fluid">
					 <a href="addcollection_center.php" class="btn btn-info"><i class="icon-plus-sign icon-large"></i> Add collection center</a>
                        <!-- block -->
                        <div id="block_bg" class="block">
                            <div class="navbar navbar-inner block-header">
                            
                                 <div class = "panel-heading" style="background-color:green;"> 
								<font color=white><center><h3 class ="panel-title"><b>COLLECTION CENTERS AVAILABLE</b></center></h3></font>
                            </div>
                            <div class="block-content collapse in">
                                <div class="span12">
								<form action="deletecollectioncenter.php" method="post">
  									<table cellpadding="1" cellspacing="0" border="1" class="table" id="example">
									<a data-toggle="modal" href="#center_delete" id="delete"  class="btn btn-danger" name=""><i class="icon-trash icon-large"></i></a>
									<?php include('modal_delete.php'); ?>
										<thead>
										  <tr>
												<th></th>
												<th>Center Name</th>
												<th>Location</th>
												<th>Phone</th>
												<th>M-pesa paybill</th>
												
											
												<th></th>
										   </tr>
										</thead>
										<tbody>
													<?php
													$user_query = mysql_query("select * from collection_center")or die(mysql_error());
													while($row = mysql_fetch_array($user_query)){
													$id = $row['center_id'];
													?>
									
												<tr>
												<td width="30">
												<input id="optionsCheckbox" class="uniform_on" name="selector[]" type="checkbox" value="<?php echo $id; ?>">
												</td>
												<td><?php echo $row['name']; ?></td>
												<td><?php echo $row['location']; ?></td>
												<td><?php echo $row['phone']; ?></td>
												<td><?php echo $row['paybill']; ?></td>
												<td width="40">
												<a href="editcollection_center.php<?php echo '?id='.$id; ?>"  data-toggle="modal" class="btn btn-success"><i class="icon-pencil icon-large"></i></a>
												</td>
		
									
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