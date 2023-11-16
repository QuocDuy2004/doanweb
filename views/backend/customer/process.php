<?php 
use App\Models\Customer;


if (isset($_POST['THEM']))
{
    $customer= new Customer();
    $customer->name = $_POST['name'];
    $customer->email = $_POST['email'];
    $customer->user_id = $_POST['user_id'];
    $customer->replay_id = $_POST['replay_id'];
    $customer->phone = $_POST['phone'];
    $customer->title = $_POST['title'];
    
    $customer->updated_at = date('Y-m-d H:i:s');
    $customer->status = (isset($_SESSION['user_id'])) ? $_SESSION['user_id']:1;
    var_dump($customer);
    $customer -> save();
    header("location:index.php?option=customer");  
}

if (isset($_POST['CAPNHAP']))
{
    if(isset($_REQUEST['CAPNHAP']) != Null){
        echo "Update không thành công";
    }
    $id = $_POST['id'];
    $customer= Customer::find($id);
    $customer->name = $_POST['name'];
    $customer->email = $_POST['email'];
    $customer->user_id = $_POST['user_id'];
    $customer->replay_id = $_POST['replay_id'];
    $customer->phone = $_POST['phone'];
    $customer->title = $_POST['title'];
    
    $customer->updated_at = date('Y-m-d H:i:s');
    $customer->status = (isset($_SESSION['user_id'])) ? $_SESSION['user_id']:1;
    var_dump($customer);
    $customer -> save();
    
    header("location:index.php?option=customer");
}