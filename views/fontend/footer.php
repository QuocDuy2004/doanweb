<?php
namespace App\Models;
namespace App\Libraries;

?>
<section class="hdl-footer pb-4">
   <div class="container">
      <div class="row">
         <div class="col-md-4 pt-4">
            <h3 class="widgettilte">CHÚNG TÔI LÀ AI ?</h3>
            <p class="pt-1">
               Copyright@ 2024 Duy Media là hệ thống bán sĩ và lẽ thời trang nam, nữ, trẻ em và quần áo thể thao,
               mong muốn đem đến chất lượng tốt nhất cho khách hàng.
            </p>
            <p class="pt-1">
               Địa chỉ: Gò Công Tây, Tiền Giang
            </p>
            <p class="pt-1">
               Điện thoại: 0334713016(call, zalo) - Email: duybuntv@gmail.com
            </p>
            <h3 class="widgettilte">MẠNG XÃ HỘI</h3>
            <div class="social my-3">
               <div class="facebook-icon">
                  <a href="#">
                     <i class="fab fa-facebook-f"></i>
                  </a>
               </div>
               <div class="instagram-icon">
                  <a href="#">
                     <i class="fab fa-instagram"></i>
                  </a>
               </div>
               <div class="google-icon">
                  <a href="#">
                     <i class="fab fa-google"></i>
                  </a>
               </div>
               <div class="youtube-icon">
                  <a href="#">
                     <i class="fab fa-youtube"></i>
                  </a>
               </div>
            </div>
         </div>
         <div class="col-md-4 pt-4">
            <?php require_once "views/fontend/mod-footermenu.php"; ?>
         </div>
         <div class="col-md-4 pt-4 text-end">
            <h3 class="fs-5 text-end">
               <strong>Lượt truy cập</strong>
            </h3>
            <p class="my-1">9888 lượt</p>
         </div>
      </div>
   </div>
</section>


<section class="dhl-copyright bg-dark py-3">
   <div class="container text-center text-white">
      Thiết kế bởi: Phạm Quốc Duy - Phone: 0828255501
   </div>
</section>


<!-- Liên kết hoặc nút để hiển thị modal -->
<a href="#" id="showLoginModal" style="display: none;" data-toggle="modal" data-target="#loginModal">Hiển thị thông
   báo</a>

<!-- Thư viện jQuery và Bootstrap JavaScript -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="public/dist/js/phamquocduy_2122110045.js"></script>
<script>
   document.getElementById('city').addEventListener('change', function () {
      updateAddress();
   });

   document.getElementById('district').addEventListener('change', function () {
      updateAddress();
   });

   document.getElementById('ward').addEventListener('change', function () {
      updateAddress();
   });

   function updateAddress() {
      var addressInput = document.getElementById('deliveryaddress');
      var selectedCity = document.getElementById('city').value;
      var selectedDistrict = document.getElementById('district').value;
      var selectedWard = document.getElementById('ward').value;

      addressInput.value = selectedCity + ' - ' + selectedDistrict + ' - ' + selectedWard;
   }
</script>
<!-- login google -->
<script src="https://apis.google.com/js/platform.js" async defer></script>

<!-- JavaScript để hiển thị modal -->
<script>
   $(document).ready(function () {
      // Kiểm tra session có chứa thông báo đăng nhập không
      <?php if (isset($_SESSION['login_message'])): ?>
         $('#showLoginModal').click(); // Hiển thị modal nếu có thông báo
      <?php endif; ?>

      // Xóa session để không hiển thị lại thông báo
      <?php unset($_SESSION['login_message']); ?>
   });
</script>

</body>

</html>