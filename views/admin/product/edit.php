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
                                        <h5>Thêm Sản phẩm</h5>
                                    </div>

                                    <form class="theme-form theme-form-2 mega-form" action="index.php?act=product-update&id=<?= $product['product_id'] ?>" method="post" enctype="multipart/form-data">
                                        <div class="mb-4 row align-items-center">
                                            <label class="form-label-title col-sm-3 mb-0">Tên Sản phẩm</label>
                                            <div class="col-sm-9">
                                                <input class="form-control" type="text" name="pr_name" value="<?= $product['product_name'] ?>"
                                                    placeholder="Tên sản phẩm">
                                            </div>
                                            <?php if (isset($_SESSION['errors']['pr_name'])) : ?>
                                                <p class="text-danger"><?= $_SESSION['errors']['pr_name'] ?></p>
                                            <?php endif; ?>
                                        </div>
                                        <div class="mb-4 row align-items-center">
                                            <label class="form-label-title col-sm-3 mb-0">1 Ảnh sản phẩm</label>
                                            <div class="col-sm-9">
                                                <img src="./images/product/<?= $product['product_image'] ?>" alt="" width="100"><br><br>
                                                <input class="form-control" name="pr_image" type="file">
                                                <input class="form-control" name="old_product_image" value="<?= $product['product_image'] ?>" type="hidden">
                                            </div>
                                            <?php if (isset($_SESSION['errors']['pr_image'])) : ?>
                                                <p class="text-danger"><?= $_SESSION['errors']['pr_image'] ?></p>
                                            <?php endif; ?>
                                        </div>

                                        <div class="mb-4 row align-items-center">
                                            <label class="form-label-title col-sm-3 mb-0">Nhiều Ảnh sản phẩm</label>
                                            <div class="col-sm-9">
                                                <div class="image_gallery_container" style="display: flex; flex-wrap: wrap; gap: 10px;">
                                                    <?php foreach ($gallery as $value) : ?>
                                                        <div class="image_item" style="position: relative; display: inline-block;">
                                                            <a href="?act=gallery-delete&gallery_id=<?= $value['product_galleries_Id'] ?>" class="remove_gallery" style="position: absolute; top: -10px; right: -10px; color: red;">
                                                                <i class="ri-close-circle-line"></i>
                                                            </a>
                                                            <img src="./images/product_gallery/<?= $value['image'] ?>" alt="" width="120"
                                                                style="border: 1px solid #ccc; padding: 5px;">
                                                        </div>
                                                    <?php endforeach; ?>
                                                </div>
                                                <input class="form-control" name="old_gallery_image[]" type="hidden" multiple>
                                            </div>
                                            <?php if (isset($_SESSION['errors']['image_gallery'])) : ?>
                                                <p class="text-danger"><?= $_SESSION['errors']['image_gallery'] ?></p>
                                            <?php endif; ?>
                                        </div>

                                        <div class="mb-4 row align-items-center">
                                            <label class="form-label-title col-sm-3 mb-0">Giá sản phẩm</label>
                                            <div class="col-sm-9">
                                                <input class="form-control" type="number" name="pr_price" value="<?= isset($product['product_price']) ? $product['product_price'] : '' ?>" placeholder="Nhập giá sản phẩm">
                                            </div>
                                            <?php if (isset($_SESSION['errors']['pr_price'])) : ?>
                                                <p class="text-danger"><?= $_SESSION['errors']['pr_price'] ?></p>
                                            <?php endif; ?>
                                        </div>
                                        <div class="mb-4 row align-items-center">
                                            <label class="form-label-title col-sm-3 mb-0">Giá khuyến mãi</label>
                                            <div class="col-sm-9">
                                                <input class="form-control" type="number" name="pr_sale_price" value="<?= isset($product['product_sale_price']) ? $product['product_sale_price'] : '' ?>" placeholder="Nhập giá khuyến mãi">
                                            </div>
                                            <?php if (isset($_SESSION['errors']['pr_sale_price'])) : ?>
                                                <p class="text-danger"><?= $_SESSION['errors']['pr_sale_price'] ?></p>
                                            <?php endif; ?>
                                        </div>
                                        <div class="mb-4 row align-items-center">
                                            <label class="col-sm-3 col-form-label form-label-title">Danh mục sản phẩm</label>
                                            <div class="col-sm-9">
                                                <select class="js-example-basic-single w-100" name="category_Id">
                                                    <option disabled>Chọn Danh Mục</option>
                                                    <?php foreach ($listDM as $danhMuc) : ?>
                                                        <option value="<?= $danhMuc['category_Id'] ?>"
                                                            <?= $product['category_id'] == $danhMuc['category_Id'] ? 'selected' : '' ?>><?= $danhMuc['name'] ?></option>
                                                    <?php endforeach; ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="variant" id="variant">
                                            <?php
                                            // echo'<pre>';
            // print_r($variants);
            // echo'<pre>';
                                             foreach ($variants as $key => $value): ?>
                                                <div class="mb-4 row align-items-center">
                                                    <a href="?act=product-variant-delete&variant_id=<?= $value['product_variant_id'] ?>" class="d-flex justify-content-end mt-2"><i class="ri-close-fill"></i></a>
                                                    <input type="hidden" name="product_variant_id[]" value="<?= $value['product_variant_id'] ?>">
                                                    <label
                                                        class="col-sm-3 col-form-label form-label-title">Ram máy:</label>
                                                    <div class="col-sm-9">
                                                        <select class="js-example-basic-single w-100" name="variant_ram[]">
                                                            <option disabled>Vui lòng chọn Ram</option>
                                                            <?php foreach ($listRam as $ram) : ?>
                                                                <option value="<?= $ram['variant_Ram_Id'] ?>" <?= $ram['variant_Ram_Id'] == $value['variant_ram_id'] ? 'selected' : '' ?> id="<?= $key ?>">
                                                                    <?= $ram['Ram_name'] ?></option>
                                                            <?php endforeach; ?>
                                                        </select>
                                                    </div>
                                                    <?php if (isset($_SESSION['errors']['variant_ram'])) : ?>
                                                        <p class="text-danger"><?= $_SESSION['errors']['variant_ram'] ?></p>
                                                    <?php endif; ?>
                                                </div>
                                                <div class="mb-4 row align-items-center">
                                                    <label
                                                        class="col-sm-3 col-form-label form-label-title">ROM máy:</label>
                                                    <div class="col-sm-9">
                                                        <select class="js-example-basic-single w-100" name="variant_rom[]">
                                                            <option disabled>Vui lòng chọn bộ nhớ trong</option>
                                                            <?php foreach ($listRom as $rom) : ?>
                                                                <option value="<?= $rom['variant_Rom_Id'] ?>" <?= $rom['variant_Rom_Id'] == $value['variant_Rom_id'] ? 'selected' : '' ?> id="<?= $key ?>">
                                                                    <?= $rom['Rom_name'] ?>
                                                                </option>
                                                            <?php endforeach; ?>
                                                        </select>
                                                    </div>
                                                    <?php if (isset($_SESSION['errors']['variant_rom'])) : ?>
                                                        <p class="text-danger"><?= $_SESSION['errors']['variant_rom'] ?></p>
                                                    <?php endif; ?>
                                                </div>
                                                <div class="mb-4 row align-items-center">
                                                    <label class="form-label-title col-sm-3 mb-0">Giá biến thể</label>
                                                    <div class="col-sm-9">
                                                        <input class="form-control" type="number" id="variant_price[]" name="variant_price[]" value="<?= $value['variant_price'] ?>"
                                                            placeholder="Nhập giá sản phẩm">
                                                    </div>
                                                    <?php if (isset($_SESSION['errors']['variant_price'])): ?>
                                                        <?php foreach (($_SESSION['errors']['variant_price']) as $variant_price) : ?>
                                                            <p class="text-danger"><?= $variant_price ?></p>
                                                        <?php endforeach; ?>
                                                    <?php endif; ?>
                                                </div>
                                                <div class="mb-4 row align-items-center">
                                                    <label class="form-label-title col-sm-3 mb-0">Giá biến thể khuyến mãi</label>
                                                    <div class="col-sm-9">
                                                        <input class="form-control" type="number" id="variant_sale_price[]" name="variant_sale_price[]" value="<?= $value['variant_sale_price'] ?>"
                                                            placeholder="Nhập giá khuyến mãi">
                                                    </div>
                                                    <?php if (isset($_SESSION['errors']['variant_sale_price'])): ?>
                                                        <?php foreach (($_SESSION['errors']['variant_sale_price']) as $variant_sale_price) : ?>
                                                            <p class="text-danger"><?= $variant_sale_price ?></p>
                                                        <?php endforeach; ?>
                                                    <?php endif; ?>
                                                </div>

                                                <div class="mb-4 row align-items-center">
                                                    <label class="form-label-title col-sm-3 mb-0">Số lượng</label>
                                                    <div class="col-sm-9">
                                                        <input class="form-control" type="number" id="variant_quantity[]" name="variant_quantity[]" value="<?= $value['variant_quantity'] ?>"
                                                            placeholder="Số Lượng sản phẩm">
                                                    </div>
                                                    <?php if (isset($_SESSION['errors']['variant_quantity'])) : ?>
                                                        <?php foreach (($_SESSION['errors']['variant_quantity']) as $variant_quantity) : ?>
                                                            <p class="text-danger"><?= $variant_quantity ?></p>
                                                        <?php endforeach; ?>
                                                    <?php endif; ?>
                                                </div>
                                            <?php endforeach; ?>
                                        </div>

                                        <div class="col-3 d-flex">
                                            <button type="button" id="add-variant" name="add-variant" style="margin-right:15px" class="btn btn-primary w-100 h-100">Thêm biến thể</button>
                                        </div>
                                        <br>

                                        <div class="mb-4 row align-items-center">
                                            <label class="form-label-title col-sm-3 mb-0">Mô Tả</label>
                                            <div class="col-sm-9">
                                                <textarea class="form-control" placeholder="Nhập Mô tả ở đây" id="floatingTextarea2" name="pr_description" style="height: 100px"><?= $product['product_description'] ?></textarea>
                                            </div>
                                            <?php if (isset($_SESSION['errors']['pr_description'])) : ?>
                                                <p class="text-danger"><?= $_SESSION['errors']['pr_description'] ?></p>
                                            <?php endif; ?>
                                        </div>

                                        <div class="col-3 d-flex">
                                            <button type="submit" name="update-sp" style="margin-right:15px" class="btn btn-primary w-100 h-100">Cập nhật sản phẩm</button>
                                            <button type="reset" name="reset-sp" class="btn btn-secondary h-100 ms-2">Reset</button>
                                        </div>
                                        <br>

                                    </form>
                                    <div class="mb-4 row align-items-center">
                                        <a href="index.php?act=product"><button class="btn btn-warning">Quay lại</button></a>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- New Product Add End -->
    </div>
    <script>
        document.getElementById('add-variant').addEventListener('click', function() {
            const container = document.getElementById('variant');
            const variantIndex = container.children.length + 1; // Tính số thứ tự biến thể

            // Tạo một thẻ div cho biến thể mới
            const newVariant = document.createElement('div');
            newVariant.innerHTML = `
        <a href="" class="d-flex justify-content-end mt-2"><i class="ri-close-fill"></i></a>
        <div class="mb-4 row align-items-center">
            <h6 class="col-12">Biến thể ${variantIndex}</h6>
        </div>
        <div class="mb-4 row align-items-center">
            <label class="col-sm-3 col-form-label form-label-title">Ram máy:</label>
            <div class="col-sm-9">
                <select class="js-example-basic-single w-100" name="variant_ram[]">
                    <option disabled>Vui lòng chọn Ram</option>
                    <?php foreach ($listRam as $ram) : ?>
                        <option value="<?= $ram['variant_Ram_Id'] ?>"><?= $ram['Ram_name'] ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
        </div>
        <div class="mb-4 row align-items-center">
            <label class="col-sm-3 col-form-label form-label-title">ROM máy:</label>
            <div class="col-sm-9">
                <select class="js-example-basic-single w-100" name="variant_rom[]">
                    <option disabled>Vui lòng chọn bộ nhớ trong</option>
                    <?php foreach ($listRom as $rom) : ?>
                        <option value="<?= $rom['variant_Rom_Id'] ?>"><?= $rom['Rom_name'] ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
        </div>
        <div class="mb-4 row align-items-center">
            <label class="form-label-title col-sm-3 mb-0">Giá biến thể</label>
            <div class="col-sm-9">
                <input class="form-control" type="number" name="variant_price[]" placeholder="Nhập giá sản phẩm">
            </div>
        </div>
        <div class="mb-4 row align-items-center">
            <label class="form-label-title col-sm-3 mb-0">Giá biến thể khuyến mãi</label>
            <div class="col-sm-9">
                <input class="form-control" type="number" name="variant_sale_price[]" placeholder="Nhập giá khuyến mãi">
            </div>
        </div>
        <div class="mb-4 row align-items-center">
            <label class="form-label-title col-sm-3 mb-0">Số lượng</label>
            <div class="col-sm-9">
                <input class="form-control" type="number" name="variant_quantity[]" placeholder="Số Lượng sản phẩm">
            </div>
        </div>
    `;
            container.appendChild(newVariant);
        });
    </script>
</div>

<?php
//Xóa session lỗi khi đã hiển thị tránh lặp lại lỗi 
unset($_SESSION['errors']);
include '../views/admin/layout/footer.php';
?>