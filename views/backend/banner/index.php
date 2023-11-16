<?php
use App\Models\Banner;

$list = Banner::where('status', '!=', 0)->OrderBy('created_at', 'DESC')->get();
?>
<?php require '../views/backend/header.php'; ?>
<!-- CONTENT -->
<form action="index.php?option=banner&cat=process" method="post" enctype="multipart/form-data">
    <div class="content-wrapper">
        <section class="content-header">
            <div class="card-header">
                <div class="row">
                    <div class="col-md-6">
                        <a class="btn btn-danger" href="index.php?option=banner&cat=trash">
                            <i class="fa-solid fa-trash-can"></i> Thùng rác
                        </a>
                    </div>
                    <div class="col-md-6 text-right">
                        <button class="btn btn-sm btn-success" type="submit" name="THEM">
                            <i class="fa fa-save" aria-hidden="true"></i>
                            Lưu
                        </button>
                    </div>
                </div>
            </div>
        </section>
        <!-- Main content -->
        <section class="content">
            <div class="card">
                <div class="card-header">
                <div class="col-md-6">
                <a href="index.php?option=banner_create" class="btn btn-sm btn-info">
                     
                     Thêm slider show
                  </a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th class="text-center" style="width:30px;">
                                        <input type="checkbox">
                                    </th>
                                    <th class="text-center" style="width:130px;">Hình ảnh</th>
                                    <th>Tên banner</th>
                                    <th>Liên kết</th>
                                    <th>Thao tác</th>
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
                                                <img class="w-100" src="../public/images/banner/<?= $item->image ?>"
                                                    alt="<?= $item->image ?>">
                                            </td>
                                            <td>
                                                <div class="name">
                                                    <?= $item->name ?>
                                                </div>
                                            </td>
                                            <td>
                                                <?= $item->link ?>
                                            </td>
                                            <td>
                                                <div class="function_style">
                                                    <?php if ($item->status == 1): ?>
                                                        <a href="index.php?option=banner&cat=status&id=<?= $item->id; ?>">Hiện</a>
                                                    <?php else: ?>
                                                        <a href="index.php?option=banner&cat=status&id=<?= $item->id; ?>">Ẩn</a>
                                                    <?php endif; ?>
                                                    <a href="index.php?option=banner&cat=edit&id=<?= $item->id; ?>">Chỉnh
                                                        sửa</a> |
                                                    <a href="index.php?option=banner&cat=show&id=<?= $item->id; ?>">Chi tiết</a>
                                                    |
                                                    <a href="index.php?option=banner&cat=delete&id=<?= $item->id; ?>">Xoá</a>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                <?php else: ?>
                                    <tr>
                                        <td colspan="5" class="text-center">Không có banner nào.</td>
                                    </tr>
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