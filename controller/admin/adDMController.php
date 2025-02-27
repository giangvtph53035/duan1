<?php
require_once '../models/danhMuc.php';
class adDMcontroller extends danhMuc {
    public function index(){
        $listDM = $this->listDanhMuc();
        include '../views/admin/category/list.php';
    }

    public function addCategory(){
        if($_SERVER['REQUEST_METHOD']== 'POST' && isset($_POST['create-dm'])){
            $errors = [];
            if(empty($_POST['name'])){
                $errors['name'] = 'Vui lòng nhập tên danh mục';
            }
            if(empty($_POST['status'])){
                $errors['status'] = 'Vui lòng cập nhật trạng thái';
            }
            if(!isset($_FILES['image']) || $_FILES['image']['error'] !== UPLOAD_ERR_OK){
                $errors['image'] = 'Vui lòng chọn file ảnh hợp lệ';
            }

            $_SESSION['errors']= $errors;
            
            $file= $_FILES['image'];
            $images = $file['name'];
            if(move_uploaded_file($file['tmp_name'], './images/category/' .$images)){
                $createCategory = $this->addCategorys($_POST['name'], $images, $_POST['status']);
                if($createCategory){
                    $_SESSION['success'] = 'Thêm danh mục thành công';
                    header('location:index.php?act=category');
                    exit();
                }else{
                    $_SESSION['errors'] = 'Thêm danh mục thất bại. Vui lòng thử lại';
                    header('location:'. $_SERVER['HTTP_REFERER']);
                    exit();
                }
            }

        }
        include '../views/admin/category/add.php';
    }
    public function editCategory(){
        $getCategory = $this->deatailCategory();
        if($getCategory){
            return $getCategory;
        }else{
            $_SESSION['errors'] = 'Không tìm thấy danh mục';
        }
    }
    public function updateCategory(){
        $getCategory = $this->deatailCategory();
        if($_SERVER['REQUEST_METHOD']== 'POST' && isset($_POST['update-dm'])){
            $errors = [];
            if (empty($_POST['name'])) {
                $errors['name'] = 'Vui lòng nhập tên danh mục';
            }
        
            // Kiểm tra trạng thái
            if (empty($_POST['status'])) {
                $errors['status'] = 'Vui lòng cập nhật trạng thái';
            }
            

            $_SESSION['errors']= $errors;
            $file = $_FILES['image'];
            $images = $file['name'];
            if($file['size'] >0){
                move_uploaded_file($file['tmp_name'], './images/category/'. $images );
                if(!empty($_POST['old_image']) && file_exists('./images/category/'. $_POST['old_image'])){
                    unlink('.images/category/'. $_POST['old_image']);
                }
            }else{
                $images = $_POST['old_image'];
            }
            $updateCagetory = $this->editCategorys($_POST['name'], $images, $_POST['status']);
            if($updateCagetory){
                $_SESSION['success'] = 'Cập nhật danh mục thành công';
                header('location:index.php?act=category');
                exit();
            }else{
                $_SESSION['error'] = 'Cập nhật danh mục thất bại. Vui lòng thử lại';
                header('location:'. $_SERVER['HTTP_REFERER']);
                exit();
            }
            
        }
        include '../views/admin/category/edit.php';
        
    }

    public function deleteCategorys()
    {
        try {
            $this->deleteCategory($_GET['id']);
            $_SESSION['success'] = 'Xóa danh mục thành công';
            header('location:index.php?act=category');
            exit();

        }catch(\Throwable $th){
            $_SESSION['errors']='Xóa danh mục thất bại';
            header('location:'. $_SERVER['HTTP_REFERER']);
            exit();
        }
    }
   

}

?>