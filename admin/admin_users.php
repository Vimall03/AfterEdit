<?php

session_start();

if (!isset($_SESSION['adloggedin']) || $_SESSION['adloggedin'] != true) {
    header("location: admin_logout.php");
    exit;
}

if($_SERVER["REQUEST_METHOD"]=="POST"){
    include 'partials/_dbconnect.php';
    $req = $_POST['slno'];
    $email = $_POST['email'];

        $sql = "DELETE FROM `login` WHERE slno ='$req' AND email = '$email';";
        $result = mysqli_query($conn, $sql);
        if($result){
        header("location: admin_users.php");
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
    <link rel="stylesheet" href="css/admin_suprt.css">


    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Users</title>
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
                <a class="me-3 py-2 text-dark text-decoration-none" href="admin_welcome.php">Home</a>
                <a class="me-3 py-2 text-dark text-decoration-none" href="admin_Porders.php">Track</a>
                <a class="me-3 py-2 text-dark text-decoration-none" href="admin_support.php">Support</a>
                <a class="me-3 py-2 text-dark text-decoration-none" href="#">Users</a>
                <a class="me-3 py-2 text-dark text-decoration-none" href="admin_bills.php">Bills</a>
                <a class="py-2 text-dark text-decoration-none" href="admin_logout.php"><button type="button"
                        class="btn btn-outline-dark me-2">Logout</button></a>
            </nav>
        </div>
    </div>

    <!-- TABLE -->
    <div class="container holder">
        <h2 class="display-5 fw-bold text-center">USERS</h2>
        <!-- table -->
        <div class="container mt-5 px-2 ">
            <div class="table-responsive-sm">
                <table class="table table-hover  table-responsive table-bordered border-dark">
                    <?php include 'partials/_dbconnect.php';
                                        $sql = "select * FROM login";
                                        $result = mysqli_query($conn, $sql);
                                        echo' <thead> <tr>
                                        <th scope="col" width="5%"><span>#</span></th>
                                        <th scope="col" width="10%">Date</th>
                                        <th scope="col" width="10%">Name</th>
                                        <th scope="col" width="20%">Email</th>
                                        <th scope="col" width="30%">account_status</th>
                                        <th scope="col" width="15%">reset_code</th>
                                        <th scope="col" width="2%">Delete_User</th>
                                        </tr>
                                        </thead>';

                                        while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
                                        echo "<tbody>";
                                        echo" <tr>";
                                        echo"<td> <b>"; echo $row['slno']; echo "</b></td>";
                                        echo"<td>"; echo $row['dt']; echo "</td>";
                                        echo"<td>"; echo $row['name']; echo "</td>";
                                        echo"<td>"; echo $row['email']; echo "</td>";
                                        echo"<td>"; echo $row['account_status']; echo "</td>";
                                        echo"<td>"; echo $row['reset_code']; echo "</td>";  
                                        echo"<td>"; 
                                        echo '<form method="post" action="/afteredit/admin/admin_users.php">
                                        <input type="hidden" id="" name="slno" value="';echo $row['slno']; echo'">
                                        <input type="hidden" id="" name="email" value="';echo $row['email']; echo'">
                                        <button class="btn btn-outline-success" type="submit">Delete</button></form>';                          
                                        echo "</tr>";
                                        echo "</tbody>";};?>
                </table>
            </div>
        </div>
    </div>
    </div>
    </div>
</body>

</html>