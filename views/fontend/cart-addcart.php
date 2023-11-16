<?php
use App\Models\Product;
use App\Libraries\Cart;

if(isset($_REQUEST['addcart']))
{
    $id=$_GET['id'];
    $product=Product::find($id);
    $qty=$_GET['qty'];
    //lưu vào
    $cart_item=[
        'id'=>$id,
        'name'=>$produc->name,
        'price'=>$produc->pricesale,
        'qty'=>$qty,
        'image'=>$product->image
    ];
    //
    Cart::addCart($cart_item);
    return count($_SESSION['cart']);
}