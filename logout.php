<?php 
include "config/db.php";

unset($_SESSION['user_name']);
unset($_SESSION['user_id']);

redirect("index.php");

?>