<?php include("config/db.php") ?>
<?php
//add  product 
if (isset($_POST['addProduct'])) {

    $product_name = escape_string($_POST['product_name']);
    $product_category = $_POST['product_category'];
    $product_price = $_POST['product_price'];
    $product_code = $_POST['product_code'];
    $product_stock = $_POST['product_stock'];
    $product_old_price = $_POST['product_old_price'];
    $product_description = escape_string($_POST['product_description']);

    $product_status = $_POST['product_status'];


    //Photo validation end


    // $product_code_found = query("select * from products where product_code = '$product_code' ");
    // confirm($product_code_found);
    // if (mysqli_num_rows($product_code_found) > 0) {
    //     message("This Product Code is Already Used <b>( $product_code )</b>.");
    //     redirect("addproduct.php");
    // } else {

        //Photo validation
        $total = count($_FILES['images']['name']);

        for ($i = 0; $i < $total; $i++) {
            $tmpFilePath = $_FILES['images']['tmp_name'][$i];
            $imageName = $_FILES['images']['name'][$i];
    
            if ($tmpFilePath != "") {
                $targetDirectory = "assets/image/product/"; // Set your target directory
                $targetFilePath = $targetDirectory . $imageName;
    
                if (move_uploaded_file($tmpFilePath, $targetFilePath)) {
                   
                    // if ($connection->query($sql) === TRUE) {
                        
                    // } else {
                    //     echo "Error: " . $sql . "<br>" . $conn->error;
                    // }
                } else {
                    echo "Error uploading image '$imageName'.<br>";
                }
            }
        }
    
        // $connection->close();

        $result =  query("INSERT INTO products(product_name, product_category_id, product_old_price, product_price, product_stock, product_description, product_image, product_code,product_status) VALUES ('$product_name','$product_category', '$product_old_price','$product_price','$product_stock','$product_description','$imageName','$product_code','$product_status')");
        confirm($result);

        message("Product Save Sucessfully");

        redirect("addproduct.php");
    }
// }

if (isset($_POST['updateProduct'])) {

    $product_name = escape_string($_POST['product_name']);
    $product_category = $_POST['product_category'];
    $product_price = $_POST['product_price'];
    $product_code = $_POST['product_code'];
    $product_stock = $_POST['product_stock'];
    $product_old_price = $_POST['product_old_price'];
    $product_description = escape_string($_POST['product_description']);

    $product_id = $_POST['product_id'];

    confirm($result = query("SELECT product_code from products where product_id = '$product_id'"));
    $res = mysqli_fetch_assoc($result);

    if ($res['product_code'] != $product_code) {
        $product_code_found = query("select * from products where product_code = '$product_code' ");
        confirm($product_code_found);
        if (mysqli_num_rows($product_code_found) > 0) {
            message("This Product Code is Already Used <b>( $product_code )</b>.");
            redirect("product.php");
        }
    }
    // Photo validation
    $allowed_extension = ['jpg', 'jpeg', 'png', 'JPG', 'JPEG', 'PNG', 'webp'];
    $product_image = "";
    $photoProperPath = '';
    if (isset($_FILES['product_image']['name']) && !empty($_FILES['product_image']['name'])) {
        $extension_1 = explode('.', $_FILES['product_image']['name']);
        $file_name = $extension_1[0] . '_' . time() . '.' . $extension_1[1];
        $destination_folder = 'assets/image/product/';
        $photoProperPath = $destination_folder . $file_name;
        $slider_photo = $file_name;
        if (in_array($extension_1[1], $allowed_extension)) {
            move_uploaded_file($_FILES['product_image']['tmp_name'], $photoProperPath);

            $product_image = $file_name;
        } else {
            $photoErr = 'jpg, jpeg, and png file format are allowed';
            message($photoErr);
        }
    } else {
        //check file size 10mb 
        if ($_FILES["product_image"]["size"] > 10485760) {
            $photoErr = "Sorry, your file is too large.";
            message($photoErr);
            redirect("product.php");
        }
    }



    $result =  query("UPDATE  products set product_name = '$product_name', product_category_id = '$product_category' , product_old_price = '$product_old_price', product_price = '$product_price', product_stock= '$product_stock', product_description =  '$product_description', product_image = '$product_image' , product_code= '$product_code' where product_id = '$product_id'");
    confirm($result);



    message("Product Update Sucessfully");

    redirect("product.php");
}



//login amdin
if (isset($_POST['admin_signin'])) {
    $emailOrPhone = escape_string($_POST['admin_email']);
    $password = escape_string($_POST['admin_password']);

    confirm($sql = query("Select * from admin where (email = '$emailOrPhone' or phone ='$emailOrPhone') and (password = '$password')"));
    if (mysqli_num_rows($sql) == 0) {
        message("Check your Username and password");
        redirect("login.php");
    } else {

        if (isset($_POST['admin_remember'])) {
            setcookie("emailOrPhone", $emailOrPhone, time() + (86400));
            setcookie("password", $password, time() + (86400));

            $row = mysqli_fetch_assoc($sql);
            $_SESSION["admin_user"] = escape_string($row['name']);
        } else {
            $row = mysqli_fetch_assoc($sql);
            $_SESSION["admin_user"] = escape_string($row['name']);
        }
        message("Welcome to Dashboard");
        redirect("index.php");
    }
}


