<?php
session_start();

if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] != true) {
    header("location: login.php");
    exit();
}
if ($_SESSION["upload"] != true) {
    header("location: welcome.php");
}
//sending data to server
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include "partials/_dbconnect.php";
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <!-- bootstrap -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
  <!-- Google Fonts (aBeeZee) -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=ABeeZee&display=swap" rel="stylesheet">
  <style>
    @import url('https://fonts.googleapis.com/css2?family=ABeeZee&display=swap');
  </style>
  <!-- css link -->
  <link rel="stylesheet" href="css/checkout.css">


  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>AfterEdit • Checkout</title>
  <link rel="icon" type="image/png" href="css/favicon.png">

</head>

<body class="">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
    </script>
  <div class="topbar">
    <div class="d-flex flex-column flex-md-row align-items-center pb-3 mb-4 border-bottom">
      <a href="welcome.php" class="d-flex align-items-center text-dark text-decoration-none">
        <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-alt"
          viewBox="0 0 16 16">
          <path
            d="M1 13.5a.5.5 0 0 0 .5.5h3.797a.5.5 0 0 0 .439-.26L11 3h3.5a.5.5 0 0 0 0-1h-3.797a.5.5 0 0 0-.439.26L5 13H1.5a.5.5 0 0 0-.5.5zm10 0a.5.5 0 0 0 .5.5h3a.5.5 0 0 0 0-1h-3a.5.5 0 0 0-.5.5z" />
        </svg>
        <title>afterEdit</title><span class="logo">afterEdit.</span>
      </a>

      <nav class="d-flex hov align-items-center mt-2 mt-md-0 ms-md-auto">
        <a class="me-3 py-2 text-dark text-decoration-none" href="#"></a>
        <a class="me-3 py-2 text-dark text-decoration-none" href="#"></a>
        <a class="me-3 py-2 text-dark text-decoration-none" href="support.php">Support</a>
        <a class="me-3 py-2 text-dark text-decoration-none" href="logout.php"><button type="button"
            class="btn btn-outline-dark me-2">Logout</button></a>
        
      </nav>
    </div>
  </div>
  <div class="container">
    <div class="py-1 text-center">
        <span class="lglogo"><svg xmlns="http://www.w3.org/2000/svg" width="35" height="35" fill="currentColor" class="bi bi-alt "
            viewBox="0 0 16 16">
            <path d="M1 13.5a.5.5 0 0 0 .5.5h3.797a.5.5 0 0 0 .439-.26L11 3h3.5a.5.5 0 0 0 0-1h-3.797a.5.5 0 0 0-.439.26L5 13H1.5a.5.5 0 0 0-.5.5zm10 0a.5.5 0 0 0 .5.5h3a.5.5 0 0 0 0-1h-3a.5.5 0 0 0-.5.5z" />
          </svg>afterEdit. Checkout</span>
        <h2 class="display-6 fw-bold desc"></h2>
    </div>
    <div class="row">
        <div class="col-md-4 mt-3 order-md-2 mb-4">
            <h4 class="d-flex justify-content-between align-items-center mb-3">
                <span class="text-muted">Your cart</span>
                <span class="badge badge-secondary badge-pill">3</span>
            </h4>
            <ul class="list-group mb-3 sticky-top">
                <li class="list-group-item d-flex justify-content-between lh-condensed">
                    <div>
                        <h6 class="my-0">Base Fee</h6>
                        <small class="text-muted"> Order id : <?php echo $_SESSION[
                            "orderid"
                        ]; ?></small>
                    </div>
                    <span class="text-muted">₹ <?php echo $_SESSION[
                        "amount"
                    ]; ?> </span>
                </li>
                <li class="list-group-item d-flex justify-content-between">
                    <span>Total (INR)</span>
                    <strong>₹<?php echo $_SESSION["amount"]; ?> </strong>
                </li>
            </ul>

        </div>
        <div class="col-md-8 order-md-1">
            <h4 class="mb-3">Billing address</h4>
            <form class="needs-validation" novalidate="" action="/afteredit/pay.php" method="post" >
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="firstName">First name</label>
                        <input type="text" class="form-control" id="firstName" placeholder="" value=""  name="Fname" required="" minlength="3" maxlength="14">
                        <div class="invalid-feedback"> Valid first name is required. </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="lastName">Last name</label>
                        <input type="text" class="form-control" id="lastName" placeholder="" value=""  name="Lname" required="" minlength="1">
                        <div class="invalid-feedback"> Valid last name is required. </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="firstName">Email</label>
                        <?php echo '<input type="email" class="form-control" id="email" placeholder="you@example.com"  name="email" value= " ' .
                            $_SESSION["email"] .
                            '" required="" maxlength="24">'; ?>
                        <div class="invalid-feedback"> Please enter a valid email address for shipping updates. </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="lastName">Phone</label>
                        <input type="number" class="form-control" id="phone" placeholder="" value=""  name="phone" required="" minlength="10" maxlength="13">
                        <div class="invalid-feedback"> Valid Phone number is required. </div>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="address">Address</label>
                    <input type="text" class="form-control" id="address" placeholder="1234 Main St"  name="address" required="" maxlength="16">
                    <div class="invalid-feedback"> Please enter your shipping address. </div>
                </div>
                <div class="mb-3">
                    <label for="address2">Address 2 <span class="text-muted">(Optional)</span></label>
                    <input type="text" class="form-control" id="address2" placeholder="Apartment or suite"  name="address2" maxlength="16">
                </div>

                <div class="row">
                    <div class="col-md-4 mb-3">
                        <label for="firstName">Country</label>
                        <input type="text" class="form-control" id="country" placeholder="" value=""  name="country" required="" minlength="3">
                        <div class="invalid-feedback"> Valid Country name is required. </div>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="lastName">State</label>
                        <input type="text" class="form-control" id="state" placeholder="" value=""  name="state" required="" minlength="3">
                        <div class="invalid-feedback"> Valid State is required. </div>
                    </div>
                    <div class="col-md-4 mb-3">
                        <label for="lastName">Pin Code</label>
                        <input type="number" class="form-control" id="pin" placeholder="" value=""  name="pincode" required="" minlength="6" maxlength="10">
                        <div class="invalid-feedback"> Valid Pincode is required. </div>
                    </div>
                </div>
                <hr class="mb-4">
                <button class="btn btn-dark btn-lg btn-block" id="" type="submit">Continue to checkout</button>
            </form>
        </div>
    </div>
</div>

<script>// Example starter JavaScript for disabling form submissions if there are invalid fields
(function () {
  'use strict'

  window.addEventListener('load', function () {
    // Fetch all the forms we want to apply custom Bootstrap validation styles to
    var forms = document.getElementsByClassName('needs-validation')

    // Loop over them and prevent submission
    Array.prototype.filter.call(forms, function (form) {
      form.addEventListener('submit', function (event) {
        if (form.checkValidity() === false) {
          event.preventDefault()
          event.stopPropagation()
        }
        form.classList.add('was-validated')
      }, false)
    })
  }, false)
}())</script>
  
  <!-- footer -->
  <?php include 'partials/_footer.php';?>

</body>

</html>