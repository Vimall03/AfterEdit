<?php
session_start();
session_unset();
session_destroy();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <!-- js animation link -->
  <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />

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
  <link rel="stylesheet" href="css/style.css">


  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>AfterEdit • Home</title>
  <link rel="icon" type="image/png" href="css/favicons">
</head>

<body>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous">
    </script>
  <div class="topbar">
    <div class="d-flex flex-column flex-md-row align-items-center pb-3 mb-4  border-bottom">
      <a href="#" class="d-flex align-items-center navele text-dark text-decoration-none">
        <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-alt"
          viewBox="0 0 16 16">
          <path
            d="M1 13.5a.5.5 0 0 0 .5.5h3.797a.5.5 0 0 0 .439-.26L11 3h3.5a.5.5 0 0 0 0-1h-3.797a.5.5 0 0 0-.439.26L5 13H1.5a.5.5 0 0 0-.5.5zm10 0a.5.5 0 0 0 .5.5h3a.5.5 0 0 0 0-1h-3a.5.5 0 0 0-.5.5z" />
        </svg>
        <title>Bootstrap</title><span class="logo">afterEdit.</span>
      </a>

      <nav class="d-flex hov align-items-center mt-2 mt-md-0 ms-md-auto navele">
        <a class="me-3 py-2 text-dark text-decoration-none " href="#about">About</a>
        <a class="me-3 py-2 text-dark text-decoration-none" href="#features">Features</a>
        <a class="me-3 py-2 text-dark text-decoration-none" href="#pricing">Pricing</a>
        <a class="me-3 py-2 text-dark text-decoration-none" href="support.php">Support</a>
        <a class="py-2 text-dark text-decoration-none" href="login.php"><button type="button"
            class="btn btn-outline-dark me-2">Login</button></a>
      </nav>
    </div>
  </div>

  <div class="banner">
    <div class="intro" data-aos="fade-up" data-aos-duration="1000" >
      <h1>Hola, We are afterEdit.</h1>
      <h2>You shoot, We edit.</h2><br>
      <a href="signup.php" ><button type="button" class="btn btn-dark gtstrd me-2">Get started</button></a><!-- ignore this part ->> --><br><br> <div id="about"></div> <!--for adjusting the scroll -->
    </div>
  </div>


  <section class="py-5 text-center container" data-aos="fade-up" data-aos-duration="1500" data-aos-offset="200">
    <div class="row py-lg-5">
      <div class="col-lg-6 col-md-8 mx-auto abt" >
        <h1 class="fw-light">About Us</h1>
        <p class="lead text-muted">"We are a team of professional editors that supports various clients in
          9+ countries. Helping you achieve professional quality results with our friendly service and no-subscriptions model!.
          From basic to advanced edits, pay only for what you need!" </p>
        <p>
          <a href="signup.php" class="btn btn-dark my-2">Get started / Sign Up</a>
          <a href="login.php" class="btn btn-secondary my-2">Login</a> 
            <!-- ignore this part ->> -->   <div id="features"></div> <!--for adjusting the scroll -->
        </p>
      </div>
    </div>
  </section>




  <div class="container px-4 py-5" data-aos="fade-up" data-aos-duration="1000"  data-aos-offset="200">
    <h2 class="pb-2 border-bottom">Features</h2>
    <div class="row g-4 py-5 row-cols-1 row-cols-lg-3">
      <div class="col d-flex align-items-start">
      <div>
          <h3 class="fs-3">"Working Process of afterEdit: <span class="text-muted">Mind-Blowing Results Guaranteed!"</span></h3>
          <div>
            <p><li class="list-unstyled mt-3">AfterEdit offers a hassle-free online photo editing service that you can get up and running in just four simple steps!</li></p>
            <li class="list-unstyled mt-3">1. Create account and upload your photo/s.</li>
            <li class="list-unstyled">2. Write detailed instructions, attach sample photos.</li>
            <li class="list-unstyled ">3. Get your edited photos back.</li>
            <li class="list-unstyled ">4. Accept the work or request changes (if necessary).</li>
          </div>
      </div>
      </div>
      <div class="col d-flex align-items-start">
        
        <div>
          <h3 class="fs-2">Oh yeah, it's that good. <span class="text-muted">See for
            yourself.</span></h3>
          <p><li class="list-unstyled mt-3 mb-4">Are you a photographer looking to make your portrait photos look their best? Look no further than AfterEdit!
             Our retouchers have the skills and tools to enhance body shapes, skin texture, and remove any unwanted imperfections, while still keeping your
              models looking realistically edited. Let us show you how easy it can be to make your images look professional and stunning!</li></p>
        </div>
      </div>
      <div class="col d-flex align-items-start">
        
        <div>
          <h3 class="fs-2">And lastly, this one. <span class="text-muted">We understand.</span></h3>
          <p><li class="list-unstyled mt-3 mb-4">Whether you're a beginner or an experienced photographer, we have everything you need to take your photos to the next level.
            With our cutting-edge technology and professional services, you can rest assured that your photos will look their best. Let us take the hassle out of photo editing,
             so you can focus on what matters most - taking great photos.</li></p>
          
        </div>
      </div>
    </div>
  </div>



