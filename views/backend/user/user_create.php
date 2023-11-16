<?php require '../views/backend/header.php'; ?>
<!-- CONTENT -->
<form action="index.php?option=user&cat=process" method="post">
   <div class="content-wrapper">
      <section class="content-header">
         <div class="container-fluid">
            <div class="row mb-2">
               <div class="col-sm-12">
                  <h1 class="d-inline">Thêm mới thành viên</h1>
               </div>
            </div>
         </div>
      </section>
      <section class="content">
         <div class="card">
            <div class="card-header text-right">
               <a href="user_index.html" class="btn btn-sm btn-info">
                  <i class="fa fa-arrow-left" aria-hidden="true"></i>
                  Về danh sách
               </a>
               <button class="btn btn-sm btn-success" type="submit" name="SAVESTORE">
                  <i class="fa fa-save" aria-hidden="true"></i>
                  Thêm thành viên
               </button>
            </div>
            <div class="card-body">
               <div class="row">
                  <div class="col-md-6">
                     <div class="mb-3">
                        <label>Họ tên (*)</label>
                        <input type="text" name="name" class="form-control">
                     </div>
                     <div class="mb-3">
                        <label>Điện thoại</label>
                        <input type="text" name="phone" class="form-control">
                     </div>
                     <div class="mb-3">
                        <label>Email</label>
                        <input type="text" name="email" class="form-control">
                     </div>
                     <div class="mb-3">
                        <label>Tên đăng nhập</label>
                        <input type="text" name="username" class="form-control">
                     </div>
                     <div class="mb-3">
                        <label>Mật khẩu</label>
                        <input type="password" name="password" class="form-control">
                     </div>
                     <div class="mb-3">
                        <div class="card">
                           <div class="card-header text-main">
                              Địa chỉ
                           </div>
                           <div class="card-body">
                              <div class="mb-3">
                                 <label for="address">Địa chỉ</label>
                                 <input type="text" name="address" id="address" class="form-control"
                                    placeholder="Nhập địa chỉ">
                              </div>
                              <div class="row">
                                 <div class="col-4">
                                    <select name="tinhtp" id="tinhtp" class="form-control">
                                       <option value="">Chọn Tỉnh/TP</option>
                                       <option value="63">Tiền Giang</option>
                                    </select>
                                 </div>
                                 <div class="col-4">
                                    <select name="quanhuyen" id="quanhuyen" class="form-control">
                                       <option value="">Chọn Quận/Huyện</option>
                                       <option value="b4">Chợ Gạo</option>
                                    </select>
                                 </div>
                                 <div class="col-4">
                                    <select name="phuongxa" id="phuongxa" class="form-control">
                                       <option value="">Chọn Phường/Xã</option>
                                       <option value="ab">Đồng Sơn</option>
                                    </select>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="mb-3">
                  <label class="text-main">Giới tính</label>
                  <div class="form-check form-switch">
                     <input name="gender" class="form-check-input" type="checkbox" role="switch" id="genderChecked"
                        checked onchange="changeGender()">
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
                  <div class="col-md-6">
                     <div class="mb-3">
                        <label>Hình đại diện</label>
                        <input type="file" name="image" class="form-control">
                     </div>
                     <div class="mb-3">
                        <label>Trạng thái</label>
                        <select name="status" class="form-control">
                           <option value="1">Hoạt động</option>
                           <option value="2">Khóa</option>
                        </select>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </section>
   </div>
</form>
<!-- END CONTENT-->
<?php require '../views/backend/footer.php'; ?>