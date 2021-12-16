<?php  include('header.php'); ?>
<?php  include('session.php'); ?>
    <body>
		<?php include('navbar.php') ?>
        <div class="container-fluid">
            <div class="row-fluid">
					<?php include('sidebar_dashboard.php'); ?>
             
                <div class="span9" id="content">
						<div class="row-fluid"></div>
						
                    <div class="row-fluid">
            
                        <!-- block -->
                        <div id="block_bg" class="block">
                            <div class="navbar navbar-inner block-header">
                                <div class="muted pull-left">Data Numbers</div>
                            </div>
                            <div class="block-content collapse in">
							        <div class="span12">
						
									<?php 
								$query_reg_teacher = mysql_query("select * from teacher where teacher_status = 'Registered' ")or die(mysql_error());
								$count_reg_teacher = mysql_num_rows($query_reg_teacher);
								?>
								
                                <div class="span3">
                                    <div class="chart" data-percent="<?php echo $count_reg_teacher; ?>"><?php echo $count_reg_teacher; ?></div>
                                    <div class="chart-bottom-heading"><strong>Registered Teachers</strong>

                                    </div>
                                </div>
								
								<?php 
								$query_teacher = mysql_query("select * from teacher")or die(mysql_error());
								$count_teacher = mysql_num_rows($query_teacher);
								?>
								
								
                                <div class="span3">
                                    <div class="chart" data-percent="<?php echo $count_teacher; ?>"><?php echo $count_teacher ?></div>
                                    <div class="chart-bottom-heading"><strong>Teachers</strong>

                                    </div>
                                </div>
								
								

                                <?php 
								$query_departments = mysql_query("select * from department")or die(mysql_error());
								$count_departments = mysql_num_rows($query_departments);
								?>
								
                                <div class="span3">
                                    <div class="chart" data-percent="<?php echo $count_departments; ?>"><?php echo $count_departments; ?></div>
                                    <div class="chart-bottom-heading"><strong>Registered Departments</strong>

                                    </div>
                                </div> 
						    
							
                                <?php 
								$query_unit = mysql_query("select * from unit")or die(mysql_error());
								$count_unit = mysql_num_rows($query_unit);
								?>
								
                                <div class="span3">
                                    <div class="chart" data-percent="<?php echo $count_unit; ?>"><?php echo $count_unit; ?></div>
                                    <div class="chart-bottom-heading"><strong>Registered Units</strong>

                                    </div>
                                </div> 
						
                            </div>
                        </div>
                        <!-- /block -->
						
                    </div>
                    </div>
                
                
                 
                 
                </div>
            </div>
    
         <?php include('footer.php'); ?>
        </div>
	<?php include('script.php'); ?>
    </body>

</html>