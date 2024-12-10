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
                                <li class="breadcrumb-item"><a href="shop.html">shop</a></li>
                                <li class="breadcrumb-item active" aria-current="page">thanh toán</li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumb area end -->

    <!-- checkout main wrapper start -->
    <div class="checkout-page-wrapper section-padding">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <!-- Checkout Login Coupon Accordion Start -->
                    <div class="checkoutaccordion" id="checkOutAccordion">


                        <div class="card">
                            <h6>thêm mã giảm giá? <span data-bs-toggle="collapse" data-bs-target="#couponaccordion">nhập mã giảm giá</span></h6>
                            <div id="couponaccordion" class="collapse" data-parent="#checkOutAccordion">
                                <div class="card-body">
                                    <div class="cart-update-option">
                                        <div class="apply-coupon-wrapper">
                                            <form action="#" method="post" class=" d-block d-md-flex">
                                                <input type="text" placeholder="Enter Your Coupon Code" required />
                                                <button class="btn btn-sqr">Apply Coupon</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Checkout Login Coupon Accordion End -->
                </div>
            </div>
            <form action="<?= BASE_URL . '?act=xu-li-thanh-toan' ?>" method="POST">
                <div class="row">
                    <!-- Checkout Billing Details -->
                    <div class="col-lg-6">
                        <div class="checkout-billing-details-wrap">
                            <h5 class="checkout-title">thông tin người nhận </h5>
                            <div class="billing-form-wrap">

                                <div class="single-input-item">
                                    <label for="ten_nguoi_nhan" class="required">tên người nhận</label>
                                    <input type="ten_nguoi_nhan" name="ten_nguoi_nhan" id="ten_nguoi_nhan" value="<?= $user['ho_ten'] ?>" placeholder="ten nguoi nhan" required />
                                </div>
                                <div class="single-input-item">
                                    <label for="email_nguoi_nhan" class="required">Email người nhận</label>
                                    <input type="email" name="email_nguoi_nhan" id="email_nguoi_nhan" value="<?= $user['email'] ?>" placeholder="Email Address" required />
                                </div>
                                <div class="single-input-item">
                                    <label for="sdt_nguoi_nhan" class="required">số điện thoại</label>
                                    <input type="text" name="sdt_nguoi_nhan" id="sdt_nguoi_nhan" value="<?= $user['so_dien_thoai'] ?>" placeholder="ten nguoi nhan" required />
                                </div>
                                <div class="single-input-item">
                                    <label for="dia_chi_nguoi_nhan">địa chỉ</label>
                                    <input type="text" name="dia_chi_nguoi_nhan" id="dia_chi_nguoi_nhan" value="<?= $user['dia_chi'] ?>" placeholder="nhập địa chỉ" />
                                </div>

                                <div class="single-input-item">
                                    <label for="ghi_chu">ghi chú</label>
                                    <textarea name="ghi_chu" id="ghi_chu" cols="30" rows="3" placeholder="vui lòng nhập ghi chú về đơn hàng của bạn."></textarea>
                                </div>

                            </div>
                        </div>
                    </div>

                    <!-- Order Summary Details -->
                    <div class="col-lg-6">
                        <div class="order-summary-details">
                            <h5 class="checkout-title">Thông tin sản phẩm</h5>
                            <div class="order-summary-content">
                                <!-- Order Summary Table -->
                                <div class="order-summary-table table-responsive text-center">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>Products</th>
                                                <th>Total</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            <?php

                                            $tongTienGioHang = 0;
                                            foreach ($chiTietGioHang as $key => $SanPham): ?>
                                                <tr>
                                                    <td class="pro-title"><a href="#"><?= $SanPham['ten_san_pham'] ?> x<?= $SanPham['so_luong'] ?> </a></td>
                                                    <td><?php
                                                        $tongTien = 0;
                                                        if ($SanPham['gia_khuyen_mai']) {
                                                            $tongTien = $SanPham['gia_khuyen_mai'] * $SanPham['so_luong'];
                                                        } else {
                                                            $tongTien = $SanPham['gia_san_pham'] * $SanPham['so_luong'];
                                                        }
                                                        $tongTienGioHang += $tongTien;
                                                        echo formatPrice($tongTien) . 'đ'
                                                        ?></td>


                                                </tr>
                                            <?php endforeach ?>

                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <td>tổng tiền sản phẩm</td>
                                                <td><strong><?= formatPrice($tongTienGioHang) . 'đ' ?></strong></td>
                                            </tr>
                                            <tr>
                                                <td>Shipping</td>
                                                <td class="d-flex justify-content-center">
                                                    <strong>30000đ</strong>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>tổng đơn hàng</td>
                                                <input type="hidden" name="tong_tien" value="<?= $tongTienGioHang + 20000 ?>">
                                                <td><strong name="tong_tien"><?= formatPrice($tongTienGioHang + 20000) . 'đ' ?></strong></td>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                                <!-- Order Payment Method -->
                                <div class="order-payment-method">
                                    <div class="single-payment-method show">
                                        <div class="payment-method-name">
                                            <div class="custom-control custom-radio">
                                                <input type="radio" id="cashon" name="phuong_thuc_thanh_toan_id" value="2" class="custom-control-input" checked />
                                                <label class="custom-control-label" for="cashon">thanh toán khi nhận hàng</label>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="single-payment-method">
                                        <div class="payment-method-name">
                                            <div class="custom-control custom-radio">
                                                <input type="radio" id="directbank" name="phuong_thuc_thanh_toan_id" value="1" class="custom-control-input" checked />
                                                <label class="custom-control-label" for="directbank">thanh toán online</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="summary-footer-area">
                                        <div class="custom-control custom-checkbox mb-20">
                                            <input type="checkbox" class="custom-control-input" id="terms" required />
                                            <label class="custom-control-label" for="terms">Xác nhận đặt hàng </label>
                                        </div>
                                        <button type="submit" class="btn btn-sqr">Thanh toán</button>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <!-- checkout main wrapper end -->
</main>
<script src="assets/js/vendor/modernizr-3.6.0.min.js"></script>
<!-- jQuery JS -->
<script src="assets/js/vendor/jquery-3.6.0.min.js"></script>
<!-- Bootstrap JS -->
<script src="assets/js/vendor/bootstrap.bundle.min.js"></script>
<!-- slick Slider JS -->
<script src="assets/js/plugins/slick.min.js"></script>
<!-- Countdown JS -->
<script src="assets/js/plugins/countdown.min.js"></script>
<!-- Nice Select JS -->
<script src="assets/js/plugins/nice-select.min.js"></script>
<!-- jquery UI JS -->
<script src="assets/js/plugins/jqueryui.min.js"></script>
<!-- Image zoom JS -->
<script src="assets/js/plugins/image-zoom.min.js"></script>
<!-- Images loaded JS -->
<script src="assets/js/plugins/imagesloaded.pkgd.min.js"></script>
<!-- mail-chimp active js -->
<script src="assets/js/plugins/ajaxchimp.js"></script>
<!-- contact form dynamic js -->
<script src="assets/js/plugins/ajax-mail.js"></script>
<!-- google map api -->
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCfmCVTjRI007pC1Yk2o2d_EhgkjTsFVN8"></script>
<!-- google map active js -->
<script src="assets/js/plugins/google-map.js"></script>
<!-- Main JS -->
<script src="assets/js/main.js"></script>

<!-- offcanvas mini cart start -->
<?php require_once 'layout/miniCart.php' ?>
<!-- offcanvas mini cart end -->
<?php require_once 'layout/footer.php'; ?>