<?php
$showAlert = false;
$showError = false;
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    include "partials/_dbconnect.php";
    $email = $_POST["email"];
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $otp = random_int(10000000, 99999999);
        if ($email == "") {
            $showError = "Enter valid Email/password";
        } else {
            $existSql = "SELECT * FROM `login` WHERE email = '$email' ";
            $result = mysqli_query($conn, $existSql);
            $numExistRows = mysqli_num_rows($result);
            if ($numExistRows == 0) {
                $showError = "Email is not registered. Signup to create account.";
            } else {
                $hash = password_hash($otp, PASSWORD_DEFAULT);
                $sql = "UPDATE `login`SET `reset_code` = '$hash' WHERE `email` = '$email';";
                $result = mysqli_query($conn, $sql);

                //email js after send run this if command
                if ($result) {
                    $showAlert = true;
                }
                session_start();
                $_SESSION["email"] = $email;
                $sql = "select name from login  where email = '$email' ";
                $result = mysqli_query($conn, $sql);
                // $_SESSION["name"] = mysqli_fetch_row($result);
                $_SESSION["valid"] = true;
                $_SESSION["subject"] = "Verification code from afterEdit.";
                $_SESSION["body"] = '<!DOCTYPE html>
                <html lang="en">
                <head>
                    <meta charset="UTF-8">
                    <meta http-equiv="X-UA-Compatible" content="IE=edge">
                    <meta name="viewport" content="width=device-width, initial-scale=1.0">
                    <!-- Google Fonts (aBeeZee) -->
                  <link rel="preconnect" href="https://fonts.googleapis.com">
                  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
                  <link href="https://fonts.googleapis.com/css2?family=ABeeZee&display=swap" rel="stylesheet">
                  <style>
                    @import url(\'https://fonts.googleapis.com/css2?family=ABeeZee&display=swap\');
                  </style>
                    <title></title>
                </head>
                <body>
                    <div style="font-family: \'aBeeZee\', sans-serif; min-width:1000px; overflow:auto; line-height:2">
                    <div style="margin:50px auto;width:70%;padding:20px 0">
                      <div style="border-bottom:1px solid #eee">
                        <a href="" style="font-size:1.4em;color: #00466a;text-decoration:none;font-weight:600">afterEdit</a>
                      </div>
                      <p style="font-size:1.2em">Hi, ' . $email . ' </p>
                      <p style="font-size:1.2em">Thank you for choosing afterEdit. Use the following OTP to complete your Sign Up process.</p>
                      <h3 style="background: #00466a;margin: 0 auto;width: max-content;padding: 0 10px;color: #fff;border-radius: 4px;">' . $otp . '</h3>
                      <p style="font-size:1.2em">Enter this code in our website to activate your account.<br>
                        If you have any questions, send us an email aftereditofficial@gmail.com</p><br>
                      <p style="font-size:1em;">We\'re glad you\'re here!<br />The afterEdit team</p>
                      <hr style="border:none;border-top:1px solid #eee" />
                      <div style="float:left;padding:8px 0;color:#aaa;font-size:0.8em;line-height:1;font-weight:300">
                        <p>afterEdit, India</p>
                      </div>
                    </div>
                    </div>
                </body>
                </html>';

                include "partials/_PHPmailer.php";

                header("location: email_verify.php");
            }
        }
    } else {
        $showError = "The email address is not valid.";
    }
}
?>


<!-- Source html-->
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- email js -->
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/@emailjs/browser@3/dist/email.min.js">
    </script>
    <script type="text/javascript">
    (function() {
        emailjs.init("bGqePm1l7II24C4Wx");
    })();
    </script>
    <script src='sendmail.js'></script>
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
    <link rel="stylesheet" href="css/signup.css">


    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verify Email</title>
    <link rel="icon" type="image/png" href="css/favicon.png">

</head>

<body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
    </script>
    <div class="topbar">
        <div class="d-flex flex-column flex-md-row align-items-center pb-3 border-bottom">
            <a href="home.php" class="d-flex align-items-center text-dark text-decoration-none">
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

    <?php
if ($showAlert) {
    echo ' <div class="alert alert-success alert-dismissible fade show" role="alert"> 
    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check-circle-fill" viewBox="0 0 16 16">
    <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
  </svg>
    <strong>Congratulations!</strong> Your account has been created. You can now   <a class="col-lg-10 fs-4 text-center desc py-2 text-dark text-decoration-none" href="login.php"><button type="button"
    class="btn btn-dark me-2">Login</button></a>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
';
}
if ($showError) {
    echo ' <div class="alert alert-danger alert-dismissible fade show" role="alert">
    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-exclamation-triangle-fill" viewBox="0 0 16 16">
  <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
</svg>
    <strong>Error. </strong> ' . $showError . '
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
';
}
?>


    <div class="container col-xl-10 col-xxl-8 px-4 py-5">
        <div class="row align-items-center g-lg-5 py-5">
            <div class="col-lg-7 text-center text-lg-start">
                <h1 class="display-4 fw-bold ">Hello Friend!</h1>
                <a class="col-lg-10 fs-4 text-center desc">You're just a few clicks away from turning your ideas into
                    reality. Verify your email id to continue. </a><br><br>
                <a class="col-lg-10 fs-4 text-center desc"><a
                        class="col-lg-10 fs-4 text-center desc py-2 text-dark text-decoration-none"
                        href="signup.php"><button type="button" class="btn btn-outline-dark me-2">Signup</button> if you
                        dont have an account </a></a> <br>

            </div>
            <div class="col-md-10 mx-auto col-lg-5">
                <form class="p-4 p-md-5 border rounded-3 bg-light" action="/AfterEdit/email_send_otp.php" method="post">

                    <title>Bootstrap</title><span class="lglogo"><svg xmlns="http://www.w3.org/2000/svg" width="30"
                            height="30" fill="currentColor" class="bi bi-alt " viewBox="0 0 16 16">
                            <path
                                d="M1 13.5a.5.5 0 0 0 .5.5h3.797a.5.5 0 0 0 .439-.26L11 3h3.5a.5.5 0 0 0 0-1h-3.797a.5.5 0 0 0-.439.26L5 13H1.5a.5.5 0 0 0-.5.5zm10 0a.5.5 0 0 0 .5.5h3a.5.5 0 0 0 0-1h-3a.5.5 0 0 0-.5.5z" />

                        </svg>afterEdit.</span>

                    </a>
                    <div class="form-floating mb-3">
                        <input type="email" class="form-control" id="email" name="email" placeholder="name@example.com"
                            required>
                        <label for="email">Email address</label>
                    </div>
                    <button class="w-100 btn btn-lg btn-dark" name="submit" type="submit">Send Otp</button>
                    <hr class="my-4">
                    <small class="text-muted">Facing troubles? - Reach us at <a href="support.php"
                            class="text-dark">Support</a></small>
                </form>
            </div>
        </div>
    </div>



   <!-- footer -->
<?php include 'partials/_footer.php';?>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js"
        integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js"
        integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>

</body>

</html>