<?php 

use App\Models\Page;

$id= $_REQUEST['id'];
$page = Page::find($id);
if($page == NULL){
    header("location:index.php?option=page");
}

$page -> status = 0;
$page -> updated_at = date('Y-m-d H:i:s');
$page -> updated_by = (isset($_SESSION['user_id'])) ? $_SESSION['user_id'] : $_SESSION['user_id'];
$page -> save();
header("location:index.php?option=page");