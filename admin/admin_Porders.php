<?php
session_start();

if (!isset($_SESSION['adloggedin']) || $_SESSION['adloggedin'] != true) {
    header("location: admin_logout.php");
    exit;
}

if($_SERVER["REQUEST_METHOD"]=="POST"){
    include 'partials/_dbconnect.php';
$type = $_POST['type'];

    if($type == 'update') {
    $update = $_POST['update'];
    $Orderid = $_POST['Orderid'];

    $sql = "UPDATE `orders`
    SET `edit_status` = '$update'
    WHERE `Order_id` = '$Orderid';";
        $result = mysqli_query($conn, $sql);
        if($result){
        header("location: admin_Porders.php");
        }
      }
    
      if($type == 'deliver') {
        $link = $_POST['deliverlink'];
        $Orderid = $_POST['Orderid'];
    
        $sql = "UPDATE `orders`
        SET `Delivery_link` = '$link',
        `edit_status` = 'Delivered'
        WHERE `Order_id` = '$Orderid';";
            $result = mysqli_query($conn, $sql);
            if($result){
            header("location: admin_Porders.php");
            }
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
    <link rel="stylesheet" href="css/Porders.css">


    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pending Orders</title>
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
                <a class="me-3 py-2 text-dark text-decoration-none" href="#">Track</a>
                <a class="me-3 py-2 text-dark text-decoration-none" href="admin_support.php">Support</a>
                <a class="me-3 py-2 text-dark text-decoration-none" href="admin_users.php">Users</a>
                <a class="me-3 py-2 text-dark text-decoration-none" href="admin_bills.php">Bills</a>
                <a class="py-2 text-dark text-decoration-none" href="admin_logout.php"><button type="button"
                class="btn btn-outline-dark me-2">Logout</button></a>
            </nav>
        </div>
    </div>
        <!-- TABLE -->
        <h2 class="display-5 fw-bold text-center">Track Orders</h2>
            <!-- table -->
            <div class="container mt-5 px-2">
                <div class="table-responsive">
                    <table class="table table-hover table-responsive table-bordered border-dark">
                    <?php include 'partials/_dbconnect.php';
                                        $sql = "select * FROM orders where Transaction_status = 'SUCCESS' AND edit_status != 'delivered' ";
                                        $result = mysqli_query($conn, $sql);
                                        echo'
                                        <thead>
                                        <tr>
                                        <th>Order ID</th>
                                        <th>Date</th>
                                        <th>Name</th>
                                        <th>Image Link</th>
                                        <th>Sample Image Link</th>
                                        <th>SR</th>
                                        <th>CC</th>
                                        <th>Level</th>
                                        <th>Instructions</th>
                                        <th>Status</th>
                                        <th width="20%">Update_Status</th>
                                        <th>Delivery_link</th>
                                        <th>Deliver</th>
                                        <th>Contact Email</th>
                                        </tr>
                                        </thead>';
                                        while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
                                        echo "<tbody>";
                                        echo" <tr>";
                                        echo"<td> <b>"; echo $row['Order_id']; echo "</b></td>";
                                        echo"<td>"; echo $row['Date']; echo "</td>";
                                        echo"<td>"; echo $row['Name']; echo "</td>";
                                        echo"<td>";
                                        $imglink = $row['Img_link'];
                                        echo "<a href='$imglink'> Drive link"; 
                                        echo "</a></td>"; 
                                        echo"<td>";
                                        $simg = $row['Slink'];
                                        echo "<a href='$simg'> Sample image"; 
                                        echo "</a></td>"; 
                                        echo"<td>"; echo $row['Skin_ret']; echo "</td>";
                                        echo"<td>"; echo $row['Color_corr']; echo "</td>";
                                        echo"<td>"; echo $row['Level']; echo "</td>";
                                        echo"<td>"; echo $row['Instructions']; echo "</td>";
                                        echo"<td>"; echo $row['edit_status']; echo "</td>";
                                        
                                        echo '<td><form method="post" action="/afteredit/admin/admin_Porders.php">
                                        <div class="form-group">
                                        <label for="inputState"></label>
                                        <select id="inputState" name="update" class="form-control">
                                        <option>Sent to editors</option>
                                        <option>Editing</option>
                                        <option>Final payment pending</option>
                                        </select>
                                        <input type="hidden" id="" name="type" value="update">
                                        <input type="hidden" id="" name="Orderid" value="';echo $row['Order_id']; echo'">
                                        <button class="btn mt-1 btn-outline-success" type="submit">Update</button>
                                        </div></form></td>';

                                        echo '<td><form method="post" action="/afteredit/admin/admin_Porders.php">
                                        <input type="hidden" id="" name="type" value="deliver">
                                        <input type="hidden" id="" name="Orderid" value="';echo $row['Order_id']; echo'">
                                        <input type="text" class="form-control mt-1" id="link" name="deliverlink" placeholder="link" required=""></td>
                                        <td> <button class="btn mt-1 btn-outline-danger" type="submit">deliver</button></td>
                                        </form>';   
                                        echo"<td>"; echo $row['Contact']; echo "</td>";
                                        echo "</td>";                            
                                        echo "</tr>";
                                        echo "</tbody>";};?>
                            </table>
                </div>
            </div>
        </div>
</body>

</html>