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
				background-color: black;
			}
			table, tr, td {
				text-align: center;
			}
			table, tr, td, a{
				
				text-decoration: none;
				text-align: center;
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
			 	
				<h4>view your product <i> <?php echo$merchant_name; ?></i></h4>

			<table border="1" align="center">
				<tr>
					<th>Name</th>
					<th>Description</th>
					<th>Price</th>
					<th>Quantity</th>
					<th>Date of Stock</th>
					<th>Category</th>
					<th>File</th>
					<th>Edit</th>
					<th>Delete</th>
				</tr>
				<tr>
					<?php $select = mysqli_query($db, "SELECT * FROM product WHERE merchant_id ='".$merchant_id."'") ?>
					<?php while ( $r = mysqli_fetch_array($select)) { ?>
						<td><?php echo$r[1] ?></td>
						<td><?php echo$r[2] ?></td>
						<td><?php echo$r[3] ?></td>
						<td><?php echo$r[4] ?></td>
						<td><?php echo$r[5] ?></td>
						<td><?php echo$r[7] ?></td>
						<td>
							<a href="details.php?id=<?php echo$r[0] ?>">
							<img src="../images/<?php echo$r[6] ?>" width="150" height="150"></a> 
						</td>
						<td><a href="edit_product.php?id=<?php echo$r[0] ?>">edit</td>
						<td><a href="delete_product.php?id=<?php echo$r[0] ?>">delete</td>
				</tr>	
					<?php }  ?>
			</table>
</body>
</html>		