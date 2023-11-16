<?php
use App\Models\Banner;


$id = $_REQUEST["id"];
$banner = Banner::find($id);
if ($banner == NULL) {
    header("location:index.php?option=banner");
}

?>

<?php require_once '../views/backend/header.php'; ?>
<!-- CONTENT -->
<form action="index.php?option=banner&cat=process" method="post" enctype="multipart/form-data">
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-12">
                        <h1 class="d-inline">Cập nhập banner</h1>
                    </div>
                </div>
            </div>
        </section>
        <!-- Main content -->
        <section class="content">
            <div class="card">
                <div class="card-header text-right">
                    <a href="index.php?option=banner" class="btn btn-sm btn-info">
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
                                <input type="hidden" name="id"value="<?=$banner->id; ?>">
                                <label>Tên banner (*)</label>
                                <input type="text" name="name" value="<?= $banner->name; ?>" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label>Link</label>
                                <input type="text" name="link" value="<?= $banner->link; ?>" class="form-control">
                            </div>
                            <label>Mô tả</label>
                            <textarea name="description" class="form-control"><?= $banner->description; ?></textarea>
                            <div class="mb-3">
                                <label>Hình đại diện</label>
                                <input type="file" name="image" value="<?= $banner->image; ?>" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label>Trạng thái</label>
                                <select name="status" class="form-control">
                                    <option value="1" <?= ($banner->status == 1) ? 'selected' : ''; ?>>Xuất bản</option>
                                    <option value="2" <?= ($banner->status == 2) ? 'selected' : ''; ?>>Chưa xuất bản</option>
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