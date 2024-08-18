<?php include "config/db.php" ?>
<?php include "includes/header.php"?>
<?php 
    if($_SESSION['item-total']==0){
        redirect("index.php");
    }
    if(!isset($_SESSION['user_name']) && isset($_SESSION['user_id'])){
        redirect("login.php");
    }
?>
<?php

    if(isset($_POST["cash_on_delivery"])){
        $grandTotal = 0;
        $orderId = "MKT".mt_rand(12,1006786);
        foreach ($_SESSION as  $name => $value) {
            if ($value > 0) {
                if (substr($name, 0, 8) == "product_") {
                    $length = strlen($name)-8;
                    
                    $id = escape_string(substr($name,8,$length));
                    
                    confirm($result = query("select * from products where product_id ='$id'"));
                    $sub =0;
                    foreach ($result as $row) {
                        $sub = $row['product_price']*$value;


                            $findSameOrderId = query("select * from cart where order_id = '$orderId'");
                            if(mysqli_num_rows($findSameOrderId)>0){
                                $orderId = "MKT".mt_rand(12,1006786);
                            }else{
                                query("INSERT INTO cart (product_name,product_quantity,product_subtotal,product_id,order_id,user_id) VALUES ('{$row['product_name']}','$value','$sub','$id','$orderId','{$_SESSION['user_id']}')");
                            }

                           
                            unset($_SESSION[$name]);
                    }
                    
                    
                }
            }
        }
        $_SESSION['item-total']=0;
        $_SESSION["item-quantity"]=0;


    }



?>


<div class="success">

<div class="success-img">
    <img width="100%" src="./assets/images/icons/checked.png" alt="">
</div>
<div class="success-content">
<h2>Success!</h2>
<p>Your Payment have <br> Successfully done </p> 

<button class="btn-ok"><a href="updatedetails.php">OKAY</a></button>
</div>

</div>

<?php include "includes/footer.php"?>