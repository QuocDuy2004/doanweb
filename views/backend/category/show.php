<?php

use App\Models\Category;

// Lấy ID từ tham số yêu cầu
$id = $_REQUEST['id'];

// Tìm kiếm danh mục với ID cụ thể
$category = Category::find($id);

?>

<?php require_once '../views/backend/header.php'; ?>
<!-- CONTENT -->
<form action="index.php?option=category&cat=process" method="post" enctype="multipart/form-data">
   <div class="content-wrapper">
      <section class="content-header">
         <div class="container-fluid">
            <div class="row mb-2">
               <div class="col-sm-12">
                  <h1 class="d-inline">Chi tiết loại</h1>
               </div>
            </div>
         </div>
      </section>
      <!-- Main content -->
      <section class="content">
         <div class="card">
            <div class="card-header text-right">
               <a href="index.php?option=category" class="btn btn-sm btn-info">
                  <i class="fa fa-arrow-left" aria-hidden="true"></i>
                  Về danh sách
               </a>
            </div>
         </div>
         <div class="card-body">
            <div class="table-responsive">
               <div class="row">
                  <div class="col-md-12">
                     <table class="table table-bordered">
                        <thead>
                           <tr>
                              <th>ID</th>
                              <th>Tên danh mục</th>
                              <th>Tên slug</th>
                              <th>Hình ảnh</th>
                              <th>Trạng thái</th>
                           </tr>
                        </thead>
                        <tbody>
                           <?php if (!is_null($category)): ?>
                              <tr>
                                 <td>
                                    <?= $category->id; ?>
                                 </td>
                                 <td>
                                    <?= $category->name; ?>
                                 </td>
                                 <td>
                                    <?= $category->slug; ?>
                                 </td>
                                 <td><img width="100px" src="../public/images/category/<?= $category->image; ?>"
                                       alt="<?= $category->image; ?>"></td>
                                 <td>
                                    <?= $category->status; ?>
                                 </td>
                              </tr>
                           <?php else: ?>
                              <tr>
                                 <td colspan="5">Không có dữ liệu để hiển thị.</td>
                              </tr>
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