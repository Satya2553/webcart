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
    <link rel="stylesheet" href="cartstyle.css">
  </head>

  <body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">
              <img id="logo" src="logo.png">
              <a class="navbar-brand" href="index.php">SCIASTRA</a>
            </div>
    </nav>

    <div class="container-fluid" id="heading">
      YOUR CART
    </div>
    <br>
  <div id="content">
    <div class="col-lg-9" id="mainblock">
      <div class="table">
        <table class="table">
          <thead class="text-center">
            <tr>
              <th scope="col">Serial No.</th>
              <th scope="col">Course Name</th>
              <th scope="col">Course Price</th>
              <th scope="col">Quantity</th>
              <th scope="col">Total</th>
              <th scope="col"></th>
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
                  $total=$total+($value['Price']*$value['Quantity']);
                  echo"
                    <tr>
                      <td>$sr</td>
                      <td>$value[Name]</td>
                      <td>$value[Price]<input type='hidden' class='iprice' value='$value[Price]'></td>
                      <td>
                        <form action='manage-cart.php' method='POST'>
                          <input class='text-center iquantity' name='Mod_Quantity' onchange='this.form.submit();' type='number' value='$value[Quantity]' min='1' max='10'>
                          <input type='hidden' name='Name' value='$value[Name]'>
                        </form>
                      </td>
                      <td class='itotal'></td>
                      <td>
                        <form action='manage-cart.php' method='POST'>
                          <button name='removeItem' class='btn btn-sm btn-outline-danger'>REMOVE</button>
                          <input type='hidden' name='Name' value='$value[Name]'>
                        </form>
                      </td>
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
          <a href="checkoutPage.php">
            <button class="checkoutPage">Proceed To Checkout</button>
          </a>

          <a href="index.php">
            <button class="return-home">Return Home</button>
          </a>
        </div>
      </div>
      </div>

    <br>

    </div>





</div>
<?php include "footer.php" ?>


    <script>
          var gt=0;
          var iprice=document.getElementsByClassName('iprice');
          var iquantity=document.getElementsByClassName('iquantity');
          var itotal=document.getElementsByClassName('itotal');
          var gtotal=document.getElementById('gtotal');
          function subTotal()
          {
            gt=0;
            for(i=0;i<iprice.length;i++)
            {
              itotal[i].innerText=(iprice[i].value)*(iquantity[i].value);

              gt=gt+(iprice[i].value)*(iquantity[i].value);

            }
            gtotal.innerText=gt;
          }
          subTotal();
    </script>
  </body>
</html>
