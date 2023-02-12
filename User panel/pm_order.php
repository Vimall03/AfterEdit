<?php
session_start();

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] != true) {
    header("location: login.php");
    exit;
}
$tranStatus = "pending";

//sending data to server
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include 'partials/_dbconnect.php';
    // info collected from user    
    $link = $_POST["link"];
    $Slink = $_POST["Slink"];
    $Cemail = $_POST["Cemail"];
    $instrc = $_POST["instructions"];
    $color = $_POST["color"];
    $skin = $_POST["skin"];
    $level = $_POST["level"];
    $tranStatus = "PENDING";
    
    // info generated in session
    $type = "Photo Manipulation";
    $orderid = 'MANIP'. random_int(10000, 99999);




    //query to insert data into database 
    $sql = "INSERT INTO `orders` (`Tran_status.`,`Date`, `Reg_email`, `Img_link`, `Slink`, `Contact`, `Instructions`, `Color_corr`, `Skin_ret`, `Level`, `Type`, `Order_id` ,`Delivery_link`, `edit_status`,`base_fee`)
            VALUES ('$tranStatus', current_timestamp(), '{$_SESSION['email']}','$link', '$Slink', '$Cemail', '$instrc', '$color', '$skin', '$level', '$type', '$orderid', 'del_wait.php', 'Waiting confirmation', '499');";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        $_SESSION['upload'] = true;
        $_SESSION['amount'] = "499";
        $_SESSION['orderid'] = $orderid;
        header("location: checkout.php");
    }
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
    <link rel="stylesheet" href="css/pm_order.css">


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
            <p class="fs-6 text-center desc">Provide cloud links (google-drive, etc) of your Image(s). Make sure these
                links are accessible to everyone.</p>
        </div>
        <div class="align-content-center m-auto">
            <h4 class="mb-3">Order details</h4>
            <form class="needs-validation" novalidate="" action="/afteredit/pm_order.php" method="post">
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label for="firstName">Cloud Link of the image</label>
                        <input type="text" class="form-control" id="link" name="link" required="" minlength="5">
                        <div class="invalid-feedback"> Valid Cloud link is required. </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="lastName">Cloud link of the refrence /sample image<span
                                class="text-muted">(Optional)</span></label>
                        <input type="text" class="form-control" id="Slink" name="Slink" placeholder="" value="" minlength="5">
                    </div>
                </div>
                <div class="mb-3">
                    <label for="email">Preferred email to update you with the order</label>
                    <?php  echo '<input type="email" class="form-control" id="Cemail" placeholder="you@example.com"  name="Cemail" value= " ' .$_SESSION['email'].'" required="" maxlength="25">' ?>
                    <div class="invalid-feedback"> Please enter a valid email address. </div>
                </div>
                <div class="mb-3">
                    <label for="address">Instructions about the edit</label>
                    <textarea class="form-control" id="instructions" rows="5" name="instructions" required minlength="25" maxlength="440"></textarea>
                    <div class="invalid-feedback"> Please enter how you want the image to be edited. </div>
                </div>
                <div class="mb-3">
                </div>
                <div class="row">
                    <div class="col-md-4 mb-3">
                        <div class="form-group">
                            <label for="inputState">Color Correction </label>
                            <select id="inputState" name="color" class="form-control">
                                <option>No</option>
                                <option>Yes</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-4 mb-3">
                        <div class="form-group">
                            <label for="inputState">Skin retouching</label>
                            <select id="inputState" name="skin" class="form-control">
                                <option>No</option>
                                <option>Yes</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-4 mb-3">
                        <div class="form-group">
                            <label for="inputState">Editing level</label>
                            <select id="inputState" name="level" class="form-control">
                                <option>Standard</option>
                                <option>Pro (additional charges may apply)</option>
                                <option>Creative (additional charges may apply)</option>
                            </select>
                        </div>
                    </div>
                </div>
                <hr class="mb-1">

                <!-- remove anchor tag and change button type to submit in php. and redirect using php header function -->
                <a><button class="btn btn-dark btn-lg mt-2 btn-block" type="submit">Continue to checkout</button></a>
            </form>
        </div>
    </div>
    </div>

    <script>
    // Example starter JavaScript for disabling form submissions if there are invalid fields
    (function() {
        'use strict'
        window.addEventListener('load', function() {
            // Fetch all the forms we want to apply custom Bootstrap validation styles to
            var forms = document.getElementsByClassName('needs-validation')
            // Loop over them and prevent submission
            Array.prototype.filter.call(forms, function(form) {
                form.addEventListener('submit', function(event) {
                    if (form.checkValidity() === false) {
                        event.preventDefault()
                        event.stopPropagation()
                    }
                    form.classList.add('was-validated')
                }, false)
            })
        }, false)

    }())
    .then(window.location.href = "checkout.html")
    </script>

<!-- footer -->
<?php include 'partials/_footer.php';?>


</body>

</html>