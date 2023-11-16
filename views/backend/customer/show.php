<?php
use App\Models\Customer;


$list = Customer::where('status', '=', 0)->OrderBy('created_at', 'DESC')->get();
#$list = Brand::all();
?>

<?php require_once '../views/backend/header.php'; ?>
<!-- CONTENT -->
<form action="index.php?option=customer&cat=process" method="post" enctype="multipart/form-data">
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
               <a href="index.php?option=customer" class="btn btn-sm btn-info">
                  <i class="fa fa-arrow-left" aria-hidden="true"></i>
                  Về danh sách
               </a>
            </div>
         </div>
         <div class="card-body">
            <div class="row">
               <div class="col-md-12">
                  <table class="table table-bordered">
                     <thead>
                        <tr>
                           <th>ID</th>
                           <th>Tên tên trường</th>
                           <th>Giá trị</th>
                           <th>Ảnh</th>
                           <th>Trạng thái</th>
                        </tr>
                     </thead>
                     <?php if (count($list) > 0): ?>
                        <?php foreach ($list as $customer): ?>
                           <tbody>
                              <tr>
                                 <td>
                                    <?= $customer->id; ?>
                                 </td>
                                 <td>
                                    <?= $customer->name; ?>
                                 </td>
                                 <td>
                                    <?= $customer->slug; ?>
                                 </td>
                                 <td><img width="100px" src="../public/images/customer/<?= $customer->image; ?>"
                                       alt="<?= $customer->image; ?>"></td>
                                 <td>
                                    <?= $customer->status; ?>
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
   </section>
   </div>
</form>
<!-- END CONTENT-->
<?php require_once '../views/backend/footer.php'; ?>