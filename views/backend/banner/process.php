<?php 

use App\Models\Banner;

if (isset($_POST['THEM'])) {
    $banner = new Banner();
    $banner->name = $_POST['name'];
    $banner->link = $_POST['link']; 
    
    $banner->position = $_POST['position'];
    $banner->status = (isset($_SESSION['user_id'])) ? $_SESSION['user_id'] : 1;

    // Xử lý tải lên hình ảnh
    if ($_FILES['image']['name']) {
        $image_name = $_FILES['image']['name'];
        $image_tmp = $_FILES['image']['tmp_name'];
        $image_path = '../public/images/' . $image_name;

        // Di chuyển tệp tải lên vào thư mục ảnh
        move_uploaded_file($image_tmp, $image_path);

        // Lưu tên tệp vào trường 'image' trong cơ sở dữ liệu
        $banner->image = $image_name;
    }


    // Lưu dữ liệu vào cơ sở dữ liệu
    $banner->save();

    header("location:index.php?option=banner");
}

if (isset($_POST['CAPNHAP']))
{
    if(isset($_REQUEST['CAPNHAP']) != Null){
        echo "Update không thành công";
    }
    $id = $_POST['id'];
    $banner= Banner::find($id);
    $banner->name = $_POST['name'];
    $banner->link = $_POST['link'];
    $banner->image = $_FILES['image']['name'];

    /*$brand->created_at = $_POST['created_at'];
    $brand->created_by = $_POST['created_by'];*/
    $banner->updated_at = date('Y-m-d H:i:s');
    $banner->updated_by = (isset($_SESSION['user_id'])) ? $_SESSION['user_id'] : 1;
    var_dump($banner);
    $banner -> save();
    
    header("location:index.php?option=banner");
}