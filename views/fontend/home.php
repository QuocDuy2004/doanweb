<?php 
use App\Models\Category;

$list_category = Category::where([['parent_id','=',0],['status', '=' , 1]])->orderBy('sort_order','ASC')
->select('name','slug','id','image')->get();
?>

<?php require_once "views/fontend/header.php"; ?>
<?php require_once "views/fontend/mod-slider.php"; ?>

<section class="hdl-maincontent">
   <div class="container">
      <?php foreach ($list_category as $cat):  ?>
         <?php require "views/fontend/product-list-home.php" ?> 
      <?php endforeach; ?>
   </div>
</section>

<?php require_once "views/fontend/mod-lastpost.php"; ?>
<?php require_once "views/fontend/footer.php" ?>