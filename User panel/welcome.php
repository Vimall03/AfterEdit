<?php
session_start();

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] != true) {
    header("location: login.php");
    exit;
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
    <link rel="stylesheet" href="css/welcom.css">


    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AfterEdit • Welcome</title>
    <link rel="icon" type="image/png" href="css/favicon.png">

</head>

<body>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
    </script>
    <div class="topbar pb-5">
        <div class="d-flex flex-column flex-md-row align-items-center mt-2 border-bottom ">
            <a href="#" class="d-flex align-items-center text-dark text-decoration-none">
                <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-alt"
                    viewBox="0 0 16 16">
                    <path
                        d="M1 13.5a.5.5 0 0 0 .5.5h3.797a.5.5 0 0 0 .439-.26L11 3h3.5a.5.5 0 0 0 0-1h-3.797a.5.5 0 0 0-.439.26L5 13H1.5a.5.5 0 0 0-.5.5zm10 0a.5.5 0 0 0 .5.5h3a.5.5 0 0 0 0-1h-3a.5.5 0 0 0-.5.5z" />
                </svg>
                <title></title><span class="logo">afterEdit.</span>
            </a>

            <nav class="d-flex hov align-items-center mt-2 mt-md-0 ms-md-auto">
                <a class="me-3 py-2 text-dark text-decoration-none" href="#"></a>
                <a class="me-3 py-2 text-dark text-decoration-none" href="#choose">Create</a>
                <a class="me-3 py-2 text-dark text-decoration-none" href="track.php">Track</a>
                <a class="me-3 py-2 text-dark text-decoration-none" href="support.php">Support</a>
                <a class="py-2 text-dark text-decoration-none" href="logout.php"><button type="button"
                        class="btn btn-outline-warning me-2">Logout</button></a>
            </nav>
        </div>
    </div>

    <div class="cvrr  pt-5 pb-5 p-md-5 m-md-3 ">
        <br>
        <div>
            <p class="text-start h6 desc blockquote-footer">©Valentin Antonucci</p>

            <div class="col-md-6 mx-auto my-5 text-center ">
                <h1 class="display-4 fw-bold desc">Welcome <?php print join(($_SESSION['name'])); ?></h1>
                <a class=" fs-4 text-center desc">Are you ready to take the first step towards turning your ideas into
                    reality? With just a few clicks, you can start creating your order and let us do the rest. Let
                    afterEdit help you bring your vision to life!</a><br><br>
                <a class="col-lg-10 fs-4 text-center desc py-2 text-dark text-decoration-none" href="#choose"><button
                        type="button" class="btn btn-warning ">Create order</button></a>
            </div>
        </div>

    </div>

    <div id="choose" class="pt-5">
        <div class="pricing-header p-3 cntnt pb-md-4 mx-auto text-center">
            <h1 class="display-4 fw-normal">Choose the edit that you require.</h1>
            <p class="fs-5 text-muted">Choose between Portrait photo editing and Photo manipulation. </p>
        </div>
        </header>

        <main>
            <div class="row row-cols-1 cntnt row-cols-md-2 mb-3 text-center">
                <div class="col">
                    <div class="card mb-4 rounded-3 shadow-sm">
                        <div class="card-header py-3">
                            <h4 class="my-0 fw-normal">Potrait Photo editing</h4>
                        </div>
                        <div class="card-body">
                            <h1 class="card-title pricing-card-title">Starting from ₹199/-*<small
                                    class="text-muted fw-light"></small></h1>
                            <ul class="list-unstyled mt-3 mb-4">
                                <li>Color adjustments</li>
                                <li>Skin smoothing</li>
                                <li>Background retouching</li>
                                <li>and many more...</li>
                            </ul>
                            <a href="potrait_order.php"><button type="button"
                                    class="w-100 btn btn-lg btn-outline-dark">Order</button></a>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="card mb-4 rounded-3 shadow-sm">
                        <div class="card-header py-3">
                            <h4 class="my-0 fw-normal">Photo manipulation</h4>
                        </div>
                        <div class="card-body">
                            <h1 class="card-title pricing-card-title">Starting from ₹399/-*<small
                                    class="text-muted fw-light"></small></h1>
                            <ul class="list-unstyled mt-3 mb-4">
                                <li>Background removal</li>
                                <li>Object replacement</li>
                                <li>Applying special effects</li>
                                <li>and many more...</li>
                            </ul>
                            <a href="pm_order.php"><button type="button"
                                    class="w-100 btn btn-lg btn-outline-dark">Order</button></a>
                        </div>
                    </div>
                </div>
            </div>
        </main>


    </div>

<!-- footer -->
<?php include 'partials/_footer.php';?>


</body>

</html>