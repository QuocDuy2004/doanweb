<?php 

use App\Models\User;

$id= $_REQUEST['id'];
$user = User::find($id);
if($user == NULL){
    header("location:index.php?option=user");
}

$user -> status = 0;
$user -> updated_at = date('Y-m-d H:i:s');
$user -> updated_by = (isset($_SESSION['user_id'])) ? $_SESSION['user_id'] : $_SESSION['user_id'];
$user -> save();
header("location:index.php?option=user");