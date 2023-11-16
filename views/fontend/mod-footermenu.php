<?php
use App\Models\Menu;

$mod_footermenu = Menu::where([['position','=','footermenu'],['status','=',1]])
->orderBy('sort_order', 'ASC')
->get();
?>

<h3 class="widgettilte">
    
    <a href="index.php?option=contact"><strong>Liên hệ</strong><h5 class="author-name uppercase pt-half">
</h5></a>
    
</h3>
<ul class="footer-menu">
<?php foreach ($mod_footermenu as $rowmenu): ?>
    <li><a href="<?php echo $rowmenu->link; ?>"><?= $rowmenu->name; ?></a></li>
    <?php endforeach; ?>
</ul>