<?php
session_start();
?>
<html>
  <head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, intitial-scale=1">
    <title>SciAstra Shopping Cart</title>
    <link rel="stylesheet" href="style.css">
  </head>

  <body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light" style="height: 90%; width:100%">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#mynavbar-popup">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href=""><img id="logo" src="logo.png"></a>
                </div>
                <div class="collapse navbar-collapse" id="mynavbar">
                    <ul class="nav navbar-nav navbar-right">
                        <li class="active"><a href="index.php">Home</a></li>

                        <?php
                            $count=0;
                            if(isset($_SESSION['cart']))
                            {
                              $count=count($_SESSION['cart']);
                            }
                        ?>

                        <li><a href="cart.php">Cart (<?php echo $count; ?>) </a></li>
                    </ul>
                </div>

                <div class="navbar-popup" id="mynavbar-popup">
        <ul class="nav navbar-nav">
            <li class="active"><a href="">Home</a></li>
            <li><a href="cart.php">Cart</a></li>
        </ul>
    </div>
            </div>
            <div class="video-container">
                <video autoplay loop muted>
                    <source src="header.mp4" type="video/mp4">
                        Your browser does not support the video tag.
                </video>
                <div class="video-text">
                    <p id="brand">SciAstra</p>
                    <p>For the love of Science</p>
                </div>
            </div>
        </nav>



        <div class="quote-container">
            <blockquote>
              <p>"Building the scientists of tomorrow!"</p>
            </blockquote>
        </div>

        <h1 id="ca">Courses Available</h1>

        <div id="content">
          <div class="card mx-auto mt-5 shadow">
              <div class="card-body">
                <?php
                    $name="Full Stack Web Development";
                    $cost="899";
                    $intial_image = file_get_contents('web.jpeg');
                    $image = base64_encode($intial_image);
                    include "product_view.php";
                 ?>
               </div>
          </div>

          <div class="card mx-auto mt-5 shadow">
              <div class="card-body">
                <?php
                    $name="Python Programming";
                    $cost="499";
                    $intial_image = file_get_contents('python.jpeg');
                    $image = base64_encode($intial_image);
                    include "product_view.php";
                 ?>
               </div>
          </div>

          <div class="card mx-auto mt-5 shadow">
              <div class="card-body">
                <?php
                    $name="Django";
                    $cost="999";
                    $intial_image = file_get_contents('django.png');
                    $image = base64_encode($intial_image);
                    include "product_view.php";
                 ?>
               </div>
          </div>

          <div class="card mx-auto mt-5 shadow">
              <div class="card-body">
                <?php
                    $name="React";
                    $cost="799";
                    $intial_image = file_get_contents('react.jpeg');
                    $image = base64_encode($intial_image);
                    include "product_view.php";
                 ?>
               </div>
          </div>

          <div class="card mx-auto mt-5 shadow">
              <div class="card-body">
                <?php
                    $name="Kotlin";
                    $cost="799";
                    $intial_image = file_get_contents('kotlin.png');
                    $image = base64_encode($intial_image);
                    include "product_view.php";
                 ?>
               </div>
          </div>
      </div>

        <footer class="page-footer">
        </footer>
        <div id="Copyright">
          <p>&copy;Copyright 2022, SciAstra. All rights reserved</p>
        </div>


        <script>
  var toggleBtn = document.querySelector('.navbar-toggle');
  var popup = document.querySelector('.navbar-popup');

  toggleBtn.addEventListener('click', function() {
      popup.classList.toggle('active');
  });
</script>
  </body>


</html>
