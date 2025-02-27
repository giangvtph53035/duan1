<?php 
require_once '../models/user.php';
require_once '../models/Order.php';

class MyAccController {
    protected $User;
    protected $order;

    public function __construct(){
        $this->User = new User();
        $this->order = new Order();
    }

     public function index(){
        $listOrder = $this->order->getAllOrderdetailByUserId();
        include '../views/client/account/account.php';
     }
    public function updateAcc(){
        if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['update-acc'])){
            $error = [];
            if(empty($_POST['name'])){
                $error['name'] = 'Vui lòng nhập tên người dùng';
            }
            if(empty($_POST['address'])){
                $error['address'] = 'Vui lòng nhập địa chỉ';
            }
            if(empty($_POST['email'])){
                $error['email'] = 'Vui lòng nhập địa chỉ email';
            }
            if(empty($_POST['phone'])){
                $error['phone'] = 'Vui lòng nhập số điện thoại';
            }
            if(empty($_POST['gender'])){
                $error['gender'] = 'Vui lòng chọn giới tính';
            }
            if(count($error)>0){
                header('location:'. $_SERVER['HTTP_REFERER']);
                exit();
            }

            // Handle avatar file upload
            $file = $_FILES['avatar']; // Get the uploaded avatar file
            $avatar = null;
    
            // If a new file is uploaded
            if($file['size'] > 0) {
                // Move the uploaded file to the avatars folder
                $avatar = $file['name'];
                if(move_uploaded_file($file['tmp_name'], './images/user_img/' . $avatar)) {
                    // If an old avatar exists, delete it
                    if(!empty($_POST['old_avatar']) && file_exists('./images/user_img/' . $_POST['old_avatar'])){
                        unlink('./images/user_img/' . $_POST['old_avatar']);
                    }
                } else {
                    $_SESSION['errors']['avatar'] = 'Lỗi khi tải ảnh đại diện lên. Vui lòng thử lại';
                    header('location:' . $_SERVER['HTTP_REFERER']);
                    exit();
                }
            } else {
                // If no new avatar is uploaded, use the old avatar
                $avatar = $_POST['old_avatar'];
            }
    
            // Update user data in the database, including avatar
            $user = $this->User->updateUser($_POST['name'],
             $_POST['address'], $_POST['email'], $_POST['phone'], $_POST['gender'], $avatar);
             if($user){
                // Refresh the session with updated user data
                $_SESSION['user'] = $this->User->GetUserById($_SESSION['user']['user_Id']);
                $_SESSION['success'] = 'Cập nhật thông tin thành công';
                header('location:' . $_SERVER['HTTP_REFERER']);
                exit();
            } else {
                $_SESSION['errors'] = 'Cập nhật thông tin thất bại. Vui lòng kiểm tra lại';
                header('location:' . $_SERVER['HTTP_REFERER']);
                exit();
            }
        }
    }

    public function trackOder(){

        $getOrderDetailId = $this->order->getOrderdetailById();
        $getOrderId = $this->order->getOrderById();
        $getCouponId = $this->order->getCouponById();
        $getShipId = $this->order->getShipById();
        $useCoupon = $this->useCoupon($getCouponId,$getOrderDetailId['amount']);
       
        

        include '../views/client/account/trackOder.php';
    }

    

    public function useCoupon($coupon, $total){
        if($coupon['coupon_type'] == 'percentage'){   

            $totalCoupon = ($total * ($coupon['coupon_value'] / 100) );

        } elseif($coupon['coupon_type'] == 'fixed-Amount'){

            $totalCoupon = $coupon['coupon_value'];

        }
        return $totalCoupon ?? 0;
    }

    public function cancelOrders(){
        $order = $this->order->getOrderdetailById();

        // Kiểm tra trạng thái đơn hàng
        if ($order['status'] !== 'Pending') {
            $_SESSION['error'] = 'Không thể hủy đơn hàng vì đơn đã được xác nhận hoặc xử lý.';
            header('location:' . $_SERVER['HTTP_REFERER']);
            exit();
        }
       
        try {
           
            $this->order->cancelOrder();
            $_SESSION['success'] = 'Hủy đơn hàng thành công';
            header('location:'. $_SERVER['HTTP_REFERER']);
            exit();

        }catch(\Throwable $th){
            $_SESSION['error']='Hủy đơn hàng thất bại';
            header('location:'. $_SERVER['HTTP_REFERER']);
            exit();
        }
            
        
    }
}

?>