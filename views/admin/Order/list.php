<?php
include '../views/admin/layout/header.php';
?>
 <div class="page-body-wrapper">
 <div class="page-body">
                <!-- Table Start -->
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="card card-table">
                                <div class="card-body">
                                    <div class="title-header option-title">
                                        <h5>Danh sách đơn hàng</h5>
                                      
                                    </div>
                                    <div>
                                        <div class="table-responsive">
                                            <table class="table all-package order-table theme-table" id="table_id">
                                                <thead>
                                                    <tr>
                                                        <th>Mã Đơn hàng</th>
                                                        <th>Ngày mua</th>
                                                        <th>Khách hàng</th>
                                                        <th>Tổng tiền</th>
                                                        <th>Trạng thái đơn hàng</th>
                                                        <th>Hành động</th>
                                                    </tr>
                                                </thead>

                                                <tbody>
                                                    <?php foreach($listOrder as $order) :?>
                                                    <tr data-bs-toggle="offcanvas" href="#order-details">
                                                       

                                                        <td> #<?= $order['order_details_Id'] ?> </td>

                                                        <td><?= date('M d, Y',strtotime($order['created_at']))?></td>

                                                        <td><?= $order['name'] ?></td>

                                                        <td><?= number_format($order['amount'])?> <span> VNĐ</span></td>

                                                        <td>
                                                            <?= $order['status']?>
                                                        </td>

                                                        

                                                        <td>
                                                            <ul>
                                                                <li>
                                                                    <a href="index.php?act=order-edit&order_details_Id=<?=$order['order_details_Id']?>">
                                                                        <i class="ri-pencil-line"></i>
                                                                    </a>
                                                                </li>

                                                                <li>
                    
                                                                    <a href="index.php?act=order-delete&order_details_Id=<?=$order['order_details_Id']?>" >
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
                            </div>
                        </div>
                    </div>
                </div>
                </div>
        <!-- Page Body End-->
    </div>

<?php
include '../views/admin/layout/footer.php';
?>