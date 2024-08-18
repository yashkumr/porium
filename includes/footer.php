<section class="blog-section pb-0">
    <div class="container">
        <h2 class="section-title heading-border border-0 appear-animate" data-animation-name="fadeInUp">
            Our Products</h2>


        <div class="product-widgets-container row pb-2">


            <?php include "includes/our_product.php" ?>


        </div>
        <!-- End .row -->
    </div>
</section>

<?php

confirm($result = query("select * from setting where setting_id = 1"));

if ($row = mysqli_fetch_assoc($result)) {
}
?>

<footer class="footer bg-dark">
    <div class="footer-middle">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-sm-6">
                    <div class="widget">
                        <h4 class="widget-title">Contact Info</h4>
                        <ul class="contact-info">
                            <li>
                                <span class="contact-info-label">Address:</span><?php echo $row['setting_address'] ?>
                            </li>
                            <li>
                                <span class="contact-info-label">Phone:</span><a href="tel:">+91 <?php echo $row['setting_phone'] ?></a>
                            </li>
                            <li>
                                <span class="contact-info-label">Email:</span> <a href="#"><span class="__cf_email__" data-cfemail="315c50585d715449505c415d541f525e5c"><?php echo $row['setting_email'] ?></span></a>
                            </li>
                            <li>
                                <span class="contact-info-label">Working Days/Hours:</span> <?php echo $row['setting_working_hours'] ?>
                            </li>
                        </ul>
                        <div class="social-icons">
                            <?php

                            confirm($result = query("select * from social where social_id = 1"));

                            if ($row = mysqli_fetch_assoc($result)) {
                            
                            ?>
                            <a href="<?php echo $row['facebook'] ?>" class="social-icon social-facebook icon-facebook" target="_blank" title="Facebook"></a>
                            <a href="<?php echo $row['twitter']?>" class="social-icon social-twitter icon-twitter" target="_blank" title="Twitter"></a>
                            <a href="<?php echo $row['instagram']?>" class="social-icon social-instagram icon-instagram" target="_blank" title="Instagram"></a>
                                <?php }?>
                        </div>
                        <!-- End .social-icons -->
                    </div>
                    <!-- End .widget -->
                </div>
                <!-- End .col-lg-3 -->

                <div class="col-lg-3 col-sm-6">
                    <div class="widget">
                        <h4 class="widget-title">PRODUCTS BY CLIENT BUDGET</h4>

                        <ul class="links">
                            <li><a href="#">Ultra Low range (Below 20)</a></li>
                            <li><a href="#">Low range (20-50)</a></li>
                            <li><a href="#">Economical (50-100)</a></li>
                            <li><a href="#">Super Affordable (100-200)</a></li>
                            <li><a href="#">Affordable (200-300)</a></li>
                            <li><a href="#">Mid-range (300-400)</a></li>
                            <li><a href="#">Premium (400-600)</a></li>
                            <li><a href="#">High-End (600-1000)</a></li>
                            <li><a href="#">Elite (Above 1000)</a></li>
                        </ul>
                    </div>
                    <!-- End .widget -->
                </div>
                <!-- End .col-lg-3 -->

                <div class="col-lg-3 col-sm-6">
                    <div class="widget">
                        <h4 class="widget-title">Product Tags</h4>

                        <div class="tagcloud">


                            <?php
                            confirm($result = query("select * from categories limit 12"));
                            foreach ($result as $rows) {
                                echo " <a href='#'>{$rows['cat_name']}</a>";
                            }


                            ?>

                        </div>
                    </div>
                    <!-- End .widget -->
                </div>
                <!-- End .col-lg-3 -->
                <?php $result =  query("select * from setting where setting_id = 1");
                    if($row= mysqli_fetch_assoc($result)){
                ?>
                <div class="col-lg-3 col-sm-6">
                    <div class="widget widget-newsletter">
                        <h4 class="widget-title">Subscribe Marketing Porium</h4>
                        <p><?php if($row["setting_subscribe_info"])
                        echo $row['setting_subscribe_info'] ?>
                        </p>
                        <?php }?>

                        <?php
                        $flag = true;
                        if (isset($_POST['subscribe'])) {
                            $email = escape_string($_POST['email']);
                            confirm(query("INSERT INTO newsletter( email) VALUES ('$email')"));
                            $flag = false;
                        }


                        ?>
                        <form action="" method="post" class="mb-0">
                            <input type="email" name="email" class="form-control m-b-3" placeholder="Email address" required>

                            <button type="submit" name="subscribe" class="btn btn-primary shadow-none">Subscribe</button>
                        </form>
                    </div>
                    <?php
                    if (!$flag) {
                        echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                                         Thankyou For Registration.
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                          <span aria-hidden="true">&times;</span>
                                        </button>
                                      </div>';
                    }
                    ?>
                    <!-- End .widget -->
                </div>
                <!-- End .col-lg-3 -->
            </div>
            <!-- End .row -->
        </div>
        <!-- End .container -->
    </div>
    <!-- End .footer-middle -->

    <div class="container">
        <div class="footer-bottom">
            <div class="container d-sm-flex align-items-center">
                <div class="footer-left">
                    <span class="footer-copyright">© Marketing 2023 All Rights Reserved</span>
                    &nbsp; . &nbsp;<a href="refund-policy.php">Refund policy</a>
                    &nbsp; . &nbsp;<a href="privacy-policy.php">Privacy policy</a>
                    &nbsp; . &nbsp;<a href="term-service.php">Terms of service</a>
                    &nbsp; . &nbsp;<a href="shipping-policy.php">Shipping Policy</a>
                    &nbsp; . &nbsp;<a href="contact-us.php">Contact Info</a>

                </div>

                <div class="footer-right ml-auto mt-1 mt-sm-0">
                    <div class="payment-icons">
                        <span class="payment-icon visa" style="background-image: url(assets/images/payments/payment-visa.svg)"></span>
                        <span class="payment-icon paypal" style="background-image: url(assets/images/payments/payment-paypal.svg)"></span>
                        <span class="payment-icon stripe" style="background-image: url(assets/images/payments/payment-stripe.png)"></span>
                        <span class="payment-icon verisign" style="background-image:  url(assets/images/payments/payment-verisign.svg)"></span>
                    </div>
                </div>
            </div>
        </div>
        <!-- End .footer-bottom -->
    </div>
    <!-- End .container -->
