<?php
use App\Libraries\Cart;
use App\Models\User;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Config;
use Carbon\Carbon;

$customer = User::where([['status', '=', 1], ['id', '=', $_SESSION['user_id']]])->first();
$config = Config::where('status', '!=', 0)->OrderBy('created_at', 'DESC')->get();
$config = Config::where('status', '!=', 0)->OrderBy('created_at', 'DESC')->get();

$listcart = Cart::cartContent();

if (isset($_POST['XACNHAN']) && count($listcart) > 0) {
    $order = new Order();
    $order->user_id = $_SESSION['user_id'];
    $order->deliveryname = $customer->name;
    $order->deliveryphone = $customer->phone;
    $order->deliveryemail = $customer->email;
    $address = $_POST['deliveryaddress'];
    $order->deliveryaddress = $address; // Cập nhật địa chỉ từ form
    $order->note = "Không chú ý";
    $order->created_at = Carbon::now('Asia/Ho_Chi_Minh')->toDateTimeString();
    $order->updated_at = Carbon::now('Asia/Ho_Chi_Minh')->toDateTimeString();
    $order->status = 1;

    if ($order->save()) {
        // Lưu chi tiết đơn hàng vào cơ sở dữ liệu
        foreach ($listcart as $cart) {
            $orderdetail = new OrderDetail();
            $orderdetail->order_id = $order->id;
            $orderdetail->product_id = $cart['id'];
            $orderdetail->price = $cart['price'];
            $orderdetail->qty = $cart['qty'];
            $orderdetail->amount = $cart['price'] * $cart['qty'];
            $orderdetail->sale();
        }
        unset($_SESSION['cart']);
        echo '<script>alert("Thanh toán thành công!"); window.location.href = "index.php?option=checkout";</script>';
        header("Refresh: 2; URL=index.php?option=checkout");
    }
}
?>


<?php require_once "views/fontend/header.php" ?>

<section class="hdl-maincontent py-2">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <form action="index.php?option=checkout" method="post">
                    <h2 class="fs-5 text-main">Thông tin giao hàng</h2>

                    <?php if (isset($_SESSION['user_id'])): ?>
                    <?php else: ?>
                        <p>Bạn có tài khoản chưa? <a href="index.php?option=customer-login">Đăng nhập</a></p>
                    <?php endif; ?>
                    <?php if (isset($_SESSION["iscustom"])): ?>

                        <div class="mb-3">
                            <label for="name">Họ tên</label>
                            <input type="text" name="name" id="name"
                                value="<?= $customer->name ?? 'Không có dữ liệu name'; ?>" class="form-control"
                                placeholder="" readonly>
                        </div>
                        <div class="mb-3">
                            <label for="phone">Điện thoại</label>
                            <input type="text" name="phone" id="phone"
                                value="<?= $customer->phone ?? 'Không có dữ liệu phone'; ?>" class="form-control"
                                placeholder="" readonly>
                        </div>
                        <div class="mb-3">
                            <label for="email">Email</label>
                            <input type="text" name="email" id="email"
                                value="<?= $customer->email ?? 'Không có dữ liệu email'; ?>" class="form-control"
                                placeholder="" readonly>
                        </div>
                        <div class="card">
                            <div class="card-header text-main">
                                Địa chỉ nhận hàng
                            </div>
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="mb-3">
                                            <input type="text" name="deliveryaddress" id="deliveryaddress"
                                                class="form-control" value="<?= $customer->address ?? 'Không có dữ liệu phone'; ?>" placeholder="">
                                        </div>
                                        <div class="row">
                                            <div class="col-4">
                                                <select id="city" class="form-control">
                                                    <option value="">Chọn tỉnh/thành phố</option>
                                                    <!-- Thêm các option cho tỉnh/thành phố -->
                                                </select>
                                            </div>
                                            <div class="col-4">
                                                <select id="district" class="form-control">
                                                    <option value="">Chọn quận/huyện</option>
                                                    <!-- Thêm các option cho quận/huyện -->
                                                </select>
                                            </div>
                                            <div class="col-4">
                                                <select id="ward" class="form-control">
                                                    <option value="">Chọn xã/phường</option>
                                                    <!-- Thêm các option cho xã/phường -->
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <h4 class="fs-6 text-main mt-4">Phương thức thanh toán</h4>
                        <div class="thanhtoan mb-4">
                            <div class="p-4 border">
                                <input name="typecheckout" onchange="showbankinfo(this.value)" type="radio" value="1"
                                    id="check1" />
                                <label for="check1">Thanh toán khi giao hàng</label>
                            </div>
                            <div class="p-4 border">
                                <input name="typecheckout" onchange="showbankinfo(this.value)" type="radio" value="2"
                                    id="check2" />
                                <label for="check2">Chuyển khoản qua ngân hàng</label>
                            </div>
                            <div class="p-4 border bankinfo">
                                <p>Ngân Hàng
                                    <?= $customer->bank ?? 'Không có dữ liệu ngân hàng'; ?>
                                </p>
                                <p>STK:
                                    <?= $customer->number_bank ?? 'Không có dữ liệu số tài khoản'; ?>
                                </p>
                                <p>Chủ tài khoản:
                                    <?= $customer->name_bank ?? 'Không có dữ liệu tên tài khoản'; ?>
                                </p>
                            </div>
                        </div>
                        <div class="text-end">
                            <button type="submit" name="XACNHAN" class="btn btn-main px-4">XÁC NHẬN</button>
                        </div>
                    <?php endif; ?>
                </form>
            </div>
            <script>
                function showbankinfo(value) {
                    var elementbank = document.querySelector(".bankinfo");
                    if (value == 1) {
                        elementbank.style.display = "none";
                    }
                    else {
                        elementbank.style.display = "block";
                    }
                }
            </script>
            <div class="col-md-6">
                <h2 class="fs-5 text-main">Thông tin đơn hàng</h2>
                <table class="table table-borderless">
                    <thead>
                        <tr class="bg-dark">
                            <th style="width:30px;" class="text-center">STT</th>
                            <th style="width:100px;">Hình</th>
                            <th>Tên sản phẩm</th>
                            <th class="text-center">Giá</th>
                            <th style="width:130px" class='text-center'>Số lượng</th>
                            <th style="width:130px" class="text-center">Thành tiền</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $stt = 1; ?>
                        <?php foreach ($listcart as $item): ?>
                            <?php $money = $item['price'] * $item['qty']; ?>
                            <tr>
                                <td class="text-center align-middle">
                                    <?= $stt; ?>
                                </td>
                                <td>
                                    <img class="img-fluid" src="public/images/product/<?= $item['image']; ?>"
                                        alt="<?= $item['image']; ?>">
                                </td>
                                <td class="align-middle">
                                    <?= $item['name']; ?>
                                </td>
                                <td class="text-center align-middle">
                                    <?= number_format($item['price']); ?>
                                </td>
                                <td class="text-center align-middle">
                                    <?= $item['qty']; ?>
                                </td>
                                <td class="text-center align-middle">
                                    <?= number_format($money); ?>
                                </td>
                            </tr>
                            <?php $stt++; ?>
                        <?php endforeach; ?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="6" class="text-end">
                                <strong>Tổng:
                                    <?= number_format(Cart::cartTotal()); ?>
                                </strong>
                            </td>
                        </tr>
                    </tfoot>
                </table>
                <div class="input-group mb-3">
                    <input type="text" id="sale" name="sale" class="form-control" placeholder="Mã giảm giá"
                        aria-describedby="basic-addon2">
                    <button id="applyDiscount" class="btn btn-primary">Sử dụng</button>
                </div>

                <table class="table table-borderless">
                    <tr>
                        <th>Tạm tính</th>
                        <td class="text-end">
                            <?= number_format(Cart::cartTotal()); ?>
                        </td>
                    </tr>
                    <tr>
                        <th>Phí vận chuyển</th>
                        <td class="text-end">0</td>
                    </tr>
                    <tr>
                        <th>Giảm giá</th>
                        <td class="text-end" id="discountedAmount">
                            <?= number_format(Cart::cartTotal()); ?>
                        </td>
                    </tr>
                    <tr>
                        <th>Tổng cộng</th>
                        <td class="text-end" id="finalTotal">
                            <?= number_format(Cart::cartTotal()); ?>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</section>
