<?php
use App\Models\Product;


$list = Product::where('status', '!=', 0)->OrderBy('created_at', 'DESC')->get();
#$list = Product::all();
?>

<?php require_once '../views/backend/header.php'; ?>
<!-- CONTENT -->
<form action="index.php?option=product&cat=process" method="post" enctype="multipart/form-data">
   <div class="content-wrapper">
      <section class="content-header">
         <div class="container-fluid">
            <div class="row mb-2">
               <div class="col-sm-12">
                  <h1 class="d-inline">Chi tiết sản phẩm</h1>
               </div>
            </div>
         </div>
      </section>
      <!-- Main content -->
      <section class="content">
         <div class="card">
            <div class="card-header text-right">
               <a href="index.php?option=product" class="btn btn-sm btn-info">
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
                              <th>Tên sản phẩm</th>
                              <th>Slug</th>
                              <th>Hình ảnh</th>
                              <th>Mô tả</th>
                           </tr>
                        </thead>
                        <?php if (count($list) > 0): ?>
                           <?php foreach ($list as $product): ?>
                              <tbody>
                                 <tr>
                                    <td>
                                       <?= $product->id; ?>
                                    </td>
                                    <td>
                                       <?= $product->name; ?>
                                    </td>
                                    <td>
                                       <?= $product->slug; ?>
                                    </td>
                                    <td><img width="100px" src="../public/images/product/<?= $product->image; ?>"
                                          alt="<?= $product->image; ?>"></td>
                                    <td>
                                       <?= $product->description; ?>
                                    </td>
                                 </tr>
                              </tbody>
                           <?php endforeach; ?>
                        <?php endif; ?>
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