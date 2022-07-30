<?php

	session_start();
	include('../db_config/db.php');

	unset($_SESSION["merchant_id"]);
	unset($_SESSION["merchant_name"]);	
	header('location:merch_login.php');
?>