<?php
require_once '../models/product.php';

class AdPRController extends Product
{

    public function index()
    {
        $listPR = $this->listProduct();
        include '../views/admin/product/list.php';
    }

    public function addProduct()
    {
        $listRam = $this->GetallRam();
        $listRom = $this->GetallRom();
        $listDM = $this->GetallCategory();
        include '../views/admin/product/add.php';
    }

    public function PrStore()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['create-sp'])) {
            $errors = [];
            if (empty($_POST['pr_name'])) {
                $errors['pr_name'] = 'Vui lòng nhập tên sản phẩm';
            }
            if (empty($_POST['pr_price'])) {
                $errors['pr_price'] = 'Vui lòng nhập giá';
            }
            if (empty($_POST['pr_sale_price'])) {
                $errors['pr_sale_price'] = 'Vui lòng nhập giá khuyến mãi';
            }
            if (empty($_POST['pr_price'])) {
                $errors['pr_price'] = 'Vui lòng nhập giá';
            }
            if (!isset($_FILES['pr_image']) || $_FILES['pr_image']['error'] !== UPLOAD_ERR_OK) {
                $errors['pr_image'] = 'Vui lòng chọn file ảnh hợp lệ';
            }
            // if (!isset($_FILES['image_gallery']) || $_FILES['image_gallery']['error'] !== UPLOAD_ERR_OK) {
            //     $errors['image_gallery'] = 'Vui lòng chọn 1 file ảnh hợp lệ';
            // }
            //Tạm thời bỏ qua trường này cho a vì nó là mảng nên e phải for nhé
            if (empty($_POST['variant_ram'])) {
                $errors['variant_ram'] = 'Vui chọn loại Ram sản phẩm';
            }
            if (empty($_POST['variant_rom'])) {
                $errors['variant_rom'] = 'Vui chọn loại bộ nhớ trong sản phẩm';
            }
            if (empty($_POST['pr_description'])) {
                $errors['pr_description'] = 'Vui lòng nhập mô tả';
            }

            foreach ($_POST['variant_quantity'] as $key => $variant_quantity) {
                if (empty($variant_quantity)) {
                    $errors['variant_quantity'][$key] = 'Vui lòng nhập số lượng' . ($key + 1);
                }
            }
            foreach ($_POST['variant_sale_price'] as $key => $variant_sale_price) {
                if (empty($variant_sale_price)) {
                    $errors['variant_sale_price'][$key] = 'Vui lòng nhập giá khuyến mãi biến thể' . ($key + 1);
                }
            }
            foreach ($_POST['variant_price'] as $key => $variant_price) {
                if (empty($variant_price)) {
                    $errors['variant_price'][$key] = 'Vui lòng nhập giá biến thể' . ($key + 1);
                }
            }



            $_SESSION['errors'] = $errors;
            //Xử lý nếu có lỗi validate 

            if (count($errors) > 0) {
                header('location: ' . $_SERVER['HTTP_REFERER']);
                exit();
            }

            $file = $_FILES['pr_image'];
            // $pr_image = uniqid().'-'. preg_replace('/[^A-Za-z0-9\-_\.]+/', '',basename($file['name']));
            $pr_image = uniqid() . '-' . preg_replace('/[^A-Za-z0-9\-_\.]+/', '-', basename($file['name']));

            // Dùng phương thức addProducts() để lưu thông tin sản phẩm vào cơ sở dữ liệu.
            if (move_uploaded_file($file['tmp_name'], './images/product/' . $pr_image)) {
                $addProduct = $this->addProducts(
                    $_POST['pr_name'],
                    $pr_image,
                    $_POST['pr_price'],
                    $_POST['pr_sale_price'],
                    $_POST['category_Id'],
                    $_POST['pr_description']
                );
                // Duyệt qua các biến thể (RAM, ROM) và lưu từng biến thể bằng addProductsVariant()
                if ($addProduct) {
                    $product_id = $this->GetLastId();
                    if (isset($_POST['variant_ram']) && isset($_POST['variant_rom'])) {
                        foreach ($_POST['variant_ram'] as $key => $ram) {
                            $addProduct_variant = $this->addProductsVariant(
                                $_POST['variant_price'][$key],
                                $_POST['variant_sale_price'][$key],
                                $_POST['variant_quantity'][$key],
                                $product_id,
                                $ram,
                                $_POST['variant_rom'][$key]
                            );
                        }
                    }

                    // Tải lên nhiều ảnh và lưu vào bảng thư viện ảnh bằng addGalleyry()
                    if (!empty($_FILES['image_gallery']['name'][0])) {
                        $file = $_FILES['image_gallery'];
                        for ($i = 0; $i < count($file['name']); $i++) {

                            $image_gallery = uniqid() . '-' . preg_replace('/[^A-Za-z0-9\-_\.]+/', '-', basename($file['name'][$i]));

                            move_uploaded_file($file['tmp_name'][$i], './images/product_gallery/' . $image_gallery);
                            $this->addGalleyry($product_id, $image_gallery);
                        }
                    }
                }
                $_SESSION['success'] = 'Thêm sản phẩm thành công';
                header('location:index.php?act=product');
                exit();
            }
        } else {
            $_SESSION['error'] = 'Thêm sản phẩm thất bại. Vui lòng thử lại';
            header('location:' . $_SERVER['HTTP_REFERER']);
            exit();
        }
    }


    public function edit()
    {
        $product = $this->getProductById($_GET['id']);
        $product = reset($product);
        $variants = $this->getProductVariantById($_GET['id']);
        $gallery = $this->getProductGalleyryById();
        $listDM = $this->GetallCategory();
        $listRam = $this->GetallRam();
        $listRom = $this->GetallRom();
        // echo '<pre>';
        // print_r($product);
        // echo '<pre>';

        include '../views/admin/product/edit.php';
    }


    public function update()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['update-sp'])) {


            $errors = [];
            if (empty($_POST['pr_name'])) {
                $errors['pr_name'] = 'Vui lòng nhập tên sản phẩm';
            }
            if (empty($_POST['pr_price'])) {
                $errors['pr_price'] = 'Vui lòng nhập giá';
            }
            if (empty($_POST['pr_sale_price'])) {
                $errors['pr_sale_price'] = 'Vui lòng nhập giá khuyến mãi';
            }
            if (empty($_POST['pr_price'])) {
                $errors['pr_price'] = 'Vui lòng nhập giá';
            }
            // if (!isset($_FILES['pr_image']) || $_FILES['pr_image']['error'] !== UPLOAD_ERR_OK) {
            //     $errors['pr_image'] = 'Vui lòng chọn file ảnh hợp lệ';
            // }
            // if (!isset($_FILES['image_gallery']) || $_FILES['image_gallery']['error'] !== UPLOAD_ERR_OK) {
            //     $errors['image_gallery'] = 'Vui lòng chọn 1 file ảnh hợp lệ';
            // }
            //Tạm thời bỏ qua trường này cho a vì nó là mảng nên e phải for nhé
            if (empty($_POST['variant_ram'])) {
                $errors['variant_ram'] = 'Vui chọn loại Ram sản phẩm';
            }
            if (empty($_POST['variant_rom'])) {
                $errors['variant_rom'] = 'Vui chọn loại bộ nhớ trong sản phẩm';
            }
            if (empty($_POST['pr_description'])) {
                $errors['pr_description'] = 'Vui lòng nhập mô tả';
            }

            foreach ($_POST['variant_quantity'] as $key => $variant_quantity) {
                if (empty($variant_quantity)) {
                    $errors['variant_quantity'][$key] = 'Vui lòng nhập số lượng' . ($key + 1);
                }
            }
            foreach ($_POST['variant_sale_price'] as $key => $variant_sale_price) {
                if (empty($variant_sale_price)) {
                    $errors['variant_sale_price'][$key] = 'Vui lòng nhập giá khuyến mãi biến thể' . ($key + 1);
                }
            }
            foreach ($_POST['variant_price'] as $key => $variant_price) {
                if (empty($variant_price)) {
                    $errors['variant_price'][$key] = 'Vui lòng nhập giá biến thể' . ($key + 1);
                }
            }



            $_SESSION['errors'] = $errors;
            //Xử lý nếu có lỗi validate 

            if (count($errors) > 0) {
                header('location: ' . $_SERVER['HTTP_REFERER']);
                exit();
            }
            $file = $_FILES['pr_image'];
            $pr_image = uniqid() . '-' . preg_replace('/[^A-Za-z0-9\-_\.]+/', '-', basename($file['name']));
            if ($file['size'] > 0) {
                if (move_uploaded_file($file['tmp_name'], './images/product/' . $pr_image)) {
                    // Xóa ảnh cũ
                    if (isset($_POST['old_product_image']) && file_exists('./images/product/' . $_POST['old_product_image'])) {
                        unlink('./images/product/' . $_POST['old_product_image']);
                    }
                }
            } else {
                $pr_image = $_POST['old_product_image'];
            }
            // Cập nhật thông tin sản phẩm
            $updateProduct = $this->updateProduct(
                $_POST['pr_name'],
                $pr_image,
                $_POST['pr_price'],
                $_POST['pr_sale_price'],
                $_POST['category_Id'],
                $_POST['pr_description'],
                $_GET['id']
            );
            if ($updateProduct) {
                // echo '1234';
                // Cập nhật biến thể
                if (isset($_POST['variant_ram']) && isset($_POST['variant_rom'])) {
                    foreach ($_POST['variant_ram'] as $key => $ram) {
                        // Kiểm tra xem biến thể này đã tồn tại hay chưa
                        if (isset($_POST['product_variant_id'][$key]) && !empty($_POST['product_variant_id'][$key])) {
                            // Cập nhật biến thể hiện có
                            $this->updateProductVariant(
                                $_POST['product_variant_id'][$key],
                                $_GET['id'],
                                $_POST['variant_price'][$key],
                                $_POST['variant_sale_price'][$key],
                                $ram,
                                $_POST['variant_rom'][$key],
                                $_POST['variant_quantity'][$key]
                            );
                            // echo "<pre>";
                            // print_r($_POST);
                            // echo "<pre>";
                            // exit();
                        } else {
                            $addProduct_variant = $this->addProductsVariant(
                                $_POST['variant_price'][$key],
                                $_POST['variant_sale_price'][$key],
                                $_POST['variant_quantity'][$key],
                                $_GET['id'],
                                $ram,
                                $_POST['variant_rom'][$key]
                            );
                        }
                    }
                }
                // Cập nhật ảnh
                if (!empty($_FILES['image_gallery']['name'][0])) {
                    $file = $_FILES['image_gallery'];
                    for ($i = 0; $i < count($file['name']); $i++) {
                        $image_gallery = uniqid() . '-' . preg_replace('/[^A-Za-z0-9\-_\.]+/', '-', basename($file['name'][$i]));
                        move_uploaded_file($file['tmp_name'][$i], './images/product_gallery/' . $image_gallery);
                        $this->addGalleyry($_GET['id'], $image_gallery);
                    }
                } else {
                    $image_gallery = $_POST['old_gallery_image'];
                }
                // Thông báo
                $_SESSION['success'] = 'Cập nhật sản phẩm thành công';
                header('location:index.php?act=product');
                exit();
            } else {
                $_SESSION['error'] = 'Cập nhật sản phẩm không thành công . Vui lòng thử lại.';
                header('location:' . $_SERVER['HTTP_REFERER']);
                exit();
            }
        }
    }

    // Xóa nhiều ảnh
    public function deleteGallery()
    {
        try {
            $gallery = $this->getGallery();

            if (file_exists('./images/product_gallery' . $gallery['image'])) {
                unlink('./images/product_gallery/' . $gallery['image']);
            }
            $this->removeGallery();
            $_SESSION['success'] = 'Xóa ảnh khỏi kho lưu trữ ảnh thành công';
            header('location:' . $_SERVER['HTTP_REFERER']);
            exit();
        } catch (\Throwable $th) {
            echo $th->getMessage();
            header('location:' . $_SERVER['HTTP_REFERER']);
            exit();
        }
    }

    // Xóa biến thể
    public function deleteProductVariant()
    {
        try {
            $this->removeProductVariant();
            $_SESSION['success'] = 'Xóa biến thể thành công';
            header('location:' . $_SERVER['HTTP_REFERER']);
            exit();
        } catch (\Throwable $th) {
            echo $th->getMessage();
            header('location:' . $_SERVER['HTTP_REFERER']);
            exit();
        }
    }

    public function deleteProduct()
    {
        try {
            $galleries = $this->getProductGalleyryById();
            foreach ($galleries as $gallery) {
                if (file_exists('./images/product_gallery/' . $gallery['image'])) {
                    unlink('./images/product_gallery/' . $gallery['image']);
                }
            }
            $this->removeProduct();
            // echo'<pre>';
            // print_r($galleries);
            // echo'<pre>';
            $_SESSION['success'] = 'Xóa biến thể thành công';
            header('location:' . $_SERVER['HTTP_REFERER']);
            exit();
        } catch (\Throwable $th) {
            echo $th->getMessage();
            header('location:' . $_SERVER['HTTP_REFERER']);
            exit();
        }
    }
}
