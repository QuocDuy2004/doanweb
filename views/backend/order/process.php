<?php 
use App\Models\Order;

if (isset($_POST['THEM']))
{
    // Kiểm tra xem 'user_id' đã được gửi qua mẫu
    if (isset($_POST['user_id'])) {
        $order = new Order();
        $order->user_id = $_POST['user_id'];
        $order->deliveryname = $_POST['deliveryname'];
        $order->deliveryphone = $_POST['deliveryphone'];
        $order->deliveryemail = $_POST['deliveryemail'];
        $order->deliveryaddress = $_POST['deliveryaddress'];
        $order->note = $_POST['note'];
        
        // Kiểm tra xem biến $_SESSION['user_id'] tồn tại
        if (isset($_SESSION['user_id'])) {
            $order->status = $_SESSION['user_id'];
        } else {
            $order->status = 1; // Hoặc bạn có thể đặt giá trị mặc định khác ở đây
        }
        
        $order->updated_at = date('Y-m-d H:i:s');
        $order->save();
        header("location:index.php?option=order");
    } else {
        echo "Lỗi: user_id không được gửi qua mẫu.";
    }
}




if (isset($_POST['CAPNHAP'])) {
    $order = new Order();

    // Check and set user_id$order->id = isset($_POST['id']) ? $_POST['id'] : null;
    
    $order->user_id = $_POST['user_id'];
    // Check if user_id is null
    if ($order->id === null) {
        // Handle the case where user_id is null (redirect, show an error, etc.)
        echo "Error: User ID is required!";
        exit();
    }

    // Check and set other order details
    $order->deliveryname = isset($_POST['deliveryname']) ? $_POST['deliveryname'] : null;
    $order->deliveryphone = isset($_POST['deliveryphone']) ? $_POST['deliveryphone'] : null;
    $order->deliveryemail = isset($_POST['deliveryemail']) ? $_POST['deliveryemail'] : null;
    $order->deliveryaddress = isset($_POST['deliveryaddress']) ? $_POST['deliveryaddress'] : null;
    $order->note = isset($_POST['note']) ? $_POST['note'] : "Không chú ý"; // Set a default value if note is not provided

    // Set status based on the user session
    $order->status = isset($_SESSION['user_id']) ? $_SESSION['user_id'] : 1;

    // Set timestamps
    $order->updated_at = date('Y-m-d H:i:s');
    $order->save();

    header("location:index.php?option=order");
    } else {
        echo "Lỗi: user_id không được gửi qua mẫu.";
}


