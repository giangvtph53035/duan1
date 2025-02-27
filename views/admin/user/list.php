<?php
include '../views/admin/layout/header.php';
?>

<div class="page-body-wrapper">


            <!-- Container-fluid starts-->
            <div class="page-body">
                <!-- All User Table Start -->
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="card card-table">
                                <div class="card-body">
                                    <div class="title-header option-title">
                                        <h5>Danh sách người dùng</h5>
                                        
                                    </div>

                                    <div class="table-responsive category-table">
                                        <div>
                                            <table class="table all-package theme-table" id="table_id">
                                                <thead>
                                                    <tr>
                                                        <th>Tên Người dùng</th>
                                                        <th>Email</th>
                                                        <th>Địa chỉ</th>
                                                        <th>Số điện thoại</th>
                                                       
                                                    </tr>
                                                </thead>

                                                <tbody>
                                                    <?php foreach($listUser as $user) :  ?>
                                                    <tr>
                                                        <td> <?= $user['name'] ?></td>
                                                        <td><?= $user['email'] ?></td>
                                                        <td><?= $user['address'] ?></td>
                                                       


                                                        <td><?= $user['phone'] ?></td>

                                                    </tr>
                                                    <?php endforeach;  ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- All User Table Ends-->

            </div>
            <!-- Container-fluid end -->
        </div>

<?php
include '../views/admin/layout/footer.php';
?>