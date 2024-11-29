<!-- Header -->
<?php include './views/layout/header.php'; ?>
<!-- End header -->
<!-- Navbar -->
<?php include './views/layout/navbar.php'; ?>
<!-- /.navbar -->

<!-- Main Sidebar Container -->
<?php include './views/layout/sidebar.php'; ?>


<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Quản lý thông tin đơn hàng</h1>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Sửa thông tin đơn hàng: <?php echo $donHang['ma_don_hang']; ?></h3>
                        </div>

                        <form action="<?php echo BASE_URL_ADMIN . '?act=sua-don-hang'; ?>" method="post">
                            <input type="text" name="don_hang_id" value="<?php echo $donHang['id']; ?>" hidden>
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Tên người nhận</label>
                                    <input type="text" class="form-control" name="ten_nguoi_nhan" placeholder="Nhập tên người nhận" value="<?php echo $donHang['ten_nguoi_nhan']; ?>">
                                    <?php if (isset($_SESSION['error']['ten_nguoi_nhan'])) : ?>
                                        <p class="text-danger"> <?php echo $_SESSION['error']['ten_nguoi_nhan']; ?> </p>
                                    <?php endif ?>
                                </div>

                                <div class="form-group">
                                    <label>Số điện thoại</label>
                                    <input type="text" class="form-control" name="sdt_nguoi_nhan" placeholder="Nhập số điện thoại" value="<?php echo $donHang['sdt_nguoi_nhan']; ?>">
                                    <?php if (isset($_SESSION['error']['sdt_nguoi_nhan'])) : ?>
                                        <p class="text-danger"> <?php echo $_SESSION['error']['sdt_nguoi_nhan']; ?> </p>
                                    <?php endif ?>
                                </div>

                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="email" class="form-control" name="email_nguoi_nhan" placeholder="Nhập email" value="<?php echo $donHang['email_nguoi_nhan']; ?>">
                                    <?php if (isset($_SESSION['error']['email_nguoi_nhan'])) : ?>
                                        <p class="text-danger"> <?php echo $_SESSION['error']['email_nguoi_nhan']; ?> </p>
                                    <?php endif ?>
                                </div>

                                <div class="form-group">
                                    <label>Địa chỉ</label>
                                    <input type="text" class="form-control" name="dia_chi_nguoi_nhan" placeholder="Nhập địa chỉ" value="<?php echo $donHang['dia_chi_nguoi_nhan']; ?>">
                                    <?php if (isset($_SESSION['error']['dia_chi_nguoi_nhan'])) : ?>
                                        <p class="text-danger"> <?php echo $_SESSION['error']['dia_chi_nguoi_nhan']; ?> </p>
                                    <?php endif ?>
                                </div>

                                <div class="form-group">
                                    <label>Ghi chú</label>
                                    <textarea name="ghi_chu" id="" class="form-control" placeholder="Nhập ghi chú"><?php echo $donHang['ghi_chu']; ?></textarea>
                                </div>

                                <hr>

                                <div class="form-group">
                                    <label for="trang_thai_id">Trạng thái đơn hàng</label>
                                    <select id="trang_thai_id" name="trang_thai_id" class="form-control custom-select">
                                        <?php foreach ($listTrangThaiDonHang as $trangThai) : ?>
                                            <option <?php
                                                    if ($donHang['trang_thai_id'] > $trangThai['id'] || $donHang['trang_thai_id'] == 6 || $donHang['trang_thai_id'] == 7) {
                                                        echo 'disabled';
                                                    }
                                                    ?> <?php echo $trangThai['id'] == $donHang['trang_thai_id'] ? 'selected' : ''; ?> value="<?php echo $trangThai['id']; ?>">
                                                <?php echo $trangThai['ten_trang_thai']; ?>
                                            </option>
                                        <?php endforeach ?>
                                    </select>
                                </div>
                            </div>

                            <div class="card-footer">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<!-- Footer -->
<?php include './views/layout/footer.php'; ?>
<!-- End Footer -->
</body>

</html>