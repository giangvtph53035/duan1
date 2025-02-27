<?php
require_once '../models/Coupon.php';
class adCounonController extends Coupon
{

    public function index()
    {
        $listCp = $this->listCoupon();
        include '../views/admin/Coupon/listCp.php';
    }
    public function createCp()
    {
        $errors = [];
        $formData = $_POST; 

        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['add-coupon'])) {
           
            if (empty($formData['name'])) {
                $errors['name'] = 'Vui lòng nhập tên mã giảm giá';
            }
            if (empty($formData['coupon_code'])) {
                $errors['coupon_code'] = 'Vui lòng nhập mã giảm giá';
            }
            if (empty($formData['coupon_type'])) {
                $errors['coupon_type'] = 'Vui lòng nhập kiểu mã giảm giá';
            }
            if (empty($formData['coupon_value'])) {
                $errors['coupon_value'] = 'Vui lòng nhập giá trị của mã';
            }
            if (empty($formData['quantity'])) {
                $errors['quantity'] = 'Vui lòng nhập số lượng mã giảm giá';
            } elseif ($formData['quantity'] <= 0) {
                $errors['quantity'] = 'Số lượng mã giảm giá phải lớn hơn 0';
            }
            if (empty($formData['status'])) {
                $errors['status'] = 'Vui lòng cập nhật trạng thái';
            }
            if (empty($formData['start_date'])) {
                $errors['start_date'] = 'Vui lòng chọn ngày bắt đầu.';
            } elseif ($formData['start_date'] < date('Y-m-d')) {
                $errors['start_date'] = 'Ngày bắt đầu phải lớn hơn hoặc bằng hiện tại.';
            }
            if (empty($formData['end_date'])) {
                $errors['end_date'] = 'Vui lòng chọn ngày kết thúc.';
            } elseif ($formData['end_date'] < $formData['start_date']) {
                $errors['end_date'] = 'Ngày kết thúc phải lớn hơn ngày bắt đầu.';
            }

           
            if (!empty($errors)) {
                $_SESSION['errors'] = $errors;
                $_SESSION['old'] = $formData; // Lưu dữ liệu đã nhập
                header('Location: index.php?act=coupon-add');
                exit();
            }

            
            $coupon = $this->addCoupon(
                $formData['name'],
                $formData['coupon_type'],
                $formData['coupon_code'],
                $formData['coupon_value'],
                $formData['start_date'],
                $formData['end_date'],
                $formData['quantity'],
                $formData['status']
            );
            if ($coupon) {
                $_SESSION['success'] = 'Thêm mã giảm giá thành công';
                header('Location: index.php?act=coupon-list');
                exit();
            } else {
                $_SESSION['errors'] = 'Thêm mã giảm giá thất bại. Vui lòng thử lại.';
                header('Location: ' . $_SERVER['HTTP_REFERER']);
                exit();
            }
        }

        include '../views/admin/Coupon/addCp.php';
    }

    public function editCoupons(){
        $coupon = $this->editCoupon();
        include '../views/admin/Coupon/editCp.php';
        exit();
    }

    public function updateCoupons(){
        $errors = [];
        $formData = $_POST; 

        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['coupon-update']  )) {
           
            if (empty($formData['name'])) {
                $errors['name'] = 'Vui lòng nhập tên mã giảm giá';
            }
            if (empty($formData['coupon_code'])) {
                $errors['coupon_code'] = 'Vui lòng nhập mã giảm giá';
            }
            if (empty($formData['coupon_type'])) {
                $errors['coupon_type'] = 'Vui lòng nhập kiểu mã giảm giá';
            }
            if (empty($formData['coupon_value'])) {
                $errors['coupon_value'] = 'Vui lòng nhập giá trị của mã';
            }
            if (empty($formData['quantity'])) {
                $errors['quantity'] = 'Vui lòng nhập số lượng mã giảm giá';
            } elseif ($formData['quantity'] <= 0) {
                $errors['quantity'] = 'Số lượng mã giảm giá phải lớn hơn 0';
            }
            if (empty($formData['status'])) {
                $errors['status'] = 'Vui lòng cập nhật trạng thái';
            }
            if (empty($formData['start_date'])) {
                $errors['start_date'] = 'Vui lòng chọn ngày bắt đầu.';
            }
            if (empty($formData['end_date'])) {
                $errors['end_date'] = 'Vui lòng chọn ngày kết thúc.';
            } elseif ($formData['end_date'] < $formData['start_date']) {
                $errors['end_date'] = 'Ngày kết thúc phải lớn hơn ngày bắt đầu.';
            }

           
            if (!empty($errors)) {
                $_SESSION['errors'] = $errors;
                $_SESSION['old'] = $formData; // Lưu dữ liệu đã nhập
                header('Location:'.$_SERVER['HTTP_REFERER']);
                exit();
            }

            $updatecoupon = $this->updateCoupon(   $formData['name'],
            $formData['coupon_type'],
            $formData['coupon_code'],
            $formData['coupon_value'],
            $formData['start_date'],
            $formData['end_date'],
            $formData['quantity'],
            $formData['status'] );
            if($updatecoupon){
                $_SESSION['success'] = 'Cập nhật giảm giá thành công';
                header('Location: index.php?act=coupon-list');
                exit();
                
            }else {
                $_SESSION['errors'] = 'Thêm mã giảm giá thất bại. Vui lòng thử lại.';
                header('Location: ' . $_SERVER['HTTP_REFERER']);
                exit();
            }
        }
    }

    public function deleteCoupons(){
        try {
            $this->deleteCoupon();
            $_SESSION['success'] = 'Xóa mã giảm giá thành công';
            header('location:index.php?act=coupon-list');
            exit();

        }catch(\Throwable $th){
            $_SESSION['errors']='Xóa mã giảm giá thất bại';
            header('location:'. $_SERVER['HTTP_REFERER']);
            exit();
        }
        
    }
}
