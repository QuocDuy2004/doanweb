<?php
use App\Models\Contact;


$id = $_REQUEST["id"];
$contact = Contact::find($id);
if ($contact == NULL) {
    header("location:index.php?option=contact");
}

?>

<?php require_once '../views/backend/header.php'; ?>
<!-- CONTENT -->
<form action="index.php?option=contact&cat=process" method="post" enctype="multipart/form-data">
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-12">
                        <h1 class="d-inline">Cập nhập liên hệ</h1>
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
                    <button type="submit" class="btn btn-sm btn-success" name="CAPNHAP">
                        <i class="fa fa-save" aria-hidden="true"></i>
                        Lưu
                    </button>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="mb-3">
                                <input type="hidden" name="id"value="<?=$contact->id; ?>">
                                <label>Tên liên hệ (*)</label>
                                <input type="text" name="name" value="<?= $contact->name; ?>" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label>Số điện thoại: </label>
                                <input type="text" name="phone" value="<?= $contact->phone; ?>" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label>Email: </label>
                                <input type="text" name="email" value="<?= $contact->email; ?>" class="form-control">
                            </div>
                            <label>Mô tả: </label>
                            <textarea name="title" class="form-control"><?= $contact->title; ?></textarea>
                            <div class="mb-3">
                                <label>Trạng thái</label>
                                <select name="status" class="form-control">
                                    <option value="1" <?= ($contact->status == 1) ? 'selected' : ''; ?>>Xuất bản</option>
                                    <option value="2" <?= ($contact->status == 2) ? 'selected' : ''; ?>>Chưa xuất bản</option>
                                </select>
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