<?php 

use App\Models\Page;

$id= $_REQUEST['id'];
$page = Page::find($id);
if($page == NULL){
    header("location:index.php?option=page&cat=trash");
}
 
$page -> status = 2;
$page -> updated_at = date('Y-m-d H:i:s');
$page -> updated_by = (isset($_SESSION['user_id'])) ? $_SESSION['user_id'] : 1;
$page -> save();
header("location:index.php?option=page&cat=trash");