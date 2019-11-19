<?php session_start(); ?>
<?php include('header.php'); ?>
<body>
<?php include('navbarstaff.php'); ?>


	<h1 class="page-header text-center">Order Need to Deliver</h1>
	<center><a href="listtakeorder.php ?>" data-toggle="modal" class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-search"></span> back</a></center>
               
		<td><?php include('admin-map.php'); ?>
								
						</td>

	
</body>


<footer><center>
	
	<div id="clockdate">
				<center><div class="clockdate-wrapper">
					<div id="clock"></div>
					<div id="date"><?php echo date('l, F j, Y'); ?></div>
				</div>
	</div> </center>

	
		</center></footer>
</html>