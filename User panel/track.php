<?php
session_start();

if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] != true) {
    header("location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <!-- bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.2/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

    <!-- Google Fonts (aBeeZee) -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=ABeeZee&display=swap" rel="stylesheet">
    <style>
    @import url('https://fonts.googleapis.com/css2?family=ABeeZee&display=swap');
    </style>
    <!-- css link -->
    <link rel="stylesheet" href="css/track.css">


    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AfterEdit • Track orders</title>
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
                <a class="me-3 py-2 text-dark text-decoration-none" href="welcome.php">Home</a>
                <a class="me-3 py-2 text-dark text-decoration-none" href="#">Track</a>
                <a class="me-3 py-2 text-dark text-decoration-none" href="support.php">Support</a>
                <a class="py-2 text-dark text-decoration-none" href="logout.php"><button type="button"
                        class="btn btn-outline-dark me-2">Logout</button></a>
            </nav>
        </div>
    </div>


    <div class="p-5 mb-4 bg-white rounded-3">
        <div class="container-fluid py-5">
            <h2 class="display-5 fw-bold">Track Your Order :</h2>

            <!-- table -->

            <div class="container mt-5 px-2">
                <div class="table-responsive">
                    <table class="table table-responsive table-bordered">
                        <?php
                        include "partials/_dbconnect.php";
                        $email = $_SESSION["email"];
                        $sql = "select * FROM orders  where Reg_email = '$email'";
                        $result = mysqli_query($conn, $sql);
                        echo ' <thead>
                            <tr class="bg-white">
                                <th scope="col" width="5%"><span>#</span></th>
                                <th scope="col" width="10%">Date</th>
                                <th scope="col" width="20%">Image</th>
                                <th scope="col" width="15%">Status</th>
                                <th scope="col" width="20%">Email</th>
                                <th scope="col" width="15%">Delivery Link</th>
                                <th scope="col" width="10%">Payment</th>
                                <th scope="col" class="text-end" width="5%"><span>Paid</span></th>
                            </tr>
                        </thead>';
                        while (
                            $row = mysqli_fetch_array($result, MYSQLI_ASSOC)
                        ) {
                            echo "<tbody>";
                            echo " <tr>";
                            echo "<td>";
                            echo $row["Order_id"];
                            echo "</td>";
                            echo "<td>";
                            echo $row["Date"];
                            echo "</td>";
                            echo "<td>";
                            $imglink = $row["Img_link"];
                            echo "<a href='$imglink'> Drive link uploaded by the user";
                            echo "</a></td>";
                            echo "<td>";
                            echo $row["edit_status"];
                            echo "</td>";
                            echo "<td>";
                            echo $row["Contact"];
                            echo "</td>";
                            echo "<td>";
                            $link = $row["Delivery_link"];
                            echo "<a href='$link'> click here";
                            echo "</a></td>";
                            echo "<td>";
                            echo $row["Tran_status."];
                            echo "</td>";
                            echo "<td>₹";
                            echo $row["base_fee"];
                            echo "</td>";
                            echo "</tr>";
                            echo "</tbody>";
                        }
                        ?>
                    </table>
                </div>
            </div>
            <br>
            <br>
            <br>
            <p class="col-lg-10 fs-6 desc">Orders will only be edited after the payment of the base fee is done.
                Contact us with the Order Id to get further help. </p>
            <!-- table -->
            <br>
            <a class="py-2 text-dark text-decoration-none" href="support.php"><button type="button"
                    class="btn btn-dark btn-lg me-2">Need help?</button></a>
            <br>
            <br>


        </div>
    </div>

<!-- footer -->
<?php include 'partials/_footer.php';?>


</body>

</html>