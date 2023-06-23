<header class="header-area header-sticky">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav class="main-nav">
                        <!-- ***** Logo Start ***** -->
                        <a href="#" class="logo">
                            <img src="./assets/images/logo.png" alt="">
                        </a>
                        <!-- ***** Logo End ***** -->
                        <!-- ***** Menu Start ***** -->
                        <ul class="nav">
                            <li><a href="home.php"><i class="bi bi-house-door-fill">&nbsp;</i>Home</a></li>
                            <li><a href="#features"><i class="bi bi-info-circle-fill">&nbsp;</i>About</a></li>
                            <li><a href="#work-process"><i class="bi bi-star-fill">&nbsp;</i>Special</a></li>
                            <li><a href="shop.php"><i class="bi bi-bag-plus-fill">&nbsp;</i>Shop</a></li>
                            <li><a href="#contact-us"><i class="bi bi-envelope-open-heart-fill">&nbsp;</i>Contact Us</a></li>
                            <li><a href="cart.php"><i class="bi bi-cart-check-fill">&nbsp;</i>Cart</a></li>
                            <?php if($_SESSION['userId']==3){
                                echo("<li><a href='http://project.test/addproduct.php'><i class='bi bi-bag-plus-fill'>&nbsp;</i>Add Product</a></li>");}
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