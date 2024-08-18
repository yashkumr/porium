<?php include "config/db.php"?>
<?php include "includes/header.php";?>


<main class="main">
            <div class="category-banner-container bg-gray">
                <div class="category-banner banner text-uppercase"
                    style="background: no-repeat 60%/cover url('assets/images/images/banner/banner-1.jpg');">
                    <div class="container position-relative">
                        <div class="row">
                            <div class="pl-lg-5 pb-5 pb-md-0 col-sm-5 col-xl-4 col-lg-4 offset-1">
                                <h3>Marketing<br>Porium</h3>
                                <a href="category.php" class="btn btn-dark">Get Yours!</a>
                            </div>
                            <div class="pl-lg-3 col-sm-4 offset-sm-0 offset-1 pt-3">
                                <div class="coupon-sale-content">
                                    <h4 class="m-b-1 coupon-sale-text bg-white text-transform-none">Exclusive COUPON
                                    </h4>
                                    <h5 class="mb-2 coupon-sale-text d-block ls-10 p-0"><i class="ls-0">UP TO</i><b
                                            class="text-dark">20%</b> OFF</h5>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="container">
                <nav aria-label="breadcrumb" class="breadcrumb-nav">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.php"><i class="icon-home"></i></a></li>
                        <li class="breadcrumb-item"><a href="#">Categoris</a></li>
                        <li class="breadcrumb-item active" aria-current="page">all products</li>
                    </ol>
                </nav>

                <div class="row">
                    <div class="col-lg-9 main-content">
                        <nav class="toolbox sticky-header" data-sticky-options="{'mobile': true}">
                            <div class="toolbox-left">
                                <a href="#" class="sidebar-toggle">
                                    <svg data-name="Layer 3" id="Layer_3" viewBox="0 0 32 32"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <line x1="15" x2="26" y1="9" y2="9" class="cls-1"></line>
                                        <line x1="6" x2="9" y1="9" y2="9" class="cls-1"></line>
                                        <line x1="23" x2="26" y1="16" y2="16" class="cls-1"></line>
                                        <line x1="6" x2="17" y1="16" y2="16" class="cls-1"></line>
                                        <line x1="17" x2="26" y1="23" y2="23" class="cls-1"></line>
                                        <line x1="6" x2="11" y1="23" y2="23" class="cls-1"></line>
                                        <path
                                            d="M14.5,8.92A2.6,2.6,0,0,1,12,11.5,2.6,2.6,0,0,1,9.5,8.92a2.5,2.5,0,0,1,5,0Z"
                                            class="cls-2"></path>
                                        <path d="M22.5,15.92a2.5,2.5,0,1,1-5,0,2.5,2.5,0,0,1,5,0Z" class="cls-2"></path>
                                        <path d="M21,16a1,1,0,1,1-2,0,1,1,0,0,1,2,0Z" class="cls-3"></path>
                                        <path
                                            d="M16.5,22.92A2.6,2.6,0,0,1,14,25.5a2.6,2.6,0,0,1-2.5-2.58,2.5,2.5,0,0,1,5,0Z"
                                            class="cls-2"></path>
                                    </svg>
                                    <span>Filter</span>
                                </a>

                                <div class="toolbox-item toolbox-sort">
                                    <label>Sort By:</label>

                                    <div class="select-custom">
                                        <select name="orderby" class="form-control" onchange="location=this.value;">
                                            <option value="category.php" selected>Default sorting</option>
                                            <option value="popularity">Sort by popularity</option>
                                            <option value="rating">Sort by average rating</option>
                                            <option value="date">Sort by newness</option>
                                            <option value="category.php?category=lowtohigh">Sort by price: low to high</option>
                                            <option value="category.php?category=hightolow">Sort by price: high to low</option>
                                        </select>
                                    </div>
                                    <!-- End .select-custom -->


                                </div>
                                <!-- End .toolbox-item -->
                            </div>
                            <!-- End .toolbox-left -->

                            <div class="toolbox-right">
                                <div class="toolbox-item toolbox-show">
                                    <label>Show:</label>

                                    <div class="select-custom">
                                        <select name="count" class="form-control">
                                            <option value="12">12</option>
                                            <option value="24">24</option>
                                            <option value="36">36</option>
                                        </select>
                                    </div>
                                    <!-- End .select-custom -->
                                </div>
                                <!-- End .toolbox-item -->

                                <div class="toolbox-item layout-modes">
                                    <a href="category.php" class="layout-btn btn-grid active" title="Grid">
                                        <i class="icon-mode-grid"></i>
                                    </a>
                                    <a href="category.php" class="layout-btn btn-list" title="List">
                                        <i class="icon-mode-list"></i>
                                    </a>
                                </div>
                                <!-- End .layout-modes -->
                            </div>
                            <!-- End .toolbox-right -->
                        </nav>

                        
                           <!-- category sorting  -->
                           <?php include "includes/categories.php"?>
                           <!-- category sorting  -->



                        <nav class="toolbox toolbox-pagination">
                            <div class="toolbox-item toolbox-show">
                                <label>Show:</label>

                                <div class="select-custom">
                                    <select name="count" class="form-control">
                                        <option value="12">12</option>
                                        <option value="24">24</option>
                                        <option value="36">36</option>
                                    </select>
                                </div>
                                <!-- End .select-custom -->
                            </div>
                            <!-- End .toolbox-item -->

                            <ul class="pagination toolbox-item">
                                <li class="page-item disabled">
                                    <a class="page-link page-link-btn" href="#"><i class="icon-angle-left"></i></a>
                                </li>
                                <li class="page-item active">
                                    <a class="page-link " href="category.php">1 <span
                                            class="sr-only">(current)</span></a>
                                </li>

                                <li class="page-item"><a class="page-link" href="#">2</a></li>
                             
                                <li class="page-item"><span class="page-link">...</span></li>
                                <li class="page-item">
                                    <a class="page-link page-link-btn" href="#"><i class="icon-angle-right"></i></a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                    <!-- End .col-lg-9 -->

                    <div class="sidebar-overlay"></div>
                    <aside class="sidebar-shop col-lg-3 order-lg-first mobile-sidebar">

                    <div class="sidebar-wrapper">
    <div class="widget">
        <h3 class="widget-title">
            <a data-toggle="collapse" href="#widget-body-2" role="button" aria-expanded="true" aria-controls="widget-body-2"> Product Categories</a>
        </h3>

        <div class="collapse show" id="widget-body-2">
            <div class="widget-body">
                <ul class="cat-list">
                    <li>
                        <a href="category.php">
                            New Arrivals<span class="products-count">(976)</span>
                            <span class="toggle"></span>
                        </a>
                    </li>
                    <li>
                        <a href="#widget-category-2" class="collapsed" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="widget-category-2">
                           Home & Kitchen <span class="products-count">(965)</span>
                            <span class="toggle"></span>
                        </a>
                        <div class="collapse" id="widget-category-2">
                            <ul class="cat-sublist">
                                <li><a href="#">Plastic Containers<span class="products-count">(35)</span></a></li>
                                <li><a href="#">Metal containers<span class="products-count">(97)</span></a></li>
                                <li><a href="#">Steel containers<span class="products-count">(119)</span></a></li>
                                
                            </ul>
                        </div>
                    </li>
                    <li>
                        <a href="#widget-category-3" class="collapsed" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="widget-category-3">
                            Travel Accessories<span class="products-count">(923)</span>
                            <span class="toggle"></span>
                        </a>
                        <div class="collapse" id="widget-category-3">
                            <ul class="cat-sublist">
                                <li><a href="#">Bags<span class="products-count">(35)</span></a></li>
                                <li><a href="#">Passport holder<span class="products-count">(97)</span></a></li>
                                <li><a href="#">Slink Bags<span class="products-count">(119)</span></a></li>
                                
                             
                            </ul>
                        </div>
                    </li>
                    <li>
                        <a href="#widget-category-4" class="collapsed" data-toggle="collapse" role="button" aria-expanded="false" aria-controls="widget-category-4">
                            Speacial categories<span class="products-count">(115)</span>
                            <span class="toggle"></span>
                        </a>
                        <div class="collapse" id="widget-category-4">
                            <ul class="cat-sublist">
                                <li><a href="#">Back in stock<span class="products-count">(35)</span></a></li>
                                <li><a href="#">Discontinued Product<span class="products-count">(97)</span></a></li>
                                <li><a href="#">Hot Items<span class="products-count">(119)</span></a></li>
                                <li><a href="#">Limited stock products<span class="products-count">(169)</span></a></li>
                                <li><a href="#">Made in India<span class="products-count">(116)</span></a></li>
                                <li><a href="#">Out Of stock<span class="products-count">(12)</span></a></li>
                                
                               
                            </ul>
                        </div>
                    </li>
                    <!-- <li><a href="#">Music<span class="products-count">(2)</span></a></li> -->
                </ul>
            </div>
            <!-- End .widget-body -->
        </div>
        <!-- End .collapse -->
    </div>
    <!-- End .widget -->

    <div class="widget">
        <h3 class="widget-title">
            <a data-toggle="collapse" href="#widget-body-3" role="button" aria-expanded="true" aria-controls="widget-body-3">Price</a>
        </h3>

        <div class="collapse show" id="widget-body-3">
            <div class="widget-body pb-0">
                <form action="#">
                    <div class="price-slider-wrapper">
                        <div id="price-slider"></div>
                        <!-- End #price-slider -->
                    </div>
                    <!-- End .price-slider-wrapper -->

                    <div class="filter-price-action d-flex align-items-center justify-content-between flex-wrap">
                        <div class="filter-price-text">
                            Price:
                            <span id="filter-price-range"></span>
                        </div>
                        <!-- End .filter-price-text -->

                        <button type="submit" class="btn btn-primary">Filter</button>
                    </div>
                    <!-- End .filter-price-action -->
                </form>
            </div>
            <!-- End .widget-body -->
        </div>
        <!-- End .collapse -->
    </div>
    <!-- End .widget -->

    <!-- End .widget -->

  
    <!-- End .widget -->

    <div class="widget widget-featured">
        <h3 class="widget-title">Featured</h3>

        <div class="widget-body">
            <div class="owl-carousel widget-featured-products">
                <div class="featured-col">
                    <div class="product-default left-details product-widget">
                        <figure>
                            <a href="product.php">
                                <img src="assets/images/images/new-product/4.avif" width="75" height="75" alt="product" />
                                <img src="assets/images/images/new-product/4.avif" width="75" height="75" alt="product" />
                            </a>
                        </figure>
                        <div class="product-details">
                            <h3 class="product-title"> <a href="product.php">Set Of 3 Spill Proof Bowls With Stainless Steel Tray | Wooden Lids & SS Spoons Included</a> </h3>
                           
                            <div class="ratings-container">
                                    <div class="product-ratings">
                                        <span class="ratings" style="width:80%"></span>
                                        <!-- End .ratings -->
                                        <span class="tooltiptext tooltip-top"></span>
                                    </div>
                                    <!-- End .product-ratings -->
                                </div>
                            <!-- End .product-container -->
                            <div class="price-box">
                                <span class="product-price">Rs 899.00</span>
                            </div>
                            <!-- End .price-box -->
                        </div>
                        <!-- End .product-details -->
                    </div>
                    <div class="product-default left-details product-widget">
                        <figure>
                            <a href="product.php">
                                <img src="assets/images/images/new-product/2.webp" width="75" height="75" alt="product" />
                                <img src="assets/images/images/new-product/2.webp" width="75" height="75" alt="product" />
                            </a>
                        </figure>
                        <div class="product-details">
                            <h3 class="product-title"> <a href="product.php">Hand-Crafted Metal Containers Ivory New</a> </h3>
                           
                            <div class="ratings-container">
                                    <div class="product-ratings">
                                        <span class="ratings" style="width:80%"></span>
                                        <!-- End .ratings -->
                                        <span class="tooltiptext tooltip-top"></span>
                                    </div>
                                    <!-- End .product-ratings -->
                                </div>
                            <!-- End .product-container -->
                            <div class="price-box">
                                <span class="product-price">Rs 499.00 </span>
                            </div>
                            <!-- End .price-box -->
                        </div>
                        <!-- End .product-details -->
                    </div>
                    <div class="product-default left-details product-widget">
                        <figure>
                            <a href="product.php">
                                <img src="assets/images/images/new-product/1.webp" width="75" height="75" alt="product" />
                                <img src="assets/images/images/new-product/1.webp" width="75" height="75" alt="product" />
                            </a>
                        </figure>
                        <div class="product-details">
                            <h3 class="product-title"> <a href="product.php">Marketing Porium women's Pu leather Handbag (rbib-dual)</a> </h3>
                          
                            <div class="ratings-container">
                                    <div class="product-ratings">
                                        <span class="ratings" style="width:80%"></span>
                                        <!-- End .ratings -->
                                        <span class="tooltiptext tooltip-top"></span>
                                    </div>
                                    <!-- End .product-ratings -->
                                </div>
                            <!-- End .product-container -->
                            <div class="price-box">
                                <span class="product-price">Rs 299.00</span>
                            </div>
                            <!-- End .price-box -->
                        </div>
                        <!-- End .product-details -->
                    </div>
                </div>
                <!-- End .featured-col -->

                <div class="featured-col">
                    <div class="product-default left-details product-widget">
                        <figure>
                            <a href="product.php">
                                <img src="assets/images/images/new-product/3.webp" width="75" height="75" alt="product" />
                                <img src="assets/images/images/new-product/3.webp" width="75" height="75" alt="product" />
                            </a>
                        </figure>
                        <div class="product-details">
                            <h3 class="product-title"> <a href="product.php">Airtight Plastic Storage Container Set, with 4 Containers (500ml) & Serving Tray with Jar</a> </h3>
                          
                            <div class="ratings-container">
                                    <div class="product-ratings">
                                        <span class="ratings" style="width:80%"></span>
                                        <!-- End .ratings -->
                                        <span class="tooltiptext tooltip-top"></span>
                                    </div>
                                    <!-- End .product-ratings -->
                                </div>
                            <!-- End .product-container -->
                            <div class="price-box">
                                <span class="product-price">Rs 499.00</span>
                            </div>
                            <!-- End .price-box -->
                        </div>
                        <!-- End .product-details -->
                    </div>
                    <div class="product-default left-details product-widget">
                        <figure>
                            <a href="product.php">
                                <img src="assets/images/images/new-product/5.avif" width="75" height="75" alt="product" />
                                <img src="assets/images/images/new-product/5.avif" width="75" height="75" alt="product" />
                            </a>
                        </figure>
                        <div class="product-details">
                            <h3 class="product-title"> <a href="product.php">JMicrowaveable Stainless Steel Bowl Set | Colorful Outer Body | Capacity: 200, 400, 900 And 1600 Ml</a> </h3>
                           
                            <div class="ratings-container">
                                    <div class="product-ratings">
                                        <span class="ratings" style="width:80%"></span>
                                        <!-- End .ratings -->
                                        <span class="tooltiptext tooltip-top"></span>
                                    </div>
                                    <!-- End .product-ratings -->
                                </div>
                            <!-- End .product-container -->
                            <div class="price-box">
                                <span class="product-price">Rs 899.00</span>
                            </div>
                            <!-- End .price-box -->
                        </div>
                        <!-- End .product-details -->
                    </div>
                    <div class="product-default left-details product-widget">
                        <figure>
                            <a href="product.php">
                                <img src="assets/images/images/new-product/6.webp" width="75" height="75" alt="product" />
                                <img src="assets/images/images/new-product/6.webp" width="75" height="75" alt="product" />
                            </a>
                        </figure>
                        <div class="product-details">
                            <h3 class="product-title"> <a href="product.php">Marketing Porium women's Pu leather Handbag (rbib-dual)</a> </h3>
                           
                            <div class="ratings-container">
                                    <div class="product-ratings">
                                        <span class="ratings" style="width:80%"></span>
                                        <!-- End .ratings -->
                                        <span class="tooltiptext tooltip-top"></span>
                                    </div>
                                    <!-- End .product-ratings -->
                                </div>
                            <!-- End .product-container -->
                            <div class="price-box">
                                <span class="product-price">Rs 299.00</span>
                            </div>
                            <!-- End .price-box -->
                        </div>
                        <!-- End .product-details -->
                    </div>
                </div>
                <!-- End .featured-col -->
            </div>
            <!-- End .widget-featured-slider -->
        </div>
        <!-- End .widget-body -->
    </div>
    <!-- End .widget -->

    <div class="widget widget-block">
        <h3 class="widget-title">Marketing Porium</h3>
        <h5>RECENTLY VIEWED PRODUCTS.</h5>
        <p> you don’t have to love all of your products equally. It’s time for you to embrace featured products and pick your favorites. </p>
    </div>
    <!-- End .widget -->
</div>

                        <!-- End .sidebar-wrapper -->

                    </aside>
                    <!-- End .col-lg-3 -->
                </div>
                <!-- End .row -->
            </div>
            <!-- End .container -->

            <div class="mb-4"></div>
            <!-- margin -->
        </main>



<?php include "includes/footer.php";?>
