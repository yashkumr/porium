<?php
include('config/db.php');?>
<?php  include('includes/header.php');?>
<!-- End .header -->
<main class="main">
    <div class="page-header">
        <div class="container d-flex flex-column align-items-center">
            <nav aria-label="breadcrumb" class="breadcrumb-nav">
                <div class="container">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                        <li class="breadcrumb-item"><a href="category.php">Shop</a></li>
                        <li class="breadcrumb-item active" aria-current="page">
                            My Account
                        </li>
                    </ol>
                </div>
            </nav>

            <h1>My Account</h1>
        </div>
    </div>
    <?php displayMessage()?>
    <div class="container login-container">
        <div class="row">
            <div class="col-lg-10 mx-auto">
                <div class="row">
                    <div class="col-md-12">
                        <div class="heading mb-1">
                            <h2 class="title text-center">
                                <h2 class="text-center">Register</h2>
                            </h2>
                        </div>

                        <form action="response.php" method="post">
                            <div class="row">
                                <div class="col-lg-6">
                                    <label for="name">
                                        Name
                                        <span class="required">*</span>
                                    </label>
                                    <input type="text" class="form-input form-wide" name="user_name" id="name" required />
                                </div>
                                <div class="col-lg-6">
                                    <label for="register-email">
                                        Email address
                                        <span class="required">*</span>
                                    </label>
                                    <input type="email" class="form-input form-wide" name="user_email" id="register-email" required />

                                </div>
                                <div class="col-lg-6">
                                    <label for="register-password">
                                        Password
                                        <span class="required">*</span>
                                    </label>
                                    <input type="password" class="form-input form-wide" name="user_password" id="register-password"
                                        required />
                                </div>
                                <div class="col-lg-6">

                                    <label for="register-c-password">
                                        Confirm Password
                                        <span class="required">*</span>
                                    </label>
                                    <input type="password" class="form-input form-wide" name="user_confirm_password" id="register-c-password"
                                        required />
                                </div>
                                <div class="col-lg-12">
                                    <label for="number">
                                        Mobile Number
                                        <span class="required">*</span>
                                    </label>
                                    <input type="tel" class="form-input form-wide" id="user_number" name="user_number" required />
                                </div>
                            </div>
                            <div class="form-footer">
                                <button type="submit" name="user_register" class="btn btn-dark btn-md w-100 mr-0">
                                    Register
                                </button>
                            </div>
                            <div style="text-align:center;"><a href="login.php">Login Here</a></div>
                        </form>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</main><!-- End .main -->

<?php include 'includes/footer.php'?>

