
<?php

	include '../db_config/db.php';	
?>

<!DOCTYPE html>
<html>
<head>
	<style type="text/css">
		body{
			background-color: #234560;
			font-family: sans-serif;
			}
			.container{
					border: 5px solid #689;
					border-radius: 30px;
					width: 40%;
					margin: 10% auto;
					padding: 5%;
					background-color: #fff;
				}
			p{
					width: 40%;
					margin: 10px auto;
				}
			h3 {
				font-weight: 0.5em;
			}
	</style>
	<title></title>
</head>
<body>
		
			<div class="container">
			<h3>Register As Merchant</h3>
	<?php

		if (array_key_exists('add', $_POST)) {
			
			if (empty($_POST['name'])) {
				$e['name'] = "enter your merchant name";
			} else {
				$name = mysqli_real_escape_string($db, $_POST['name']);
			}
			if (empty($_POST['pass'])) {
				$e['pass'] = "enter a password";
			} else {
				$pass = mysqli_real_escape_string($db, $_POST['pass']);
			}
			if (empty($e)) {
				$insert = mysqli_query($db, "INSERT INTO merchant VALUES(NULL,
																		'".$name."',
																		'".$pass."',
																		'".md5($pass)."'
														)") or die(mysqli_error($db));
					header('location:merch_login.php');
			} else {
					$er = "details error";
					header("location:merch_reg.php?er=$er");
			}
		}
		if (isset($_GET['er'])) {
			echo "<i>".$_GET['er']."</i>";
		}
	?>



		<form action=""	method="post">
			
			<p>Merchant Name: <input type="text" name="name">
				<?php if(isset($e['name'])) echo$e['name'] ?>
			</p>
			<p>password: 	<input type="text" name="pass">
				<?php if(isset($e['pass'])) echo$e['pass'] ?>
			</p>
			<p><input type="submit" name="add" value="add merchant">
				<button><a href="merch_login.php">Loging</a></button>
			</p>
		</form>
	</div>
</body>
</html>