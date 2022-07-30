<?php

		include 'db.php';
	
	function sec(){
		if (!isset($_SESSION['merchant_id']) && (!isset($_SESSION['merchant_name']))) {
					header("location:merch_reg.php");
		}
	}
?>