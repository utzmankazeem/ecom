<?php
	session_start();
	include('../db_config/sec.php');

	$merchant_id = $_SESSION['merchant_id'];
	$merchant_name = $_SESSION['merchant_name'];

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
			.container{
					border: 5px solid #689;
					border-radius: 30px;
					width: 40%;
					margin: 10% auto;
					padding: 5%;
				}
			h3 {
				font-weight: 0.5em;
			}
			nav{
				width: 99%;
			}
			a {
				text-decoration: none;
				padding-left: 8px;
				cursor: pointer;
				
			}
			a:hover {
				height: 30px;
				background-color: black;
			}
	</style>
	<title></title>
</head>
<body>
		
			<p><a href="index.php">Merchant</a><?php echo$merchant_id ?> Welcome</p>
			<hr>
					<a href="home.php">Home</a>
					<a href="add_product.php">Add Product</a>
					<a href="view_product.php">View Product</a>
					<a href="logout.php">Logout</a>
			<hr>
			 	
				<h4>Add a New Product <i><?php echo$merchant_name ?></i></h4>


			<?php
				$max_size = 4089762;
				$ext = array("image/png", "image/jpg", "image/jpeg");

				if (array_key_exists('add', $_POST)) {

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
					 if (empty($_POST['name'])) {
					 	 $e['name'] = "enter product name";
					 } else {
					 	$name = mysqli_real_escape_string($db, $_POST['name']);
					 }
					 if (empty($_POST['desc'])) {
					 	 $e['desc'] = "enter description";
					 } else {
					 	$desc = mysqli_real_escape_string($db, $_POST['desc']);
					 }
					 if (empty($_POST['price'])) {
					 	 $e['price'] = "enter description";
					 } else {
					 	$price = mysqli_real_escape_string($db, $_POST['price']);
					 }
					 if (empty($_POST['qty'])) {
					 	$e['qty'] = "enter quantity of prodduct";
					 } else {
					 	$qty = mysqli_real_escape_string($db, $_POST['qty']);
					 }
					 if (empty($_POST['category'])) {
					 	$e['category'] = "select category"; 
					 } else {
					 	$category = mysqli_real_escape_string($db, $_POST['category']);
					 }
					 if (empty($e)) {
					 	$insert = mysqli_query($db, "INSERT INTO product VALUES(NULL,
					 															'".$name."',
					 															'".$desc."',
					 															'".$price."',
					 															'".$qty."',
					 															NOW(),
					 															'".$filename."',
					 															'".$category."',
					 															'".$merchant_id."'
					 												)") or die(mysqli_error($db));
					 		$suc = "product added succefful";
					 		header("location:add_product.php?suc=$suc");
					 }	
				}
				if (isset($_GET['suc'])) {
					echo "<i>".$_GET['suc']."</i>";
				}
			?>

		<form action=""	method="post" enctype="multipart/form-data" >
			
				<p>Product Name :<input type="text" name="name">
					<?php if (isset($e['name'])) echo$e['name']?>
				</p>
				<p>Description :<br>
					<textarea name="desc" rows="20" cols="40"></textarea>
					<?php if (isset($e['desc'])) echo$e['desc']?>
				</p>
				<p>Price :<input type="number" name="price">
					<?php if (isset($e['price'])) echo$e['price']?>
				</p>
				<p>Quantity : <input type="number" name="qty">
					<?php if (isset($e['qty'])) echo$e['qty']?>
				</p>
				<p><input type="file" name="pic">
					<?php if (isset($e['pic'])) echo$e['pic']?>
				</p>
				<p>category : <select name="category">
											<option value="">Select Category</option>
					<?php $cate = mysqli_query($db, "SELECT * FROM category")or die(mysqli_error($db));?>
								<?php while ($cat = mysqli_fetch_array($cate)) { ?>
									<option value="<?php echo$cat[0] ?>"><?php echo$cat[1] ?></option>
								<?php } ?>
								</select> <?php if (isset($e['category'])) echo$e['category']?>
				</p>
				<p><input type="submit" name="add" value="Add Product"><input type="submit" name="reset" value="Reset"></p>
		</form>

</body>
</html>
