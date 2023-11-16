<?php 

use App\Models\Page;

$id= $_REQUEST['id'];
$page = Page::find($id);
if($page == NULL){
    header("location:index.php?option=page&cat=trash");
}

$page->delete();
header("location:index.php?option=page&cat=trash");