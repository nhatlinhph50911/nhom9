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
                    <h1>QUAN LY SAN PHAM</h1>
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
                        <h3 class="card-title">Thông tin sản phẩm</h3>

                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                        </div>
                    </div>

                    <form action="<?php echo BASE_URL_ADMIN . '?act=sua-san-pham'; ?>" method="post" enctype="multipart/form-data">

                        <div class="card-body">
                            <div class="form-group">
                                <input type="hidden" name="san_pham_id" value="<?php echo $SanPham['id']; ?>">
                                <label for="ten_san_pham">Tên sản phẩm</label>
                                <input type="text" id="ten_san_pham" name="ten_san_pham" class="form-control" value="<?php echo $SanPham['ten_san_pham']; ?>">
                                <?php if (isset($_SESSION['error']['ten_san_pham'])) : ?>
                                    <p class="text-danger"> <?php echo $_SESSION['error']['ten_san_pham']; ?> </p>
                                <?php endif ?>
                            </div>
                            <div class="form-group">
                                <label for="gia_san_pham">Giá sản phẩm</label>
                                <input type="number" id="gia_san_pham" name="gia_san_pham" class="form-control" value="<?php echo $SanPham['gia_san_pham']; ?>">
                                <?php if (isset($_SESSION['error']['gia_san_pham'])) : ?>
                                    <p class="text-danger"> <?php echo $_SESSION['error']['gia_san_pham']; ?> </p>
                                <?php endif ?>
                            </div>
                            <div class="form-group">
                                <label for="gia_khuyen_mai">Giá khuyến mãi</label>
                                <input type="number" id="gia_khuyen_mai" name="gia_khuyen_mai" class="form-control" value="<?php echo $SanPham['gia_khuyen_mai']; ?>">
                                <?php if (isset($_SESSION['error']['gia_khuyen_mai'])) : ?>
                                    <p class="text-danger"> <?php echo $_SESSION['error']['gia_khuyen_mai']; ?> </p>
                                <?php endif ?>
                            </div>
                            <div class="form-group">
                                <label for="hinh_anh">Hình ảnh</label>
                                <input type="file" id="hinh_anh" name="hinh_anh" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="so_luong">Số lượng</label>
                                <input type="number" id="so_luong" name="so_luong" class="form-control" value="<?php echo $SanPham['so_luong']; ?>">
                                <?php if (isset($_SESSION['error']['so_luong'])) : ?>
                                    <p class="text-danger"> <?php echo $_SESSION['error']['so_luong']; ?> </p>
                                <?php endif ?>
                            </div>
                            <div class="form-group">
                                <label for="ngay_nhap">Ngày nhập</label>
                                <input type="date" id="ngay_nhap" name="ngay_nhap" class="form-control" value="<?php echo $SanPham['ngay_nhap']; ?>">
                                <?php if (isset($_SESSION['error']['ngay_nhap'])) : ?>
                                    <p class="text-danger"> <?php echo $_SESSION['error']['ngay_nhap']; ?> </p>
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
                            <div class="form-group">
                                <label for="danh_muc_id">Danh mục sản phẩm</label>
                                <select id="danh_muc_id" name="danh_muc_id" class="form-control custom-select">
                                    <?php foreach ($listDanhMuc as $danhMuc) : ?>
                                        <option <?php echo $danhMuc['id'] == $SanPham['danh_muc_id'] ? 'selected' : ''; ?> value="<?php echo $danhMuc['id']; ?>"><?php echo $danhMuc['ten_danh_muc']; ?></option>
                                    <?php endforeach ?>
                                </select>
                                <?php if (isset($_SESSION['error']['danh_muc_id'])) : ?>
                                    <p class="text-danger"> <?php echo $_SESSION['error']['danh_muc_id']; ?> </p>
                                <?php endif ?>
                            </div>

                            <div class="form-group">
                                <label for="trang_thai">Trạng thái</label>
                                <select id="trang_thai" name="trang_thai" class="form-control custom-select">
                                    <option <?php echo $SanPham['trang_thai'] == 1 ? 'selected' : ''; ?> value="1">Còn bán</option>
                                    <option <?php echo $SanPham['trang_thai'] == 2 ? 'selected' : ''; ?> value="2">Dừng bán</option>
                                </select>
                                <?php if (isset($_SESSION['error']['trang_thai'])) : ?>
                                    <p class="text-danger"> <?php echo $_SESSION['error']['trang_thai']; ?> </p>
                                <?php endif ?>
                            </div>

                            <div class="form-group">
                                <label for="mo_ta">Mô tả sản phẩm</label>
                                <textarea id="mo_ta" name="mo_ta" class="form-control" rows="4"><?php echo $SanPham['mo_ta']; ?></textarea>
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
            <div class="col-md-4">
                <div class="card card-info">
                    <div class="card-header">
                        <h3 class="card-title">Album ảnh sản phẩm</h3>

                        <div class="card-tools">
                            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                                <i class="fas fa-minus"></i>
                            </button>
                        </div>
                    </div>
                    <div class="card-body p-0">
                        <form action="<?php echo BASE_URL_ADMIN . '?act=sua-album-anh-san-pham'; ?>" method="post" enctype="multipart/form-data">
                            <div class="table-responsive">
                                <table id="faqs" class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>Ảnh</th>
                                            <th>File</th>
                                            <th>
                                                <div class="text-center"><button onclick="addfaqs();" type="button" class="badge badge-success"><i class="fa fa-plus"></i>Add</button></div>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <input type="hidden" name="san_pham_id" value="<?php echo $SanPham['id']; ?>">
                                        <input type="hidden" id="img_delete" name="img_delete">
                                        <?php foreach ($listAnhSanPham as $key => $value) : ?>
                                            <tr id="faqs-row-<?php echo $key; ?>">
                                                <input type="hidden" name="current_img_ids[]" value="<?php echo $value['id']; ?>">
                                                <td><img src="<?php echo BASE_URL . $value['link_hinh_anh']; ?>" style="width: 50px; height: 50px;" alt=""></td>
                                                <td><input type="file" name="img_array[]" class="form-control"></td>
                                                <td class="mt-10"><button class="badge badge-danger" type="button" onclick="removeRow(<?php echo $key; ?>, <?php echo $value['id']; ?>)"><i class="fa fa-trash"></i> Delete</button></td>
                                            </tr>
                                        <?php endforeach ?>
                                    </tbody>
                                </table>
                            </div>
                            <div class="card-footer text-center">
                                <button type="submit" class="btn btn-primary">Sửa thông tin</button>
                            </div>
                        </form>

                    </div>
                    <!-- /.card-body -->
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
    var faqs_row = <?php echo count($listAnhSanPham); ?>;

    function addfaqs() {
        html = '<tr id="faqs-row-' + faqs_row + '">';
        html += '<td><img src="./assets/dist/img/cry_1.png" style="width: 50px; height: 50px;" alt=""></td>';
        html += '<td><input type="file" name="img_array[]" class="form-control"></td>';
        html += '<td class="mt-10"><button type="button" class="badge badge-danger" onclick="removeRow(' + faqs_row + ', null);"><i class="fa fa-trash"></i> Delete</button></td>';

        html += '</tr>';

        $('#faqs tbody').append(html);  

        faqs_row++;
    }

    function removeRow(rowId, imgId) {
        $('#faqs-row-' + rowId).remove();
        if (imgId !== null) {
            var imgDeleteInput = document.getElementById('img_delete');
            var currentValue = imgDeleteInput.value;
            imgDeleteInput.value = currentValue ? currentValue + ',' + imgId : imgId;
        }
    }
</script>
<!-- Code injected by live-server -->

</body>

</html>