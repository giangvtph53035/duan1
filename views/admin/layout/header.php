<!DOCTYPE html>
<html lang="en" dir="ltr">


<!-- Mirrored from themes.pixelstrap.com/fastkart/back-end/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 11 Nov 2024 10:20:22 GMT -->
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description"
        content="Fastkart admin is super flexible, powerful, clean &amp; modern responsive bootstrap 5 admin template with unlimited possibilities.">
    <meta name="keywords"
        content="admin template, Fastkart admin template, dashboard template, flat admin template, responsive admin template, web app">
    <meta name="author" content="pixelstrap">
    <link rel="icon" href="admin/assets/images/favicon.png" type="image/x-icon">
    <link rel="shortcut icon" href="admin/assets/images/favicon.png" type="image/x-icon">
    <title>Tech-heaven - Trang chủ</title>

    <!-- Google font-->
    <link
        href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&amp;display=swap"
        rel="stylesheet">

    <!-- Linear Icon css -->
    <link rel="stylesheet" href="admin/assets/css/linearicon.css">

    <!-- fontawesome css -->
    <link rel="stylesheet" type="text/css" href="admin/assets/css/vendors/font-awesome.css">

    <!-- Themify icon css-->
    <link rel="stylesheet" type="text/css" href="admin/assets/css/vendors/themify.css">

    <!-- ratio css -->
    <link rel="stylesheet" type="text/css" href="admin/assets/css/ratio.css">

    <!-- remixicon css -->
    <link rel="stylesheet" type="text/css" href="admin/assets/css/remixicon.css">

    <!-- Feather icon css-->
    <link rel="stylesheet" type="text/css" href="admin/assets/css/vendors/feather-icon.css">

    <!-- Plugins css -->
    <link rel="stylesheet" type="text/css" href="admin/assets/css/vendors/scrollbar.css">
    <link rel="stylesheet" type="text/css" href="admin/assets/css/vendors/animate.css">

    <!-- Bootstrap css-->
    <link rel="stylesheet" type="text/css" href="admin/assets/css/vendors/bootstrap.css">

    <!-- vector map css -->
    <link rel="stylesheet" type="text/css" href="admin/assets/css/vector-map.css">

    <!-- Slick Slider Css -->
    <link rel="stylesheet" href="admin/assets/css/vendors/slick.css">

    <!-- App css -->
    <link rel="stylesheet" type="text/css" href="admin/assets/css/style.css">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css">
</head>

