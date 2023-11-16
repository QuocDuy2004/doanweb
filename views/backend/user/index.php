<?php
use App\Models\User;


$list = User::where('status', '!=', 0)->OrderBy('created_at', 'DESC')->get();
#$list = Brand::all();
?>
<?php require '../views/backend/header.php'; ?>
<!-- CONTENT -->
<div class="content-wrapper">
   <section class="content-header">
      <div class="container-fluid">
         <div class="row mb-2">
            <div class="col-sm-12">
               <h1 class="d-inline">Tất cả thành viên</h1>
               <a href="index.php?option=user_create" class="btn btn-sm btn-primary">Thêm thành viên</a>
            </div>
         </div>
      </div>
   </section>
   <!-- Main content -->
   <section class="content">
      <div class="card">
         <div class="card-header">
            Noi dung
         </div>
         <div class="card-body">
            <div class="table-responsive">
               <table class="table table-bordered" id="mytable">
                  <thead>
                     <tr>
                        <th class="text-center" style="width:30px;">
                           <input type="checkbox">
                        </th>
                        <th class="text-center" style="width:130px;">Hình ảnh</th>
                        <th>Họ tên</th>
                        <th>Điện thoại</th>
                        <th>Email</th>
                     </tr>
                  </thead>
                  <tbody>
                     <?php if (count($list) > 0): ?>
                        <?php foreach ($list as $item): ?>
                           <tr class="datarow">
                              <td>
                                 <input type="checkbox">
                              </td>
                              <td>
                                 <img src="public/images/<?= $item->image ?>" alt="<?= $item->image ?>">
                              </td>
                              <td>
                                 <div class="name">
                                    <?= $item->name ?>
                                 </div>
                                 <div class="function_style">
                                    <?php if ($item->status == 1): ?>
                                       <a href="index.php?option=user&cat=status&id=<?= $item->id; ?>">Hiện</a>
                                    <?php else: ?>
                                       <a href="index.php?option=user&cat=status&id=<?= $item->id; ?>">Ẩn</a>
                                    <?php endif; ?>
                                    <a href="index.php?option=user&cat=edit&id=<?= $item->id; ?>">Chỉnh sửa</a> |
                                    <a href="index.php?option=user&cat=show&id=<?= $item->id; ?>">Chi tiết</a> |
                                    <a href="index.php?option=user&cat=delete&id=<?= $item->id; ?>">Xoá</a>
                                 </div>
                              </td>
                              <td>
                                 <?= $item->phone ?>
                              </td>
                              <td>
                                 <?= $item->email ?>
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
<!-- END CONTENT-->
<?php require '../views/backend/footer.php'; ?>