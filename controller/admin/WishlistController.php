<?php
require_once '../models/Wishlist.php';
class WishlistController extends Wishlist{
    public function index(){
        if (!isset($_SESSION['user']['user_Id'])) {
            $_SESSION['error'] = 'Bạn cần đăng nhập để xem danh sách yêu thích.';
            header('location:index.php?act=index');
            exit();
        }

        $wishListList = $this->listWishlist();
        

        include '../views/client/wishlist/wishlist.php';
    }
    public function add() {

        
        $checkWishList = $this->checkWishlist();
    
        if ($checkWishList) {
            $_SESSION['error'] = 'Sản phẩm đã có trong danh sách yêu thích';
            header('location:' . $_SERVER['HTTP_REFERER']);
            exit();
        }
    

        $addWishList = $this->addWishlist();
    
        if ($addWishList) {
            $_SESSION['success'] = 'Thêm sản phẩm yêu thích thành công';
        } else {
            $_SESSION['error'] = 'Lỗi khi thêm sản phẩm';
        }
    

        header('location:' . $_SERVER['HTTP_REFERER']);
        exit();
    }
    
    public function delete(){
        try {
            $this->deleteWishlist();
            $_SESSION['success'] = 'Xóa sản phẩm yêu thích thành công';
            header('location:index.php?act=wishlist');
            exit();

        }catch(\Throwable $th){
            $_SESSION['error']='Xóa sản phẩm yêu thích thất bại';
            header('location:'. $_SERVER['HTTP_REFERER']);
            exit();
        }
    }
}
?>