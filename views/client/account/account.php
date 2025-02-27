<?php
include '../views/client/layout/header.php';
?>


<?php
if (isset($_SESSION['user'])) {
    $email = $_SESSION['user']['email'];
    $userModel = new User();
    $userData = $userModel->getUserByEmail($email);
} else {
    echo "Chưa đăng nhập";
}

?>
<!-- START SECTION BREADCRUMB -->
<div class="breadcrumb_section bg_gray page-title-mini">
    <div class="container"><!-- STRART CONTAINER -->
        <div class="row align-items-center">
            <div class="col-md-6">
                <div class="page-title">
                    <h1>My Account</h1>
                </div>
            </div>
            <div class="col-md-6">
                <ol class="breadcrumb justify-content-md-end">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item"><a href="#">Pages</a></li>
                    <li class="breadcrumb-item active">My Account</li>
                </ol>
            </div>
        </div>
    </div><!-- END CONTAINER-->
</div>
<!-- END SECTION BREADCRUMB -->

<!-- START MAIN CONTENT -->
<div class="main_content">

    <!-- START SECTION SHOP -->
    <div class="section">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-4">
                    <div class="dashboard_menu">
                        <ul class="nav nav-tabs flex-column" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="dashboard-tab" data-bs-toggle="tab" href="#dashboard" role="tab" aria-controls="dashboard" aria-selected="false"><i class="ti-layout-grid2"></i>Dashboard</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="orders-tab" data-bs-toggle="tab" href="#orders" role="tab" aria-controls="orders" aria-selected="false"><i class="ti-shopping-cart-full"></i>Orders</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="account-detail-tab" data-bs-toggle="tab" href="#account-detail" role="tab" aria-controls="account-detail" aria-selected="true"><i class="ti-id-badge"></i>Account details</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="change-password-tab" data-bs-toggle="tab" href="#change-password1" role="tab" aria-controls="change-password1" aria-selected="true">
                                    <i class="fas fa-key"></i> Change Password
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="index.php?act=logout" onclick="return confirm('Bạn có muốn đăng xuất không?');"><i class="ti-lock"></i>Logout</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-9 col-md-8">
                    <div class="tab-content dashboard_content">
                        <div class="tab-pane fade active show" id="dashboard" role="tabpanel" aria-labelledby="dashboard-tab">
                            <div class="card">
                                <div class="card-header">
                                    <h3>Dashboard</h3>
                                </div>
                                <div class="card-body">
                                    <h2>Xin chào, <b><?= $userData['name']; ?>!</b></h2>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="orders" role="tabpanel" aria-labelledby="orders-tab">
                            <div class="card">
                                <div class="card-header">
                                    <h3>Đơn hàng</h3>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th>ID đơn hàng</th>
                                                    <th>Ngày đặt đơn hàng</th>
                                                    <th>Trạng thái đơn hàng</th>
                                                    <th>Tổng giá đơn hàng</th>
                                                    <th>hành động</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php foreach ($listOrder as $order) : ?>
                                                    <tr>
                                                        <td><?= $order['order_details_Id'] ?></td>
                                                        <td><?= date('F d, Y \a\t g:i a', strtotime($order['created_at'])) ?></td>
                                                        <td><?php
                                                            if ($order['status'] == 'Pending') {
                                                                echo 'Đang chờ';
                                                            } elseif ($order['status'] == 'Confirmed') {
                                                                echo 'Đã xác nhận';
                                                            } elseif ($order['status'] == 'Shipped') {
                                                                echo 'Đang vận chuyển';
                                                            } elseif ($order['status'] == 'Delivered') {
                                                                echo 'Đã nhận hàng';
                                                            } else {
                                                                echo 'Hủy đơn hàng';
                                                            }
                                                            ?></td>
                                                        <td><?= number_format($order['amount'])  ?> <span>VNĐ</span></td>
                                                        <td>
                                                            <a href="index.php?act=track-order&order_details_Id=<?= $order['order_details_Id'] ?>" class="btn btn-fill-out btn-sm">Chi tiết</a>
                                                            <?php if ($order['status'] == 'Pending') : ?>
                                                                <a href="index.php?act=cancel-order&order_details_Id=<?= $order['order_details_Id'] ?>" class="btn btn-fill-out btn-sm" onclick="return confirm('Bạn có chắc muốn hủy đơn ')">Hủy</a>
                                                            <?php endif; ?>

                                                        </td>
                                                    </tr>
                                                <?php endforeach; ?>

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="address" role="tabpanel" aria-labelledby="address-tab">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="card mb-3 mb-lg-0">
                                        <div class="card-header">
                                            <h3>Billing Address</h3>
                                        </div>
                                        <div class="card-body">
                                            <address>House #15<br>Road #1<br>Block #C <br>Angali <br> Vedora <br>1212</address>
                                            <p>New York</p>
                                            <a href="#" class="btn btn-fill-out">Edit</a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="card">
                                        <div class="card-header">
                                            <h3>Shipping Address</h3>
                                        </div>
                                        <div class="card-body">
                                            <address>House #15<br>Road #1<br>Block #C <br>Angali <br> Vedora <br>1212</address>
                                            <p>New York</p>
                                            <a href="#" class="btn btn-fill-out">Edit</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="account-detail" role="tabpanel" aria-labelledby="account-detail-tab">
                            <div class="card">
                                <div class="card-header">
                                    <h3>Thông tin người dùng</h3>
                                </div>
                                <div class="card-body">
                                    <form method="post" action="index.php?act=update-acc" enctype="multipart/form-data">
                                        <div class="row">
                                            <div class="form-group col-md-12 mb-3">
                                                <label>Tên <span class="required">*</span></label>
                                                <input class="form-control" name="name" type="text" value="<?= $userData['name']; ?>">
                                                <?php if (isset($_SESSION['errors']['name'])) : ?>
                                                    <p class="text-danger"><?= $_SESSION['errors']['name'] ?></p>
                                                <?php endif; ?>
                                            </div>
                                            <div class="form-group col-md-12 mb-3">
                                                <label>Số điện thoại <span class="required">*</span></label>
                                                <input class="form-control" name="phone" type="text" value="<?= $userData['phone']; ?>">
                                                <?php if (isset($_SESSION['errors']['phone'])) : ?>
                                                    <p class="text-danger"><?= $_SESSION['errors']['phone'] ?></p>
                                                <?php endif; ?>
                                            </div>
                                            <div class="form-group col-md-12 mb-3">
                                                <label>Địa chỉ<span class="required">*</span></label>
                                                <input class="form-control" name="address" type="text" value="<?= isset($userData['address']) ? $userData['address'] : ''; ?>">
                                                <?php if (isset($_SESSION['errors']['address'])) : ?>
                                                    <p class="text-danger"><?= $_SESSION['errors']['address'] ?></p>
                                                <?php endif; ?>
                                            </div>
                                            <div class="form-group col-md-12 mb-3">
                                                <label>Email <span class="required">*</span></label>
                                                <input class="form-control" name="email" type="email" readonly value="<?= $userData['email']; ?>">
                                                <?php if (isset($_SESSION['errors']['email'])) : ?>
                                                    <p class="text-danger"><?= $_SESSION['errors']['email'] ?></p>
                                                <?php endif; ?>
                                            </div>
                                            <div class="form-group col-md-12 mb-3">
                                                <label>Giới tính <span class="required">*</span></label>
                                                <select name="gender" class="form-control first_null not_chosen" aria-label="Giới tính">
                                                    <option value="" disabled>Chọn giới tính</option>
                                                    <option value="Nam" <?= $_SESSION['user']['gender'] == 'Nam' ? 'selected' : '' ?>>Nam</option>
                                                    <option value="Nu" <?= $_SESSION['user']['gender'] == 'Nu' ? 'selected' : '' ?>>Nữ</option>
                                                    <option value="Other" <?= $_SESSION['user']['gender'] == 'Other' ? 'selected' : '' ?>>Khác</option>
                                                </select>
                                                <?php if (isset($_SESSION['errors']['gender'])) : ?>
                                                    <p class="text-danger"><?= $_SESSION['errors']['gender'] ?></p>
                                                <?php endif; ?>
                                            </div>

                                            <!-- Avatar file upload input -->
                                            <div class="form-group col-md-12 mb-3">
                                                <label for="avatar">Avatar</label>
                                                <input type="file" class="form-control" name="avatar" id="avatar">
                                                <input type="hidden" name="old_avatar" value="<?= $userData['avatar']; ?>">
                                                <?php if (isset($_SESSION['errors']['avatar'])) : ?>
                                                    <p class="text-danger"><?= $_SESSION['errors']['avatar'] ?></p>
                                                <?php endif; ?>
                                            </div>

                                            <div class="col-md-12">
                                                <button type="submit" class="btn btn-fill-out" name="update-acc">Save</button>
                                            </div>
                                        </div>
                                    </form>

                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="change-password1" role="tabpanel" aria-labelledby="change-password-tab">
                            <div class="card">
                                <div class="card-header">
                                    <h3>Đổi mật khẩu</h3>
                                </div>
                                <div class="card-body">
                                    <form method="post" action="index.php?act=change-pass">

                                        <div class="row">
                                            <div class="form-group col-md-12 mb-3">
                                                <label>Nhập mật khẩu cũ <span class="required">*</span></label>
                                                <input class="form-control" name="old_pass" type="password" value="">
                                                <?php if (isset($_SESSION['error']['old_pass'])) : ?>
                                                    <p class="text-danger"><?= $_SESSION['error']['old_pass'] ?></p>
                                                <?php endif; ?>
                                            </div>

                                            <div class="form-group col-md-12 mb-3">
                                                <label>Nhập mật khẩu mới <span class="required">*</span></label>
                                                <input class="form-control" name="new_pass" type="password" value="">
                                                <?php if (isset($_SESSION['error']['new_pass'])) : ?>
                                                    <p class="text-danger"><?= $_SESSION['error']['new_pass'] ?></p>
                                                <?php endif; ?>
                                            </div>

                                            <div class="form-group col-md-12 mb-3">
                                                <label>Nhập lại mật khẩu mới <span class="required">*</span></label>
                                                <input class="form-control" name="re_pass" type="password" value="">
                                                <?php if (isset($_SESSION['error']['re_pass'])) : ?>
                                                    <p class="text-danger"><?= $_SESSION['error']['re_pass'] ?></p>
                                                <?php endif; ?>
                                            </div>

                                            <div class="col-md-12">
                                                <button type="submit" class="btn btn-fill-out" name="change-password">Cập nhật</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END SECTION SHOP -->


</div>
<!-- END MAIN CONTENT -->

<?php
unset($_SESSION['errors']);
include '../views/client/layout/footer.php';
?>