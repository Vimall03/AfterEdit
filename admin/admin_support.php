<?php
session_start();

if (!isset($_SESSION['adloggedin']) || $_SESSION['adloggedin'] != true) {
    header("location: admin_logout.php");
    exit;
}

if($_SERVER["REQUEST_METHOD"]=="POST"){
    include 'partials/_dbconnect.php';

    $req = $_POST['slno'];
    $spam = $_POST['spam'];
    if($spam == "spam"){
    $sql = "DELETE FROM `support` WHERE slno ='$req';";
        $result = mysqli_query($conn, $sql);
        if($result){
        header("location: admin_support.php");
        }
    }
    
else{
      $email = $_POST['email'];
      $query = $_POST['query'];
      $name = $_POST['Name'];
      $dt = $_POST['dt'];
      $reply = $_POST['reply'];
      $_SESSION["subject"] =  "[After Edit] Support Ticket Response";
      $_SESSION["body"] = '<!DOCTYPE html>
      <html>
        <head>
          <meta charset="UTF-8">
          <title>After Edit Support Ticket Response/Resolution</title>
        </head>
        <body>
          <table style="width:600px; margin:0 auto; border:1px solid #ddd;">
            <tr>
              <td style="background-color:#f2f2f2; padding:20px;">
                <h2 style="text-align:center;">After Edit</h2>
              </td>
            </tr>
            <tr>
              <td style="padding:20px;">
                <h3>Dear '.$name.',</h3>
                <p>Thank you for reaching out to us at After Edit. We are glad to have been of assistance in resolving your issue.</p>
                <p>In reference to your support ticket, which was received on '.$dt.', In your ticket, you mentioned
                <p style="background-color:#f2f2f2; padding:10px;">'.$query.'</p>          
                <p>I am happy to inform you that the issue has now been resolved. Our team has worked diligently to address your concern, and we have provided the solution as follows:</p>
                <p style="background-color:#f2f2f2; padding:10px;">'.$reply.'</p> 
                <p>We hope that the solution provided will meet your needs and expectations. If you have any further questions or concerns, please do not hesitate to reach out to us. Our support team is available to assist you 24/7, and we will do our best to provide you with the help you need.</p>
                <p>Thank you again for your support and understanding. We look forward to serving you in the future.</p>
                <p>Ignore this mail if you did not raise the support ticket.</p>
                <br>
                <p>Best regards,</p>
                <p>After Edit Support Team</p>
              </td>
            </tr>
            <tr>
              <td style="background-color:#f2f2f2; padding:20px; text-align:center;">
                &copy; 2023 After Edit
              </td>
            </tr>
          </table>
        </body>
      </html>';
    include "partials/_PHPmailer.php";
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
    <title>Support</title>
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
                <a class="me-3 py-2 text-dark text-decoration-none" href="#">Support</a>
                <a class="me-3 py-2 text-dark text-decoration-none" href="admin_users.php">Users</a>
                <a class="me-3 py-2 text-dark text-decoration-none" href="admin_bills.php">Bills</a>
                <a class="py-2 text-dark text-decoration-none" href="admin_logout.php"><button type="button"
                        class="btn btn-outline-dark me-2">Logout</button></a>
            </nav>
        </div>
    </div>

        <!-- TABLE -->
        <div class="container holder">
            <h2 class="display-5 fw-bold text-center">SUPPORT</h2>
            <!-- table -->
            <div class="container mt-5 px-2 ">
                <div class="table-responsive-sm">
                    <table class="table table-hover  table-responsive table-bordered border-dark">
                        <?php include 'partials/_dbconnect.php';
                                        $sql = "select * FROM support";
                                        $result = mysqli_query($conn, $sql);
                                        echo' <thead> <tr>
                                        <th scope="col" width="5%"><span>#</span></th>
                                        <th scope="col" width="10%">Date</th>
                                        <th scope="col" width="10%">Name</th>
                                        <th scope="col" width="20%">Email</th>
                                        <th scope="col" width="30%">Query</th>
                                        <th scope="col" width="15%">reply</th>
                                        <th scope="col" width="2%">Solve</th>
                                        <th scope="col" width="2%">Spam</th>
                                        </tr>
                                        </thead>';

                                        while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
                                        echo "<tbody>";
                                        echo" <tr>";
                                        echo"<td> <b>"; echo $row['slno']; echo "</b></td>";
                                        echo"<td>"; echo $row['dt']; echo "</td>";
                                        echo"<td>"; echo $row['Name']; echo "</td>";
                                        echo"<td>"; echo $row['email']; echo "</td>";
                                        echo"<td>"; echo $row['query']; echo "</td>"; 
                                        echo"<td>"; 
                                        echo '<form method="post" action="/afteredit/admin/admin_support.php">
                                        <input type="text" class="form-control" id="reply" name="reply" placeholder="Reply" required="">';
                                        echo"<td>"; 

                                        echo '<input type="hidden" id="" name="slno" value="';echo $row['slno']; echo'">
                                        <input type="hidden" id="" name="email" value="';echo $row['email']; echo'">
                                        <input type="hidden" id="" name="query" value="';echo $row['query']; echo'">
                                        <input type="hidden" id="" name="dt" value="';echo $row['dt']; echo'">
                                        <input type="hidden" id="" name="Name" value="';echo $row['Name']; echo'">
                                        <input type="hidden" id="" name="spam" value="notspam">                                        


                                        <button class="btn btn-outline-success" type="submit">Solve</button></form></td>';
                                        echo"<td>";
                                        echo '<form method="post" action="/afteredit/admin/admin_support.php">
                                        <input type="hidden" id="" name="slno" value="';echo $row['slno']; echo'">
                                        <input type="hidden" id="" name="spam" value="spam">                                        
                                        <button class="btn btn-outline-danger" type="submit">Spam</button>
                                        </form>';   
                                        echo "</td>";                            
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