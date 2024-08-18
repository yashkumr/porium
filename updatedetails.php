<?php include "config/db.php" ?>
<?php include "includes/header.php" ?>

<style>
    .fs-20 {
        font-size: 20px !important;
    }

    @media(max-width:768px) {
        .fs-20 {
            font-size: 12px !important;
        }

        .mobile-pills {
            display: flex !important;
            flex-direction: row !important;
            justify-content: space-evenly;
            margin-bottom: 15px;
        }
    }

    .color-black {
        color: black;
    }

    .color-black:hover {
        color: rgb(174, 169, 169);
    }
</style>

<?php
if (!isset($_SESSION['user_name']) && !isset($_SESSION['user_id'])) {
    redirect("login.php");
}

if (isset($_SESSION['user_id'])) {

    if (isset($_POST['submit_user'])) {

        $user_name = $_POST['name'];
        $user_phone = $_POST['phone'];

        confirm(query("UPDATE users SET name = '{$user_name}' , phone = '{$user_phone}' where user_id = '{$_SESSION['user_id']}'"));

        message("update data successfully");
    }

    if (isset($_POST['submit_address'])) {
        $company = $_POST['billing_company'];
        $street_address = $_POST['street-address'];
        $country = $_POST['country'];
        $town = $_POST['town'];
        $state = $_POST['state'];
        $postcode = $_POST['postcode'];
        $phone_number = $_POST['phone-number'];
        $email = $_POST['email'];
        $billing_name = $_POST['billing_name'];

        confirm($foundUserAddress =  query("select * from address where user_id = '{$_SESSION['user_id']}' limit 1"));

        if (mysqli_num_rows($foundUserAddress) > 0) {
            confirm(query("UPDATE address SET company_name = '{$company}', billing_name = '{$billing_name}', country = '{$country}' , street = '{$street_address}', town ='{$town}', state = '{$state}', postcode='{$postcode}', phone = '{$phone_number}', email = '{$email}' WHERE user_id = {$_SESSION['user_id']}"));
        } else {

            confirm(query("INSERT INTO address (user_id, billing_name, company_name, country, street, town, state, postcode, phone, email ) VALUES ('{$_SESSION['user_id']}', '{$billing_name}', '{$company}', '{$country}', '{$street_address}', '{$town}', '{$state}' , '{$postcode}', '{$phone_number}', '{$email}')"));
        }



        message("Update Address successfully");
    }
}

?>