<div class="container marketing">
  <div class="container px-4 py-5" id="custom-cards" data-aos="fade-up" data-aos-duration="2000"  data-aos-offset="200">
    <h2 class="pb-2 border-bottom">Our recent projects:<span class="text-muted"> Hover to see the magic.</span></h2>
    <div class="row row-cols-1 row-cols-lg-3 align-items-stretch g-4 py-5">
      <div class="col">
        <div class="card card-cover overflow-hidden  rounded-4 img1 shadow-lg">
          <div class="card card-cover overflow-hidden  rounded-4 onimg1 shadow-lg">

          <div class="d-flex flex-column h-100 p-5 pb-3 text-white text-shadow-1">
            <h3 class="display-6 fw-bold htxt2">#Bokhelight Effect</h3>

            <ul class="d-flex list-unstyled mt-auto">
              <li class="me-auto text-black">
                <small>©Copyright to Etsy</small>
              </li>
              <li class="d-flex align-items-center me-3">
                <svg class="bi me-2" width="1em" height="1em"><use xlink:href="#geo-fill"></use></svg>
                
              </li>
            </ul>
          </div>
        </div>
        </div>
      </div>

      <div class="col">
        <div class="card card-cover overflow-hidden  rounded-4 img3 shadow-lg">
          <div class="card card-cover overflow-hidden  rounded-4 onimg3 shadow-lg">

          <div class="d-flex flex-column h-100 p-5 pb-3 text-white text-shadow-1">
            <h3 class="display-6 fw-bold htxt3">#Photo Manipulation</h3>

            <ul class="d-flex list-unstyled mt-auto">
              <li class="me-auto text-black">
                <small>©Copyright to brandonwoelfel</small>
              </li>
              <li class="d-flex align-items-center me-3">
                <svg class="bi me-2" width="1em" height="1em"><use xlink:href="#geo-fill"></use></svg>
                
              </li>
            </ul>
          </div>
        </div>
        </div>
      </div>

      <div class="col">
        <div class="card card-cover overflow-hidden  rounded-4 img2 shadow-lg">
          <div class="card card-cover overflow-hidden  rounded-4 onimg2 shadow-lg">

          <div class="d-flex flex-column h-100 p-5 pb-3 text-white text-shadow-1">
            <h3 class="display-6 fw-bold htxt3">#Photo Correction</h3>

            <ul class="d-flex list-unstyled mt-auto">
              <li class="me-auto text-black">
                <small>©Copyright to Lilia Alvarado</small>
              </li>
              <li class="d-flex align-items-center me-3">
                <svg class="bi me-2" width="1em" height="1em"><use xlink:href="#geo-fill"></use></svg>
              </li>
            </ul>
          </div>
        </div>
        </div>
      </div>
    </div>
  </div>


  <div id="pricing">
    <div class="pricing-header p-3 pb-md-4 mx-auto text-center">
        <h1 class="display-4 fw-normal">Pricing</h1>
        <p class="fs-5 text-muted">Reach Your Goals Faster with afterEdit's
          Flexible Plans and Payment Options!</p>
    </div>
    </header>

    <main>
        <div class="row row-cols-1 cntnt row-cols-md-3 mb-3 text-center">
            <div class="col">
                <div class="card mb-4 rounded-3 shadow-sm">
                    <div class="card-header py-3">
                        <h4 class="my-0 fw-normal">Free</h4>
                    </div>
                    <div class="card-body">
                        <h1 class="card-title pricing-card-title">₹0<small class="text-muted fw-light">/mo</small></h1>
                        <ul class="list-unstyled mt-3 mb-4">
                            <li>Orders take 7 days to deliver</li>
                            <li>Pay for the individual order</li>
                            <li>Email support</li>
                            <li>Help center access</li>
                        </ul>
                        <a href="signup.php"><button type="button" class="w-100 btn btn-lg btn-outline-dark">Sign up for free</button></a>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card mb-4 rounded-3 shadow-sm">
                    <div class="card-header py-3">
                        <h4 class="my-0 fw-normal">Pro</h4>
                    </div>
                    <div class="card-body">
                        <h1 class="card-title pricing-card-title">₹150<small class="text-muted fw-light">/mo</small></h1>
                        <ul class="list-unstyled mt-3 mb-4">
                            <li>2 day Delivery</li>
                            <li>Covers upto 5 order per month</li>
                            <li>Priority email support</li>
                            <li>Help center access</li>
                        </ul><a href="support.php">
                        <button type="button" class="w-100 btn btn-lg btn-outline-dark">Contact Us</button></a>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="card mb-4 rounded-3 shadow-sm border-dark">
                    <div class="card-header py-3 text-bg-dark border-dark">
                        <h4 class="my-0 fw-normal">Enterprise</h4>
                    </div>
                    <div class="card-body">
                        <h1 class="card-title pricing-card-title">₹500<small class="text-muted fw-light">/mo</small></h1>
                        <ul class="list-unstyled mt-3 mb-4">
                            <li>Priority Delivery</li>
                            <li>Unlimited orders</li>
                            <li>Phone and email support</li>
                            <li>Help center access</li>
                        </ul>
                        <a class="w-100 btn btn-lg btn-lg text-bg-dark">Launching soon</a>
                    </div>
                </div>
            </div>
        </div>

        <h2 class="display-6 text-center mb-4">Compare plans</h2>

        <div class="table-responsive">
            <table class="table text-center">
                <thead>
                    <tr>
                        <th style="width: 34%;"></th>
                        <th style="width: 22%;">Free</th>
                        <th style="width: 22%;">Pro</th>
                        <th style="width: 22%;">Enterprise</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th scope="row" class="text-start">Help centre access</th>
                        <td><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check2" viewBox="0 0 16 16">
                            <path d="M13.854 3.646a.5.5 0 0 1 0 .708l-7 7a.5.5 0 0 1-.708 0l-3.5-3.5a.5.5 0 1 1 .708-.708L6.5 10.293l6.646-6.647a.5.5 0 0 1 .708 0z"/>
                          </svg></td>
                        <td><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check2" viewBox="0 0 16 16">
                            <path d="M13.854 3.646a.5.5 0 0 1 0 .708l-7 7a.5.5 0 0 1-.708 0l-3.5-3.5a.5.5 0 1 1 .708-.708L6.5 10.293l6.646-6.647a.5.5 0 0 1 .708 0z"/>
                          </svg></td>
                        <td><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check2" viewBox="0 0 16 16">
                            <path d="M13.854 3.646a.5.5 0 0 1 0 .708l-7 7a.5.5 0 0 1-.708 0l-3.5-3.5a.5.5 0 1 1 .708-.708L6.5 10.293l6.646-6.647a.5.5 0 0 1 .708 0z"/>
                          </svg></td>
                    </tr>
                    <tr>
                        <th scope="row" class="text-start">Priority Email Support</th>
                        <td></td>
                        <td><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check2" viewBox="0 0 16 16">
                            <path d="M13.854 3.646a.5.5 0 0 1 0 .708l-7 7a.5.5 0 0 1-.708 0l-3.5-3.5a.5.5 0 1 1 .708-.708L6.5 10.293l6.646-6.647a.5.5 0 0 1 .708 0z"/>
                          </svg></td>
                        <td><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check2-all" viewBox="0 0 16 16">
                            <path d="M12.354 4.354a.5.5 0 0 0-.708-.708L5 10.293 1.854 7.146a.5.5 0 1 0-.708.708l3.5 3.5a.5.5 0 0 0 .708 0l7-7zm-4.208 7-.896-.897.707-.707.543.543 6.646-6.647a.5.5 0 0 1 .708.708l-7 7a.5.5 0 0 1-.708 0z"/>
                            <path d="m5.354 7.146.896.897-.707.707-.897-.896a.5.5 0 1 1 .708-.708z"/>
                          </svg></td>
                    </tr>
                </tbody>

                <tbody>
                    <tr>
                        <th scope="row" class="text-start">2 day delivery</th>
                        <td><svg class="bi" width="24" height="24">
                                <use xlink:href="#check"></use>
                            </svg></td>
                        <td><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check2" viewBox="0 0 16 16">
                            <path d="M13.854 3.646a.5.5 0 0 1 0 .708l-7 7a.5.5 0 0 1-.708 0l-3.5-3.5a.5.5 0 1 1 .708-.708L6.5 10.293l6.646-6.647a.5.5 0 0 1 .708 0z"/>
                          </svg></td>
                        <td><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check2-all" viewBox="0 0 16 16">
                            <path d="M12.354 4.354a.5.5 0 0 0-.708-.708L5 10.293 1.854 7.146a.5.5 0 1 0-.708.708l3.5 3.5a.5.5 0 0 0 .708 0l7-7zm-4.208 7-.896-.897.707-.707.543.543 6.646-6.647a.5.5 0 0 1 .708.708l-7 7a.5.5 0 0 1-.708 0z"/>
                            <path d="m5.354 7.146.896.897-.707.707-.897-.896a.5.5 0 1 1 .708-.708z"/>
                          </svg></td>
                    </tr>
                    <tr>
                        <th scope="row" class="text-start">Unlimited Orders</th>
                        <td></td>
                        <td></td>
                        <td><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check2-all" viewBox="0 0 16 16">
                            <path d="M12.354 4.354a.5.5 0 0 0-.708-.708L5 10.293 1.854 7.146a.5.5 0 1 0-.708.708l3.5 3.5a.5.5 0 0 0 .708 0l7-7zm-4.208 7-.896-.897.707-.707.543.543 6.646-6.647a.5.5 0 0 1 .708.708l-7 7a.5.5 0 0 1-.708 0z"/>
                            <path d="m5.354 7.146.896.897-.707.707-.897-.896a.5.5 0 1 1 .708-.708z"/>
                          </svg></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </main>

    
    </div>
</div>
</div>
<br>
<br>

  <!-- footer -->
  <?php include 'partials/_footer.php';?>
  
<!-- js animation script -->
<script src="https://unpkg.com/aos@next/dist/aos.js"></script>
<script>
  AOS.init();
</script>
</body>

</html>