<body>
<?php 
          if(isset($_SESSION['error'])){
               echo "<script type='text/javascript'>
                    toastr.warning('{$_SESSION['error']}');
               </script>";

               // Xóa seseion['error'] để tránh lại lại
               unset($_SESSION['error']);
          }

          if(isset($_SESSION['success'])){
               echo "<script type='text/javascript'>
                    toastr.success('{$_SESSION['success']}');
               </script>";

               // Xóa seseion['error'] để tránh lại lại
               unset($_SESSION['success']);
          }
     ?>


    <!-- tap on top start -->
 
    <!-- tap on tap end -->

    <!-- page-wrapper Start-->
    <div class="page-wrapper compact-wrapper" id="pageWrapper">
        <!-- Page Header Start-->
        <div class="page-header">
            <div class="header-wrapper m-0">
                <div class="header-logo-wrapper p-0">
                    <div class="logo-wrapper">
                        <a href="index.php?act=admin">
                            <img class="img-fluid main-logo" src="admin/assets/images/logo/1.png" alt="logo">
                            <img class="img-fluid white-logo" src="admin/assets/images/logo/1-white.png" alt="logo">
                        </a>
                    </div>
                    <div class="toggle-sidebar">
                        <i class="status_toggle middle sidebar-toggle" data-feather="align-center"></i>
                        <a href="index.php?act=admin">
                            <img src="admin/assets/images/logo/1.png" class="img-fluid" alt="">
                        </a>
                    </div>
                </div>

               
                <div class="nav-right col-6 pull-right right-header p-0">
                    <ul class="nav-menus">
                       

                        <li>
                            <div class="mode">
                                <i class="ri-moon-line"></i>
                            </div>
                        </li>
                        <li class="profile-nav onhover-dropdown pe-0 me-0">
                        <div class="media profile-media">
                            <img 
                                class="user-profile rounded-circle" 
                                src="./images/user_img/<?php echo isset($_SESSION['user']['avatar']) && $_SESSION['user']['avatar'] ? $_SESSION['user']['avatar'] : 'default-avatar.jpg'; ?>" 
                                alt="Profile Image" 
                                style="width: 40px; height: 40px; object-fit: cover;">
                            
                            <!-- User Info -->
                            <div class="user-name-hide media-body">
                                <span><?php echo isset($_SESSION['user']['name']) ? ($_SESSION['user']['name']) : 'Guest'; ?></span>
                                <p class="mb-0 font-roboto">
                                    Admin
                                    <i class="middle ri-arrow-down-s-line"></i>
                                </p>
                            </div>
                        </div>

                            <ul class="profile-dropdown onhover-show-div">
                                
                                <li>
                                    <a data-bs-toggle="modal" data-bs-target="#staticBackdrop"
                                        href="javascript:void(0)">
                                        <i data-feather="log-out"></i>
                                        <span>Log out</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

    
            


        <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog  modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body">
                    <h5 class="modal-title" id="staticBackdropLabel">Logging Out</h5>
                    <p>Are you sure you want to log out?</p>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    <div class="button-box">
                        <button type="button" class="btn btn--no" data-bs-dismiss="modal">No</button>
                        <a type="submit" class="btn  btn--yes btn-primary" href="index.php?act=logoutadmin">Yes</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="page-body-wrapper">
            <!-- Page Sidebar Start-->
            <div class="sidebar-wrapper">
                <div id="sidebarEffect"></div>
                <div>
                    <div class="logo-wrapper logo-wrapper-center">
                        <a href="index.php?act=admin" data-bs-original-title="" title="">
                            <img class="img-fluid for-white" src="admin/assets/images/logo/full-white.png" alt="logo">
                        </a>
                        <div class="back-btn">
                            <i class="fa fa-angle-left"></i>
                        </div>
                        <div class="toggle-sidebar">
                            <i class="ri-apps-line status_toggle middle sidebar-toggle"></i>
                        </div>
                    </div>
                    <div class="logo-icon-wrapper">
                        <a href="index.php?act=admin">
                            <img class="img-fluid main-logo main-white" src="admin/assets/images/logo/logo.png" alt="logo">
                            <img class="img-fluid main-logo main-dark" src="admin/assets/images/logo/logo-white.png"
                                alt="logo">
                        </a>
                    </div>
                    <nav class="sidebar-main">
                        <div class="left-arrow" id="left-arrow">
                            <i data-feather="arrow-left"></i>
                        </div>

                        <div id="sidebar-menu">
                            <ul class="sidebar-links" id="simple-bar">
                                <li class="back-btn"></li>

                                <li class="sidebar-list">
                                    <a class="sidebar-link sidebar-title link-nav" href="index.php?act=admin">
                                        <i class="ri-home-line"></i>
                                        <span>Trang chủ</span>
                                    </a>
                                </li>

                                <li class="sidebar-list">
                                    <a class="linear-icon-link sidebar-link sidebar-title" href="javascript:void(0)">
                                        <i class="ri-store-3-line"></i>
                                        <span>Sản phẩm</span>
                                    </a>
                                    <ul class="sidebar-submenu">
                                        <li>
                                            <a href="index.php?act=product">Danh sách sản phẩm</a>
                                        </li>

                                        <li>
                                            <a href="index.php?act=product-add">Thêm Sản phẩm</a>
                                        </li>
                                    </ul>
                                </li>

                                <li class="sidebar-list">
                                    <a class="linear-icon-link sidebar-link sidebar-title" href="javascript:void(0)">
                                        <i class="ri-list-check-2"></i>
                                        <span>Danh Mục</span>
                                    </a>
                                    <ul class="sidebar-submenu">
                                        <li>
                                            <a href="index.php?act=category">Danh sách danh mục</a>
                                        </li>

                                        <li>
                                            <a href="index.php?act=category-add">Thêm Danh Mục</a>
                                        </li>
                                    </ul>
                                </li>

                

                                <li class="sidebar-list">
                                    <a class="sidebar-link sidebar-title" href="javascript:void(0)">
                                        <i class="ri-user-3-line"></i>
                                        <span>Người dùng</span>
                                    </a>
                                    <ul class="sidebar-submenu">
                                        <li>
                                            <a href="all-users.html">Danh sách người dùng</a>
                                        </li>
                                    </ul>
                                </li>


                                <li class="sidebar-list">
                                    <a class="sidebar-link sidebar-title" href="javascript:void(0)">
                                        <i class="ri-archive-line"></i>
                                        <span>Orders</span>
                                    </a>
                                    <ul class="sidebar-submenu">
                                        <li>
                                            <a href="index.php?act=order-list">Danh sách đơn hàng</a>
                                        </li>
                                        <li>
                                            <a href="order-detail.html">Chi tiết đơn hàng</a>
                                        </li>
                                        <li>
                                            <a href="order-tracking.html">Trạng thái đơn hàng</a>
                                        </li>
                                    </ul>
                                </li>

                                <li class="sidebar-list">
                                    <a class="linear-icon-link sidebar-link sidebar-title" href="javascript:void(0)">
                                        <i class="ri-price-tag-3-line"></i>
                                        <span>Mã giảm giá</span>
                                    </a>
                                    <ul class="sidebar-submenu">
                                        <li>
                                            <a href="index.php?act=coupon-list">Danh sách mã giảm giá</a>
                                        </li>

                                        <li>
                                            <a href="index.php?act=coupon-add">Tạo mã giảm giá</a>
                                        </li>
                                    </ul>
                                </li>

                               

                                <li class="sidebar-list">
                                    <a class="sidebar-link sidebar-title link-nav" href="reports.html">
                                        <i class="ri-file-chart-line"></i>
                                        <span>Thống kê</span>
                                    </a>
                                </li>
                                
                                <li class="sidebar-list">
                                    <a href="index.php?act=index" class="sidebar-link sidebar-title" href="javascript:void(0)">
                                       
                                        <span>Trở về trang người dùng</span>
                                    </a>
                                </li>
                                
                            </ul>
                        </div>

                        <div class="right-arrow" id="right-arrow">
                            <i data-feather="arrow-right"></i>
                        </div>
                    </nav>
                </div>
            </div>

</div>