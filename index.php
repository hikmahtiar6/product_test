<?php
include 'controller/Product.php';
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Product</title>
		<link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
		<link rel="stylesheet" href="bower_components/datatables/media/css/dataTables.bootstrap.min.css">
	</head>
	<body>

		<div class="alert alert-info">
			Product
		</div>

		<div class="col-md-12">

			<?php
			$id = isset($_GET['id']) ? $_GET['id'] : '';

			$page = isset($_GET['page']);
			if($page)
			{
				if($_GET['page'] == 'edit')
				{
					include 'view/edit.php';
				}
			}
			else
			{
				include 'view/default.php';	
			}

			$func = isset($_GET['func']);
			if($func)
			{
				if($_GET['func'] == 'save')
				{
					$product = new Product();
					$product->save();
				}
				else if($_GET['func'] == 'delete')
				{	
					$product = new Product();
					$product->delete($id);
				}
				else
				{
					echo 'test';
				}
				
			}
			?>


		</div>

		

	</body>
	<script type="text/javascript" src="bower_components/jquery/dist/jquery.min.js"></script>
	<script type="text/javascript" src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="bower_components/datatables/media/js/jquery.dataTables.min.js"></script>
	<script type="text/javascript" src="bower_components/datatables/media/js/dataTables.bootstrap.min.js"></script>
	<script type="text/javascript" src="bower_components/datatables/media/js/dataTables.bootstrap.min.js"></script>
	<script type="text/javascript" src="bower_components/jquery-form/dist/jquery.form.min.js"></script>


	<script type="text/javascript">
		$('.form-product').ajaxForm({
			success: function() {
				window.location = 'index.php';
			}
		});

	</script>
</html>