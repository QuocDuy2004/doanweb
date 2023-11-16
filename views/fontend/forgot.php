<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng nhập</title>

    <link href="public/assets3/assets/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet"
        type="text/css" />
    <!-- Icons Css -->
    <link href="public/assets3/assets/css/icons.min.css" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="public/assets3/assets/css/app.min.css" id="app-style" rel="stylesheet" type="text/css" />
</head>
<body>
<?php 

use App\Models\User;
if (isset($_POST['fotgot'])) {
    $email = $_POST['email'];
    $args = [
        ['email', '=', $email],
        ['status', '=', 1]
    ];

    $user = User::where($args)->first();

    if ($user) {
        $_SESSION['email'] = $user->email;
        $success = "Xác nhận thành công. Kiểm tra email để lấy mật khẩu";
        header("Refresh: 2; URL=index.php?option=forgot");

        // Gửi thông báo về Telegram
        $telegramBotToken = '6242350588:AAGR6P2io4olZWgUIbit4Owb1Pf0Ef2vARM';
        $telegramChatId = '2116412887';

        $telegramMessage = "Xác nhận quên mật khẩu. Email: $email";

        $telegramApiUrl = "https://api.telegram.org/bot$telegramBotToken/sendMessage";
        $telegramApiParams = [
            'chat_id' => $telegramChatId,
            'text' => $telegramMessage
        ];

        // Sử dụng cURL để gửi thông báo về Telegram
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $telegramApiUrl);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $telegramApiParams);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($ch);
        curl_close($ch);
    } else {
        $error = "Email không tồn tại";
    }
}

?>
<div class="account-pages my-5 pt-sm-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8 col-lg-6 col-xl-5">
                    <div class="card overflow-hidden">
                        <div class="bg-primary bg-soft">
                            <div class="row">
                                <div class="col-7">
                                    <div class="text-primary p-4">
                                        <h5 class="text-primary">Quên mật khẩu</h5>
                                    </div>
                                </div>
                                <div class="col-5 align-self-end">
                                    <img src="public/assets3/assets/images/profile-img.png" alt=""
                                        class="img-fluid">
                                </div>
                            </div>
                        </div>
                        <div class="card-body pt-0">
                            <div class="auth-logo">
                                <a href="{{ DataSite('favicon') }}" class="auth-logo-light">
                                    <div class="avatar-md profile-user-wid mb-4">
                                        <span class="avatar-title rounded-circle bg-light">
                                            <img src="public/assets3/assets/images/logo-light.svg" alt=""
                                                class="rounded-circle" height="34">
                                        </span>
                                    </div>
                                </a>

                                <a href="{{ DataSite('favicon') }}" class="auth-logo-dark">
                                    <div class="avatar-md profile-user-wid mb-4">
                                        <span class="avatar-title rounded-circle bg-light">
                                            <img src="public/assets3/assets/images/logo.svg" alt=""
                                                class="rounded-circle" height="34">
                                        </span>
                                    </div>
                                </a>
                            </div>
                            <?php if (isset($error) != ""): ?>
                                <div class="alert alert-danger alert-dismissible bg-danger text-white border-0 fade show"
                                    role="alert">
                                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert"
                                        aria-label="Close"></button>
                                    <strong>Error - </strong>
                                    <?= $error ?>
                                </div>
                            <?php endif ?>
                            <?php if (isset($success) != ""): ?>
                                <div class="alert alert-success alert-dismissible bg-success text-white border-0 fade show"
                                    role="alert">
                                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert"
                                        aria-label="Close"></button>
                                    <strong>Success - </strong>
                                    <?= $success ?>
                                </div>
                            <?php endif ?>
                            <?php if (isset($success_logout) != ""): ?>
                                <div class="alert alert-success alert-dismissible bg-success text-white border-0 fade show"
                                    role="alert">
                                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="alert"
                                        aria-label="Close"></button>
                                    <strong>Success - </strong>
                                    <?= $success_logout ?>
                                </div>
                            <?php endif ?>
                            <div class="p-2">
                                <form class="form-horizontal" action="index.php?option=forgot" method="POST">
                                    <div class="mb-3">
                                        <label for="email" class="form-label">Email tài khoản cần lấy lại mật khẩu</label>
                                        <input class="form-control" type="email" value="" id="email" name="email"
                                            placeholder="Điền email">
                                    </div>
                                    <div class="main-signin-footer text-center mt-3">
                                        <p>Bạn chưa có tài khoản? <a href="index.php?option=register">Tạo tài khoản</a>
                                        </p>
                                    </div>
                                    <div class="mt-3 d-grid">
                                        <button class="btn btn-primary waves-effect waves-light" type="submit"
                                            name="fotgot">Xác nhận</button>
                                    </div>
                                </form>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </body>

</html>