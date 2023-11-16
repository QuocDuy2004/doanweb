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
if (isset($_SESSION['iscustom'])) {
    header('Location: index.php'); // Nếu đã đăng nhập, chuyển hướng ngay lập tức đến trang chính (index.php)
    exit();
}
use App\Models\User;
if(isset($_POST['dangnhap'])){
   $username = $_POST['username'];
   $password = sha1($_POST['password']);
   $args=[
     # ['username','=', $username],
      ['password','=', $password],
      ['status','=', 1]
   ];

   if(filter_var($username, FILTER_VALIDATE_EMAIL)){
    $args[] = ['email','=', $username];
   } else {
    $args[] = ['username','=', $username];
   }


   $user = User::where($args)->first();

   if($user != null){
    $_SESSION['iscustom'] = $username;
    $_SESSION['user_id'] = $user->id;
    $_SESSION['name'] = $user->name;
      $success = "Đăng nhập thành công. Sẽ chuyển hướng tới admin sau 2 giây";
      header("Refresh: 2; URL=index.php");
   }else {
    $error = "Đăng nhập thất bại";
    header("Refresh: 2; URL=index.php?option=login");
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
                                        <h5 class="text-primary">Trang đăng nhập</h5>
                                        <p>Chào mừng bạn đã đến với website của chúng tôi</p>
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
                                <form class="form-horizontal" action="index.php?option=login" method="POST">
                                    <div class="mb-3">
                                        <label for="username" class="form-label">Username</label>
                                        <input class="form-control" type="text" value="" id="username" name="username"
                                            placeholder="Enter username">
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">Password</label>
                                        <div class="input-group auth-pass-inputgroup">
                                            <input type="password" value="" id="password" name="password" class="form-control"
                                                placeholder="Enter password" aria-label="Password"
                                                aria-describedby="password-addon">
                                            <button class="btn btn-light " type="button" id="password-addon"><i
                                                    class="mdi mdi-eye-outline"></i></button>
                                        </div>
                                    </div>

                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="remember-check">
                                        <label class="form-check-label" for="remember-check">
                                            Remember me
                                        </label>
                                    </div>
                                    <div class="main-signin-footer text-center mt-3">
                                        <p><a href="index.php?option=forgot" class="mb-3">Quên mật khẩu?</a></p>
                                        <p>Bạn chưa có tài khoản? <a href="index.php?option=register">Tạo tài khoản</a>
                                        </p>
                                    </div>
                                    <div class="mt-3 d-grid">
                                        <button class="btn btn-primary waves-effect waves-light" type="submit"
                                            name="dangnhap">Log In</button>
                                    </div>

                                    <div class="mt-4 text-center">
                                        <h5 class="font-size-14 mb-3">Sign in with</h5>

                                        <ul class="list-inline">
                                            <li class="list-inline-item">
                                                <a href="javascript::void()"
                                                    class="social-list-item bg-primary text-white border-primary">
                                                    <i class="mdi mdi-facebook"></i>
                                                </a>
                                            </li>
                                            <li class="list-inline-item">
                                                <a href="javascript::void()"
                                                    class="social-list-item bg-info text-white border-info">
                                                    <i class="mdi mdi-twitter"></i>
                                                </a>
                                            </li>
                                            <li class="list-inline-item">
                                                <a href="javascript::void()"
                                                    class="social-list-item bg-danger text-white border-danger">
                                                    <i class="mdi mdi-google"></i>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                    <?php if (isset($error) != ""): ?>
                                        <p class="text-red-500">
                                            <?= $error ?>
                                        </p>
                                    <?php endif ?>
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