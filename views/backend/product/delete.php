<?php 

use App\Models\Product;

$id= $_REQUEST['id'];
$product = Product::find($id);
if($product == NULL){
    header("location:index.php?option=product");
}

$product -> status = 0;
$product -> updated_at = date('Y-m-d H:i:s');
$product -> updated_by = (isset($_SESSION['user_id'])) ? $_SESSION['user_id'] : $_SESSION['user_id'];
$product -> save();
header("location:index.php?option=product");