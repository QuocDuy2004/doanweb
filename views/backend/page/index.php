<?php
use App\Models\Page;


$list = Page::where('status', '!=', 0)->OrderBy('created_at', 'DESC')->get();
#$list = Brand::all();
?>

<?php require '../views/backend/header.php'; ?>

<!-- CONTENT -->
<div class="content-wrapper">
   <section class="content-header">
      <div class="container-fluid">
         <div class="row mb-2">
            <div class="col-sm-12">
               <h1 class="d-inline">Tất cả trang đơn</h1>
            </div>
         </div>
      </div>
   </section>
   <!-- Main content -->
   <section class="content">
      <div class="card">
         <div class="card-header p-2">
            <a href="index.php?option=page_create" class="btn btn-sm btn-primary">Thêm trang đơn</a>
         </div>
         <div class="card-body p-2">
            <div class="table-responsive">
               <table class="table table-bordered">
                  <thead>
                     <tr>
                        <th class="text-center" style="width:30px;">
                           <input type="checkbox">
                        </th>
                        <th class="text-center" style="width:130px;">Hình ảnh</th>
                        <th>Tên đề tài</th>
                        <th>Slug</th>
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
                                 <img src="../public/images/<?= $item->image ?>" alt="page.jpg">
                              </td>
                              <td>
                                 <div class="name">
                                    <?= $item->title ?>
                                 </div>
                                 <div class="function_style">
                                    <?php if ($item->status == 1): ?>
                                       <a href="index.php?option=page&cat=status&id=<?= $item->id; ?>">Hiện</a>
                                    <?php else: ?>
                                       <a href="index.php?option=page&cat=status&id=<?= $item->id; ?>">Ẩn</a>
                                    <?php endif; ?>
                                    <a href="index.php?option=page&cat=edit&id=<?= $item->id; ?>">Chỉnh sửa</a> |
                                    <a href="index.php?option=page&cat=show&id=<?= $item->id; ?>">Chi tiết</a> |
                                    <a href="index.php?option=page&cat=delete&id=<?= $item->id; ?>">Xoá</a>
                                 </div>
                              </td>
                              <td>
                                 <?= $item->slug ?>
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