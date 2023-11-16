<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>
      <?= $title ?? "No title"; ?>
   </title>
   <link rel="stylesheet" href="public/bootstrap/css/bootstrap.min.css">
   <link rel="stylesheet" href="public/fontawesome/css/all.min.css">
   <link rel="stylesheet" href="public/css/frontend.css">
   <script src="public/bootstrap/js/bootstrap.bundle.min.js"></script>
   <script src="public/jquery/jquery-3.7.0.min.js"></script>
   <style>
      .success.is-underline:hover,.success.is-outline:hover,.success {
	background-color:#1E73BE;
	color:white !important;
}
.call-mobile {
	background:#ED1C24;
	position:fixed;
	bottom:10px;
	height:40px;
	line-height:40px;
	padding:0 0px 0 0px;
	border-radius:40px;
	color:#fff;
	left:20px;
	z-index:99999;
}
.call-mobile1 {
	position:fixed;
	bottom:52px;
	height:40px;
	line-height:40px;
	padding:0 0px 0 0px;
	border-radius:40px;
	color:#fff;
	left:20px;
	z-index:99999;
}
.call-mobile2 {
	position:fixed;
	bottom:93px;
	height:40px;
	line-height:40px;
	padding:0 0px 0 0px;
	border-radius:40px;
	color:#fff;
	left:20px;
	z-index:99999;
}
.call-mobile i {
	font-size:20px;
	line-height:40px;
	background:#B52026;
	border-radius:100%;
	width:40px;
	height:40px;
	text-align:center;
	float:right;
}
.call-mobile a {
	color:#fff;
	font-size:18px;
	font-weight:bold;
	text-decoration:none;
	margin-right:10px;
	padding-left: 10px;
}
   </style>
</head>

<body>
<div class="call-mobile2">
	<a data-animate="fadeInDown" rel="noopener noreferrer" href="http://zalo.me/0828255501" target="_blank" class="button success" style="border-radius:99px;" data-animated="true">
	<span>Chat Zalo </span></a>
</div>
<div class="call-mobile1">
	<a data-animate="fadeInDown" rel="noopener noreferrer" href="https://www.facebook.com/quocduy2004" target="_blank" class="button success" style="border-radius:99px;" data-animated="true">
	<span>Chat Facebook</span></a>
</div>
<div class="call-mobile">
	<a id="callnowbutton" href="tel:0828255501">0828255501</a><i class="fa fa-phone"></i>
</div>
   <section class="hdl-header">
      <div class="container">
         <div class="row">
            <div class="col-6 col-sm-6 col-md-2 py-1">
               <a href="index.php">
                  <img width="100px" src="public/images/logoweb.jpg" class="img-fluid" alt="Logo">
               </a>
            </div>
            <div class="col-12 col-sm-9 d-none d-md-block col-md-5 py-3">
               <div class="input-group mb-3">
                  <input type="text" class="form-control" placeholder="Nhập nội dung tìm kiếm"
                     aria-label="Recipient's username" aria-describedby="basic-addon2">
                  <span class="input-group-text bg-main" id="basic-addon2">
                     <i class="fa fa-search" aria-hidden="true"></i>
                  </span>
               </div>
            </div>
            <div class="col-12 col-sm-12 d-none d-md-block col-md-4 text-center py-2">
               <div class="call-login--register border-bottom">
                  <ul class="nav nav-fills py-0 my-0">
                     <li class="nav-item">
                        <a class="nav-link" href="https://zalo.me/0828255501">
                           <i class="fa fa-phone-square" aria-hidden="true"></i>
                          0828255501
                        </a>
                     </li>
                     
                     <?php if(isset($_SESSION['name'])) :?>
                     <li class="nav-item">
                        <a class="nav-link" href="index.php?option=profile">Tên khách hàng: <?php echo $_SESSION['name']; ?></a>
                     </li>
                     <li class="nav-item">
                        <a class="nav-link" href="index.php?option=customer">Đăng xuất</a>
                     <?php else: ?>
                        <li class="nav-item">
                        <a class="nav-link" href="index.php?option=login">Đăng nhập</a>
                     </li>
                     <li class="nav-item">
                        <a class="nav-link" href="index.php?option=register">Đăng ký</a>
                     </li>
                     </li>
                     <?php endif; ?>
                  </ul>
               </div>
               <div class="fs-6 py-2">
                  ĐỔI TRẢ HÀNG HOẶC HOÀN TIỀN <span class="text-main">TRONG 3 NGÀY</span>
               </div>
            </div>
            <div class="col-6 col-sm-6 col-md-1 text-end py-4 py-md-2">
               <a href="index.php?option=cart">
                  <div class="box-cart float-end">
                     <i class="fa fa-shopping-bag" aria-hidden="true"></i>
                     <span id="showcart">
                        <?php echo isset($_SESSION['cart']) ? count($_SESSION['cart']) : 0; ?>
                     </span>
                  </div>
               </a>
            </div>
         </div>
      </div>
   </section>
   <section class="hdl-mainmenu bg-main">
      <div class="container">
         <div class="row">
            <div class="col-12 d-none d-md-block col-md-2 d-none d-md-block">
               <?php require_once 'views/fontend/mod-menu-listcategory.php'; ?>
            </div>
            <div class="col-12 col-md-9">
               <?php require_once 'views/fontend/mod-mainmenu.php'; ?>
            </div>
         </div>
      </div>
   </section>