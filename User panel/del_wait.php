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
    <link rel="stylesheet" href="css/login.css">


    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AfterEdit • Order Pending</title>
    <link rel="icon" type="image/png" href="css/favicon.png">

</head>

<body>
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
                <title>Bootstrap</title><span class="logo">afterEdit.</span>
            </a>

            <nav class="d-flex hov align-items-center mt-2 mt-md-0 ms-md-auto">
                <a class="me-3 py-2 text-dark text-decoration-none" href="#"></a>
                <a class="me-3 py-2 text-dark text-decoration-none" href="#"></a>
                <a class="me-3 py-2 text-dark text-decoration-none" href="#"></a>
                <a class="me-3 py-2 text-dark text-decoration-none" href="#"></a>

            </nav>
        </div>
    </div>




    <br>
    <div class="align-items-center p-5 m-5 text-center text-lg-start">
        <h1 class="display-4 fw-bold ">Opps we are not done yet!</h1>
        <a class="col-lg-10 fs-4 text-center desc">Kindly wait while our Editors are working on your Picture. We will
            email you once we complete editing.<br>Also note that the deliveries can take up to 7 days from the date of
            payment of the base fee.</a><br><br>
        <a class="col-lg-10 fs-4 text-center desc py-2 text-dark text-decoration-none" href="welcome.php"><button
                type="button" class="btn btn-outline-dark me-2">Go home</button></a>
        <a class="col-lg-10 fs-4 text-center desc py-2 text-dark text-decoration-none" href="logout.php"><button
                type="button" class="btn btn-outline-dark me-2">Logout</button></a>
    </div>
    </div>
    </div>
<!-- footer -->
<?php include 'partials/_footer.php';?>

</body>

</html>