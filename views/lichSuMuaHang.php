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
                                        <th>mã đơn hàng</th>
                                        <th>ngày đặt</th>
                                        <th>tổng tiền</th>
                                        <th>phương thức thanh toán </th>
                                        <th>trạng thái đơn hàng</th>
                                        <th>thao tác</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($donHangs as $donHang): ?>
                                        <tr>
                                            <td> <?= $donHang['ma_don_hang'] ?></td>
                                            <td><?= $donHang['ngay_dat'] ?></td>
                                            <td><?= formatPrice($donHang['tong_tien']) ?>đ</td>
                                            <td><?= $donHang['ten_phuong_thuc'] ?></td>
                                            <td><?= $donHang['ten_trang_thai'] ?></td>
                                            <td><?= $donHang['ma_don_hang'] ?></td>
                                        </tr>
                                    <?php endforeach ?>
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