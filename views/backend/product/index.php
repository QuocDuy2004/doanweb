<?php
use App\Models\Product;


$list = Product::where('status', '!=', 0)->OrderBy('created_at', 'DESC')->get();
#$list = Brand::all();
?>
<?php require '../views/backend/header.php'; ?>
<!-- CONTENT -->
<form action="" method="post">
   <div class="content-wrapper">
      <section class="content-header">
         <div class="container-fluid">
            <div class="row mb-2">
               <div class="col-sm-12">
                  <h1 class="d-inline">Tất cả sản phẩm</h1>
                  <a href="index.php?option=product_create" class="btn btn-sm btn-primary">Thêm sản phẩm</a>
                  <a href="index.php?option=product&cat=show" class="btn btn-sm btn-primary">Xem sản phẩm</a>
               </div>
            </div>
         </div>
      </section>
      <!-- Main content -->
      <section class="content">
         <div class="card">
            <div class="card-header">
               <select name="" id="" class="form-control d-inline" style="width:100px;">
                  <option value="">Xoá</option>
               </select>
               <button class="btn btn-sm btn-success">Áp dụng</button>
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
                        <th>Tên sản phẩm</th>
                        <th>Slug</th>
                        <th>Mô tả</th>
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
                                 <img width="100px" src="../public/images/product/<?= $item->image; ?>"
                                    alt="<?= $item->image; ?>">
                              </td>
                              <td>
                                 <div class="name">
                                    <?= $item->name ?>
                                 </div>
                                 <div class="function_style">
                                    <?php if ($item->status == 1): ?>
                                       <a href="index.php?option=product&cat=status&id=<?= $item->id; ?>">Hiện</a>
                                    <?php else: ?>
                                       <a href="index.php?option=product&cat=status&id=<?= $item->id; ?>">Ẩn</a>
                                    <?php endif; ?>
                                    <a href="index.php?option=product&cat=edit&id=<?= $item->id; ?>">Chỉnh
                                       sửa</a> |
                                    <a href="index.php?option=product&cat=show&id=<?= $item->id; ?>">Chi tiết</a>
                                    |
                                    <a href="index.php?option=product&cat=delete&id=<?= $item->id; ?>">Xoá</a>
                                 </div>
                              </td>
                              <td>
                                 <?= $item->slug ?>
                              </td>
                              <td>
                                 <?= $item->description ?>
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