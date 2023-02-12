<?php
session_start();

if (!isset($_SESSION['adloggedin']) || $_SESSION['adloggedin'] != true) {
    header("location: admin_logout.php");
    exit;
}
include 'partials/_dbconnect.php';

$sql = "SELECT * from `orders` where transaction_status = 'Success' and edit_status != 'delivered'";

if ($result = mysqli_query($conn, $sql)) {
    $orders = mysqli_num_rows( $result );
 }

$sql = "SELECT * from `login`";

if ($result = mysqli_query($conn, $sql)) {
    $users = mysqli_num_rows( $result );
 }

 $sql = "SELECT * from `support`";

if ($result = mysqli_query($conn, $sql)) {
    $support = mysqli_num_rows( $result );
 }
 
 $sql = "SELECT * from `billing`";

 if ($result = mysqli_query($conn, $sql)) {
     $billing = mysqli_num_rows( $result );
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
    <link rel="stylesheet" href="css/admin_welcome.css">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome Admin</title>
    <link rel="icon" type="image/png" href="css/icon.png">
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
                <a class="me-3 py-2 text-dark text-decoration-none" href="#">Home</a>
                <a class="me-3 py-2 text-dark text-decoration-none" href="admin_Porders.php">Track</a>
                <a class="me-3 py-2 text-dark text-decoration-none" href="admin_support.php">Support</a>
                <a class="me-3 py-2 text-dark text-decoration-none" href="admin_users.php">Users</a>
                <a class="me-3 py-2 text-dark text-decoration-none" href="admin_bills.php">Bills</a>
                <a class="py-2 text-dark text-decoration-none" href="admin_logout.php"><button type="button"
                        class="btn btn-outline-dark me-2">Logout</button></a>
            </nav>
        </div>
    </div>
    <main class="holder">
        <div class="container">
            <div class="p-5 mb-4 bg-success-subtle rounded-3">
                <div class="container-fluid ">
                    <h1 class="display-5 fw-bold"><b>#<?php echo $orders ?></b> Pending Orders</h1>
                    <p class="col-md-8 fs-4"> This section is an essential component of the After Edit admin panel,
                        as it provides a clear overview of the current workload and enables administrators to manage
                        the editing process
                        effectively.</p><a class="py-2 text-dark text-decoration-none" href="admin_Porders.php">
                        <button class="btn btn-outline-secondary btn-lg" type="button">Go to orders</button></a>
                </div>
            </div>
            <div class="row mb-5 align-items-md-stretch">
                <div class="col-md-4">
                    <div class="h-100 p-5 text-bg-dark  rounded-3">
                        <h2><b class="text-warning"><?php echo $users ?></b> Users</h2>
                        <p>This section refers to the individuals who have signed up for an account on AfterEdit
                            website. This information is displayed in a table on the admin panel, and provides
                            administrators with a snapshot of the user base on the website.</p>
                        <a class="py-2 text-dark text-decoration-none" href="admin_users.php">
                            <button class="btn btn-outline-warning" type="button">Go to users</button></a>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="h-100 p-5 bg-info-subtle border rounded-3">
                        <h2>Bills Generated <b class="text-success"><?php echo $billing ?></b></h2>
                        <p>This panel is an essential component of the After Edit admin panel, as
                            it provides valuable insights into the financial performance of the website and enables
                            administrators to make informed decisions about the future development of the platform.
                        </p><a class="py-2 text-dark text-decoration-none" href="admin_bills.php">
                            <button class="btn btn-outline-dark" type="button">Go to Billing</button></a>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="h-100 p-5 bg-danger-subtle  border rounded-3">
                        <h2><b class="text-danger"><?php echo $support ?></b> Support tickets </h2>
                        <p>The support ticket section is an important component of the After Edit admin panel, as it
                            provides a platform for users to submit requests for help and support, and enables
                            administrators to manage these requests effectively.</p>
                        <a class="py-2 text-dark text-decoration-none" href="admin_support.php">
                            <button class="btn btn-outline-dark" type="button">View queries</button></a>
                    </div>
                </div>
            </div>
        </div>
    </main>
    </div>
</body>

</html>