<?php
use App\Models\Menu;
use App\Models\Category;
use App\Models\Brand;
use App\Models\Post;
use App\Models\Topic;
use App\Models\Page;
?>
<?php require_once '../views/backend/header.php';?>

<!-- CONTENT -->
<form action ="index.php?option=menu&cat=process" method="post" enctype="multipart/form-data">
      <div class="content-wrapper">
         <section class="content-header">
            <div class="container-fluid">
               <div class="row mb-2">
                  <div class="col-sm-12">
                     <h1 class="d-inline">Thêm Menu</h1>
                  </div>
               </div>
            </div>
         </section>
         <!-- Main content -->
         <section class="content">
         <div class="card">
            <div class="card-header">
               <div class="row">
                  <div class="col-md-6">
                     <a href="index.php?option=menu" class="btn btn-sm btn-info mr-3 text-left">
                        <i class="fa fa-arrow-left" aria-hidden="true"></i>
                        Về danh sách
                     </a>
                  </div>
                  <div class="col-md-6 text-right">
                     <button class="btn btn-sm btn-success" type="submit" name="THEM">
                        <i class="fa fa-save" aria-hidden="true"></i>
                        Thêm
                     </button>
                  </div>
               </div>
            </div>
               <div class="card-body">
                     <div class="row">
                     <div class="card-body">
                  <div class="row">
                     <div class="col-md-12">
                        <div class="mb-3">
                           <label>Tên menu (*)</label>
                           <input type="text" name="name" class="form-control">
                        </div>
                        <div class="mb-3">
                           <label>Liên kết</label>
                           <input type="text" name="link" class="form-control">
                        </div>
                        <div class="mb-3">
                           <label>Kiểu</label>
                           <select name="type" class="form-control">
                              <option value=""> </option>
                              <option value="">category</option>
                              <option value="">brand</option>
                              <option value="">post</option>
                              <option value="">topic</option>
                              <option value="">page</option>
                           </select>
                        </div>
                        <div class="mb-3">
                           <label>Vị trí Menu</label>
                              <select name="position" class="form-control">
                                 <option value="mainmenu">Main Menu</option>
                                 <option value="footermenu">Footer Menu</option>
                              </select>
                           </div>
                        <div class="mb-3">
                           <label>Cha</label>
                           <input type="text" name="parent_id" class="form-control">
                        </div>
                        <div class="mb-3">
                           <label>level</label>
                           <input type="text" name="level" class="form-control">
                        </div>
                        <div class="mb-3">
                           <label>Trạng thái</label>
                           <select name="status" class="form-control">
                              <option value="1" >Xuất bản</option>
                              <option value="2" >Chưa xuất bản</option>
                           </select>
                        </div>
                     </div>
                   </div>
               </div>
            </div>
            </div>
         </section>
      </div>
</form>
      <!-- END CONTENT-->
      <?php require_once '../views/backend/footer.php';?>