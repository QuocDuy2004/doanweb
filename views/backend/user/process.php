<?php
use App\Models\User;

if (isset($_POST['SAVESTORE'])) {
    $user = new User();

    $user->name = $_POST['name'];
    $user->username = $_POST['username'];
    $user->password = sha1($_POST['password']);
    $user->email = $_POST['email'];
    $gender = isset($_POST['gender']) ? "Nam" : "Nữ";
    $user->phone = $_POST['phone'];
    $image = $_POST['image'];
    if (!empty($image)) {
        $user->image = $image;
    } else {
        $user->image = 'http://clipart-library.com/data_images/474639.png';
    }
    $roles = isset($_POST['roles']) ? "1" : "0";
    $user->address = $_POST['address'];
    $user->status = (isset($_SESSION['user_id'])) ? $_SESSION['user_id'] : 1;
    
    
    $user->created_at = (isset($_SESSION['user_id'])) ? $_SESSION['user_id'] : 1;
    
    $user->save();

    header("location:index.php?option=user");
}


if (isset($_POST['CAPNHAP']))
{
    if(isset($_REQUEST['CAPNHAP']) != Null){
        echo "Update không thành công";
    }
    $id = $_POST['id'];
    $user = new User();

    $user->name = $_POST['name'];
    $user->email = $_POST['email'];
    $user->phone = $_POST['phone'];
    $user->image = $_FILES['image']['name'];

    if (strlen($_FILES['image']['name']) > 0) {
        $target_dir = "../public/images/user/";
        $original_filename = basename($_FILES["image"]["name"]);
        $target_file = $target_dir . $original_filename;

        $extension = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        if (in_array($extension, ['jpg', 'jpeg', 'png', 'gif', 'webp'])) {
            // Use the correct property: $brand->image
            $filename = $user->image;
            move_uploaded_file($_FILES['image']['tmp_name'], $target_dir . $filename);
            $user->image = $filename;
        }
    }
    $user->status = (isset($_SESSION['user_id'])) ? $_SESSION['user_id'] : 1;
    
    
    $user->created_at = (isset($_SESSION['user_id'])) ? $_SESSION['user_id'] : 1;
    
    $user->save();
    
    header("location:index.php?option=user");
}
?>
    