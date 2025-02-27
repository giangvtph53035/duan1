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
                                        <h5>Tất cả danh mục</h5>
                                        <form class="d-inline-flex">
                                            <a href="index.php?act=category-add"
                                                class="align-items-center btn btn-theme d-flex">
                                                <i data-feather="plus-square"></i>Thêm Mới danh mục
                                            </a>
                                        </form>
                                    </div>

                                    <div class="table-responsive category-table">
                                        <div>
                                            <table class="table all-package theme-table" id="table_id">
                                                <thead>
                                                    <tr>
                                                        <th>Tên Danh Mục</th>
                                                        <th>ID Danh Mục</th>
                                                        <th>Ảnh Danh Mục</th>
                                                        <th>Trạng thái</th>
                                                        <th>Thao tác</th>
                                                    </tr>
                                                </thead>

                                                <tbody>
                                                    <?php foreach($listDM as $danhmuc) :  ?>
                                                    <tr>
                                                        <td> <?= $danhmuc['name'] ?></td>

                                                        <td><?= $danhmuc['category_Id'] ?></td>
                                                        <td>
                                                            <div class="table-image">
                                                                <img src="./images/category/<?= $danhmuc['image'] ?>" class="img-fluid"
                                                                    alt="">
                                                            </div>
                                                        </td>


                                                        <td><?= $danhmuc['status'] ?></td>

                                                        <td>
                                                            <ul>

                                                                <li>
                                                                    <a href="index.php?act=category-edit&id=<?= $danhmuc['category_Id'] ?>">
                                                                        <i class="ri-pencil-line"></i>
                                                                    </a>
                                                                </li>

                                                                <!-- <li>
                                                                    <a href="index.php?act=category-delete&id=<?= $danhmuc['category_Id'] ?>" onclick="return confirm('Bạn có chắc muốn xóa?')" >
                                                                        <i class="ri-delete-bin-line"></i>
                                                                    </a>
                                                                </li> -->
                                                            </ul>
                                                        </td>
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