<footer class="bg_gray">
    <div class="footer_top small_pt pb_20">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-12 col-sm-12">
                    <div class="widget">
                        <div class="footer_logo">
                            <a href="#"><img src="client/assets/images/logo_dark.png" alt="logo" /></a>
                        </div>
                        <p class="mb-3">Tech Heaven- Trang thương mại điện tử lớn nhất Việt Nam</p>
                        <ul class="contact_info">
                            <li>
                                <i class="ti-location-pin"></i>
                                <p>P. Trịnh Văn Bô, Nam Từ Liêm, Hà Nội, Việt Nam</p>
                            </li>
                            <li>
                                <i class="ti-email"></i>
                                <a href="mailto:info@sitename.com">Laptoptechheaven@gmail.com</a>
                            </li>
                            <li>
                                <i class="ti-mobile"></i>
                                <p>0349370112</p>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-2 col-md-4 col-sm-6">
                    <div class="widget">
                        <h6 class="widget_title">Liên kết hữu ích</h6>
                        <ul class="widget_links">
                            <li><a href="#">Về chúng tôi</a></li>
                            <li><a href="#">FAQ</a></li>
                            <li><a href="#">Vị trí</a></li>
                            <li><a href="#">Chi nhánh</a></li>
                            <li><a href="#">Sự tiếp xúc</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-2 col-md-4 col-sm-6">
                    <div class="widget">
                        <h6 class="widget_title">Tài khoản của tôi</h6>
                        <ul class="widget_links">
                            <?php
                            if (isset($_SESSION['user'])) {
                                echo '<li><a href="index.php?act=myaccount">Tài khoản của tôi</a></li>';
                            } else {
                                echo '<li><a href="index.php?act=login">My Account</a></li>';
                            }
                            ?>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-12">
                    <div class="widget">
                        <h6 class="widget_title">Download App</h6>
                        <ul class="app_list">
                            <li><a href="#"><img src="client/assets/images/f1.png" alt="f1" /></a></li>
                            <li><a href="#"><img src="client/assets/images/f2.png" alt="f2" /></a></li>
                        </ul>
                    </div>
                    <div class="widget">
                        <h6 class="widget_title">Social</h6>
                        <ul class="social_icons">
                            <li><a href="#" class="sc_facebook"><i class="ion-social-facebook"></i></a></li>
                            <li><a href="#" class="sc_twitter"><i class="ion-social-twitter"></i></a></li>
                            <li><a href="#" class="sc_google"><i class="ion-social-googleplus"></i></a></li>
                            <li><a href="#" class="sc_youtube"><i class="ion-social-youtube-outline"></i></a></li>
                            <li><a href="#" class="sc_instagram"><i class="ion-social-instagram-outline"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="middle_footer">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="shopping_info">
                        <div class="row justify-content-center">
                            <div class="col-md-4">
                                <div class="icon_box icon_box_style2">
                                    <div class="icon">
                                        <i class="fas fa-laptop"></i>
                                    </div>
                                    <div class="icon_box_content">
                                        <h5>Sản phẩm chất lượng, chính hãng</h5>
                                        <p>Tất cả laptop tại Tech Heaven đều được nhập khẩu từ các thương hiệu uy tín, cam kết 100% chính hãng và bảo hành đầy đủ.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="icon_box icon_box_style2">
                                    <div class="icon">
                                        <i class="flaticon-shipped"></i>
                                    </div>
                                    <div class="icon_box_content">
                                        <h5>Giao hàng nhanh chóng, tiện lợi</h5>
                                        <p>Tech Heaven cam kết giao hàng nhanh trong thời gian ngắn nhất, với chính sách đổi trả rõ ràng và minh bạch nếu gặp vấn đề về sản phẩm giao.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="icon_box icon_box_style2">
                                    <div class="icon">
                                        <i class="flaticon-support"></i>
                                    </div>
                                    <div class="icon_box_content">
                                        <h5>Dịch vụ khách hàng tận tâm</h5>
                                        <p>Đội ngũ tư vấn viên giàu kinh nghiệm, thân thiện luôn sẵn sàng hỗ trợ khách hàng lựa chọn sản phẩm phù hợp với nhu cầu.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="bottom_footer border-top-tran">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <p class="text-center text-md-start mb-md-0">Nhóm 5 Tech Heaven</p>
                </div>
                <div class="col-lg-6">
                    <ul class="footer_payment text-center text-md-end">
                        <li><a href="#"><img src="client/assets/images/visa.png" alt="visa"></a></li>
                        <li><a href="#"><img src="client/assets/images/discover.png" alt="discover"></a></li>
                        <li><a href="#"><img src="client/assets/images/master_card.png" alt="master_card"></a></li>
                        <li><a href="#"><img src="client/assets/images/paypal.png" alt="paypal"></a></li>
                        <li><a href="#"><img src="client/assets/images/amarican_express.png" alt="amarican_express"></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- END FOOTER -->

<a href="#" class="scrollup" style="display: none;"><i class="ion-ios-arrow-up"></i></a>

<!-- Latest jQuery -->
<script src="client/assets/js/jquery-3.7.0.min.js"></script>
<!-- popper min js -->
<script src="client/assets/js/popper.min.js"></script>
<!-- Latest compiled and minified Bootstrap -->
<script src="client/assets/bootstrap/js/bootstrap.min.js"></script>
<!-- owl-carousel min js  -->
<script src="client/assets/owlcarousel/js/owl.carousel.min.js"></script>
<!-- magnific-popup min js  -->
<script src="client/assets/js/magnific-popup.min.js"></script>
<!-- waypoints min js  -->
<script src="client/assets/js/waypoints.min.js"></script>
<!-- parallax js  -->
<script src="client/assets/js/parallax.js"></script>
<!-- countdown js  -->
<script src="client/assets/js/jquery.countdown.min.js"></script>
<!-- imagesloaded js -->
<script src="client/assets/js/imagesloaded.pkgd.min.js"></script>
<!-- isotope min js -->
<script src="client/assets/js/isotope.min.js"></script>
<!-- jquery.dd.min js -->
<script src="client/assets/js/jquery.dd.min.js"></script>
<!-- slick js -->
<script src="client/assets/js/slick.min.js"></script>
<!-- elevatezoom js -->
<script src="client/assets/js/jquery.elevatezoom.js"></script>
<!-- scripts js -->
<script src="client/assets/js/scripts.js"></script>

</body>

<!-- Mirrored from bestwebcreator.com/shopwise/demo/index-6.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 11 Nov 2024 07:35:11 GMT -->

</html>