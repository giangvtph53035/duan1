<?php 
require_once '../models/danhMuc.php';
require_once '../models/product.php';
class ShopController{

    protected $product;
    protected $category;
    public function __construct(){
        $this->product = new Product();
        $this->category = new danhMuc();
    }

    public function index(){
        $category = $this->category->listDanhMuc();
        $product = $this->product->listProduct();
        $newProducts = $this->product->newProducts();
        $HotProducts = $this->product->MostViewedPro();
        $productDetail = null;
        $result = $this->searchPr();

        // echo'<pre>';
        // print_r($result);
        // echo'<pre>';

        if(!empty($result)){
            $newProducts = $result ;
        }

        if (isset($_GET['id'])) {
            $productDetail = $this->product->getProductById($_GET['id']);
        }
        include '../views/client/pages/product-list.php';
    }

    public function searchPr(){
        if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['search'])){
            $result = $this->product->searchProduct($_POST['keyword']);
            $_SESSION['keyword'] = $_POST['keyword'];
            if($result){
                $_SESSION['success']= 'Kết quả tìm kiếm với từ khóa'. ' ' .$_POST['keyword'];
            }else{
                $_SESSION['error'] = 'Không tìm thấy kết quả với từ khóa'.' ' .$_POST['keyword'];
                header('location:' .$_SERVER['HTTP_REFERER']);
                exit();
            }

            return $result;

        }
    }
}

?>