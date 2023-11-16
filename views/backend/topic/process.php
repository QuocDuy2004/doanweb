<?php
use App\Models\Topic;

if (isset($_POST['LUU'])) {
    $topic = new Topic();

    $topic->title = $_POST['title'];
    $topic->slug = (strlen($_POST['slug']) > 0) ? $_POST['slug'] : "xlsau";
   
   
    $topic->created_at = (isset($_SESSION['user_id'])) ? $_SESSION['user_id'] : 1;
    
    $topic->save();

    header("location:index.php?option=topic");
}
?>
    