<?php
use App\Models\Order;


$id = $_REQUEST["id"];
$order = Order::find($id);
if ($order == NULL) {
    header("location:index.php?option=order");
}

?>

<?php require_once '../views/backend/header.php'; ?>
<!-- CONTENT -->
<form action="index.php?option=order&cat=process" method="post" enctype="multipart/form-data">
    <div class="content-wrapper">
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-12">
                        <h1 class="d-inline">Cập nhập đơn hàng</h1>
                    </div>
                </div>
            </div>
        </section>
        <!-- Main content -->
        <section class="content">
            <div class="card">
                <div class="card-header text-right">
                    <a href="index.php?option=order" class="btn btn-sm btn-info">
                        <i class="fa fa-arrow-left" aria-hidden="true"></i>
                        Về danh sách
                    </a>
                    <button type="submit" class="btn btn-sm btn-success" name="CAPNHAP">
                        <i class="fa fa-save" aria-hidden="true"></i>
                        Lưu
                    </button>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <label>ID người dùng (*)</label>
                                    <input type="text" name="id" value="<?= $order->id; ?>" class="form-control">
                                </div>
                                <div class="mb-3">
                                    <label>Tên đơn hàng (*)</label>
                                    <input type="text" name="deliveryname" value="<?= $order->deliveryname; ?>"
                                        class="form-control">
                                </div>
                                <div class="mb-3">
                                    <label>Điện thoại người giao</label>
                                    <input type="phone" name="deliveryphone" value="<?= $order->deliveryphone; ?>"
                                        class="form-control">
                                </div>
                                <div class="mb-3">
                                    <label>Email người giao</label>
                                    <input type="email" name="deliveryemail" value="<?= $order->deliveryphone; ?>"
                                        class="form-control">
                                </div>
                                <div class="mb-3">
                                    <label>Địa chỉ người giao</label>
                                    <input type="text" name="deliveryaddress" value="<?= $order->deliveryaddress; ?>"
                                        class="form-control">
                                </div>
                                <div class="mb-3">
                                    <label>Ghi chú</label>
                                    <input type="text" name="note" value="<?= $order->note; ?>" class="form-control">
                                </div>
                                <div class="mb-3">
                                    <label>Trạng thái</label>
                                    <select name="status" class="form-control">
                                        <option value="1" <?= ($order->status == 1) ? 'selected' : ''; ?>>Xuất bản</option>
                                        <option value="2" <?= ($order->status == 2) ? 'selected' : ''; ?>>Chưa xuất bản
                                        </option>
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
<?php require '../views/backend/footer.php'; ?>