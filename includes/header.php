<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>MARKETING PORIUM</title>

    <meta name="keywords" content="Porium_ecommerce" />
    <meta name="description" content="Maketing Porium - eCommerce">
    <meta name="author" content="Web developer">

    <!-- Favicon -->
    <?php

    confirm($result = query("select * from setting where setting_id = 1"));

    if ($row = mysqli_fetch_assoc($result)) {

    ?>
        <link rel="icon" type="image/x-icon" href="admin/assets/image/favicon/<?php echo $row["setting_favicon"] ?>">
    <?php } ?>

    <!-- <link rel="icon" type="image/x-icon" href="assets/images/images/logo/main-logo.webp"> -->


    <script>
        WebFontConfig = {
            google: {
                families: ['Open+Sans:300,400,600,700,800', 'Poppins:300,400,500,600,700,800', 'Oswald:300,400,500,600,700,800']
            }
        };
        (function(d) {
            var wf = d.createElement('script'),
                s = d.scripts[0];
            wf.src = 'assets/js/webfont.js';
            wf.async = true;
            s.parentNode.insertBefore(wf, s);
        })(document);
    </script>

    <!-- Plugins CSS File -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/style.min.css">
    <!-- Main CSS File -->

    <link rel="stylesheet" href="assets/css/navbar.css">
    <link rel="stylesheet" href="assets/css/main.min.css">
    <link rel="stylesheet" href="assets/css/ankit.css">

    <link rel="stylesheet" type="text/css" href="assets/vendor/fontawesome-free/css/all.min.css">
</head>

<body>
    <div class="page-wrapper">

        <header class="header">


            <div class="header-middle sticky-header" data-sticky-options="{'mobile': true}">
                <div class="container">
                    <div class="header-left col-lg-2 w-auto pl-0">
                        <button class="mobile-menu-toggler text-primary mr-2" type="button">
                            <i class="fas fa-bars"></i>
                        </button>
                        <a href="index.php" class="logo">
                            <img src="admin/assets/image/logo/<?php echo $row['setting_logo'] ?>" width="60px" alt="Maketing Porium Logo">
                        </a>

                    </div>

                    <!-- End .header-left -->

                    <div class="header-right w-lg-max">
                        <div class="header-icon header-search header-search-inline header-search-category w-lg-max text-right mt-0">
                            <a href="#" class="search-toggle" role="button"><i class="icon-search-3"></i></a>
                            <form action="#" method="get">
                                <div class="header-search-wrapper">
                                    <input type="search" class="form-control" name="q" id="q" placeholder="Search..." required>
                                    <div class="select-custom">
                                        <select id="cat" name="cat" onchange="location=this.value;">
                                            <option value="category.php" selected>All Categories</option>


                                            <?php $categoryFetchdata = query("select * from categories");
                                            confirm($categoryFetchdata);

                                            while ($category = mysqli_fetch_assoc($categoryFetchdata)) {
                                            ?>

                                                <option value="category.php?category_id=<?php echo base64_encode($category['cat_id']) ?>"><?php echo $category['cat_name'] ?></option>
                                            <?php }
                                            ?>
                                            <!-- <option value="13">- charging and daracable</option>
                                    <option value="66">- Logo highlight Series</option>
                                    <option value="67">- Mobile stand / Phone stand</option>
                                    <option value="5">Safety oriented product</option>
                                    <option value="21">- Toys games</option>
                                    <option value="22">- Vacum flask</option>
                                    <option value="63">- with videos</option> -->

                                        </select>
                                    </div>
                                    <!-- End .select-custom -->
                                    <button class="btn icon-magnifier p-0" title="search" type="submit"></button>
                                </div>
                                <!-- End .header-search-wrapper -->
                            </form>

                        </div>


                        <!-- End .header-search -->



                        <div class="header-contact d-none d-lg-flex pl-4 pr-4">
                            <img alt="phone" src="assets/images/phone.png" width="30" height="30" class="pb-1">
                            <h6><span>Call us now</span><a href="tel:#" class="text-dark font1">+91 <?php echo $row['setting_phone'] ?></a></h6>
                        </div>
                        <!-- login menu -->
                        <div class="login-menu"> <a href="#" class="header-icon" title="login"><i class="icon-user-2"></i></a>
                            <ul>

                                <?php
                                if (isset($_SESSION['user_id']) && isset($_SESSION['user_name'])) {
                                    $login = <<<DELIMETER
                                <li><a href="updatedetails.php">Profile</a></li>
                                <li><a href="updatedetails.php">Order</a></li>
                                <li><a href="logout.php">Logout</a></li>;
                        DELIMETER;
                                    echo $login;
                                } else {
                                    $login = <<<DELIMETER
                            <li><a href="login.php">Login</a></li>
                             <li><a href="register.php">Sign Up</a></li>
                        DELIMETER;
                                    echo $login;
                                }
                                ?>
                            </ul>
                        </div>


                        <div class="div">
                            <a href="checkout.php" class="header-icon" title="Cart"><i class="fas fa-cart-plus"></i></a>
                        </div>



                        <!-- <a href="<?php if (isset($_SESSION['user_name'])) echo "index.php";
                                        else echo "register.php" ?>" class="header-icon" title="login"><?php if (isset($_SESSION['user_name'])) echo $_SESSION['user_name'] ?> <i class="icon-user-2"></i></a> -->



                        <!-- End .dropdown -->
                    </div>
                    <!-- End .header-right -->
                </div>
                <!-- End .container -->
            </div>
            <!-- End .header-middle -->

            <div class="header-bottom sticky-header d-none d-lg-block" data-sticky-options="{'mobile': false}">
                <div class="container">
                    <nav class="main-nav w-100">
                        <ul class="menu">
                            <li class="active"><a href="index.php">Home</a></li>
                            <?php displayNavbar() ?>
                            <li>
                                <a href="category.php">CORPORATE GIFTING</a>


                                <ul class="submenu">
                                    <li><a href="#">Electronic and mobile accessories</a></li>
                                    <li><a href="#">Life style Products</a></li>
                                    <li><a href="#">Home $ Kitchen</a></li>
                                    <li><a href="#">Flasks / Sippers / Mugus</a></li>
                                    <li><a href="#">Table $ wall clocks</a></li>
                                    <li><a href="#">Toolkits</a></li>
                                    <li><a href="#">office table tops and stationery</a></li>
                                </ul>
                            </li>


                            </li>

                            <!-- <li>
                                <a href="category.html">Home & Kitchen</a>

                                <ul class="submenu">
                                    <li><a href="kitchen-plastic-containers.html">Plastic containers</a></li>
                                    <li><a href="kitchen-metal-containers.html">Metal Containers</a></li>
                                    <li><a href="kitchen-steel-containers.html">Steel containers</a></li>
                                </ul>


                            </li>

                            <li>
                                <a href="category.html">Travel accessories</a>
                                <ul class="submenu">
                                    <li><a href="travel-bags.html">Bags</a></li>
                                    <li><a href="travel-passport.html">Passport Holder</a></li>
                                    <li><a href="travel-slink-bags.html">Slink Bags</a></li>

                                </ul>
                            </li>
                            <li><a href="contact.html">Contact Us</a></li>

                            <li><a href="#">Track Your Order</a></li> -->

                        </ul>
                    </nav>
                </div>
                <!-- End .container -->
            </div>
            <!-- End .header-bottom -->
        </header>
        <!-- End .header -->