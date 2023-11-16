<?php 

require_once "views/fontend/header.php"?>
   <section class="bg-light">
      <div class="container">
         <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
            <ol class="breadcrumb py-2 my-0">
               <li class="breadcrumb-item">
                  <a class="text-main" href="index.php">Trang chủ</a>
               </li>
               <li class="breadcrumb-item active" aria-current="page">
                  Tin tức
               </li>
            </ol>
         </nav>
      </div>
   </section>
   <section class="hdl-maincontent py-2">
      <div class="container">
         <div class="row">
            <div class="col-md-3 order-2 order-md-1">
               <ul class="list-group mb-3 list-category">
                  <li class="list-group-item bg-main py-3">Danh mục sản phẩm</li>
                  <li class="list-group-item">
                     <a href="product_category.php">Thời trang nam</a>
                  </li>
                  <li class="list-group-item">
                     <a href="product_category.php">Thời trang nữ</a>
                  </li>
                  <li class="list-group-item">
                     <a href="product_category.php">Thời trang trẻ em</a>
                  </li>
                  <li class="list-group-item">
                     <a href="product_category.php">Thời trang thể thao</a>
                  </li>
               </ul>
               <ul class="list-group mb-3 list-brand">
                  <li class="list-group-item bg-main py-3">Thương hiệu</li>
                  <li class="list-group-item">
                     <a href="product_brand.php">Việt Nam</a>
                  </li>
                  <li class="list-group-item">
                     <a href="product_brand.php">Hàn Quốc</a>
                  </li>
                  <li class="list-group-item">
                     <a href="product_brand.php">Thái Lan</a>
                  </li>
                  <li class="list-group-item">
                     <a href="product_brand.php">Quản Châu</a>
                  </li>
               </ul>
               <ul class="list-group mb-3 list-product-new">
                  <li class="list-group-item bg-main py-3">Sản phẩm mới</li>
                  <li class="list-group-item">
                     <div class="product-item border">
                        <div class="product-item-image">
                           <a href="product_detail.php">
                              <img src="../public/images/product/thoi-trang-the-thao-1.webp" class="img-fluid" alt="">
                           </a>
                        </div>
                        <h2 class="product-item-name text-main text-center fs-5 py-1">
                           <a href="product_detail.php">Thời trang thể thao 1</a>
                        </h2>
                        <h3 class="product-item-price fs-6 p-2 d-flex">
                           <div class="flex-fill"><del>200.000đ</del></div>
                           <div class="flex-fill text-end text-main">190.000đ</div>
                        </h3>
                     </div>
                  </li>
                  <li class="list-group-item">
                     <div class="product-item border">
                        <div class="product-item-image">
                           <a href="product_detail.php">
                              <img src="../public/images/product/thoi-trang-the-thao-2.webp" class="img-fluid" alt="">
                           </a>
                        </div>
                        <h2 class="product-item-name text-main text-center fs-5 py-1">
                           <a href="product_detail.php">Thời trang thể thao 2</a>
                        </h2>
                        <h3 class="product-item-price fs-6 p-2 d-flex">
                           <div class="flex-fill"><del>200.000đ</del></div>
                           <div class="flex-fill text-end text-main">190.000đ</div>
                        </h3>
                     </div>
                  </li>
                  <li class="list-group-item">
                     <div class="product-item border">
                        <div class="product-item-image">
                           <a href="product_detail.php">
                              <img src="../public/images/product/thoi-trang-the-thao-1.webp" class="img-fluid" alt="">
                           </a>
                        </div>
                        <h2 class="product-item-name text-main text-center fs-5 py-1">
                           <a href="product_detail.php">Thời trang thể thao 3</a>
                        </h2>
                        <h3 class="product-item-price fs-6 p-2 d-flex">
                           <div class="flex-fill"><del>200.000đ</del></div>
                           <div class="flex-fill text-end text-main">190.000đ</div>
                        </h3>
                     </div>
                  </li>
               </ul>
            </div>
            <div class="col-md-9 order-1 order-md-2">
               <div class="post-topic-title bg-main">
                  <h3 class="fs-5 py-3 text-center">TIN TỨC</h3>
               </div>
               <div class="post-topic mt-3">
                  <div class="row post-item mb-4">
                     <div class="col-4 col-md-4">
                        <div class="post-item-image">
                           <a href="post_detail.php">
                              <img src="../public/images/post/post-4.webp" class="img-fluid" alt="">
                           </a>
                        </div>
                     </div>
                     <div class="col-8 col-md-8">
                        <h2 class="post-item-title fs-5 py-1">
                           <a href="post_detail.php">
                              Video provides a powerful way to help you prove your point 1
                           </a>
                        </h2>
                        <p>Video provides a powerful way to help you prove your point. When you click Online Video, you
                           can paste in the embed code for the video you want to add Video provides a powerful way to
                           help you prove your point. When you click Online Video, you can paste in the embed code for
                           the video you want to add</p>
                     </div>
                  </div>
                  <div class="row post-item mb-4">
                     <div class="col-4 col-md-4">
                        <div class="post-item-image">
                           <a href="post_detail.php">
                              <img src="../public/images/post/post-2.jpg" class="img-fluid" alt="">
                           </a>
                        </div>
                     </div>
                     <div class="col-8 col-md-8">
                        <h2 class="post-item-title text-main fs-5 py-1">
                           <a href="post_detail.php">
                              Video provides a powerful way to help you prove your point 2
                           </a>
                        </h2>
                        <p>Video provides a powerful way to help you prove your point. When you click Online Video, you
                           can paste in the embed code for the video you want to add Video provides a powerful way to
                           help you prove your point. When you click Online Video, you can paste in the embed code for
                           the video you want to add</p>
                     </div>
                  </div>
                  <div class="row post-item mb-4">
                     <div class="col-4 col-md-4">
                        <div class="post-item-image">
                           <a href="post_detail.php">
                              <img src="../public/images/post/post-1.jpg" class="img-fluid" alt="">
                           </a>
                        </div>
                     </div>
                     <div class="col-8 col-md-8">
                        <h2 class="post-item-title text-main fs-5 py-1">
                           <a href="post_detail.php">
                              Video provides a powerful way to help you prove your point 2
                           </a>
                        </h2>
                        <p>Video provides a powerful way to help you prove your point. When you click Online Video, you
                           can paste in the embed code for the video you want to add Video provides a powerful way to
                           help you prove your point. When you click Online Video, you can paste in the embed code for
                           the video you want to add</p>
                     </div>
                  </div>
                  <div class="row post-item mb-4">
                     <div class="col-4 col-md-4">
                        <div class="post-item-image">
                           <a href="post_detail.php">
                              <img src="../public/images/post/post-2.jpg" class="img-fluid" alt="">
                           </a>
                        </div>
                     </div>
                     <div class="col-8 col-md-8">
                        <h2 class="post-item-title text-main fs-5 py-1">
                           <a href="post_detail.php">
                              Video provides a powerful way to help you prove your point 22
                           </a>
                        </h2>
                        <p>Video provides a powerful way to help you prove your point. When you click Online Video, you
                           can paste in the embed code for the video you want to add Video provides a powerful way to
                           help you prove your point. When you click Online Video, you can paste in the embed code for
                           the video you want to add</p>
                     </div>
                  </div>
                  <div class="row post-item mb-4">
                     <div class="col-4 col-md-4">
                        <div class="post-item-image">
                           <a href="post_detail.php">
                              <img src="../public/images/post/post-1.jpg" class="img-fluid" alt="">
                           </a>
                        </div>
                     </div>
                     <div class="col-8 col-md-8">
                        <h2 class="post-item-title text-main fs-5 py-1">
                           <a href="post_detail.php">
                              Video provides a powerful way to help you prove your point 3
                           </a>
                        </h2>
                        <p>Video provides a powerful way to help you prove your point. When you click Online Video, you
                           can paste in the embed code for the video you want to add Video provides a powerful way to
                           help you prove your point. When you click Online Video, you can paste in the embed code for
                           the video you want to add</p>
                     </div>
                  </div>
                  <div class="row post-item mb-4">
                     <div class="col-4 col-md-4">
                        <div class="post-item-image">
                           <a href="post_detail.php">
                              <img src="../public/images/post/post-1.jpg" class="img-fluid" alt="">
                           </a>
                        </div>
                     </div>
                     <div class="col-8 col-md-8">
                        <h2 class="post-item-title text-main fs-5 py-1">
                           <a href="post_detail.php">
                              Video provides a powerful way to help you prove your point 1
                           </a>
                        </h2>
                        <p>Video provides a powerful way to help you prove your point. When you click Online Video, you
                           can paste in the embed code for the video you want to add Video provides a powerful way to
                           help you prove your point. When you click Online Video, you can paste in the embed code for
                           the video you want to add</p>
                     </div>
                  </div>
                  <div class="row post-item mb-4">
                     <div class="col-4 col-md-4">
                        <div class="post-item-image">
                           <a href="post_detail.php">
                              <img src="../public/images/post/post-2.jpg" class="img-fluid" alt="">
                           </a>
                        </div>
                     </div>
                     <div class="col-8 col-md-8">
                        <h2 class="post-item-title text-main fs-5 py-1">
                           <a href="post_detail.php">
                              Video provides a powerful way to help you prove your point 2
                           </a>
                        </h2>
                        <p>Video provides a powerful way to help you prove your point. When you click Online Video, you
                           can paste in the embed code for the video you want to add Video provides a powerful way to
                           help you prove your point. When you click Online Video, you can paste in the embed code for
                           the video you want to add</p>
                     </div>
                  </div>
                  <div class="row post-item mb-4">
                     <div class="col-4 col-md-4">
                        <div class="post-item-image">
                           <a href="post_detail.php">
                              <img src="../public/images/post/post-3.jpg" class="img-fluid" alt="">
                           </a>
                        </div>
                     </div>
                     <div class="col-8 col-md-8">
                        <h2 class="post-item-title text-main fs-5 py-1">
                           <a href="post_detail.php">
                              Video provides a powerful way to help you prove your point 2
                           </a>
                        </h2>
                        <p>Video provides a powerful way to help you prove your point. When you click Online Video, you
                           can paste in the embed code for the video you want to add Video provides a powerful way to
                           help you prove your point. When you click Online Video, you can paste in the embed code for
                           the video you want to add</p>
                     </div>
                  </div>
                  <div class="row post-item mb-4">
                     <div class="col-4 col-md-4">
                        <div class="post-item-image">
                           <a href="post_detail.php">
                              <img src="../public/images/post/post-2.jpg" class="img-fluid" alt="">
                           </a>
                        </div>
                     </div>
                     <div class="col-8 col-md-8">
                        <h2 class="post-item-title text-main fs-5 py-1">
                           <a href="post_detail.php">
                              Video provides a powerful way to help you prove your point 22
                           </a>
                        </h2>
                        <p>Video provides a powerful way to help you prove your point. When you click Online Video, you
                           can paste in the embed code for the video you want to add Video provides a powerful way to
                           help you prove your point. When you click Online Video, you can paste in the embed code for
                           the video you want to add</p>
                     </div>
                  </div>
                  <div class="row post-item mb-4">
                     <div class="col-4 col-md-4">
                        <div class="post-item-image">
                           <a href="post_detail.php">
                              <img src="../public/images/post/post-3.jpg" class="img-fluid" alt="">
                           </a>
                        </div>
                     </div>
                     <div class="col-8 col-md-8">
                        <h2 class="post-item-title text-main fs-5 py-1">
                           <a href="post_detail.php">
                              Video provides a powerful way to help you prove your point 3
                           </a>
                        </h2>
                        <p>Video provides a powerful way to help you prove your point. When you click Online Video, you
                           can paste in the embed code for the video you want to add Video provides a powerful way to
                           help you prove your point. When you click Online Video, you can paste in the embed code for
                           the video you want to add</p>
                     </div>
                  </div>
               </div>
               <nav aria-label="Phân trang">
                  <ul class="pagination justify-content-center">
                     <li class="page-item">
                        <a class="page-link text-main" href="product_category.php" aria-label="Previous">
                           <span aria-hidden="true">&laquo;</span>
                        </a>
                     </li>
                     <li class="page-item">
                        <a class="page-link text-main" href="product_category.php">1</a>
                     </li>
                     <li class="page-item">
                        <a class="page-link text-main" href="product_category.php">2</a>
                     </li>
                     <li class="page-item">
                        <a class="page-link text-main" href="product_category.php">3</a>
                     </li>
                     <li class="page-item">
                        <a class="page-link text-main" href="product_category.php" aria-label="Next">
                           <span aria-hidden="true">&raquo;</span>
                        </a>
                     </li>
                  </ul>
               </nav>
            </div>
         </div>
      </div>
   </section>
   <section class="hdl-footer pb-4">
      <div class="container">
         <div class="row">
            <div class="col-md-4 pt-4">
               <h3 class="widgettilte">CHÚNG TÔI LÀ AI ?</h3>
               <p class="pt-1">
                  Copyright@ 2024 DienloiShop là hệ thống bán sĩ và lẽ thời trang nam, nữ, trẻ em và quần áo thể thao,
                  mong muốn đem đến chất lượng tốt nhất cho khách hàng.
               </p>
               <p class="pt-1">
                  Địa chỉ: B216A, KP Bình Phước, Phường Bình Nhâm, TP. Thuận An, Bình Dương
               </p>
               <p class="pt-1">
                  Điện thoại: 0985 608 759(call, zalo) - Email: dienloisoft@gmail.com
               </p>
               <h3 class="widgettilte">MẠNG XÃ HỘI</h3>
               <div class="social my-3">
                  <div class="facebook-icon">
                     <a href="#">
                        <i class="fab fa-facebook-f"></i>
                     </a>
                  </div>
                  <div class="instagram-icon">
                     <a href="#">
                        <i class="fab fa-instagram"></i>
                     </a>
                  </div>
                  <div class="google-icon">
                     <a href="#">
                        <i class="fab fa-google"></i>
                     </a>
                  </div>
                  <div class="youtube-icon">
                     <a href="#">
                        <i class="fab fa-youtube"></i>
                     </a>
                  </div>
               </div>
            </div>
            <div class="col-md-4 pt-4">
               <h3 class="widgettilte">
                  <strong>Liên hệ</strong>
               </h3>
               <ul class="footer-menu">
                  <li><a href="index.php">Trang chủ</a></li>
                  <li><a href="post_page.php">Giới thiệu</a></li>
                  <li><a href="product.php">Sản phẩm</a></li>
                  <li><a href="post_topic.php">Bài viết</a></li>
                  <li><a href="contact.php">Liên hệ</a></li>
               </ul>
            </div>
            <div class="col-md-4 pt-4 text-end">
               <h3 class="fs-5 text-end">
                  <strong>Lượt truy cập</strong>
               </h3>
               <p class="my-1">9888 lượt</p>
            </div>
         </div>
      </div>
   </section>
   <section class="dhl-copyright bg-dark py-3">
      <div class="container text-center text-white">
         Thiết kế bởi: Hồ Diên Lợi - Phone: 0998765432
      </div>
   </section>
</body>

</php>