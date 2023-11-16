<?php 
use App\Models\Post;


if (isset($_POST['CHANGEADD']))
{
    $post= new Post();
    $post->title = $_POST['title'];
    $post->slug = $_POST['slug'];
    $post->detail = $_POST['detail'];
    $post->topic_id = $_POST['topic_id'];
    $image = $_POST['image'];
    if (!empty($image)) {
        $post->image = $image;
    } else {
        $post->image = 'http://clipart-library.com/data_images/474639.png';
    }
    $post->created_at = date('Y-m-d H:i:s');
    $post->created_at = (isset($_SESSION['user_id'])) ? $_SESSION['user_id'] : 1;

    $post->save();

    header("location:index.php?option=post");
    

    /*$post->type = $_POST['type'];
    $post->description = $_POST['description'];
    $post->created_at = $_POST['created_at'];
    $post->created_by = $_POST['created_by'];
    $post->updated_at = date('Y-m-d H:i:s');
    $post->updated_by = $_POST['updated_by'];
    $post->status = (isset($_SESSION['user_id'])) ? $_SESSION['user_id']:1;
    var_dump($post);
    $post -> save();
    header("location:index.php?option=post");  */
}

if (isset($_POST['CAPNHAP']))
{
    if(isset($_REQUEST['CAPNHAP']) != Null){
        echo "Update không thành công";
    }
    $post= new Post();
    $post->title = $_POST['title'];
    $post->slug = $_POST['slug'];
    $post->detail = $_POST['detail'];
    $post->topic_id = $_POST['topic_id'];
    $image = $_POST['image'];
    if (!empty($image)) {
        $post->image = $image;
    } else {
        $post->image = 'http://clipart-library.com/data_images/474639.png';
    }
    $post->created_at = date('Y-m-d H:i:s');
    $post->created_at = (isset($_SESSION['user_id'])) ? $_SESSION['user_id'] : 1;

    $post->save();
    
    header("location:index.php?option=post");
}