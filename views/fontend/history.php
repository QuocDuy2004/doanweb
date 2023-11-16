<?php
use App\Models\Order;
use App\Models\Product;

$list = Order::where('status', '!=', 0)->OrderBy('created_at', 'DESC')->get();
$lis_product = Product::where('status', '!=', 0)->OrderBy('created_a', 'DESC')->get();
?>

<?php require_once "views/fontend/header.php" ?>

<section class="hdl-maincontent py-2">
    <div class="container">
        <div class="table-responsive">
            <div class="row">
                <h1 class="fs-2 text-main">Đơn hàng đã mua</h1>
                <table class="table table-bordered table-hover no-footer text-nowrap">
                    <thead>
                        <tr role="row" class="bg-primary">
                            <th class="text-center">ID</th>
                            <th class="text-center">Tên khách hàng</th>
                            <th class="text-center">Tên sản phẩm</th>
                            <th class="text-center">Điện thoại</th>
                            <th class="text-center">Email</th>
                            <th class="text-center">Địa chỉ giao hàng</th>
                            <th class="text-center">Ghi chú</th>
                            <th class="text-center">Ngày mua</th>
                            <th class="text-center">Cập nhập ngày mua</th>
                            <th class="text-center">Cập nhập ngày nhận</th>
                            <th class="text-center">Trạng thái</th>
                        </tr>
                    </thead>
                    <tbody role="alert" aria-live="polite" aria-relevant="all">
                        <?php foreach ($list as $order): ?>
                            <?php foreach ($list_product as $product): ?>
                            <tr>
                                <td><?= $order->id; ?></td>
                                <td><?= $order->deliveryname; ?></td>
                                <td><?= $product->name; ?></td>
                                <td><?= $order->deliveryphone; ?></td>
                                <td><?= $order->deliveryemail; ?></td>
                                <td><?= $order->deliveryaddress; ?></td>
                                <td><?= $order->note; ?></td>
                                <td><?= $order->created_at; ?></td>
                                <td><?= $order->updated_at; ?></td>
                                <td><?= $product->updated_by; ?></td>
                                <td><?= $order->status; ?></td>
                            </tr>
                        <?php endforeach; ?>
                        <?php endforeach; ?>

                        <!-- Nếu không có dữ liệu để hiển thị -->
                        <?php if (empty($list)): ?>
                            <tr class="odd">
                                <td valign="top" colspan="11">
                                    <center>
                                        <img src="" alt="" width="80" height="80" class="pt-3">
                                        <p class="pt-3">Không có dữ liệu để hiển thị</p>
                                    </center>
                                </td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</section>

<?php require_once "views/fontend/footer.php" ?>
