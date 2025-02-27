<?php
include '../views/client/layout/header.php';
?>
<div class="breadcrumb_section bg_gray page-title-mini">
    <div class="container"><!-- STRART CONTAINER -->
        <div class="row align-items-center">
            <div class="col-md-6">
                <div class="page-title">
                    <h1>Đăng nhập</h1>
                </div>
            </div>
        </div>
    </div><!-- END CONTAINER-->
</div>
<div class="main_content">

    <!-- START LOGIN SECTION -->
    <div class="login_register_wrap section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-6 col-md-10">
                    <div class="login_wrap">
                        <div class="padding_eight_all bg-white">
                            <div class="heading_s1">
                                <h3>Đăng nhập tài khoản</h3>
                            </div>
                            <form method="post" action="?act=auth">
                                <div class="form-group mb-3">
                                    <label for="email">Email:</label>
                                    <input type="text" class="form-control" name="email" placeholder="Nhập email">
                                    <?php if (isset($_SESSION['errors']['email'])) : ?>
                                        <p class="text-danger"><?= $_SESSION['errors']['email'] ?></p>
                                    <?php endif; ?>
                                </div>
                                <div class="form-group mb-3">
                                    <label for="password">Mật khẩu:</label>
                                    <input class="form-control" type="password" name="password" placeholder="Nhập mật khẩu">
                                    <?php if (isset($_SESSION['errors']['password'])) : ?>
                                        <p class="text-danger"><?= $_SESSION['errors']['password'] ?></p>
                                    <?php endif; ?>
                                </div>
                                <div class="form-group mb-3">
                                    <button type="submit" class="btn btn-fill-out btn-block" name="auth">Đăng nhập</button>
                                </div>
                                <?php if (isset($_SESSION['errors']['login'])) : ?>
                                    <p class="text-danger"><?= $_SESSION['errors']['login'] ?></p>
                                <?php endif; ?>
                            </form>


                            <div class="different_login">
                                <span> or</span>
                            </div>
                            <ul class="btn-login list_none text-center">
                                <li><a href="#" class="btn btn-facebook"><i class="ion-social-facebook"></i>Facebook</a></li>
                                <li><a href="#" class="btn btn-google"><i class="ion-social-googleplus"></i>Google</a></li>
                            </ul>
                            <div class="form-note text-center">Bạn chưa có tài khoản?<a href="index.php?act=register">Đăng ký ngay</a></div>
                            <div class="form-note text-center"><a href="index.php?act=forgot">Quên mật khẩu?</a></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END LOGIN SECTION -->


</div>
<!-- END MAIN CONTENT -->

<?php include '../views/client/layout/footer.php' ?>