<?php

use App\Libraries\Cart;

/*$arr_qty = $_POST['qty'];
foreach ($arr_qty as $id=> $qty) {
    Cart::updateCart($id,$qty);
    header('location:index.php?option=cart');
}*/
if(isset($_POST['qty']) && !empty($_POST['qty'])) {
    $arr_qty = $_POST['qty'];

    // Lặp qua mảng qty để cập nhật giỏ hàng
    foreach ($arr_qty as $id => $qty) {
        Cart::updateCart($i, $qty);
    }

    // Chuyển hướng đến trang giỏ hàng sau khi cập nhật
    header('location:index.php?option=cart');
} else {
    // Nếu không có đơn hàng, hiển thị thông báo
    echo "Không có đơn hàng nào";
}   
?>