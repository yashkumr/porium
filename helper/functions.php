<?php
function redirect($location)
{
    header("Location: $location");
}

function query($sql)
{
    global $connection;
    return mysqli_query($connection, $sql);
}

function confirm($result)
{
    global $connection;
    if (!$result) die("Query Failed" . mysqli_error($connection));
}

function escape_string($string)
{
    global $connection;

    return mysqli_real_escape_string($connection, $string);
}

function message($message)
{

    if (!empty($message)) {
        $_SESSION['message'] = $message;
    } else {
        $message = "";
    }
}
function displayMessage()
{
    if (isset($_SESSION['message'])) {

        $dmsg =  <<<DELIMETER
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
        <strong>{$_SESSION['message']}</strong>
        <button type="button"  class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true"></span>
        </button>
    </div>
DELIMETER;

        echo $dmsg;
    }
    unset($_SESSION['message']);
}

function displayCategories()
{


    $categoryFetchdata = query("select * from categories");
    confirm($categoryFetchdata);

    while ($category = mysqli_fetch_assoc($categoryFetchdata)) {

        echo "<option value='{$category['cat_id']}''>{$category['cat_name']}</option>";
    }
}

function displayNavbar()
{
    $topNavbarFetchdata = query("select * from top_navbar");
    confirm($topNavbarFetchdata);

    while ($topNavbar = mysqli_fetch_assoc($topNavbarFetchdata)) {

        echo "<li>
                   <a href='{$topNavbar['top_navbar_url']}'>{$topNavbar['top_navbar_name']}</a>
           </li>";
    }
}

function displaySlider()
{
    $sliderFetchdata = query("select * from slider");
    confirm($sliderFetchdata);

    while ($slider = mysqli_fetch_assoc($sliderFetchdata)) {
        $display = <<<DELIMETER
        <div class="carousel-item">
        <img src="admin/assets/image/slider/{$slider['image']}" class="d-block w-100" alt="...">
    </div>
    DELIMETER;
        echo $display;
    }
}

function featuredDisplay()
{
    $featuredFetchdata = query("select * from products  limit 6");
    confirm($featuredFetchdata);

    while ($featured = mysqli_fetch_assoc($featuredFetchdata)) {


        $display =  <<<DELIMETER
    <div class="product-default appear-animate" data-animation-name="fadeInRightShorter">
    <figure>
        <a href="product.php?product_id={$featured['product_id']}">
            <img src="admin/assets/image/product/{$featured['product_image']}" width="280" height="220" style="height: 280px" alt="{$featured['product_image']}" />
            <img src="admin/assets/image/product/{$featured['product_image']}" width="280" height="220" style="height: 280px" alt="{$featured['product_image']}" />
        </a>

        <div class="label-group">
            <div class="product-label label-hot">HOT</div>
            <div class="product-label label-sale">-70%</div>
        </div>
    </figure>

    <div class="product-details">

        <h3 class="product-title">
            <a href="product.php?product_id={$featured['product_id']}">{$featured['product_name']}</a>
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
            <del class="old-price">Rs. {$featured['product_old_price']}</del>
            <span class="product-price">Rs. {$featured['product_price']}</span>
        </div>
        <!-- End .price-box -->
        <div class="product-action">

            <a href="product.php?product_id={$featured['product_id']}" class="btn-icon btn-add-cart"><i class="fa fa-arrow-right"></i><span>Buy Now</span></a>

        </div>
    </div>
    <!-- End .product-details -->
</div>
DELIMETER;
        echo $display;
    }
}
function newProductDisplay()
{
    $productFetchdata = query("select * from products order by product_id desc limit 12");
    confirm($productFetchdata);

    while ($product = mysqli_fetch_assoc($productFetchdata)) {


        $display =  <<<DELIMETER
    <div class="product-default appear-animate" data-animation-name="fadeInRightShorter">
    <figure>
        <a href="product.php?product_id={$product['product_id']}">
            <img src="admin/assets/image/product/{$product['product_image']}" width="280" height="220" style="height: 220px" alt="{$product['product_image']}" />
            <img src="admin/assets/image/product/{$product['product_image']}" width="280" height="220" style="height: 220px" alt="{$product['product_image']}" />
        </a>

        <div class="label-group">
            <div class="product-label label-hot">HOT</div>
            <div class="product-label label-sale">-70%</div>
        </div>
    </figure>

    <div class="product-details">

        <h3 class="product-title">
            <a href="product.php?product_id={$product['product_id']}">{$product['product_name']}</a>
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
            <del class="old-price">Rs. {$product['product_old_price']}</del>
            <span class="product-price">Rs. {$product['product_price']}</span>
        </div>
        <!-- End .price-box -->
        <div class="product-action">

            <a href="product.php?product_id={$product['product_id']}" class="btn-icon btn-add-cart"><i class="fa fa-arrow-right"></i><span>Buy Now</span></a>

        </div>
    </div>
    <!-- End .product-details -->
</div>
DELIMETER;
        echo $display;
    }
}
function allProductDisplay()
{
    $productFetchdata = query("select * from products order by product_id desc");
    confirm($productFetchdata);

    while ($product = mysqli_fetch_assoc($productFetchdata)) {


        $display =  <<<DELIMETER
    <div class="product-category appear-animate" data-animation-name="fadeInUpShorter text">

    <a href="product.php?product_id={$product['product_id']}">
        <figure>
        <img src="admin/assets/image/product/{$product['product_image']}" alt="category"  />
        </figure>
        <!-- <div class="category-content">
                    <h3>Dress</h3>
                </div> -->
    </a>

 
</div>
   
DELIMETER;
        echo $display;
    }
}

