<?php
$id = isset($_GET['id']) ? $_GET['id'] : ''; 
$prod = new Product();
$get_data = $prod->get_data_by_id($id);
$row = mysql_fetch_object($get_data);

$id = '';
$name = '';
$color = '';
$size = '';
$image = '';
$active = '';


if($row)
{
	$id = $row->product_id;
	$name = $row->product_name;
	$color = $row->product_color;
	$size = $row->product_size;
	$image = $row->product_image;
	$active = $row->is_actived;
}

?>
<div class="col-md-6">

	<form class="form-product" action="index.php?func=save&page=default" method="post">
			<input class="form-control" name="id" type="hidden" value="<?php echo $id; ?>">
		<div class="form-group">
			<label>Name</label>
			<input class="form-control" name="name" type="text" required="" value="<?php echo $name; ?>">
		</div>

		<div class="form-group">
			<label>Color</label>
			<input class="form-control" name="color" type="text" required="" value="<?php echo $color; ?>">
		</div>

		<div class="form-group">
			<label>Size</label>
			<input class="form-control" name="size" type="text" required="" value="<?php echo $size; ?>">
		</div>

		<?php
		if($image != ''):
		if(file_exists('./uploads/'.$image)): 
		?>
		<div class="form-group">
			<label>Image Sebelumnya</label>
			<div class="form-group">
			<img src="uploads/<?php echo $image; ?>" width="250">
			</div>
		</div>
		<?php endif; ?>
		<?php endif; ?>

		<div class="form-group">
			<label>Image</label>
			<input class="form-control" name="image" type="file">
		</div>

		<div class="form-group">
			<label>Is active ?
				<input type="checkbox" name="active" <?php echo ($active) ? 'checked="checked"' : '' ; ?>>
			</label>
		</div>

		<div class="form-group">
			<button class="btn btn-primary" type="submit">Save</button>
			<a class="btn btn-default" href="index.php">Cancel</a>
		</div>
	</form>

</div>