<?php
include '../views/admin/layout/header.php';
?>

<div class="page-body-wrapper">


    <!-- Container-fluid starts-->
    <div class="page-body">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card card-table">
                        <div class="card-body">
                            <div class="title-header option-title d-sm-flex d-block">
                                <h5>Danh sách sản phẩm</h5>
                                <div class="right-options">
                                    <ul>
                                        <li>
                                            <a class="btn btn-solid" href="index.php?act=product-add">Thêm Sản phẩm</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div>
                                <div class="table-responsive">
                                    <table class="table all-package theme-table table-product" id="table_id">
                                        <thead>
                                            <tr>
                                                <th>Hình ảnh sản phẩm</th>
                                                <th>Tên sản phẩm</th>
                                                <th>Giá sản phẩm</th>
                                                <th>Giá khuyến mãi</th>
                                                <th>Danh mục</th>
                                                <th>Hành động</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php foreach ($listPR as $product): ?>
                                                <tr>
                                                    <td>
                                                        <div class="table-image">
                                                            <img src="./images/product/<?= $product['product_image'] ?>"
                                                                class="img-fluid" alt="">
                                                        </div>
                                                    </td>
                                                    <td><?= $product['product_name'] ?></td>
                                                    <td class="td-price"><?= number_format($product['product_price'],0,',','.') ?></td>
                                                    <td class="sale_price-danger">
                                                        <span><?= number_format($product['product_sale_price'],0,',','.')?></span>
                                                    </td>
                                                    <td><?= $product['category_name'] ?></td>
                                                    
                                                    <td>
                                                        <ul>
                                                            <li>
                                                                <a
                                                                    href="index.php?act=product-detail&id=<?= $product['product_id'] ?>">
                                                                    <i class="ri-eye-line"></i>
                                                                </a>
                                                            </li>

                                                            <li>
                                                                <a
                                                                    href="index.php?act=product-edit&id=<?= $product['product_id'] ?>">
                                                                    <i class="ri-pencil-line"></i>
                                                                </a>
                                                            </li>

                                                            <li>
                                                                <a href="index.php?act=product-delete&id=<?= $product['product_id'] ?>"
                                                                    onclick="return confirm('Bạn có chắc muốn xóa?')">
                                                                    <i class="ri-delete-bin-line"></i> 
                                                                </a>
                                                            </li>
                                                        </ul>
                                                    </td>

                                                </tr>
                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Container-fluid Ends-->


    </div>
</div>


<?php
include '../views/admin/layout/footer.php';
?>