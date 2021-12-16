<?php include('header.php'); ?>
<?php include('session.php'); ?>
    <body>
		<?php include('navbar.php'); ?>
        <div class="container-fluid">
            <div class="row-fluid">
				<?php include('message_sidebar.php'); ?>
		
                <div class="span10" id="content">
                     <div class="row-fluid">
					 
                        <!-- block -->
                        <div id="block_bg" class="block">
                            <div class="navbar navbar-inner block-header">
                                <div class = "panel-heading" style="background-color:green;"> 
								<font color=white><center><h3 class ="panel-title"><b>USER MESSAGES</b></center></h3></font>
								</div>
                            </div>
                            <div class="block-content collapse in">
                                <div class="span12">
									
									<table cellpadding="1" cellspacing="0" border="1" class="table table-stripped table-hover table-bordered table-condensed" >
  									 
	<thead>
		<tr>			
			<th><span class='glyphicon glyphicon-user'></span> NAME</th>
			<th><span class='glyphicon glyphicon-user'></span> EMAIL</th>
			<th><span class='glyphicon glyphicon-comment'></span> COMMENT</th>
			<th><span class='glyphicon glyphicon-calendar'></span>  DATE</th>
			<th><span class='glyphicon glyphicon-time'></span>  TIME</th>
			<th><span class='glyphicon glyphicon-trash'></span>  DELETE?</th>
		</tr>
	</thead>
	<tbody>		
		
		<?php
		require("dbcon.php");
			
			$results = mysql_query("SELECT * FROM `usercomment` ORDER BY `cmt_id` DESC") or die (mysql_error());			
			while($project = mysql_fetch_array($results)){
				echo "
				<tr> <form action='' method='post'>
					<td>".$project['username']."</td>
					<td>".$project['mail']."</td>
					<td>".$project['msg']."</td>
					<td>".$project['date']."</td>
					<td>".$project['time']."</td>
					<td><button name='del".$project['cmt_id']."' type='submit' class='btn btn-danger btn-xs'> DELETE</button></td>		
				</tr></form>
				";
				
				
				if(isset($_POST['del'.$project['cmt_id']])){
				mysql_query("DELETE FROM `usercomment` WHERE `cmt_id`='".$project['cmt_id']."'") or die(mysql_error());						
				echo "<script> window.location='message.php'</script>";
				}
				
				
				
			}
		?>
		
	</tbody>
 </table>
									
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