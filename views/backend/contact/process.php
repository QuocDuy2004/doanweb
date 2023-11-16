<?php

use App\Models\Contact;
use App\Libraries\MyClass;

if (isset($_POST['THEM'])) {
    $contact = new Contact();
    //lay tu form
    $contact->name = $_POST['name'];
    $contact->phone = $_POST['phone'];

    $contact->email = $_POST['email'];
    $contact->title = $_POST['title'];
    
    $contact->created_at = date('Y-m-d H:i:s');
    $contact->status = (isset($_SESSION['user_id'])) ? $_SESSION['user_id']:1;
    var_dump($contact);
    $contact -> save();

    MyClass::set_flash('message', ['msg' => 'Thêm thành công', 'type' => 'success']);
    header("location:index.php?option=contact");
}

if (isset($_POST['CAPNHAP'])) {
    $id = $_POST['id'];
    $contact = Contact::find($id);
    if ($contact == null) {
        MyClass::set_flash('message', ['msg' => 'Lỗi trang 404', 'type' => 'danger']);
        header("location:index.php?option=contact");
    }
    //lấy từ form
    $contact->name = $_POST['name'];
    $contact->phone = $_POST['phone'];

    $contact->email = $_POST['email'];
    $contact->title = $_POST['title'];
    
    $contact->created_at = date('Y-m-d H:i:s');
    $contact->status = (isset($_SESSION['user_id'])) ? $_SESSION['user_id']:1;
    var_dump($contact);
    $contact -> save();

    MyClass::set_flash('message', ['msg' => 'Thêm thành công', 'type' => 'success']);
    header("location:index.php?option=contact");
    //chuyên hướng về index
}