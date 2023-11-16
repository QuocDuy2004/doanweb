<?php 
use App\Models\Config;


if (isset($_POST['THEM']))
{
    $config= new Config();
    $config->name = $_POST['name'];
    $config->value = $_POST['value'];
    $config->updated_at = date('Y-m-d H:i:s');
    $config->status = (isset($_SESSION['user_id'])) ? $_SESSION['user_id']:1;
    var_dump($config);
    $config -> save();
    header("location:index.php?option=config");  
}