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
                                <li class="breadcrumb-item"><a href="<?= BASE_URL ?>">home</a></li>
                                <li class="breadcrumb-item"><a href="<?= BASE_URL . '?act=lich-su-mua-hang' ?>">lịch sử mua hàng</a></li>
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
                    <div class="col-lg-7">
                        <!-- Cart Table Area -->
                        <div class="cart-table table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th colspan="6">Thông tin sản phẩm</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr class="text-center">
                                        <td>Tên sản phẩm</td>
                                        <td>Size</td>
                                        <td>Hình ảnh</td>
                                        <td>Đơn giá</td>
                                        <td>Số lượng</td>
                                        <td>Thành tiền</td>
                                    </tr>
                                    <?php foreach ($chiTietDonHang as $item):  ?>
                                        <tr>
                                            <td><?= $item['ten_san_pham'] ?></td>
                                            <td><?= $item['size'] ?></td>
                                            <td> <img class="img-fluid" src="<?= BASE_URL . $item['hinh_anh'] ?>" width="100px" alt="product"></td>
                                            <td><?= $item['don_gia'] ?></td>
                                            <td><?= $item['so_luong'] ?></td>
                                            <td><?= $item['thanh_tien'] ?></td>
                                        </tr>
                                    <?php endforeach ?>
                                </tbody>
                            </table>
                        </div>
                        <!-- Cart Update Option -->

                    </div>
                    <div class="col-lg-5">
                        <!-- Cart Table Area -->
                        <div class="cart-table table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th colspan="2">Thông tin người nhận</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Mã đơn hàng:</td>
                                        <td><?= $donHang['ma_don_hang'] ?></td>
                                    </tr>
                                    <tr>
                                        <td>Người nhận:</td>
                                        <td><?= $donHang['ten_nguoi_nhan'] ?></td>
                                    </tr>
                                    <tr>
                                        <td>Email:</td>
                                        <td><?= $donHang['email_nguoi_nhan'] ?></td>
                                    </tr>
                                    <tr>
                                        <td>Số điện thoại:</td>
                                        <td><?= $donHang['sdt_nguoi_nhan'] ?></td>
                                    </tr>
                                    <tr>
                                        <td>Địa chỉ:</td>
                                        <td><?= $donHang['dia_chi_nguoi_nhan'] ?></td>
                                    </tr>
                                    <tr>
                                        <td>Ngày đặt:</td>
                                        <td><?= $donHang['ngay_dat'] ?></td>
                                    </tr>
                                    <tr>
                                        <td>Ghi chú:</td>
                                        <td><?= $donHang['ghi_chu'] ?></td>
                                    </tr>
                                    <tr>
                                        <td>Tổng tiền:</td>
                                        <td><?= $donHang['tong_tien'] ?></td>
                                    </tr>
                                    <tr>
                                        <td>Phương thức thanh toán:</td>
                                        <td><?= $donHang['ten_phuong_thuc'] ?></td>
                                    </tr>
                                    <tr>
                                        <td>Trạng thái đơn hàng:</td>
                                        <td><?= $donHang['ten_trang_thai'] ?></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <!-- Cart Update Option -->

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