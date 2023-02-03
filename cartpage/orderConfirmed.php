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
    <link rel="stylesheet" href="order.css">
  </head>

  <body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">
              <img id="logo" src="logo.png">
              <a class="navbar-brand" href="index.php">SCIASTRA</a>
            </div>
    </nav>
    <div class="container-fluid" id="heading" style="font-size:50px;">
      Your Order Have Been Received
    </div>
    <center><img src="order.png" height="100px" width="100px"><center><br>
      <div id="content">
        <div class="col-lg-9" id="mainblock" style="width:auto;height:auto;">
          <div class="table">
            <table class="table">
              <thead class="text-left">
                <tr>
                  <th >Serial No.</th>
                  <th >Course Name</th>
                  <th >Course Price</th>
                  <th>Quantity</th>
                </tr>
              </thead>

              <tbody class="text-left">
                <?php
                  if(isset($_SESSION['cart']))
                  {
                    $total=0;
                    foreach($_SESSION['cart'] as $key => $value)
                    {
                      $sr=$key+1;
                      $total=$total+$value['Price'];
                      echo"
                        <tr>
                          <td>$sr</td>
                          <td>$value[Name]</td>
                          <td>$value[Price]<input type='hidden' class='iprice' value='$value[Price]'></td>
                          <td>$value[Quantity]<td>
                        </tr>
                      ";
                    }
                  }
                ?>
              </tbody>
            </table>
            <div class="card mx-auto mt-5 shadow" id="grandtotal">
              <div class="card-body">
              Grand Total: <?php echo $total; ?>
            </div><br>
            <div class="d-flex justify-content-between mt-3" id="buttons">

              <a href="index.php">
                <button class="return-home">Return Home</button>
              </a>
            </div>
          </div>
          </div>

        </div>
      </div>

        <?php include "footer.php" ?>

  </body>
</html>
