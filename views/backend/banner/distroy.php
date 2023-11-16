<?php 

use App\Models\Banner;

$id= $_REQUEST['id'];
$banner = Banner::find($id);
if($brand == NULL){
    header("location:index.php?option=banner&cat=trash");
}

$brand->delete();
header("location:index.php?option=banner&cat=trash");