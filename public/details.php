<?php 
  include('db/dbcon.php');

  $product_id = $_GET['id'];
?>

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.84.0">
    <title>::Ecomm Mall::v1.0</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.0/examples/carousel/">

    

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
      .container {
        width: 90%;
        margin-top: 0px;
        margin-bottom: 3px;
      }
      .header {
        width: 80%
        margin-bottom: 2px;
        height: 50px;
        position: relative;
      }
      .nav{
          background-color: #5a5a5a;
          width: 100%;
          height: 80%;
          margin: 5px auto;
          margin-bottom: 0px;
          position: absolute;
          left: 0px;
      }
      a {
        text-decoration: none;
      }
      ul {
        list-style: none;
      }
      .header .nav a{
        color: #fff;
        font-weight: bolder;
        letter-spacing: 1px;
        font-size: 15px;
        display: inline-block;
        padding: 5px
      }
      .header .nav a:hover {
        background-color: #212529;
        color: #517D7F;
        text-decoration: underline;
       }
      section{
        width: 100%;
        background-color: #212529;
        height: 500px;
        position: relative;
      }
      aside {
        width: 40%;
        position: absolute;
        top: 10px;
        left: 50px;
      }
      article{
        width: 50%;
        position: absolute;
        right: 40px;
      }
      .det{
        color: #fff;
        top: 100px;
        text-align: center;
        position: relative;
        font-family: verdana;
      }
      .display{
          top: -23px; 
          width: 70%;
          left: 50px;
          position: relative;  
      }
      image{
        
        width: 100%
        height: 800px;
      }
      footer{
        position: absolute;
        margin-top: 5px solid #fff;
      }
      
    </style>

    
    <!-- Custom styles for this template -->
    <link href="carousel.css" rel="stylesheet">
  </head>
  <body>
    
<header>
  <nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
    <div class="container-fluid">
      <a class="navbar-brand" href="index.php">Ecomm</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarCollapse">
        <ul class="navbar-nav me-auto mb-2 mb-md-0">
          <li class="nav-item">
            <a class="nav-link" href="index.php">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="home.php">Products</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="contact.php">Contact</a>
          </li>
        </ul>
        <form class="d-flex">
          <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
          <button class="btn btn-outline-success" type="submit">Search</button>
        </form>
      </div>
    </div>
  </nav>
</header>

<main>

    <div class="container">
      <div class="header">
        <div class="nav">
          <?php 

              $select = mysqli_query($db, "SELECT * FROM category") or die(mysqli_error($db));
                  while ( $r = mysqli_fetch_array($select)) { ?>
                      <ul>
                        <ol><a href="product.php?id=<?php echo$r[0]?>"><?php echo$r[1]?></a></ol>
                      </ul>
              <?php } ?>        
        </div>        
      </div>
        <?php $query = mysqli_query($db, "SELECT * FROM product WHERE product_id='".$product_id."'") or die(mysqli_error($db)); ?>
                <?php while ($rec = mysqli_fetch_array($query)) { 
                  //extract($rec); ?>
                
            <section>
              <aside>
                <div class="det">
                  <p><?php echo"product Name: <h3>".$rec[1]."</h3>" ?></p>
                  <p><?php echo"product Details:<h3> ".$rec[2]."</h3>" ?></p>
                  <p><?php echo"product Price: <h3>".$rec[3]."</h3>" ?></p>
                </div> 
              </aside>
              <article>
                <div class="display">
                  <image>
                    <img src="../images/<?php echo$rec[6] ?>" width="500px" height="500px">
                  </image> 
                </div> 
              </article>
            </section>
         <?php } ?>
    </div>    
    </main> 
  <footer class="mt-sautonavbar navbar-expand-md navbar-dark fixed-bottom bg-dark">
    <p align="center">shoppers delite <a href="#" class="text-white">ecomm</a>, by <a href="#" class="text-white"> &copy Dotusman</a>.</p>
  </footer>
    <script src="../js/bootstrap.bundle.min.js"></script>     
  </body>
</html>
