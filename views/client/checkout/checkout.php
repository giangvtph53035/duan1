<?php
include '../views/client/layout/header.php';
?>

<div class="main_content">
    <!-- START SECTION SHOP -->
    <div class="section">
        <div class="container">

            <div class="row">
                <div class="col-12">
                    <div class="medium_divider"></div>
                    <div class="divider center_icon"><i class="linearicons-credit-card"></i></div>
                    <div class="medium_divider"></div>
                </div>
            </div>
            <div class="row">
                <form action="index.php?act=order" method="post" class="col-md-12">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="heading_s1">
                            <h4 class="mb-4">Thông tin thanh toán</h4>
                            </div>
                            
                            <div class="form-group mb-3">
                                <input type="text" required class="form-control" value="<?= $user['name'] ?>" name="name" placeholder="Tên người nhận ">
                            </div>
                            <div class="form-group mb-3">
                                <input type="text" class="form-control" value="<?= $user['address'] ?>" name="address" required placeholder="Địa chỉ ">
                            </div>
                            <div class="form-group mb-3">
                                <input class="form-control" required type="text" value="<?= $user['phone'] ?>" name="phone" placeholder="Số điện thoại ">
                            </div>
                            <div class="form-group mb-3">
                                <input class="form-control" required type="email" value="<?= $user['email'] ?>" name="email" placeholder="Địa chỉ email">
                            </div>
                            <div class="heading_s1">
                                <h4>Thông tin bổ sung</h4>
                            </div>
                            <div class="form-group mb-0">
                                <textarea rows="5" class="form-control" name="note" placeholder="Ghi chú đơn hàng (ví dụ: thời gian giao hàng cụ thể)"></textarea>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="order_review">
                                <div class="heading_s1">
                                    <h4>Đơn hàng của bạn</h4>
                                </div>
                                <div class="table-responsive order_table">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>Sản phẩm</th>
                                                <th>Giá sản phẩm</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($carts as $cart): ?>
                                                <tr>
                                                    <td><?= $cart['pr_name'] ?> <span>x <?= $cart['cart_quantity'] ?></span></td>
                                                    <td><?= number_format($cart['pr_variant_sale_price']) ?> <span>VNĐ</span></td>


                                                </tr>
                                            <?php endforeach; ?>
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <th>Giá sản phẩm</th>
                                                <td class="product-subtotal">
                                                    <?= number_format($_SESSION['total']) ?>
                                                     <span> VNĐ</span></td>
                                            </tr>
                                            <?php
                                            if (!isset($_SESSION['coupon_code']) || empty($_SESSION['coupon_code'])) {
                                                $_SESSION['coupon_code'] = 0; // Gán giá trị mặc định là 0 nếu chưa có mã giảm giá
                                                $_SESSION['totalCp'] = 0; // Gán giá trị mặc định là 0 cho tổng giảm giá nếu cần
                                            }
                                            ?>
                                            <?php if(isset($_SESSION['coupon_code'])) : ?>
                                                <tr>
                                                    <th>Mã giảm giá</th>
                                                    <p> </p>

                                                    <td class="product-subtotal">
                                                        <input type="hidden" name="coupon_Id" value="<?= ($_SESSION['coupon_code']['coupon_Id']) ?? null ?>">
                                                        <?= number_format($_SESSION['totalCp']) ?> <span> VNĐ</span>
                                                    </td>
                                                </tr>
                                            <?php endif; ?>
                                            <tr>
                                                <th>Vận chuyển</th>
                                                <td>
                                                    <?php foreach ($ships as $ship) : ?>
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="radio" name="shipping_Id"  value="<?= $ship['ship_Id'] ?>" checked>
                                                            <label class="form-check-label" for="shipping_fast"><?= $ship['shipping_name'] ?> <br> <?= number_format($ship['shipping_prices'])  ?> <span>VNĐ</span></label>
                                                        </div>
                                                    <?php endforeach; ?>

                                                </td>
                                            </tr>
                                            <tr>
                                                <th>Tổng tiền</th>
                                                <?php if(isset($_SESSION['coupon_code'])) : ?>
                                                    <td class="product-subtotal"><?= number_format(($_SESSION['total'] - $_SESSION['totalCp'])+ $ship['shipping_prices'],0,',','.') ?></td>
                                                    <input type="hidden" name="amount" value="<?= $_SESSION['total'] - $_SESSION['totalCp'] ?>">
                                                <?php else : ?>
                                                    <td class="product-subtotal"><?= number_format($_SESSION['total'] ,0,',','.') ?></td>
                                                    <input type="hidden" name="amount" value="<?=$_SESSION['total']?>">
                                                <?php endif; ?>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                                <div class="payment_method">
                                    <div class="heading_s1">
                                        <h4>Thanh toán</h4>
                                    </div>
                                    <div class="payment_option">
                                        <div class="custome-radio">
                                            <input class="form-check-input" type="radio" name="payment_method" id="cod" value="cod">
                                            <label class="form-check-label" for="cod">COD (Cash on Delivery)</label>
                                        </div>
                                        <div class="custome-radio">
                                            <input class="form-check-input" type="radio" name="payment_method" id="vnpay" value="vnpay">
                                            <label class="form-check-label" for="vnpay">VNPAY</label>
                                        </div>
                                    </div>
                                </div>
                                <button type="submit" name="checkout" id="checkout-btn" class="btn btn-fill-out btn-block">Đặt hàng ngay</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- END SECTION SHOP -->
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const checkoutBtn =document.getElementById('checkout-btn');
        const paymentMethods =[
            {
                Element:document.getElementById('vnpay'),
                name: 'vnpay'
            },
            {
                Element:document.getElementById('cod'),
                name: 'checkout'
            }
        ]
        paymentMethods.forEach(paymentMethod => {
            paymentMethod.Element.addEventListener('change', function() {
                if(this.checked){
                checkoutBtn.setAttribute('name',  paymentMethod.name);
                console.log('button name is now:', paymentMethod.name);
            }    
            })
           
        })
    })

</script>


<?php
include '../views/client/layout/footer.php';
?>