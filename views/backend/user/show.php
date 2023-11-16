<?php
use App\Models\User;

$id = $_REQUEST['id'];
$user = User::find($id);

?>

<?php require_once '../views/backend/header.php'; ?>
<!-- CONTENT -->
<form action="index.php?option=user&cat=process" method="post" enctype="multipart/form-data">
   <div class="content-wrapper">
      <section class="content-header">
         <div class="container-fluid">
            <div class="row mb-2">
               <div class="col-sm-12">
                  <h1 class="d-inline">Chi tiết thành viên</h1>
               </div>
            </div>
         </div>
      </section>
      <!-- Main content -->
      <section class="content">
         <div class="card">
            <div class="card-header text-right">
               <a href="index.php?option=user" class="btn btn-sm btn-info">
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
                           <th>Họ tên</th>
                           <th>Điện thoại</th>
                           <th>Email</th>
                           <th>Ảnh</th>
                           <th>Trạng thái</th>
                        </tr>
                     </thead>
                     <tbody>
                        <?php if ($user): ?>
                           <tr>
                              <td><?= $user->id; ?></td>
                              <td><?= $user->name; ?></td>
                              <td><?= $user->phone; ?></td>
                              <td><?= $user->email; ?></td>
                              <td><img width="100px" src="../public/images/user/<?= $user->image; ?>"
                                    alt="<?= $user->image; ?>"></td>
                              <td><?= $user->status; ?></td>
                           </tr>
                        <?php else: ?>
                           <tr>
                              <td colspan="5">Không tìm thấy thành viên</td>
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
