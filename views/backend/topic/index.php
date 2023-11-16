<?php
use App\Models\Topic;


$list = Topic::where('status', '!=', 0)->OrderBy('created_at', 'DESC')->get();
#$list = Brand::all();
?>
<?php require '../views/backend/header.php'; ?>

<!-- CONTENT -->
<form action="index.php?option=topic&cat=process" method="post">
   <div class="content-wrapper">
      <section class="content-header">
         <div class="container-fluid">
            <div class="row mb-2">
               <div class="col-sm-12">
                  <h1 class="d-inline">Tất cả chủ đề</h1>
               </div>
            </div>
         </div>
      </section>
      <!-- Main content -->
      <section class="content">
         <div class="card">
            <div class="card-header text-right">
               <button type="submit" class="btn btn-sm btn-success" name="LUU">
                  <i class="fa fa-save" aria-hidden="true"></i>
                  Lưu
               </button>
            </div>
            <div class="card-body">
               <div class="row">
                  <div class="col-md-4">
                     <div class="mb-3">
                        <label>Tên chủ đề (*)</label>
                        <input type="text" name="title" class="form-control">
                  </div>
                  <div class="mb-3">
                     <label>Slug</label>
                     <input type="text" name="slug" class="form-control">
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
                  <table class="table table-bordered">
                     <thead>
                        <tr>
                           <th class="text-center" style="width:30px;">
                              <input type="checkbox">
                           </th>
                           <th>Tên chủ đề</th>
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
                                    <div class="name">
                                       <?= $item->title ?>
                                    </div>
                                    <div class="function_style">
                                       <a href="#">Hiện</a> |
                                       <a href="#">Chỉnh sửa</a> |
                                       <a href="index.php?option=topic_show">Chi tiết</a> |
                                       <a href="#">Xoá</a>
                                    </div>
                                 </td>
                                 <td>
                                    <?= $item->slug ?>
                                 </td>
                              </tr>
                           <?php endforeach; ?>
                        <?php else: ?>
                           <tr>
                              <td colspan="3">Không có dữ liệu sản phẩm.</td>
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
<?php require '../views/backend/footer.php'; ?>