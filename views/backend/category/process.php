<?php

use App\Models\Category;
use App\Libraries\MyClass;

if (isset($_POST['THEM'])) {
    $category = new Category();
    //lay tu form
    $category->name = $_POST['name'];
    $category->slug = (strlen($_POST['slug']) > 0) ? $_POST['slug'] : MyClass::str_slug($_POST['name']);
    $category->description = $_POST['description'];
    $category->status = $_POST['status'];



    $category->image = $_FILES['image']['name'];

    if (strlen($_FILES['image']['name']) > 0) {
        $target_dir = "../public/images/category/";
        $original_filename = basename($_FILES["image"]["name"]);
        $target_file = $target_dir . $original_filename;

        $extension = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        if (in_array($extension, ['jpg', 'jpeg', 'png', 'gif', 'webp'])) {
            // Use the correct property: $category->image
            $filename = $category->image;
            move_uploaded_file($_FILES['image']['tmp_name'], $target_dir . $filename);
            $category->image = $filename;
        }
    }

    $category->status = $_POST['status'];
    $category->created_at = date('Y-m-d h:i:s');
    $category->created_by = (isset($_SESSION['user_id'])) ? $_SESSION['user_id'] : 1;

    // Output for debugging
    var_dump($category);

    $category->save();

    MyClass::set_flash('message', ['msg' => 'Thêm thành công', 'type' => 'success']);
    header("location:index.php?option=category");
}

if (isset($_POST['CAPNHAP'])) {
    $id = $_POST['id'];
    $category = Category::find($id);
    if ($category == null) {
        MyClass::set_flash('message', ['msg' => 'Lỗi trang 404', 'type' => 'danger']);
        header("location:index.php?option=category");
    }
    //lấy từ form
    $category->name = $_POST['name'];
    $category->slug = (strlen($_POST['slug']) > 0) ? $_POST['slug'] : MyClass::str_slug($_POST['name']);
    $category->description = $_POST['description'];
    $category->status = $_POST['status'];

    //xử lý upload file
    $category->image = $_FILES['image']['name'];

    if (strlen($_FILES['image']['name']) > 0) {
        $target_dir = "../public/images/category/";
        $original_filename = basename($_FILES["image"]["name"]);
        $target_file = $target_dir . $original_filename;

        $extension = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        if (in_array($extension, ['jpg', 'jpeg', 'png', 'gif', 'webp'])) {
            // Use the correct property: $category->image
            $filename = $category->image;
            move_uploaded_file($_FILES['image']['tmp_name'], $target_dir . $filename);
            $category->image = $filename;
        }
    }
    //tự sinh ra
    $category->updated_at = date('Y-m-d H:i:s');
    $category->updated_by = (isset($_SESSION['user_id'])) ? $_SESSION['user_id'] : 1;

    var_dump($category);
    //lưu vào csdl

    $category->save();
    //chuyên hướng về index
    MyClass::set_flash('message', ['msg' => 'Cập nhật thành công', 'type' => 'success']);
    header("location:index.php?option=category");
}