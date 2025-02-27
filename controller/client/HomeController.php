<?php
require_once '../models/danhMuc.php';
require_once '../models/product.php';
require_once '../models/reviews.php';
class HomeController{
    protected $category;
    protected $product;

    protected $review;

    public function __construct(){
        $this->category = new danhMuc();
        $this->product = new product();
        $this->review = new Reviews();
    }
    public function index() {
        $category = $this->category->listDanhMucActive();
        $product = $this->product->listProduct();
        $newProducts = $this->product->newProducts();
        $HotProducts = $this->product->MostViewedPro();
        
    
        $productDetail = null;
        if (isset($_GET['id'])) {
            $productDetail = $this->product->getProductById($_GET['id']);
        }
    
        // echo '<pre>';
        // print_r($productDetail);
        // echo '</pre>';
    
        include '../views/client/index.php';
    }
    
    
    

    public function getProductDetail(){
        $productDetail = $this->product->getProductById($_GET['id']);
        $productDetail = reset($productDetail);
        $reviews = $this->review->getReviews($productDetail['product_id']);
        $category = $this->category->listDanhMuc();
      

        // echo'<pre>';
        // print_r($customRating);
        // echo'<pre>';
        include '../views/client/product/product-detail.php';
    }

   
}