<!-- header -->
<?php require './views/layout/header.php' ?>
<!-- end header -->
<!-- aside -->
<?php require './views/layout/sidebar.php' ?>
<!-- end aside -->
<!-- nav -->
<?php require './views/layout/navbar.php' ?>
<!-- end nav -->
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>QUẢN LÝ TÀI KHOẢN QUẢN TRỊ</h1>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-md-8">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Thông tin tài khoản quản trị</h3>

                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                        </div>
                    </div>

                    <form action="<?php echo BASE_URL_ADMIN . '?act=sua-quan-tri'; ?>" method="post" enctype="multipart/form-data">

                        <div class="card-body">
                            <div class="form-group">
                                <input type="hidden" name="id_ca_nhan" value="<?php echo $user['id']; ?>">
                                <label for="ho_ten">Tên tài khoản</label>
                                <input type="text" id="ho_ten" name="ho_ten" class="form-control" value="<?php echo $user['ho_ten']; ?>">
                                <?php if (isset($_SESSION['error']['ho_ten'])) : ?>
                                    <p class="text-danger"> <?php echo $_SESSION['error']['ho_ten']; ?> </p>
                                <?php endif ?>
                            </div>
                            <div class="form-group">
                                <label for="ngay_sinh">Ngày sinh</label>
                                <input type="date" id="ngay_sinh" name="ngay_sinh" class="form-control" value="<?php echo $user['ngay_sinh']; ?>">
                                <?php if (isset($_SESSION['error']['ngay_sinh'])) : ?>
                                    <p class="text-danger"> <?php echo $_SESSION['error']['ngay_sinh']; ?> </p>
                                <?php endif ?>
                            </div>
                            <div class="form-group">
                                <label for="gioi_tinh">giới tính</label>
                                <input type="text" id="gioi_tinh" name="gioi_tinh" class="form-control" value="<?php echo $user['gioi_tinh']; ?>">
                                <?php if (isset($_SESSION['error']['gioi_tinh'])) : ?>
                                    <p class="text-danger"> <?php echo $_SESSION['error']['gioi_tinh']; ?> </p>
                                <?php endif ?>
                            </div>
                            <div class="form-group">
                                <label for="ho_ten">Tên tài khoản</label>
                                <input type="text" id="ho_ten" name="ho_ten" class="form-control" value="<?php echo $user['ho_ten']; ?>">
                                <?php if (isset($_SESSION['error']['ho_ten'])) : ?>
                                    <p class="text-danger"> <?php echo $_SESSION['error']['ho_ten']; ?> </p>
                                <?php endif ?>
                            </div>
                            <div class="form-group">
                                <label for="email">email</label>
                                <input type="text" id="email" name="email" class="form-control" value="<?php echo $user['email']; ?>">
                                <?php if (isset($_SESSION['error']['email'])) : ?>
                                    <p class="text-danger"> <?php echo $_SESSION['error']['email']; ?> </p>
                                <?php endif ?>
                            </div>
                            <div class="form-group">
                                <label for="password">password</label>
                                <input type="text" id="password" name="password" class="form-control" value="<?php echo $user['mat_khau']; ?>">
                                <?php if (isset($_SESSION['error']['password'])) : ?>
                                    <p class="text-danger"> <?php echo $_SESSION['error']['password']; ?> </p>
                                <?php endif ?>
                            </div>
                            <div class="form-group">
                                <label for="so_dien_thoai">số điện thoại</label>
                                <input type="text" id="so_dien_thoai" name="so_dien_thoai" class="form-control" value="<?php echo $user['so_dien_thoai']; ?>">
                                <?php if (isset($_SESSION['error']['so_dien_thoai'])) : ?>
                                    <p class="text-danger"> <?php echo $_SESSION['error']['so_dien_thoai']; ?> </p>
                                <?php endif ?>
                            </div>
                            <div class="form-group">
                                <label for="trang_thai">Trạng thái</label>
                                <select id="trang_thai" name="trang_thai" class="form-control custom-select">
                                    <option <?php echo $user['trang_thai'] == 1 ? 'selected' : ''; ?> value="1">Active</option>
                                    <option <?php echo $user['trang_thai'] == 2 ? 'selected' : ''; ?> value="2">Inactive</option>
                                </select>
                                <?php if (isset($_SESSION['error']['trang_thai'])) : ?>
                                    <p class="text-danger"> <?php echo $_SESSION['error']['trang_thai']; ?> </p>
                                <?php endif ?>
                            </div>

                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer text-center">
                            <button type="submit" class="btn btn-primary">Sửa thông tin</button>
                        </div>
                    </form>
                </div>

                <!-- /.card -->
            </div>

        </div>

    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<!-- footer -->
<?php require './views/layout/footer.php' ?>
<!-- end footer -->
<script>
    $(function() {
        $("#example1").DataTable({
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

</body>

</html>