<?php
include '../views/admin/layout/header.php';
?>
<div class="page-body-wrapper">


    <div class="page-body">

        <!-- New Product Add Start -->
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="row">
                        <div class="col-sm-8 m-auto">
                            <div class="card">
                                <div class="card-body">
                                    <div class="card-header-2">
                                        <h5>Thông tin danh mục</h5>
                                    </div>
                                    <form action="index.php?act=category-add" method="post" enctype="multipart/form-data">                                    
                                    <div class="theme-form theme-form-2 mega-form">
                                        <div class="mb-4 row align-items-center">
                                            <label class="form-label-title col-sm-3 mb-0">Tên Danh Mục</label>
                                            <div class="col-sm-9">
                                                <input class="form-control" name="name" type="text"
                                                    placeholder="Vui lòng nhập tên danh mục">
                                            </div>
                                            <?php if(isset($_SESSION['errors']['name'])) : ?>
                                        <p class="text-danger"><?= $_SESSION['errors']['name'] ?></p>
                                        <?php endif; ?>
                                        </div>
                                        <div class="mb-4 row align-items-center">
                                            <label class="form-label-title col-sm-3 mb-0">Ảnh Danh Mục</label>
                                            <div class="col-sm-9">
                                                <input class="form-control" name="image" type="file">
                                            </div>
                                            <?php if(isset($_SESSION['errors']['image'])) : ?>
                                        <p class="text-danger"><?= $_SESSION['errors']['image'] ?></p>
                                        <?php endif; ?>
                                        </div>
                                        <div class="mb-4 row align-items-center">
                                            <label class="col-sm-3 col-form-label form-label-title">Danh mục sản phẩm</label>
                                            <div class="col-sm-9">
                                                <select class="js-example-basic-single w-100" name="status">
                                                    <option disabled>Trạng thái</option>
                                                    <option value="Hidden">Ẩn</option>
                                                    <option value="Active">Hiện</option>
                                                </select>
                                            </div>
                                            <?php if(isset($_SESSION['errors']['status'])) : ?>
                                        <p class="text-danger"><?= $_SESSION['errors']['status'] ?></p>
                                        <?php endif; ?>
                                        </div>
                                        <div class="col-3 d-flex" >
                                            <button type="submit" name="create-dm" style="margin-right:15px" class="btn btn-primary w-100 h-100">Thêm Mới</button>
                                            <button type="reset" name="reset-dm" class="btn btn-secondary h-100 ms-2" >Reset</button>
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
        <!-- New Product Add End -->


    </div>
    <!-- Container-fluid End -->
</div>

<?php
include '../views/admin/layout/footer.php';
?>