</footer>
<!-- End .footer -->
<!-- End .footer -->
</div>
<!-- End .page-wrapper -->
<!-- -----------mobile-menu---------- -->
<div class="mobile-menu-overlay"></div>
<!-- End .mobil-menu-overlay -->

<div class="mobile-menu-container">
    <div class="mobile-menu-wrapper">
        <span class="mobile-menu-close"><i class="fa fa-times"></i></span>
        <nav class="mobile-nav">
            <ul class="mobile-menu">
                <li><a href="index.php">Home</a></li>
                <li><a href="about.php">About Us</a></li>
                <li><a href="new-arrivals.php">New Arrivals</a></li>

                <li>
                    <a href="category.php">Home & Kitchen</a>
                    <ul>
                        <li>
                        <li><a href="kitchen-plastic-containers.php">Plastic containers</a></li>
                        <li><a href="kitchen-metal-containers.php">Metal containers</a></li>
                        <li><a href="kitchen-steel-containers.php">Steel containers</a></li>

                </li>

            </ul>
            </li>
            <li>
                <a href="#">Travel accessories</a>
                <ul>
                    <li>
                    <li><a href="travel-bags.php">Bags</a></li>
                    <li><a href="travel-passport.php">Passport Holder</a></li>
                    <li><a href="travel-slink-bags.php">Slink Bags</a></li>

            </li>

            </ul>
            </li>


            <li><a href="#">track your order</a></li>


            <li>
                <a href="#">Pages<span class="tip tip-hot">Hot!</span></a>
                <ul>
                    <li>
                        <a href="wishlist.php'">Wishlist</a>
                    </li>
                    <li>
                        <a href="cart.php">Shopping Cart</a>
                    </li>
                    <li>
                        <a href="checkout.php">Checkout</a>
                    </li>
                    <li>
                        <a href="dashboard.php">Dashboard</a>
                    </li>
                    <li>
                        <a href="login.php">Login</a>
                    </li>
                    <li>
                        <a href="forgot-password.php">Forgot Password</a>
                    </li>
                </ul>
            </li>


            </ul>

            <!-- <ul class="mobile-menu mt-2 mb-2">
                  <li class="border-0">
                      <a href="#">
                          Special Offer!
                      </a>
                  </li>
                  <li class="border-0">
                      <a href="#" target="_blank">
                          Buy Maketing Porium!
                          <span class="tip tip-hot">Hot</span>
                      </a>
                  </li> 
              </ul> -->

            <ul class="mobile-menu">
                <li><a href="login.php">My Account</a></li>
                <li><a href="contact.php">Contact Us</a></li>
                <!-- <li><a href="blog.php">Blog</a></li> -->
                <li><a href="wishlist.php">My Wishlist</a></li>
                <li><a href="cart.php">Cart</a></li>
                <li><a href="login.php" class="login-link">Log In</a></li>
            </ul>
        </nav>
        <!-- End .mobile-nav -->

        <form class="search-wrapper mb-2" action="#">
            <input type="text" class="form-control mb-0" placeholder="Search..." required />
            <button class="btn icon-search text-white bg-transparent p-0" type="submit"></button>
        </form>

        <div class="social-icons">
            <a href="https://www.facebook.com/Marketingporium" class="social-icon social-facebook icon-facebook" target="_blank">
            </a>
            <a href="#" class="social-icon social-twitter icon-twitter" target="_blank">
            </a>
            <a href="https://www.instagram.com/marketingporium/?igshid=YmMyMTA2M2Y%3D" class="social-icon social-instagram icon-instagram" target="_blank">
            </a>
        </div>
    </div>
    <!-- End .mobile-menu-wrapper -->
