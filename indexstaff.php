<?php session_start(); ?>
<?php include('header.php'); ?>
<body>
<?php include('navbarstaff.php'); ?>
<div class="container">

	<h1 class="page-header text-center">Order Need to Deliver</h1>
	<table class="table table-striped table-bordered">
		<thead>
			<th>a</th>
			<th>b</th>
			<th>Latitude</th>
			<th>Longitude</th>
			<th>Address</th>
			<th>Take Order</th>
		</thead>
		<tbody>
			<?php 
				$sql="select * from locations where location_status='0'";
				
				$query=$conn->query($sql);
				while($row=$query->fetch_assoc()){
					?>
					<tr>
						 
      					<td><?php echo $_SESSION['id']; ?></td>
						<td><?php echo $_SESSION['name']; ?></td>
						<td><?php echo $row['lat']; ?></td>
						<td><?php echo $row['lng']; ?></td>
						<td><?php echo $row['description']; ?></td>
						<td><a href="indexmap.php ?>" data-toggle="modal" class="btn btn-primary btn-sm"><span class="glyphicon glyphicon-search"></span> Take</a></td>
						
						
						
					</tr>


					<?php
				}
			?>
		</tbody>
			
					<tr>
						

						
					</tr>
					
<tr>
						
						
					</tr>

					<?php
				
			?>
		
	</table>
</div>
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