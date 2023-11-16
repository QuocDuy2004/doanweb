<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Đăng nhập</title>

   <link href="public/assets3/assets/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css" />
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

   if (isset($_POST['dangnhap'])) {
      $username = $_POST['username'];
      $password = sha1($_POST['password']);
      $args = [
         # ['username','=', $username],
         ['password', '=', $password],
         ['status', '=', 1]
      ];

      if (filter_var($username, FILTER_VALIDATE_EMAIL)) {
         $args[] = ['email', '=', $username];
      } else {
         $args[] = ['username', '=', $username];
      }


      $user = User::where($args)->first();

      if ($user != null) {
         $_SESSION['iscustom'] = $username;
         $_SESSION['user_id'] = $user->id;
         $_SESSION['name'] = $user->name;
         $success = "Đăng nhập thành công. Sẽ chuyển hướng tới admin sau 3 giây";
         header("Refresh: 3; URL=index.php");
      } else {
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
                              <h5 class="text-primary">Trang đăng ký tài khoản</h5>
                           </div>
                        </div>
                        <div class="col-5 align-self-end">
                           <img src="public/assets3/assets/images/profile-img.png" alt="" class="img-fluid">
                        </div>
                     </div>
                  </div>
                  <div class="card-body pt-0">
                     <div class="auth-logo">
                        <a href="{{ DataSite('favicon') }}" class="auth-logo-light">
                           <div class="avatar-md profile-user-wid mb-4">
                              <span class="avatar-title rounded-circle bg-light">
                                 <img src="public/assets3/assets/images/logo-light.svg" alt="" class="rounded-circle"
                                    height="34">
                              </span>
                           </div>
                        </a>

                        <a href="{{ DataSite('favicon') }}" class="auth-logo-dark">
                           <div class="avatar-md profile-user-wid mb-4">
                              <span class="avatar-title rounded-circle bg-light">
                                 <img src="public/assets3/assets/images/logo.svg" alt="" class="rounded-circle"
                                    height="34">
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
                              <label for="name" class="text-main">Họ tên(*)</label>
                              <input type="text" name="name" id="name" class="form-control" placeholder="nhập họ tên"
                                 required>
                           </div>
                           <div class="mb-3">
                              <label for="phone" class="text-main">Điện thoại(*)</label>
                              <input type="text" name="phone" id="phone" class="form-control"
                                 placeholder="Nhập điện thoại" required>
                           </div>
                           <div class="col-md-12">
                              <div class="card">
                                 <label for="username" class="text-main">Địa chỉ(*)</label>
                                 <div class="card-body">
                                    <div class="mb-3">
                                       <input type="text" name="address" id="address" class="form-control"
                                          placeholder="Nhập địa chỉ">
                                    </div>
                                    <div class="row">
                                       <div class="col-4">
                                          <select id="city" class="form-control">
                                             <option value="">Chọn tỉnh/thành phố
                                             </option>
                                          </select>
                                       </div>
                                       <div class="col-4">
                                          <select id="district" class="form-control">
                                             <option value="">Chọn quận/huyện
                                             </option>
                                          </select>
                                       </div>
                                       <div class="col-4">
                                          <select id="ward" class="form-control">
                                             <option value="">Chọn xã/phường
                                             </option>
                                          </select>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>

                           <div class="mb-3">
                              <label class="text-main">Giới tính</label>
                              <div class="form-check form-switch">
                                 <input name="gender" class="form-check-input" type="checkbox" role="switch"
                                    id="genderChecked" checked onchange="changeGender()">
                                 <label class="form-check-label" id="labelgender" for="genderChecked">Nam</label>
                              </div>
                           </div>
                           <script>
                              function changeGender() {
                                 const elementGender = document.querySelector("#genderChecked").checked;
                                 if (elementGender == true) {
                                    document.querySelector("#labelgender").innerHTML = "Nam";
                                 }
                                 else {
                                    document.querySelector("#labelgender").innerHTML = "Nữ";
                                 }
                              }
                           </script>
                     </div>

                     <div class="col-md-12">
                        <div class="mb-3">
                           <label for="username" class="text-main">Tên tài khoản(*)</label>
                           <input type="text" name="username" id="username" class="form-control"
                              placeholder="Nhập tài khoản đăng nhập" required>
                        </div>
                        <div class="mb-3">
                           <label for="email" class="text-main">Email(*)</label>
                           <input type="email" name="email" id="email" class="form-control" placeholder="Nhập email"
                              required>
                        </div>
                        <div class="mb-3">
                           <label for="password" class="text-main">Mật khẩu(*)</label>
                           <input type="password" name="password" id="password" class="form-control"
                              placeholder="Mật khẩu" required>
                        </div>
                        <div class="mb-3">
                           <label for="password_re" class="text-main">Xác nhận Mật khẩu(*)</label>
                           <input type="password" name="password_re" id="password_re" class="form-control"
                              placeholder="Xác nhận mật khẩu" required>
                        </div>
                     </div>
                     <div class="mt-3 d-grid">
                        <button class="btn btn-primary waves-effect waves-light" type="submit" name="btn-reg">Xác nhận
                           đăng ký</button>
                     </div>
                     <div class="mt-4 text-center">
                                <h5 class="font-size-14 mb-3">
                                 <a href="index.php?option=login">Quay lại trang đăng nhập</a>
                                </h5>
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
   <!--Chọn tỉnh thành-->
   <script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.21.1/axios.min.js"></script>
   <script>
      var citis = document.getElementById("city");
      var districts = document.getElementById("district");
      var wards = document.getElementById("ward");
      var Parameter = {
         url: "https://raw.githubusercontent.com/kenzouno1/DiaGioiHanhChinhVN/master/data.json",
         method: "GET",
         responseType: "application/json",
      };
      var promise = axios(Parameter);
      promise.then(function (result) {
         renderCity(result.data);
      });

      function renderCity(data) {
         for (const x of data) {
            var opt = document.createElement('option');
            opt.value = x.Name;
            opt.text = x.Name;
            opt.setAttribute('data-id', x.Id);
            citis.options.add(opt);
         }
         citis.onchange = function () {
            district.length = 1;
            ward.length = 1;
            if (this.options[this.selectedIndex].dataset.id != "") {
               const result = data.filter(n => n.Id === this.options[this.selectedIndex].dataset.id);

               for (const k of result[0].Districts) {
                  var opt = document.createElement('option');
                  opt.value = k.Name;
                  opt.text = k.Name;
                  opt.setAttribute('data-id', k.Id);
                  district.options.add(opt);
               }
            }
         };
         district.onchange = function () {
            ward.length = 1;
            const dataCity = data.filter((n) => n.Id === citis.options[citis.selectedIndex].dataset.id);
            if (this.options[this.selectedIndex].dataset.id != "") {
               const dataWards = dataCity[0].Districts.filter(n => n.Id === this.options[this.selectedIndex].dataset.id)[0].Wards;

               for (const w of dataWards) {
                  var opt = document.createElement('option');
                  opt.value = w.Name;
                  opt.text = w.Name;
                  opt.setAttribute('data-id', w.Id);
                  wards.options.add(opt);
               }
            }
         };
      }

   </script>


</body>

</html>