function commingSoon()
{
    $productFetchdata = query("select * from products limit 8");
    confirm($productFetchdata);

    while ($product = mysqli_fetch_assoc($productFetchdata)) {


        $display =  <<<DELIMETER
        <div class="product-category appear-animate" data-animation-name="fadeInUpShorter">
        <a href="product.php?product_id={$product['product_id']}">
            <figure>
                <img src="admin/assets/image/product/{$product['product_image']}" alt="{$product['product_image']}" width="280" height="240" />
            </figure>
            <!-- <div class="category-content">
                        <h3>Dress</h3>
                        <span><mark class="count">3</mark> products</span>
                    </div> -->
        </a>
    </div>
    DELIMETER;
        echo $display;
    }
}

function video()
{
    $videoFetchdata = query("select * from video");
    confirm($videoFetchdata);

    $video = mysqli_fetch_assoc($videoFetchdata);

    echo "<video src='admin/assets/video/{$video['video_url']}' width='100%'  controls></video>";
}

function bestSelling()
{
    $productFetchdata = query("select * from products limit 3");
    confirm($productFetchdata);

    while ($product = mysqli_fetch_assoc($productFetchdata)) {


        $display =  <<<DELIMETER
        <div class="product-category appear-animate" data-animation-name="fadeInUpShorter">
        <a href="product.php?product_id={$product['product_id']}">
            <figure>
                <img src="admin/assets/image/product/{$product['product_image']}" alt="{$product['product_image']}" width="280" height="240" />
            </figure>
            <!-- <div class="category-content">
                        <h3>Dress</h3>
                        <span><mark class="count">3</mark> products</span>
                    </div> -->
        </a>
    </div>
    DELIMETER;
        echo $display;
    }
}
function featuredBottomDisplay()
{

    $productFetchdata = query("select * from products limit 3");
    confirm($productFetchdata);

    while ($product = mysqli_fetch_assoc($productFetchdata)) {
        $display =    <<<DELIMETER
            <div class="product-default left-details product-widget">
            <figure>
                <a href="product.php?product_id={$product['product_id']}">
                    <img src="admin/assets/image/product/{$product['product_image']}" width="84" height="84" alt="{$product['product_image']}">
                    <img src="admin/assets/image/product/{$product['product_image']}" width="84" height="84" alt="{$product['product_image']}">
                </a>
            </figure>

            <div class="product-details">
                <h3 class="product-title"> <a href="product.php?product_id={$product['product_id']}">{$product['product_name']}</a>
                </h3>


                <!-- End .product-container -->

                <div class="price-box">
                    <span class="product-price">Rs. {$product['product_price']}</span>
                </div>
                <!-- End .price-box -->
            </div>
            <!-- End .product-details -->
        </div>
        DELIMETER;
        echo $display;
    }
}

function bestSellingProductBottomDisplay()
{

    $productFetchdata = query("select * from products limit 3");
    confirm($productFetchdata);

    while ($product = mysqli_fetch_assoc($productFetchdata)) {
        $display =    <<<DELIMETER
            <div class="product-default left-details product-widget">
            <figure>
                <a href="product.php?product_id={$product['product_id']}">
                    <img src="admin/assets/image/product/{$product['product_image']}" width="84" height="84" alt="{$product['product_image']}">
                    <img src="admin/assets/image/product/{$product['product_image']}" width="84" height="84" alt="{$product['product_image']}">
                </a>
            </figure>

            <div class="product-details">
                <h3 class="product-title"> <a href="product.php?product_id={$product['product_id']}">{$product['product_name']}</a>
                </h3>


                <!-- End .product-container -->

                <div class="price-box">
                    <span class="product-price">Rs. {$product['product_price']}</span>
                </div>
                <!-- End .price-box -->
            </div>
            <!-- End .product-details -->
        </div>
        DELIMETER;
        echo $display;
    }
}

function latestProductBottomDisplay()
{

    $productFetchdata = query("select * from products limit 3");
    confirm($productFetchdata);

    while ($product = mysqli_fetch_assoc($productFetchdata)) {
        $display =    <<<DELIMETER
            <div class="product-default left-details product-widget">
            <figure>
                <a href="product.php?product_id={$product['product_id']}">
                    <img src="admin/assets/image/product/{$product['product_image']}" width="84" height="84" alt="{$product['product_image']}">
                    <img src="admin/assets/image/product/{$product['product_image']}" width="84" height="84" alt="{$product['product_image']}">
                </a>
            </figure>

            <div class="product-details">
                <h3 class="product-title"> <a href="product.php?product_id={$product['product_id']}">{$product['product_name']}</a>
                </h3>


                <!-- End .product-container -->

                <div class="price-box">
                    <span class="product-price">Rs. {$product['product_price']}</span>
                </div>
                <!-- End .price-box -->
            </div>
            <!-- End .product-details -->
        </div>
        DELIMETER;
        echo $display;
    }
}

