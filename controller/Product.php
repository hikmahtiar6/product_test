<?php
include 'config/config.php';

class Product 
{
	const TBL = 'product';

	public function save()
	{
		$id = $_POST['id'];
		$name = $_POST['name'];
		$color = $_POST['color'];
		$size = $_POST['size'];
		$image = isset($_FILES['image']) ? $_FILES['image']['name'] : '';
		$active = ($_POST['active'] == 'on') ? true : false ;

		if($id == '')
		{
			$sql = "INSERT INTO ".static::TBL." VALUES('', '".$name."', '".$color."', '".$size."', '".$image."', '".$active."')";
		}
		else
		{
			$img = '';

			if($image != '')
			{
				$img = 'product_image = "'.$image.'" , ';

				$get_data = $this->get_data_by_id($id);
				$row = mysql_fetch_object($get_data);

				if($row)
				{
					if(file_exists('./uploads/'.$row->product_image))
					{
						unlink('./uploads/'.$row->product_image);
					}
				}
			}

			$sql = "UPDATE ".static::TBL." SET product_name = '".$name."',  product_color = '".$color."', product_size = '".$size."', $img is_actived =  '".$active."' WHERE product_id = '".$id."'";

			
		}


		$save = mysql_query($sql);

		if($image != '')
		{
			move_uploaded_file($_FILES['image']['tmp_name'], "./uploads/".$image);
		}

		return json_encode($response);
	}

	public function delete($id)
	{
		$get_data = $this->get_data_by_id($id);
		$row = mysql_fetch_object($get_data);

		if($row)
		{
			if(file_exists('./uploads/'.$row->product_image))
			{
				unlink('./uploads/'.$row->product_image);
			}
		}
		
		$sql = "DELETE FROM ".static::TBL." WHERE product_id = '".$id."'";
		mysql_query($sql);

		header('location:index.php');
	}

	public function get_data()
	{
		$sql = "SELECT * FROM ".static::TBL."";
		return mysql_query($sql);
	}

	public function get_data_by_id($id)
	{
		$sql = "SELECT * FROM ".static::TBL." WHERE product_id = '".$id."'";
		return mysql_query($sql);
	}

}

?>