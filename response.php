<?php include "config/db.php" ?>
<?php
if(isset($_GET['cart_id'])){
    
	confirm($result =query("select * from products where product_id =".escape_string($_GET['cart_id'])));

	foreach($result as $row){
		if($row['product_stock'] != $_SESSION['product_'.$_GET['cart_id']]){
			$_SESSION['product_'.$_GET['cart_id']]+=1;
            // echo $_SESSION['product_'.$_GET['cart_id']];
			redirect("checkout.php");
		}else{
			message("Out Of Stock This Product ".$row['product_name']);
			redirect("checkout.php");
		}
	}

}

if(isset($_GET['add'])){

    confirm($result = query("select * from products where product_id".escape_string($_GET['add'])));

    while($row = mysqli_fetch_assoc($result)){
        if($row['product_quantity'] != $_SESSION['product_'].$_GET['add']){
           $_SESSION['product_'].$_GET['add']+=1;
        }else{
            // set a message
            message("we only have {$row['product_title']} ".$row['prodcut_quantity']);
            redirect("checkout.php");
        }
    }
	

}

if(isset($_GET['remove'])){

    // echo $_SESSION['product_'.$_GET['cart_id']];
    if($_SESSION['product_'.$_GET['remove']]!= 0){
        $_SESSION['product_'.$_GET['remove']]--;
        redirect("checkout.php");
    }else{
        redirect("checkout.php");
    }
	

}

if(isset($_GET['delete'])){
    $_SESSION['product_'.$_GET['delete']]=0;

    unset($_SESSION['item-total']);
    // echo $_SESSION['product_'.$_GET['cart_id']];
        redirect("checkout.php");
}

?>

<?php
if(isset($_POST['user_signin'])){

    $emailOrPhone = escape_string($_POST['user_email']);
    $password = escape_string($_POST['user_password']);

    confirm($sql = query("Select * from users where (email = '$emailOrPhone' or phone ='$emailOrPhone') and (password = '$password')"));
    if (mysqli_num_rows($sql) == 0) {
        message("Check your Username and password");
        redirect("login.php");
    } else {

        if(isset($_POST['user_remember'])){
            setcookie("emailOrPhone",$emailOrPhone,time()+(86400));
            setcookie("password",$password,time()+(86400));

            $row =mysqli_fetch_assoc($sql);
            $_SESSION["user_name"] = escape_string($row['name']);
            $_SESSION["user_id"] = escape_string($row['user_id']);
        }else{
            $row =mysqli_fetch_assoc($sql);
            $_SESSION["user_name"] = escape_string($row['name']);
            $_SESSION["user_id"] = escape_string($row['user_id']);
        }
        // message("Welcome to Dashboard");
        redirect("index.php");
    }

}

?>
<!-- Register -->
<?php 

if(isset($_POST['user_register'])){
    $username =   escape_string($_POST['user_name']);
    $useremail = escape_string($_POST['user_email']);
    $userpassword = escape_string($_POST['user_password']);
    $userconfirmpassword = escape_string($_POST['user_confirm_password']);
    $usernumber = escape_string($_POST['user_number']);
if($userpassword===$userconfirmpassword){

  $result = query("select * from users where email = '{$useremail}'");
  if(!$result){
        confirm($result);
        query("INSERT INTO users(name,password,email,phone) values ('{$username}','{$userpassword}','{$useremail}','{$usernumber}')");
        message("Register SucessFully");
        redirect("register.php");

  }else{
    message("This Email id is already used ");

    redirect("register.php");
  }
}else{
    message("Passoword Not Matched");

    redirect("register.php");
}

}

?>

<!-- Register end -->



