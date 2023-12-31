<?php
use App\Models\Config;


$list = Config::where('status', '!=', 0)->OrderBy('created_at', 'DESC')->get();
#$list = Config::all();
?>

<?php require '../views/backend/header.php'; ?>

<!-- CONTENT -->
<form action="index.php?option=config&cat=process" method="post">
   <div class="content-wrapper">
      <section class="content-header">
         <div class="container-fluid">
            <div class="row mb-2">
               <div class="col-sm-12">
                  <h1 class="d-inline">Cấu hình</h1>
               </div>
            </div>
         </div>
      </section>
      <!-- Main content -->
      <section class="content">
         <div class="card">
            <div class="card-header p-2">
               Noi dung
            </div>
            <div class="card-body">
               <div class="table-responsive">
                  <table class="table table-bordered">
                     <thead>
                        <tr>
                           <th class="text-center" style="width:30px;">
                              <input type="checkbox">
                           </th>
                           <th>Tên cấu hình</th>
                           <th>Giá trị</th>
                           <th></th>
                        </tr>
                     </thead>
                     <tbody>
                        <?php if (count($list) > 0): ?>
                           <?php foreach ($list as $item): ?>
                              <tr>
                                 <td>#</td>
                                 <td>
                                    <input type="text" name="name" class="form-control" placeholder="Nhập tên cấu hình">
                                 </td>
                                 <td>
                                    <input type="text" name="value" class="form-control" placeholder="Nhập giá trị">
                                 </td>
                                 <td class="text-center">
                                    <button type="submit" name="THEM" class="btn btn-sm btn-success">Thêm</button>
                                 </td>
                              </tr>
                              <tr>
                                 <td>
                                    <input type="checkbox">
                                 </td>
                                 <td>
                                    <?= $item->name ?>
                                 </td>
                                 <td>
                                    <?= $item->value ?>
                                 </td>
                                 <td class="text-center">
                                    <a href="#" class="btn btn-sm btn-danger">
                                       <i class="fa fa-trash" aria-hidden="true"></i>
                                    </a>
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