<?php
use App\Models\Page;


$list = Page::where('status', '=', 0)->OrderBy('created_at', 'DESC')->get();
#$list = Brand::all();
?>

<?php require_once '../views/backend/header.php'; ?>
<!-- CONTENT -->
<form action="index.php?option=page&cat=process" method="post" enctype="multipart/form-data">
   <div class="content-wrapper">
      <section class="content-header">
         <div class="container-fluid">
            <div class="row mb-2">
               <div class="col-sm-12">
                  <h1 class="d-inline">Thùng rác trang</h1>
               </div>
            </div>
         </div>
      </section>
      <!-- Main content -->
      <section class="content">
         <div class="table-responsive">
            <div class="card">
               <div class="card-header text-right">
                  <a href="index.php?option=page" class="btn btn-sm btn-info">
                     <i class="fa fa-arrow-left" aria-hidden="true"></i>
                     Về danh sách
                  </a>
               </div>
               <div class="card-body">
                  <div class="row">
                     <div class="col-md-12">
                        <table class="table table-bordered">
                           <thead>
                              <tr>
                                 <th class="text-center" style="width:30px;">
                                    <input type="checkbox">
                                 </th>
                                 <th class="text-center" style="width:130px;">Hình ảnh</th>
                                 <th>Tên trang</th>
                                 <th>Tên slug</th>
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
                                          <img width="100px" src="../public/images/page/<?= $item->image; ?>" alt="">
                                       </td>
                                       <td>
                                          <div class="name">
                                             <?= $item->name; ?>
                                          </div>
                                          <div class="function_style">
                                             <a href="index.php?option=page&cat=restore&id=<?= $item->id; ?>">Khôi phục</a> |
                                             <a href="index.php?option=page&cat=distroy&id=<?= $item->id; ?>">Xoá</a>
                                          </div>
                                       </td>
                                       <td>
                                          <?= $item->slug; ?>
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