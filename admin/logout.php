<?php 
include "config/db.php";

// if(isset($_SESSION['admin_user'])){

// }
unset($_SESSION['admin_user']);
redirect("login.php");

?>