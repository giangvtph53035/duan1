<?php 
require_once '../models/Cart.php';
class Cartcontroller extends Cart{


    public function index(){

        if (!isset($_SESSION['user'])) {
            $carts = [];
            $sum = 0;
            $_SESSION['error'] = 'Bạn cần đăng nhập để xem giỏ hàng.';
            include '../views/client/cart/cart.php';
            return;
        }

        $carts = $this->GetallCarts();
        $sum = 0;
        foreach($carts as $cart){
            $sum += $cart['pr_variant_sale_price'] * $cart['cart_quantity'];
        }
        $_SESSION['total'] = $sum;
        include '../views/client/cart/cart.php';
    }

    public function addToCartOrByNow(){

        
        if($_SERVER['REQUEST_METHOD']== 'POST' && isset($_POST['add_to_cart'])){
            if (empty($_SESSION['user'])) {
                $_SESSION['error'] = 'Vui lòng đăng nhập để thêm sản phẩm vào giỏ hàng.';
                header('location:index.php?act=login'); 
                exit();
            }
        
            if(empty($_POST['variant_id'] )){
                $_SESSION['error'] = 'Vui lòng chọn ram và bộ nhớ trong của sản phẩm';
                header('location:' . $_SERVER['HTTP_REFERER']); 
                exit();
            }

         
            $checkCart = $this->checkCart();
            if($checkCart){
                $quantity = $checkCart['quantity'] + $_POST['quantity'];
                $updateCart = $this->updateCart( $quantity, $_SESSION['user']['user_Id'], 
                $_POST['product_id'], $_POST['variant_id'] );
                    $_SESSION['success'] = 'Cập nhật thành công.';
                    header('Location:' . $_SERVER['HTTP_REFERER']);
                    exit();
            }else{
                $addToCart = $this->addToCart(
                    $_SESSION['user']['user_Id'], $_POST['product_id'],
                    $_POST['variant_id'],$_POST['quantity']
                    
                );
                $_SESSION['success'] = 'Thêm vào giỏ hàng thành công.';
                header('Location:'. $_SERVER['HTTP_REFERER']);
                
                exit();
            }
        }
    }

    public function updateCarts(){
        if($_SERVER['REQUEST_METHOD'] ==  'POST' && isset($_POST['update-Cart'])){
            if(isset($_POST['quantity'])){
                foreach($_POST['quantity'] as $cart_id => $quantity){
                    $this->updateCartById($cart_id, $quantity);
                }
                header('location:' .$_SERVER['HTTP_REFERER']);
                $_SESSION['success'] = 'Cập nhật giỏ hàng thành công.';
                exit();
            }
        } elseif($_SERVER['REQUEST_METHOD'] ==  'POST' && isset($_POST['apply_coupon'])) {
            $coupon = $this->getCouponCode($_POST['coupon_code']);
            if(!$coupon){
                $_SESSION['error'] = 'Mã giảm giá không tồn tại';
                header('location:'. $_SERVER['HTTP_REFERER']);
                exit();
            }
            if(isset($_SESSION['coupon_code'])){
                $_SESSION['error'] = 'Mã giảm giá này chỉ được dùng 1 mã cho 1 đơn hàng';
                header('location:'. $_SERVER['HTTP_REFERER']);
                exit();
            }
            if($coupon){
                $_SESSION['coupon_code'] = $coupon;
                $totalCoupon = $this->useCoupon($coupon, $_SESSION['total']);
                // echo'<pre>';
                // print_r($totalCoupon);
                // echo'<pre>';
                $_SESSION['totalCp'] = $totalCoupon;
                $_SESSION['success'] = 'Sử dụng mã giảm giá thành công';
                header('location:'. $_SERVER['HTTP_REFERER']);
                exit();

            }
        }
    }

    public function deleteCarts()
    {
        
        try {
            $this->deleteCart($_GET['cart_Id']);
            $_SESSION['success'] = 'Xóa danh mục thành công';
            header('location:index.php?act=cart');
            exit();

        }catch(\Throwable $th){
            $_SESSION['error']='Xóa danh mục thất bại';
            header('location:'. $_SERVER['HTTP_REFERER']);
            exit();
        }
    }
    
    public function useCoupon($coupon, $total){
        if($coupon['coupon_type'] == 'percentage'){   

            $totalCoupon = ($total * ($coupon['coupon_value'] / 100) );

        } elseif($coupon['coupon_type'] == 'fixed-Amount'){

            $totalCoupon = $coupon['coupon_value'];

        }
        return $totalCoupon;
    }

}

?>