</div>
<!-- End .mobile-menu-container -->

<div class="sticky-navbar">
    <div class="sticky-info">
        <a href="index.php">
            <i class="icon-home"></i>Home
        </a>
    </div>
    <div class="sticky-info">
        <a href="category.php" class="">
            <i class="icon-bars"></i>Categories
        </a>
    </div>
    <div class="sticky-info">
        <a href="wishlist.php" class="">
            <i class="icon-wishlist-2"></i>Wishlist
        </a>
    </div>
    <div class="sticky-info">
        <a href="login.php" class="">
            <i class="icon-user-2"></i>Account
        </a>
    </div>
    <div class="sticky-info">
        <a href="cart.php" class="">
            <i class="icon-shopping-cart position-relative">
                <span class="cart-count badge-circle">3</span>
            </i>Cart
        </a>
    </div>
</div>
<!-- End .mobil-menu-overlay -->

<div class="mobile-menu-container">
    <div class="mobile-menu-wrapper">
        <span class="mobile-menu-close"><i class="fa fa-times"></i></span>
        <nav class="mobile-nav">
            <ul class="mobile-menu">
                <li><a href="index.php">Home</a></li>
                <li><a href="about.php">About Us</a></li>
                <li><a href="new-arrivals.php">New Arrivals</a></li>

                <li>
                    <a href="category.php">Home & Kitchen</a>
                    <ul>
                        <li>
                        <li><a href="kitchen-plastic-containers.php">Plastic containers</a></li>
                        <li><a href="kitchen-metal-containers.php">Metal containers</a></li>
                        <li><a href="kitchen-steel-containers.php">Steel containers</a></li>

                </li>

            </ul>
            </li>
            <li>
                <a href="#">Travel accessories</a>
                <ul>
                    <li>
                    <li><a href="travel-bags.php">Bags</a></li>
                    <li><a href="travel-passport.php">Passport Holder</a></li>
                    <li><a href="travel-slink-bags.php">Slink Bags</a></li>

            </li>

            </ul>
            </li>


            <li><a href="#">track your order</a></li>


            <li>
                <a href="#">Pages<span class="tip tip-hot">Hot!</span></a>
                <ul>
                    <li>
                        <a href="wishlist.php'">Wishlist</a>
                    </li>
                    <li>
                        <a href="cart.php">Shopping Cart</a>
                    </li>
                    <li>
                        <a href="checkout.php">Checkout</a>
                    </li>
                    <li>
                        <a href="dashboard.php">Dashboard</a>
                    </li>
                    <li>
                        <a href="login.php">Login</a>
                    </li>
                    <li>
                        <a href="forgot-password.php">Forgot Password</a>
                    </li>
                </ul>
            </li>


            </ul>

            <!-- <ul class="mobile-menu mt-2 mb-2">
                  <li class="border-0">
                      <a href="#">
                          Special Offer!
                      </a>
                  </li>
                  <li class="border-0">
                      <a href="#" target="_blank">
                          Buy Maketing Porium!
                          <span class="tip tip-hot">Hot</span>
                      </a>
                  </li> 
              </ul> -->

            <ul class="mobile-menu">
                <li><a href="login.php">My Account</a></li>
                <li><a href="contact.php">Contact Us</a></li>
                <!-- <li><a href="blog.php">Blog</a></li> -->
                <li><a href="wishlist.php">My Wishlist</a></li>
                <li><a href="cart.php">Cart</a></li>
                <li><a href="login.php" class="login-link">Log In</a></li>
            </ul>
        </nav>
        <!-- End .mobile-nav -->

        <form class="search-wrapper mb-2" action="#">
            <input type="text" class="form-control mb-0" placeholder="Search..." required />
            <button class="btn icon-search text-white bg-transparent p-0" type="submit"></button>
        </form>

        <div class="social-icons">
            <a href="https://www.facebook.com/Marketingporium" class="social-icon social-facebook icon-facebook" target="_blank">
            </a>
            <a href="#" class="social-icon social-twitter icon-twitter" target="_blank">
            </a>
            <a href="https://www.instagram.com/marketingporium/?igshid=YmMyMTA2M2Y%3D" class="social-icon social-instagram icon-instagram" target="_blank">
            </a>
        </div>
    </div>
    <!-- End .mobile-menu-wrapper -->
