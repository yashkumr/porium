<?php include("config/db.php") ?>
<?php include "includes/header.php"; ?>

<main class="main">
    <div class="container">
        <nav aria-label="breadcrumb" class="breadcrumb-nav">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.php"><i class="icon-home"></i></a></li>
                <li class="breadcrumb-item"><a href="#">Products</a></li>
            </ol>
        </nav>

        <?php
        if (isset($_GET['product_id'])) {
            $productid =  $_GET['product_id'];

            // $_SESSION['cart'.$productid]=$productid;
            $_SESSION['product_id'] = $productid;

            confirm($result = query("select * from products inner join categories on product_category_id = cat_id  where product_id = '$productid'  "));
            foreach ($result as $row) :
        ?>

                <div class="product-single-container product-single-default">
                    <div class="cart-message d-none">
                        <strong class="single-cart-notice">“<?php echo $row['product_name'] ?>”</strong>
                        <span>has been added to your cart.</span>
                    </div>

                    <div class="row">
                        <div class="col-lg-5 col-md-6 product-single-gallery">
                            <div class="product-slider-container">
                                <div class="label-group">
                                    <div class="product-label label-hot">HOT</div>

                                    <div class="product-label label-sale">
                                        -80%
                                    </div>
                                </div>

                                <div class="product-single-carousel owl-carousel owl-theme show-nav-hover">
                                    <div class="product-item">
                                        <img class="product-single-image" src="admin/assets/image/product/<?php echo $row['product_image'] ?>" data-zoom-image="admin/assets/image/product/<?php echo $row['product_image'] ?>" width="468" height="468" alt="product" />
                                    </div>
                                    <div class="product-item">
                                        <img class="product-single-image" src="admin/assets/image/product/<?php echo $row['product_image'] ?>" data-zoom-image="admin/assets/image/product/<?php echo $row['product_image'] ?>" width="468" height="468" alt="product" />
                                    </div>
                                    <div class="product-item">
                                        <img class="product-single-image" src="admin/assets/image/product/<?php echo $row['product_image'] ?>" data-zoom-image="admin/assets/image/product/<?php echo $row['product_image'] ?>" width="468" height="468" alt="product" />
                                    </div>
                                    <div class="product-item">
                                        <img class="product-single-image" src="admin/assets/image/product/<?php echo $row['product_image'] ?>" data-zoom-image="admin/assets/image/product/<?php echo $row['product_image'] ?>" width="468" height="468" alt="product" />
                                    </div>
                                    <div class="product-item">
                                        <img class="product-single-image" src="admin/assets/image/product/<?php echo $row['product_image'] ?>" data-zoom-image="admin/assets/image/product/<?php echo $row['product_image'] ?>" width="468" height="468" alt="product" />
                                    </div>
                                </div>
                                <!-- End .product-single-carousel -->
                                <span class="prod-full-screen">
                                    <i class="icon-plus"></i>
                                </span>
                            </div>

                            <div class="prod-thumbnail owl-dots">
                                <div class="owl-dot">
                                    <img src="admin/assets/image/product/<?php echo $row['product_image'] ?>" width="110" height="110" alt="product-thumbnail" />
                                </div>
                                <div class="owl-dot">
                                    <img src="admin/assets/image/product/<?php echo $row['product_image'] ?>" width="110" height="110" alt="product-thumbnail" />
                                </div>
                                <div class="owl-dot">
                                    <img src="admin/assets/image/product/<?php echo $row['product_image'] ?>" width="110" height="110" alt="product-thumbnail" />
                                </div>
                                <div class="owl-dot">
                                    <img src="admin/assets/image/product/<?php echo $row['product_image'] ?>" width="110" height="110" alt="product-thumbnail" />
                                </div>
                                <div class="owl-dot">
                                    <img src="admin/assets/image/product/<?php echo $row['product_image'] ?>" width="110" height="110" alt="product-thumbnail" />
                                </div>
                            </div>
                        </div>
                        <!-- End .product-single-gallery -->

                        <div class="col-lg-7 col-md-6 product-single-details">
                            <h1 class="product-title"><?php echo $row['product_name'] ?></h1>

                            <div class="product-nav">
                                <div class="product-prev">
                                    <a href="#">
                                        <span class="product-link"></span>

                                        <span class="product-popup">
                                            <span class="box-content">
                                                <img alt="product" width="150" height="150" src="admin/assets/image/<?php echo $row['product_image'] ?>" style="padding-top: 0px;">

                                                <span><?php echo $row['product_name'] ?></span>
                                            </span>
                                        </span>
                                    </a>
                                </div>

                                <div class="product-next">
                                    <a href="#">
                                        <span class="product-link"></span>

                                        <span class="product-popup">
                                            <span class="box-content">
                                                <img alt="product" width="150" height="150" src="admin/assets/image/<?php echo $row['product_image'] ?>" style="padding-top: 0px;">

                                                <span><?php echo $row['product_name'] ?></span>
                                            </span>
                                        </span>
                                    </a>
                                </div>
                            </div>


                            <!-- End .ratings-container -->

                            <hr class="short-divider">

                            <div class="price-box">₹
                                <span class="old-price"><?php echo $row['product_old_price'] ?></span>
                                <span class="new-price"><?php echo $row['product_price'] ?></span>
                            </div>
                            <!-- End .price-box -->

                            <div class="product-desc">
                                <p>
                                    –New ladies bag Design by "MARKETING PORIUM" <br>
                                    – Made of PU: Dimension- 28x12x28 CM (LxBxH) <br>
                                    – This colourful bag have one compartment with top zip closing functions <br>
                                    – Outer Material Type: Polyurethane; Inner Material Type: Polycotton <br>
                                    – Department Name: Womens; Style Name: Western; Age Range Description: Adult <br>
                                </p>
                            </div>
                            <!-- End .product-desc -->

                            <ul class="single-info-list">

                                <li>
                                    SKU: <strong><?php echo $row['product_code'] ?></strong>
                                </li>

                                <li>
                                    CATEGORY: <strong><a href="#" class="product-category"><?php echo $row['cat_name'] ?></a></strong>
                                </li>

                                <li>
                                    TAGs: <strong><a href="#" class="product-category"><?php echo $row['cat_name'] ?></a></strong>,
                                    <strong><a href="#" class="product-category">women bags</a></strong>
                                </li>
                            </ul>

                            <div class="product-action">
                                <div class="product-single-qty">
                                    <input class="horizontal-quantity form-control" id="valueOfProductQty" type="text">
                                </div>
                                <!-- End .product-single-qty -->

                                <a href="response.php?cart_id=<?php echo $productid ?>" id="productAdd" class="btn btn-dark add-cart mr-2" title="Add to Cart">Add to
                                    Cart</a>
                                <a href="response.php?cart_id=<?php echo $productid ?>" class="btn btn-gray view-cart d-none">View cart</a>
                            </div>

                            <!-- <script>
                                
                                document.getElementById("productAdd").addEventListener("click", function() {
                                    let productQty = document.getElementById("valueOfProductQty").value;
                                    let xhr = new XMLHttpRequest();
                                    
                                    xhr.onreadystatechange = function() {
                                        if (this.readyState == 4 && this.status == 200) {
                                            
                                        }else{
                                            console.log(productQty);
                                            console.log("nahi")
                                        }
                                    }
                                    xhr.open('GET','response.php',true);
                                    xhr.send();
                                })
                            </script> -->
                            <!-- End .product-action -->

                            <!-- <hr class="divider mb-0 mt-0"> -->

                            <!-- <div class="product-single-share mb-3">
                                <label class="sr-only">Share:</label>

                                <div class="social-icons mr-2">
                                    <a href="#" class="social-icon social-facebook icon-facebook" target="_blank" title="Facebook"></a>
                                    <a href="#" class="social-icon social-twitter icon-twitter" target="_blank" title="Twitter"></a>
                                    <a href="#" class="social-icon social-linkedin fab fa-linkedin-in" target="_blank" title="Linkedin"></a>
                                    <a href="#" class="social-icon social-gplus fab fa-google-plus-g" target="_blank" title="Google +"></a>
                                    <a href="#" class="social-icon social-mail icon-mail-alt" target="_blank" title="Mail"></a>
                                </div>
                                

                                <a href="wishlist.php" class="btn-icon-wish add-wishlist" title="Add to Wishlist"><i
										class="icon-wishlist-2"></i><span>Add to
										Wishlist</span></a>
                            </div> -->
                            <!-- End .product single-share -->
                        </div>
                        <!-- End .product-single-details -->
                    </div>
                    <!-- End .row -->
                </div>
                <!-- End .product-single-container -->
        <?php endforeach;
        } ?>
        <div class="product-single-tabs">
            <ul class="nav nav-tabs" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="product-tab-desc" data-toggle="tab" href="#product-desc-content" role="tab" aria-controls="product-desc-content" aria-selected="true">Description</a>
                </li>


                <li class="nav-item">
                    <a class="nav-link" id="product-tab-reviews" data-toggle="tab" href="#product-reviews-content" role="tab" aria-controls="product-reviews-content" aria-selected="false">Reviews (1)</a>
                </li>
            </ul>

            <div class="tab-content">
                <div class="tab-pane fade show active" id="product-desc-content" role="tabpanel" aria-labelledby="product-tab-desc">
                    <div class="product-desc-content">
                        <p>
                            <?php echo $row['product_name']; ?>
                        <ul>
                            <li>New ladies bag Design by "MARKETING PORIUM"
                            </li>
                            <li>Made of PU : Dimension- 28x12x28 CM (LxBxH)
                            </li>
                            <li>This colourful bag have one compartment with top zip closing functions
                            </li>
                            <li>Outer Material Type: Polyurethane; Inner Material Type: Polycotton
                            </li>
                            <li>Department Name: Womens; Style Name: Western; Age Range Description: Adult
                            </li>
                        </ul>
                    </div>
                    <!-- End .product-desc-content -->
                </div>
                <!-- End .tab-pane -->



                <div class="tab-pane fade" id="product-reviews-content" role="tabpanel" aria-labelledby="product-tab-reviews">
                    <div class="product-reviews-content">
                        <h3 class="reviews-title">Be The First To Review “J128 – Round Hanging Metal Keychain With PU Strap”</h3>

                        <div class="comment-list">
                            <div class="comments">
                                <figure class="img-thumbnail">
                                    <img src="assets/images/images/product/1.webp" alt="author" width="80" height="80">
                                </figure>

                                <div class="comment-block">
                                    <div class="comment-header">
                                        <div class="comment-arrow"></div>

                                        <div class="ratings-container float-sm-right">

                                            <!-- End .product-ratings -->
                                        </div>

                                        <span class="comment-by">
                                            <strong>Ankit Singh</strong> – May 15, 2023
                                        </span>
                                    </div>

                                    <div class="comment-content">
                                        <p>Excellent.</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="divider"></div>

                        <div class="add-product-review">
                            <h3 class="review-title">Add a review</h3>

                            <form action="#" class="comment-form m-0">


                                <div class="form-group">
                                    <label>Your review <span class="required">*</span></label>
                                    <textarea cols="5" rows="6" class="form-control form-control-sm"></textarea>
                                </div>
                                <!-- End .form-group -->


                                <div class="row">
                                    <div class="col-md-6 col-xl-12">
                                        <div class="form-group">
                                            <label>Name <span class="required">*</span></label>
                                            <input type="text" class="form-control form-control-sm" required>
                                        </div>
                                        <!-- End .form-group -->
                                    </div>

                                    <div class="col-md-6 col-xl-12">
                                        <div class="form-group">
                                            <label>Email <span class="required">*</span></label>
                                            <input type="text" class="form-control form-control-sm" required>
                                        </div>
                                        <!-- End .form-group -->
                                    </div>

                                    <div class="col-md-12">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" class="custom-control-input" id="save-name" />
                                            <label class="custom-control-label mb-0" for="save-name">Save my
                                                name, email, and website in this browser for the next time I
                                                comment.</label>
                                        </div>
                                    </div>
                                </div>

                                <input type="submit" class="btn btn-primary" value="Submit">
                            </form>
                        </div>
                        <!-- End .add-product-review -->
                    </div>
                    <!-- End .product-reviews-content -->
                </div>
                <!-- End .tab-pane -->
            </div>
            <!-- End .tab-content -->
        </div>
        <!-- End .product-single-tabs -->

        <div class="products-section pt-0">
            <h2 class="section-title">Related Products</h2>

            <div class="products-slider owl-carousel owl-theme dots-top dots-small">
                <div class="product-default">
                    <figure>
                        <a href="product.php">
                            <img src="admin/assets/image/product/<?php echo $row['product_image'] ?>" width="280" height="280" alt="product">
                            <img src="admin/assets/image/product/<?php echo $row['product_image'] ?>" width="280" height="280" alt="product">
                        </a>
                        <div class="label-group">
                            <div class="product-label label-hot">HOT</div>
                            <div class="product-label label-sale">-80%</div>
                        </div>
                    </figure>
                    <div class="product-details">

                        <h3 class="product-title">
                            <a href="product.php">Marketing Porium women's Pu leather Handbag (rbib-dual)
                            </a>
                        </h3>
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
                            <del class="old-price">Rs. 1999.00</del>
                            <span class="product-price">Rs. 299.00</span>
                        </div>
                        <!-- End .price-box -->
                        <div class="product-action">

                            <a href="product.php" class="btn-icon btn-add-cart"><i class="fa fa-arrow-right"></i><span>Buy Now</span></a>

                        </div>
                    </div>
                    <!-- End .product-details -->
                </div>
                <div class="product-default">
                    <figure>
                        <a href="product.php">
                            <img src="admin/assets/image/product/<?php echo $row['product_image'] ?>" width="280" height="280" alt="product">
                            <img src="admin/assets/image/product/<?php echo $row['product_image'] ?>" width="280" height="280" alt="product">
                        </a>
                        <div class="label-group">
                            <div class="product-label label-hot">HOT</div>
                            <div class="product-label label-sale">-80%</div>
                        </div>
                    </figure>
                    <div class="product-details">

                        <h3 class="product-title">
                            <a href="product.php">Marketing Porium women's Pu leather Handbag (rbib-dual)
                            </a>
                        </h3>
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
                            <del class="old-price">Rs. 1999.00</del>
                            <span class="product-price">Rs. 299.00</span>
                        </div>
                        <!-- End .price-box -->
                        <div class="product-action">

                            <a href="product.php" class="btn-icon btn-add-cart"><i class="fa fa-arrow-right"></i><span>Buy Now</span></a>

                        </div>
                    </div>
                    <!-- End .product-details -->
                </div>
                <div class="product-default">
                    <figure>
                        <a href="product.php">
                            <img src="admin/assets/image/product/<?php echo $row['product_image'] ?>" width="280" height="280" alt="product">
                            <img src="admin/assets/image/product/<?php echo $row['product_image'] ?>" width="280" height="280" alt="product">
                        </a>
                        <div class="label-group">
                            <div class="product-label label-hot">HOT</div>
                            <div class="product-label label-sale">-80%</div>
                        </div>
                    </figure>
                    <div class="product-details">

                        <h3 class="product-title">
                            <a href="product.php">Marketing Porium women's Pu leather Handbag (rbib-dual)
                            </a>
                        </h3>
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
                            <del class="old-price">Rs. 1999.00</del>
                            <span class="product-price">Rs. 299.00</span>
                        </div>
                        <!-- End .price-box -->
                        <div class="product-action">

                            <a href="product.php" class="btn-icon btn-add-cart"><i class="fa fa-arrow-right"></i><span>Buy Now</span></a>

                        </div>
                    </div>
                    <!-- End .product-details -->
                </div>
                <div class="product-default">
                    <figure>
                        <a href="product.php">
                            <img src="admin/assets/image/product/<?php echo $row['product_image'] ?>" width="280" height="280" alt="product">
                            <img src="admin/assets/image/product/<?php echo $row['product_image'] ?>" width="280" height="280" alt="product">
                        </a>
                        <div class="label-group">
                            <div class="product-label label-hot">HOT</div>
                            <div class="product-label label-sale">-80%</div>
                        </div>
                    </figure>
                    <div class="product-details">

                        <h3 class="product-title">
                            <a href="product.php">Marketing Porium women's Pu leather Handbag (rbib-dual)
                            </a>
                        </h3>
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
                            <del class="old-price">Rs. 1999.00</del>
                            <span class="product-price">Rs. 299.00</span>
                        </div>
                        <!-- End .price-box -->
                        <div class="product-action">

                            <a href="product.php" class="btn-icon btn-add-cart"><i class="fa fa-arrow-right"></i><span>Buy Now</span></a>

                        </div>
                    </div>
                    <!-- End .product-details -->
                </div>
                <div class="product-default">
                    <figure>
                        <a href="product.php">
                            <img src="admin/assets/image/product/<?php echo $row['product_image'] ?>" width="280" height="280" alt="product">
                            <img src="admin/assets/image/product/<?php echo $row['product_image'] ?>" width="280" height="280" alt="product">
                        </a>
                        <div class="label-group">
                            <div class="product-label label-hot">HOT</div>
                            <div class="product-label label-sale">-80%</div>
                        </div>
                    </figure>
                    <div class="product-details">

                        <h3 class="product-title">
                            <a href="product.php">Marketing Porium women's Pu leather Handbag (rbib-dual)
                            </a>
                        </h3>
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
                            <del class="old-price">Rs. 1999.00</del>
                            <span class="product-price">Rs. 299.00</span>
                        </div>
                        <!-- End .price-box -->
                        <div class="product-action">

                            <a href="product.php" class="btn-icon btn-add-cart"><i class="fa fa-arrow-right"></i><span>Buy Now</span></a>

                        </div>
                    </div>
                    <!-- End .product-details -->
                </div>


            </div>
            <!-- End .products-slider -->
        </div>
        <!-- End .products-section -->

        <hr class="mt-0 m-b-5" />

        <!-- End .row -->
    </div>
    <!-- End .container -->
</main>


<?php include "includes/footer.php"; ?>