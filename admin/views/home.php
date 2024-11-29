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
                    <h1>Báo Cáo Thống Kê</h1>

                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-info">
                    <div class="inner">
                        <?php
                        $count = 0;
                        foreach ($listDonHang as $item) {
                            $count += 1;
                        ?>
                            <h3></h3>
                        <?php } ?>
                        <h3><?= $count ?></h3>
                        <p>Đơn hàng</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-bag"></i>
                    </div>
                    <a href="<?= BASE_URL_ADMIN . '?act=don-hang' ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-success">
                    <div class="inner">

                        <?php
                        $count = 0;
                        foreach ($listCmt as $item) {
                            $count += 1;
                        ?>
                            <h3></h3>
                        <?php } ?>
                        <h3><?= $count ?></h3>
                        <p>Tổng Lượt Bình Luận</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-stats-bars"></i>
                    </div>
                    <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-warning">
                    <div class="inner">
                        <?php
                        $count = 0;
                        foreach ($listTaiKhoan as $item) {
                            $count += 1;
                        ?>
                            <h3></h3>
                        <?php } ?>
                        <h3><?= $count ?></h3>
                        <p>Khách Hàng</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-person-add"></i>
                    </div>
                    <a href="<?= BASE_URL_ADMIN . '?act=list-tai-khoan-khach-hang' ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-danger">
                    <div class="inner">
                        <?php
                        $count = 0;
                        foreach ($listSP as $item) {
                            $count += $item['so_luong'];
                        ?>
                            <h3></h3>
                        <?php } ?>
                        <h3><?= $count ?></h3>
                        <p>Sản phẩm tồn kho</p>
                    </div>
                    <div class="icon">
                        <i class="ion ion-pie-graph"></i>
                    </div>
                    <a href="<?= BASE_URL_ADMIN . '?act=san-pham' ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
        </div>

        <!-- Main content -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <h2></h2>
                            <h2></h2>
                            <div class="card-header border-0">
                                <h3 class="card-title">Products</h3>
                                <div class="card-tools">
                                    <a href="#" class="btn btn-tool btn-sm">
                                        <i class="fas fa-download"></i>
                                    </a>
                                    <a href="#" class="btn btn-tool btn-sm">
                                        <i class="fas fa-bars"></i>
                                    </a>
                                </div>
                            </div>

                            <div class="card-body table-responsive p-0">

                                <table class="table table-striped table-valign-middle">
                                    <thead>
                                        <tr>
                                            <th>sản phẩm</th>
                                            <th>giá</th>
                                            <th>bán</th>
                                            <th>More</th>
                                        </tr>
                                    </thead>
                                    <?php foreach ($top_5_products as $item) { ?>
                                        <tbody>

                                            <tr>
                                                <td>
                                                    <img src="<?= BASE_URL . $item['hinh_anh'] ?>" alt="Product 1" class="img-circle img-size-32 mr-2">
                                                    <?= $item['ten_san_pham'] ?>
                                                </td>
                                                <td><?= formatPrice($item['gia_san_pham']) . 'đ' ?></td>
                                                <td>
                                                    <?= $item['tong_so_luong'] ?> đã bán
                                                </td>
                                                <td>
                                                    <a href="#" class="text-muted">
                                                        <i class="fas fa-search"></i>
                                                    </a>
                                                </td>
                                            </tr>

                                        </tbody>
                                    <?php } ?>
                                </table>

                            </div>
                        </div>
                        <!-- /.card -->
                    </div>
                    <!-- /.col-md-6 -->

                    <!-- /.col-md-6 -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- Main content -->

        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<!-- Footer -->
<?php include './views/layout/footer.php'; ?>
<!-- End Footer -->

<!-- Page specific script -->
<script>
    $(function() {
        $(" #example1").DataTable({
            "responsive": true,
            "lengthChange": false,
            "autoWidth": false,
            "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
        $('#example2').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": false,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "responsive": true,
        });
    });
</script>
<!-- Code injected by live-server -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE -->
<script src="dist/js/adminlte.js?v=3.2.0"></script>

<!-- OPTIONAL SCRIPTS -->
<script src="plugins/chart.js/Chart.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="dist/js/demo.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="dist/js/pages/dashboard3.js"></script>


</body>

</html>