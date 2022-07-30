
<?php
	session_start();
	include '../db_config/db.php';	
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.84.0">
    <title>Login. Ecomm v1c.0</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/sign-in/">

    

    <!-- Bootstrap core CSS -->
<link href="../css/bootstrap.min.css" rel="stylesheet">

    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>

    
    <!-- Custom styles for this template -->
    <link href="signin.css" rel="stylesheet">
  </head>
<body class="text-center">
	<?php

		if (array_key_exists('login', $_POST)) {
			
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
				
		$select = mysqli_query($db, "SELECT * FROM merchant WHERE merchant_name = '".$name."' AND secured_password = '".md5($pass)."'
												") or die(mysqli_error($db));
					
					if (mysqli_num_rows($select) == 1) {
						$rec = mysqli_fetch_array($select);
					
						$_SESSION['merchant_id'] = $rec[0];
						$_SESSION['merchant_name'] = $rec[1];
						
						header('location:home.php');
						} else {
							$er = "details error";
							header("location:merch_login.php?er=$er");
				}
			}
		}
		if (isset($_GET['er'])) {
			echo "<i>".$_GET['er']."</i>";
		}
	?>
	
		
<main class="form-signin">
  	<form action=""	method="post">
    <!-- <img class="mb-4" src="../assets/brand/bootstrap-logo.svg" alt="" width="72" height="57"> -->
    <h1 class="h3 mb-3 fw-normal">Please Sign in</h1>

    <div class="form-floating">
      <input type="username" class="form-control" id="floatingInput" placeholder="merchant-name" name="name">
      <label for="floatingInput">merchant-name</label><?php if(isset($e['name'])) echo$e['name'] ?>
    </div>
    <div class="form-floating">
      <input type="password" class="form-control" id="floatingPassword" placeholder="Password" name="pass">
      <label for="floatingPassword">Password</label><?php if(isset($e['pass'])) echo$e['pass'] ?>
    </div>

    <div class="checkbox mb-3">
      <label>
        <input type="checkbox" value="remember-me"> Remember me
      </label>
    </div>
    <button class="w-100 btn btn-lg btn-secondary" type="submit" name="login">Log In</button>
    <button class="w-100 btn btn-lg btn-secondary" type="reset" name="reset"><a href="merch_reg.php">Sign Up</a></button>
    <p class="mt-5 mb-3 text-muted" align="center">&copy; Ecomm 2021</p>
  </form>
</main>	    
  </body>
</html>