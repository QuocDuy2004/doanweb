<?php
session_start();
if (!isset($_SESSION['admin'])) {
    header('location:login.php');
}
require_once '../vendor/autoload.php';
Route::route_admin();