!DOCTYPE html>

<html class="no-js">
    <head>
        <title>Mkulima Bee Online System</title>
		<meta name="description" content="MKULIMA BEE ONLINE SYSTEM">
		<meta name="author" content="MUNENE DENNIS">
		<meta charset="UTF-8">
        <!-- Bootstrap -->
				<link href="images/minilogo2.png" rel="icon" type="image/png">
				<link href="admin/bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen"/>
				<link href="admin/bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet" media="screen"/>
				<link href="admin/bootstrap/css/font-awesome.css" rel="stylesheet" media="screen"/>
				<link href="admin/bootstrap/css/my_style.css" rel="stylesheet" media="screen"/>
				<link href="admin/vendors/easypiechart/jquery.easy-pie-chart.css" rel="stylesheet" media="screen"/>
				<link href="admin/assets/styles.css" rel="stylesheet" media="screen"/>
				<!-- calendar css -->
				<link href="admin/vendors/fullcalendar/fullcalendar.css" rel="stylesheet" media="screen">
				<!-- index css -->
				<link href="admin/bootstrap/css/index.css" rel="stylesheet" media="screen"/>
				<!-- data table css -->
				<link href="admin/assets/DT_bootstrap.css" rel="stylesheet" media="screen"/>
				<!-- notification  -->
				<link href="admin/vendors/jGrowl/jquery.jgrowl.css" rel="stylesheet" media="screen"/>
				<!-- wysiwug  -->
				<link rel="stylesheet" type="text/css" href="admin/vendors/bootstrap-wysihtml5/src/bootstrap-wysihtml5.css"/>
		<script src="admin/vendors/jquery-1.9.1.min.js"></script>
        <script src="admin/vendors/modernizr-2.6.2-respond-1.1.0.min.js"></script>
		
    <div class="navbar navbar-fixed-top navbar-inverse">
    <div class="navbar-inner">
        <div class="container">
            <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </a>
			  <span class="brand" href="#">Mkulima Bee Online System </span>
			  <div class="nav-collapse collapse">
                        <ul class="nav pull-right">
						                            <li class="dropdown">
                                <a href="#" role="button" class="dropdown-toggle" data-toggle="dropdown"> <i class="icon-user icon-large"></i>Kevin Munene <i class="caret"></i>

                                </a>
                                <ul class="dropdown-menu">
                                   
                                    <li>
                                        <a tabindex="-1" href="logout.php"><i class="icon-signout"></i>&nbsp;Logout</a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
			  <br><br><br><br>
            <div class="nav-collapse collapse">
                <ul class="nav">
                    <li class="active" ><a rel="tooltip"  data-placement="bottom" title="Home" id="home" href="index.php" class=""><i class="icon-home icon-large"></i>&nbsp;Home</a></li>
                    <li><a rel="tooltip"  data-placement="bottom" title="Services" id="services" href="services.php" class=""><i class="icon-list icon-large"></i>&nbsp;Services</a></li>
                    <li><a rel="tooltip"  data-placement="bottom" title="About Us" id="aboutus" href="about.php" class=""><i class="icon-info icon-large"></i>&nbsp;About Us</a></li>
                    <li><a rel="tooltip"  data-placement="bottom" title="Contact Us" id="contactus" href="contact.php" class=""><i class="icon-phone icon-large"></i>&nbsp;Contact US</a></li>

                </ul>
                <form class="navbar-search pull-right">
                    <input type="text" class="search-query" placeholder="Search">
                </form>

            </div>
        </div>
    </div>
</div>
</head>
	        <body>
		       
    </div>
	</div>
 <form id="signin_student" class="form-signin" method="post">
	<h4 class="form-signin-heading"><i class="icon-plus-sign"></i> Add Event</h4>
	    <input type="text" class="input-block-level datepicker" name="date_start" id="date01" placeholder="Date Start" required/>
	    <input type="text" class="input-block-level datepicker" name="date_end" id="date01" placeholder="Date End" required/>
		<input type="text" class="input-block-level" id="username" name="title" placeholder="Title" required/>
	<button id="signin" name="add" class="btn btn-info" type="submit"><i class="icon-save"></i> Save</button>
</form>
<?php
if (isset($_POST['add'])){
	$date_start = $_POST['date_start'];
	$date_end = $_POST['date_end'];
	$title = $_POST['title'];
	
	$query = mysql_query("insert into event (date_end,date_start,event_title) values('$date_end','$date_start','$title')")or die(mysql_error());
	?>
	<script>
	window.location = "calendar_of_events.php";
	</script>
<?php
}
?>

		<table cellpadding="0" cellspacing="0" border="0" class="table" id="">
									
		
										<thead>
										        <tr>
												<th>Event</th>
												<th>Date</th>
												<th></th>
												
												</tr>
												
										</thead>
										<tbody>
											
                             
									<?php $event_query = mysql_query("select * from event where teacher_class_id = '' ")or die(mysql_error());
										while($event_row = mysql_fetch_array($event_query)){
										$id  = $event_row['event_id'];
									?>                              
										<tr id="del<?php echo $id; ?>">
									
										 <td><?php echo $event_row['event_title']; ?> </td>
                                         <td><?php  echo $event_row['date_start']; ?>
											<br>To
											 <?php  echo $event_row['date_end']; ?>
										 </td>                                    
                                         <td width="40">
							
										 <a  class="btn btn-danger" href="delete_event.php<?php echo '?id='.$id; ?>"><i class="icon-remove icon-large"></i></a>
								
										 </td>                                      
									
                             

                               
                                </tr>
                         
						 <?php } ?>
						   
                              
										</tbody>
									</table>
