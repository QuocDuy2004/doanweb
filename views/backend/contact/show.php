<?php

use App\Models\Contact;

$id = $_REQUEST['id'];
$contact = Contact::find($id);

?>

<?php require_once '../views/backend/header.php'; ?>
<!-- CONTENT -->
<form action="index.php?option=contact&cat=process" method="post" enctype="multipart/form-data">
   <div class="content-wrapper">
      <section class="content-header">
         <div class="container-fluid">
            <div class="row mb-2">
               <div class="col-sm-12">
                  <h1 class="d-inline">Chi tiết liên hệ</h1>
               </div>
            </div>
         </div>
      </section>
      <!-- Main content -->
      <section class="content">
         <div class="card">
            <div class="card-header text-right">
               <a href="index.php?option=contact" class="btn btn-sm btn-info">
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
                              <th>Tiêu đề</th>
                              <th>Trạng thái</th>
                           </tr>
                        </thead>
                        <tbody>
                           <?php if (!is_null($contact)): ?>
                              <tr>
                                 <td>
                                    <?= $contact->id; ?>
                                 </td>
                                 <td>
                                    <?= $contact->name; ?>
                                 </td>
                                 <td>
                                    <?= $contact->phone; ?>
                                 </td>
                                 <td>
                                    <?= $contact->email; ?>
                                 </td>
                                 <td>
                                    <?= $contact->detail; ?>
                                 </td>
                                 <td>
                                    <?= $contact->status; ?>
                                 </td>
                              </tr>
                           <?php else: ?>
                              <tr>
                                 <td colspan="6">Không có dữ liệu để hiển thị.</td>
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