<script>
    document.getElementById('applyDiscount').addEventListener('click', function () {
    var discountCode = document.getElementById('sale').value.trim().toLowerCase();
    var configSales = <?= json_encode($config->pluck('sale')->toArray()); ?>; 

    
    if (configSales.includes(discountCode)) {
        var cartTotal = parseFloat('<?= Cart::cartTotal(); ?>');
        var discountedTotal = cartTotal - (cartTotal * 0.1); 
        var discountAmount = cartTotal - discountedTotal; 

        document.getElementById('discountedAmount').innerText = discountAmount.toFixed(2);
        document.getElementById('finalTotal').innerText = discountedTotal.toFixed(2);
    } else {
        alert('Mã giảm giá không hợp lệ');
    }
});

</script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/axios/0.21.1/axios.min.js"></script>
<script>
    var citis = document.getElementById("city");
    var districts = document.getElementById("district");
    var wards = document.getElementById("ward");
    var Parameter = {
        url: "index.php?option=address",
        method: "GET",
        responseType: "application/json",
    };
    var promise = axios(Parameter);
    promise.then(function (result) {
        renderCity(result.data);
    });

    function renderCity(data) {
        for (const x of data) {
            var opt = document.createElement('option');
            opt.value = x.Name;
            opt.text = x.Name;
            opt.setAttribute('data-id', x.Id);
            citis.options.add(opt);
        }
        citis.onchange = function () {
            district.length = 1;
            ward.length = 1;
            if (this.options[this.selectedIndex].dataset.id != "") {
                const result = data.filter(n => n.Id === this.options[this.selectedIndex].dataset.id);

                for (const k of result[0].Districts) {
                    var opt = document.createElement('option');
                    opt.value = k.Name;
                    opt.text = k.Name;
                    opt.setAttribute('data-id', k.Id);
                    district.options.add(opt);
                }
            }
        };
        district.onchange = function () {
            ward.length = 1;
            const dataCity = data.filter((n) => n.Id === citis.options[citis.selectedIndex].dataset.id);
            if (this.options[this.selectedIndex].dataset.id != "") {
                const dataWards = dataCity[0].Districts.filter(n => n.Id === this.options[this.selectedIndex].dataset.id)[0].Wards;

                for (const w of dataWards) {
                    var opt = document.createElement('option');
                    opt.value = w.Name;
                    opt.text = w.Name;
                    opt.setAttribute('data-id', w.Id);
                    wards.options.add(opt);
                }
            }
        };
    }

</script>

<?php require_once "views/fontend/footer.php" ?>