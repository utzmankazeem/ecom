<?php
	
	include('../db_config/db.php');
	$product_id = $_GET['id'];


	$delete = mysqli_query($db, "DELETE FROM product WHERE product_id = '".$product_id."'") or die(mysqli_error($db));
		header('location:view_product.php');
?>