<?php include '../views/client/layout/header.php' ?>

<!-- START SECTION BANNER -->
<div class="banner_section slide_medium shop_banner_slider staggered-animation-wrap">
    <div id="carouselExampleControls" class="carousel slide carousel-fade light_arrow" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item background_bg active" data-img-src="client/assets/images/banner16.jpg">
                <div class="banner_slide_content banner_content_inner">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-7 col-10">
                                <div class="banner_content overflow-hidden">
                                    <h2 class="staggered-animation" data-animation="slideInLeft" data-animation-delay="0.5s">Macbook Pro 14 M2 Pro</h2>
                                    <h5 class="mb-3 mb-sm-4 staggered-animation font-weight-light" data-animation="slideInLeft" data-animation-delay="1s">Get up to <span class="text_default">50%</span> off Today Only!</h5>
                                    <a class="btn btn-fill-out staggered-animation text-uppercase" href="shop-left-sidebar.html" data-animation="slideInLeft" data-animation-delay="1.5s">Shop Now</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="carousel-item background_bg" data-img-src="client/assets/images/banner17.jpg">
                <div class="banner_slide_content banner_content_inner">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-8 col-10">
                                <div class="banner_content overflow-hidden">
                                    <h2 class="staggered-animation" data-animation="slideInLeft" data-animation-delay="0.5s">HP Victus 16</h2>
                                    <h5 class="mb-3 mb-sm-4 staggered-animation font-weight-light" data-animation="slideInLeft" data-animation-delay="1s"><span class="text_default">BEST</span> for gamers</h5>
                                    <a class="btn btn-fill-out staggered-animation text-uppercase" href="shop-left-sidebar.html" data-animation="slideInLeft" data-animation-delay="1.5s">Shop Now</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="carousel-item background_bg" data-img-src="client/assets/images/banner18.jpg">
                <div class="banner_slide_content banner_content_inner">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-8 col-10">
                                <div class="banner_content overflow-hidden">
                                    <h2 class="staggered-animation" data-animation="slideInLeft" data-animation-delay="0.5s">Lenovo Yoga Pro 7</h2>
                                    <h5 class="mb-3 mb-sm-4 staggered-animation font-weight-light" data-animation="slideInLeft" data-animation-delay="1s">Passionately engineered for creative professionals</h5>
                                    <a class="btn btn-fill-out staggered-animation text-uppercase" href="shop-left-sidebar.html" data-animation="slideInLeft" data-animation-delay="1.5s">Shop Now</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-bs-slide="prev"><i class="ion-chevron-left"></i></a>
        <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-bs-slide="next"><i class="ion-chevron-right"></i></a>
    </div>
</div>
<!-- END SECTION BANNER -->

