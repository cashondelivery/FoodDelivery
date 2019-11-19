<?php include('header.php'); ?>
<body>
<?php include('navbar.php'); ?>
<div class="container">
	<h1 class="page-header text-center">PRODUCTS CRUD</h1>
	<div class="row">
		<div class="col-md-12">
			<select id="catList" class="btn btn-default">
			<option value="0">All Category</option>
			<?php
				$sql="select * from category";
				$catquery=$conn->query($sql);
				while($catrow=$catquery->fetch_array()){
					$catid = isset($_GET['category']) ? $_GET['category'] : 0;
					$selected = ($catid == $catrow['categoryid']) ? " selected" : "";
					echo "<option$selected value=".$catrow['categoryid'].">".$catrow['catname']."</option>";
				}
			?>
			</select>
			<a href="#addproduct" data-toggle="modal" class="pull-right btn btn-primary"><span class="glyphicon glyphicon-plus"></span> Product</a>
		</div>
	</div>
	<div style="margin-top:10px;">

		<table class="table table-striped table-bordered">
			<thead>
				<th class="text-center"><input type="checkbox" id="checkAll"></th>
				<th>Category</th>
				<th>Product Name</th>
				<th>Photo</th>
				<th>Price</th>
				<th>Quantity</th>			
			</thead>
			<tbody>
				<?php
					$where = "";
					if(isset($_GET['category']))
					{
						$catid=$_GET['category'];
						$where = " WHERE product.categoryid = $catid";
					}
					
					$sql="select * from product left join category on category.categoryid=product.categoryid $where order by product.categoryid asc, productname asc";
					$query=$conn->query($sql);
					while($row=$query->fetch_array()){
						?>
						<tr>
							<td class="text-center"><input type="checkbox" value="<?php echo $row['productid']; ?>||<?php echo $iterate; ?>" name="productid[]" style=""></td>
							<td><?php echo $row['catname']; ?></td>
							<td><?php echo $row['productname'];  ?></td>
							<td width="30%">
											<img src="<?php if(empty($row['photo'])){echo "upload/noimage.jpg";} else{echo $row['photo'];} ?>" height="100px;" width="50%">
										</td>
							<td class="text-right">&#82;&#77; <?php echo number_format($row['price'], 2); ?></td>
							<td><input type="text" class="form-control" name="quantity_<?php echo $iterate; ?>"></td>
						</tr>
						<?php
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
	</div>
</div>
<?php include('modal.php'); ?>
<script type="text/javascript">

	$(document).ready(function(){
		$("#checkAll").click(function(){
	    	$('input:checkbox').not(this).prop('checked', this.checked);
		});
	});


	$(document).ready(function(){
		$("#catList").on('change', function(){
			if($(this).val() == 0)
			{
				window.location = 'irder.php';
			}
			else
			{
				window.location = 'irder.php?category='+$(this).val();
			}
		});
	});
</script>
</body>
</html>