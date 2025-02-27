<?php
include '../views/admin/layout/header.php';
?>
<div class="page-body-wrapper">
    <div class="page-body">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="title-header option-title">
                                        <h5>Tạo mã giảm giá</h5>
                                        <br>
                                    </div>


                                    <div class="tab-content" id="pills-tabContent">
                                        <div class="tab-pane fade show active" id="pills-home" role="tabpanel">
                                            <form class="theme-form theme-form-2 mega-form" action="index.php?act=coupon-update&&coupon_id=<?= $coupon['coupon_Id'] ?>" method="post">
                                                <!-- Coupon Name -->
                                                <div class="mb-4 row align-items-center">
                                                    <label class="form-label-title col-lg-2 col-md-3 mb-0">Tên mã giảm giá</label>
                                                    <div class="col-md-9 col-lg-10">
                                                        <input class="form-control" type="text" name="name" value="<?= $coupon['name'] ?>" placeholder="Nhập tên mã giảm giá">
                                                    </div>
                                                    <?php if (isset($_SESSION['errors']['name'])) : ?>
                                                        <p class="text-danger"><?= $_SESSION['errors']['name'] ?></p>
                                                    <?php endif; ?>
                                                </div>

                                                <!-- Coupon Type -->
                                                <div class="mb-4 row align-items-center">
                                                    <label class="col-sm-2 col-form-label form-label-title">Kiểu mã giảm giá</label>
                                                    <div class="col-sm-10">
                                                        <select class="form-control" name="coupon_type">
                                                            <option disabled>Chọn kiểu mã giảm giá</option>
                                                            <option value="percentage" <?= $coupon['coupon_type'] == 'percentage' ? 'selected' : '' ?>>Giảm phần trăm</option>
                                                            <option value="fixed-Amount" <?= $coupon['coupon_type'] == 'fixed-Amount' ? 'selected' : '' ?>>Giảm cố định</option>
                                                        </select>
                                                    </div>
                                                    <?php if (isset($_SESSION['errors']['coupon_type'])) : ?>
                                                        <p class="text-danger"><?= $_SESSION['errors']['coupon_type'] ?></p>
                                                    <?php endif; ?>
                                                </div>

                                                <!-- Coupon Code -->
                                                <div class="mb-4 row align-items-center">
                                                    <label class="col-lg-2 col-md-3 col-form-label form-label-title">Code giảm giá</label>
                                                    <div class="col-md-9 col-lg-10">
                                                        <input class="form-control" type="text" name="coupon_code" value="<?= $coupon['coupon_code'] ?>" placeholder="Nhập mã giảm giá">
                                                    </div>
                                                    <?php if (isset($_SESSION['errors']['coupon_code'])) : ?>
                                                        <p class="text-danger"><?= $_SESSION['errors']['coupon_code'] ?></p>
                                                    <?php endif; ?>
                                                </div>

                                                <!-- Coupon Value -->
                                                <div class="mb-4 row align-items-center">
                                                    <label class="col-lg-2 col-md-3 col-form-label form-label-title">Giá trị giảm</label>
                                                    <div class="col-md-9 col-lg-10">
                                                        <input class="form-control" type="number" name="coupon_value" value="<?= $coupon['coupon_value'] ?>" placeholder="Giá trị mã giảm giá">
                                                    </div>
                                                    <?php if (isset($_SESSION['errors']['coupon_value'])) : ?>
                                                        <p class="text-danger"><?= $_SESSION['errors']['coupon_value'] ?></p>
                                                    <?php endif; ?>
                                                </div>

                                                <!-- Start Date -->
                                                <div class="mb-4 row align-items-center">
                                                    <label class="col-lg-2 col-md-3 col-form-label form-label-title">Ngày bắt đầu</label>
                                                    <div class="col-md-9 col-lg-10">
                                                        <input class="form-control" type="date" value="<?= $coupon['start_date'] ?>" name="start_date">
                                                    </div>
                                                    <?php if (isset($_SESSION['errors']['start_date'])) : ?>
                                                        <p class="text-danger"><?= $_SESSION['errors']['start_date'] ?></p>
                                                    <?php endif; ?>
                                                </div>

                                                <!-- End Date -->
                                                <div class="mb-4 row align-items-center">
                                                    <label class="col-lg-2 col-md-3 col-form-label form-label-title">Ngày kết thúc</label>
                                                    <div class="col-md-9 col-lg-10">
                                                        <input class="form-control" type="date" value="<?= $coupon['end_date'] ?>" name="end_date">
                                                    </div>
                                                    <?php if (isset($_SESSION['errors']['end_date'])) : ?>
                                                        <p class="text-danger"><?= $_SESSION['errors']['end_date'] ?></p>
                                                    <?php endif; ?>
                                                </div>

                                                <!-- Quantity -->
                                                <div class="mb-4 row align-items-center">
                                                    <label class="col-lg-2 col-md-3 col-form-label form-label-title">Số lượng</label>
                                                    <div class="col-md-9 col-lg-10">
                                                        <input class="form-control" type="number" value="<?= $coupon['quantity'] ?>" name="quantity" placeholder="Số lượng mã giảm giá">
                                                    </div>
                                                    <?php if (isset($_SESSION['errors']['quantity'])) : ?>
                                                        <p class="text-danger"><?= $_SESSION['errors']['quantity'] ?></p>
                                                    <?php endif; ?>
                                                </div>

                                                <!-- Status -->
                                                <div class="row align-items-center">
                                                    <label class="form-label-title col-lg-2 col-md-3 mb-0">Trạng thái</label>

                                                    <div class="col-sm-10">
                                                        <select class="form-control" name="status">
                                                            <option disabled>Chọn kiểu mã giảm giá</option>
                                                            <option value="active" <?= $coupon['status'] == 'active' ? 'selected' : '' ?>>Đang hoạt động</option>
                                                            <option value="hidden" <?= $coupon['status'] == 'hidden' ? 'selected' : '' ?>>Dừng hoạt động</option>
                                                        </select>

                                                        <?php if (isset($_SESSION['errors']['status'])) : ?>
                                                            <p class="text-danger"><?= $_SESSION['errors']['status'] ?></p>
                                                        <?php endif; ?>

                                                    </div>
                                                </div>

                                                <!-- Submit Button -->
                                                <div class="mt-4">
                                                    <button class="btn btn-primary" name="coupon-update" type="submit">Cập nhật Giảm Giá</button>
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
        </div>
    </div>
</div>
<?php
unset($_SESSION['errors']);
include '../views/admin/layout/footer.php';
?>