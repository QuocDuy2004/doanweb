<?php

use App\Models\Brand;

$id = $_REQUEST['id'];
$brand = Brand::find($id);

?>

<?php require_once '../views/backend/header.php'; ?>
<!-- CONTENT -->
<form action="index.php?option=brand&cat=process" method="post" enctype="multipart/form-data">
   <div class="content-wrapper">
      <section class="content-header">
         <div class="container-fluid">
            <div class="row mb-2">
               <div class="col-sm-12">
                  <h1 class="d-inline">Chi tiết thương hiệu</h1>
               </div>
            </div>
         </div>
      </section>
      <!-- Main content -->
      <section class="content">
         <div class="card">
            <div class="card-header text-right">
               <a href="index.php?option=brand" class="btn btn-sm btn-info">
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
                              <th>Tên trường</th>
                              <th>Giá trị</th>
                              <th>Ảnh</th>
                              <th>Trạng thái</th>
                           </tr>
                        </thead>
                        <tbody>
                           <?php if (!is_null($brand)): ?>
                              <tr>
                                 <td>
                                    <?= $brand->id; ?>
                                 </td>
                                 <td>
                                    <?= $brand->name; ?>
                                 </td>
                                 <td>
                                    <?= $brand->slug; ?>
                                 </td>
                                 <td><img width="100px" src="../public/images/brand/<?= $brand->image; ?>"
                                       alt="<?= $brand->image; ?>"></td>
                                 <td>
                                    <?= $brand->status; ?>
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
      </section>
   </div>
</form>
<!-- END CONTENT-->
<?php require_once '../views/backend/footer.php'; ?>