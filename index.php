<?php include "./config/db.php" ?>
<?php include "includes/header.php"?>


<main class="main">
    <div id="banner-sllider" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#banner-sllider" data-slide-to="0" class="active"></li>
            <li data-target="#banner-sllider" data-slide-to="1"></li>
            <li data-target="#banner-sllider" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="./assets/images/images/banner/5.jpg" class="d-block w-100" alt="...">
            </div>
        
            <?php  displaySlider()?>
        </div>

        <div class="carousel-control-prev" type="button" data-target="#banner-sllider" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <!-- <span class="sr-only">Previous</span> -->
        </div>
        <div class="carousel-control-next" type="button" data-target="#banner-sllider" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <!-- <span class="sr-only">Next</span> -->
        </div>

    </div>
    <!-- End .home-slider -->

    <div class="container">
        <div class="info-boxes-slider owl-carousel owl-theme mb-2" data-owl-options="{
					'dots': false,
					'loop': false,
					'responsive': {
						'576': {
							'items': 2
						},
						'992': {
							'items': 3
						}
					}
				}">
            <div class="info-box info-box-icon-left">
                <i class="icon-shipping"></i>

                <div class="info-box-content">
                    <h4>FREE SHIPPING &amp; RETURN</h4>
                    <p class="text-body">Free shipping on all orders over 5000Rs/.</p>
                </div>
                <!-- End .info-box-content -->
            </div>
            <!-- End .info-box -->

            <div class="info-box info-box-icon-left">
                <i class="icon-money"></i>

                <div class="info-box-content">
                    <h4>MONEY BACK GUARANTEE</h4>
                    <p class="text-body">100% money back guarantee</p>
                </div>
                <!-- End .info-box-content -->
            </div>
            <!-- End .info-box -->

            <div class="info-box info-box-icon-left">
                <i class="icon-support"></i>

                <div class="info-box-content">
                    <h4>ONLINE SUPPORT 24/7</h4>
                    <p class="text-body">Lorem ipsum dolor sit amet.</p>
                </div>
                <!-- End .info-box-content -->
            </div>
            <!-- End .info-box -->
        </div>
        <!-- End .info-boxes-slider -->

        <div class="banners-container mb-2">
            <div class="banners-slider owl-carousel owl-theme" data-owl-options="{
						'dots': false
					}">
                <div class="banner banner1 banner-sm-vw d-flex align-items-center appear-animate" style="background-color: #ccc;" data-animation-name="fadeInLeftShorter" data-animation-delay="500">
                    <figure class="w-100">
                        <img src="assets/images/images/new-product/5.avif" alt="banner" width="380" height="175" />
                    </figure>
                    <!-- <div class="banner-layer">
                                <h3 class="m-b-2">Maketing Porium Watches</h3>
                                <h4 class="m-b-3 text-primary"><sup class="text-dark"><del>20%</del></sup>30%<sup>OFF</sup></h4>
                                <a href="category.html" class="btn btn-sm btn-dark">Shop Now</a>
                            </div> -->
                </div>
                <!-- End .banner -->

                <div class="banner banner2 banner-sm-vw text-uppercase d-flex align-items-center appear-animate" data-animation-name="fadeInUpShorter" data-animation-delay="200">
                    <figure class="w-100">
                        <img src="assets/images/images/new-product/4.avif" style="background-color: #ccc;" alt="banner" width="380" height="175" />
                    </figure>
                    <div class="banner-layer text-center">
                        <div class="row align-items-lg-center">
                            <div class="col-lg-7 text-lg-right">
                                <!-- <h3>Deal Promos</h3>
                                        <h4 class="pb-4 pb-lg-0 mb-0 text-body">Starting at $99</h4>
                                    </div>
                                    <div class="col-lg-5 text-lg-left px-0 px-xl-3">
                                        <a href="#" class="btn btn-sm btn-dark">Shop Now</a> -->
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End .banner -->

                <div class="banner banner3 banner-sm-vw d-flex align-items-center appear-animate" style="background-color: #ccc;" data-animation-name="fadeInRightShorter" data-animation-delay="500">
                    <figure class="w-100">
                        <img src="assets/images/images/new-product/8.webp" alt="banner" width="380" height="175" />
                    </figure>
                    <!-- <div class="banner-layer text-right">
                                <h3 class="m-b-2">Chargers</h3>
                                <h4 class="m-b-2 text-secondary text-uppercase">Starting at 399</h4>
                                <a href="category.html" class="btn btn-sm btn-dark">Shop Now</a>
                            </div> -->
                </div>
                <!-- End .banner -->
            </div>
        </div>
    </div>
    <!-- End .container -->

    <section class="featured-products-section">
        <div class="container">
            <h2 class="section-title heading-border ls-20 border-0">Featured Products</h2>

            <div class="products-slider custom-products owl-carousel owl-theme nav-outer show-nav-hover nav-image-center" data-owl-options="{
						'dots': false,
                        'loop':true,
						'nav': true
					}">
        
                <?php featuredDisplay()?>

            </div>
            <!-- End .featured-proucts -->
        </div>
    </section>

    <section class="new-products-section">
        <div class="container">
            <h2 class="section-title heading-border ls-20 border-0">New Products</h2>

            <div class="products-slider custom-products owl-carousel owl-theme nav-outer show-nav-hover nav-image-center mb-2" data-owl-options="{
						'dots': false,
                        'loop':true,
						'nav': true,
						'responsive': {
							'992': {
								'items': 4
							},
							'1200': {
								'items': 5
							}
						}
					}">
                    <?php newProductDisplay()?>
            </div>
            <!-- End .featured-proucts -->

            <div class="banner banner-big-sale appear-animate" data-animation-delay="200" data-animation-name="fadeInUpShorter" style="background: #2A95CB center/cover url('assets/images/demoes/demo4/banners/banner-4.jpg');">
                <div class="banner-content row align-items-center mx-0">
                    <div class="col-md-9 col-sm-8">
                        <h2 class="text-white text-uppercase text-center text-sm-left ls-n-20 mb-md-0 px-4">
                            <b class="d-inline-block mr-3 mb-1 mb-md-0">Big Sale</b> All new fashion brands items up to 70% off
                            <small class="text-transform-none align-middle">Online Purchases Only</small>
                        </h2>
                    </div>
                    <div class="col-md-3 col-sm-4 text-center text-sm-right">
                        <a class="btn btn-light btn-white btn-lg" href="#">View Sale</a>
                    </div>
                </div>
            </div>

            <h2 class="section-title categories-section-title heading-border border-0 ls-0 appear-animate" data-animation-delay="100" data-animation-name="fadeInUpShorter">CORPORATE GIFTING
            </h2>

            <div class="categories-slider owl-carousel owl-theme show-nav-hover nav-outer">
                    <?php commingSoon()?>
            </div>
    </section>


    <div class="container-fluid">
        <div class="row py-5 px-0">
            <div class="col-12">
                <h2 class="text-dark text-center">Hand-Crafted Metal Containers</h2>
            </div>
            <div class="col-lg text-center">
                <?php video()?>
            </div>
        </div>
    </div>
    <!-- End .feature-boxes-container -->

    
    <section class="feature-boxes-container">
        <div class="container appear-animate" data-animation-name="fadeInUpShorter">
            <div class="row ">
                <h4 class="text-center"></h4>
            </div>
            <div class="row ">
                <p class="center"></p>
            </div>
            <div class="row">
                <div class="col-12 text-center">
                    <h3>BIGGEST RANGE OF 'IN-STOCK' CORPORATE GIFTS</h3>
                </div>
                <div class="col-12 text-center mb-5"><i>All the products listed on our site are available in regular supply. We take pride in keeping ready stocks for all our products</i></div>
                <div class="col-md-4">
                    <div class="feature-box px-sm-5 feature-box-simple text-center">
                        <div class="feature-box-icon">
                            <!-- <i class="icon-earphones-alt"></i> -->
                            <i class="icon-action-undo"></i>
                        </div>

                        <div class="feature-box-content p-0">
                            <h3>FREQUENTLY UPDATED</h3>


                            <p>marketingporium.co.in is the home of the Best Corporate Gifts in India. New products added frequently, you never have to gift the same product again!</p>
                        </div>
                        <!-- End .feature-box-content -->
                    </div>
                    <!-- End .feature-box -->
                </div>
                <!-- End .col-md-4 -->

                <div class="col-md-4">
                    <div class="feature-box px-sm-5 feature-box-simple text-center">
                        <div class="feature-box-icon">
                            <i class="icon-credit-card"></i>
                        </div>

                        <div class="feature-box-content p-0">
                            <h3>EASY TO DOWNLOAD</h3>


                            <p>Download product images easily in JPG or PDF format! Use the 'Download All' page, or add products to 'Download Basket' to download them together!</p>
                        </div>
                        <!-- End .feature-box-content -->
                    </div>
                    <!-- End .feature-box -->
                </div>
                <!-- End .col-md-4 -->

                <div class="col-md-4">
                    <div class="feature-box px-sm-5 feature-box-simple text-center">
                        <div class="feature-box-icon">
                            <!-- <i class="icon-action-undo"></i> -->
                            <i class="btn icon-magnifier "></i>
                        </div>
                        <div class="feature-box-content p-0">
                            <h3>EASY TO SEARCH</h3>


                            <p>Use the Search bar on the top to easily find what you're looking for! Just type your text and it shows you the most relevant results before you hit Enter!</p>
                        </div>
                        <!-- End .feature-box-content -->
                    </div>
                    <!-- End .feature-box -->
                </div>
                <!-- End .col-md-4 -->
            </div>
            <!-- End .row -->
        </div>
        <!-- End .container-->
    </section>

    <section>
        <div class="container">
            <div class="row px-5">
                <div class="col-lg-3 col-md-6 col-sm-6 col-6">

                    <div class="card bg-light shadow rounded-top">
                        <img src="assets/images/images/offer/1.avif" class="card-fluid w-75 m-auto" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Best Offer's </h5>
                            <p class="card-text">Best Prices & Offers Guaranteed From Unique Products o choose. <br> <br> <br></p>

                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-6">

                    <div class="card bg-light shadow rounded-top">
                        <img src="assets/images/images/offer/2.avif" class="img-fluid w-75   m-auto" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Best Quality </h5>
                            <p class="card-text">Best Quality Assured From Our Website. All the Items are made up from High Quality and Food Grade Materials</p>

                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-6">

                    <div class="card bg-light shadow rounded-top">
                        <img src="assets/images/images/offer/3.avif" class="img-fluid w-75 m-auto" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Secure Payments </h5>
                            <p class="card-text">We Have Secured Payments Options. Like UPI or Direct Bank Transfer, so sit back & Enjoy Different Payment Options.</p>

                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-6">

                    <div class="card bg-light shadow rounded-top">
                        <img src="assets/images/images/offer/4.avif" class="img-fluid w-75 m-auto" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Pan India Shipping </h5>
                            <p class="card-text">We have Pan India Shipping Facility wih Our Professional Courier Partners. <br> <br></p>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>




    <section class="promo-section bg-dark" data-parallax="{'speed': 2, 'enableOnMobile': true}" data-image-src="assets/images/demoes/demo4/banners/banner-5.jpg">
        <div class="promo-banner banner container text-uppercase">
            <div class="banner-content row align-items-center text-center">
                <div class="col-md-4 ml-xl-auto text-md-right appear-animate" data-animation-name="fadeInRightShorter" data-animation-delay="600">
                    <h2 class="mb-md-0 text-white">Top Marketing porium<br>Deals</h2>
                </div>
                <div class="col-md-4 col-xl-3 pb-4 pb-md-0 appear-animate" data-animation-name="fadeIn" data-animation-delay="300">
                    <a href="category.html" class="btn btn-dark btn-black ls-10">View Sale</a>
                </div>
                <div class="col-md-4 mr-xl-auto text-md-left appear-animate" data-animation-name="fadeInLeftShorter" data-animation-delay="600">
                    <h4 class="mb-1 mt-1 font1 coupon-sale-text p-0 d-block ls-n-10 text-transform-none">
                        <b>Exclusive
                            COUPON</b>
                    </h4>
                    <h5 class="mb-1 coupon-sale-text text-white ls-10 p-0"><i class="ls-0">UP TO</i><b class="text-white bg-secondary ls-n-10">10%</b> OFF</h5>
                </div>
            </div>
        </div>
    </section>

  </main>

  
<div class="newsletter-popup mfp-hide bg-img" id="newsletter-popup-form" style="background-image: url(./assets/images/images/banner/banner-1.jpg);  ">
    <div class="newsletter-popup-content">
        <img src="assets/images/images/logo/main-logo.webp" width="80" height="34" alt="Logo" class="logo-newsletter">
        <h2>Sign Up Now And Get</h2>

        <p>
            10% off your next order.
        </p>

        <form action="#">
            <div class="input-group">
                <input type="email" class="form-control" id="newsletter-email" name="newsletter-email" placeholder="Your email address" required />
                <input type="submit" class="btn btn-primary" value="Submit" />
            </div>
        </form>
        <div class="newsletter-subscribe">
            <div class="custom-control custom-checkbox">
                <input type="checkbox" class="custom-control-input" value="0" id="show-again" />
                <label for="show-again" class="custom-control-label">
                    Don't show this popup again
                </label>
            </div>
        </div>
    </div>
    <!-- End .newsletter-popup-content -->

    <button title="Close (Esc)" type="button" class="mfp-close">
        ×
    </button>
</div>
<!-- End .newsletter-popup -->


<?php include "includes/footer.php"?>
