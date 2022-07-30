
<?php
	session_start();
	include('../db_config/sec.php');
	$prod_id = $_GET['id'];
	sec();
?>
<!DOCTYPE html>
<html>
<head>
	<style type="text/css">
		body{
			background-color: #DFD0E2;
			font-family: sans-serif;
			}
		</style>
	<title></title>
</head>
<body>


	<?php

	

	$select = mysqli_query($db, "SELECT * FROM product WHERE product_id = '".$prod_id."' ") or die(mysqli_error($db));
		$rec = mysqli_fetch_array($select);
			extract($rec);
	?>


	<?php
					$max_size = 4089762;
					$ext = array("image/png", "image/jpg", "image/jpeg");

					if (array_key_exists('update', $_POST)) {
					
					if (!in_array($_FILES['pic']['type'], $ext)) {
						$e[] = "file type uncaught";
					}
					if ($_FILES['pic']['size'] >$max_size) {
					 	$e[] = "file too large. max_size :".$max_size;
					 } 
					 $filename = str_replace(" ", "_", $_FILES['pic']['name']);

					 $destinatiion = '../images/' .$filename;

					 if (!move_uploaded_file($_FILES['pic']['tmp_name'], $destinatiion)) {
					 	$e[] = "file not added";
					 }
					$n = mysqli_real_escape_string($db, $_POST['name']);
					$d = mysqli_real_escape_string($db, $_POST['desc']);
					$p = mysqli_real_escape_string($db, $_POST['price']);
					$q = mysqli_real_escape_string($db, $_POST['qty']);
					$ca = mysqli_real_escape_string($db, $_POST['category']);

					$update = mysqli_query($db, "UPDATE product SET product_name = '".$n."',
																	description = '".$d."',
																	price = '".$p."',
																	quantity = '".$q."',
																	filename = '".$filename."',
																	category_id = '".$ca."'
														WHERE product_id = '".$prod_id."'
												") or die(mysqli_error($db));
					header("location:view_product.php");
			}
	?>

	<h4>Edit your product</h4>
	<hr>

	Product Name : <?php echo $product_name ?>
	<hr>

<form action=""	method="post" enctype="multipart/form-data" >
			
				<p>Product Name :<input type="text" name="name" value="<?php echo$product_name ?>"></p>
				<p>Description :<br>
					<textarea name="desc" rows="20" cols="40"><?php echo $description ?></textarea>
				</p>
				<p>Price :<input type="number" name="price" value="<?php echo$price ?>">
				</p>
				<p>Quantity : <input type="number" name="qty" value="<?php echo$quantity ?>">
				</p>
				<p><input type="file" name="pic" value="<?php echo 'images/'.$filename ?>">
				</p>
				<p>category : <select name="category">
											<option value=""><?php echo$category_id ?></option>
					<?php $cate = mysqli_query($db, "SELECT * FROM category")or die(mysqli_error($db));?>
								<?php while ($cat = mysqli_fetch_array($cate)) { ?>
									<option value="<?php echo$cat[0] ?>"><?php echo$cat[1] ?></option>
								<?php } ?>
								</select>
				</p>
				<p><input type="submit" name="update" value="update Product"></p>
</form>

</body>
</html>