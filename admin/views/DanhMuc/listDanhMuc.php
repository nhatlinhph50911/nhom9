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
                    <h1>QUAN LY DANH MUC</h1>
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
                            <a href="<?= BASE_URL_ADMIN . '?act=form-them-danh-muc' ?>"><button class="btn btn-success">Them Danh Muc</button></a>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>stt</th>
                                        <th>ten danh muc</th>
                                        <th>mo ta</th>
                                        <th>thao tac</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($listDanhMuc as $key => $DanhMuc): ?>
                                        <tr>
                                            <td> <?= $key + 1 ?></td>
                                            <td> <?= $DanhMuc['ten_danh_muc'] ?></td>
                                            <td> <?= $DanhMuc['mo_ta'] ?></td>
                                            <td>
                                                <a href="<?= BASE_URL_ADMIN . '?act=form-sua-danh-muc&id_danh_muc=' . $DanhMuc['id'] ?>"><button class="btn btn-primary">sua</button></a>

                                                <a href="<?= BASE_URL_ADMIN . '?act=xoa-danh-muc&id_danh_muc=' . $DanhMuc['id'] ?> " onclick="return confirm('bạn có đồng ý xóa hay không')"><button class="btn btn-danger">xoa</button></a>

                                            </td>
                                        </tr>
                                    <?php endforeach ?>
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