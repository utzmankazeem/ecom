
<?php
	session_start();
	include '../db_config/sec.php';	

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
		
			<p><a href="index.php">Merchant</a><?php echo$merchant_id ?> welcome </p>
			<hr>
				<nav>
					<a href="home.php">Home</a>
					<a href="add_product.php">Add Product</a>
					<a href="view_product.php">View Product</a>
					<a href="logout.php">Logout</a>
					<a href="test.php">Check</a>
				</nav>
			<hr>
			 	<?php

			$select = mysqli_query($db, "SELECT * FROM product WHERE merchant_id='".$merchant_id."'") or die(mysqli_error($db));
				 $r = mysqli_num_rows($select) ?>
			<i><?php echo "Merchant ".$merchant_name." has $r products" ?></i>
			 		

			 <table border="1">
			 		<tr>		
					 <td>Electronics</td>
			<?php	$p = mysqli_query($db, "SELECT * FROM product WHERE merchant_id='".$merchant_id."' AND category_id = 1 ") 
			 								or die(	mysqli_error($db));
				$s = mysqli_num_rows($p) ?>
					 <td><?php echo$s?></td>
					</tr>
					<tr>
					 <td>Phones</td>
			<?php	$a = mysqli_query($db, "SELECT * FROM product WHERE merchant_id='".$merchant_id."' AND category_id = 4 ") 
			 								or die(	mysqli_error($db));
				$b = mysqli_num_rows($a) ?>
			 		  <td><?php echo$b?></td>
			 		</tr>
			 		<tr>
					 <td>Footwear</td>
			<?php	$c = mysqli_query($db, "SELECT * FROM product WHERE merchant_id='".$merchant_id."' AND category_id = 7 ") 
			 								or die(	mysqli_error($db));
				$d = mysqli_num_rows($c) ?>
			 		  <td><?php echo$d?></td>
			 		</tr>
			 		<tr>
					 <td>Sports</td>
			<?php	$e = mysqli_query($db, "SELECT * FROM product WHERE merchant_id='".$merchant_id."' AND category_id = 6 ") 
			 								or die(	mysqli_error($db));
				$f = mysqli_num_rows($e) ?>
			 		  <td><?php echo$f?></td>
			 		</tr>
			 		<tr>
					 <td>Clothing</td>
			<?php	$g = mysqli_query($db, "SELECT * FROM product WHERE merchant_id='".$merchant_id."' AND category_id = 3 ") 
			 								or die(	mysqli_error($db));
				$h = mysqli_num_rows($g) ?>
			 		  <td><?php echo$h?></td>
			 		</tr>
			 		<tr>
					 <td>Automobile</td>
			<?php	$i = mysqli_query($db, "SELECT * FROM product WHERE merchant_id='".$merchant_id."' AND category_id = 2 ") 
			 								or die(	mysqli_error($db));
				$j = mysqli_num_rows($i) ?>
			 		  <td><?php echo$j?></td>
			 		</tr>
			 		<tr>
					 <td>Books</td>
			<?php	$k = mysqli_query($db, "SELECT * FROM product WHERE merchant_id='".$merchant_id."' AND category_id = 5 ") 
			 								or die(	mysqli_error($db));
				$l = mysqli_num_rows($k) ?>
			 		  <td><?php echo$l?></td>
			 		</tr>
			 		</table>

</body>
</html>