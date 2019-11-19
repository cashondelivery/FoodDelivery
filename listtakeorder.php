<?php session_start(); ?>
<?php include('header.php'); ?>
<body>
<?php include('navbarstaff.php'); ?>
<div class="container">

	<h1 class="page-header text-center">Order That You Take</h1>
	<table class="table table-striped table-bordered">
		<thead>
			
			<th>Time</th>
			<th>Customer Name</th>
			<th>Latitude</th>
			<th>Longitude</th>
			<th>Address</th>
			
		</thead>
		<tbody>
			<?php 
				$sql="select * from locations order by modified_on desc limit 1";
				
				$query=$conn->query($sql);
				while($row=$query->fetch_assoc()){
					?>
					<tr>
						 
      					<td><?php echo $row['modified_on']; ?></td>
						<td><?php echo $_SESSION['name']; ?></td>
						<td><?php echo $row['lat']; ?></td>
						<td><?php echo $row['lng']; ?></td>
						<td><?php echo $row['description']; ?></td>
						
						
						
						
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