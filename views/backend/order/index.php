<?php
use App\Models\Order;


$list = Order::where('status', '!=', 0)->OrderBy('created_at', 'DESC')->get();
#$list = Order::all();
?>
<?php require '../views/backend/header.php'; ?>

<!-- CONTENT -->
<form action="index.php?option=order&cat=process" method="post">
   <div class="content-wrapper">
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
               </div>
            </div>
            <div class="card-body p-2">
               <div class="table-responsive">
                  <table class="table table-bordered">
                     <thead>
                        <tr>
                           <th class="text-center" style="width:30px;">ID
                           </th>
                           <th>Tên giao hàng</th>
                           <th>Điện thoại người giao</th>
                           <th>Email người giao</th>
                           <th>Địa chỉ người giao</th>
                           <th>Ghi chú</th>
                        </tr>
                     </thead>
                     <tbody>
                        <?php if (count($list) > 0): ?>
                           <?php foreach ($list as $item): ?>
                              <tr class="datarow">
                                 <td>
                                    <input value="<?= $item->id; ?>" type="checkbox">
                                    <?= $item->id; ?>
                                 </td>
                                 <td>
                                    <div class="name">
                                       <?= $item->deliveryname; ?>
                                    </div>
                                    <div class="function_style">
                                       <a href="#">Hiện</a> |
                                       <a href="index.php?option=order&cat=edit&id=<?= $item->id; ?>">Chỉnh sửa</a> |
                                       <a href="index.php?option=order&cat=show&id=<?= $item->id; ?>">Chi tiết</a> |
                                       <a href="index.php?option=order&cat=distroy&id=<?= $item->id; ?>">Xoá</a>
                                    </div>
                                 </td>
                                 <td>
                                    <?= $item->deliveryphone ?>
                                 </td>
                                 <td>
                                    <?= $item->deliveryemail ?>
                                 </td>
                                 <td>
                                    <?= $item->note ?>
                                 </td>
                              </tr>
                           <?php endforeach; ?>
                        <?php endif; ?>
                     </tbody>
                  </table>
               </div>
            </div>
         </div>
      </section>
   </div>
</form>
<!-- END CONTENT-->
<?php require '../views/backend/footer.php'; ?>