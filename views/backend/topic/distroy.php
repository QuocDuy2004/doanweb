<?php 

use App\Models\Topic;

$id= $_REQUEST['id'];
$topic = Topic::find($id);
if($topic == NULL){
    header("location:index.php?option=topic&cat=trash");
}

$topic->delete();
header("location:index.php?option=topic&cat=trash");