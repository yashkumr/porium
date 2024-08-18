<div class="row" >

<?php
    if(isset($_GET['category_id'])){
        $categoryId = base64_decode($_GET['category_id']);
        
        
        confirm( $result = query("select * from products where product_category_id = '$categoryId' "));
        if(mysqli_num_rows($result)==0){
            // echo mysqli_num_rows($result);
            redirect('category.php');
           }else{

              foreach($result as $row):
        
            ?>
    <div class="col-6 col-sm-3">
        <div class="product-default">
            <figure>
                <a href="product.php?product_id=<?php echo $row['product_id'] ?>">
                    <img src="admin/assets/image/product/<?php echo $row['product_image']?>" width="280" height="280"
                        alt="<?php echo $row['product_image']?>" />
                    <img src="admin/assets/image/product/<?php echo $row['product_image']?>" width="280" height="280"
                        alt="<?php echo $row['product_image']?>" />
                </a>

                <div class="label-group">
                    <div class="product-label label-hot">HOT</div>
                    <div class="product-label label-sale">-80%</div>
                </div>
            </figure>

            <div class="product-details">

                <h3 class="product-title">
                    <a href="product.php?product_id=<?php echo $row['product_id'] ?>"><?php echo $row['product_name']?></a>
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
                    <del class="old-price">Rs 1900</del>
                    <span class="product-price">Rs <?php echo $row['product_price']?></span>
                </div>
                <!-- End .price-box -->
                <div class="product-action">

                    <a href="product.php?product_id=<?php echo $row['product_id'] ?>" class="btn-icon btn-add-cart"><i
                            class="fa fa-arrow-right"></i><span>Buy Now</span></a>

                </div>
            </div>
            <!-- End .product-details -->
        </div>
    </div>
    
    <!-- End .col-sm-4 -->
<?php endforeach; } }
else if(isset($_GET['category']) && $_GET['category']=="lowtohigh"){

    confirm( $result = query("select * from products order by product_price asc"));
       
        foreach($result as $row){
     
    $display = <<<DELIMETER
    <div class="col-6 col-sm-3">
        <div class="product-default">
            <figure>
                <a href="product.php?product_id={$row['product_id']}">
                    <img src="admin/assets/image/product/{$row['product_image']}" width="280" height="280"
                        alt="{$row['product_image']}" />
                    <img src="admin/assets/image/product/{$row['product_image']}" width="280" height="280"
                        alt="{$row['product_image']}" />
                </a>

                <div class="label-group">
                    <div class="product-label label-hot">HOT</div>
                    <div class="product-label label-sale">-80%</div>
                </div>
            </figure>

            <div class="product-details">

                <h3 class="product-title">
                    <a href="product.php?product_id={$row['product_id']}">{$row['product_name']}</a>
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
                    <del class="old-price">Rs. {$row['product_old_price']}</del>
                    <span class="product-price">Rs. {$row['product_price']}</span>
                </div>
                <!-- End .price-box -->
                <div class="product-action">

                    <a href="product.php?product_id={$row['product_id']}" class="btn-icon btn-add-cart"><i
                            class="fa fa-arrow-right"></i><span>Buy Now</span></a>

                </div>
            </div>
            <!-- End .product-details -->
        </div>
    </div>
    
    DELIMETER;
            echo $display;
        
    }
}
else if(isset($_GET['category']) && $_GET['category']=="hightolow"){



    confirm( $result = query("select * from products order by product_price desc"));
       
        foreach($result as $row){
     
    $display = <<<DELIMETER
    <div class="col-6 col-sm-3">
        <div class="product-default">
            <figure>
                <a href="product.php?product_id={$row['product_id']}">
                    <img src="admin/assets/image/product/{$row['product_image']}" width="280" height="280"
                        alt="{$row['product_image']}" />
                    <img src="admin/assets/image/product/{$row['product_image']}" width="280" height="280"
                        alt="{$row['product_image']}" />
                </a>

                <div class="label-group">
                    <div class="product-label label-hot">HOT</div>
                    <div class="product-label label-sale">-80%</div>
                </div>
            </figure>

            <div class="product-details">

                <h3 class="product-title">
                    <a href="product.php?product_id={$row['product_id']}">{$row['product_name']}</a>
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
                    <del class="old-price">Rs. {$row['product_old_price']}</del>
                    <span class="product-price">Rs. {$row['product_price']}</span>
                </div>
                <!-- End .price-box -->
                <div class="product-action">

                    <a href="product.php?product_id={$row['product_id']}" class="btn-icon btn-add-cart"><i
                            class="fa fa-arrow-right"></i><span>Buy Now</span></a>

                </div>
            </div>
            <!-- End .product-details -->
        </div>
    </div>
    
    DELIMETER;
            echo $display;
        
    }
}
else{

confirm( $result = query("select * from products"));
foreach($result as $row):
?>

<div class="col-6 col-sm-3">
        <div class="product-default">
            <figure>
                <a href="product.php?product_id=<?php echo $row['product_id'] ?>">
                    <img src="admin/assets/image/product/<?php echo $row['product_image']?>" width="280" height="280"
                        alt="<?php echo $row['product_image']?>" />
                    <img src="admin/assets/image/product/<?php echo $row['product_image']?>" width="280" height="280"
                        alt="<?php echo $row['product_image']?>" />
                </a>

                <div class="label-group">
                    <div class="product-label label-hot">HOT</div>
                    <div class="product-label label-sale">-80%</div>
                </div>
            </figure>

            <div class="product-details">

                <h3 class="product-title">
                    <a href="product.php?product_id=<?php echo $row['product_id'] ?>"><?php echo $row['product_name']?></a>
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
                    <del class="old-price">Rs 1900</del>
                    <span class="product-price">Rs <?php echo $row['product_price']?></span>
                </div>
                <!-- End .price-box -->
                <div class="product-action">

                    <a href="product.php?product_id=<?php echo $row['product_id'] ?>" class="btn-icon btn-add-cart"><i
                            class="fa fa-arrow-right"></i><span>Buy Now</span></a>

                </div>
            </div>
            <!-- End .product-details -->
        </div>
    </div>
    <!-- End .col-sm-4 -->
    <?php endforeach; }?>
</div>


<!-- End .row -->
