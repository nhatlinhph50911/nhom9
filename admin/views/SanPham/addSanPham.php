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
                    <h1>Them San Pham</h1>
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
                            <h3 class="card-title">Them San Pham</h3>

                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form action="<?= BASE_URL_ADMIN . '?act=them-san-pham' ?>" method="post" enctype="multipart/form-data">
                            <div class="row card-body">
                                <div class="form-group col-12">
                                    <label>Ten san pham</label>
                                    <input type="text" class="form-control" name="ten_san_pham" placeholder="nhap ten san pham">
                                    <?php if (isset($_SESSION['error']['ten_san_pham'])) { ?>
                                        <p class="text-danger"> <?= $_SESSION['error']['ten_san_pham'] ?> </p>
                                    <?php } ?>
                                </div>

                                <div class="form-group col-6">
                                    <label>giá sản phẩm</label>
                                    <input type="text" class="form-control" name="gia_san_pham" placeholder="nhap giá sản phẩm">
                                    <?php if (isset($_SESSION['error']['gia_san_pham'])) { ?>
                                        <p class="text-danger"> <?= $_SESSION['error']['gia_san_pham'] ?> </p>
                                    <?php } ?>
                                </div>

                                <div class="form-group col-6">
                                    <label>giá khuyến mãi</label>
                                    <input type="text" class="form-control" name="gia_khuyen_mai" placeholder="nhap giá khuyến mãi">
                                    <?php if (isset($_SESSION['error']['gia_khuyen_mai'])) { ?>
                                        <p class="text-danger"> <?= $_SESSION['error']['gia_khuyen_mai'] ?> </p>
                                    <?php } ?>
                                </div>

                                <div class="form-group col-6">
                                    <label>hình ảnh sản phẩm</label>
                                    <input type="file" class="form-control" name="hinh_anh" placeholder="nhap hình ảnh sản phẩm">
                                    <?php if (isset($_SESSION['error']['hinh_anh'])) { ?>
                                        <p class="text-danger"> <?= $_SESSION['error']['hinh_anh'] ?> </p>
                                    <?php } ?>
                                </div>
                                <div class="form-group col-6">
                                    <label>Album ảnh</label>
                                    <input type="file" class="form-control" name="img_array[]" multiple>
                                </div>

                                <div class="form-group col-6">
                                    <label>ngày nhập</label>
                                    <input type="date" class="form-control" name="ngay_nhap" placeholder="ngày nhập">
                                    <?php if (isset($_SESSION['error']['ngay_nhap'])) { ?>
                                        <p class="text-danger"> <?= $_SESSION['error']['ngay_nhap'] ?> </p>
                                    <?php } ?>
                                </div>

                                <div class="form-group col-6">
                                    <label>Số lượng</label>
                                    <input type="number" class="form-control" name="so_luong" placeholder="Nhập số lượng">
                                    <?php if (isset($_SESSION['error']['so_luong'])) : ?>
                                        <p class="text-danger"> <?php echo $_SESSION['error']['so_luong']; ?> </p>
                                    <?php endif ?>
                                </div>

                                <div class="form-group col-6">
                                    <label>Kích cỡ</label>
                                    <select class="form-control" name="size[]" id="exampleFormControlSelect1" multiple>
                                        <?php foreach ($listSize as $size) : ?>
                                            <option value="<?php echo $size['id']; ?>">
                                                <?php echo $size['size']; ?>
                                            </option>
                                        <?php endforeach ?>
                                    </select>
                                    <?php if (isset($_SESSION['error']['size'])) : ?>
                                        <p class="text-danger"> <?php echo $_SESSION['error']['size']; ?> </p>
                                    <?php endif ?>
                                </div>


                                <div class="form-group col-6">
                                    <label>Danh mục</label>
                                    <select class="form-control" name="danh_muc_id" id="exampleFormControlSelect1">
                                        <option selected disabled>Chọn danh mục sản phẩm</option>
                                        <?php foreach ($listDanhMuc as $danhMuc) : ?>
                                            <option value="<?php echo $danhMuc['id']; ?>">
                                                <?php echo $danhMuc['ten_danh_muc']; ?>
                                            </option>
                                        <?php endforeach ?>
                                    </select>
                                    <?php if (isset($_SESSION['error']['danh_muc_id'])) : ?>
                                        <p class="text-danger"> <?php echo $_SESSION['error']['danh_muc_id']; ?> </p>
                                    <?php endif ?>
                                </div>

                                <div class="form-group col-6">
                                    <label>Trạng thái</label>
                                    <select class="form-control" name="trang_thai" id="exampleFormControlSelect1">
                                        <option selected disabled>Chọn trạng thái </option>
                                        <option value="1">Còn bán</option>
                                        <option value="2">Dừng bán</option>
                                    </select>
                                    <?php if (isset($_SESSION['error']['trang_thai'])) : ?>
                                        <p class="text-danger"> <?php echo $_SESSION['error']['trang_thai']; ?> </p>
                                    <?php endif ?>
                                </div>

                                <div class="form-group col-12">
                                    <label>mo ta</label>
                                    <input type="text" class="form-control" name="mo_ta" placeholder="nhap mo ta">
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