<?php
use App\Models\User;

$userList = User::where('status', '!=', 1)->OrderBy('created_at', 'DESC')->get();
$user_id = $_SESSION['user_id'] ?? null;

if ($user_id) {
   // Truy vấn thông tin người dùng dựa trên ID từ session
   $user = User::find($user_id);

   if ($user) {
       require_once "views/fontend/header.php";
?>
<section class="hdl-maincontent py-2">
   <div class="container">
      <div class="row">
         <div class="col-md-3 order-2 order-md-1">
            <ul class="list-group mb-3 list-category">
               <li class="list-group-item bg-main py-3">Thông tin tài khoản</li>
               <li class="list-group-item">
                  <a href="index.php?option=profile.php">Thông tin tài khoản</a>
               </li>
               <li class="list-group-item">
                  <a href="index.php?option=history">Quản lý đơn hàng</a>
               </li>
               <li class="list-group-item">
                  <a href="index.php?option=profile_changepassword">Đổi mật khẩu</a>
               </li>
               <li class="list-group-item">
                  <a href="index.php">Thời trang thể thao</a>
               </li>
            </ul>
         </div>
         <div class="col-md-9 order-1 order-md-2">
            <h1 class="fs-2 text-main">Thông tin tài khoản</h1>
               <table class="table table-borderless">
                  <tr>
                     <td style="width:20%;">Tên tài khoản</td>
                     <td><?= $user->name; ?></td>
                  </tr>
                  <tr>
                     <td style="width:20%;">Email</td>
                     <td>
                        <?= $user->email; ?>
                     </td>
                  </tr>
                  <tr>
                     <td style="width:20%;">Giới tính</td>
                     <td>
                        <?= $user->gender; ?>
                     </td>
                  </tr>
                  <tr>
                     <td style="width:20%;">Điện thoại</td>
                     <td>
                        <?= $user->phone; ?>
                     </td>
                  </tr>
                  <tr>
                     <td style="width:20%;">Hình ảnh</td>
                     <td>
                        <?= $user->image; ?>
                     </td>
                  </tr>
                  <tr>
                     <td style="width:20%;">Địa chỉ</td>
                     <td>
                        <?= $user->address; ?>
                     </td>
                  </tr>
               </table>
               
         </div>

      </div>
   </div>
</section>
<?php
        require_once "views/fontend/footer.php";
    } else {
        // Xử lý khi không tìm thấy người dùng
        echo "Không tìm thấy thông tin người dùng";
        require_once "views/fontend/footer.php";
    }
} else {
    // Xử lý khi không có session hoặc người dùng chưa đăng nhập
    echo "Vui lòng đăng nhập để xem thông tin tài khoản";
    require_once "views/fontend/footer.php";
}
?>