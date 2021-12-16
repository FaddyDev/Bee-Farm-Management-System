<?php include('header.php'); ?>
<?php include('session.php'); ?>
    <body>
		<?php include('navbar.php'); ?>
        <div class="container-fluid">
            <div class="row-fluid">
				<?php include('farmer_sidebar.php'); ?>
				<div class="span3" id="adduser">
					   			
				</div>
                <div class="span9" id="">
                     <div class="row-fluid">
					  <a href="add_farmer.php" class="btn btn-info"><i class="icon-plus-sign icon-large"></i> Add bee farmer</a>
                        <!-- block -->
                        <div id="block_bg" class="block">
                            <div class="navbar navbar-inner block-header">
                               
                                 <div class = "panel-heading" style="background-color:green;"> 
								<font color=white><center><h3 class ="panel-title"><b>LIST OF BEE FARMERS</b></center></h3></font>
                            </div>
                            <div class="block-content collapse in">
                                <div class="span12">
  									<form action="delete_farmer.php" method="post">
  									<table cellpadding="1" cellspacing="0" border="1" class="table" id="example">
									<a data-toggle="modal" href="#farmer_delete" id="delete"  class="btn btn-danger" name=""><i class="icon-trash icon-large"></i></a>
									<?php include('modal_delete.php'); ?>
										<thead>
										    <tr>
                                    <th></th>
                                    <th>Farmer Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
									<th>Location</th>
									<th>Description</th>
									

                                    <th></th>
                                </tr>
										</thead>
										<tbody>
												 <?php
                                    $farmer_query = mysql_query("select * from farmer") or die(mysql_error());
                                    while ($row = mysql_fetch_array($farmer_query)) {
                                    $id = $row['farmer_id'];
                                   
                                        ?>
								<tr>
														<td width="30">
														<input id="optionsCheckbox" class="uniform_on" name="selector[]" type="checkbox" value="<?php echo $id; ?>">
														</td>
														<td><?php echo $row['farmer_name']; ?></td>
														<td><?php echo $row['email']; ?></td>
														<td><?php echo $row['phone']; ?></td>
														<td><?php echo $row['location']; ?></td>
														<td><?php echo $row['description']; ?></td>
														
												
														<td width="30"><a href="edit_farmer.php<?php echo '?id='.$id; ?>" class="btn btn-success"><i class="icon-pencil icon-large"></i></a></td>

                               
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