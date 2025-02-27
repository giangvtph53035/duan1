<?php
require_once '../models/Ship.php';
require_once '../models/Cart.php';
require_once '../models/User.php';
require_once '../models/Order.php';
class OrderController
{
    protected $cart;
    protected $ship;
    protected $user;

    protected $orders;

    public function __construct()
    {
        $this->cart = new Cart();
        $this->ship = new Ship();
        $this->user = new User();
        $this->orders = new Order();
    }


    public function index()
    {
        $user = $this->user->GetUserById($_SESSION['user']['user_Id']);
        $ships = $this->ship->getAllShip();
        $carts = $this->cart->GetallCarts();
        // echo'<pre>';
        // print_r($ships);
        // echo'<pre>';
        include '../views/client/checkout/checkout.php';
    }
    public function checkout()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['checkout'])) {

            $carts = $this->cart->GetallCarts();

            $orderdetail = $this->orders->addOrderDetail(
                $_POST['name'],
                $_POST['email'],
                $_POST['phone'],
                $_POST['address'],
                $_POST['amount'],
                $_POST['note'],
                !empty($_POST['coupon_Id']) ? $_POST['coupon_Id'] : null,
                $_POST['payment_method'],
                $_POST['shipping_Id']
            );
            if ($orderdetail) {
                $orderdetail_id = $this->orders->GetLastId();
                foreach ($carts as $cart) {
                    $this->orders->addOrder(
                        $cart['product_id'],
                        $cart['variant_id'],
                        $orderdetail_id,
                        $cart['cart_quantity']
                    );
                    $this->cart->deleteCart($cart['cart_id']);
                }
                unset($_SESSION['total']);
                unset($_SESSION['coupon_code']);
                unset($_SESSION['totalCp']);
                header('location:index.php?act=index');
                $_SESSION['success'] = 'Đặt hàng thành công';
                exit();
            } else {
                $_SESSION['success'] = 'Đặt hàng không thành công';
                header('location:index.php?act=checkout');
                exit();
            }
        }elseif($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['vnpay'])){
            $carts = $this->cart->GetallCarts();

            $orderdetail = $this->orders->addOrderDetail(
                $_POST['name'],
                $_POST['email'],
                $_POST['phone'],
                $_POST['address'],
                $_POST['amount'],
                $_POST['note'],
                !empty($_POST['coupon_Id']) ? $_POST['coupon_Id'] : null,
                $_POST['payment_method'],
                $_POST['shipping_Id']
            );
            if ($orderdetail) {
                $orderdetail_id = $this->orders->GetLastId();
                foreach ($carts as $cart) {
                    $this->orders->addOrder(
                        $cart['product_id'],
                        $cart['variant_id'],
                        $orderdetail_id,
                        $cart['cart_quantity']
                    );
                    $this->cart->deleteCart($cart['cart_id']);
                }
                $this->VNpay($orderdetail_id);
            } 
           
            

        }
    }

    public function VNpay($orderdetail_id){
       
    error_reporting(E_ALL & ~E_NOTICE & ~E_DEPRECATED);
    date_default_timezone_set('Asia/Ho_Chi_Minh');
    
    $vnp_Url = "https://sandbox.vnpayment.vn/paymentv2/vpcpay.html";
    $vnp_Returnurl = "http://localhost:8000/?act=vnpay_return";
    $vnp_TmnCode = "CHF0F9YP";//Mã website tại VNPAY 
    $vnp_HashSecret = "9V6TR2MYKS7R3278Y5UMWRHG88ZTTV6Q"; //Chuỗi bí mật
    
    $vnp_TxnRef = $orderdetail_id; //Mã đơn hàng. Trong thực tế Merchant cần insert đơn hàng vào DB và gửi mã này 
    $vnp_OrderInfo = 'Tech-Heaven';
    $vnp_OrderType = 'Thanh toán VNPay';
    $vnp_Amount = $_POST['amount'] * 100 ;
    $vnp_Locale = 'vn';
    $vnp_BankCode = '';
    $vnp_IpAddr = $_SERVER['REMOTE_ADDR'];
    
    $inputData = array(
        "vnp_Version" => "2.1.0",
        "vnp_TmnCode" => $vnp_TmnCode,
        "vnp_Amount" => $vnp_Amount,
        "vnp_Command" => "pay",
        "vnp_CreateDate" => date('YmdHis'),
        "vnp_CurrCode" => "VND",
        "vnp_IpAddr" => $vnp_IpAddr,
        "vnp_Locale" => $vnp_Locale,
        "vnp_OrderInfo" => $vnp_OrderInfo,
        "vnp_OrderType" => $vnp_OrderType,
        "vnp_ReturnUrl" => $vnp_Returnurl,
        "vnp_TxnRef" => $vnp_TxnRef
    );
    
    if (isset($vnp_BankCode) && $vnp_BankCode != "") {
        $inputData['vnp_BankCode'] = $vnp_BankCode;
    }
    if (isset($vnp_Bill_State) && $vnp_Bill_State != "") {
        $inputData['vnp_Bill_State'] = $vnp_Bill_State;
    }
    
    //var_dump($inputData);
    ksort($inputData);
    $query = "";
    $i = 0;
    $hashdata = "";
    foreach ($inputData as $key => $value) {
        if ($i == 1) {
            $hashdata .= '&' . urlencode($key) . "=" . urlencode($value);
        } else {
            $hashdata .= urlencode($key) . "=" . urlencode($value);
            $i = 1;
        }
        $query .= urlencode($key) . "=" . urlencode($value) . '&';
    }
    
    $vnp_Url = $vnp_Url . "?" . $query;
    if (isset($vnp_HashSecret)) {
        $vnpSecureHash =   hash_hmac('sha512', $hashdata, $vnp_HashSecret);//  
        $vnp_Url .= 'vnp_SecureHash=' . $vnpSecureHash;
    }
    $returnData = array('code' => '00'
        , 'message' => 'success'
        , 'data' => $vnp_Url);
        if (isset($_POST['vnpay'])) {
            header('Location: ' . $vnp_Url);
            die();
        } else {
            echo json_encode($returnData);
        }
       
    
    }

    public function vnpayReturn(){
        unset($_SESSION['total']);
                unset($_SESSION['coupon_code']);
                unset($_SESSION['totalCp']);
                header('location:index.php?act=index');
                $_SESSION['success'] = 'Đặt hàng thành công';
                exit();
    }

    
}
