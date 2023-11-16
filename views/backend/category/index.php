<?php
use App\Models\Category;

$list = Category::where('status', '!=', 0)->OrderBy('created_at', 'DESC')->get();
?>

<?php require_once '../views/backend/header.php'; ?>
<!-- CONTENT -->
<form action="index.php?option=category&cat=process" method="post">
   <div class="content-wrapper">
      <section class="content-header">
         <div class="container-fluid">
            <div class="row mb-2">
               <div class="col-sm-12">
                  <h1 class="d-inline">Tất cả danh mục</h1>
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
                     <a class="btn btn-danger" href="index.php?option=category&cat=trash">
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
                  <div class="col-md-4">
                     <div class="mb-3">
                        <label>Tên danh mục (*)</label>
                        <input type="text" name="name" id="name" placeholder="Nhập tên danh mục" class="form-control"
                           onkeydown="handle_slug(this.value);">
                     </div>
                     <div class="mb-3">
                        <label>Slug</label>
                        <input type="text" name="slug" id="slug" placeholder="Nhập slug" class="form-control">
                     </div>
                     <div class="mb-3">
                        <label>Mô tả</label>
                        <textarea name="description" class="form-control"></textarea>
                     </div>
                     <div class="mb-3">
                        <label>Hình đại diện</label>
                        <input type="file" name="image" class="form-control">
                     </div>
                     <div class="mb-3">
                        <label>Trạng thái</label>
                        <select name="status" class="form-control">
                           <option value="1">Xuất bản</option>
                           <option value="2">Chưa xuất bản</option>
                        </select>
                     </div>
                  </div>
                  <div class="col-md-8">
                     <div class="table-responsive">
                        <table class="table table-bordered">
                           <thead>
                              <tr>
                                 <th class="text-center" style="width:30px;">
                                    <input type="checkbox">
                                 </th>
                                 <th class="text-center" style="width:130px;">Hình ảnh</th>
                                 <th>Tên danh mục</th>
                                 <th>Tên slug</th>
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
                                          <img width="100px" src="../public/images/category/<?= $item->image; ?>"
                                             alt="<?= $item->image; ?>">
                                          <div class="function_style">
                                             <?php if ($item->status == 1): ?>
                                                <a href="index.php?option=category&cat=status&id=<?= $item->id; ?>">Hiện</a>
                                             <?php else: ?>
                                                <a href="index.php?option=category&cat=status&id=<?= $item->id; ?>">Ẩn</a>
                                             <?php endif; ?>
                                             <a href="index.php?option=category&cat=edit&id=<?= $item->id; ?>">Chỉnh sửa</a> |
                                             <a href="index.php?option=category&cat=show&id=<?= $item->id; ?>">Chi tiết</a> |
                                             <a href="index.php?option=category&cat=delete&id=<?= $item->id; ?>">Xoá</a>
                                          </div>
                                       </td>
                                       <td>
                                          <div class="name">
                                             <?= $item->name ?>
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
            </div>
         </div>
      </section>
   </div>
</form>
<!-- END CONTENT-->
<?php require_once '../views/backend/footer.php'; ?>