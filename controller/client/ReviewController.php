<?php 
require_once '../models/reviews.php';
 
class ReviewController extends Reviews{
    public function Reviews(){
        if(isset($_SESSION['user'])){
            if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['review'])){
                // echo'<pre>';
                // print_r($_POST);
                // echo'<pre>';

                if(empty($_POST['product_id']) || empty($_POST['content'])
                ){
                    $_SESSION['error'] = 'Vui lòng nhập đủ thông tin';
                    header('location:'. $_SERVER['HTTP_REFERER']);
                    exit();
                }

                $reviews = $this->sendReviews($_SESSION['user']['user_Id'],$_POST['product_id'], $_POST['content']);
                if($reviews){
                    $_SESSION['success'] = 'Đánh giá sản phẩm thành công';
                    header('location:'. $_SERVER['HTTP_REFERER']);
                    exit();
                }else{
                    $_SESSION['error'] = 'Bạn phải mua hàng mới được đánh giá sản phẩm';
                    header('location:'. $_SERVER['HTTP_REFERER']);
                    exit();
                }
            }
        }else{
            $_SESSION['error'] = 'Vui lòng đăng nhập để bình luận';
            header('location:'. $_SERVER['HTTP_REFERER']);
            exit();
        }
    }
}
?>
