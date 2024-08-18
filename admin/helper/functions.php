
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
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
DELIMETER;

        echo $dmsg;
    }
    unset($_SESSION['message']);
}


function categoryFetch()
{

    // used on home page category 

    $categoryFetchdata = query("select * from categories");
    confirm($categoryFetchdata);

    while ($category = mysqli_fetch_assoc($categoryFetchdata)) {
        echo "<option value='$category[cat_id]'>$category[cat_name]</option>";
    }
}

function displayFetchingCategory()
{

    // used on home page category 

    $categoryFetchdata = query("select * from categories");
    confirm($categoryFetchdata);

    while ($category = mysqli_fetch_assoc($categoryFetchdata)) {
       $display = <<<DELIMETER
        <tr>
        <td>{$category['cat_id']}</td>
        <td>{$category['cat_name']}
        </td>
        <td class="text-green">
            <a href="" class="text-success">Show</a>
            <a href="" class="text-danger">Hide</a>
        </td>
        <td>
            <a href="" class="btn btn-info btn-sm">Edit</a>
            <a href="" class="btn btn-danger btn-sm">Delete</a>
        </td>
    </tr>
    DELIMETER;
        echo $display;
    }
}

function productFetch()
{

    $productFetchdata = query("select * from products");
    confirm($productFetchdata);

    while ($product = mysqli_fetch_array($productFetchdata)) {
        $re = "";
        if($product['product_status']==1){
            $re = "<a href='response.php?product_active_id={$product['product_id']}' class='text-success'>Show</a>";
        }else $re = "<a href='response.php?product_deactive_id={$product['product_id']}' class='text-danger'>Hide</a>";


        $productData = <<<DELIMETER
        <tr>
        <td>{$product['product_id']}</td>
        <td>{$product['product_name']}</td>
        <td>
            <img class="img-fluid" width="100px" src="assets/image/product/{$product['product_image']}" alt="{$product['product_image']}">
        </td>
        <td>{$product['product_code']}</td>
        <td>{$product['product_stock']}</td>
        <td class="text-green">
            {$re}
          
            
        </td>
        <td>
            <a href="edit-product.php?product_id={$product['product_id']}" class="btn btn-info btn-sm"  >Edit</a>
            <a type="button" href="response.php?product_id={$product['product_id']}" class="btn btn-danger btn-sm deleteBtn" >Delete</a>
        </td>
      </tr>
      DELIMETER;
        echo $productData;
    }
}

// function bestSellingProduct()
// {
//     $result = query("select product_name, product_price from products");
//     confirm($result);

//     foreach ($result as $row) {
//         echo $row['product_name'];
//         echo $row['product_price'];
//     }
// }


function fetchMainsliderData(){
    $result = query("select * from slider");
    confirm($result);

    foreach($result as $row){
        
        $data = <<<DELIMETER
        <tr>
        <td>{$row['id']}</td>
        <td>
        <img class="img-fluid" width="150px" src="assets/image/slider/{$row['image']}" alt="{$row['image']}">
        </td>
        <td>{$row['image']}</td>
        <td class="text-green">
            <a href="" class="text-success">Show</a>
            <a href="" class="text-danger">Hide</a>
        </td>
        <td>
            <a href="edit-slider.php?slider_id={$row['id']}" class="btn btn-info btn-sm"  >Edit</a>
            <a href="response.php?slider_id={$row['id']}" class="btn btn-danger btn-sm deleteBtn" >Delete</a>
        </td>
      </tr>
      DELIMETER;

        echo $data;
    }



}

function displayFetchingNavbar()
{

    // used on home page category 

    $navbarFetchdata = query("select * from top_navbar");
    confirm($navbarFetchdata);

    while ($navbar = mysqli_fetch_assoc($navbarFetchdata)) {
       $display = <<<DELIMETER
        <tr>
        <td>{$navbar['top_navbar_id']}</td>
        <td>{$navbar['top_navbar_name']}
        </td>
        <td class="text-green">
            <a href="" class="text-success">Show</a>
            <a href="" class="text-danger">Hide</a>
        </td>
        <td>
            <a href="edit-navbar.php?navbar_id={$navbar['top_navbar_id']}" class="btn btn-info btn-sm">Edit</a>
            <a href="response.php?navbar_id={$navbar['top_navbar_id']}" class="btn btn-danger btn-sm">Delete</a>
        </td>
    </tr>
    DELIMETER;
        echo $display;
    }
}


function checkEveryPage(){

    if(!isset($_SESSION['admin_user'])){
        redirect("login.php");
    }
}

?>
<!-- user table fetch -->
<?php 

function userFetch(){
    $userFetchdata = query("select * from users");
    confirm($userFetchdata);

    while ($user = mysqli_fetch_array($userFetchdata)) {
        // $re = "";
        // if($user['user_status']==1){
        //     $re = "<a href='response.php?user_active_id={$user['user_id']}' class='text-success'>Show</a>";
        // }else $re = "<a href='response.php?user_deactive_id={$user['user_id']}' class='text-danger'>Hide</a>";


        $userData = <<<DELIMETER
        <tr>
        <td>{$user['user_id']}</td>
        <td>{$user['name']}</td>
        <td>{$user['email']}</td>
        <td>{$user['password']}</td>
        <td>{$user['phone']}</td>
      
        <td>
            <a href="edit-user.php?user_id={$user['user_id']}" class="btn btn-info btn-sm"  >Edit</a>
            <a type="button" href="response.php?userd_id={$user['user_id']}" class="btn btn-danger btn-sm deleteBtn" >Delete</a>
        </td>
      </tr>
      DELIMETER;
        echo $userData;
    }
}

?>