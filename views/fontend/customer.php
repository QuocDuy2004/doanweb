<?php
session_start();
if(isset($_POST["login"])) {
    require_once("views/fontend/customer-login.php");
}
if(!isset($_SESSION['logout'])){
    unset($_SESSION['iscustom']);
    unset($_SESSION['user_id']);
    unset($_SESSION['name']);
    header('location:index.php');
}
echo $success_logout;
header('location:index.php');
?>