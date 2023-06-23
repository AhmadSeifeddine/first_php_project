<?php
include_once("./db_config/conn.php");
session_start();

$user = $_SESSION['logged_in'];
if (!isset($user)) {
    header("location:register.php");
}

?>



<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,300,400,500,700,900" rel="stylesheet">

    <title>SEIFSALES</title>
    <!-- Additional CSS Files -->
    <link rel="stylesheet" type="text/css" href="./css/bootstrap.min.css">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

    <link rel="stylesheet" type="text/css" href="./css/font-awesome.css">

    <link rel="stylesheet" href="./css/home.css">



    </head>
    
    <body>

    <!-- ***** Header Area Start ***** -->
    <header class="header-area header-sticky">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav class="main-nav">
                        <!-- ***** Menu Start ***** -->
                        <ul class="nav">
                            <li><a href="#welcome"><i class="bi bi-house-door-fill">&nbsp;</i>Home</a></li>
                            <li><a href="#features"><i class="bi bi-info-circle-fill">&nbsp;</i>About</a></li>
                            <li><a href="#work-process"><i class="bi bi-star-fill">&nbsp;</i>Special</a></li>
                            <li><a href="shop.php"><i class="bi bi-bag-plus-fill">&nbsp;</i>Shop</a></li>
                            <li><a href="#contact-us"><i class="bi bi-envelope-open-heart-fill">&nbsp;</i>Contact Us</a></li>
                            <li><a href="cart.php"><i class="bi bi-cart-check-fill">&nbsp;</i>Cart</a></li>
                            <?php
                                // Retrieve user information based on the session user id
                                $userId = $_SESSION['userId'];
                                $selectQuery = "SELECT * FROM user WHERE id = $userId";
                                $result = mysqli_query($conn, $selectQuery);
                                $userInfo = mysqli_fetch_assoc($result);

                                // Check if the user status is admin
                                if ($userInfo['status'] === 'admin') {
                                    echo "<li><a href='http://project.test/addproduct.php'><i class='bi bi-bag-plus-fill'>&nbsp;</i>Add Product</a></li>";
                                }
                                ?>

                            <li><a href="logout.php"><i class="bi bi-door-open-fill">&nbsp;</i>log out</a></li>

                        </ul>
                        <a class='menu-trigger'>
                            <span>Menu</span>
                        </a>
                        <!-- ***** Menu End ***** -->
                    </nav>
                </div>
            </div>
        </div>
    </header>
    <!-- ***** Header Area End ***** -->

    <!-- ***** Welcome Area Start ***** -->
    <div class="welcome-area" id="welcome">

        <!-- ***** Header Text Start ***** -->
        <div class="header-text">
            <div class="container">
                <div class="row">
                    <div class="offset-xl-3 col-xl-6 offset-lg-2 col-lg-8 col-md-12 col-sm-12">
                        <h1>Discover a world of exceptional products and unbeatable deals at your fingertips.</h1>
                        <p>We are thrilled to introduce you to our online shop, where convenience meets quality, and shopping becomes an enjoyable experience like never before.</p>
                        <a href="shop.php" class="main-button-slider">shop now</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- ***** Header Text End ***** -->
    </div>
    <!-- ***** Welcome Area End ***** -->
    <!-- ***** About us 1) Start ***** -->
    <section class="section padding-top-70 padding-bottom-0" id="features">
        <div class="container">
            <div class="row">
                <div class="col-lg-5 col-md-12 col-sm-12 align-self-center" data-scroll-reveal="enter left move 30px over 0.6s after 0.4s">
                    <img src="assets/images/1.png" class="rounded img-fluid d-block mx-auto" alt="App">
                </div>
                <div class="col-lg-1"></div>
                <div class="col-lg-6 col-md-12 col-sm-12 align-self-center mobile-top-fix">
                    <div class="left-heading">
                        <h2 class="section-title">About Us</h2>
                    </div>
                    <div class="left-text">
                        <p>At SeifSales, we believe that shopping should be affordable, reliable, and fast. Our carefully curated collection features a wide range of high-quality products across various categories, including electronics, fashion, home decor, beauty, and more. Whether you're looking for the latest gadgets, trendy fashion accessories, or unique home essentials, we've got you covered.</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="hr"></div>
                </div>
            </div>
        </div>
    </section>
    <!-- ***** About us 1) End ***** -->

    <!-- ***** About us 2) Start ***** -->
    <section class="section padding-bottom-100">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-12 col-sm-12 align-self-center mobile-bottom-fix">
                    <div class="left-heading">
                        <h2 class="section-title">Discover Convenience and Safety</h2>
                    </div>
                    <div class="left-text">
                        <p>Shop with confidence at SeifSales, knowing that your convenience and safety are at the forefront of our operations. We are committed to providing you with a secure and enjoyable online shopping experience every time you visit our store.</p>
                    </div>
                </div>
                <div class="col-lg-1"></div>
                <div class="col-lg-5 col-md-12 col-sm-12 align-self-center mobile-bottom-fix-big" data-scroll-reveal="enter right move 30px over 0.6s after 0.4s">
                    <img src="assets/images/13.png" class="rounded img-fluid d-block mx-auto" alt="App">
                </div>
            </div>
        </div>
    </section>
    <!-- ***** About us 2) End ***** -->

    <!-- ***** Special Start ***** -->
    <section class="mini" id="work-process">
        <div class="mini-content">
            <div class="container">
                <div class="row">
                    <div class="offset-lg-3 col-lg-6">
                        <div class="info">
                            <h1>What's Special About Us?</h1>
                        </div>
                    </div>
                </div>

                <!-- ***** Mini Box Start ***** -->
                <div class="row">
                    <div class="col-lg-4 col-md-3 col-sm-12">
                        <a href="#" class="mini-box">
                            <i><img src="assets/images/work-process-item-01.png" alt=""></i>
                            <strong>International Shipping</strong>
                            <span>Shop with ease and convenience by purchasing products from USA stores that don't offer international shipping. Simply place an order on our website, and we'll handle the rest, buying the items on your behalf and shipping them straight to your international address.</span>                        </a>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-12">
                        <a href="#" class="mini-box">
                            <i><img src="assets/images/work-process-item-01.png" alt=""></i>
                            <strong>Access & Discover</strong>
                            <span>Shop with ease and convenience by purchasing products from USA stores that don't offer international shipping. Simply place an order on our website, and we'll handle the rest, buying the items on your behalf and shipping them straight to your international address.</span>                        </a>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-12">
                        <a href="#" class="mini-box">
                            <i><img src="assets/images/work-process-item-01.png" alt=""></i>
                            <strong>One Stop Shop</strong>
                            <span>Shop with ease and convenience by purchasing products from USA stores that don't offer international shipping. Simply place an order on our website, and we'll handle the rest, buying the items on your behalf and shipping them straight to your international address.</span>                        </a>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-12">
                        <a href="#" class="mini-box">
                            <i><img src="assets/images/work-process-item-01.png" alt=""></i>
                            <strong>Unrivalled Product Range</strong>
                            <span>Shop with ease and convenience by purchasing products from USA stores that don't offer international shipping. Simply place an order on our website, and we'll handle the rest, buying the items on your behalf and shipping them straight to your international address.</span>                        </a>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-12">
                        <a href="#" class="mini-box">
                            <i><img src="assets/images/work-process-item-01.png" alt=""></i>
                            <strong>Transparent Pricing</strong>
                            <span>Shop with ease and convenience by purchasing products from USA stores that don't offer international shipping. Simply place an order on our website, and we'll handle the rest, buying the items on your behalf and shipping them straight to your international address.</span>                        </a>
                    </div>
                    <div class="col-lg-4 col-md-6 col-sm-12">
                        <a href="#" class="mini-box">
                            <i><img src="assets/images/work-process-item-01.png" alt=""></i>
                            <strong>Personalized Service</strong>
                            <span>Shop with ease and convenience by purchasing products from USA stores that don't offer international shipping. Simply place an order on our website, and we'll handle the rest, buying the items on your behalf and shipping them straight to your international address.</span>                        </a>
                    </div>
                </div>
                <!-- ***** Mini Box End ***** -->
            </div>
        </div>
    </section>
    <!-- ***** Special End ***** -->
    <!-- ***** Contact Us Start ***** -->
    <section class="section colored" id="contact-us">
        <div class="container">
            <!-- ***** Section Title Start ***** -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="center-heading">
                        <h2 class="section-title">Talk To Us</h2>
                    </div>
                </div>
                <div class="offset-lg-3 col-lg-6">
                    <div class="center-text">
                        <p>Maecenas pellentesque ante faucibus lectus vulputate sollicitudin. Cras feugiat hendrerit semper.</p>
                    </div>
                </div>
            </div>
            <!-- ***** Section Title End ***** -->

            <div class="row">
                <!-- ***** Contact Text Start ***** -->
                <div class="col-lg-4 col-md-6 col-sm-12">
                    <h5 class="margin-bottom-30">Keep in touch</h5>
                    <div class="contact-text">
                        <p>110-220 Quisque diam odio, maximus ac consectetur eu, 10260
                        <br>auctor non lorem</p>
                        <p>You are NOT allowed to re-distribute Softy Pinko template on any template collection websites. Thank you.</p>
                    </div>
                </div>
                <!-- ***** Contact Text End ***** -->

                <!-- ***** Contact Form Start ***** -->
                <div class="col-lg-8 col-md-6 col-sm-12">
                    <div class="contact-form">
                        <form id="contact" action="" method="get">
                          <div class="row">
                            <div class="col-lg-6 col-md-12 col-sm-12">
                              <fieldset>
                                <input name="name" type="text" class="form-control" id="name" placeholder="Full Name" required="">
                              </fieldset>
                            </div>
                            <div class="col-lg-6 col-md-12 col-sm-12">
                              <fieldset>
                                <input name="email" type="email" class="form-control" id="email" placeholder="E-Mail Address" required="">
                              </fieldset>
                            </div>
                            <div class="col-lg-12">
                              <fieldset>
                                <textarea name="message" rows="6" class="form-control" id="message" placeholder="Your Message" required=""></textarea>
                              </fieldset>
                            </div>
                            <div class="col-lg-12">
                              <fieldset>
                                <button type="submit" id="form-submit" class="main-button">Send Message</button>
                              </fieldset>
                            </div>
                          </div>
                        </form>
                    </div>
                </div>
                <!-- ***** Contact Form End ***** -->
            </div>
        </div>
    </section>
    <!-- ***** Contact Us End ***** -->
    
    <!-- ***** Footer Start ***** -->
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <ul class="social">
                        <li><a href="https://www.youtube.com/watch?v=dQw4w9WgXcQ&t=2s" target="_blank"><i class="bi bi-facebook"></i></a></li>
                        <li><a href="https://www.youtube.com/watch?v=dQw4w9WgXcQ&t=2s" target="_blank"><i class="bi bi-twitter"></i></i></a></li>
                        <li><a href="https://www.youtube.com/watch?v=dQw4w9WgXcQ&t=2s" target="_blank"><i class="bi bi-instagram"></i></a></li>
                        <li><a href="https://www.youtube.com/watch?v=dQw4w9WgXcQ&t=2s" target="_blank"><i class="bi bi-linkedin"></i></a></li>
                        <li><a href="https://www.youtube.com/watch?v=dQw4w9WgXcQ&t=2s" target="_blank"><i class="bi bi-github"></i></a></li>
                    </ul>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <p class="copyright">Copyright &copy; SEIFSALES COMPANY</p>
                </div>
            </div>
        </div>
    </footer>
    
    <!-- jQuery -->
    <script src="./js/jquery-2.1.0.min.js"></script>

    <!-- Bootstrap -->
    <script src="./js/popper.js"></script>
    <script src="./js/bootstrap.min.js"></script>

    <!-- Plugins -->
    <script src="./js/scrollreveal.min.js"></script>
    <!-- Global Init -->
    <script src="./js/custom.js"></script>
  </body>
</html>