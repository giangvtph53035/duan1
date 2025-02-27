<?php
include '../views/client/layout/header.php';
?>

<div class="page-body-wrapper">
    <div class="page-body">
        <div class="container mt-5">
            <div class="row">
                <div class="col-md-8">
                    <h2>Chi Tiết Đơn Hàng</h2>
                    <p>Cảm ơn bạn đã mua hàng tại chúng tôi. Dưới đây là chi tiết đơn hàng của bạn.</p>

                    <h4>Thông Tin Khách Hàng</h4>
                    <ul class="list-group mb-4">
                        <li class="list-group-item"><strong>Họ Tên:</strong> <?= $getOrderDetailId['name'] ?></li>
                        <li class="list-group-item"><strong>Email:</strong> <?= $getOrderDetailId['email'] ?></li>
                        <li class="list-group-item"><strong>Địa Chỉ:</strong> <?= $getOrderDetailId['address'] ?></li>
                        <li class="list-group-item"><strong>Số Điện Thoại:</strong> <?= $getOrderDetailId['phone'] ?></li>
                        <li class="list-group-item"><strong>Ngày đặt:</strong> <?= date('F d, Y \a\t g:i a', strtotime($getOrderDetailId['created_at'])) ?> </li>
                        <li class="list-group-item"><strong>Ngày xác nhận:</strong> <?= date('F d, Y \a\t g:i a', strtotime($getOrderDetailId['updated_at'])) ?></li>
                        <li class="list-group-item"><strong>Phương thức thanh toán:</strong> <?= $getOrderDetailId['payment_method'] ?></li>
                    </ul>
                    <br>

                    <h4>Danh Sách Sản Phẩm</h4>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Mã đơn hàng</th>
                                <th>Sản Phẩm</th>
                                <th>Giá</th>
                                <th>Số Lượng</th>
                                <th>Tổng</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($getOrderId as $order): ?>
                                <tr>
                                    <td>#<?= $order['order_detail_id'] ?></td>
                                    <td><?= $order['pr_name'] ?></td>
                                    <td><?= number_format($order['variant_sale_price']) ?></td>
                                    <td><?= $order['quantity'] ?></td>
                                    <td><?= number_format(($order['variant_sale_price']) * $order['quantity']) ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                    <br>
                    <br>

                </div>
                <div class="col-md-4">
                    <h3>Tổng Kết Đơn Hàng</h3>
                    <ul class="list-group">
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            Giá sản phẩm
                            <span class="badge bg-success rounded-pill"><?= number_format($getOrderDetailId['amount']  ) ?> <span>VNĐ</span></span>
                        </li>
                        <?php if (!empty($getCouponId)) : ?>
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                Mã giảm giá
                                <span class="badge bg-success rounded-pill"><?= number_format($useCoupon) ?> <span>VNĐ</span></span>
                            </li>
                        <?php else : ?>
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                Mã giảm giá
                                <span class="badge bg-warning rounded-pill">0đ</span>
                            </li>
                        <?php endif; ?>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            Phí vận chuyển
                            <span class="badge bg-warning rounded-pill"><?= number_format($getShipId['shipping_prices']) ?> <span>VNĐ</span></span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            Tổng Cộng
                            <span class="badge bg-danger rounded-pill"><?= number_format(($getOrderDetailId['amount'] - $useCoupon) + $getShipId['shipping_prices']) ?> <span>VNĐ</span></span>
                        </li>
                    </ul>
                    <p class="mt-3">Trạng Thái Đơn Hàng:
                        <?php
                        if ($getOrderDetailId['status'] == 'Pending') {
                            echo 'Đang chờ';
                        } elseif ($getOrderDetailId['status'] == 'Confirmed') {
                            echo 'Đã xác nhận';
                        } elseif ($getOrderDetailId['status'] == 'Shipped') {
                            echo 'Đang vận chuyển';
                        } elseif ($getOrderDetailId['status'] == 'Delivered') {
                            echo 'Đã nhận hàng';
                        } else {
                            echo 'Đã hủy';
                        } 
                        ?> </p>
                </div>
            </div>

        </div>
    </div>

</div>

<?php
unset($_SESSION['errors']);
include '../views/client/layout/footer.php';
?>