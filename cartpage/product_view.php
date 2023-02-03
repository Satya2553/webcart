<html>
<head>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, intitial-scale=1">
  <title>product_view</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <form action="manage-cart.php" method="post">
  <div class="container-fluid" id="product_view">
      <span class="products">
        <img class="image" src="data:image/jpeg;base64,<?php echo $image; ?>">
        <input type="hidden" class="name" name="Name" value='<?php echo $name; ?>'><br>
          <?php echo $name; ?>
        </input>
        <input type="hidden" class="price" name="price" value='<?php echo $cost; ?>' ><br>
          Price:<?php echo $cost; ?>₹
        </input>
        <center><input type="submit" id="addtocart" name="moveToCart" value="Add to cart"></center>
      </span>
  </div>
  </form>
</body>
</html>
