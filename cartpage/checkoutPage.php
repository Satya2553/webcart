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
    <link rel="stylesheet" href="checkoutstyle.css">
  </head>

  <body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">
              <img id="logo" src="logo.png">
              <a class="navbar-brand" href="index.php">SCIASTRA</a>
              <div class="collapse navbar-collapse" id="mynavbar">
                  <ul class="nav navbar-nav navbar-right">
                      <?php
                        if(isset($_SESSION['cart']))
                        {
                          $total=0;
                          foreach($_SESSION['cart'] as $key => $value)
                          {
                            $total=$total+$value['Price'];
                          }
                        }
                        ?>
                      <li style="font-size:20px;">Grand Total: <?php echo $total; ?></li>
                  </ul>
              </div>
            </div>
    </nav>

    <div class="container-fluid">
      <div class="card-container d-flex " style="height: auto;">
  <div class="card shadow-lg">
    <div class="card-body justify-content-center align-items-center">
      <h2 class="card-title text-center mb-4">Enter Your Details</h2>
      <hr>
      <form id="form">
        <div class="form-group d-flex">
          <label for="fullName" class="w-25">Full Name</label>
          <input type="text" class="form-control form-control-sm w-75" id="fullName" placeholder="Enter your full name">
        </div>
        <div class="form-group d-flex">
          <label for="mobileNumber" class="w-25">Mobile Number</label>
          <input type="text" class="form-control form-control-sm w-75" id="mobileNumber" placeholder="Enter your mobile number">
        </div>
        <div class="form-group d-flex">
          <label for="address" class="w-25">Complete Address</label>
          <input type="text" class="form-control form-control-sm w-75" id="address" placeholder="Enter your complete address including door number etc">
        </div>
        <div class="form-group d-flex align-items-center">
          <div class="form-check form-check-inline">
            <input class="form-check-input" type="radio" name="paymentOption" id="cod" value="cod">
            <label class="form-check-label" for="cod">Cash on Delivery</label>
          </div>
        </div>
        <center><button type="submit" class="btn btn-primary" id="submit">Submit</button></center>
      </form>




<div id="otp-modal" class="modal" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Enter OTP</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div id="verification-message"></div><br>
        <form>
          <div class="form-group">
            <label for="otp">OTP:</label>
            <input type="text" class="form-control" id="otp">
          </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" id="close-otp-modal-button" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" id="verify-otp-button">Verify OTP</button>
      </div>
    </div>
  </div>
</div>
    </div>
  </div>
</div>


  </div>

  <?php include "footer.php" ?>
<script>
          const form = document.querySelector('#form');
          const submit = document.querySelector('#submit');
          const cod = document.querySelector('#cod');
          const verificationMessage = document.querySelector('#verification-message');
          const otpModal = document.querySelector('#otp-modal');
          const otpInput = document.querySelector('#otp');
          const verifyOtpButton = document.querySelector('#verify-otp-button');
          const closeOtpModalButton = document.querySelector('#close-otp-modal-button');


          form.addEventListener('submit', (event) => {
              if (!cod.checked) {
              event.preventDefault();
              alert('Please accept Cash on Delivery');
              return
          }
              event.preventDefault();
              otpModal.style.display = 'block';
          });

          closeOtpModalButton.addEventListener('click', (event) => {
  event.preventDefault();
  otpModal.style.display = 'none';
});


          verifyOtpButton.addEventListener('click', function() {
  const otp = otpInput.value;
  if (otp === '1234')
  {
  otpModal.style.display = 'none';
  window.location.href = 'orderConfirmed.php';
} else {
  verificationMessage.textContent = 'Invalid OTP, please try again.';
}
});


</script>


  </body>
  </html>
