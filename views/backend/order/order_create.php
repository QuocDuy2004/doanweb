<?php
use App\Models\Order;


$list = Order::where('status', '!=', 0)->OrderBy('created_at', 'DESC')->get();

?>

<?php require_once '../views/backend/header.php'; ?>
<!-- CONTENT -->
<form action="index.php?option=order&cat=process" method="post" enctype="multipart/form-data">
   <div class="content-wrapper">
      <section class="content-header">
         <div class="container-fluid">
            <div class="row mb-2">
               <div class="col-sm-12">
                  <h1 class="d-inline">Thêm đơn hàng</h1>
               </div>
            </div>
         </div>
      </section>
      <!-- Main content -->
      <section class="content">
         <div class="card">
            <div class="card-header">
               <div class="row">
                  <div class="col-md-6">
                     <a class="btn btn-danger" href="index.php?option=order&cat=trash">
                        <i class="fa-solid fa-trash-can"></i> Thùng rác
                     </a>
                  </div>
                  <div class="col-md-6 text-right">
                     <button class="btn btn-sm btn-success" type="submit" name="THEM">
                        <i class="fa fa-save" aria-hidden="true"></i>
                        Lưu
                     </button>
                  </div>
               </div>
            </div>
            <div class="card-body">
               <div class="row">
                  <div class="col-md-12">
                     <div class="mb-3">
                        <label>ID người dùng (*)</label>
                        <input type="text" name="user_id" class="form-control">
                     </div>
                     <div class="mb-3">
                        <label>Tên giao hàng</label>
                        <input type="text" name="deliveryname" class="form-control">
                     </div>
                     <label>Điện thoại người giao</label>
                     <input type="tel" name="deliveryphone" class="form-control">
                     <div class="mb-3">
                        <label>Email người giao</label>
                        <input type="email" name="deliveryemail" class="form-control">  
                     </div>
                     <div class="mb-3">
                        <label>Địa chỉ người giao</label>
                        <input type="text" name="deliveryaddress" class="form-control">
                     </div>
                     <div class="mb-3">
                        <label>Ghi chú</label>
                        <input type="text" name="note" class="form-control">
                     </div>
                     <div class="mb-3">
                        <label>Trạng thái</label>
                        <select name="status" class="form-control">
                           <option value="1">Xuất bản</option>
                           <option value="2">Chưa xuất bản</option>
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