<?php 

use App\Models\Order;

$id= $_REQUEST['id'];
$order = Order::find($id);
if($order == NULL){
    header("location:index.php?option=order&cat=trash");
}
 
$order -> status = 2;
$order -> updated_at = date('Y-m-d H:i:s');
$order -> updated_by = (isset($_SESSION['user_id'])) ? $_SESSION['user_id'] : 1;
$order -> save();
header("location:index.php?option=order&cat=trash");