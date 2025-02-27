<?php ob_start(); ?>
<!DOCTYPE html>
<html lang="en">

<!-- Mirrored from bestwebcreator.com/shopwise/demo/index-6.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 11 Nov 2024 07:34:55 GMT -->

<head>
    <!-- Meta -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="Anil z" name="author">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Shopwise is Powerful features and You Can Use The Perfect Build this Template For Any eCommerce Website. The template is built for sell Fashion Products, Shoes, Bags, Cosmetics, Clothes, Sunglasses, Furniture, Kids Products, Electronics, Stationery Products and Sporting Goods.">
    <meta name="keywords" content="ecommerce, electronics store, Fashion store, furniture store,  bootstrap 4, clean, minimal, modern, online store, responsive, retail, shopping, ecommerce store">

    <!-- SITE TITLE -->
    <title>Dự án 1 Nhóm 5: Tech Heaven</title>
    <!-- Favicon Icon -->
    <link rel="shortcut icon" type="image/x-icon" href="client/assets/images/favicon.jpg">
    <!-- Animation CSS -->
    <link rel="stylesheet" href="client/assets/css/animate.css">
    <!-- Latest Bootstrap min CSS -->
    <link rel="stylesheet" href="client/assets/bootstrap/css/bootstrap.min.css">
    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700,900&amp;display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,500,600,700,800,900&amp;display=swap" rel="stylesheet">
    <!-- Icon Font CSS -->
    <link rel="stylesheet" href="client/assets/css/all.min.css">
    <link rel="stylesheet" href="client/assets/css/ionicons.min.css">
    <link rel="stylesheet" href="client/assets/css/themify-icons.css">
    <link rel="stylesheet" href="client/assets/css/linearicons.css">
    <link rel="stylesheet" href="client/assets/css/flaticon.css">
    <link rel="stylesheet" href="client/assets/css/simple-line-icons.css">
    <!--- owl carousel CSS-->
    <link rel="stylesheet" href="client/assets/owlcarousel/css/owl.carousel.min.css">
    <link rel="stylesheet" href="client/assets/owlcarousel/css/owl.theme.css">
    <link rel="stylesheet" href="client/assets/owlcarousel/css/owl.theme.default.min.css">
    <!-- Magnific Popup CSS -->
    <link rel="stylesheet" href="client/assets/css/magnific-popup.css">
    <link rel="stylesheet" href="client
/assets/css/jquery-ui.css">
    <!-- Slick CSS -->
    <link rel="stylesheet" href="client/assets/css/slick.css">
    <link rel="stylesheet" href="client/assets/css/slick-theme.css">
    <!-- Style CSS -->
    <link rel="stylesheet" href="client/assets/css/style.css">
    <link rel="stylesheet" href="client/assets/css/responsive.css">
    <!-- Toast js -->
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css"> -->

    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-106310707-1"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());
        gtag('config', 'UA-106310707-1', {
            'anonymize_ip': true
        });
    </script>

    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-G6MPNF0KNC"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'G-G6MPNF0KNC');
    </script>


    <script>
        // Get all the radio inputs
        const stars = document.querySelectorAll('.star_rating input[type="radio"]');
        const hiddenInput = document.getElementById('rating');

        stars.forEach(star => {
            star.addEventListener('change', function() {
                // When a radio input is selected, update the hidden input field's value
                hiddenInput.value = this.value;
            });
        });
    </script>

    <!-- Hotjar Tracking Code for bestwebcreator.com -->
    <script>
        // (function(h,o,t,j,a,r){
        //     h.hj=h.hj||function(){(h.hj.q=h.hj.q||[]).push(arguments)};
        //     h._hjSettings={hjid:2073024,hjsv:6};
        //     a=o.getElementsByTagName('head')[0];
        //     r=o.createElement('script');r.async=1;
        //     r.src=t+h._hjSettings.hjid+j+h._hjSettings.hjsv;
        //     a.appendChild(r);
        // })(window,document,'https://static.hotjar.com/c/hotjar-','.js?sv=');
    </script>

    <!-- Start of StatCounter Code -->
    <script>
        // 	var sc_project=11921154;
        // 	var sc_security="6c07f98b";
        // 		var scJsHost = (("https:" == document.location.protocol) ?
        // 		"https://secure." : "http://www.");
        // 			//-->

        // document.write("<sc"+"ript src='" +scJsHost +"statcounter.com/counter/counter.js'></"+"script>");
    </script>
    <!-- End of StatCounter Code -->

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css">

