<?php

use App\Models\Product;
use App\Libraries\MyClass;

if(isset($_POST['THEM'])) {
    $product = new Product();
    // Lay tu form
    $product->name = $_POST['name'];
    $product->slug = (strlen($_POST['slug']) > 0) ? $_POST['slug'] : MyClass::str_slug($_POST['name']);
    $product->category_id = $_POST['category_id'];
    $product->brand_id = $_POST['brand_id'];
    $product->description = $_POST['description'];
    $product->price = $_POST['price'];

    // Use $product->image instead of $brand->image
    $product->image = $_FILES['image']['name'];

    if (strlen($_FILES['image']['name']) > 0) {
        $target_dir = "../public/images/product/";
        $original_filename = basename($_FILES["image"]["name"]);
        $target_file = $target_dir . $original_filename;

        $extension = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        if (in_array($extension, ['jpg', 'jpeg', 'png', 'gif', 'webp'])) {
            // Use the correct property: $product->image
            $filename = $product->image;
            move_uploaded_file($_FILES['image']['tmp_name'], $target_dir . $filename);
            $product->image = $filename;
        }
    }

    $product->status = $_POST['status'];
    $product->created_at = date('Y-m-d h:i:s');
    $product->created_by = (isset($_SESSION['user_id'])) ? $_SESSION['user_id'] : 1;

    // Output for debugging
    var_dump($product);

    $product->save();

    MyClass::set_flash('message', ['msg' => 'Thêm thành công', 'type' => 'success']);
    header("location:index.php?option=product");
}


if(isset($_POST['CAPNHAP'])){
    $id=$_POST ['id'];
    $product= Product::find($id);
    if($product==null){
        MyClass::set_flash('message',['msg'=>'Lỗi trang 404','type'=>'danger']);
        header("location:index.php?option=product");
    }  
    $product->name = $_POST['name'];
    $product->slug = (strlen($_POST['slug']) > 0) ? $_POST['slug'] : MyClass::str_slug($_POST['name']);
    $product->category_id = $_POST['category_id'];
    $product->brand_id = $_POST['brand_id'];
    $product->description = $_POST['description'];
    $product->price = $_POST['price'];

    // Use $product->image instead of $brand->image
    $product->image = $_FILES['image']['name'];

    if (strlen($_FILES['image']['name']) > 0) {
        $target_dir = "../public/images/product/";
        $original_filename = basename($_FILES["image"]["name"]);
        $target_file = $target_dir . $original_filename;

        $extension = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        if (in_array($extension, ['jpg', 'jpeg', 'png', 'gif', 'webp'])) {
            // Use the correct property: $product->image
            $filename = $product->image;
            move_uploaded_file($_FILES['image']['tmp_name'], $target_dir . $filename);
            $product->image = $filename;
        }
    }
    $product->updated_at= date('Y-m-d H:i:s');
    $product->updated_by= (isset($_SESSION['user_id'])) ? $_SESSION['user_id'] : 1;
    
    var_dump($product);


    $product->save();

    MyClass::set_flash('message',['msg'=>'Cập nhật thành công','type'=>'success']);
    header("location:index.php?option=product");
}