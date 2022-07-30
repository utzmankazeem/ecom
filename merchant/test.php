
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
				</nav>
			<hr>

			<?php

					$query = mysqli_query($db, "SELECT c.category_name, p.category_id, COUNT(*) FROM category c JOIN product p 
                                                WHERE c.category_id = p.category_id 
                                                AND p.merchant_id = '".$merchant_id."' GROUP BY c.category_name")
									or die(mysqli_error($db));

			?>

			<table border="1">
					
					<tr>
						<th>Category</th><th>Category ID</th><th>Number of Products</th>
					</tr>
					<tr>
						<?php while($r = mysqli_fetch_array($query)) { ?>

							<td><?php echo $r[0] ?></td>
							<td><?php echo $r[1] ?></td>
							<td><?php echo $r[2] ?></td>
						</tr>
					<?php } ?>



			</table>




</body>

</html>