</head>

<body>
    <?php
    if (isset($_SESSION['error'])) {
        echo "<script type='text/javascript'>
                    toastr.warning('{$_SESSION['error']}');
               </script>";

        // Xóa seseion['error'] để tránh lại lại
        unset($_SESSION['error']);
    }

    if (isset($_SESSION['success'])) {
        echo "<script type='text/javascript'>
                    toastr.success('{$_SESSION['success']}');
               </script>";

        // Xóa seseion['error'] để tránh lại lại
        unset($_SESSION['success']);
    }
    ?>

    <!-- End Screen Load Popup Section -->

    <!-- START HEADER -->
    <header class="header_wrap">

        <div class="middle-header dark_skin">
            <div class="container">
                <div class="nav_block">
                    <a class="navbar-brand" href="index.php?act=index">
                        <img class="logo_light" src="client/assets/images/logo_light.png" alt="logo">
                        <img class="logo_dark" src="client/assets/images/logo_dark.png" alt="logo">
                    </a>
                    <div class="product_search_form radius_input search_form_btn">
                        <form method="post" action="index.php?act=product-list">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <div class="custom_select">
                                        <select aria-label="1" class="first_null not_chosen">
                                            <option value="">Danh Mục</option>
                                        </select>
                                    </div>
                                </div>
                                <input class="form-control" name="keyword" placeholder="Tìm sản phẩm..." required="" type="text">
                                <button type="submit" name="search" class="search_btn3">Tìm</button>
                            </div>
                        </form>
                    </div>
                    <ul class="navbar-nav attr-nav align-items-center">
                        <li>

                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <img src="./images/user_img/<?php echo isset($_SESSION['user']['avatar']) && $_SESSION['user']['avatar'] ? $_SESSION['user']['avatar'] : '1.png'; ?>" alt="Avatar" class="avatar-circle">
                            </a>

                            <style>
                                .avatar-circle {
                                    width: 45px;
                                    height: 45px;
                                    border-radius: 50%;
                                    object-fit: cover;
                                    border: 2px solid #ddd;
                                }
                            </style>

                            <ul class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                                <?php if (isset($_SESSION['role_id']) && $_SESSION['role_id'] == 2) : ?>

                                    <li><a class="dropdown-item" href="index.php?act=admin">Trang quản trị</a></li>
                                    <li><a class="dropdown-item" href="index.php?act=myaccount">Tài khoản của tôi</a></li>
                                    <li><a class="dropdown-item" onclick="return confirm('Do you want to logout?');" href="index.php?act=logout">Đăng xuất</a></li>
                                <?php elseif (isset($_SESSION['role_id']) && $_SESSION['role_id'] == 1) : ?>

                                    <li><a class="dropdown-item" href="index.php?act=myaccount">Tài khoản của tôi</a></li>
                                    <li><a class="dropdown-item" onclick="return confirm('Do you want to logout?');" href="index.php?act=logout">Đăng xuất</a></li>
                                <?php else : ?>

                                    <li><a class="dropdown-item" href="index.php?act=login">Đăng nhập</a></li>
                                    <li><a class="dropdown-item" href="index.php?act=register">Đăng ký</a></li>
                                <?php endif; ?>
                            </ul>
                        </li>
                        <!-- <li><a href="index.php?act=login" class="nav-link"><i class="linearicons-user"></i></a></li> -->
                        <li><a href="index.php?act=wishlist" class="nav-link"><i class="linearicons-heart"></i><span class="wishlist_count">0</span></a></li>
                        <li class="dropdown cart_dropdown"><a class="nav-link cart_trigger" href="#" data-bs-toggle="dropdown"><i class="linearicons-bag2"></i><span class="cart_count">2</span><span class="amount"><span class="currency_symbol">$</span>159.00</span></a>
                            <div class="cart_box cart_right dropdown-menu dropdown-menu-right">
                                <ul class="cart_list">
                                    <li>
                                        <a href="#" class="item_remove"><i class="ion-close"></i></a>
                                        <a href="#"><img src="client/assets/images/cart_thamb1.jpg" alt="cart_thumb1">Variable product 001</a>
                                        <span class="cart_quantity"> 1 x <span class="cart_amount"> <span class="price_symbole">$</span></span>78.00</span>
                                    </li>
                                    <li>
                                        <a href="#" class="item_remove"><i class="ion-close"></i></a>
                                        <a href="#"><img src="client/assets/images/cart_thamb2.jpg" alt="cart_thumb2">Ornare sed consequat</a>
                                        <span class="cart_quantity"> 1 x <span class="cart_amount"> <span class="price_symbole">$</span></span>81.00</span>
                                    </li>
                                </ul>
                                <div class="cart_footer">
                                    <p class="cart_buttons"><a href="index.php?act=cart" class="btn btn-fill-line view-cart">View Cart</a><a href="#" class="btn btn-fill-out checkout">Checkout</a></p>
                                </div>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="bottom_header dark_skin main_menu_uppercase border-top">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-3 col-md-4 col-sm-6 col-3">
                        <div class="categories_wrap">
                            <button type="button" data-bs-toggle="collapse" data-bs-target="#navCatContent" aria-expanded="false" class="categories_btn categories_menu">
                                <span>TẤT CẢ DANH MỤC </span><i class="linearicons-menu"></i>
                            </button>
                            <div id="navCatContent" class="navbar nav collapse">
                                <ul>
                                    <li class="dropdown dropdown-mega-menu">
                                        <a class="dropdown-item nav-link dropdown-toggler" href="#" data-bs-toggle="dropdown"><i class="flaticon-tv"></i> <span>Computer</span></a>
                                        <div class="dropdown-menu">
                                            <ul class="mega-menu d-lg-flex">
                                                <li class="mega-menu-col col-lg-7">
                                                    <ul class="d-lg-flex">
                                                        <li class="mega-menu-col col-lg-6">
                                                            <ul>
                                                                <li class="dropdown-header">Featured Item</li>
                                                                <li><a class="dropdown-item nav-link nav_item" href="#">Vestibulum sed</a></li>
                                                                <li><a class="dropdown-item nav-link nav_item" href="#">Donec porttitor</a></li>
                                                                <li><a class="dropdown-item nav-link nav_item" href="#">Donec vitae facilisis</a></li>
                                                                <li><a class="dropdown-item nav-link nav_item" href="#">Curabitur tempus</a></li>
                                                                <li><a class="dropdown-item nav-link nav_item" href="#">Vivamus in tortor</a></li>
                                                                <li><a class="dropdown-item nav-link nav_item" href="#">Donec vitae ante ante</a></li>
                                                                <li><a class="dropdown-item nav-link nav_item" href="#">Etiam ac rutrum</a></li>
                                                                <li><a class="dropdown-item nav-link nav_item" href="#">Quisque condimentum</a></li>
                                                            </ul>
                                                        </li>
                                                        <li class="mega-menu-col col-lg-6">
                                                            <ul>
                                                                <li class="dropdown-header">Popular Item</li>
                                                                <li><a class="dropdown-item nav-link nav_item" href="#">Curabitur laoreet</a></li>
                                                                <li><a class="dropdown-item nav-link nav_item" href="#">Vivamus in tortor</a></li>
                                                                <li><a class="dropdown-item nav-link nav_item" href="#">Donec vitae facilisis</a></li>
                                                                <li><a class="dropdown-item nav-link nav_item" href="#">Quisque condimentum</a></li>
                                                                <li><a class="dropdown-item nav-link nav_item" href="#">Etiam ac rutrum</a></li>
                                                                <li><a class="dropdown-item nav-link nav_item" href="#">Donec vitae ante ante</a></li>
                                                                <li><a class="dropdown-item nav-link nav_item" href="#">Donec porttitor</a></li>
                                                                <li><a class="dropdown-item nav-link nav_item" href="#">Curabitur tempus</a></li>
                                                            </ul>
                                                        </li>
                                                    </ul>
                                                </li>
                                                <li class="mega-menu-col col-lg-5">
                                                    <div class="header-banner2">
                                                        <img src="client/assets/images/menu_banner7.jpg" alt="menu_banner1">
                                                        <div class="banne_info">
                                                            <h6>10% Off</h6>
                                                            <h4>Computers</h4>
                                                            <a href="#">Shop now</a>
                                                        </div>
                                                    </div>
                                                    <div class="header-banner2">
                                                        <img src="client/assets/images/menu_banner8.jpg" alt="menu_banner2">
                                                        <div class="banne_info">
                                                            <h6>15% Off</h6>
                                                            <h4>Top Laptops</h4>
                                                            <a href="#">Shop now</a>
                                                        </div>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                    </li>
                                    <li class="dropdown dropdown-mega-menu">
                                        <a class="dropdown-item nav-link dropdown-toggler" href="#" data-bs-toggle="dropdown"><i class="flaticon-responsive"></i> <span>Mobile & Tablet</span></a>
                                        <div class="dropdown-menu">
                                            <ul class="mega-menu d-lg-flex">
                                                <li class="mega-menu-col col-lg-7">
                                                    <ul class="d-lg-flex">
                                                        <li class="mega-menu-col col-lg-6">
                                                            <ul>
                                                                <li class="dropdown-header">Featured Item</li>
                                                                <li><a class="dropdown-item nav-link nav_item" href="#">Vestibulum sed</a></li>
                                                                <li><a class="dropdown-item nav-link nav_item" href="#">Donec porttitor</a></li>
                                                                <li><a class="dropdown-item nav-link nav_item" href="#">Donec vitae facilisis</a></li>
                                                                <li><a class="dropdown-item nav-link nav_item" href="#">Curabitur tempus</a></li>
                                                                <li><a class="dropdown-item nav-link nav_item" href="#">Vivamus in tortor</a></li>
                                                                <li><a class="dropdown-item nav-link nav_item" href="#">Donec vitae ante ante</a></li>
                                                                <li><a class="dropdown-item nav-link nav_item" href="#">Etiam ac rutrum</a></li>
                                                            </ul>
                                                        </li>
                                                        <li class="mega-menu-col col-lg-6">
                                                            <ul>
                                                                <li class="dropdown-header">Popular Item</li>
                                                                <li><a class="dropdown-item nav-link nav_item" href="#">Curabitur laoreet</a></li>
                                                                <li><a class="dropdown-item nav-link nav_item" href="#">Vivamus in tortor</a></li>
                                                                <li><a class="dropdown-item nav-link nav_item" href="#">Donec vitae facilisis</a></li>
                                                                <li><a class="dropdown-item nav-link nav_item" href="#">Quisque condimentum</a></li>
                                                                <li><a class="dropdown-item nav-link nav_item" href="#">Etiam ac rutrum</a></li>
                                                                <li><a class="dropdown-item nav-link nav_item" href="#">Donec vitae ante ante</a></li>
                                                                <li><a class="dropdown-item nav-link nav_item" href="#">Donec porttitor</a></li>
                                                            </ul>
                                                        </li>
                                                    </ul>
                                                </li>
                                                <li class="mega-menu-col col-lg-5">
                                                    <div class="header-banner2">
                                                        <a href="#"><img src="client/assets/images/menu_banner6.jpg" alt="menu_banner"></a>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                    </li>
                                    <li class="dropdown dropdown-mega-menu">
                                        <a class="dropdown-item nav-link dropdown-toggler" href="#" data-bs-toggle="dropdown"><i class="flaticon-camera"></i> <span>Camera</span></a>
                                        <div class="dropdown-menu">
                                            <ul class="mega-menu d-lg-flex">
                                                <li class="mega-menu-col col-lg-7">
                                                    <ul class="d-lg-flex">
                                                        <li class="mega-menu-col col-lg-6">
                                                            <ul>
                                                                <li class="dropdown-header">Featured Item</li>
                                                                <li><a class="dropdown-item nav-link nav_item" href="#">Vestibulum sed</a></li>
                                                                <li><a class="dropdown-item nav-link nav_item" href="#">Donec porttitor</a></li>
                                                                <li><a class="dropdown-item nav-link nav_item" href="#">Donec vitae facilisis</a></li>
                                                                <li><a class="dropdown-item nav-link nav_item" href="#">Curabitur tempus</a></li>
                                                                <li><a class="dropdown-item nav-link nav_item" href="#">Vivamus in tortor</a></li>
                                                                <li><a class="dropdown-item nav-link nav_item" href="#">Donec vitae ante ante</a></li>
                                                                <li><a class="dropdown-item nav-link nav_item" href="#">Etiam ac rutrum</a></li>
                                                            </ul>
                                                        </li>
                                                        <li class="mega-menu-col col-lg-6">
                                                            <ul>
                                                                <li class="dropdown-header">Popular Item</li>
                                                                <li><a class="dropdown-item nav-link nav_item" href="#">Curabitur laoreet</a></li>
                                                                <li><a class="dropdown-item nav-link nav_item" href="#">Vivamus in tortor</a></li>
                                                                <li><a class="dropdown-item nav-link nav_item" href="#">Donec vitae facilisis</a></li>
                                                                <li><a class="dropdown-item nav-link nav_item" href="#">Quisque condimentum</a></li>
                                                                <li><a class="dropdown-item nav-link nav_item" href="#">Etiam ac rutrum</a></li>
                                                                <li><a class="dropdown-item nav-link nav_item" href="#">Donec vitae ante ante</a></li>
                                                                <li><a class="dropdown-item nav-link nav_item" href="#">Donec porttitor</a></li>
                                                            </ul>
                                                        </li>
                                                    </ul>
                                                </li>
                                                <li class="mega-menu-col col-lg-5">
                                                    <div class="header-banner2">
                                                        <a href="#"><img src="client/assets/images/menu_banner9.jpg" alt="menu_banner"></a>
                                                    </div>
                                                </li>
                                            </ul>
                                        </div>
                                    </li>
                                    <li class="dropdown dropdown-mega-menu">
                                        <a class="dropdown-item nav-link dropdown-toggler" href="#" data-bs-toggle="dropdown"><i class="flaticon-plugins"></i> <span>Accessories</span></a>
                                        <div class="dropdown-menu">
                                            <ul class="mega-menu d-lg-flex">
                                                <li class="mega-menu-col col-lg-4">
                                                    <ul>
                                                        <li class="dropdown-header">Woman's</li>
                                                        <li><a class="dropdown-item nav-link nav_item" href="shop-list-left-sidebar.html">Vestibulum sed</a></li>
                                                        <li><a class="dropdown-item nav-link nav_item" href="shop-left-sidebar.html">Donec porttitor</a></li>
                                                        <li><a class="dropdown-item nav-link nav_item" href="shop-right-sidebar.html">Donec vitae facilisis</a></li>
                                                        <li><a class="dropdown-item nav-link nav_item" href="shop-list.html">Curabitur tempus</a></li>
                                                        <li><a class="dropdown-item nav-link nav_item" href="shop-load-more.html">Vivamus in tortor</a></li>
                                                    </ul>
                                                </li>
                                                <li class="mega-menu-col col-lg-4">
                                                    <ul>
                                                        <li class="dropdown-header">Men's</li>
                                                        <li><a class="dropdown-item nav-link nav_item" href="shop-cart.html">Donec vitae ante ante</a></li>
                                                        <li><a class="dropdown-item nav-link nav_item" href="checkout.html">Etiam ac rutrum</a></li>
                                                        <li><a class="dropdown-item nav-link nav_item" href="wishlist.html">Quisque condimentum</a></li>
                                                        <li><a class="dropdown-item nav-link nav_item" href="compare.html">Curabitur laoreet</a></li>
                                                        <li><a class="dropdown-item nav-link nav_item" href="order-completed.html">Vivamus in tortor</a></li>
                                                    </ul>
                                                </li>
                                                <li class="mega-menu-col col-lg-4">
                                                    <ul>
                                                        <li class="dropdown-header">Kid's</li>
                                                        <li><a class="dropdown-item nav-link nav_item" href="shop-product-detail.html">Donec vitae facilisis</a></li>
                                                        <li><a class="dropdown-item nav-link nav_item" href="shop-product-detail-left-sidebar.html">Quisque condimentum</a></li>
                                                        <li><a class="dropdown-item nav-link nav_item" href="shop-product-detail-right-sidebar.html">Etiam ac rutrum</a></li>
                                                        <li><a class="dropdown-item nav-link nav_item" href="shop-product-detail-thumbnails-left.html">Donec vitae ante ante</a></li>
                                                        <li><a class="dropdown-item nav-link nav_item" href="shop-product-detail-thumbnails-left.html">Donec porttitor</a></li>
                                                    </ul>
                                                </li>
                                            </ul>
                                        </div>
                                    </li>
                                    <li><a class="dropdown-item nav-link nav_item" href="coming-soon.html"><i class="flaticon-headphones"></i> <span>Headphones</span></a></li>
                                    <li><a class="dropdown-item nav-link nav_item" href="404.html"><i class="flaticon-console"></i> <span>Gaming</span></a></li>
                                    <li><a class="dropdown-item nav-link nav_item" href="login.html"><i class="flaticon-watch"></i> <span>Watches</span></a></li>
                                    <li><a class="dropdown-item nav-link nav_item" href="register.html"><i class="flaticon-music-system"></i> <span>Home Audio & Theater</span></a></li>
                                    <li><a class="dropdown-item nav-link nav_item" href="coming-soon.html"><i class="flaticon-monitor"></i> <span>TV & Smart Box</span></a></li>
                                    <li><a class="dropdown-item nav-link nav_item" href="404.html"><i class="flaticon-printer"></i> <span>Printer</span></a></li>
                                    <li>
                                        <ul class="more_slide_open">
                                            <li><a class="dropdown-item nav-link nav_item" href="login.html"><i class="flaticon-fax"></i> <span>Fax Machine</span></a></li>
                                            <li><a class="dropdown-item nav-link nav_item" href="register.html"><i class="flaticon-mouse"></i> <span>Mouse</span></a></li>
                                        </ul>
                                    </li>
                                </ul>
                                <div class="more_categories">More Categories</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-9 col-md-8 col-sm-6 col-9">
                        <nav class="navbar navbar-expand-lg">
                            <button class="navbar-toggler side_navbar_toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSidetoggle" aria-expanded="false">
                                <span class="ion-android-menu"></span>
                            </button>
                            <div class="pr_search_icon">
                                <a href="javascript:;" class="nav-link pr_search_trigger"><i class="linearicons-magnifier"></i></a>
                            </div>
                            <div class="collapse navbar-collapse mobile_side_menu" id="navbarSidetoggle">
                                <ul class="navbar-nav">
                                    <li class="dropdown">
                                        <a class="nav-link" href="index.php?act=index">Trang Chủ</a>
                                    </li>
                                    <!-- <li class="dropdown">
                                        <a class="nav-link" href="#" data-bs-toggle="dropdown">Pages</a>
                                    </li> -->
                                    <li class="dropdown dropdown-mega-menu">
                                        <a class="nav-link" href="index.php?act=product-list">Sản Phẩm</a>
                                    </li>
                                    <li>
                                        <a class="nav-link nav_item" href="index.php?act=about">Giới Thiệu</a>
                                    </li>
                                    <!-- <li class="dropdown dropdown-mega-menu">
                                        <a class="nav-link" href="#" data-bs-toggle="dropdown">Shop</a>
                                    </li> -->
                                    <li><a class="nav-link nav_item" href="index.php?act=contact">Liên Hệ</a></li>
                                </ul>
                            </div>
                            <div class="contact_phone contact_support">
                                <i class="linearicons-phone-wave"></i>
                                <span>0349370112</span>
                            </div>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- END HEADER -->