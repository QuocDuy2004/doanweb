<?php 

use App\Models\Post;

$id= $_REQUEST['id'];
$post = Post::find($id);
if($post == NULL){
    header("location:index.php?option=post");
}

$post -> status = 0;
$post -> updated_at = date('Y-m-d H:i:s');
$post -> updated_by = (isset($_SESSION['user_id'])) ? $_SESSION['user_id'] : $_SESSION['user_id'];
$post -> save();
header("location:index.php?option=post");