function topRatedProductBottomDisplay()
{

    $productFetchdata = query("select * from products limit 3");
    confirm($productFetchdata);

    while ($product = mysqli_fetch_assoc($productFetchdata)) {
        $display =    <<<DELIMETER
            <div class="product-default left-details product-widget">
            <figure>
                <a href="product.php?product_id={$product['product_id']}">
                    <img src="admin/assets/image/product/{$product['product_image']}" width="84" height="84" alt="{$product['product_image']}">
                    <img src="admin/assets/image/product/{$product['product_image']}" width="84" height="84" alt="{$product['product_image']}">
                </a>
            </figure>

            <div class="product-details">
                <h3 class="product-title"> <a href="product.php?product_id={$product['product_id']}">{$product['product_name']}</a>
                </h3>


                <!-- End .product-container -->

                <div class="price-box">
                    <span class="product-price">Rs. {$product['product_price']}</span>
                </div>
                <!-- End .price-box -->
            </div>
            <!-- End .product-details -->
        </div>
        DELIMETER;
        echo $display;
    }
}

// function addToCart(){



// }


function cart()
{

    $grandTotal = 0;
    $orderId = "MKT0123456";
    foreach ($_SESSION as  $name => $value) {
        if ($value > 0) {
            if (substr($name, 0, 8) == "product_") {
                $length = strlen($name)-8;
                
                $id = escape_string(substr($name,8,$length));
                
                confirm($result = query("select * from products where product_id ='$id'"));
                $sub =0;
                foreach ($result as $row) {
                    $sub = $row['product_price']*$value;
                    
                    $display = <<<DELIMETER
                 <tr class="product-row">
                 
                                        <td>
                                            <figure class="product-image-container">
                                                <a href="product.php?product_id={$row['product_id']}" class="product-image">
                                                    <img src="admin/assets/image/product/{$row['product_image']}" class="img-fluid" width="100px" alt="{$row['product_image']}">
                                                </a>
        
                                                <a href="response.php?delete={$row['product_id']}" class="btn-remove icon-cancel" title="Remove Product"></a>
                                            </figure>
                                        </td>
                                        <td class="product-col">
                                            <h5 class="product-title">
                                                <a href="product.php?product_id={$row['product_id']}">{$row['product_name']}</a>
                                            </h5>
                                        </td>
                                        <td class="product_prices">{$row['product_price']}</td>
                                        <td>
                                            <div class="product-single-qty">
                                                <input class="horizontal-quantity form-control" id="product_value"  value="{$value}" type="text">
                                            </div><!-- End .product-single-qty -->
                                        </td>
                                        <td class="text-right"><span class="subtotal-price">{$sub}</span></td>
                                    </tr>
        
                
                DELIMETER;
                    echo $display;
                   
                    
                }
                $_SESSION["item-total"] = $grandTotal+=$sub;
                $_SESSION["item-quantity"] += $value;
                
            }
        }
        // echo $name." ".$value;
    }
}

function checkout()
{
    $total_price = 0;
    foreach ($_SESSION as  $name => $value) {
        if ($value > 0) {
            if (substr($name, 0, 8) == "product_") {
                $length = strlen($name)-8;
  
                $id = escape_string(substr($name,8,$length));

                confirm($result = query("select * from products where product_id ='$id'"));

                foreach ($result as $row) {
                    $sub = $row['product_price']*$value;

                    $display = <<<DELIMETER
                 <tr class="product-row">
                                        <td>
                                            <figure class="product-image-container">
                                                <a href="product.php?product_id={$row['product_id']}" class="product-image">
                                                    <img src="admin/assets/image/product/{$row['product_image']}" class="img-fluid" width="100px" alt="{$row['product_image']}">
                                                </a>
        
                                                <a href="response.php?delete={$row['product_id']}" class="btn-remove icon-cancel" title="Remove Product"></a>
                                            </figure>
                                        </td>
                                        <td class="product-col">
                                            <h5 class="product-title">
                                                <a href="product.php?product_id={$row['product_id']}">{$row['product_name']}</a>
                                            </h5>
                                        </td>
                                        <td class="product_prices">{$row['product_price']}</td>
                                        <td>
                                            <div class="product-single-qty">
                                                <input class="horizontal-quantity form-control"  value="{$value}" type="text">
                                            </div><!-- End .product-single-qty -->
                                        </td>
                                        <td class="text-right"><span class="subtotal-price">{$sub}</span></td>
                                    </tr>
        
                
                DELIMETER;
                    echo $display;
                }
            }
        }
        // echo $name." ".$value;
    }
}

function checkEveryPage(){

    if(!isset($_SESSION['user_name'])){
        redirect("login.php");
    }
}