</div>
<!-- End .mobile-menu-container -->

<div class="sticky-navbar">
    <div class="sticky-info">
        <a href="index.php">
            <i class="icon-home"></i>Home
        </a>
    </div>
    <div class="sticky-info">
        <a href="category.php" class="">
            <i class="icon-bars"></i>Categories
        </a>
    </div>
    <div class="sticky-info">
        <a href="wishlist.php" class="">
            <i class="icon-wishlist-2"></i>Wishlist
        </a>
    </div>
    <div class="sticky-info">
        <a href="login.php" class="">
            <i class="icon-user-2"></i>Account
        </a>
    </div>
    <div class="sticky-info">
        <a href="cart.php" class="">
            <i class="icon-shopping-cart position-relative">
                <span class="cart-count badge-circle">3</span>
            </i>Cart
        </a>
    </div>
</div>





<a id="scroll-top" href="#top" title="Top" role="button"><i class="icon-angle-up"></i></a>


<!-- ------------------------components--------------------- -->




<!-- Plugins JS File -->
<script data-cfasync="false" src="../../cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
<script src="assets/js/jquery.min.js"></script>
<script src="assets/js/bootstrap.bundle.min.js"></script>
<script src="assets/js/optional/isotope.pkgd.min.js"></script>
<script src="assets/js/plugins.min.js"></script>
<script src="assets/js/jquery.appear.min.js"></script>


<!-- Main JS File -->
<script src="assets/js/main.min.js"></script>
<script>
    (function() {
        var js = "window['__CF$cv$params']={r:'7c798b32e91f9040',m:'Xs60aHmeCchZj6c1GDGGgmtBL10DbX6h4.5o6u42VRU-1684134444-0-ARKmgykY5wGcektToGiWAAx8HC8d9OXq9uS5zC0ndv2l',u:'/cdn-cgi/challenge-platform/h/g'};_cpo=document.createElement('script');_cpo.nonce='',_cpo.src='../../cdn-cgi/challenge-platform/h/g/scripts/jsd/7fe8adc8/invisible.js',document.getElementsByTagName('head')[0].appendChild(_cpo);";
        var _0xh = document.createElement('iframe');
        _0xh.height = 1;
        _0xh.width = 1;
        _0xh.style.position = 'absolute';
        _0xh.style.top = 0;
        _0xh.style.left = 0;
        _0xh.style.border = 'none';
        _0xh.style.visibility = 'hidden';
        document.body.appendChild(_0xh);

        function handler() {
            var _0xi = _0xh.contentDocument || _0xh.contentWindow.document;
            if (_0xi) {
                var _0xj = _0xi.createElement('script');
                _0xj.nonce = '';
                _0xj.innerHTML = js;
                _0xi.getElementsByTagName('head')[0].appendChild(_0xj);
            }
        }
        if (document.readyState !== 'loading') {
            handler();
        } else if (window.addEventListener) {
            document.addEventListener('DOMContentLoaded', handler);
        } else {
            var prev = document.onreadystatechange || function() {};
            document.onreadystatechange = function(e) {
                prev(e);
                if (document.readyState !== 'loading') {
                    document.onreadystatechange = prev;
                    handler();
                }
            };
        }
    })();
</script>
</body>



</html>