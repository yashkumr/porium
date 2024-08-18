<?php include "config/db.php"?>
<?php include "includes/header.php"?>
<?php 

if(!isset($_SESSION['user_name']) && isset($_SESSION['user_id'])){
    redirect("login.php");
}
?>


<?php 
     
     if($userid =isset($_SESSION['user_id'])){
 
    confirm($result = query("SELECT * FROM address as a inner join users as u on u.user_id = a.user_id where a.user_id = {$userid}"));
      
    if($row = mysqli_fetch_assoc($result)){
        // echo $row['name'];
    }
     }
?>

<?php

require("razorpay-php/Razorpay.php");
include "razorpay-php/payment-connection.php";



use Razorpay\Api\Api;
use Razorpay\Api\Errors\SignatureVerificationError;



if(isset($_SESSION['user_id'])){
    

$success = true;

$error = "Payment Failed";

if (empty($_POST['razorpay_payment_id']) === false)
{
  $api = new Api($keyId, $secretKey);

    try
    {
        // Please note that the razorpay order ID must
        // come from a trusted source (session here, but
        // could be database or something else)
        $attributes = array(
            'razorpay_order_id' => $_SESSION['razorpay_order_id'],
            'razorpay_payment_id' => $_POST['razorpay_payment_id'],
            'razorpay_signature' => $_POST['razorpay_signature']
        );

        $api->utility->verifyPaymentSignature($attributes);
    }
    catch(SignatureVerificationError $e)
    {
        $success = false;
        $error = 'Razorpay Error : ' . $e->getMessage();
    }
}

if ($success === true)
{

    query("select * from users wherer user_id = {$_SESSION['user_id']}");
    $posted_has = $_SESSION['razorpay_order_id'];
    if(isset($_POST['razor_payment_id'])){

        $txnid = $_POST['razor_payment_id'];
        $amount = $_SESSION['price'];
        $status= 'success';
        $eid = $_POST['shopping_order_id'];
        $subject = "Your Payment has been  Sucessful...";
       $key_value = "okpmt";
        $currency ="INR";
        $date = date_default_timezone_set("Asia/Kolkata");
        $payment_date=date("Y-m-d h:i:sa");

      $result =   query("select count(*) from orders where razorpay_txnid = {$txnid}");
       
        if($txnid!=""){
            // payment integration part
            if(mysqli_num_rows($result)==0){
                // query("insert into order (order_amount,order_transaction,razorpay_txnid,order_status,order_total_price,product_id,user_id) values ()");
            }else{

            }
            //payment integration part end
        }
        
    }



    $html = "<p>Your payment was successful</p>
             <p>Payment ID: {$_POST['razorpay_payment_id']}</p>";
}
else
{
    $html = "<p>Your payment failed</p>
             <p>{$error}</p>";
}

echo $html;

    
  


}




?>


