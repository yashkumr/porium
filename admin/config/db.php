<?php 
ob_start();
session_start();
// session_destroy();

include ("helper/functions.php");
// include ("helper/forms.php");
defined("DS") ? null : define("DS",DIRECTORY_SEPARATOR);
defined("ADMIN") ? null : define("ADMIN", __DIR__ . DS ."admin\includes");



defined("DB_HOST") ? null : define("DB_HOST", "localhost");
defined("DB_USER") ? null : define("DB_USER", "root");
defined("DB_PASS") ? null : define("DB_PASS", "");
defined("DB_NAME") ? null : define("DB_NAME", "porium");

$connection = mysqli_connect(DB_HOST,DB_USER,DB_PASS,DB_NAME);
// $conn = mysqli_connect("localhost","root","","porium");
if(!$connection){
    header("Location: 404.php");
    die();
}


?>