<div class="main_content">

    <!-- START SECTION BANNER -->
    <div class="section pb_20 small_pt">
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="sale-banner mb-3 mb-md-4">
                        <a class="hover_effect1" href="#">
                            <img src="client/assets/images/shop_banner_img7.jpg" alt="shop_banner_img7">
                        </a>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="sale-banner mb-3 mb-md-4">
                        <a class="hover_effect1" href="#">
                            <img src="client/assets/images/shop_banner_img8.jpg" alt="shop_banner_img8">
                        </a>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="sale-banner mb-3 mb-md-4">
                        <a class="hover_effect1" href="#">
                            <img src="client/assets/images/shop_banner_img9.jpg" alt="shop_banner_img9">
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END SECTION BANNER -->

    <!-- START SECTION CATEGORIES -->
    <div class="section small_pb small_pt">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="heading_s4 text-center">
                        <h2>Danh mục hàng đầu</h2>
                    </div>
                    <p class="text-center leads">Trên website bán laptop,
                        danh mục hàng đầu đóng vai trò quan trọng trong việc hướng dẫn khách hàng nhanh chóng tìm được sản phẩm phù hợp. </p>
                </div>
            </div>
            <div class="row align-items-center">
                <div class="col-12">
                    <div class="cat_slider cat_style1 mt-4 mt-md-0 carousel_slider owl-carousel owl-theme nav_style5" data-loop="true" data-dots="false" data-nav="true" data-margin="30" data-responsive='{"0":{"items": "2"}, "480":{"items": "3"}, "576":{"items": "4"}, "768":{"items": "5"}, "991":{"items": "6"}, "1199":{"items": "7"}}'>
                        <?php foreach ($category as $danhMuc) : ?>
                            <div class="item">
                                <div class="categories_box">
                                    <a href="#">
                                        <img src="./images/category/<?php echo $danhMuc['image']; ?>" alt="cat_img1" />
                                        <span><?php echo $danhMuc['name']; ?></span>
                                    </a>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END SECTION CATEGORIES -->

    <!-- START SECTION SHOP -->
    <div class="section small_pb small_pt">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="heading_s1 text-center">
                        <h2>Sản phẩm mới về</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="tab_slider tab-content">
                        <div class="tab-pane fade show active" id="arrival" role="tabpanel" aria-labelledby="arrival-tab">
                            <div class="product_slider carousel_slider owl-carousel owl-theme dot_style1" data-loop="true" data-margin="20" data-responsive='{"0":{"items": "1"}, "481":{"items": "2"}, "768":{"items": "3"}, "991":{"items": "4"}}'>
                                <?php foreach ($newProducts as $pro) : ?>

                                    <div class="item">
                                        <div class="product_wrap">
                                            <div class="product_img">
                                                <a href="shop-product-detail.html">
                                                    <img src="./images/product/<?= $pro['image'] ?>" alt="el_img1" height="260px">

                                                </a>
                                                <div class="product_action_box">
                                                    <ul class="list_none pr_action_btn">
                                                        <li><a href="index.php?act=wishlist-add&product_id=<?= $pro['product_Id'] ?>"><i class="icon-heart"></i></a></li>
                                                    </ul>
                                                </div>
                                            </div>

                                            <div class="product_info">
                                                <h6 class="product_title"><a href="?act=product-detail&id=<?= $pro['product_Id'] ?>"><?= $pro['name'] ?></a></h6>
                                                <div class="product_price">
                                                    <span class="price"><?= number_format($pro['price']) ?></span>
                                                    <del><?= number_format($pro['sale_price']) ?></del>
                                                    <div class="on_sale">
                                                        <span>Tiết kiệm 20%!</span>
                                                    </div>
                                                </div>
                                                
                                                <div class="pr_desc">
                                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus
                                                        blandit massa enim. Nullam id varius nunc id varius nunc.</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
<!-- END SECTION SHOP -->

<!-- START SECTION BANNER -->
<div class="section pb_20 small_pt">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="sale-banner mb-3 mb-md-4">
                    <a class="hover_effect1" href="#">
                        <img src="client/assets/images/shop_banner_img11.png" alt="shop_banner_img11">
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- END SECTION BANNER -->

<!-- START SECTION SHOP -->
<div class="section small_pt">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="heading_s1 text-center">
                    <h2>Sản phẩm bán chạy</h2>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="product_slider carousel_slider owl-carousel owl-theme dot_style1" data-loop="true" data-margin="20" data-responsive='{"0":{"items": "1"}, "481":{"items": "2"}, "768":{"items": "3"}, "991":{"items": "4"}}'>
                    <?php foreach ($HotProducts as $pro) : ?>

                        <div class="item">
                            <div class="product_wrap">
                                <div class="product_img">
                                    <a href="shop-product-detail.html">
                                        <img src="./images/product/<?= $pro['image'] ?>" alt="el_img1" height="260px">
                                    </a>
                                    <div class="product_action_box">
                                        <ul class="list_none pr_action_btn">
                                            <li><a href="index.php?act=wishlist-add&product_id=<?= $pro['product_Id'] ?>"><i class="icon-heart"></i></a></li>
                                        </ul>
                                    </div>
                                </div>

                                <div class="product_info">
                                    <h6 class="product_title"><a href="?act=product-detail&id=<?= $pro['product_Id'] ?>"><?= $pro['name'] ?></a></h6>
                                    <div class="product_price">
                                        <span class="price"><?= number_format($pro['price']) ?></span>
                                        <del><?= number_format($pro['sale_price']) ?></del>
                                        <div class="on_sale">
                                            <span>Tiết kiệm 20%!</span>
                                        </div>
                                    </div>
                                   
                                    <div class="pr_desc">
                                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus
                                            blandit massa enim. Nullam id varius nunc id varius nunc.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- END SECTION SHOP -->

