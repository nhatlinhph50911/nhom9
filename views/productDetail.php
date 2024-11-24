<!-- header -->
<?php require_once 'layout/header.php'; ?>
<!-- end header -->
<!-- menu -->
<?php require_once 'layout/navbar.php'; ?>
<!-- end menu -->

<main>
    <!-- breadcrumb area start -->
    <div class="breadcrumb-area">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb-wrap">
                        <nav aria-label="breadcrumb">
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="<?= BASE_URL ?>"><i class="fa fa-home"></i></a></li>
                                <li class="breadcrumb-item"><a href="shop.html">sản phẩm</a></li>
                                <li class="breadcrumb-item active" aria-current="page">chi tiết sản phẩm</li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumb area end -->

    <!-- page main wrapper start -->
    <div class="shop-main-wrapper section-padding pb-0">
        <div class="container">
            <div class="row">
                <!-- product details wrapper start -->
                <div class="col-lg-12 order-1 order-lg-2">
                    <!-- product details inner end -->
                    <div class="product-details-inner">
                        <div class="row">
                            <div class="col-lg-5">
                                <div class="product-large-slider">
                                    <div class="pro-large-img img-zoom">
                                        <img src="<?= BASE_URL . $SanPham['hinh_anh'] ?>" alt="product-details" />
                                    </div>
                                </div>
                                <div class="pro-nav slick-row-10 slick-arrow-style">
                                    <?php foreach ($listAnhSP as $key => $anhSP): ?>
                                        <div class="pro-nav-thumb">
                                            <img src="<?= BASE_URL . $anhSP['link_hinh_anh'] ?>" alt="product-details" />
                                        </div>
                                    <?php endforeach ?>

                                </div>
                            </div>
                            <div class="col-lg-7">
                                <div class="product-details-des">
                                    <div class="manufacturer-name">
                                        <a href="product-details.html"><?= $SanPham['ten_danh_muc'] ?></a>
                                    </div>
                                    <h3 class="product-name"><?= $SanPham['ten_san_pham'] ?></h3>
                                    <div class="ratings d-flex">
                                        <div class="pro-review">
                                            <?php $countCmt = count($listCmt); ?>
                                            <span><?= $countCmt . ' bình luận' ?></span>
                                        </div>
                                    </div>
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
                                    <div class="availability">
                                        <i class="fa fa-check-circle"></i>
                                        <span>số lượng: <?= $SanPham['so_luong'] ?></span>
                                    </div>
                                    <p class="pro-desc"><?= $SanPham['mo_ta']; ?></p>
                                    <form action="<?= BASE_URL . '?act=them-gio-hang' ?>" method="post">
                                        <div class="pro-size">
                                            <h6 class="option-title">size :</h6>
                                            <select name="size" class="nice-select">
                                                <?php foreach ($sizes as $key => $size) { ?>
                                                    <option><?= $size['size'] ?></option>
                                                <?php  } ?>
                                            </select>
                                        </div>
                                        <div class="quantity-cart-box d-flex align-items-center">
                                            <h6 class="option-title">só lượng:</h6>
                                            <div class="quantity">
                                                <input type="hidden" name="san_pham_id" value="<?= $SanPham['id'] ?>">
                                                <div class="pro-qty"><input type="text" value="1" name="so_luong"></div>
                                            </div>
                                            <div class="action_link">
                                                <button> <a class="btn btn-cart2">Thêm vào giỏ</a></button>
                                            </div>
                                        </div>
                                    </form>

                                    <div class="like-icon">
                                        <a class="facebook" href="#"><i class="fa fa-facebook"></i>like</a>
                                        <a class="twitter" href="#"><i class="fa fa-twitter"></i>tweet</a>
                                        <a class="pinterest" href="#"><i class="fa fa-pinterest"></i>save</a>
                                        <a class="google" href="#"><i class="fa fa-google-plus"></i>share</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- product details inner end -->

                    <!-- product details reviews start -->
                    <div class="product-details-reviews section-padding pb-0">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="product-review-info">
                                    <ul class="nav review-tab">
                                        <li>
                                            <a class="active" data-bs-toggle="tab" href="#tab_three">bình luận (<?= $countCmt ?>)</a>
                                        </li>
                                    </ul>
                                    <div class="tab-content reviews-tab">
                                        <div class="tab-pane fade show active" id="tab_three">
                                            <h5><?= $countCmt ?> bình luận cho <span><?= $SanPham['ten_san_pham'] ?></span></h5>
                                            <?php foreach ($listCmt as $key => $cmt): ?>
                                                <div class="total-reviews">
                                                    <div class="rev-avatar">
                                                        <img src="<?= BASE_URL . $cmt['anh_dai_dien'] ?>" alt="">
                                                    </div>
                                                    <div class="review-box">
                                                        <div class="post-author">
                                                            <p><span> <?= $cmt['ho_ten'] ?> -</span> <?= $cmt['ngay_dang'] ?></p>
                                                        </div>
                                                        <p><?= $cmt['noi_dung'] ?></p>
                                                    </div>
                                                </div>
                                            <?php endforeach ?>
                                            <form action="#" class="review-form">
                                                <div class="form-group row">
                                                    <div class="col">
                                                        <label class="col-form-label"><span class="text-danger">*</span>
                                                            bình luận</label>
                                                        <textarea class="form-control" required></textarea>

                                                    </div>
                                                </div>
                                                <div class="buttons">
                                                    <button class="btn btn-sqr" type="submit">Continue</button>
                                                </div>
                                            </form> <!-- end of review-form -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- product details reviews end -->
                </div>
                <!-- product details wrapper end -->
            </div>
        </div>
    </div>
    <!-- page main wrapper end -->

    <!-- related products area start -->
    <section class="related-products section-padding">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <!-- section title start -->
                    <div class="section-title text-center">
                        <h2 class="title">Sản phẩm liên quan</h2>
                    </div>
                    <!-- section title start -->
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="product-carousel-4 slick-row-10 slick-arrow-style">
                        <!-- product item start -->
                        <?php foreach ($listSanPham as $key => $SanPhams): ?>
                            <?php if ($SanPham['danh_muc_id'] == $SanPhams['danh_muc_id']): ?>
                                <div class="product-item">
                                    <figure class="product-thumb">
                                        <a href="<?= BASE_URL . '?act=chi-tiet-san-pham&id_san_pham=' . $SanPhams['id']; ?>">
                                            <img class="pri-img" src="<?php echo BASE_URL . $SanPhams['hinh_anh']; ?>" alt="">
                                        </a>
                                        <div class="product-badge">
                                            <?php
                                            $ngayNhap = new DateTime($SanPhams['ngay_nhap']);
                                            $ngayHienTai = new DateTime();
                                            $tinhNgay = $ngayHienTai->diff($ngayNhap);
                                            if ($tinhNgay->days <= 7) {
                                            ?>
                                                <div class="product-label new">
                                                    <span>mới</span>
                                                </div>
                                            <?php } ?>
                                            <?php
                                            if ($SanPhams['gia_khuyen_mai']) {
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
                                            <a href="<?= BASE_URL . '?act=chi-tiet-san-pham&id_san_pham=' . $SanPhams['id']; ?>"><button class="btn btn-cart">add to cart</button></a>
                                        </div>
                                    </figure>
                                    <div class="product-caption text-center">
                                        <h6 class="product-name">
                                            <a href="<?= BASE_URL . '?act=chi-tiet-san-pham&id_san_pham=' . $SanPhams['id']; ?>"><?= $SanPhams['ten_san_pham'] ?></a>
                                        </h6>
                                        <div class="price-box">
                                            <?php
                                            if ($SanPhams['gia_khuyen_mai']) {
                                            ?>
                                                <span class="price-regular"><?= formatPrice($SanPhams['gia_khuyen_mai']) . 'đ' ?></span>
                                                <span class="price-old"><del><?= formatPrice($SanPhams['gia_san_pham']) . 'đ' ?> </del></span>
                                            <?php } else { ?>
                                                <span class="price-regular"><?= formatPrice($SanPhams['gia_san_pham']) . 'đ' ?></span>
                                            <?php } ?>


                                        </div>
                                    </div>
                                </div>
                            <?php endif ?>

                        <?php endforeach ?>
                        <!-- product item end -->
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- related products area end -->
</main>

<!-- offcanvas mini cart start -->
<?php require_once 'layout/miniCart.php' ?>
<!-- offcanvas mini cart end -->
<?php require_once 'layout/footer.php'; ?>