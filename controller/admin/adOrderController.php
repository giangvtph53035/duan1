<?php  
require_once '../models/Order.php';
class AdOrderController extends Order{

    public function listOrder(){

        $listOrder = $this->getAllOrderdetail();

        include '../views/admin/Order/list.php';

    }

    public function editOrder() {

        $getOrderDetailId = $this->getOrderdetailById();
        $getOrderId = $this->getOrderById();
        $getCouponId = $this->getCouponById();
        $getShipId = $this->getShipById();
        $useCoupon = $this->useCoupon($getCouponId,$getOrderDetailId['amount']);
        // echo'<pre>';
        // print_r($useCoupon);
        // echo'<pre>';
        
        include '../views/admin/Order/edit.php';

    }

    public function useCoupon($coupon, $total){
        if($coupon['coupon_type'] == 'percentage'){   

            $totalCoupon = ($total * ($coupon['coupon_value'] / 100) );

        } elseif($coupon['coupon_type'] == 'fixed-Amount'){

            $totalCoupon = $coupon['coupon_value'];

        }
        return $totalCoupon ?? 0;
    }

    public function updateOrder(){
        if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['updateOrder'])){
            $updateOrder = $this->updateOrders($_POST['status']);
            if($updateOrder){
                $_SESSION['success'] = 'Cập nhật trạng thái đơn hàng thành công';
                header('location:index.php?act=order-list');
                exit();
            }else{
                $_SESSION['error'] = 'Cập nhật trạng thái đơn hàng thất bại. Vui lòng kiểm tra lại';
                header('location:'. $_SERVER['HTTP_REFERER']);
                exit();
            }
            
        }
    }

    

}
?>