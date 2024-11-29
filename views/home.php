<!-- header -->
<?php require_once 'layout/header.php'; ?>
<!-- end header -->
<!-- menu -->
<?php require_once 'layout/navbar.php'; ?>
<!-- end menu -->



<main>
    <!-- hero slider area start -->
    <section class="slider-area">
        <div class="hero-slider-active slick-arrow-style slick-arrow-style_hero slick-dot-style">
            <!-- single slider item start -->
            <div class="hero-single-slide hero-overlay">
                <div class="hero-slider-item bg-img" data-bg="assets/img/slider/banner_nike1.jpg">
                    <div class="container">
                        <div class="row">
                        </div>
                    </div>
                </div>
            </div>
            <div class="hero-single-slide hero-overlay">
                <div class="hero-slider-item bg-img" data-bg="assets/img/slider/banner_nike2.jpg">
                    <div class="container">
                        <div class="row">
                        </div>
                    </div>
                </div>
            </div>
            <div class="hero-single-slide hero-overlay">
                <div class="hero-slider-item bg-img" data-bg="assets/img/banner/banner2.jpg">
                    <div class="container">
                        <div class="row">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- hero slider area end -->
    <!-- service policy area start -->
    <div class="service-policy section-padding">
        <div class="container">
            <div class="row mtn-30">
                <div class="col-sm-6 col-lg-3">
                    <div class="policy-item">
                        <div class="policy-icon">
                            <i class="pe-7s-plane"></i>
                        </div>
                        <div class="policy-content">
                            <h6>giao hàng</h6>
                            <p>miễn phí giao hàng</p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-3">
                    <div class="policy-item">
                        <div class="policy-icon">
                            <i class="pe-7s-help2"></i>
                        </div>
                        <div class="policy-content">
                            <h6>hỗ trợ 24/7</h6>
                            <p>hỗ trợ 24 giờ mỗi ngày</p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-3">
                    <div class="policy-item">
                        <div class="policy-icon">
                            <i class="pe-7s-back"></i>
                        </div>
                        <div class="policy-content">
                            <h6>Hoàn tiền</h6>
                            <p>Hoàn tiền trong 30 ngày</p>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 col-lg-3">
                    <div class="policy-item">
                        <div class="policy-icon">
                            <i class="pe-7s-credit"></i>
                        </div>
                        <div class="policy-content">
                            <h6>thanh toán</h6>
                            <p>Chúng tôi thanh toán bảo mật</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- service policy area end -->


    <!-- product area start -->
    <section class="product-area section-padding">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <!-- section title start -->
                    <div class="section-title text-center">
                        <h2 class="title">SẢN PHẨM</h2>
                        <p class="sub-title">Sản phẩm được cập nhật liên tục</p>
                    </div>
                    <!-- section title start -->
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="product-container">

                        <!-- product tab content start -->
                        <div class="tab-content">
                            <div class="tab-pane fade show active" id="tab1">
                                <div class="product-carousel-4 slick-row-10 slick-arrow-style">
                                    <!-- product item start -->
                                    <?php foreach ($listSanPham as $key => $SanPham): ?>
                                        <div class="product-item">
                                            <figure class="product-thumb">
                                                <a href="<?= BASE_URL . '?act=chi-tiet-san-pham&id_san_pham=' . $SanPham['id']; ?>">
                                                    <img class="pri-img" src="<?php echo BASE_URL . $SanPham['hinh_anh']; ?>" alt="">
                                                </a>
                                                <div class="product-badge">
                                                    <?php
                                                    $ngayNhap = new DateTime($SanPham['ngay_nhap']);
                                                    $ngayHienTai = new DateTime();
                                                    $tinhNgay = $ngayHienTai->diff($ngayNhap);
                                                    if ($tinhNgay->days <= 7) {
                                                    ?>
                                                        <div class="product-label new">
                                                            <span>mới</span>
                                                        </div>
                                                    <?php } ?>
                                                    <?php
                                                    if ($SanPham['gia_khuyen_mai']) {
                                                    ?>
                                                        <div class="product-label discount">
                                                            <span>giảm giá</span>
                                                        </div>
                                                    <?php } ?>
                                                </div>
                                                <div class=" button-group">
                                                    <a href="wishlist.html" data-bs-toggle="tooltip" data-bs-placement="left" title="Add to wishlist"><i class="pe-7s-like"></i></a>
                                                    <a href="compare.html" data-bs-toggle="tooltip" data-bs-placement="left" title="Add to Compare"><i class="pe-7s-refresh-2"></i></a>
                                                    <a href="#" data-bs-toggle="modal" data-bs-target="#quick_view"><span data-bs-toggle="tooltip" data-bs-placement="left" title="Quick View"><i class="pe-7s-search"></i></span></a>
                                                </div>
                                                <div class="cart-hover">
                                                    <a href="<?= BASE_URL . '?act=chi-tiet-san-pham&id_san_pham=' . $SanPham['id']; ?>"><button class="btn btn-cart">add to cart</button></a>
                                                </div>
                                            </figure>
                                            <div class="product-caption text-center">
                                                <h6 class="product-name">
                                                    <a href="<?= BASE_URL . '?act=chi-tiet-san-pham&id_san_pham=' . $SanPham['id']; ?>"><?= $SanPham['ten_san_pham'] ?></a>
                                                </h6>
                                                <div class="price-box">
                                                    <?php
                                                    if ($SanPham['gia_khuyen_mai']) {
                                                    ?>
                                                        <span class="price-regular"><?= formatPrice($SanPham['gia_khuyen_mai']) . 'đ' ?></span>
                                                        <span class="price-old"><del><?= formatPrice($SanPham['gia_san_pham']) . 'đ' ?> </del></span>
                                                    <?php } else { ?>
                                                        <span class="price-regular"><?= formatPrice($SanPham['gia_san_pham']) . 'đ' ?></span>
                                                    <?php } ?>


                                                </div>
                                            </div>
                                        </div>
                                    <?php endforeach ?>
                                    <!-- product item end -->
                                </div>
                            </div>
                        </div>
                        <!-- product tab content end -->
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- product area end -->

    <!-- featured product area start -->
    <section class="feature-product section-padding">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <!-- section title start -->
                    <div class="section-title text-center">
                        <h2 class="title">featured products</h2>
                        <p class="sub-title">Add featured products to weekly lineup</p>
                    </div>
                    <!-- section title start -->
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="product-carousel-4_2 slick-row-10 slick-arrow-style">
                        <!-- product item start -->
                        <?php foreach ($listSanPham as $key => $SanPham): ?>
                            <div class="product-item">
                                <figure class="product-thumb">
                                    <a href="<?= BASE_URL . '?act=chi-tiet-san-pham&id_san_pham=' . $SanPham['id']; ?>">
                                        <img class="pri-img" src="<?php echo BASE_URL . $SanPham['hinh_anh']; ?>" alt="">
                                    </a>
                                    <div class="product-badge">
                                        <?php
                                        $ngayNhap = new DateTime($SanPham['ngay_nhap']);
                                        $ngayHienTai = new DateTime();
                                        $tinhNgay = $ngayHienTai->diff($ngayNhap);
                                        if ($tinhNgay->days <= 7) {
                                        ?>
                                            <div class="product-label new">
                                                <span>mới</span>
                                            </div>
                                        <?php } ?>
                                        <?php
                                        if ($SanPham['gia_khuyen_mai']) {
                                        ?>
                                            <div class="product-label discount">
                                                <span>giảm giá</span>
                                            </div>
                                        <?php } ?>
                                    </div>
                                    <div class=" button-group">
                                        <a href="wishlist.html" data-bs-toggle="tooltip" data-bs-placement="left" title="Add to wishlist"><i class="pe-7s-like"></i></a>
                                        <a href="compare.html" data-bs-toggle="tooltip" data-bs-placement="left" title="Add to Compare"><i class="pe-7s-refresh-2"></i></a>
                                        <a href="#" data-bs-toggle="modal" data-bs-target="#quick_view"><span data-bs-toggle="tooltip" data-bs-placement="left" title="Quick View"><i class="pe-7s-search"></i></span></a>
                                    </div>
                                    <div class="cart-hover">
                                        <a href="<?= BASE_URL . '?act=chi-tiet-san-pham&id_san_pham=' . $SanPham['id']; ?>"><button class="btn btn-cart">add to cart</button></a>
                                    </div>
                                </figure>
                                <div class="product-caption text-center">
                                    <h6 class="product-name">
                                        <a href="<?= BASE_URL . '?act=chi-tiet-san-pham&id_san_pham=' . $SanPham['id']; ?>"><?= $SanPham['ten_san_pham'] ?></a>
                                    </h6>
                                    <div class="price-box">
                                        <?php
                                        if ($SanPham['gia_khuyen_mai']) {
                                        ?>
                                            <span class="price-regular"><?= formatPrice($SanPham['gia_khuyen_mai']) . 'đ' ?></span>
                                            <span class="price-old"><del><?= formatPrice($SanPham['gia_san_pham']) . 'đ' ?> </del></span>
                                        <?php } else { ?>
                                            <span class="price-regular"><?= formatPrice($SanPham['gia_san_pham']) . 'đ' ?></span>
                                        <?php } ?>


                                    </div>
                                </div>
                            </div>
                        <?php endforeach ?>
                        <!-- product item end -->
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- featured product area end -->

    <!-- group product start -->
    <section class="group-product-area section-padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="group-product-banner">
                        <figure class="banner-statistics">
                            <a href="#">
                                <img src="assets/img/banner/banner2.jpg" alt="product banner">
                            </a>
                        </figure>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="categories-group-wrapper">
                        <!-- section title start -->
                        <div class="section-title-append">
                            <h4>best seller product</h4>
                            <div class="slick-append"></div>
                        </div>
                        <!-- section title start -->

                        <!-- group list carousel start -->
                        <div class="group-list-item-wrapper">
                            <div class="group-list-carousel">
                                <!-- group list item start -->
                                <?php foreach ($listSanPham as $key => $SanPham) {
                                ?>
                                    <div class="group-slide-item">
                                        <div class="group-item">
                                            <div class="group-item-thumb">
                                                <a href="<?= BASE_URL . '?act=chi-tiet-san-pham&' ?>">
                                                    <img src="<?php echo BASE_URL . $SanPham['hinh_anh']; ?>" alt="">
                                                </a>
                                            </div>
                                            <div class="group-item-desc">
                                                <h5 class="group-product-name"><a href="<?= BASE_URL . '?act=chi-tiet-san-pham&id_san_pham=' . $SanPham['id']; ?>"><?= $SanPham['ten_san_pham'] ?></a></h5>
                                                <div class="price-box">
                                                    <?php if ($SanPham['gia_khuyen_mai']) { ?>
                                                        <span class="price-regular"><?= formatPrice($SanPham['gia_khuyen_mai']) . 'đ' ?></span><br>
                                                        <span class="price-old"><del><?= formatPrice($SanPham['gia_san_pham']) . 'đ' ?></del></span>
                                                    <?php } else { ?>
                                                        <span class="price-regular"><?= formatPrice($SanPham['gia_san_pham']) . 'đ' ?></span>
                                                    <?php } ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php
                                } ?>
                                <!-- group list item end -->
                            </div>
                        </div>
                        <!-- group list carousel start -->
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="categories-group-wrapper">
                        <!-- section title start -->
                        <div class="section-title-append">
                            <h4>Đang giảm giá</h4>
                            <div class="slick-append"></div>
                        </div>
                        <!-- section title start -->

                        <!-- group list carousel start -->
                        <div class="group-list-item-wrapper">
                            <div class="group-list-carousel">
                                <!-- group list item start -->
                                <?php foreach ($listSanPham as $key => $SanPham) {
                                    if ($SanPham['gia_khuyen_mai']) { ?>
                                        <div class="group-slide-item">
                                            <div class="group-item">
                                                <div class="group-item-thumb">
                                                    <a href="<?= BASE_URL . '?act=chi-tiet-san-pham&id_san_pham=' . $SanPham['id']; ?>">
                                                        <img src="<?php echo BASE_URL . $SanPham['hinh_anh']; ?>" alt="">
                                                    </a>
                                                </div>
                                                <div class="group-item-desc">
                                                    <h5 class="group-product-name"><a href="<?= BASE_URL . '?act=chi-tiet-san-pham&id_san_pham=' . $SanPham['id']; ?>"><?= $SanPham['ten_san_pham'] ?></a></h5>
                                                    <div class="price-box">
                                                        <span class="price-regular"><?= formatPrice($SanPham['gia_khuyen_mai']) . 'đ' ?></span><br>
                                                        <span class="price-old"><del><?= formatPrice($SanPham['gia_san_pham']) . 'đ' ?></del></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                <?php }
                                } ?>
                                <!-- group list item end -->
                            </div>
                        </div>
                        <!-- group list carousel start -->
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- group product end -->


</main>





<!-- offcanvas mini cart start -->
<!-- offcanvas mini cart end -->
<?php require_once 'layout/footer.php'; ?>