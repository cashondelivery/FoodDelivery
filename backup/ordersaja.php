<?php include('header.php'); ?>
<body>
<?php include('navbar.php'); ?>
<div class="container">
	<h1 class="page-header text-center">ORDER</h1>
	<form method="POST" action="purchase.php">
		<table class="table table-striped table-bordered">
			<thead>
				<th class="text-center"><input type="checkbox" id="checkAll"></th>
				<th>Category</th>
				<select name="catname1">
					<option value="">Select...</option>
					<option value="BREAKFAST">BREAKFAST</option>
					<option value="LUNCH">LUNCH</option>
				</select>
				<th>Product Name</th>
				<th>Photo</th>
				<th>Price</th>
				<th>Quantity</th>
			</thead>
			<tbody>
				<?php
				echo "hi2"."\n";
					if(isset($_POST['catname1'])=="BREAKFAST" )
					{
					  echo "hi";
					}
					else
					{
						echo "hm";
					}
?>

			</tbody>
		</table>
		
		<div class="row">
			<div class="col-md-3">
				<input type="text" name="customer" class="form-control" placeholder="Customer Name" required>
			</div>
			<div class="col-md-2" style="margin-left:-20px;">
				<button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-floppy-disk"></span> Save</button>
			</div>
		</div>
	</form>
</div>
<script type="text/javascript">
	$(document).ready(function(){
		$("#checkAll").click(function(){
	    	$('input:checkbox').not(this).prop('checked', this.checked);
		});
	});
</script>
</body>
</html>