<?php  include '../views/client/layout/header.php';?>

<div class="login_register_wrap section">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-6 col-md-10">
                <div class="login_wrap">
                    <div class="padding_eight_all bg-white">
                        <div class="heading_s1">
                            <h3>Đặt lại mật khẩu</h3>
                        </div>
                        <form method="POST">
                            <div class="form-group mb-3">
                                <label for="email">Email:</label>
                                <input type="email" name="email" class="form-control" placeholder="Nhập email của bạn để đặt lại mật khẩu">
                                <?php if (isset($_SESSION['errors']['email'])) : ?>
                                    <p class="text-danger"><?= $_SESSION['errors']['email'] ?></p>
                                <?php endif; ?>
                            </div>
                            <div class="form-group mb-3">
                                <label for="password">Mật khẩu mới:</label>
                                <input type="password" name="password" class="form-control"  placeholder="Nhập mật khẩu mới">
                                <?php if (isset($_SESSION['errors']['password'])) : ?>
                                    <p class="text-danger"><?= $_SESSION['errors']['password'] ?></p>
                                <?php endif; ?>
                            </div>
                            <div class="form-group mb-3">
                                <button type="submit" name="reset" class="btn btn-fill-out btn-block">Đặt lại mật khẩu</button>
                            </div>
                            <?php if (isset($_SESSION['errors']['reset'])) : ?>
                                <p class="text-danger"><?= $_SESSION['errors']['reset'] ?></p>
                            <?php endif; ?>
                        </form>

                        <div class="form-note text-center"><a href="index.php?act=login">Quay lại đăng nhập</a></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<?php  include '../views/client/layout/footer.php';?>