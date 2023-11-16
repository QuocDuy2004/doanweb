<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Orderdetail extends Model
{
    protected $table = 'orderdetail';
    public $timestamps = false;

    // Thêm phương thức sale() nếu cần
    public function sale()
    {
        // Định nghĩa logic của phương thức sale() nếu cần
        // Ví dụ: Lưu thông tin vào cơ sở dữ liệu
        $this->save();

        // Hoặc thực hiện bất kỳ xử lý nào khác tùy thuộc vào yêu cầu của bạn
    }
}
