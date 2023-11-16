<?php
use App\Models\User;

if (isset($_POST['CHANGE_PASSWORD'])) {
    $user_id = $_SESSION['user_id'];

    $user = User::find($user_id);

    if ($user) {
        $old_password = $_POST['password_old'];
        $new_password = $_POST['password'];
        $confirm_password = $_POST['password_re'];

        if (sha1($old_password) === $user->password) {
            if ($new_password === $confirm_password) {
                
                $user->password = sha1($new_password);
                $user->save();

                echo "Thành công";
                header("Location:index.php?option=profile_changepassword");
                exit();
            } else {
                echo "Xác nhận mật khẩu mới không khớp";
                exit();
            }
        } else {
            echo "Mật khẩu cũ không chính xác";
            exit();
        }
    } else {
        echo "Người dùng không tồn tại";
        exit();
    }
}


// Hiển thị trang thông tin tài khoản
require_once "views/fontend/header.php";
?>
<section class="hdl-maincontent py-2">
    <form action="index.php?option=profile_changepassword" method="post">
        <div class="container">
            <div class="row">
                <div class="col-md-9 order-1 order-md-2">
                    <h1 class="fs-2 text-main">Thông tin tài khoản</h1>
                    <table class="table table-borderless">
                        <tr>
                            <td style="width:20%;">Mật khẩu cũ</td>
                            <td>
                                <input type="password" name="password_old" class="form-control" />
                            </td>
                        </tr>
                        <tr>
                            <td>Mật khẩu</td>
                            <td>
                                <input type="password" name="password" class="form-control" />
                            </td>
                        </tr>
                        <tr>
                            <td>Xác nhận mật khẩu</td>
                            <td>
                                <input type="password" name="password_re" class="form-control" />
                            </td>
                        </tr>
                        <tr>
                            <td></td>
                            <td>
                                <button class="btn btn-main" type="submit" name="CHANGE_PASSWORD">
                                    Đổi mật khẩu
                                </button>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </form>
</section>
<?php require_once "views/fontend/footer.php"; ?>
