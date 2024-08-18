<?php 
ob_start();
session_start();
// session_destroy();

include ("helper/functions.php");
// defined("DS") ? null : define("DS",DIRECTORY_SEPARATOR);
// defined("ADMIN") ? null : define("ADMIN", __DIR__ . DS ."admin\includes");



defined("DB_HOST") ? null : define("DB_HOST", "localhost");
defined("DB_USER") ? null : define("DB_USER", "root");
defined("DB_PASS") ? null : define("DB_PASS", "");
defined("DB_NAME") ? null : define("DB_NAME", "porium");



if($_SERVER['HTTP_HOST']=='localhost'){

    $connection = mysqli_connect(DB_HOST,DB_USER,DB_PASS,DB_NAME);
}else $connection = mysqli_connect(DB_HOST,"porium_user",";7E@FJ6-5U8t","porium");

// $conn = mysqli_connect("localhost","root","","porium");
if(!$connection){
    header("Location: 404.php");
    die();
}


?>
