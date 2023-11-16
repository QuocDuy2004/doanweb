<?php
use App\Models\Contact;


$list = Contact::where('status', '!=', 0)->OrderBy('created_at', 'DESC')->get();
#$list = Brand::all();
?>
<?php require '../views/backend/header.php'; ?>

<!-- CONTENT -->
<form action="index.php?option=contact&cat=process" method="post">
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-12">
                        <h1 class="d-inline">Thêm thông tin liên hệ</h1>
                    </div>
                </div>
            </div>
        </section>
        <section class="content">
            <div class="card">
                <div class="card-header text-right">
                    <a href="index.php?option=contact" class="btn btn-sm btn-info">
                        <i class="fa fa-arrow-left" aria-hidden="true"></i>
                        Về trang trước
                    </a>
                    <button class="btn btn-sm btn-success" type="submit" name="THEM">
                        <i class="fa fa-save" aria-hidden="true"></i>
                        Lưu thông tin
                    </button>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-9">
                            <div class="mb-3">
                                <label>Họ và tên</label>
                                <input type="text" name="name" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label>Điện thoại</label>
                                <input type="phone" name="phone" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label>Email</label>
                                <input type="email" name="email" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label>Tiêu đề</label>
                                <input type="text" name="title" class="form-control">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</form>
<!-- END CONTENT-->
<?php require '../views/backend/footer.php'; ?>