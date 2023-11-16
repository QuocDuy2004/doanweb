<?php

if (isset($_REQUEST['addcart'])) {
   require_once 'views/fontend/cart-addcart.php';
} else {
   if (isset($_REQUEST['updatecart'])) {
      require_once 'views/fontend/cart-updatecart.php';
   } else {
      if (isset($_REQUEST['deletecart'])) {
         require_once 'views/fontend/cart-deletecart.php';
      } else {
         require_once 'views/fontend/cart-content.php';
      }
   }
}

