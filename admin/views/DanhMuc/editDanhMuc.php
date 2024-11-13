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
                    <h1>edit Danh Muc</h1>
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
                            <h3 class="card-title">Them Danh Muc</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form action="<?= BASE_URL_ADMIN . '?act=sua-danh-muc' ?>" method="post">
                            <input type="text" name="id" value="<?= $danhMuc['id'] ?>" hidden>
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Ten danh muc</label>
                                    <input type="text" class="form-control" value="<?= $danhMuc['ten_danh_muc'] ?>" name="ten_danh_muc" placeholder="nhap ten danh muc">
                                    <?php if (isset($errors['ten_danh_muc'])) { ?>
                                        <p class="text-danger"> <?= $errors['ten_danh_muc'] ?> </p>
                                    <?php } ?>
                                </div>
                                <div class="form-group">
                                    <label>mo ta</label>
                                    <textarea type="text" class="form-control" name="mo_ta" placeholder="nhap mo ta"><?= $danhMuc['mo_ta'] ?></textarea>
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

<!-- footer -->
<?php require './views/layout/footer.php' ?>
<!-- end footer -->
</body>

</html>