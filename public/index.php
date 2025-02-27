<?php
session_start();
require_once '../controller/admin/adDMController.php';
require_once '../controller/admin/adPRController.php';
require_once '../controller/admin/adCouponController.php';
require_once '../controller/admin/adOrderController.php';
require_once '../controller/admin/AuthAdminController.php';
require_once '../controller/admin/adUserController.php';
require_once '../controller/admin/WishlistController.php';
require_once '../controller/client/AuthController.php';
require_once '../controller/client/HomeController.php';
require_once '../controller/client/Cartcontroller.php';
require_once '../controller/client/myAccController.php';
require_once '../controller/client/OrderController.php';
require_once '../controller/client/ShopController.php';
require_once '../controller/client/ReviewController.php';
$actions = isset($_GET['act']) ? $_GET['act'] : 'index';

$adminDanhmuc = new adDMcontroller();
$adminProduct = new AdPRController();
$couponAdmin = new adCounonController();
$adminOrder = new AdOrderController();
$authAdmin = new AuthAdminController();
$userAdmin = new AdUserController();
// client
$wishList = new WishlistController();
$auth = new AuThController();
$home = new HomeController();
$cart = new Cartcontroller();
$updateacc = new MyAccController();
$order = new OrderController();
$products = new ShopController();
$reviews = new ReviewController();
switch ($actions) {
    case 'admin':
        $authAdmin->middleware();
        include '../views/admin/index.php';
        break;
    case 'user':
        $authAdmin->middleware();
        $userAdmin->indexUser();
        break;
    case 'auth':
        $authAdmin->signin();
        break;
    case 'logoutadmin':
        $authAdmin->logoutadmin();
        break;
    case 'product':
        $authAdmin->middleware();
        $adminProduct->index();
        break;
    case 'product-add':
        $authAdmin->middleware();
        $adminProduct->addProduct();
        break;
    case 'product-store':
        $authAdmin->middleware();
        $adminProduct->PrStore();
        break;
    case 'product-edit':
        $authAdmin->middleware();
        $adminProduct->edit();
        break;
    case 'product-update':
        $authAdmin->middleware();
        $adminProduct->update();
        break;
    case 'gallery-delete':
        $authAdmin->middleware();
        $adminProduct->deleteGallery();
        break;
    case 'product-variant-delete':
        $authAdmin->middleware();
        $adminProduct->deleteProductVariant();
        break;
    case 'product-delete':
        $authAdmin->middleware();
        $adminProduct->deleteProduct();
        break;
    case 'category':
        $authAdmin->middleware();
        $adminDanhmuc->index();
        break;
    case 'category-add':
        $authAdmin->middleware();
        $adminDanhmuc->addCategory();
        break;
    case 'category-edit':
        $authAdmin->middleware();
        $adminDanhmuc->updateCategory();
        break;
    case 'category-delete':
        $authAdmin->middleware();
        $adminDanhmuc->deleteCategorys();
        break;
    case 'coupon-list':
        $authAdmin->middleware();
        $couponAdmin->index();
        break;
    case 'coupon-add':
        $authAdmin->middleware();
        $couponAdmin->createCp();
        break;
    case 'coupon-edit':
        $authAdmin->middleware();
        $couponAdmin->editCoupons();
        break;
    case 'coupon-update':
        $authAdmin->middleware();
        $couponAdmin->updateCoupons();
        break;
    case 'coupon-delete':
        $authAdmin->middleware();
        $couponAdmin->deleteCoupons();
        break;
    case 'order-list':
        $authAdmin->middleware();
        $adminOrder->listOrder();
        break;
    case 'order-edit':
        $authAdmin->middleware();
       $adminOrder->editOrder();
        break;
    case 'order-update':
        $authAdmin->middleware();
        $adminOrder->updateOrder();
        break;

        //======================================================
    case 'index':
        $home->index();
        break;
    case 'login':
        $auth->logins();
        break;
    case 'register':
        $auth->registers();
        break;
    case 'logout':
        $auth->logout();
        break;
    case 'product-detail':
        $home->getProductDetail();
        break;
    case 'cart':
        $cart->index();
        break;
    case 'add-cart-byNow':
        $cart->addToCartOrByNow();
        break;
    case 'update-Cart':
        $cart->updateCarts();
        break;
    case 'delete-Cart':
        $cart->deleteCarts();
        break;
    case 'checkout':
        $order->index();
        break;
    case 'order':
        $order->checkout();
        break;
    case 'myaccount':
        $updateacc->index();
        break;
    case 'update-acc':
           $updateacc ->updateAcc();
        break;
    case 'product-list':
        $products->index();
        break;
    case 'about':
        include '../views/client/pages/about.php';
        break;
    case 'contact':
        include '../views/client/pages/contact.php';
        break;
    case 'forgot':
        $auth->resetPassword();
        break;
    case 'track-order':
        $updateacc->trackOder();
        break;
    case 'cancel-order':
        $updateacc->cancelOrders();
        break;
    case 'change-pass':
        $auth->changepass();
        break;
        case 'wishlist';
        $wishList->index();
        break;
    case 'wishlist-add';
        $wishList->add();
        break;
    case 'wishlist-delete';
        $wishList->delete();
        break;
    case 'vnpay_return':
        $order->vnpayReturn();
        break;
    case 'review';
        $reviews->Reviews();
        break;
};