if (isset($_POST['addCategory'])) {
    $addCategory =  ucwords(escape_string($_POST['category']));

    $addCategorySqlFind = query("select * from categories where cat_name = '$addCategory'");
    confirm($addCategorySqlFind);
    if (mysqli_num_rows($addCategorySqlFind) > 0) {
        message("This Category is Already Added <b>( $addCategory )</b>.");
        redirect("addcategory.php");
    } else {
        confirm($addCategorysql = query("Insert Into categories (cat_name) values('$addCategory')"));

        message("Category Added Successfully");
        redirect("addcategory.php");
    }
}

if (isset($_POST['addSlider'])) {


    //Photo validation

    $allowed_extension = ['jpg', 'jpeg', 'png', 'JPG', 'JPEG', 'PNG'];


    $photoProperPath = '';
    if (isset($_FILES['slider']['name']) && !empty($_FILES['slider']['name'])) {
        $extension_1 = explode('.', $_FILES['slider']['name']);
        $file_name = $extension_1[0] . '_' . time() . '.' . $extension_1[1];
        $destination_folder = 'assets/image/slider/';
        $photoProperPath = $destination_folder . $file_name;
        $slider_photo = $file_name;
        if (in_array($extension_1[1], $allowed_extension)) {
            move_uploaded_file($_FILES['slider']['tmp_name'], $photoProperPath);

            confirm(query("insert into slider(image) values('$file_name')"));
            message("Slider Added Sucessfully");
        } else {
            $photoErr = 'jpg, jpeg, and png file format are allowed';
            message($photoErr);
        }
    } else {
        //check file size 10mb 
        if ($_FILES["slider"]["size"] > 10485760) {
            $photoErr = "Sorry, your file is too large.";
            message($photoErr);
        }
    }
    redirect("mainslider.php");

    //Photo validation end
}

if (isset($_GET['slider_id'])) {
    $getSliderId = escape_string($_GET['slider_id']);

    confirm($result = query("select * from slider where id = '$getSliderId'"));
    $row = mysqli_fetch_assoc($result);
    unlink("assets/image/slider/" . $row['image']);

    confirm(query("Delete from slider where id = '$getSliderId'"));
    message("Sucessfully Deleted");
    redirect("mainslider.php");
}

if (isset($_GET['product_id'])) {
    $getProductId = escape_string($_GET['product_id']);

    confirm($result = query("select * from products where product_id = '$getProductId'"));
    $row = mysqli_fetch_assoc($result);
    unlink("assets/image/product/" . $row['product_image']);

    confirm(query("Delete from products where product_id = '$getProductId'"));
    message("Sucessfully Deleted");
    redirect("product.php");
}

if (isset($_POST['addNavbar'])) {
    $navbar =  ucwords(escape_string($_POST['top_navbar_name']));

    $navbarSqlFind = query("select * from top_navbar where top_navbar_name = '$navbar'");
    confirm($navbarSqlFind);
    if (mysqli_num_rows($navbarSqlFind) > 0) {
        message("This Navbar is Already Added <b>( $navbar )</b>.");
        redirect("navbar.php");
    } else {
        confirm($navbarsql = query("Insert Into top_navbar (top_navbar_name) values('$navbar')"));

        message("Navbar Added Successfully");
        redirect("navbar.php");
    }
}

if (isset($_POST['addSocialMedia'])) {
    $facebook = escape_string($_POST['social_facebook']);
    $twitter = escape_string($_POST['social_twitter']);
    $instagram = escape_string($_POST['social_instagram']);



    confirm($result = query("update social set facebook ='$facebook', twitter = '$twitter', instagram = '$instagram' where social_id = 1 limit 1"));

    message("Saved Sucessfully");
    redirect("social.php");
}



?>
<!-- Navbar -->
<?php
if (isset($_POST['updateNavbar'])) {

    $navbar =  ucwords(escape_string($_POST['tops_navbar_name']));
    $top_navbar_id = escape_string($_POST['navbar_id']);

    $navbarSqlFind = query("select * from top_navbar where top_navbar_name = '{$navbar}' and top_navbar_id = '{$top_navbar_id}'");
    confirm($navbarSqlFind);
    if (mysqli_num_rows($navbarSqlFind) > 0) {
        message("This Navbar is Already Added <b>( $navbar )</b>.");
        redirect("navbar.php");
    } else {
        confirm($navbarsql = query(
            "UPDATE `top_navbar` SET `top_navbar_name` = '{$navbar}' WHERE top_navbar_id = '{$top_navbar_id}'"
        ));

        message("Navbar Update Successfully");
        redirect("navbar.php");
    }
}

if (isset($_GET['navbar_id'])) {

    $top_navbar_id = escape_string($_GET['navbar_id']);

    confirm($result =  query("Delete from top_navbar where top_navbar_id = $top_navbar_id"));
    if ($result) {
        message("Navbar Deleted SuccessFully");
        redirect("navbar.php");
    } else {
        message("Navbar not found");
        redirect("navbar.php");
    }
}


?>
<!-- active and hide -->
<?php

if (isset($_GET['product_active_id'])) {
    confirm($result = query("update products set product_status = 0 where product_id = {$_GET['product_active_id']}"));
    redirect("product.php");
}

if (isset($_GET['product_deactive_id'])) {
    confirm($result = query("update products set product_status = 1 where product_id = {$_GET['product_deactive_id']}"));
    redirect("product.php");
}

?>


<?php
if (isset($_GET['userd_id'])) {
    confirm($result = query("Delete from users where user_id = {$_GET['userd_id']}"));
    message("User SucessFully Deleted");
    redirect("user.php");
}
?>