<?php
include '../views/admin/layout/header.php';
?>
<div class="page-body-wrapper">
    <div class="page-body">
        <!-- Edit Order Start -->
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="row">
                        <!-- Order Details -->
                        <div class="col-lg-8">
                            <div class="card shadow-sm border-0">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between align-items-start">
                                        <div>
                                            <h4 class="fw-semibold text-dark">
                                                
                                                #<?= $getOrderDetailId['order_details_Id'] ?>
                                                <span class="badge text-dark ms-2" style="background-color: #d1e7dd; font-size: 15px;"><?= $getOrderDetailId['status']?></span>
                                            </h4>
                                            <p class="mb-0 text-muted">Order Details / #<?= $getOrderDetailId['order_details_Id'] ?> - <?= date('F d, Y \a\t g:i a', strtotime($getOrderDetailId['created_at'])) ?></p>
                                        </div>
                                    </div>
                                    <form action="index.php?act=order-update&order_details_Id=<?= $getOrderDetailId['order_details_Id'] ?>" method="post">
                                    <div class="d-flex justify-content-between align-items-center mt-4">
                                        <select name="status"  class="form-select w-auto" style="border-radius: 0;">
                                            <option value="Pending" <?= $getOrderDetailId['status'] == 'Pending'? 'selected' : '' ?>>Đang chờ</option>
                                            <option value="Confirmed" <?= $getOrderDetailId['status'] == 'Confirmed'? 'selected' : '' ?>>Đã xác nhận</option>
                                            <option value="Shipped" <?= $getOrderDetailId['status'] == 'Shipped'? 'selected' : '' ?>>Đang vận chuyển</option>
                                            <option value="Delivered" <?= $getOrderDetailId['status'] == 'Delivered'? 'selected' : '' ?>>Đã nhận hàng</option>
                                            <option value="Canceled" <?= $getOrderDetailId['status'] == 'Canceled'? 'selected' : '' ?>>Hủy đơn hàng</option>
                                        </select>
                                        <button type="submit" name="updateOrder" class="btn btn-primary ms-3">Cập nhật trạng thái</button>
                                    </div>
                                    </form>
                                </div>
                            </div>
                            

                            <!-- Product Details -->
                            <div class="card mt-4">
                                <div class="card-header">
                                    <h4 class="card-title">Product</h4>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table mb-0 table-hover">
                                            <thead class="bg-light">
                                                <tr>
                                                    <th>Tên sản phẩm và biến thể</th>
                                                    <th>Số lượng</th>
                                                    <th>Giá</th>
                                                    <th>Tổng tiền</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php foreach($getOrderId as $order) :?>
                                                <tr>
                                                    <td>
                                                        <div class="d-flex align-items-center gap-2">
                                                            <div class="rounded bg-light avatar-md">
                                                                <img src="./images/product/<?= $order['pr_image'] ?>" alt="123" class="avatar-md" width="100px" height="70px">
                                                            </div>
                                                            <div>   
                                                                <a href="#!" class="text-dark fw-medium"><?= $order['pr_name']?></a>
                                                                <p class="text-muted mb-0">Ram: <?= $order['Ram_name']?></p>
                                                                <p class="text-muted mb-0">Rom: <?= $order['Rom_name']?></p>
                                                            </div>
                                                        </div>
                                                    </td>
                                                    <td><?= $order['quantity']?></td>
                                                    <td><?= number_format($order['variant_sale_price']) ?> <span>VNĐ</span></td>
                                                    <td><?= number_format($order['variant_sale_price'] * $order['quantity']) ?> <span>VNĐ</span></td>
                                                </tr>
                                                <?php endforeach; ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Order Summary -->
                        <div class="col-lg-4">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title text-dark fs-4">Tóm tắt đơn hàng</h4>
                                </div>
                                <div class="card-body">
                                    <table class="table mb-0">
                                        <tbody>
                                            <tr>
                                                <td>Tổng cộng</td>
                                                <td class="text-end"><?= number_format($getOrderDetailId['amount']) ?> <span>VNĐ</span></td>
                                            </tr>
                                            <tr>
                                                <td>Giảm giá</td>
                                                <td class="text-end"><?= number_format($useCoupon) ?> <span>VNĐ</span></td>
                                            </tr>
                                            <tr>
                                                <td>Giao hàng;</td>
                                                <td class="text-end"><?= number_format($getShipId['shipping_prices']) ?> <span>VNĐ</span></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="card-footer d-flex justify-content-between">
                                    <p class="fw-medium mb-0">Tổng số tiền</p>
                                    <p class="fw-medium mb-0"><?= number_format(($getOrderDetailId['amount'] -$useCoupon) + $getShipId['shipping_prices']) ?> <span>VNĐ</span></p>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <!-- Edit Order End -->
    </div>
</div>
<?php
include '../views/admin/layout/footer.php';
?>