<?php
include '../views/admin/layout/header.php';
?>
  <div class="page-body-wrapper">

  <div class="page-body">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="card card-table">
                                <div class="card-body">
                                    <div class="title-header option-title">
                                        <h5>Coupon List</h5>
                                        <div class="right-options">
                                            <ul>
                                                <li>
                                                    <a class="btn btn-solid" href="add-new-product.html">Add Coupon</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="table-responsive">
                                            <table class="table all-package coupon-list-table table-hover theme-table"
                                                id="table_id">
                                                <thead>
                                                    <tr>
                                                        <th>Tên Mã giảm giá</th>
                                                        <th>Giảm giá</th>
                                                        <th>Mã giảm giá</th>
                                                        <th>Ngày bắt đầu</th>
                                                        <th>Ngày kết thúc</th>
                                                        <th>Trạng thái</th>
                                                        <th>Thao tác</th>
                                                    </tr>
                                                </thead>

                                                <tbody>
                                                    <?php foreach($listCp as $coupon):?>
                                                    <tr>
                                                        <td><?= $coupon['name']?></td>

                                                        <?php if($coupon['coupon_type'] == 'percentage'):?>
                                                        <td><?= $coupon['coupon_value']?> <span>%</span></td>
                                                        <?php elseif( $coupon['coupon_type'] == 'fixed-Amount'): ?>
                                                        <td><?= number_format( $coupon['coupon_value'], 0 ,
                                                         ',', '.')*1000 ?> <span>VNĐ</span></td>
                                                        <?php endif; ?> 
                                                        <td class="theme-color"><?= $coupon['coupon_code']?></td>
                                                        <td class="theme-color"><?= $coupon['start_date']?></td>
                                                        <td class="theme-color"><?= $coupon['end_date']?></td>
                                                        <?php if($coupon['status'] == 'active'):?>
                                                        <td class="menu-status">
                                                            <span class="success">Đang hoạt động</span>
                                                        </td>
                                                        <?php elseif( $coupon['status'] == 'hidden'): ?>
                                                            <td class="menu-status">
                                                            <span class="danger">Dừng hoạt động</span>
                                                        </td>
                                                        <?php endif; ?> 
                                                        <td>
                                                            <ul>
                                                            <li>
                                                                    <a href="index.php?act=coupon-detail&coupon_id=<?= $coupon['coupon_Id'] ?>">
                                                                        <i class="ri-eye-line"></i>
                                                                    </a>
                                                                </li>
                                                                <li>
                                                                    <a href="index.php?act=coupon-edit&coupon_id=<?= $coupon['coupon_Id'] ?>">
                                                                        <i class="ri-pencil-line"></i>
                                                                    </a>
                                                                </li>

                                                                <li>
                                                                    <a href="index.php?act=coupon-delete&coupon_id=<?= $coupon['coupon_Id'] ?>"
                                                                        onclick="return confirm('Bạn có muốn xóa mã giảm giá này không?')">
                                                                        <i class="ri-delete-bin-line"></i>
                                                                    </a>
                                                                </li>
                                                            </ul>
                                                        </td>
                                                    </tr>
                                                    <?php endforeach;?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <!-- Pagination End -->
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Container-fluid Ends-->

                <!-- footer start-->
                <div class="container-fluid">
                    <footer class="footer">
                        <div class="row">
                            <div class="col-md-12 footer-copyright text-center">
                                <p class="mb-0">Copyright 2022 © Fastkart theme by pixelstrap</p>
                            </div>
                        </div>
                    </footer>
                </div>
            </div>
  </div>


<?php
include '../views/admin/layout/footer.php';
?>