<?php

use App\Models\Banner;

$id = $_REQUEST['id'];
$banner = Banner::find($id);

?>
<?php require_once '../views/backend/header.php'; ?>
<!-- CONTENT -->
<form action="index.php?option=banner&cat=process" method="post" enctype="multipart/form-data">
   <div class="content-wrapper">
      <section class="content-header">
         <div class="container-fluid">
            <div class="row mb-2">
               <div class="col-sm-12">
                  <h1 class="d-inline">Chi tiết slider show</h1>
               </div>
            </div>
         </div>
      </section>
      <!-- Main content -->
      <section class="content">
         <div class="card">
            <div class="card-header text-right">
               <a href="index.php?option=banner" class="btn btn-sm btn-info">
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
                              <th>Hình ảnh</th>
                              <th>Tên slider</th>
                              <th>Liên kết</th>
                              <th>Trạng thái</th>
                           </tr>
                        </thead>
                        <tbody>
                           <?php if (!is_null($banner)): ?>
                              <tr>
                                 <td>
                                    <?= $banner->id; ?>
                                 </td>
                                 <td>
                                    <?= $banner->image; ?>
                                 </td>
                                 <td>
                                    <?= $banner->link; ?>
                                 </td>
                                 <td>
                                    <?= $banner->status; ?>
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