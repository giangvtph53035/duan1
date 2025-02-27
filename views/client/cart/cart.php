<?php
include '../views/client/layout/header.php';
?>
<div class="breadcrumb_section bg_gray page-title-mini">
    <div class="container"><!-- STRART CONTAINER -->
        <div class="row align-items-center">
            <div class="col-md-6">
                <div class="page-title">
                    <h1>Shopping Cart</h1>
                </div>
            </div>
            <div class="col-md-6">
                <ol class="breadcrumb justify-content-md-end">
                    <li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
                    <li class="breadcrumb-item active">Trang giỏ hàng</li>
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
                <div class="col-12">
                    <div class="table-responsive shop_cart_table">
                        <?php if (empty($carts)): ?>
                            <div class="alert alert-warning text-center">
                                <?= isset($_SESSION['error']) ? $_SESSION['error'] : 'Giỏ hàng của bạn đang trống.' ?>
                            </div>
                        <?php else: ?>
                            <table class="table">
                                <form action="index.php?act=update-Cart" method="post">
                                    <thead>
                                        <tr>
                                            <th class="product-thumbnail">Ảnh sản phẩm</th>
                                            <th class="product-name">Tên Sản phẩm</th>
                                            <th class="product-price">Giá sản phẩm hiện tại</th>
                                            <th class="product-price">Ram</th>
                                            <th class="product-price">Bộ nhớ trong </th>
                                            <th class="product-quantity">Số lượng</th>
                                            <th class="product-remove">Xóa</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($carts as $cart): ?>
                                            <tr>
                                                <td class="product-thumbnail"><a href="#"><img src="./images/product/<?= $cart['pr_image'] ?>" alt="product1"></a></td>
                                                <td class="product-name" data-title="Product"><a href="#"><?= $cart['pr_name'] ?></a></td>
                                                <td class="product-price" data-title="Price"><?= number_format($cart['pr_variant_sale_price']) ?> <span> VNĐ</span> </td>
                                                <td class="product-name" data-title="Product"><a href="#"><?= $cart['variant_ram_name'] ?></a></td>
                                                <td class="product-name" data-title="Product"><a href="#"><?= $cart['variant_rom_name'] ?></a></td>

                                                <td class="product-quantity" data-title="Quantity">
                                                    <div class="quantity">
                                                        <input type="button" value="-" class="minus">
                                                        <input type="text" name="quantity[<?= $cart['cart_id'] ?>]" title="Qty" class="qty" size="4" value="<?= $cart['cart_quantity'] ?>">
                                                        <input type="button" value="+" class="plus">
                                                    </div>
                                                </td>
                                                <td class="product-remove" data-title="Remove"><a href="index.php?act=delete-Cart&cart_Id=<?= $cart['cart_id'] ?>" onclick="return confirm('Bạn có chắc muốn xóa sản phẩm này')"><i class="ti-close"></i></a></td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <td colspan="6" class="px-0">
                                                <div class="row g-0 align-items-center">

                                                    <div class="col-lg-4 col-md-6 mb-3 mb-md-0">
                                                        <div class="coupon field_form input-group">
                                                            <input type="text" value="" class="form-control form-control-sm" name="coupon_code" placeholder="Nhập mã giảm giá">
                                                            <div class="input-group-append">
                                                                <button class="btn btn-fill-out btn-sm" name="apply_coupon" type="submit">Áp mã giảm giá</button>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-lg-8 col-md-6  text-start  text-md-end">
                                                        <button class="btn btn-line-fill btn-sm" name="update-Cart" type="submit">Update Cart</button>
                                                    </div>
                                                </div>
                                            </td>
                                            <td></td>
                                        </tr>
                                    </tfoot>
                                </form>
                            </table>
                        <?php endif; ?>


                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="medium_divider"></div>
                    <div class="divider center_icon"><i class="ti-shopping-cart-full"></i></div>
                    <div class="medium_divider"></div>
                </div>
            </div>
            <div class="row">

                <div class="col-md-6">
                    <div class="border p-3 p-md-4">
                        <div class="heading_s1 mb-3">
                            <h6>Cart Totals</h6>
                        </div>
                        <div class="table-responsive">
                            <table class="table">
                                <tbody>
                                    <tr>
                                        <td class="cart_total_label">Tổng giá ban đầu</td>
                                        <td class="cart_total_amount"><?= number_format($sum) ?> <span> VNĐ</span> </td>
                                    </tr>
                                    <!-- <tr>
                                        <td class="cart_total_label">Mã giảm giá</td>
                                        <td class="cart_total_amount">
                                            <strong>
                                                <?php
                                                // Kiểm tra mã giảm giá đã nhập hay chưa
                                                $discount = isset($_SESSION['totalCp']) && $_SESSION['totalCp'] > 0
                                                    ? $_SESSION['totalCp']
                                                    : 0;
                                                echo number_format($discount);
                                                ?>
                                                <span>VNĐ</span>
                                            </strong>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="cart_total_label">Tổng tiền phải trả</td>
                                        <td class="cart_total_amount">
                                            <strong>
                                                <?php
                                                $total = isset($_SESSION['total']) && $_SESSION['total'] > 0 ?
                                                    (isset($_SESSION['totalCp']) ? $_SESSION['total'] - $_SESSION['totalCp'] : $_SESSION['total'])
                                                    : 0;
                                                echo number_format($total);
                                                ?>
                                                <span>VNĐ</span>
                                            </strong>
                                        </td>
                                    </tr> -->




                                    <tr>
                                        <td class="cart_total_label">Tiền Mã giảm giá</td>
                                        <?php if (isset($_SESSION['coupon_code'])): ?>
                                        <td class="cart_total_amount"><strong><?= number_format($_SESSION['totalCp']) ?> <span> VNĐ</span></strong></td>
                                        <?php else: ?>
                                            <td class="cart_total_amount"><strong>0 <span> VNĐ</span></strong></td>
                                        <?php endif; ?>
                                    </tr>
                                    
                                    <tr>
                                        <td class="cart_total_label">Total</td>
                                        <?php if (isset($_SESSION['coupon_code'])): ?>
                                        <td class="cart_total_amount"><strong><?= number_format($sum - $_SESSION['totalCp']) ?> <span> VNĐ</span></strong></td>
                                        <?php else: ?>
                                            <td class="cart_total_amount"><strong><?= number_format($sum ) ?> <span> VNĐ</span></strong></td>
                                        <?php endif; ?>
                                        
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <a href="index.php?act=checkout" class="btn btn-fill-out">Proceed To CheckOut</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php
    include '../views/client/layout/footer.php';
    ?>