<!-- START SECTION TESTIMONIAL -->
<div class="section bg_redon">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="heading_s1 text-center">
                    <h2>Khách hàng của chúng tôi nói!</h2>
                </div>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-lg-9">
                <div class="testimonial_wrap testimonial_style1 carousel_slider owl-carousel owl-theme nav_style2" data-nav="true" data-dots="false" data-center="true" data-loop="true" data-autoplay="true" data-items='1'>
                    <div class="testimonial_box">
                        <div class="testimonial_desc">
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. A aliquam amet animi
                                blanditiis consequatur debitis dicta distinctio, enim error eum iste libero modi nam
                                natus perferendis possimus quasi sint sit tempora voluptatem.</p>
                        </div>
                        <div class="author_wrap">
                            <div class="author_img">
                                <img src="client/assets/images/user_img1.jpg" alt="user_img1" />
                            </div>
                            <div class="author_name">
                                <h6>Lissa Castro</h6>
                                <span>Designer</span>
                            </div>
                        </div>
                    </div>
                    <div class="testimonial_box">
                        <div class="testimonial_desc">
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. A aliquam amet animi
                                blanditiis consequatur debitis dicta distinctio, enim error eum iste libero modi nam
                                natus perferendis possimus quasi sint sit tempora voluptatem.</p>
                        </div>
                        <div class="author_wrap">
                            <div class="author_img">
                                <img src="client/assets/images/user_img2.jpg" alt="user_img2" />
                            </div>
                            <div class="author_name">
                                <h6>Alden Smith</h6>
                                <span>Designer</span>
                            </div>
                        </div>
                    </div>
                    <div class="testimonial_box">
                        <div class="testimonial_desc">
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. A aliquam amet animi
                                blanditiis consequatur debitis dicta distinctio, enim error eum iste libero modi nam
                                natus perferendis possimus quasi sint sit tempora voluptatem.</p>
                        </div>
                        <div class="author_wrap">
                            <div class="author_img">
                                <img src="client/assets/images/user_img3.jpg" alt="user_img3" />
                            </div>
                            <div class="author_name">
                                <h6>Daisy Lana</h6>
                                <span>Designer</span>
                            </div>
                        </div>
                    </div>
                    <div class="testimonial_box">
                        <div class="testimonial_desc">
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. A aliquam amet animi
                                blanditiis consequatur debitis dicta distinctio, enim error eum iste libero modi nam
                                natus perferendis possimus quasi sint sit tempora voluptatem.</p>
                        </div>
                        <div class="author_wrap">
                            <div class="author_img">
                                <img src="client/assets/images/user_img4.jpg" alt="user_img4" />
                            </div>
                            <div class="author_name">
                                <h6>John Becker</h6>
                                <span>Designer</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- END SECTION TESTIMONIAL -->

