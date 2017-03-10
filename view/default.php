<a href="index.php?page=edit&id=new" class="btn btn-primary">Add</a>
		
<br>
<br>

<table class="table table-bordered tbl-product">
	<thead>
		<tr>
			<th>No.</th>
			<th>Name</th>
			<th>Color</th>
			<th>Size</th>
			<th>Image</th>
			<th>is_active</th>
			<th>delete</th>
		</tr>
	</thead>
	<tbody>

		<?php
		$product = new Product();
		$get_data = $product->get_data();
		$no = 1;
		if(mysql_num_rows($get_data) > 0) : 
			while($c = mysql_fetch_array($get_data)): ?>
			<tr>
				<td><?php echo $no; ?></td>
				<td><a href="index.php?page=edit&id=<?php echo $c['product_id']; ?>"><?php echo $c['product_name']; ?></a></td>
				<td><?php echo $c['product_color']; ?></td>
				<td><?php echo $c['product_size']; ?></td>
				<td>
					<?php if($c['product_image'] != ''): ?>
						<?php if(file_exists('./uploads/'. $c['product_image'])) : ?>
							<img src="uploads/<?php echo $c['product_image']; ?>" width="200">
						<?php else: ?>
							-
						<?php endif; ?>
						<?php else: ?>
							-
					<?php endif; ?>
				</td>
				<td>
					<?php if ($c['is_actived']): ?>
						yes
					<?php else: ?>
						no
					<?php endif; ?>
					
				</td>
				<td><a href="index.php?func=delete&id=<?php echo $c['product_id']; ?>" onclick="return confirm('Akan menghapus ini ?')">Delete</a></td>
			</tr>
			<?php $no++; ?>
			<?php endwhile; ?>
		<?php else: ?>
			<tr>
				<td colspan="7">No data</td>
			</tr>
		<?php endif; ?>
	</tbody>
</table