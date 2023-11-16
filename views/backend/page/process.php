<?php 
use App\Models\Page;


if (isset($_POST['CHANGEADD']))
{
    $page= new Page();
    $page->title = $_POST['title'];
    $page->slug = (strlen($_POST['slug'])>0)?$_POST['slug']:"xlsau";
    $page->detail = $_POST['detail'];
    $image = $_POST['image'];
    if (!empty($image)) {
        $page->image = $image;
    } else {
        $page->image = 'http://clipart-library.com/data_images/474639.png';
    }
   
    
    $page->updated_at = date('Y-m-d H:i:s');
    $page->status = (isset($_SESSION['user_id'])) ? $_SESSION['user_id']:1;
    var_dump($page);
    $page -> save();
    header("location:index.php?option=page");  
}

if (isset($_POST['CAPNHAP'])) {
    // Tạo mới hoặc tìm trang theo điều kiện cụ thể (chẳng hạn theo 'id')
    $page = Page::find($_POST['id']) ?? new Page();

    // Gán giá trị cho các thuộc tính của trang
    $page->title = $_POST['title'];
    $page->slug = (strlen($_POST['slug']) > 0) ? $_POST['slug'] : "xlsau";
    $page->detail = $_POST['detail'];

    // Xử lý hình ảnh
    $image = $_POST['image'] ?? '';  // Đảm bảo biến tồn tại để tránh lỗi
    $page->image = (!empty($image)) ? $image : 'http://clipart-library.com/data_images/474639.png';

    // Gán giá trị cho các cột khác
    $page->updated_at = date('Y-m-d H:i:s');
    $page->updated_by = date('Y-m-d H:i:s');
    $page->status = (isset($_SESSION['user_id'])) ? $_SESSION['user_id'] : 1;

    // Lưu trang vào cơ sở dữ liệu
    $page->save();

    // Chuyển hướng đến trang danh sách sau khi cập nhật
    header("location:index.php?option=page");
}
