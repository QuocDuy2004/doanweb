<?php
use App\Models\Post;


$list = Post::where('status', '!=', 0)->OrderBy('created_at', 'DESC')->get();
#$list = Post::all();
?>
<?php require '../views/backend/header.php'; ?>

<!-- CONTENT -->
<div class="content-wrapper">
   <section class="content-header">
      <div class="container-fluid">
         <div class="row mb-2">
            <div class="col-sm-12">
               <h1 class="d-inline">Tất cả bài viết</h1>
            </div>
         </div>
      </div>
   </section>
   <!-- Main content -->
   <section class="content">
      <div class="card">
         <div class="card-header p-2">
            <a href="index.php?option=post_create" class="btn btn-sm btn-primary">Thêm bài viết</a>
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
                        <th>Tiêu đề bài viết</th>
                        <th>Tên danh mục</th>
                     </tr>
                  </thead>
                  <tbody>
                     <?php if (count($list) > 0): ?>
                        <?php foreach ($list as $item): ?>
                           <div>
                              <tr class="datarow">
                                 <td class="col-md-2">
                                    <input type="checkbox">
                                 </td>
                                 <td>
                                    <img width="100px" src="<?= $item->image ?>" alt="<?= $item->image ?>">
                                 </td>
                                 <td class="col-md-2">
                                    <div class="name">
                                       <?= $item->title ?>
                                    </div>

                                    <div class="function_style">
                                       <?php if ($item->status == 1): ?>
                                          <a href="index.php?option=brand&cat=status&id=<?= $item->id; ?>">Hiện</a>
                                       <?php else: ?>
                                          <a href="index.php?option=brand&cat=status&id=<?= $item->id; ?>">Ẩn</a>
                                       <?php endif; ?>
                                       <a href="index.php?option=brand&cat=edit&id=<?= $item->id; ?>">Chỉnh sửa</a> |
                                       <a href="index.php?option=brand&cat=show&id=<?= $item->id; ?>">Chi tiết</a> |
                                       <a href="index.php?option=brand&cat=delete&id=<?= $item->id; ?>">Xoá</a>
                                    </div>
                                 </td class="col-md-8">
                                 <td>
                                    <?= $item->detail ?>
                                 </td>
                              </tr>
                           </div>
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