<div class="row p-5">
    <div class="col-12">

        <h2 class="text-center py-3 my-5">UPDATE DETAILS</h2>
    </div>
    <div class="col-lg-3   col-md-3 ">
        <div class="nav bg-light mobile-pills p-2 flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
            <a class="nav-link active color-black" id="v-pills-home-tab" data-toggle="pill" href="#v-pills-home" role="tab" aria-controls="v-pills-home" aria-selected="true"><b class="fs-20">User Details</b></a>
            <a class="nav-link  color-black" id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-profile" role="tab" aria-controls="v-pills-profile" aria-selected="false"><b class="fs-20">Billing
                    Address</b></a>
            <a class="nav-link  color-black" id="v-pills-messages-tab" data-toggle="pill" href="#v-pills-messages" role="tab" aria-controls="v-pills-messages" aria-selected="false"><b class="fs-20">Order</b></a>
        </div>
    </div>
    <div class="col-md-8 col-lg-8">
        <?php displayMessage() ?>
        <div class="tab-content" id="v-pills-tabContent">
            <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
                <div class="col-lg-12">
                    <ul class="checkout-steps">
                        <li>
                            <h2 class="step-title">User Details</h2>
                            <?php
                              if (isset($_SESSION['user_id'])) {
                                confirm($result = query("SELECT * FROM users WHERE user_id = '{$_SESSION['user_id']}'"));

                                if ($row = mysqli_fetch_assoc($result)) {


                                ?>

                                    <form method="POST" action="#">

                                        <div class="form-group">
                                            <label for="name">First name
                                                <abbr class="required" title="required">*</abbr>
                                            </label>
                                            <input type="text" id="name" value="<?php echo $row['name'] ?>" name="name" class="form-control" required />
                                        </div>

                                        <!-- <div class="form-group">
                                        <label for="password">Passsword
                                            <abbr class="required" title="required">*</abbr>
                                        </label>
                                        <input type="password" id="password" readonly value = "" name="password" class="form-control" required />
                                    </div> -->


                                        <div class="form-group">
                                            <label for="phone">Phone Number
                                                <abbr class="required" title="required">*</abbr>
                                            </label>
                                            <input type="tel" id="phone" name="phone" value="<?php echo $row['phone'] ?>" class="form-control" required />
                                        </div>


                                        <button type="submit" name="submit_user" class="btn btn-dark btn-place-order">
                                            Update User Details
                                        </button>
                                    </form>
                              <?php
                                }
                            }
                            ?>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">
                <div class="col-lg-12">
                    <ul class="checkout-steps">
                        <li>
                            <h2 class="step-title">Billing Address</h2>

                            <?php

                            if ($_SESSION['user_id']) {

                                confirm($result = query("select * from address where user_id  = {$_SESSION['user_id']} "));

                                $row = mysqli_fetch_assoc($result);
                            ?>
                                <form method="POST" action="">



                                    <div class="form-group mb-1 pb-2">
                                        <label for="company">Company Name
                                            <abbr class="required" title="required">*</abbr></label>
                                        <input type="text" value="<?php
                                                                    if (isset($row['company_name'])) {
                                                                        echo $row['company_name'];
                                                                    }
                                                                    ?>" class="form-control" name="billing_company" id="company" required />
                                    </div>

                                    <div class="form-group mb-1 pb-2">
                                        <label for="billing_name">Billing Name
                                            <abbr class="required" title="required">*</abbr></label>
                                        <input type="text" value="<?php
                                                                    if (isset($row['billing_name'])) {
                                                                        echo $row['billing_name'];
                                                                    }
                                                                    ?>" class="form-control" name="billing_name" id="billing_name" required />
                                    </div>


                                    <div class="select-custom">
                                        <label for="country">Country / Region
                                            <abbr class="required" title="required">*</abbr></label>
                                        <select name="country" id="country" class="form-control">
                                            <option value="<?php
                                                            if (isset($row['country'])) {
                                                                echo $row['country'];
                                                            }
                                                            ?>" selected="selected">
                                                <?php if (isset($row['country'])) {
                                                    echo $row['country'];
                                                } ?>
                                            </option>
                                            <option value="India">India</option>
                                            <option value="England">England</option>
                                            <option value="Shri lanka">Shri lanka</option>
                                            <option value="Bangladesh">Bangladesh</option>
                                            <option value="Afganishtan">Afganishtan</option>

                                        </select>
                                    </div>

                                    <div class="form-group mb-1 pb-2">
                                        <label for="street-address">Street address
                                            <abbr class="required" title="required">*</abbr></label>
                                        <input type="text" class="form-control" name="street-address" id="street-address" value="<?php
                                                                                                                                    if (isset($row['street'])) {
                                                                                                                                        echo $row['street'];
                                                                                                                                    }
                                                                                                                                    ?>" placeholder="House number and street name" required />
                                    </div>



                                    <div class="form-group">
                                        <label for="town">Town / City
                                            <abbr class="required" title="required">*</abbr></label>
                                        <input name="town" value="<?php
                                                                    if (isset($row['town'])) {
                                                                        echo $row['town'];
                                                                    }
                                                                    ?>" id="town" type="text" class="form-control" required />
                                    </div>

                                    <div class="select-custom">
                                        <label for="state">State <abbr class="required" title="required">*</abbr></label>
                                        <select id="state" name="state" class="form-control">
                                            <option value="<?php
                                                            if (isset($row['state'])) {
                                                                echo $row['state'];
                                                            }
                                                            ?>" selected="selected">
                                                <?php
                                                if (isset($row['state'])) {
                                                    echo $row['state'];
                                                }
                                                ?>
                                            </option>
                                            <option value="Delhi">Delhi</option>
                                            <option value="Panjab">Panjab</option>
                                            <option value="Uttar Pradesh">Uttar Pradesh</option>
                                            <option value="Uttarakhand">Uttarakhand</option>
                                            <option value="Mumbai">Mumbai</option>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label for="postcode">Postcode / Zip
                                            <abbr class="required" title="required">*</abbr></label>
                                        <input type="text" value="<?php
                                                                    if (isset($row['postcode'])) {
                                                                        echo $row['postcode'];
                                                                    }
                                                                    ?>" name="postcode" id="postcode" class="form-control" required />
                                    </div>

                                    <div class="form-group">
                                        <label for="phone-number">Phone <abbr class="required" title="required">*</abbr></label>
                                        <input type="tel" value="<?php if (isset($row['phone'])) {
                                                                        echo $row['phone'];
                                                                    } ?>" name="phone-number" id="phone-number" class="form-control" required />
                                    </div>

                                    <div class="form-group">
                                        <label for="email">Email address
                                            <abbr class="required" title="required">*</abbr></label>
                                        <input type="email" id="email" value="<?php
                                                                                if (isset($row['email'])) {
                                                                                    echo $row['email'];
                                                                                }
                                                                                ?>" name="email" class="form-control" required />
                                    </div>
                                    <button type="submit" name="submit_address" class="btn btn-dark btn-place-order">
                                        Update Billing Address
                                    </button>
                                </form>

                            <?php } ?>
                        </li>
                    </ul>
                </div>
                <!-- End .col-lg-8 -->
            </div>
            <div class="tab-pane fade" id="v-pills-messages" role="tabpanel" aria-labelledby="v-pills-messages-tab">

                <table class="table">
                    <thead class="table-dark">
                        <tr>
                            <th scope="col">S.No</th>
                            <th scope="col">Product</th>
                            <th scope="col">Qty</th>
                            <th scope="col">Price</th>
                            <th scope="col">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php

                        if (isset($_SESSION['user_id'])) {
                            confirm($findOrderUser = query("select * from orders as o inner join products as p on o.product_id = p.product_id where o.user_id = {$_SESSION['user_id']}"));

                            $id = 1;
                            foreach ($findOrderUser as $orders) :



                        ?>

                                <tr>
                                    <th scope="row"><?php echo $id; ?></th>

                                    <td>
                                        <img class="img-fluid mr-3" width="60" src="admin/assets/image/product/12_1686043500.webp" alt="product">
                                        <span><b><?php if (isset($orders['product_name'])) echo $orders['product_name'] ?></b></span>
                                    </td>
                                    <td>4</td>
                                    <td><?php if (isset($orders['order_amount'])) echo $orders['order_amount'] ?></td>
                                    <td>
                                        <?php

                                        if (strtolower($orders['order_status']) == "completed") {

                                            echo '<span class="btn-sm text-center btn-success">Completed</span>';
                                        } else {
                                            echo  '<span class="btn-sm text-center btn-danger">Failed</span>';
                                        }

                                        ?>

                                    </td>
                                </tr>

                        <?php $id++;
                            endforeach;
                        } ?>
                    </tbody>
                </table>
            </div>

        </div>
    </div>
</div>


<?php include "includes/footer.php" ?>