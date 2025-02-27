<?php include '../views/client/layout/header.php';
?>

<!-- START SECTION BREADCRUMB -->
<div class="breadcrumb_section bg_gray page-title-mini">
    <div class="container"><!-- STRART CONTAINER -->
        <div class="row align-items-center">
            <div class="col-md-6">
                <div class="page-title">
                    <h1>Đăng ký</h1>
                </div>
            </div>
        </div>
    </div><!-- END CONTAINER-->
</div>
<!-- END SECTION BREADCRUMB -->

<!-- START MAIN CONTENT -->
<div class="main_content">

    <!-- START LOGIN SECTION -->
    <div class="login_register_wrap section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-6 col-md-10">
                    <div class="login_wrap">
                        <div class="padding_eight_all bg-white">
                            <div class="heading_s1">
                                <h3>Tạo tài khoản</h3>
                            </div>
                            <form method="post" action="index.php?act=register">
                                <div class="form-group mb-3">
                                    <label for="name">Họ và tên:</label>
                                    <input type="text" class="form-control" name="name" placeholder="Nhập tên của bạn">
                                    <?php if(isset($_SESSION['errors']['name'])) : ?>
                                        <p class="text-danger"><?= $_SESSION['errors']['name'] ?></p>
                                        <?php endif; ?>
                                </div>
                                <div class="form-group mb-3">
                                    <label for="email">Email:</label>
                                    <input type="text" class="form-control" name="email" placeholder="Nhập email của bạn">
                                    <?php if(isset($_SESSION['errors']['email'])) : ?>
                                        <p class="text-danger"><?= $_SESSION['errors']['email'] ?></p>
                                        <?php endif; ?>
                                </div>
                                <div class="form-group mb-3">
                                    <label for="password">Mật khẩu:</label>
                                    <input class="form-control" type="password" name="password" placeholder="Mật khẩu">
                                    <?php if(isset($_SESSION['errors']['password'])) : ?>
                                        <p class="text-danger"><?= $_SESSION['errors']['password'] ?></p>
                                        <?php endif; ?>
                                </div>
                                <div class="login_footer form-group mb-3">
                                    <div class="chek-form">
                                        <div class="custome-checkbox">
                                            <input class="form-check-input" type="checkbox" name="checkbox" id="exampleCheckbox2" value="">
                                            <label class="form-check-label" for="exampleCheckbox2"><span> Tôi đồng ý với các điều khoản &amp; Chính sách.</span></label>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group mb-3">
                                    <button type="submit" class="btn btn-fill-out btn-block" name="register">Đăng ký</button>
                                </div>
                            </form>
                            <div class="different_login">
                                <span>hoặc</span>
                            </div>
                            <ul class="btn-login list_none text-center">
                                <li><a href="#" class="btn btn-facebook"><i class="ion-social-facebook"></i>Facebook</a></li>
                                <li><a href="#" class="btn btn-google"><i class="ion-social-googleplus"></i>Google</a></li>
                            </ul>
                            <div class="form-note text-center">Bạn đã có tài khoản?<a href="index.php?act=login">Đăng nhập</a></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END LOGIN SECTION -->

</div>
<!-- END MAIN CONTENT -->
<?php 
unset($_SESSION['errors']);
include '../views/client/layout/footer.php' 
?>