<!-- START SECTION BLOG -->
<div class="section pb_20">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6 col-md-8">
                <div class="heading_s1 text-center">
                    <h2>Tin mới nhất</h2>
                </div>
                <p class="leads text-center">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod
                    tempor incididunt ut labore.</p>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-lg-4 col-md-6">
                <div class="blog_post blog_style2 box_shadow1">
                    <div class="blog_img">
                        <a href="blog-single.html">
                            <img src="client/assets/images/el_blog_img1.jpg" alt="el_blog_img1">
                        </a>
                    </div>
                    <div class="blog_content bg-white">
                        <div class="blog_text">
                            <h5 class="blog_title"><a href="blog-single.html">But I must explain to you how all this
                                    mistaken idea</a></h5>
                            <ul class="list_none blog_meta">
                                <li><a href="#"><i class="ti-calendar"></i> April 14, 2018</a></li>
                                <li><a href="#"><i class="ti-comments"></i> 2 Comment</a></li>
                            </ul>
                            <p>If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't
                                anything hidden in the text</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="blog_post blog_style2 box_shadow1">
                    <div class="blog_img">
                        <a href="blog-single.html">
                            <img src="client/assets/images/el_blog_img2.jpg" alt="el_blog_img2">
                        </a>
                    </div>
                    <div class="blog_content bg-white">
                        <div class="blog_text">
                            <h5 class="blog_title"><a href="blog-single.html">On the other hand we provide denounce
                                    with righteous</a></h5>
                            <ul class="list_none blog_meta">
                                <li><a href="#"><i class="ti-calendar"></i> April 14, 2018</a></li>
                                <li><a href="#"><i class="ti-comments"></i> 2 Comment</a></li>
                            </ul>
                            <p>If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't
                                anything hidden in the text</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="blog_post blog_style2 box_shadow1">
                    <div class="blog_img">
                        <a href="blog-single.html">
                            <img src="client/assets/images/el_blog_img3.jpg" alt="el_blog_img2">
                        </a>
                    </div>
                    <div class="blog_content bg-white">
                        <div class="blog_text">
                            <h5 class="blog_title"><a href="blog-single.html">Why is a ticket to Lagos so
                                    expensive?</a></h5>
                            <ul class="list_none blog_meta">
                                <li><a href="#"><i class="ti-calendar"></i> April 14, 2018</a></li>
                                <li><a href="#"><i class="ti-comments"></i> 2 Comment</a></li>
                            </ul>
                            <p>If you are going to use a passage of Lorem Ipsum, you need to be sure there isn't
                                anything hidden in the text</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- END SECTION BLOG -->

<!-- START SECTION CLIENT LOGO -->
<div class="section small_pt">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="client_logo carousel_slider owl-carousel owl-theme" data-dots="false" data-margin="30" data-loop="true" data-autoplay="true" data-responsive='{"0":{"items": "2"}, "480":{"items": "3"}, "767":{"items": "4"}, "991":{"items": "5"}}'>
                    <div class="item">
                        <div class="cl_logo">
                            <img src="client/assets/images/cl_logo1.png" alt="cl_logo" />
                        </div>
                    </div>
                    <div class="item">
                        <div class="cl_logo">
                            <img src="client/assets/images/cl_logo2.png" alt="cl_logo" />
                        </div>
                    </div>
                    <div class="item">
                        <div class="cl_logo">
                            <img src="client/assets/images/cl_logo3.png" alt="cl_logo" />
                        </div>
                    </div>
                    <div class="item">
                        <div class="cl_logo">
                            <img src="client/assets/images/cl_logo4.png" alt="cl_logo" />
                        </div>
                    </div>
                    <div class="item">
                        <div class="cl_logo">
                            <img src="client/assets/images/cl_logo5.png" alt="cl_logo" />
                        </div>
                    </div>
                    <div class="item">
                        <div class="cl_logo">
                            <img src="client/assets/images/cl_logo6.png" alt="cl_logo" />
                        </div>
                    </div>
                    <div class="item">
                        <div class="cl_logo">
                            <img src="client/assets/images/cl_logo7.png" alt="cl_logo" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- END SECTION CLIENT LOGO -->

<!-- START SECTION SUBSCRIBE NEWSLETTER -->
<div class="section bg_default small_pt small_pb">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-6">
                <div class="newsletter_text text_white">
                    <h3>Tham gia bản tin của chúng tôi ngay bây giờ</h3>
                    <p> Đăng ký ngay để nhận thông tin cập nhật về các chương trình khuyến mãi. </p>
                </div>
            </div>
            <div class="col-md-6">
                <div class="newsletter_form2">
                    <form>
                        <input type="text" required="" class="form-control rounded-0" placeholder="Enter Email Address">
                        <button type="submit" class="btn btn-dark rounded-0" name="submit" value="Submit">Đăng ký</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- START SECTION SUBSCRIBE NEWSLETTER -->

</div>
<!-- END MAIN CONTENT -->
<?php include '../views/client/layout/footer.php' ?>