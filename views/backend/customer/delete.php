<?php 

use App\Models\Customer;

$id= $_REQUEST['id'];
$customer = Customer::find($id);
if($customer == NULL){
    header("location:index.php?option=customer");
}

$customer -> status = 0;
$customer -> updated_at = date('Y-m-d H:i:s');
$customer -> updated_by = (isset($_SESSION['user_id'])) ? $_SESSION['user_id'] : $_SESSION['user_id'];
$customer -> save();
header("location:index.php?option=customer");