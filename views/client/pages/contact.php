<?php include '../views/client/layout/header.php'; ?>

<!-- START SECTION BREADCRUMB -->
<div class="breadcrumb_section bg_gray page-title-mini">
    <div class="container"><!-- STRART CONTAINER -->
        <div class="row align-items-center">
        	<div class="col-md-6">
                <div class="page-title">
            		<h1>Thông tin liên hệ</h1>
                </div>
            </div>
            <div class="col-md-6">
                <ol class="breadcrumb justify-content-md-end">
                    <li class="breadcrumb-item"><a href="index.php?act=index">Trang chủ</a></li>
                    <li class="breadcrumb-item active">Liên hệ</li>
                </ol>
            </div>
        </div>
    </div><!-- END CONTAINER-->
</div>
<!-- END SECTION BREADCRUMB -->

<!-- START MAIN CONTENT -->
<div class="main_content">

<!-- START SECTION CONTACT -->
<div class="section pb_70">
	<div class="container">
        <div class="row">
            <div class="col-xl-4 col-md-6">
            	<div class="contact_wrap contact_style3">
                    <div class="contact_icon">
                        <i class="linearicons-map2"></i>
                    </div>
                    <div class="contact_text">
                        <span>Địa chỉ</span>
                        <p>P. Trịnh Văn Bô, Nam Từ Liêm, Hà Nội</p>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-md-6">
            	<div class="contact_wrap contact_style3">
                    <div class="contact_icon">
                        <i class="linearicons-envelope-open"></i>
                    </div>
                    <div class="contact_text">
                        <span>Email</span>
                        <a href="mailto:info@sitename.com">Laptoptechheaven@gmail.com</a>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-md-6">
            	<div class="contact_wrap contact_style3">
                    <div class="contact_icon">
                        <i class="linearicons-tablet2"></i>
                    </div>
                    <div class="contact_text">
                        <span>Số điện thoại</span>
                        <p>0342908966</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- END SECTION CONTACT -->

<!-- START SECTION CONTACT -->
<div class="section pt-0">
	<div class="container">
    	<div class="row">
        	<div class="col-lg-6">
            	<div class="heading_s1">
                	<h2>Liên lạc với chúng tôi</h2>
                </div>
                <p class="leads">Vui lòng để lại thông tin liên hệ, sẵn sàng tư vấn khách hàng 24/7.</p>
                <div class="field_form">
                    <form method="post" name="enq">
                        <div class="row">
                            <div class="form-group col-md-6 mb-3">
                                <input required placeholder="Họ và tên" id="first-name" class="form-control" name="name" type="text">
                             </div>
                            <div class="form-group col-md-6 mb-3">
                                <input required placeholder="Email" id="email" class="form-control" name="email" type="email">
                            </div>
                            <div class="form-group col-md-6 mb-3">
                                <input required placeholder="Số điện thoại" id="phone" class="form-control" name="phone">
                            </div>
                            <div class="form-group col-md-6 mb-3">
                                <input placeholder="Nhập chủ đề" id="subject" class="form-control" name="subject">
                            </div>
                            <div class="form-group col-md-12 mb-3">
                                <textarea required placeholder="Nội dung" id="description" class="form-control" name="message" rows="4"></textarea>
                            </div>
                            <div class="col-md-12 mb-3">
                                <button type="submit" title="Submit Your Message!" class="btn btn-fill-out" id="submitButton" name="submit" value="Submit">Gửi thông tin</button>
                            </div>
                            <div class="col-md-12 mb-3">
                                <div id="alert-msg" class="alert-msg text-center"></div>
                            </div>
                        </div>
                    </form>		
                </div>
            </div>
            <div class="col-lg-6 pt-2 pt-lg-0 mt-4 mt-lg-0">
            	<div id="map" class="contact_map2" data-zoom="12" data-latitude="40.680" data-longitude="-73.945" data-icon="">
                <img src="./images/product/673f4a8d049a4-product_img5_MsiCross16.jpg" alt="about_img"/>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- END SECTION CONTACT -->

</div>
<!-- END MAIN CONTENT -->

<?php include '../views/client/layout/footer.php' ?>