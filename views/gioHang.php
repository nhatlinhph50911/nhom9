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
                                <li class="breadcrumb-item"><a href="index.html"><i class="fa fa-home"></i></a></li>
                                <li class="breadcrumb-item"><a href="shop.html">shop</a></li>
                                <li class="breadcrumb-item active" aria-current="page">cart</li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumb area end -->

    <!-- cart main wrapper start -->
    <div class="cart-main-wrapper section-padding">
        <div class="container">
            <div class="section-bg-color">
                <div class="row">
                    <div class="col-lg-12">
                        <!-- Cart Table Area -->
                        <div class="cart-table table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th class="pro-thumbnail">ảnh sản phẩm</th>
                                        <th class="pro-title">tên sản phẩm</th>
                                        <th class="pro-title">size</th>
                                        <th class="pro-price">giá tiền</th>
                                        <th class="pro-quantity">số lượng </th>
                                        <th class="pro-subtotal">tổng tiền</th>
                                        <th class="pro-remove">thao tác</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php

                                    $tongTienGioHang = 0;
                                    foreach ($chiTietGioHang as $key => $SanPham): ?>
                                        <tr>
                                            <td class="pro-thumbnail"><a href="#"><img class="img-fluid" src="<?= BASE_URL . $SanPham['hinh_anh'] ?>" alt="Product" /></a></td>
                                            <td class="pro-title"><a href="#"><?= $SanPham['ten_san_pham'] ?> </a></td>
                                            <td class="pro-title"><a href="#"><?= $SanPham['size'] ?> </a></td>
                                            <?php if ($SanPham['gia_khuyen_mai']) { ?>
                                                <td class="pro-price"><span><?= formatPrice($SanPham['gia_khuyen_mai']) . 'đ' ?></span></td>
                                            <?php } else { ?>
                                                <td class="pro-price"><span><?= formatPrice($SanPham['gia_san_pham']) . 'đ' ?></span></td>
                                            <?php } ?>
                                            <td class="pro-quantity">
                                                <div class="pro-qty"><input type="text" value="<?= $SanPham['so_luong'] ?>"></div>
                                            </td>
                                            <td class="pro-subtotal"><span>
                                                    <?php
                                                    $tongTien = 0;
                                                    if ($SanPham['gia_khuyen_mai']) {
                                                        $tongTien = $SanPham['gia_khuyen_mai'] * $SanPham['so_luong'];
                                                    } else {
                                                        $tongTien = $SanPham['gia_san_pham'] * $SanPham['so_luong'];
                                                    }
                                                    $tongTienGioHang += $tongTien;
                                                    echo formatPrice($tongTien) . 'đ'
                                                    ?>
                                                </span></td>
                                            <td class="pro-remove"><a href="<?= BASE_URL . '?act=xoa-gio-hang&san_pham_id=' . $SanPham['san_pham_id'] ?>" onclick="return confirm('xác nhận xóa sản phẩm khỏi giỏ hàng')"><i class="fa fa-trash-o"></i></a></td>
                                        </tr>
                                    <?php endforeach ?>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-5 ml-auto">
                        <!-- Cart Calculation Area -->
                        <div class="cart-calculator-wrapper">
                            <div class="cart-calculate-items">
                                <h6>Tổng tiền</h6>
                                <div class="table-responsive">
                                    <table class="table">
                                        <tr>
                                            <td>Tổng tiền sản phẩm</td>
                                            <td><?= formatPrice($tongTienGioHang) . 'đ' ?></td>
                                        </tr>
                                        <tr>
                                            <td>Phí vận chuyển</td>
                                            <td>20000đ</td>
                                        </tr>
                                        <tr class="total">
                                            <td>Tổng thanh toán</td>
                                            <td class="total-amount"><?= formatPrice($tongTienGioHang + 20000) . 'đ' ?></td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                            <a href="<?= BASE_URL . '?act=thanh-toan' ?>" class="btn btn-sqr d-block">Đặt hàng</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- cart main wrapper end -->
</main>

<!-- offcanvas mini cart start -->
<?php require_once 'layout/miniCart.php' ?>
<!-- offcanvas mini cart end -->
<?php require_once 'layout/footer.php'; ?>