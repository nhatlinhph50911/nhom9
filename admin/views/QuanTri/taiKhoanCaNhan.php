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
                    <h1>QUẢN LÝ TÀI KHOẢN CÁ NHÂN</h1>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">

                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>họ và tên</th>
                                        <th>ảnh đại diện</th>
                                        <th>ngày sinh</th>
                                        <th>email</th>
                                        <th>số điện thoại</th>
                                        <th>giới tính</th>
                                        <th>địa chỉ</th>
                                        <th>Trạng thái</th>
                                        <th>Thao tác</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td> <?php echo $user['ho_ten']; ?> </td>
                                        <td> <img src="<?php echo BASE_URL . $user['anh_dai_dien']; ?>" alt="" style="width: 100px" onerror="this.onerror=null; this.src='./assets/dist/img/cry_1.png'"></td>
                                        <td> <?php echo $user['ngay_sinh']; ?> </td>
                                        <td> <?php echo $user['email']; ?> </td>
                                        <td> <?php echo $user['so_dien_thoai']; ?> </td>
                                        <td> <?php echo $user['gioi_tinh'] == 1 ? 'Nam' : 'Nữ'; ?> </td>
                                        <td> <?php echo $user['dia_chi']; ?> </td>
                                        <td> <?php echo $user['trang_thai'] == 1 ? 'Active' : 'Inactive'; ?> </td>
                                        <td>
                                            <div class="btn-group">
                                                <a href="<?php echo BASE_URL_ADMIN . '?act=form-sua-ca-nhan&id_ca_nhan=' . $user['id']; ?>">
                                                    <button class="btn btn-warning">Sửa</button>
                                                </a>
                                                <a href="<?php echo BASE_URL_ADMIN . '?act=reset-password&id_quan_tri=' . $user['id']; ?>">
                                                    <button class="btn btn-danger">reset</button>
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                                <tfoot>

                                </tfoot>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
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