<main class="main main-test">
            <div class="container checkout-container">
                <ul class="checkout-progress-bar d-flex justify-content-center flex-wrap">
                    <li>
                        <a href="cart.php">Shopping Cart</a>
                    </li>
                    <li class="active">
                        <a href="checkout.php">Checkout</a>
                    </li>
                    <li class="disabled">
                        <a href="#">Order Complete</a>
                    </li>
                </ul>

                <div class="login-form-container">
                    <!-- <h4>Returning customer?
                        <button data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne" class="btn btn-link btn-toggle">Login</button>
                    </h4> -->

                    <div id="collapseOne" class="collapse">
                        <div class="login-section feature-box">
                            <div class="feature-box-content">
                                <form action="#" id="login-form">
                                    <p>
                                    If you have shopped with us before, please enter your details below. If you are a new customer, please proceed to the Billing & Shipping section.
                                    </p>

                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="mb-0 pb-1">Username or email <span
                                                        class="required">*</span></label>
                                                <input type="email"  class="form-control" required />
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="mb-0 pb-1">Password <span
                                                        class="required">*</span></label>
                                                <input type="password" class="form-control" required />
                                            </div>
                                        </div>
                                    </div>

                                    <button type="submit" class="btn">LOGIN</button>

                                    <div class="form-footer mb-1">
                                        <div class="custom-control custom-checkbox mb-0 mt-0">
                                            <input type="checkbox" class="custom-control-input" id="lost-password" />
                                            <label class="custom-control-label mb-0" for="lost-password">Remember
                                                me</label>
                                        </div>

                                        <a href="forgot-password.php" class="forget-password">Lost your password?</a>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="checkout-discount">
                    <h4>Have a coupon?
                        <button data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseOne" class="btn btn-link btn-toggle">ENTER YOUR CODE</button>
                    </h4>

                    <div id="collapseTwo" class="collapse">
                        <div class="feature-box">
                            <div class="feature-box-content">
                                <p>If you have a coupon code, please apply it below.</p>

                                <form action="#">
                                    <div class="input-group">
                                        <input type="text" class="form-control form-control-sm w-auto" placeholder="Coupon code" required="" />
                                        <div class="input-group-append">
                                            <button class="btn btn-sm mt-0" type="submit">
                                                Apply Coupon
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-7">
                        <ul class="checkout-steps">
                            <li>
                                <h2 class="step-title">Billing details</h2>

                                <form action="response.php" id="checkout-form">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Full name
                                                    <abbr class="required" title="required">*</abbr>
                                                </label>
                                                <input type="text" name="order_fullname" value="<?php if(isset($row['name'])) echo $row['name']?>" class="form-control" required />
                                            </div>
    </div>
                                    </div>

                                    <div class="form-group">
                                        <label>Company name (optional)</label>
                                        <input type="text" name="order_companyname" value="<?php if(isset($row['company_name'])) echo $row['company_name']?>" class="form-control" />
                                    </div>

                                    <div class="select-custom">
                                        <label>Country / Region
                                            <abbr class="required" title="required">*</abbr></label>
                                        <select name="order_country1" class="form-control">
                                            <option value="" selected="selected">Vanuatu
                                            </option>
                                            <option value="1">Brunei</option>
                                            <option value="2">Bulgaria</option>
                                            <option value="3">Burkina Faso</option>
                                            <option value="4">Burundi</option>
                                            <option value="5">Cameroon</option>
                                        </select>
                                    </div>

                                    <div class="form-group mb-1 pb-2">
                                        <label>Street address
                                            <abbr class="required" title="required">*</abbr></label>
                                        <input type="text" name="order_street"  value="<?php if(isset($row['street'])) echo $row['street']?>" class="form-control" placeholder="House number and street name" required />
                                    </div>

                                 

                                    <div class="form-group">
                                        <label>Town / City
                                            <abbr class="required" title="required">*</abbr></label>
                                        <input type="text" name="order_town"  value="<?php if(isset($row['town'])) echo $row['town']?>" class="form-control" required />
                                    </div>

                                    <div class="select-custom">
                                        <label>State / County <abbr class="required" title="required">*</abbr></label>
                                        <select name="order_country2" class="form-control">
                                            <option value="" selected="selected">NY</option>
                                            <option value="1">Brunei</option>
                                            <option value="2">Bulgaria</option>
                                            <option value="3">Burkina Faso</option>
                                            <option value="4">Burundi</option>
                                            <option value="5">Cameroon</option>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label>Postcode / Zip
                                            <abbr class="required" title="required">*</abbr></label>
                                        <input type="text" name="order_postcode"  value="<?php if(isset($row['postcode'])) echo $row['postcode']?>" class="form-control" required />
                                    </div>

                                    <div class="form-group">
                                        <label>Phone <abbr class="required" title="required">*</abbr></label>
                                        <input type="tel" name="order_phone"  value="<?php if(isset($row['phone'])) echo $row['phone']?>" class="form-control" required />
                                    </div>

                                    <div class="form-group">
                                        <label>Email address
                                            <abbr class="required" title="required">*</abbr></label>
                                        <input type="email" name="order_email"  value="<?php if(isset($row['email'])) echo $row['email']?>" class="form-control" required />
                                    </div>

                                    <!-- <div class="form-group mb-1">
                                        <div class="custom-control custom-checkbox">
                                            <input type="checkbox" name="order_account" class="custom-control-input" id="create-account" />
                                            <label class="custom-control-label" data-toggle="collapse" data-target="#collapseThree" aria-controls="collapseThree" for="create-account">Create an
                                                account?</label>
                                        </div>
                                    </div>

                                    <div id="collapseThree" class="collapse">
                                        <div class="form-group">
                                            <label>Create account password
                                                <abbr class="required" title="required">*</abbr></label>
                                            <input type="password" name="order_password" placeholder="Password" class="form-control" required />
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="custom-control custom-checkbox mt-0">
                                            <input type="checkbox" name="order_diffaddress" class="custom-control-input" id="different-shipping" />
                                            <label class="custom-control-label" data-toggle="collapse" data-target="#collapseFour" aria-controls="collapseFour" for="different-shipping">Ship to a
                                                different
                                                address?</label>


                                        </div>
                                    </div> -->

                                    <div id="collapseFour" class="collapse">
                                        <div class="shipping-info">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>First name <abbr class="required"
                                                                title="required">*</abbr></label>
                                                        <input type="text" name="order_fname" class="form-control" required />
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label>Last name <abbr class="required"
                                                                title="required">*</abbr></label>
                                                        <input type="text" name="order_lname" class="form-control" required />
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label>Company name (optional)</label>
                                                <input type="text" name="order_cname" class="form-control">
                                            </div>

                                            <div class="select-custom">
                                                <label>Country / Region <span class="required">*</span></label>
                                                <select name="order_country" class="form-control">
                                                    <option value="" selected="selected">Vanuatu</option>
                                                    <option value="1">Brunei</option>
                                                    <option value="2">Bulgaria</option>
                                                    <option value="3">Burkina Faso</option>
                                                    <option value="4">Burundi</option>
                                                    <option value="5">Cameroon</option>
                                                </select>
                                            </div>

                                            <div class="form-group mb-1 pb-2">
                                                <label>Street address <abbr class="required"
                                                        title="required">*</abbr></label>
                                                <input type="text" name="order_street" class="form-control" placeholder="House number and street name" required />
                                            </div>

                                            <div class="form-group">
                                                <input type="text" class="form-control" placeholder="Apartment, suite, unit, etc. (optional)" required />
                                            </div>

                                            <div class="form-group">
                                                <label>Town / City <abbr class="required"
                                                        title="required">*</abbr></label>
                                                <input type="text" class="form-control" required />
                                            </div>

                                            <div class="select-custom">
                                                <label>State / County <abbr class="required"
                                                        title="required">*</abbr></label>
                                                <select name="order_state" class="form-control">
                                                    <option value="" selected="selected">NY</option>
                                                    <option value="1">Brunei</option>
                                                    <option value="2">Bulgaria</option>
                                                    <option value="3">Burkina Faso</option>
                                                    <option value="4">Burundi</option>
                                                    <option value="5">Cameroon</option>
                                                </select>
                                            </div>

                                            <div class="form-group">
                                                <label>Postcode / ZIP <abbr class="required"
                                                        title="required">*</abbr></label>
                                                <input type="text" name="order_postcode" class="form-control" required />
                                            </div>
                                        </div>
                                    </div>

                                    <!-- <div class="form-group">
                                        <label class="order-comments">Order notes (optional)</label>
                                        <textarea class="form-control" name="order_note" placeholder="Notes about your order, e.g. special notes for delivery." required></textarea>
                                    </div> -->
                                </form>
                            </li>
                        </ul>
                    </div>
                    <!-- End .col-lg-8 -->

                    <div class="col-lg-5">
                        <div class="order-summary">
                            <h3>YOUR ORDER</h3>

                            <table class="table table-mini-cart">
                                <thead>
                                    <!-- <tr>
                                        <th colspan="2">Product</th>
                                    </tr> -->
                                </thead>
                                <tbody>
                                    <!-- <tr>
                                        <td class="product-col">
                                            <h3 class="product-title">
                                                Circled Ultimate 3D Speaker ×
                                                <span class="product-qty">4</span>
                                            </h3>
                                        </td>

                                        <td class="price-col">
                                            <span>Rs 2000</span>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td class="product-col">
                                            <h3 class="product-title">
                                                Fashion Computer Bag ×
                                                <span class="product-qty">2</span>
                                            </h3>
                                        </td>

                                        <td class="price-col">
                                            <span>Rs 1000</span>
                                        </td>
                                    </tr> -->
                                </tbody>
                                <tfoot>
                                    

                                    <tr class="order-total">
                                        <td>
                                            <h4>Total</h4>
                                        </td>
                                        <td>
                                            <b class="total-price"><span>Rs <?php if(isset($_SESSION['item-total']))  echo $_SESSION['item-total']; else echo $_SESSION['item-total'] =""; ?></span></b>
                                        </td>
                                    </tr>
                                </tfoot>
                            </table>

                            <div class="payment-methods">
                                <h4 class="">Payment methods</h4>
                                <div class="info-box with-icon p-0">
                                    <p>
                                        Sorry, it seems that there are no available payment methods for your state. Please contact us if you require assistance or wish to make alternate arrangements.
                                    </p>
                                </div>
                            </div>

                            <button type="submit" class="btn btn-dark btn-place-order" form="checkout-form">
                                
                            <form action="payment-success.php" method="POST">
                            <script
                                src="https://checkout.razorpay.com/v1/checkout.js"
                                data-key="<?php echo $data['key']?>"
                                data-amount="<?php echo $data['amount']?>"
                                data-currency="INR"
                                data-name="<?php echo $data['name']?>"
                                data-image="<?php echo $data['image']?>"
                                data-description="<?php echo $data['description']?>"
                                data-prefill.name="<?php echo $data['prefill']['name']?>"
                                data-prefill.email="<?php echo $data['prefill']['email']?>"
                                data-prefill.contact="<?php echo $data['prefill']['contact']?>"
                                data-notes.shopping_order_id="3456"
                                data-order_id="<?php echo $data['order_id']?>"
                                <?php if ($displayCurrency !== 'INR') { ?> data-display_amount="<?php echo $data['display_amount']?>" <?php } ?>
                                <?php if ($displayCurrency !== 'INR') { ?> data-display_currency="<?php echo $data['display_currency']?>" <?php } ?>
                            >
                            </script>
                            <!-- Any extra fields to be submitted with the form but not sent to Razorpay -->
                            <input type="hidden" name="shopping_order_id" value="3456">


                            </form>
                                Place Order
                            </button>
                        </div>
                        <!-- End .cart-summary -->
                    </div>
                    <!-- End .col-lg-4 -->
                </div>
                <!-- End .row -->
            </div>
            <!-- End .container -->
        </main>
        <!-- End .main -->





<?php include "includes/footer.php"?>+